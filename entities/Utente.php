<?php

namespace entities;

/**
 * @Entity
 * @Table(name="utente")
 */
class Utente
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
     * @Column(type="string")
     */
    private $username;

    /**
     * @Column(type="smallint")
     */
    private $livello;

    /**
     * @Column(type="datetime", nullable=true)
     */
    private $dataPrimoAccesso;

    /**
     * @Column(type="datetime", nullable=true)
     */
    private $dataUltimoAccesso;

    /**
     * @Column(type="datetime", nullable=true)
     */
    private $dataUltimoAggiornamento;
}
