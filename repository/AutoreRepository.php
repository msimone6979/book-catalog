<?php
include_once "bootstrap.php";
include_once "entities/Autore.php";

use entities\Autore;

class AutoreRepository
{

    private $em;

    function __construct()
    {
        global $entity_manager;
        $this->em = $entity_manager;
    }

    function getList()
    {
        return $this->em->getRepository("entities\Autore")->findAll();
    }
}
