<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User;

        $user->first_name = "Laura";
        $user->surname = "Ramos";

        $this->assertEquals('Laura Ramos', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    public function testPrivateMethodInheritance()
	{
		$user = new UserChild();
		$this->assertIsInt($user->getToken());

	}

    public function testPrivateMethodGetID()
	{
		$user = new User();
		$reflector = new ReflectionClass('User');
		$method = $reflector->getMethod('getID');
		$method->setAccessible(true);

		$result = $method->invoke($user);

		$this->assertEquals(50, $result);
	}

    public function testPrivateMethod()
	{
		$number = 1;

		$user = new User();
		$reflector = new ReflectionClass($user);
		$method = $reflector->getMethod('getPrivateMethod');
		$method->setAccessible(true);

		$result = $method->invokeArgs($user, array($number));

		$this->assertEquals(1, $result);
	}

    public function testIdIsAnInteger()
	{
        $user = new User();
		$reflection = new \ReflectionClass($user);
        $property = $reflection->getProperty('user_id');
        $property->setAccessible(true);
        $value = $property->getValue($user);

		$this->assertIsInt($value);

	}
}