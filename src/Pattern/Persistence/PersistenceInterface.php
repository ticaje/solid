<?php
declare(strict_types=1);

namespace Solid\Pattern\Persistence;

/**
 * Interface PersistenceInterface
 * @package Solid\Pattern\Persistence
 */
interface PersistenceInterface
{
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
     * @param array $constraint
     */
    public function delete(string $table, array $constraint): void;
}
