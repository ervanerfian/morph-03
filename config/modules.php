<?php

declare(strict_types=1);

use MorphSpace\Modules\Dashboard\DashboardModule;
use MorphSpace\Modules\System\SystemModule;

/*
 * This manifest is trusted application configuration. Do not populate it from
 * workspace, template, request, or other user-controlled data.
 */
return [
    SystemModule::class,
    DashboardModule::class,
];
