<?php

use Solid\Pattern\ActiveRecord\Model\User as UserEntity;
use Solid\Pattern\ActiveRecord\Adapter\Database\Mysql as DbAdapter;
use Solid\Application\Request\Request;
use Solid\Pattern\ActiveRecord\Model\UserInterface;

/**
 * Class UserTest
 */
class UserTest extends BaseTest
{
    /** @var UserInterface $userEntity */
    protected $userEntity;

    public function setUp()
    {
        parent::setUp();
        $db = new DbAdapter();
        $request = new Request();
        $this->userEntity = new UserEntity($db, $request);
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

    public function testGetGravatar()
    {
        $email = 'pepe@gmail.com';
        $this->userEntity->setEmail($email);
        $this->assertIsString($this->userEntity->getGravatar());
        $this->assertContains('gravatar', $this->userEntity->getGravatar());
    }

    public function testUserValidation()
    {
        $this->assertFalse($this->userEntity->validateUserInput());
    }
}
