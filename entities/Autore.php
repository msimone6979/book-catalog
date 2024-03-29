<?php

namespace entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\UniqueConstraint;


require_once __DIR__ . '/../entities/Volume.php';

use entities\Volume;

/**
 * @Entity
 * @Table(name="autore",uniqueConstraints={
 *        @UniqueConstraint(name="name_unique", 
 *            columns={"nome", "cognome"})
 *    })
 */
class Autore
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="smallint")
     */
    public $id;

    /**
     * @ManyToOne(targetEntity="entities\Volume", inversedBy="volume")
     */
    public $volume;

    /**
     * @Column(name="nome", type="string")
     */
    public $nome;

    /**
     * @Column(name="cognome", type="string")
     */
    public $cognome;

    /**
     * @Column(type="text", nullable=true)
     */
    public $note;

    /**
     * @Column(type="string", nullable=true)
     */
    public $nazionalita;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cognome
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * Set the value of cognome
     *
     * @return  self
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;

        return $this;
    }

    /**
     * Get the value of note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of nazionalita
     */
    public function getNazionalita()
    {
        return $this->nazionalita;
    }

    /**
     * Set the value of nazionalita
     *
     * @return  self
     */
    public function setNazionalita($nazionalita)
    {
        $this->nazionalita = $nazionalita;

        return $this;
    }
}
