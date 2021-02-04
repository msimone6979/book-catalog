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
     * @Column(type="string", unique=true)
     */
    private $username;

    /**
     * @Column(type="smallint", options={"default":"0"})
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
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of livello
     */
    public function getLivello()
    {
        return $this->livello;
    }

    /**
     * Set the value of livello
     *
     * @return  self
     */
    public function setLivello($livello)
    {
        $this->livello = $livello;

        return $this;
    }

    /**
     * Get the value of dataPrimoAccesso
     */
    public function getDataPrimoAccesso()
    {
        return $this->dataPrimoAccesso;
    }

    /**
     * Set the value of dataPrimoAccesso
     *
     * @return  self
     */
    public function setDataPrimoAccesso($dataPrimoAccesso)
    {
        $this->dataPrimoAccesso = $dataPrimoAccesso;

        return $this;
    }

    /**
     * Get the value of dataUltimoAccesso
     */
    public function getDataUltimoAccesso()
    {
        return $this->dataUltimoAccesso;
    }

    /**
     * Set the value of dataUltimoAccesso
     *
     * @return  self
     */
    public function setDataUltimoAccesso($dataUltimoAccesso)
    {
        $this->dataUltimoAccesso = $dataUltimoAccesso;

        return $this;
    }

    /**
     * Get the value of dataUltimoAggiornamento
     */
    public function getDataUltimoAggiornamento()
    {
        return $this->dataUltimoAggiornamento;
    }

    /**
     * Set the value of dataUltimoAggiornamento
     *
     * @return  self
     */
    public function setDataUltimoAggiornamento($dataUltimoAggiornamento)
    {
        $this->dataUltimoAggiornamento = $dataUltimoAggiornamento;

        return $this;
    }
}
