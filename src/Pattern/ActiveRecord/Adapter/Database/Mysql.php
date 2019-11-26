<?php
declare(strict_types=1);

namespace Solid\Pattern\ActiveRecord\Adapter\Database;

/**
 * Class Mysql
 * @package Solid\Pattern\ActiveRecord\Adapter\Database
 */
class Mysql implements DatabaseAdapterInterface
{
    public function fetch(): array
    {
        return [];
    }

    public function delete(string $table, array $constraint): void
    {
        // TODO: Implement delete() method.
    }

    public function persist(string $table, array $data): void
    {
        // TODO: Implement insert() method.
    }

    public function select(string $table, array $constraint): void
    {
        // TODO: Implement select() method.
    }
}
