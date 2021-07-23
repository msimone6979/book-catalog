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

    function getList()
    {
        $dql = "SELECT a FROM entities\Autore a";
        $query = $this->em->createQuery($dql);
        $autori = $query->getResult();

        $dql = "SELECT ca FROM entities\CasaEditrice ca";
        $query = $this->em->createQuery($dql);
        $caseEditrici = $query->getResult();

        $dql = "SELECT u FROM entities\Utente u";
        $query = $this->em->createQuery($dql);
        $utenti = $query->getResult();

        return $this->em->getRepository('entities\Volume')->findBy(array('autore' => $autori), array('titolo' => 'ASC'));
    }

    function findById($id)
    {
        return $this->em->getRepository('entities\Volume')->findOneBy(array('id' => $id));
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
        $v->setDescrizione($volume->getDescrizione());
        $v->setGenere($volume->getGenere());
        $v->setAnno($volume->getAnno());
        $v->setPagine($volume->getPagine());
        $v->setLingua($volume->getLingua());
        $v->setPrezzo($volume->getPrezzo());
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
