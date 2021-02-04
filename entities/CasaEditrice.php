<?php

namespace entities;

/**
 * @Entity
 * @Table(name="casaEditrice")
 */
class CasaEditrice
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
    private $denominazione;

    /**
     * @Column(type="string", nullable=true)
     */
    private $nazione;

    /**
     * @Column(type="string", nullable=true)
     */
    private $url;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of denominazione
     */
    public function getDenominazione()
    {
        return $this->denominazione;
    }

    /**
     * Set the value of denominazione
     *
     * @return  self
     */
    public function setDenominazione($denominazione)
    {
        $this->denominazione = $denominazione;

        return $this;
    }

    /**
     * Get the value of nazione
     */
    public function getNazione()
    {
        return $this->nazione;
    }

    /**
     * Set the value of nazione
     *
     * @return  self
     */
    public function setNazione($nazione)
    {
        $this->nazione = $nazione;

        return $this;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}
