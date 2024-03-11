<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
	private $user;
	protected function setUp(): void
    {
        $this->user = new User('ramoslaura418@gmail.com');
    }
	
    public function testReturnsFullName()
    {

        $this->user->first_name = "Laura";
        $this->user->surname = "Ramos";

        $this->assertEquals('Laura Ramos', $this->user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $this->assertEquals('', $this->user->getFullName());
    }

    /*public function testPrivateMethodInheritance()
	{
		$user = new UserChild();
		$this->assertIsInt($user->getToken());

	}*/

    public function testPrivateMethodGetID()
	{
		$reflector = new ReflectionClass('User');
		$method = $reflector->getMethod('getID');
		$method->setAccessible(true);

		$result = $method->invoke($this->user);

		$this->assertEquals(50, $result);
	}

    public function testPrivateMethod()
	{
		$number = 1;

		$reflector = new ReflectionClass($this->user);
		$method = $reflector->getMethod('getPrivateMethod');
		$method->setAccessible(true);

		$result = $method->invokeArgs($this->user, array($number));

		$this->assertEquals(1, $result);
	}

    public function testIdIsAnInteger()
	{
		$reflection = new \ReflectionClass($this->user);
        $property = $reflection->getProperty('user_id');
        $property->setAccessible(true);
        $value = $property->getValue($this->user);

		$this->assertIsInt($value);

	}

	public function testNotifyReturnsTrue()
    {
        $mailer = $this->createMock(Mailer::class);
        
        $mailer->expects($this->once())
               ->method('send')
               ->willReturn(true);
        
		$this->user->setMailer($mailer);
        
        $this->assertTrue($this->user->notify('Hola!'));
    }
}
