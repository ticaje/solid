<?php

namespace Solid\Pattern\ActiveRecord\Repository;

use Solid\Pattern\ActiveRecord\Adapter\Database\DatabaseAdapterInterface;
use Solid\Pattern\Model\UserInterface as DtoUserInterface;

/**
 * Class User
 * @package Solid\Pattern\ActiveRecord\Repository
 */
class User implements UserRepositoryInterface
{
    private $db;

    private $table = "users";

    /**
     * User constructor.
     * @param DatabaseAdapterInterface $db
     */
    public function __construct
    (
        DatabaseAdapterInterface $db
    )
    {
        $this->db = $db;
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id)
    {
        $this->db->select($this->table, ["id" => $id]);
        if (!$row = $this->db->fetch()) {
            return null;
        }
        $user = new \Solid\Pattern\Model\User();
        $user->setId($row["id"])
            ->setName($row["name"])
            ->setEmail($row["email"]);
        return $user;
    }

    /**
     * @inheritDoc
     */
    public function insert(DtoUserInterface $user)
    {
        $data = [
            "name" => $user->getName(),
            "email" => $user->getEmail()
        ];
        $this->db->insert($this->table, $data);
        return $user;
    }

    /**
     * @inheritDoc
     */
    public function update(DtoUserInterface $user): void
    {
        $data = [
            "name" => $user->getName(),
            "email" => $user->getEmail()
        ];
        $constraint = [
            "id" => "{$this->id}"
        ];
        $this->db->update($this->table, $data, $constraint);
    }

    /**
     * @inheritDoc
     */
    public function delete(DtoUserInterface $user): void
    {
        $constraint = [
            "id" => "{$user->getId()}"
        ];
        $this->db->delete($this->table, $constraint);
    }
}
