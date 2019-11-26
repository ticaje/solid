<?php
declare(strict_types=1);

namespace Solid\Application\Request;

/**
 * Interface RequestInterface
 * @package Solid\Application\Request
 */
interface RequestInterface
{
    /**
     * @param string $key
     * @param null $value
     * @return mixed
     */
    public function getParams(string $key = '', $value = null);
}