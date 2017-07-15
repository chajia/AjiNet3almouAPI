<?php

$app['log.level'] = Monolog\Logger::ERROR;
$app['api.version'] = "v1";
$app['api.endpoint'] = "/api";

/**
 * SQLite database file

$app['db.options'] = array(
'driver' => 'pdo_sqlite',
'path' => realpath(ROOT_PATH . '/app.db'),
);

 */
// MySQL

$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'Ajint3almou',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8',

);