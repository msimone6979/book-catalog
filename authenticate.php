<?php
session_start();

require_once 'inc/inc.conf.php';
require_once 'inc/inc.func.php';
require_once 'dao/dao_utente.php';
require_once 'class/utente.php';

$login=$_POST['username'];
$password = sha1(md5($_POST['password'].$token));

if(isset($_POST['username']) && isset($_POST['password']) && check_content_valid_chars($_POST['username'])
		&& check_content_valid_chars($_POST['password'])) {
	$error=null;

	$user= new Utente();
	$user = dao_utente::doLogin($login, $password);
	
	
	if (!empty($user)){
		$_SESSION['user']['nome'] = $user->getNome();
		$_SESSION['user']['cognome'] = $user->getCognome();
		$_SESSION['user']['username'] = $user->getUsername();
		$_SESSION['user']['id'] = $user->getId();
		
		header("Location: ./dashboard.php");

	} else {
		header("Location: ./login.php?e=1");
	}

} else {
	header("Location: ./login.php?e=3");
}
