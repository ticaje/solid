<?php
declare(strict_types=1);

namespace Solid\Pattern\ActiveRecord\Adapter\Database;

/**
 * Interface DatabaseAdapterInterface
 * @package Solid\Pattern\ActiveRecord\Adapter\Database
 */
interface DatabaseAdapterInterface
{
    /**
     * @param string $table
     * @param array $constraint
     */
    public function select(string $table, array $constraint): void;

    /**
     * @return array
     */
    public function fetch(): array;

    /**
     * @param string $table
     * @param array $data
     */
    public function insert(string $table, array $data): void;

    /**
     * @param string $table
     * @param array $data
     */
    public function update(string $table, array $data): void;

    /**
     * @param string $table
     * @param array $constraint
     */
    public function delete(string $table, array $constraint): void;
}
