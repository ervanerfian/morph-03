<?php

declare(strict_types=1);

namespace MorphSpace\Modules\Dashboard;

use InvalidArgumentException;

/**
 * Trusted registry of dashboard block capabilities contributed by application modules.
 * User input can select a registered definition; it cannot introduce executable behavior.
 */
final class DashboardBlockCatalog
{
    /** @var array<string, array<string, mixed>> */
    private array $definitions = [];

    /** @param iterable<array<string, mixed>> $definitions */
    public function __construct(iterable $definitions = [])
    {
        foreach ($definitions as $definition) {
            $this->register($definition);
        }
    }

    /** @param array<string, mixed> $definition */
    public function register(array $definition): void
    {
        $id = $definition['id'] ?? null;
        $label = $definition['label'] ?? null;
        $category = $definition['category'] ?? null;
        $description = $definition['description'] ?? null;
        $defaultPresentation = $definition['defaultPresentation'] ?? null;
        $presentations = $definition['presentations'] ?? null;
        $settings = $definition['settings'] ?? [];

        if (
            !is_string($id)
            || preg_match('/^[a-z][a-z0-9-]{0,63}$/D', $id) !== 1
            || !is_string($label)
            || trim($label) === ''
            || !is_string($category)
            || trim($category) === ''
            || !is_string($description)
            || trim($description) === ''
        ) {
            throw new InvalidArgumentException('A dashboard block needs a valid ID, label, category, and description.');
        }

        if (isset($this->definitions[$id])) {
            throw new InvalidArgumentException(sprintf('Dashboard block "%s" is registered more than once.', $id));
        }

        if (!is_array($presentations) || $presentations === [] || !is_string($defaultPresentation)) {
            throw new InvalidArgumentException(sprintf('Dashboard block "%s" needs presentation options and a default.', $id));
        }

        $normalizedPresentations = [];

        foreach ($presentations as $key => $presentationLabel) {
            if (
                !is_string($key)
                || preg_match('/^[a-z][a-z0-9-]{0,63}$/D', $key) !== 1
                || !is_string($presentationLabel)
                || trim($presentationLabel) === ''
            ) {
                throw new InvalidArgumentException(sprintf('Dashboard block "%s" has an invalid presentation option.', $id));
            }

            $normalizedPresentations[$key] = trim($presentationLabel);
        }

        if (!array_key_exists($defaultPresentation, $normalizedPresentations)) {
            throw new InvalidArgumentException(sprintf('Dashboard block "%s" has an unknown default presentation.', $id));
        }

        if (!is_array($settings)) {
            throw new InvalidArgumentException(sprintf('Dashboard block "%s" settings must be a list.', $id));
        }

        $normalizedSettings = [];

        foreach ($settings as $setting) {
            if (
                !is_array($setting)
                || !is_string($setting['label'] ?? null)
                || trim($setting['label']) === ''
                || !is_string($setting['description'] ?? null)
                || trim($setting['description']) === ''
            ) {
                throw new InvalidArgumentException(sprintf('Dashboard block "%s" has an invalid setting description.', $id));
            }

            $normalizedSettings[] = [
                'label' => trim($setting['label']),
                'description' => trim($setting['description']),
            ];
        }

        $this->definitions[$id] = [
            'id' => $id,
            'label' => trim($label),
            'category' => trim($category),
            'description' => trim($description),
            'defaultPresentation' => $defaultPresentation,
            'presentations' => $normalizedPresentations,
            'settings' => $normalizedSettings,
        ];
    }

    /** @return list<array<string, mixed>> */
    public function all(): array
    {
        return array_values($this->definitions);
    }

    /** @return array<string, mixed>|null */
    public function find(string $id): ?array
    {
        return $this->definitions[$id] ?? null;
    }
}
