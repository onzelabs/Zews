<?php

class trackerMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('tracker');
    }

    public function create () {
      return new Tracker ();
    }

}

?>
