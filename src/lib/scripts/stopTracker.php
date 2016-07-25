<?php

require '_settings.php';
// GO!
$message=ORM::for_table('tracker_message')->create();
$message->set('tracker_ix', $_GET['id']);
$message->set('message', "STOP");
$message->set('is_read', 0);
$message->set('created_at',date('Y-m-d H:i:s'));
$message->save();
