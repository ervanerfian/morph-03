<?php

declare(strict_types=1);

namespace MorphSpace\Core\Database;

use InvalidArgumentException;
use PDO;
use RuntimeException;

final class PdoConnectionFactory
{
    /** @param array{driver:string,host:string,port:int,database:string,username:string,password:string} $config */
    public function __construct(private readonly array $config)
    {
    }

    public function create(): PDO
    {
        if (($this->config['driver'] ?? null) !== 'pgsql') {
            throw new InvalidArgumentException('Only the declared PostgreSQL driver is supported; no implicit fallback is available.');
        }

        if (!extension_loaded('pdo_pgsql')) {
            throw new RuntimeException('The active PHP runtime must load pdo_pgsql.');
        }

        $host = $this->dsnValue('host');
        $database = $this->dsnValue('database');
        $username = $this->config['username'] ?? '';
        $password = $this->config['password'] ?? '';
        $port = filter_var(
            $this->config['port'] ?? null,
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1, 'max_range' => 65535]],
        );

        if (!is_string($username) || trim($username) === '') {
            throw new InvalidArgumentException('DB_USERNAME must be configured.');
        }

        if (!is_string($password) || $password === '') {
            throw new InvalidArgumentException('DB_PASSWORD must be configured in the local environment.');
        }

        if ($port === false) {
            throw new InvalidArgumentException('DB_PORT must be an integer from 1 through 65535.');
        }

        $dsn = sprintf('pgsql:host=%s;port=%d;dbname=%s', $host, $port, $database);

        return new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_STRINGIFY_FETCHES => false,
        ]);
    }

    private function dsnValue(string $key): string
    {
        $value = $this->config[$key] ?? null;

        if (!is_string($value) || trim($value) === '') {
            throw new InvalidArgumentException(sprintf('DB_%s must be configured.', strtoupper($key)));
        }

        if (str_contains($value, ';') || str_contains($value, "\0")) {
            throw new InvalidArgumentException(sprintf('DB_%s contains a character that is not valid in the PDO DSN.', strtoupper($key)));
        }

        return $value;
    }
}
