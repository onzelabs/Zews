<?php

require '_settings.php';
// GO!
$id=$_GET['id'];
$items = ORM::for_table('item')->where_equal('feed_ix', $id)->delete_many();
$logger = ORM::for_table('logger')->where_equal('tracker_ix', $id)->delete_many();
$logger = ORM::for_table('tracker_message')->where_equal('tracker_ix', $id)->delete_many();
