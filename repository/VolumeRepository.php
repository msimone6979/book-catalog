<?php

require __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../entities/Volume.php';
require_once __DIR__ . '/../entities/Autore.php';
require_once __DIR__ . '/../entities/CasaEditrice.php';


use entities\Volume;
use entities\Autore;
use entities\CasaEditrice;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class VolumeRepository
{

    private $em;

    function __construct()
    {
        global $entity_manager;
        $this->em = $entity_manager;
    }

    function getList($sort = null, $orderField = null, $titolo = null, $genere = null, $anno = null, $nome = null, $cognome = null, $nazionalita = null, $isWish = false)
    {

        $sort = ($sort) ?  $sort :  ' ASC ';
        $orderField = ($orderField) ? 'v.' . $orderField : ' v.titolo';

        $queryBuilder =  $this->em->createQueryBuilder('v');
        $queryBuilder
            ->select('v', 'a')
            ->from('entities\Volume', 'v')
            ->leftJoin('v.autore', 'a')
            ->leftJoin('v.casaEditrice', 'ca');

        if ($titolo) {
            $queryBuilder->andWhere('v.titolo LIKE :titolo')
                ->setParameter('titolo', '%' . $titolo . '%');
        }

        if ($genere) {
            $queryBuilder->andWhere('v.genere LIKE :genere')
                ->setParameter('genere', '%' . $genere . '%');
        }

        if ($anno) {
            $queryBuilder->andWhere('v.anno = :anno')
                ->setParameter('anno', $anno);
        }

        if ($nome) {
            $queryBuilder->andWhere('a.nome LIKE :nome')
                ->setParameter('nome',  '%' . $nome . '%');
        }

        if ($cognome) {
            $queryBuilder->andWhere('a.cognome LIKE :cognome')
                ->setParameter('cognome',  '%' . $cognome . '%');
        }

        if ($nazionalita) {
            $queryBuilder->andWhere('a.nazionalita LIKE :nazionalita')
                ->setParameter('nazionalita',  '%' . $nazionalita . '%');
        }

        if ($isWish) {
            $queryBuilder->andWhere('v.isWish = TRUE');
        } else {
            $queryBuilder->andWhere('v.isWish = FALSE');
        }

        $queryBuilder->orderBy($orderField, $sort);

        return $queryBuilder->getQuery()->getResult();
    }

    function findById($id)
    {
        return $this->em->getRepository('entities\Volume')->findOneBy(array('id' => $id));
    }

    function buy($volume)
    {
        $volume->setIsWish(false);
        $this->em->persist($volume);
        $this->em->flush();
    }

    function delete($volume)
    {
        $this->em->remove($volume);
        $this->em->flush();
    }

    function update($volume)
    {
        $v = $this->em->getRepository('entities\Volume')->find($volume->getId());

        $v->setTitolo($volume->getTitolo());
        $v->setSottoTitolo($volume->getSottotitolo());
        $v->setDescrizione($volume->getDescrizione());
        $v->setGenere($volume->getGenere());
        $v->setAnno($volume->getAnno());
        $v->setPagine($volume->getPagine());
        $v->setLingua($volume->getLingua());
        $v->setPrezzo($volume->getPrezzo());
        $v->setImmagine($volume->getImmagine());
        $v->setCasaEditrice($volume->getCasaEditrice());
        $v->setAutore($volume->getAutore());
        $v->setLetto($volume->getLetto());
        $v->setFormatoCartaceo($volume->getFormatoCartaceo());
        $v->setFormatoEbook($volume->getFormatoEbook());
        $this->em->flush();
    }

    function save($volume)
    {
        try {
            $this->em->persist($volume);
            $this->em->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw new Exception("Esiste già un volume con il titolo specificato");
        }
    }
}
