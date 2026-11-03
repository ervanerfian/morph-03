<?php

declare(strict_types=1);

namespace MorphSpace\Modules\System;

use MorphSpace\Core\Container\Container;
use MorphSpace\Core\Database\DatabaseHealthCheck;
use MorphSpace\Core\Http\Request;
use MorphSpace\Core\Http\Response;
use MorphSpace\Core\Http\Router;
use MorphSpace\Core\Module\ModuleProvider;
use MorphSpace\Core\View\ViewRenderer;

final class SystemModule implements ModuleProvider
{
    public function register(Container $container, Router $router): void
    {
        $router->get('/', static function (Request $request) use ($container): Response {
            /** @var ViewRenderer $views */
            $views = $container->get(ViewRenderer::class);

            return Response::html($views->render('system/home.twig', [
                'appName' => 'Morph Space',
                'activeNav' => 'overview',
            ]));
        });

        $router->get('/healthz', static function (Request $request): Response {
            return Response::json(['status' => 'ok']);
        });

        $router->get('/readyz', static function (Request $request) use ($container): Response {
            /** @var DatabaseHealthCheck $databaseHealth */
            $databaseHealth = $container->get(DatabaseHealthCheck::class);
            $ready = $databaseHealth->isReady();

            return Response::json(
                ['status' => $ready ? 'ready' : 'not_ready'],
                $ready ? 200 : 503,
            );
        });
    }
}
