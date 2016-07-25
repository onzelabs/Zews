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

//get_by_id
print_r ("\n..:: get_by_id ::.. \n\n");
$testDO=$prueba->get_by_id(1);
print_r ($testDO);

//get_all
print_r ("\n..:: get_all ::.. \n\n");
$testDO=$prueba->get_all();
print_r ($testDO);

//get_all_orderby
print_r ("\n..:: get_all_orderby ::.. \n\n");
$testDO=$prueba->get_all_orderby('field1');
print_r ($testDO);

//get_by_query
print_r ("\n..:: get_by_query ::.. \n\n");
$testDO=$prueba->get_by_query('SELECT id, field1, field2 FROM table1');
print_r ($testDO);

//count
print_r ("\n..:: count ::.. \n\n");
$count=$prueba->count();
print_r ($count);

//insert
print_r ("\n..:: insert ::.. \n\n");
$testDO=new testDO ();
$testDO->set_field1('231');
$testDO->set_field2('FIELd666');
//$testDO=$prueba->insert($testDO);
$last_id=$prueba->insert($testDO);
print_r ($testDO);
//$last_id=$testDO->get_id();
$testDO=$prueba->get_by_id($last_id);
print_r ($testDO);

//update
print_r ("\n..:: update ::.. \n\n");
$testDO->set_field1('237');
$testDO->set_field2('FIELd766');
//$testDO=$prueba->update($testDO);
$prueba->update($testDO);
print_r ($testDO);
$last_id=$testDO->get_id();
$testDO=$prueba->get_by_id($last_id);
print_r ($testDO);

//delete
print_r ("\n..:: delete ::.. \n\n");
//$testDO=$prueba->delete($last_id);
$prueba->delete($last_id);
$testDO=$prueba->get_by_id($last_id);
print_r ($testDO);
