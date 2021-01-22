<?php
define("DEBUG",true);   // modalità notifica log
define("MODE","LOCAL"); // LOCAL, ONLINE  (modalità di esecuzione server)

$documentRoot =  $_SERVER["DOCUMENT_ROOT"];

$token = 'c4T4log0l1br1';
define("TOKEN", $token);


if (MODE == "LOCAL"){
	
	$db_user="root";
	$db_password="root";
	$db_name="catalogo_libri";
	$db_host="localhost";
	$db_port="3306";
		
} else if (MODE =="ONLINE") {
	/*
	$db_user="Sql322110";
	$db_password="783ea49e";
	$db_name="Sql322110_4";
	$db_host="62.149.150.85";//"localhost";
	$db_port="3306";
	*/
	$db_user="Sql922490";
	$db_password="ye21u39x3s";
	$db_name="Sql922490_1";
	$db_host="62.149.150.170"; //"62.149.150.85";//"localhost";
	$db_port="3306";
}

// Percorso filesystem - upload file
define("IMG_PATH_ROOT",$documentRoot."/upload");

// Percorso web - recupero immagini (Frontend/App)
define("IMG_URL_BASE","http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/upload/");

/** Database **/
define ("DATABASE_URL", "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8");
define ("DATABASE_USER","$db_user");
define ("DATABASE_PWD","$db_password");

/** FILE **/
define("MAX_FILE_MB",3); /* MAX UPLOAD FILE SIZE  */

?>