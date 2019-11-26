<?php

namespace Solid\Domain\Entity;

use Solid\Application\Request\RequestInterface;

/**
 * Class User
 * @package Solid\Domain\Entity
 */
class User implements UserEntity
{
    private $request;

    public function __construct
    (
        RequestInterface $request
    )
    {
        $this->request = $request;
    }

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
