<?php

use PHPUnit\Framework\TestCase;

class MockPersonTest extends TestCase
{
  public function test_greeting()
  {
    $dbMock = $this->getMockBuilder(Database::class)->getMock();
    $mockPerson = new stdClass();
    $mockPerson->name = 'laura';

    $dbMock->method('getPersonByID')->willReturn($mockPerson);

    $test = new Person($dbMock);
    $this->assertSame('Hola laura', $test->greeting(0));
  }
}
