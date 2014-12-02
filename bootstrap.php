<?php
/**
 * @author: Alberto Maturano <alberto@maturano.mx>
 */

require 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


$paths = [
    __DIR__ . '/src',
];

$dbParams = [
    'driver'   => 'pdo_pgsql',
    'host'     => 'localhost',
    'dbname'   => 'mensa',
    'user'     => 'username',
    'password' => 'password',
];

$em = EntityManager::create(
    $dbParams,
    Setup::createAnnotationMetadataConfiguration($paths, true)
);
