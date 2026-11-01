<?php

declare(strict_types=1);

namespace MorphSpace\Core\Database;

use PDO;
use Throwable;

final class DatabaseHealthCheck
{
    public function __construct(
        private readonly PDO $pdo,
        private readonly string $expectedDatabase,
        private readonly string $expectedUsername,
        private readonly int $expectedPort,
        private readonly int $expectedMajorVersion,
    ) {
    }

    public function isReady(): bool
    {
        try {
            $statement = $this->pdo->query(
                'SELECT current_database() AS database_name,
                        current_user AS role_name,
                        inet_server_port() AS server_port,
                        current_setting(\'server_version_num\') AS server_version_num',
            );
            $identity = $statement->fetch(PDO::FETCH_ASSOC);

            if (!is_array($identity)) {
                return false;
            }

            $serverVersionNumber = filter_var($identity['server_version_num'] ?? null, FILTER_VALIDATE_INT);

            if ($serverVersionNumber === false) {
                return false;
            }

            $serverMajorVersion = intdiv($serverVersionNumber, 10000);

            return ($identity['database_name'] ?? null) === $this->expectedDatabase
                && ($identity['role_name'] ?? null) === $this->expectedUsername
                && (int) ($identity['server_port'] ?? 0) === $this->expectedPort
                && $serverMajorVersion === $this->expectedMajorVersion;
        } catch (Throwable) {
            return false;
        }
    }
}
