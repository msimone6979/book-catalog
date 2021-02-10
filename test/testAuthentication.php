<?php
require_once "../entities/Utente.php";
require_once "../repository/UtenteRepository.php";

$utenteRepository = new UtenteRepository();
$res = $utenteRepository->doAutenthicate('msimone', 'password');

var_dump($res);