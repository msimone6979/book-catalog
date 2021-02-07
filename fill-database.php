<?php
require_once 'vendor/autoload.php';

require_once "bootstrap.php";
require_once "entities/Volume.php";
require_once "entities/Utente.php";
require_once "entities/Autore.php";
require_once "entities/CasaEditrice.php";

use entities\Volume;
use entities\Autore;
use entities\CasaEditrice;

$volume = new Volume();

// https://stackoverflow.com/questions/9686888/how-to-truncate-a-table-using-doctrine-2

$faker = Faker\Factory::create('it_IT');
/*
// Autore 
$numAutori = rand(0, 20);
for ($i = 0; $i < $numAutori; $i++) {
    $autore = new Autore();
    $autore->setNome($faker->name);
    $autore->setCognome($faker->lastName);
    $autore->setNote($faker->text(25));
    $autore->setNazionalita($faker->country);

    $entity_manager->persist($autore);
    $entity_manager->flush();
}

echo "Generati $numAutori autori ";


// Casa Editrie
$numCasaEditrice = rand(0, 20);
for ($i = 0; $i < $numCasaEditrice; $i++) {
    $casaEditrice = new CasaEditrice();
    $casaEditrice->setDenominazione($faker->company);
    $casaEditrice->setNazione($faker->country);
    $casaEditrice->setUrl($faker->url);
    $entity_manager->persist($casaEditrice);
    $entity_manager->flush();
}
echo "Generate $numCasaEditrice case editrici ";
*/

// Volume 
$numVolume = rand(0, 40);
for ($i = 0; $i < $numVolume; $i++) {
    $volume = new Volume();
    $volume->setTitolo($faker->text(10));
    $volume->setDescrizione($faker->paragraph(3, true));
    $volume->setGenere($faker->city);
    $volume->setPrezzo($faker->randomNumber(2));
    $volume->setImmagine($faker->imageUrl($width = 640, $height = 480));
    $volume->setAnno($faker->year($max = 'now'));
    $volume->setPagine($faker->numberBetween($min = 100, $max = 300));
    $volume->setLingua($faker->country);
    $volume->setLetto($faker->boolean);
    $volume->setFormatoCartaceo($faker->boolean);
    $volume->setFormatoEbook($faker->boolean);
    /*
    $volume->setUtente();
    $volume->setAutore();
    $volume->setCasaEditrice();
    */
    $entity_manager->persist($volume);
    $entity_manager->flush();
}
