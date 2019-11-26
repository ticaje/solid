<?php
declare(strict_types=1);

namespace Solid\Pattern\ActiveRecord\Adapter\Database;

use Solid\Pattern\Persistence\PersistenceInterface;

/**
 * Interface DatabaseAdapterInterface
 * @package Solid\Pattern\ActiveRecord\Adapter\Database
 */
interface DatabaseAdapterInterface extends PersistenceInterface
{
    /**
     * @param string $table
     * @param array $constraint
     */
    public function select(string $table, array $constraint): void;

    /**
     * @param string $table
     * @param array $data
     */
    public function update(string $table, array $data): void;
}
