<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ExampleTest extends TestCase
{

  public function testAddingTwoPlusResultsInFour()
  {
    $this->assertEquals(4, 2 + 2);
  }

  public static function additionProvider(): array
    {
      return [
        [0, 0, 0],
        [0, 1, 1],
        [1, 0, 1],
        [1, 1, 3],
      ];
    }

    #[DataProvider('additionProvider')]
    public function testAdd(int $a, int $b, int $expected): void
    {
      $this->assertSame($expected, $a + $b);
    }

}
