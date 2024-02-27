<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\User;

final class UserTest extends TestCase
{
    public function testMayorEdad(): void
    {

       $user = new User;
        $user->firstName = "laura";
        $user->lastName = "ramos";
        $user->age = 20;

        $this->assertTrue($user->mayorEdad());
    }

}
