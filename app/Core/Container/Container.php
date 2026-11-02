<?php

declare(strict_types=1);

namespace MorphSpace\Core\Container;

use Closure;
use LogicException;
use RuntimeException;

/** A small explicit singleton container; it does not perform implicit autowiring. */
final class Container
{
    /** @var array<string, Closure(self): object> */
    private array $factories = [];

    /** @var array<string, object> */
    private array $instances = [];

    /** @var array<string, true> */
    private array $resolving = [];

    public function set(string $id, callable $factory): void
    {
        if (isset($this->factories[$id]) || isset($this->instances[$id])) {
            throw new LogicException(sprintf('Service "%s" is already registered.', $id));
        }

        $this->factories[$id] = Closure::fromCallable($factory);
    }

    public function instance(string $id, object $instance): void
    {
        if (isset($this->factories[$id]) || isset($this->instances[$id])) {
            throw new LogicException(sprintf('Service "%s" is already registered.', $id));
        }

        $this->instances[$id] = $instance;
    }

    public function has(string $id): bool
    {
        return isset($this->factories[$id]) || isset($this->instances[$id]);
    }

    public function get(string $id): object
    {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        if (!isset($this->factories[$id])) {
            throw new RuntimeException(sprintf('Service "%s" is not registered.', $id));
        }

        if (isset($this->resolving[$id])) {
            throw new LogicException(sprintf('Circular service dependency detected for "%s".', $id));
        }

        $this->resolving[$id] = true;

        try {
            $instance = ($this->factories[$id])($this);
        } finally {
            unset($this->resolving[$id]);
        }

        if (!is_object($instance)) {
            throw new RuntimeException(sprintf('Factory for "%s" did not return an object.', $id));
        }

        $this->instances[$id] = $instance;

        return $instance;
    }
}
