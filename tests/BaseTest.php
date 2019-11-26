<?php

use Solid\Domain\Base;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseTest
 */
class BaseTest extends TestCase
{
    protected $base;

    public function setUp()
    {
        $this->base = new Base();
    }
}
