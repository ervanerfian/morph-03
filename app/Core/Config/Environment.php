<?php

declare(strict_types=1);

namespace MorphSpace\Core\Config;

use Dotenv\Dotenv;
use RuntimeException;

final class Environment
{
    public static function load(string $projectRoot): void
    {
        if (is_file($projectRoot . DIRECTORY_SEPARATOR . '.env')) {
            Dotenv::createImmutable($projectRoot)->safeLoad();
        }
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);

        if ($value === false || $value === null) {
            return $default;
        }

        if (!is_string($value)) {
            throw new RuntimeException(sprintf('Environment value "%s" must be a string.', $key));
        }

        return $value;
    }

    public static function required(string $key): string
    {
        $value = self::get($key);

        if ($value === null || trim($value) === '') {
            throw new RuntimeException(sprintf('Required environment value "%s" is missing.', $key));
        }

        return $value;
    }
}
