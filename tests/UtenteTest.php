<?php

declare(strict_types=1);

include __DIR__ . "/../repository/UtenteRepository.php";

use PHPUnit\Framework\TestCase;

final class UtenteTest extends TestCase
{

    public function testValidAuthentication(): void
    {
        $utenteRepository = new UtenteRepository();
        $user = $utenteRepository->doAutenthicate('msimone', 'password');
        $this->assertNotEmpty($user);
        $this->assertEquals("Matteo", $user[0]->getNome());
    }

    public function testInvalidAuthentication(): void
    {
        $utenteRepository = new UtenteRepository();
        $user = $utenteRepository->doAutenthicate('msimone', '***');
        $this->assertEmpty($user);
    }

    public function testGetList(): void
    {
        $utenteRepository = new UtenteRepository();
        $list = $utenteRepository->getList();
        $this->assertNotEmpty($list);
    }
}
