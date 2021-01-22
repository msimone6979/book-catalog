<?php
require_once "vendor/autoload.php";

// Setup Doctrine
$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [__DIR__ . '/entities'],
    $isDevMode = true
);

// Setup connection parameters
$connection_parameters = [
    'dbname' => 'catalogo_libri',
    'user' => 'bookuser',
    'password' => 'bookpassword',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql'
];

// Get the entity manager
$entity_manager = Doctrine\ORM\EntityManager::create($connection_parameters, $configuration);
