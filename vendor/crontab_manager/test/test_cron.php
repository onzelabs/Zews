<?php

require '/../crontab.php';

$crontab=new crontab();

$sh='"C:\Users\Vicente\Documents\000 Proyectos\Onze Labs\000 Localhost\htdocs\2014_003_PoC\test\Feed_test.php"';

$crontab->addJob("*/1 * * * * php ".$sh." >> c:/cygwin/var/log/myjob.log 2>&1");
$sh="dir";
$crontab->addJob("*/1 * * * * ".$sh." >> c:/cygwin/var/log/dir.log 2>&1");
$sh="cls";
$crontab->addJob("* 1 * * * ".$sh);

?>
