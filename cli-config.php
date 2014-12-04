<?php

require 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


$dbParams = [
    'driver'   => 'pdo_pgsql',
    'host'     => 'localhost',
    'dbname'   => 'mensa',
    'user'     => 'username',
    'password' => 'password',
];

$em = EntityManager::create(
    $dbParams,
    Setup::createAnnotationMetadataConfiguration([ __DIR__ . '/src' ], true)
);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);
