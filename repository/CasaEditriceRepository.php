<?php
require __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../entities/CasaEditrice.php';

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
        $query = $this->em->createQuery(
            'SELECT c
            FROM entities\CasaEditrice c'
        );
        return $query->getArrayResult();
    }

    function findById($id)
    {
        return $this->em->getRepository('entities\CasaEditrice')->findOneBy(array('id' => $id));
    }
}
