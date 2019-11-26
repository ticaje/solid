<?php

namespace Solid\Pattern\ActiveRecord\Repository;

use Solid\Pattern\Model\UserInterface as DtoUserInterface;

/**
 * Interface UserRepositoryInterface
 * @package Solid\Pattern\ActiveRecord\Model
 */
interface UserRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id);

    /**
     * @param DtoUserInterface $user
     */
    public function insert(DtoUserInterface $user);

    /**
     * @param DtoUserInterface $user
     */
    public function update(DtoUserInterface $user): void;

    /**
     * @param DtoUserInterface $user
     */
    public function delete(DtoUserInterface $user): void;
}
