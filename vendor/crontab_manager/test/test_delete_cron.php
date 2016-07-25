<?php

require '/../crontab.php';

$crontab=new crontab();

$sh="dir";
$crontab->removeJob("*/1 * * * * ".$sh." >> c:/cygwin/var/log/dir.log 2>&1");

?>
