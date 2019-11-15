<?php

namespace Solid\Pattern\ActiveRecord\Model;

/**
 * Interface UserInterface
 * @package Solid\Pattern\ActiveRecord\Model
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

    /**
     * @param int $size
     * @param string $default
     * @return string
     */
    public function getGravatar(int $size, string $default): string;

    /**
     * @param int $id
     * @return UserInterface|null
     */
    public function findById(int $id): UserInterface;

    public function insert(): void;

    public function update(): void;

    public function delete(): void;
}
