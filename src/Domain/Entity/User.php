<?php
declare(strict_types=1);

namespace Solid\Domain\Entity;

/**
 * Class User
 * @package Solid\Domain\Entity
 */
class User implements UserEntity
{
    /**
     * @inheritDoc
     */
    public function getGravatar(int $size = 70, string $default = "monsterid"): string
    {
        return "http://www.gravatar.com/avatar/" .
            md5(strtolower($this->getEmail())) .
            "?s=" . (integer)$size .
            "&d=" . urlencode($default) .
            "&r=G";
    }
}
