<?php
/*- MYSQL connection -*/

// IDIORM
require __DIR__. '/../vendor/j4mie/idiorm/idiorm.php';

/* Development  - Home*/
$dbHost = 'localhost';
$dbPort = '3307';
$dbName = 'onzereader';
$dbUser = 'root';
$dbPassword = 'onzelabs';
ORM::configure("mysql:host=127.0.0.1;dbname=$dbName;port=3307");

/* Development  - Laptop*/
/*
$dbHost = 'localhost';
$dbPort = '3306';
$dbName = 'onzereader';
$dbUser = 'root';
$dbPassword = 'sgae2015';
ORM::configure("mysql:host=127.0.0.1;dbname=$dbName;port=3306");
*/

/*
ORM::configure('id_column_overrides', array(
    'entidad' => 'identidad',
));
*/
ORM::configure('username', $dbUser);
ORM::configure('password', $dbPassword);
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

// ONZEPHP
require __DIR__. '/../vendor/onzephp/autoloader.php';

// SIMPLEPIE
require __DIR__. '/../vendor/simplepie/simplepie/autoloader.php';

require __DIR__. '/lib/autoloader.php';
require __DIR__. '/models/autoloader.php';

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
    ],
];
