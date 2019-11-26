<?php

namespace Solid\Pattern\ActiveRecord\Adapter\Database;

class Mysql implements DatabaseAdapterInterface
{
    public function fetch(): array
    {
        return [];
    }

    public function update(string $table, array $data): void
    {
        // TODO: Implement update() method.
    }

    public function delete(string $table, array $constraint): void
    {
        // TODO: Implement delete() method.
    }

    public function insert(string $table, array $data): void
    {
        // TODO: Implement insert() method.
    }

    public function select(string $table, array $constraint): void
    {
        // TODO: Implement select() method.
    }
}
