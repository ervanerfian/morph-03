<?php

declare(strict_types=1);

namespace MorphSpace\Bootstrap;

use MorphSpace\Core\Config\Environment;
use MorphSpace\Core\Container\Container;
use MorphSpace\Core\Database\DatabaseHealthCheck;
use MorphSpace\Core\Database\PdoConnectionFactory;
use MorphSpace\Core\Http\Application;
use MorphSpace\Core\Http\Router;
use MorphSpace\Core\Module\ModuleRegistry;
use MorphSpace\Core\View\TwigViewRenderer;
use MorphSpace\Core\View\ViewRenderer;
use PDO;
use RuntimeException;

final class ApplicationFactory
{
    public static function create(string $projectRoot): Application
    {
        Environment::load($projectRoot);

        $environment = Environment::get('APP_ENV', 'local') ?? 'local';
        $databaseConfig = [
            'driver' => Environment::get('DB_DRIVER', 'pgsql') ?? 'pgsql',
            'host' => Environment::required('DB_HOST'),
            'port' => self::integerSetting('DB_PORT'),
            'database' => Environment::required('DB_DATABASE'),
            'username' => Environment::required('DB_USERNAME'),
            'password' => Environment::required('DB_PASSWORD'),
        ];
        $expectedMajorVersion = self::integerSetting('DB_EXPECTED_MAJOR');

        $container = new Container();
        $router = new Router();
        $container->instance(Router::class, $router);

        $container->set(
            PdoConnectionFactory::class,
            static fn (Container $services): PdoConnectionFactory => new PdoConnectionFactory($databaseConfig),
        );
        $container->set(
            PDO::class,
            static fn (Container $services): PDO => $services->get(PdoConnectionFactory::class)->create(),
        );
        $container->set(
            DatabaseHealthCheck::class,
            static fn (Container $services): DatabaseHealthCheck => new DatabaseHealthCheck(
                $services->get(PDO::class),
                $databaseConfig['database'],
                $databaseConfig['username'],
                $databaseConfig['port'],
                $expectedMajorVersion,
            ),
        );
        $container->set(
            ViewRenderer::class,
            static fn (Container $services): TwigViewRenderer => new TwigViewRenderer(
                $projectRoot . DIRECTORY_SEPARATOR . 'templates',
                $environment,
                $projectRoot . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'twig',
            ),
        );

        $moduleManifestPath = $projectRoot . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'modules.php';

        if (!is_file($moduleManifestPath)) {
            throw new RuntimeException('The trusted module manifest is missing.');
        }

        $moduleClasses = require $moduleManifestPath;

        if (!is_array($moduleClasses)) {
            throw new RuntimeException('The trusted module manifest must return an array.');
        }

        (new ModuleRegistry())->register($moduleClasses, $container, $router);

        return new Application($router);
    }

    private static function integerSetting(string $name): int
    {
        $value = Environment::required($name);
        $integer = filter_var($value, FILTER_VALIDATE_INT);

        if ($integer === false || $integer < 1) {
            throw new RuntimeException(sprintf('Environment value "%s" must be a positive integer.', $name));
        }

        return $integer;
    }
}
