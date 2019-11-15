<?php

namespace Solid\Application\Request;

class Request implements RequestInterface
{
    public function getParams(string $key = '', $value = null)
    {
        return [];
    }
}
