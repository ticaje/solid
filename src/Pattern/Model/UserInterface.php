<?php

namespace Solid\Pattern\Model;

/**
 * Interface UserInterface
 * @package Solid\Pattern\Model
 */
interface UserInterface
{
    /**
     * @param int $id
     * @return UserInterface
     */
    public function setId(int $id): UserInterface;

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param $name
     * @return UserInterface
     */
    public function setName($name): UserInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param $email
     * @return UserInterface
     */
    public function setEmail($email): UserInterface;

    /**
     * @return string
     */
    public function getEmail(): string;
}
