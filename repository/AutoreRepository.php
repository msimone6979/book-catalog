<?php
require __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../entities/Autore.php';

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
        $query = $this->em->createQuery(
            'SELECT a
            FROM entities\Autore a'
        );
        return $query->getArrayResult();
    }

    function findById($id)
    {
        return $this->em->getRepository('entities\Autore')->findOneBy(array('id' => $id));
    }
}
