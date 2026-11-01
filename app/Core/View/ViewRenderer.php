<?php

declare(strict_types=1);

namespace MorphSpace\Core\View;

interface ViewRenderer
{
    /** @param array<string, mixed> $context */
    public function render(string $template, array $context = []): string;
}
