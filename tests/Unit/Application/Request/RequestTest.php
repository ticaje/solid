<?php

namespace Test\Unit\Application\Request;

use Solid\Application\Request\Request;
use Solid\Pattern\ActiveRecord\Model\UserInterface;
use Test\Unit\BaseTest;

/**
 * Class RequestTest
 * @package Test\Unit\Application\Request
 */
class RequestTest extends BaseTest
{
    protected $request;

    public function setUp()
    {
        parent::setUp();
        $this->request = new Request();
    }

    public function testGetParams()
    {
        $this->assertIsArray($this->request->getParams());
    }
}
