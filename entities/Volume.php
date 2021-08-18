<?php

namespace entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OrderBy;




require_once __DIR__ . '/../entities/Utente.php';
require_once __DIR__ . '/../entities/Autore.php';
require_once __DIR__ . '/../entities/CasaEditrice.php';

/**
 * @Entity
 * @Table(name="volume")
 */
class Volume
{

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="smallint")
     */
    public $id;

    /**
     * @Column(type="string",  unique=true)
     */
    public $titolo;

    /**
     * @Column(type="string",  nullable=true)
     */
    public $sottotitolo;

    /**
     * @Column(type="text", nullable=true)
     */
    public $descrizione;

    /**
     * @Column(type="string")
     */
    public $genere;

    /**
     * @Column(type="string", nullable=true)
     */
    public $immagine;

    /**
     * @Column(type="float", nullable=true, options={"default":"0"})
     */
    public $prezzo;

    /**
     * @Column(type="boolean", options={"default":"0"})
     */
    public $letto = false;

    /**
     * @Column(type="boolean", options={"default":"0"})
     */
    public $formatoEbook = false;

    /**
     * @Column(type="boolean", options={"default":"0"})
     */
    public $formatoCartaceo = false;

    /**
     * @Column(type="smallint", nullable=true)
     */
    public $anno;

    /**
     * @Column(type="smallint", nullable=true, options={"default":"0"})
     */
    public $pagine;

    /**
     * @Column(type="string", nullable=true)
     */
    public $lingua;

    /**
     * @ManyToOne(targetEntity="Utente")
     * @JoinColumn(name="id_utente", referencedColumnName="id")
     */
    public $utente;

    /**
     * @ManyToOne(targetEntity="Autore")
     * @JoinColumn(name="id_autore", referencedColumnName="id")     * 
     * @OrderBy({"cognome" = "ASC"})
     */
    public $autore;

    /**
     * @ManyToOne(targetEntity="CasaEditrice")
     * @JoinColumn(name="id_casa_editrice", referencedColumnName="id")
     */
    public $casaEditrice;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of titolo
     *
     * @return  self
     */
    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;

        return $this;
    }

    /**
     * Get the value of titolo
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * Set the value of sottotitolo
     *
     * @return  self
     */
    public function setSottotitolo($sottotitolo)
    {
        $this->sottotitolo = $sottotitolo;

        return $this;
    }

    /**
     * Get the value of sottotitolo
     */
    public function getSottotitolo()
    {
        return $this->sottotitolo;
    }

    /**
     * Get the value of descrizione
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Set the value of descrizione
     *
     * @return  self
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;

        return $this;
    }


    /**
     * Get the value of genere
     */
    public function getGenere()
    {
        return $this->genere;
    }

    /**
     * Set the value of genere
     *
     * @return  self
     */
    public function setGenere($genere)
    {
        $this->genere = $genere;

        return $this;
    }

    /**
     * Get the value of immagine
     */
    public function getImmagine()
    {
        return $this->immagine;
    }

    /**
     * Set the value of immagine
     *
     * @return  self
     */
    public function setImmagine($immagine)
    {
        $this->immagine = $immagine;

        return $this;
    }

    /**
     * Get the value of prezzo
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * Set the value of prezzo
     *
     * @return  self
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;

        return $this;
    }

    /**
     * Get the value of letto
     */
    public function getLetto()
    {
        return $this->letto;
    }

    /**
     * Set the value of letto
     *
     * @return  self
     */
    public function setLetto($letto)
    {
        $this->letto = $letto;

        return $this;
    }

    /**
     * Get the value of formatoEbook
     */
    public function getFormatoEbook()
    {
        return $this->formatoEbook;
    }

    /**
     * Set the value of formatoEbook
     *
     * @return  self
     */
    public function setFormatoEbook($formatoEbook)
    {
        $this->formatoEbook = $formatoEbook;

        return $this;
    }

    /**
     * Get the value of formatoCartaceo
     */
    public function getFormatoCartaceo()
    {
        return $this->formatoCartaceo;
    }

    /**
     * Set the value of formatoCartaceo
     *
     * @return  self
     */
    public function setFormatoCartaceo($formatoCartaceo)
    {
        $this->formatoCartaceo = $formatoCartaceo;

        return $this;
    }

    /**
     * Get the value of anno
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set the value of anno
     *
     * @return  self
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get the value of pagine
     */
    public function getPagine()
    {
        return $this->pagine;
    }

    /**
     * Set the value of pagine
     *
     * @return  self
     */
    public function setPagine($pagine)
    {
        $this->pagine = $pagine;

        return $this;
    }

    /**
     * Get the value of lingua
     */
    public function getLingua()
    {
        return $this->lingua;
    }

    /**
     * Set the value of lingua
     *
     * @return  self
     */
    public function setLingua($lingua)
    {
        $this->lingua = $lingua;

        return $this;
    }

    /**
     * Get the value of utente
     */
    public function getUtente()
    {
        return $this->utente;
    }

    /**
     * Set the value of utente
     *
     * @return  self
     */
    public function setUtente($utente)
    {
        $this->utente = $utente;

        return $this;
    }

    /**
     * Get the value of autore
     */
    public function getAutore()
    {
        return $this->autore;
    }

    /**
     * Set the value of autore
     *
     * @return  self
     */
    public function setAutore($autore)
    {
        $this->autore = $autore;

        return $this;
    }

    /**
     * Get the value of casaEditrice
     */
    public function getCasaEditrice()
    {
        return $this->casaEditrice;
    }

    /**
     * Set the value of casaEditrice
     *
     * @return  self
     */
    public function setCasaEditrice($casaEditrice)
    {
        $this->casaEditrice = $casaEditrice;

        return $this;
    }
}
