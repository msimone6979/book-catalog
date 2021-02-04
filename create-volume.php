<?php
// create-volume.php <name>
require_once "bootstrap.php";
require_once "entities/Volume.php";
require_once "entities/Utente.php";
require_once "entities/Autore.php";
require_once "entities/CasaEditrice.php";

use entities\Volume;

$volume = new Volume();
$volume->setTitolo('Gomorra');
$volume->setDescrizione('Bla bla');
$volume->setGenere('Drammatico');
$volume->setLetto(true);

$volume->setUtente(null);

$entity_manager->persist($volume);
$entity_manager->flush();
