<?php
require_once "../bootstrap.php";

//use Doctrine\ORM\EntityRepository;
use entities\Base_Utente;
//use Doctrine\ORM\EntityRepository;

class _Utente 
{
    
    public function doAutenthicate($username, $password){
        $dql = "SELECT u FROM Utente U ".
        "WHERE u.username = ?1 AND u.password = ?2";

 return $entity_manager->createQuery($dql)
                      ->setParameter(1, $username)
                      ->setParameter(2, $password)
                      ->setMaxResults(1)
                      ->getResult();
    }

}