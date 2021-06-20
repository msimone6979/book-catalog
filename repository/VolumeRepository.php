<?php
include_once "bootstrap.php";
include_once "entities/Volume.php";

use entities\Volume;

class VolumeRepository
{

    private $em;

    function __construct()
    {
        global $entity_manager;
        $this->em = $entity_manager;
    }

    function getList()
    {
        return $this->em->getRepository("entities\Volume")->findAll();
    }
}
