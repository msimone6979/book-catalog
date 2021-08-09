<?php

namespace entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

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
    public $id;

    /**
     * @Column(type="string",  unique=true)
     */
    public $denominazione;

    /**
     * @Column(type="string", nullable=true)
     */
    public $nazione;

    /**
     * @Column(type="string", nullable=true)
     */
    public $url;

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
