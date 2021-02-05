<?php
require_once "../bootstrap.php";
require_once "../entities/AuthenticationRepository.php";
require_once "../entities/Utente.php";

use entities\Utente;

$res =  $entity_manager->getRepository('Utente')->doAutenthicate('msimone', 'password');

var_dump($res);