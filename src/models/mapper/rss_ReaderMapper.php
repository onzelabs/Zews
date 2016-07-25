<?php

class rss_ReaderMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('tracker');
    }

    public function create () {
      return new Rss_Reader ();
    }
}

?>
