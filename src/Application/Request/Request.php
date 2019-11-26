<?php
declare(strict_types=1);

namespace Solid\Application\Request;

/**
 * Class Request
 * @package Solid\Application\Request
 */
class Request implements RequestInterface
{
    public function getParams(string $key = '', $value = null)
    {
        return [];
    }
}
