<?php

namespace entities;

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
     * @Column(type="string")
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
     * @Column(type="string", nullable=true)
     */
    private $formato;

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
}
