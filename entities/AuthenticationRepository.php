<?php
require_once "../bootstrap.php";
require_once "Utente.php";

use Doctrine\ORM\EntityRepository;

class AuthenticationRepository extends EntityRepository
{

    public function doAutenthicate($username, $password){
        $dql = "SELECT u FROM Utente U ".
        "WHERE u.username = ?1 AND u.password = ?2";

 return $this->getEntityManager()->createQuery($dql)
                      ->setParameter(1, $username)
                      ->setParameter(2, $password)
                      ->setMaxResults(1)
                      ->getResult();
    }

}