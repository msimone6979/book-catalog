<?php
session_start();

require_once "repository/UtenteRepository.php";

$login=$_POST['username'];
$password = $_POST['password']; //sha1(md5($_POST['password'].$token));

if(isset($_POST['username']) && isset($_POST['password']) ) {
	$error=null;

	$utenteRepository = new UtenteRepository();
	$user = $utenteRepository->doAutenthicate($_POST['username'], $_POST['password']);
	
	if (!empty($user)){
		$_SESSION['user']['nome'] = $user[0]->getNome();
		$_SESSION['user']['cognome'] = $user[0]->getCognome();
		$_SESSION['user']['username'] = $user[0]->getUsername();
		$_SESSION['user']['id'] = $user[0]->getId();
		
		header("Location: ./dashboard.php");

	} else {
		header("Location: ./login.php?e=1");
	}

} else {
	header("Location: ./login.php?e=3");
}
