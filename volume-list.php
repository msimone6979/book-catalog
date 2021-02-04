<?php
// volume-list.php
require_once "bootstrap.php";
require_once "entities/Volume.php";

use entities\Volume;

$volumeRepository = $entity_manager->getRepository(Volume::class);
$volumi = $volumeRepository->findAll();

foreach ($volumi as $v) {
    echo sprintf("-%s\n", $v->getTitolo());
}
