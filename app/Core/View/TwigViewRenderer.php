<?php

declare(strict_types=1);

namespace MorphSpace\Core\View;

use RuntimeException;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class TwigViewRenderer implements ViewRenderer
{
    private Environment $twig;

    public function __construct(string $templateDirectory, string $environment, string $cacheDirectory)
    {
        if (!is_dir($templateDirectory)) {
            throw new RuntimeException('The configured template directory is missing.');
        }

        $isProduction = $environment === 'production';

        if ($isProduction && !is_dir($cacheDirectory) && !mkdir($cacheDirectory, 0770, true) && !is_dir($cacheDirectory)) {
            throw new RuntimeException('The Twig cache directory could not be created.');
        }

        $loader = new FilesystemLoader($templateDirectory);
        $this->twig = new Environment($loader, [
            'autoescape' => 'html',
            'cache' => $isProduction ? $cacheDirectory : false,
            'strict_variables' => true,
            'auto_reload' => !$isProduction,
        ]);
    }

    public function render(string $template, array $context = []): string
    {
        return $this->twig->render($template, $context);
    }
}
