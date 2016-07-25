<?php

class feedMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('feed');
    }

    public function create () {
      return new feed ();
    }
}

?>
