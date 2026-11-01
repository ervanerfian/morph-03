<?php

declare(strict_types=1);

namespace MorphSpace\Core\Http;

use JsonException;

final class Response
{
    /** @param array<string, string> $headers */
    public function __construct(
        private readonly int $statusCode,
        private readonly array $headers,
        private readonly string $body,
    ) {
    }

    public static function html(string $body, int $statusCode = 200): self
    {
        return new self($statusCode, [
            'Content-Type' => 'text/html; charset=utf-8',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'no-store',
        ], $body);
    }

    /** @throws JsonException */
    public static function json(array $payload, int $statusCode = 200): self
    {
        return new self($statusCode, [
            'Content-Type' => 'application/json; charset=utf-8',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'no-store',
        ], json_encode($payload, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES));
    }

    public function send(): void
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value, true);
        }

        echo $this->body;
    }
}
