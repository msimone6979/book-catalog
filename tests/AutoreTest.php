<?php

declare(strict_types=1);

include __DIR__ . "/../repository/AutoreRepository.php";

use PHPUnit\Framework\TestCase;

final class AutoreTest extends TestCase
{

    public function testGetList(): void
    {
        $autoreRepository = new AutoreRepository();
        $list = $autoreRepository->getList();
        $this->assertNotEmpty($list);
    }
}
