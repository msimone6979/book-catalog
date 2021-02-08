<?php
// create-volume.php <name>
require_once "bootstrap.php";
require_once "entities/Utente.php";

use entities\Utente;

$u = new Utente();
$u->setNome('Matteo');
$u->setCognome('Simone');
$u->setUsername('msimone');
$u->setPassword('password');
$u->setLivello(1);

$entity_manager->persist($u);
$entity_manager->flush();