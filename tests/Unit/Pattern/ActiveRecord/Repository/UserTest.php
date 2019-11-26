<?php
declare(strict_types=1);

namespace Test\Unit\Pattern\ActiveRecord\Repository;

use Solid\Pattern\ActiveRecord\Adapter\Database\Mysql;
use Solid\Pattern\ActiveRecord\Repository\User;
use Solid\Pattern\Model\User as UserDto;
use Solid\Pattern\Model\UserInterface;
use Test\Unit\BaseTest;

/**
 * Class UserTest
 * @package Test\Unit\Pattern\ActiveRecord\Repository
 */
class UserTest extends BaseTest
{
    protected $userRepository;

    public function setUp()
    {
        $dbAdapter = new Mysql();
        $this->userRepository = new User($dbAdapter);
        parent::setUp();
    }

    public function testFindById()
    {
        $this->assertNull($this->userRepository->findById(1), 'When user does not exist returns null');
    }

    public function testInsert()
    {
        $user = new UserDto();
        $user->setName('Pepe');
        $user->setEmail('pepe@gmail.com');
        $this->assertInstanceOf(UserInterface::class, $this->userRepository->insert($user), 'Return a User Model when creating it');
    }
}
