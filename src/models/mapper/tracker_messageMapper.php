<?php

class tracker_messageMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('tracker_message');
    }

    public function create () {
      return new tracker_message ();
    }
}

?>
