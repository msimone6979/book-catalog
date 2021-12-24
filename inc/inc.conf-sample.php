<?php
define("DEBUG", true);   // modalità notifica log
define("MODE", "LOCAL"); // LOCAL, ONLINE  (modalità di esecuzione server)

$documentRoot =  $_SERVER["DOCUMENT_ROOT"];

$token = '------';
define("TOKEN", $token);


if (MODE == "LOCAL") {

    $db_user = "-----";
    $db_password = "------";
    $db_name = "-------";
    $db_host = "127.0.0.1";
    $db_port = "3306";
} else if (MODE == "ONLINE") {

    $db_user = "------";
    $db_password = "-------";
    $db_name = "-------";
    $db_host = "--------";
    $db_port = "-----";
}

define("WEB_ROOT", "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"]);

// Percorso filesystem - upload file
define("IMG_PATH_ROOT", $documentRoot . "/upload");

// Percorso web - recupero immagini (Frontend/App)
define("IMG_URL_BASE", "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/upload/");

/** Database **/
define("DATABASE_URL", "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8");
define("DATABASE_USER", "$db_user");
define("DATABASE_PWD", "$db_password");

/** FILE **/
define("MAX_FILE_MB", 3); /* MAX UPLOAD FILE SIZE  */
