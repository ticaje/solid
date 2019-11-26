<?php

namespace Solid\Pattern\Model;

/**
 * Class User
 * @package Solid\Pattern\Model
 */
class User implements UserInterface
{
    private $id;

    private $name;

    private $email;

    /**
     * @inheritDoc
     */
    public function setId(int $id): UserInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setName($name): UserInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email): UserInterface
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEmail(): string
    {
        return $this->email;
    }

}
