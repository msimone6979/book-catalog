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

    function getList($sort = null, $orderField = null, $nome = null, $cognome = null, $nazionalita = null)
    {
        $sort = ($sort) ?  $sort :  ' ASC ';
        $orderField = ($orderField) ? 'a.' . $orderField : ' a.cognome, a.nome';

        $testparam[] = null;

        $queryBuilder =  $this->em->createQueryBuilder('a');
        $queryBuilder->select('a')->from('entities\Autore', 'a');

        if ($nome) {
            $queryBuilder->andWhere('a.nome LIKE :nome')
                ->setParameter('nome', '%' . $nome . '%');
        }
        if ($cognome) {
            $queryBuilder->andWhere('a.cognome LIKE :cognome')
                ->setParameter('cognome', '%' . $cognome . '%');
        }
        if ($nazionalita) {
            $queryBuilder->andWhere('a.nazionalita LIKE :nazionalita')
                ->setParameter('nazionalita', '%' . $nazionalita . '%');
        }
        $queryBuilder->orderBy($orderField, $sort);

        return $queryBuilder->getQuery()->getResult();
    }

    function findById($id)
    {
        return $this->em->getRepository('entities\Autore')->findOneBy(array('id' => $id));
    }

    function save(Autore $autore)
    {
        try {
            $this->em->persist($autore);
            $this->em->flush();
        } catch (Exception $e) {
            $previous = $e->getPrevious();
            $errorCode = $previous->getCode();

            if ($errorCode == 23000) {
                throw new Exception("Esiste gi&agrave; un autore con il nome e cognome specificato");
            }
        }
    }

    function update(Autore $autore)
    {
        try {
            $v = $this->em->getRepository('entities\Autore')->find($autore->getId());
            $v->setNome($autore->getNome());
            $v->setCognome($autore->getCognome());
            $v->setNazionalita($autore->getNazionalita());
            $v->setNote($autore->getNote());

            $this->em->flush();
        } catch (Exception $e) {
            $previous = $e->getPrevious();
            $errorCode = $previous->getCode();

            if ($errorCode == '23000') {
                throw new Exception("Esiste gi&agrave; un autore con il nome e cognome specificato");
            }
            throw new Exception($e->getMessage());
        }
    }

    function delete(Autore $autore)
    {
        try {
            $this->em->remove($autore);
            $this->em->flush();
        } catch (Exception $e) {
            $previous = $e->getPrevious();
            $errorCode = $previous->getCode();

            if ($errorCode == 23000) {
                throw new Exception("Impossibile cancellare l'autore selezionato, eliminare prima i volumi ad esso associati");
            }
            throw new Exception($e->getMessage());
        }
    }
}
