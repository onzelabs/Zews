<?php
/**
  1º argument: Tracker id
*/

require '_settings.php';
// GO!
$rss_ReaderMapper=new rss_ReaderMapper();
$feedReader=$rss_ReaderMapper->get_by_id($_GET['id']);
$feedReader->run();
