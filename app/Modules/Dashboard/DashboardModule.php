<?php

declare(strict_types=1);

namespace MorphSpace\Modules\Dashboard;

use InvalidArgumentException;
use MorphSpace\Core\Container\Container;
use MorphSpace\Core\Http\Request;
use MorphSpace\Core\Http\Response;
use MorphSpace\Core\Http\Router;
use MorphSpace\Core\Module\ModuleProvider;
use MorphSpace\Core\View\ViewRenderer;

final class DashboardModule implements ModuleProvider
{
    public function register(Container $container, Router $router): void
    {
        $definitions = require __DIR__ . DIRECTORY_SEPARATOR . 'block-catalog.php';

        if (!is_array($definitions)) {
            throw new InvalidArgumentException('The trusted dashboard block catalog must return an array.');
        }

        $catalog = new DashboardBlockCatalog($definitions);
        $container->instance(DashboardBlockCatalog::class, $catalog);

        $router->get('/dashboards', static function (Request $request) use ($container): Response {
            /** @var ViewRenderer $views */
            $views = $container->get(ViewRenderer::class);

            return Response::html($views->render('dashboard/index-preview.twig', [
                'appName' => 'Morph Space',
                'activeNav' => 'dashboards',
                'previewLabel' => 'DASHBOARD CATALOG PREVIEW',
            ]));
        });

        $router->get('/dashboards/preview', static function (Request $request) use ($catalog, $container): Response {
            /** @var ViewRenderer $views */
            $views = $container->get(ViewRenderer::class);
            $state = DashboardPreviewState::fromQuery($request->query(), $catalog);

            return Response::html($views->render('dashboard/builder-preview.twig', [
                'appName' => 'Morph Space',
                'activeNav' => 'dashboards',
                'previewLabel' => 'DASHBOARD BUILDER PREVIEW',
                'blockCatalog' => $catalog->all(),
                'blocks' => $state->blocks(),
                'blockValues' => $state->blockValues(),
                'period' => $state->period(),
                'periodOptions' => $state->periodOptions(),
                'density' => $state->density(),
                'densityOptions' => $state->densityOptions(),
                'blockLimitReached' => $state->isAtCapacity(),
                'previewBlockLimit' => $state->previewBlockLimit(),
                'truncatedBlockInput' => $state->hasTruncatedBlockInput(),
            ]));
        });
    }
}
