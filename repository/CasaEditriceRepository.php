<?php
require __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../entities/CasaEditrice.php';

use entities\CasaEditrice;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class CasaEditriceRepository
{

    private $em;

    function __construct()
    {
        global $entity_manager;
        $this->em = $entity_manager;
    }

    function getList($sort = null, $orderField = null, $denominazione = null, $nazione = null)
    {
        $sort = ($sort) ?  $sort :  ' ASC ';
        $orderField = ($orderField) ? 'c.' . $orderField : ' c.denominazione';

        $queryBuilder =  $this->em->createQueryBuilder('c');
        $queryBuilder->select('c')->from('entities\CasaEditrice', 'c');


        if ($denominazione) {
            $queryBuilder->andWhere('c.denominazione LIKE :denominazione')
                ->setParameter('denominazione', '%' . $denominazione . '%');
        }
        if ($nazione) {
            $queryBuilder->andWhere('c.nazione LIKE :nazione')
                ->setParameter('nazione', '%' . $nazione . '%');
        }
        $queryBuilder->orderBy($orderField, $sort);

        return $queryBuilder->getQuery()->getResult();
    }

    function findById($id)
    {
        return $this->em->getRepository('entities\CasaEditrice')->findOneBy(array('id' => $id));
    }

    function update(CasaEditrice $casaEditrice)
    {
        $v = $this->em->getRepository('entities\CasaEditrice')->find($casaEditrice->getId());
        $v->setDenominazione($casaEditrice->getDenominazione());
        $v->setNazione($casaEditrice->getNazione());
        $v->setUrl($casaEditrice->getUrl());
        $this->em->flush();
    }

    function save(CasaEditrice $casaEditrice)
    {
        try {
            $this->em->persist($casaEditrice);
            $this->em->flush();
            return $casaEditrice->getId();
        } catch (UniqueConstraintViolationException $e) {
            throw new Exception("Esiste già una casa editrice con la denominazione specificata");
        }
    }

    function delete(CasaEditrice $casaEditrice)
    {
        try {
            $this->em->remove($casaEditrice);
            $this->em->flush();
        } catch (Exception $e) {
            $previous = $e->getPrevious();
            $errorCode = $previous->getCode();

            if ($errorCode == 23000) {
                throw new Exception("Impossibile cancellare la casa editrice selezionata, eliminare prima i volumi ad essa associati");
            }
            throw new Exception($e->getMessage());
        }
    }
}
