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
}
