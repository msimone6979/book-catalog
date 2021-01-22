<?php

namespace entities;

/**
 * @Entity
 * @Table(name="autore")
 */
class Autore
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="smallint")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $nome;

    /**
     * @Column(type="string")
     */
    private $cognome;

    /**
     * @Column(type="text", nullable=true)
     */
    private $note;

    /**
     * @Column(type="string", nullable=true)
     */
    private $nazionalita;
}
