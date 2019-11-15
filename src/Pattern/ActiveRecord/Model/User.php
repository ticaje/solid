<?php

namespace Solid\Pattern\ActiveRecord\Model;

use Solid\Application\Request\RequestInterface;
use Solid\Pattern\ActiveRecord\Adapter\Database\DatabaseAdapterInterface;

/**
 * Class User
 * @package Solid\Pattern\ActiveRecord\Model
 */
class User implements UserInterface
{
    private $id;

    private $name;

    private $email;

    private $db;

    private $table = "users";

    private $request;

    private $exceptedData = ['name', 'email'];

    public function __construct
    (
        DatabaseAdapterInterface $db,
        RequestInterface $request
    )
    {
        $this->db = $db;
        $this->request = $request;
    }

    public function setId(int $id): UserInterface
    {
        // Some business logic(validations...)
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName($name): UserInterface
    {
        // Some business logic(validations...)
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail($email): UserInterface
    {
        // Some business logic(validations...)
        $this->email = $email;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getGravatar(int $size = 70, string $default = "monsterid"): string
    {
        return "http://www.gravatar.com/avatar/" .
            md5(strtolower($this->getEmail())) .
            "?s=" . (integer)$size .
            "&d=" . urlencode($default) .
            "&r=G";
    }

    public function findById(int $id): UserInterface
    {
        $this->db->select($this->table, ["id" => $id]);
        if (!$row = $this->db->fetch()) {
            return null;
        }
        $user = new User($this->db);
        $user->setId($row["id"])
            ->setName($row["name"])
            ->setEmail($row["email"]);
        return $user;
    }

    public function insert(): void
    {
        if ($this->validateUserInput()) {
            $data = $this->request->getParams();
            $this->setName($data['name']);
            $this->setEmail($data['email']);
        }
        $this->db->insert($this->table, [
            "name" => $this->getName(),
            "email" => $this->getEmail()
        ]);
    }

    public function update(): void
    {
        if ($this->validateUserInput()) {
            $data = $this->request->getParams();
            $this->setName($data['name']);
            $this->setEmail($data['email']);
        }
        $data = [
            "name" => $this->getName(),
            "email" => $this->getEmail()
        ];
        $constraint = [
            "id" => "{$this->id}"
        ];
        $this->db->update($this->table, $data, $constraint);
    }

    public function delete(): void
    {
        $constraint = [
            "id" => "{$this->id}"
        ];
        $this->db->delete($this->table, $constraint);
    }

    public function validateUserInput()
    {
        // Some business rule to data input
        $data = $this->request->getParams();
        return !empty(array_diff(array_keys($data), $this->exceptedData));
    }
}
