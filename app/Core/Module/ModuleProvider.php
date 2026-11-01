<?php

declare(strict_types=1);

namespace MorphSpace\Core\Module;

use MorphSpace\Core\Container\Container;
use MorphSpace\Core\Http\Router;

interface ModuleProvider
{
    public function register(Container $container, Router $router): void;
}
