<?php
declare(strict_types=1);

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
        $this->db->persist($this->table, $data);
        return $user;
    }

    /**
     * @inheritDoc
     */
    public function update(DtoUserInterface $user): void
    {
        $persisted = $this->findById($user->getId());
        if ($persisted){
            $data = [
                "name" => $user->getName(),
                "email" => $user->getEmail()
            ];
            $constraint = [
                "id" => "{$persisted->getId()}"
            ];
            $this->db->persist($this->table, $data, $constraint);
        }
    }

    /**
     * @inheritDoc
     */
    public function delete(DtoUserInterface $user): void
    {
        $persisted = $this->findById($user->getId());
        if ($persisted) {
            $constraint = [
                "id" => "{$user->getId()}"
            ];
            $this->db->delete($this->table, $constraint);
        }
    }
}
