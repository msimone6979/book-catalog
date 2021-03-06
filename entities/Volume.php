<?php

namespace entities;

require_once "entities/Volume.php";
require_once "entities/Utente.php";
require_once "entities/Autore.php";
require_once "entities/CasaEditrice.php";


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
    private $id;

    /**
     * @Column(type="string",  unique=true)
     */
    private $titolo;

    /**
     * @Column(type="text")
     */
    private $descrizione;

    /**
     * @Column(type="string")
     */
    private $genere;

    /**
     * @Column(type="string", nullable=true)
     */
    private $immagine;

    /**
     * @Column(type="float", nullable=true)
     */
    private $prezzo;

    /**
     * @Column(type="boolean", options={"default":"0"})
     */
    private $letto = false;

    /**
     * @Column(type="boolean", options={"default":"0"})
     */
    private $formatoEbook = false;

    /**
     * @Column(type="boolean", options={"default":"0"})
     */
    private $formatoCartaceo = false;

    /**
     * @Column(type="smallint", nullable=true)
     */
    private $anno;

    /**
     * @Column(type="smallint", nullable=true)
     */
    private $pagine;

    /**
     * @Column(type="string", nullable=true)
     */
    private $lingua;

    /**
     * @ManyToOne(targetEntity="Utente")
     * @JoinColumn(name="id_utente", referencedColumnName="id")
     */
    private $utente;

    /**
     * @ManyToOne(targetEntity="Autore")
     * @JoinColumn(name="id_autore", referencedColumnName="id")
     */
    private $autore;

    /**
     * @ManyToOne(targetEntity="CasaEditrice")
     * @JoinColumn(name="id_casa_editrice", referencedColumnName="id")
     */
    private $casaEditrice;

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
