<?php

declare(strict_types=1);

include __DIR__ . "/../repository/CasaEditriceRepository.php";

use PHPUnit\Framework\TestCase;

final class CasaEditriceTest extends TestCase
{

    public function testGetList(): void
    {
        $casaEditriceRepository = new CasaEditriceRepository();
        $list = $casaEditriceRepository->getList();
        $this->assertNotEmpty($list);
    }
}
