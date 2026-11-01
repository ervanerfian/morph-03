<?php

declare(strict_types=1);

namespace MorphSpace\Core\Module;

use InvalidArgumentException;
use MorphSpace\Core\Container\Container;
use MorphSpace\Core\Http\Router;

final class ModuleRegistry
{
    /** @param list<class-string<ModuleProvider>> $moduleClasses */
    public function register(array $moduleClasses, Container $container, Router $router): void
    {
        $registered = [];

        foreach ($moduleClasses as $moduleClass) {
            if (!is_string($moduleClass) || !is_a($moduleClass, ModuleProvider::class, true)) {
                throw new InvalidArgumentException('The trusted module manifest contains an invalid module provider.');
            }

            if (isset($registered[$moduleClass])) {
                throw new InvalidArgumentException(sprintf('Module "%s" is registered more than once.', $moduleClass));
            }

            $registered[$moduleClass] = true;
            $module = new $moduleClass();
            $module->register($container, $router);
        }
    }
}
