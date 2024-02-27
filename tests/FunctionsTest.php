<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once 'src/Functions.php';

final class FunctionsTest extends TestCase
{

    // suma de numeros
    public function testsum(): void
    {
        $this->assertEquals(4, sum(2,2));
    }

    // validar la conexión
    public function testStatusApi() {
        $response = getstatusApi();

        $this->assertEquals(200, $response);
    }

    public function testDataApi() {
        $response = getsDataApi();

        $this->assertArrayHasKey('abilities', $response);
        $this->assertArrayHasKey('42', $response);
    }
}
