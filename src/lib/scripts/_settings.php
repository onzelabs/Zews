<?php

// IDIORM
require '/../../../vendor/j4mie/idiorm/idiorm.php';

// SIMPLEPIE
require '/../../../vendor/simplepie/simplepie/autoloader.php';

// ONZEPHP
require '/../../../vendor/onzephp/autoloader.php';

// CRON
require '/../../../vendor/crontab_manager/crontab.php';

// DOMAIN OBJECTS
require '/../autoloader.php';
require '/../../models/autoloader.php';

// DATABASE - Development
$dbHost = 'localhost';
$dbPort = '3307';
$dbName = 'onzereader';
$dbUser = 'root';
$dbPassword = 'onzelabs';

ORM::configure("mysql:host=127.0.0.1;dbname=$dbName;port=3307");
ORM::configure('id_column_overrides', array(
    'entidad' => 'identidad',
));
ORM::configure('username', $dbUser);
ORM::configure('password', $dbPassword);
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
