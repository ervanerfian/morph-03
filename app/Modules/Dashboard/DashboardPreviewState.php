<?php

declare(strict_types=1);

namespace MorphSpace\Modules\Dashboard;

/**
 * Validated, non-persistent state for the public dashboard-builder preview.
 * Only registered block and presentation IDs are accepted from the query string.
 */
final readonly class DashboardPreviewState
{
    private const MAX_PREVIEW_BLOCKS = 24;

    /** @var array<string, string> */
    private const PERIODS = [
        '7d' => 'Last 7 days',
        '30d' => 'Last 30 days',
        '90d' => 'Last 90 days',
        'all' => 'All available time',
    ];

    /** @var array<string, string> */
    private const DENSITIES = [
        'comfortable' => 'Comfortable',
        'compact' => 'Compact',
    ];

    /**
     * @param list<array{definition: array<string, mixed>, presentation: string}> $entries
     */
    private function __construct(
        private array $entries,
        private string $period,
        private string $density,
        private bool $truncatedBlockInput,
    ) {
    }

    /** @param array<string, mixed> $query */
    public static function fromQuery(array $query, DashboardBlockCatalog $catalog): self
    {
        $rawBlocks = $query['blocks'] ?? [];
        $rawBlocks = is_array($rawBlocks) ? array_values($rawBlocks) : [];
        $truncatedBlockInput = count($rawBlocks) > self::MAX_PREVIEW_BLOCKS;
        $entries = [];

        foreach (array_slice($rawBlocks, 0, self::MAX_PREVIEW_BLOCKS) as $rawBlock) {
            if (!is_string($rawBlock) || strlen($rawBlock) > 128) {
                continue;
            }

            $parts = explode(':', $rawBlock, 2);
            $blockId = $parts[0] ?? '';
            $definition = $catalog->find($blockId);

            if ($definition === null) {
                continue;
            }

            $presentation = $parts[1] ?? $definition['defaultPresentation'];

            if (!is_string($presentation) || !array_key_exists($presentation, $definition['presentations'])) {
                $presentation = $definition['defaultPresentation'];
            }

            $entries[] = [
                'definition' => $definition,
                'presentation' => $presentation,
            ];
        }

        $period = $query['period'] ?? '30d';

        if (!is_string($period) || !array_key_exists($period, self::PERIODS)) {
            $period = '30d';
        }

        $density = $query['density'] ?? 'comfortable';

        if (!is_string($density) || !array_key_exists($density, self::DENSITIES)) {
            $density = 'comfortable';
        }

        return new self($entries, $period, $density, $truncatedBlockInput);
    }

    /** @return list<string> */
    public function blockValues(): array
    {
        return array_map(
            static fn (array $entry): string => $entry['definition']['id'] . ':' . $entry['presentation'],
            $this->entries,
        );
    }

    /** @return list<array<string, mixed>> */
    public function blocks(): array
    {
        $values = $this->blockValues();
        $blocks = [];

        foreach ($this->entries as $index => $entry) {
            $definition = $entry['definition'];
            $presentation = $entry['presentation'];
            $presentationOptions = [];

            foreach ($definition['presentations'] as $key => $label) {
                $presentationOptions[] = [
                    'value' => $definition['id'] . ':' . $key,
                    'label' => $label,
                    'selected' => $key === $presentation,
                ];
            }

            $removeValues = $values;
            array_splice($removeValues, $index, 1);

            $moveUpValues = null;

            if ($index > 0) {
                $moveUpValues = $values;
                [$moveUpValues[$index - 1], $moveUpValues[$index]] = [
                    $moveUpValues[$index],
                    $moveUpValues[$index - 1],
                ];
            }

            $moveDownValues = null;

            if ($index < count($values) - 1) {
                $moveDownValues = $values;
                [$moveDownValues[$index], $moveDownValues[$index + 1]] = [
                    $moveDownValues[$index + 1],
                    $moveDownValues[$index],
                ];
            }

            $blocks[] = [
                'index' => $index,
                'id' => $definition['id'],
                'label' => $definition['label'],
                'category' => $definition['category'],
                'description' => $definition['description'],
                'presentationLabel' => $definition['presentations'][$presentation],
                'presentations' => $presentationOptions,
                'settings' => $definition['settings'],
                'removeValues' => $removeValues,
                'moveUpValues' => $moveUpValues,
                'moveDownValues' => $moveDownValues,
            ];
        }

        return $blocks;
    }

    /** @return list<array{value: string, label: string, selected: bool}> */
    public function periodOptions(): array
    {
        return $this->options(self::PERIODS, $this->period);
    }

    /** @return list<array{value: string, label: string, selected: bool}> */
    public function densityOptions(): array
    {
        return $this->options(self::DENSITIES, $this->density);
    }

    public function period(): string
    {
        return $this->period;
    }

    public function density(): string
    {
        return $this->density;
    }

    public function isAtCapacity(): bool
    {
        return count($this->entries) >= self::MAX_PREVIEW_BLOCKS;
    }

    public function hasTruncatedBlockInput(): bool
    {
        return $this->truncatedBlockInput;
    }

    public function previewBlockLimit(): int
    {
        return self::MAX_PREVIEW_BLOCKS;
    }

    /** @param array<string, string> $options
     *  @return list<array{value: string, label: string, selected: bool}>
     */
    private function options(array $options, string $selectedValue): array
    {
        $result = [];

        foreach ($options as $value => $label) {
            $result[] = [
                'value' => $value,
                'label' => $label,
                'selected' => $value === $selectedValue,
            ];
        }

        return $result;
    }
}
