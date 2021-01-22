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
     * @Column(type="string")
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
}
