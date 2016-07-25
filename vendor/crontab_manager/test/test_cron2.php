<?php

require '/../crontab.php';

$crontab=new crontab();

$script='"C:\Users\Vicente\Documents\000 Proyectos\Onze Labs\000 Localhost\htdocs\2014_003_PoC\app\lib\scripts\execRunTracker.php" 1 false';

$crontab->addJob("*/1 * * * * php ".$script." >> c:/cygwin/var/log/execRunTracker.log 2>&1");

?>
