<?php
include_once "bootstrap.php";
include_once "entities/Utente.php";

use entities\Utente;

class UtenteRepository
{

    private $em;

    function __construct()
    {
        global $entity_manager;
        $this->em = $entity_manager;
    }

    function doAutenthicate($username, $password)
    {

        $dql = "SELECT u FROM entities\Utente u " .
            " WHERE u.username = ?1 AND u.password = ?2";

        return $this->em->createQuery($dql)
            ->setParameter(1, $username)
            ->setParameter(2, $password)
            ->setMaxResults(1)
            ->getResult();
    }

    function getList()
    {
        return $this->em->getRepository("entities\Utente")->findAll();
    }
}
