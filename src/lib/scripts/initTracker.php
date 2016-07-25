<?php

require '_settings.php';
// GO!
$tracker = ORM::for_table('tracker')->find_one($_GET['id']);
$tracker->set('state', 0);
$tracker->set('pid', 0);
$tracker->set('start_at','0000-00-00 00:00:00');
$tracker->set('last_listen','0000-00-00 00:00:00');
$tracker->save();
