<?php

namespace Solid\Domain\Entity;

/**
 * Interface UserEntity
 * @package Solid\Domain\Entity
 */
interface UserEntity
{
    /**
     * @param int $size
     * @param string $default
     * @return string
     */
    public function getGravatar(int $size, string $default): string;
}
