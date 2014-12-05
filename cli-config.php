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

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);
