<?php

declare(strict_types=1);

namespace MorphSpace\Core\Http;

use Closure;
use LogicException;
use Throwable;

final class Router
{
    /** @var array<string, array<string, Closure(Request): Response>> */
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function add(string $method, string $path, callable $handler): void
    {
        $method = strtoupper($method);
        $path = $this->normalizePath($path);

        if (isset($this->routes[$method][$path])) {
            throw new LogicException(sprintf('Route %s %s is already registered.', $method, $path));
        }

        $this->routes[$method][$path] = Closure::fromCallable($handler);
    }

    public function dispatch(Request $request): Response
    {
        $handler = $this->routes[$request->method()][$request->path()] ?? null;

        if ($handler === null) {
            return Response::html(
                '<!doctype html><html lang="en"><meta charset="utf-8"><title>Not found</title><h1>Not found</h1>',
                404,
            );
        }

        try {
            $response = $handler($request);
        } catch (Throwable $error) {
            throw $error;
        }

        if (!$response instanceof Response) {
            throw new LogicException('A route handler must return an HTTP response.');
        }

        return $response;
    }

    private function normalizePath(string $path): string
    {
        $parsedPath = parse_url($path, PHP_URL_PATH);
        $path = is_string($parsedPath) && $parsedPath !== '' ? $parsedPath : '/';

        if ($path[0] !== '/') {
            $path = '/' . $path;
        }

        return $path === '/' ? '/' : rtrim($path, '/');
    }
}
