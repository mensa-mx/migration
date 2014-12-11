<?php

require 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Yaml\Yaml;

$params = Yaml::parse(file_get_contents('etc/parameters.yml'));


$em = EntityManager::create(
    $params['database'],
    Setup::createAnnotationMetadataConfiguration([ __DIR__ . '/src' ], true)
);

// Permite ignorar la secuencia y asignar un ID manualmente
$em->getClassMetaData('Mensa\Member')->setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);
