<?php

declare(strict_types=1);

/*
 * Trusted, module-owned capability metadata. Other modules may extend the
 * DashboardBlockCatalog during bootstrap; this list is not a closed user type system.
 */
return [
    [
        'id' => 'metric',
        'label' => 'Metric',
        'category' => 'Summary',
        'description' => 'Show one useful value from an authorized Data Source.',
        'defaultPresentation' => 'value',
        'presentations' => [
            'value' => 'Single value',
            'sparkline' => 'Value with trend',
        ],
        'settings' => [
            ['label' => 'Data Source', 'description' => 'Choose a Data Source available to the active workspace.'],
            ['label' => 'Measure', 'description' => 'Choose a Field and a supported aggregation.'],
            ['label' => 'Comparison', 'description' => 'Optionally compare with another authorized time period.'],
        ],
    ],
    [
        'id' => 'trend',
        'label' => 'Trend',
        'category' => 'Time series',
        'description' => 'Follow a Field across a time axis.',
        'defaultPresentation' => 'line',
        'presentations' => [
            'line' => 'Line',
            'area' => 'Area',
            'bar' => 'Columns',
        ],
        'settings' => [
            ['label' => 'Data Source', 'description' => 'Choose a Data Source available to the active workspace.'],
            ['label' => 'Time Field', 'description' => 'Select a date/time Field that the source exposes.'],
            ['label' => 'Measure', 'description' => 'Choose the Field and aggregation to plot.'],
            ['label' => 'Filters', 'description' => 'Add only filters supported by the selected source and Fields.'],
        ],
    ],
    [
        'id' => 'records',
        'label' => 'Records table',
        'category' => 'Records',
        'description' => 'Show an authorized Table View with the Fields people need.',
        'defaultPresentation' => 'table',
        'presentations' => [
            'table' => 'Full table',
            'compact' => 'Compact list',
        ],
        'settings' => [
            ['label' => 'Data Source', 'description' => 'Choose a Data Source available to the active workspace.'],
            ['label' => 'Table View', 'description' => 'Select a view that controls Field visibility, order, and labels.'],
            ['label' => 'Filters and sorting', 'description' => 'Set view-level filters and ordering without changing canonical records.'],
        ],
    ],
    [
        'id' => 'breakdown',
        'label' => 'Breakdown',
        'category' => 'Distribution',
        'description' => 'Compare grouped values from a Data Source.',
        'defaultPresentation' => 'bar',
        'presentations' => [
            'bar' => 'Bars',
            'donut' => 'Donut',
            'list' => 'Ranked list',
        ],
        'settings' => [
            ['label' => 'Data Source', 'description' => 'Choose a Data Source available to the active workspace.'],
            ['label' => 'Group by', 'description' => 'Choose a Field whose values can safely be grouped.'],
            ['label' => 'Measure', 'description' => 'Choose a count or supported numeric aggregation.'],
            ['label' => 'Filters', 'description' => 'Narrow results using Fields the current user may access.'],
        ],
    ],
];
