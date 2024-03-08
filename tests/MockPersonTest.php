<?php

use PHPUnit\Framework\TestCase;

class MockPersonTest extends TestCase
{
  public function testGreeting()
  {
    $dbMock = $this->getMockBuilder(Database::class)->getMock();
    $mockPerson = new stdClass();
    $mockPerson->name = 'laura';

    $dbMock->method('getPersonByID')->willReturn($mockPerson);

    $test = new Person($dbMock);
    $this->assertSame('Hola laura', $test->greeting(0));
  }

  public function testGreetingWithMockery()
  {
    $mockPerson = new stdClass();
    $mockPerson->name = 'ana';

    $dbMock = \Mockery::mock(Database::class);
    $dbMock->shouldReceive('getPersonByID')->once()->andReturn($mockPerson);

    $test = new Person($dbMock);
    $this->assertSame('Hola ana', $test->greeting(0));
  }

  public function testAge() {
    $mockPerson = new stdClass();
    $mockPerson->name = 'laura';
    $mockPerson->age = '26';

    $mock = \Mockery::mock(Database::class);
    $mock->shouldReceive('getPersonByID')->once()->andReturn($mockPerson);

    $test = new Person($mock);
    $this->assertSame('Mayor de edad', $test->getAge(0));
  }

  public function testMethodNotExist()
  {
   $mock = Mockery::mock(Person::class);
   $mock->shouldReceive('someMethod')->once()->with('someArg')->andReturn('someValue');
   $this->assertSame('someValue', $mock->someMethod('someArg'));
  }
}
