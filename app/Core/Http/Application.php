<?php

declare(strict_types=1);

namespace MorphSpace\Core\Http;

use Throwable;

final class Application
{
    public function __construct(private readonly Router $router)
    {
    }

    public function handle(Request $request): Response
    {
        try {
            return $this->router->dispatch($request);
        } catch (Throwable $error) {
            // Avoid leaking exception details, SQL or credentials to the client.
            error_log(sprintf('[Morph Space] Unhandled request exception: %s', get_class($error)));

            return Response::html(
                '<!doctype html><html lang="en"><meta charset="utf-8"><title>Server error</title><h1>Internal server error</h1>',
                500,
            );
        }
    }
}
