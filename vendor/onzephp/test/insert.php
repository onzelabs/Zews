<?php

// ONZEPHP
require '../autoloader.php';

require '../../j4mie/idiorm/idiorm.php';

/* Development */
$dbHost = 'localhost';
$dbPort = '3307';
$dbName = 'test';
$dbUser = 'root';
$dbPassword = 'onzelabs';

ORM::configure("mysql:host=127.0.0.1;dbname=$dbName;port=3307");
ORM::configure('id_column_overrides', array(
    'entidad' => 'identidad',
));
ORM::configure('username', $dbUser);
ORM::configure('password', $dbPassword);
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


require 'testMapper.php';
require 'testDO.php';


/*
$testDO=new testDO ();
$testDO->set_id('6');
$testDO->set_field1('231');
$testDO->set_field2('FIELd666');
print_r ($testDO);
*/

$prueba=new testMapper ('table1');

//insert
$prueba->begin_transaction();
print_r ("\n..:: insert ::.. \n\n");
$testDO=new testDO ();
$testDO->set_field1('999');
$testDO->set_field2('02/05/2016 Prueba commit');
$testDO=$prueba->insert($testDO);
print_r ($testDO);
$prueba->commit();
$last_id=$testDO->get_id();
$testDO=$prueba->get_by_id($last_id);
print_r ($testDO);
