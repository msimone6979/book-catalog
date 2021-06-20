<?php
include_once "bootstrap.php";
include_once "entities/CasaEditrice.php";

use entities\CasaEditrice;

class CasaEditriceRepository
{

    private $em;

    function __construct()
    {
        global $entity_manager;
        $this->em = $entity_manager;
    }

    function getList()
    {
        return $this->em->getRepository("entities\CasaEditrice")->findAll();
    }
}
