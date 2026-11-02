<?php

declare(strict_types=1);

use MorphSpace\Bootstrap\ApplicationFactory;
use MorphSpace\Core\Http\Request;

$projectRoot = dirname(__DIR__);
$autoloadPath = $projectRoot . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!is_file($autoloadPath)) {
    http_response_code(503);
    header('Content-Type: text/plain; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
    echo 'Application dependencies are not installed.';
    exit;
}

require $autoloadPath;

try {
    $application = ApplicationFactory::create($projectRoot);
    $response = $application->handle(Request::fromGlobals());
    $response->send();
} catch (Throwable $error) {
    error_log(sprintf('[Morph Space] Bootstrap failed: %s', get_class($error)));
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
    echo 'Application bootstrap failed.';
}
