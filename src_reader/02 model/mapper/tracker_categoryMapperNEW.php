<?php

class tracker_categoryMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('tracker');
    }

    public function create () {
      return new tracker_category ();
    }
}

?>
