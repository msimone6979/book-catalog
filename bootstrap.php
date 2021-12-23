<?php
require_once "vendor/autoload.php";
require_once "inc/inc.conf.php";

// Setup Doctrine
$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [__DIR__ . '/entities'],
    $isDevMode = true
);

// Setup connection parameters
$connection_parameters = [
    'dbname' => $db_name,
    'user' => $db_user,
    'password' => $db_password,
    'host' => $db_host,
    'driver' => 'pdo_mysql'
];

// Get the entity manager
$entity_manager = Doctrine\ORM\EntityManager::create($connection_parameters, $configuration);
$conn = $entity_manager->getConnection();
$conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
