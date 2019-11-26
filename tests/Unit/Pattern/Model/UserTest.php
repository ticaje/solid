<?php

namespace Test\Unit\Pattern\Model;

use Solid\Pattern\Model\User as UserEntity;
use Solid\Pattern\Model\UserInterface;
use Test\Unit\BaseTest;

/**
 * Class UserTest
 * @package Test\Unit\Pattern\Model
 */
class UserTest extends BaseTest
{
    /** @var UserInterface $userEntity */
    protected $userEntity;

    public function setUp()
    {
        parent::setUp();
        $this->userEntity = new UserEntity();
    }

    public function testSetter()
    {
        $email = 'pepe@gmail.com';
        $mocked = $this->getMockBuilder(UserEntity::class)->disableOriginalConstructor()->getMock();
        $mocked->expects($this->any())
            ->method('setId')
            ->with($this->isType('int'));
        $mocked->expects($this->any())
            ->method('setName')
            ->with($this->isType('string'));
        $mocked->expects($this->any())
            ->method('setEmail')
            ->with($this->isType('string'))
        ;
        $mocked->setId(1);
        $mocked->setName('Pepes');
        $this->assertInstanceOf(UserInterface::class, $mocked->setEmail($email));
        $this->assertRegExp('/^.+\@\S+\.\S+$/', $email, 'Email field is actually an email');
    }

    public function testGetter()
    {
        $this->userEntity->setId(2);
        $this->assertIsInt($this->userEntity->getId(), 'Returns an Integer');
        $email = 'pepe@gmail.com';
        $this->userEntity->setEmail($email);
        $this->assertIsString($this->userEntity->getEmail());
        $this->userEntity->setName('Pepe');
        $this->assertIsString($this->userEntity->getName());
        $this->assertNotEmpty($this->userEntity->getName());
    }
}
