<?php
require __DIR__ . '/prod.php';
$app['debug'] = true;
$app['log.level'] = Monolog\Logger::DEBUG;

//configure database connection
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'Ajint3almou',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ),
));