<?php
session_start();
require_once 'inc/inc.conf.php';
// isUserAuthenticated();

header('Content-Type: application/json');


// Inserimento logo

if (isset($_FILES["immagine"]["name"])) {
    $upload_result = $_FILES["immagine"]["error"];

    if ($upload_result > 0) {
        switch ($upload_result) {
            case UPLOAD_ERR_NO_FILE:
                echo "{\"error\": \"Hai dimenticato di inserire il logo, riprova.\"}";
                break;
            default:
                echo "{\"error\": \"Errore in fase di caricamento dell'immagine.\"}";
                break;
        }
        die;
    }
    $name = filter_var($_FILES["immagine"]["name"], FILTER_SANITIZE_STRING);
    $temp = explode(".", strtolower($name));
    $extension = end($temp);

    if ($_FILES["immagine"]["size"] > MAX_FILE_MB * 1000000) {
        // superato il limite della dimensione massima del file
        echo "{\"error\": \"La dimensione massima del file &egrave; " . MAX_FILE_MB . "MB.\"}";
        die;
    }

    $data = array();
    $data['immagine'] = $name;
    $path = IMG_PATH_ROOT . "/copertine/";

    try {
        date_default_timezone_set('UTC');
        $now = date("Y-m-d H:i:s");
        if (!mkdir($path . $now, 0777, true)) {
            die('Failed to create folders...');
        }

        move_uploaded_file($_FILES["immagine"]["tmp_name"], $path . $now . "/" . $name);
    } catch (Exception $e) {
        echo "Error";
    }
    copy($path . $now . "/" . $name, $path . $name);
    unlink($path . $now . "/" . $name);
    rmdir($path . $now);

    echo "{\"success\": \"File caricato correttamente.\"}";
} else {
    echo "{\"error\": \"Errore in fase di caricamento dell'immagine.\"}";
}
