<?php

declare(strict_types=1);

namespace MorphSpace\Core\Http;

final class Request
{
    /** @param array<string, mixed> $query */
    public function __construct(
        private readonly string $method,
        private readonly string $path,
        private readonly array $query = [],
    ) {
    }

    public static function fromGlobals(): self
    {
        $method = strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET'));
        $requestUri = (string) ($_SERVER['REQUEST_URI'] ?? '/');
        $path = parse_url($requestUri, PHP_URL_PATH);

        if (!is_string($path) || $path === '') {
            $path = '/';
        }

        if ($path[0] !== '/') {
            $path = '/' . $path;
        }

        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        $query = $_GET ?? [];

        return new self($method, $path, is_array($query) ? $query : []);
    }

    public function method(): string
    {
        return $this->method;
    }

    public function path(): string
    {
        return $this->path;
    }

    /** @return array<string, mixed> Untrusted query values from the incoming request. */
    public function query(): array
    {
        return $this->query;
    }
}
