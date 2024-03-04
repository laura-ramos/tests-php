<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{

  public function testAddResturnsTheCorrectSum()
  {
    require 'functions.php';
    $this->assertEquals(4, add(2 , 2));
    $this->assertEquals(8, add(3 , 5));
  }

  public function testAddResturnsTheIncorrectSum()
  {
    $this->assertNotEquals(4, add(5 , 2));
  }

}
