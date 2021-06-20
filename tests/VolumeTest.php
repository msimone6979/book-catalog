<?php

declare(strict_types=1);

include __DIR__ . "/../repository/VolumeRepository.php";

use PHPUnit\Framework\TestCase;

final class VolumeTest extends TestCase
{

    public function testGetList(): void
    {
        $volumeRepository = new VolumeRepository();
        $list = $volumeRepository->getList();
        $this->assertNotEmpty($list);
    }
}
