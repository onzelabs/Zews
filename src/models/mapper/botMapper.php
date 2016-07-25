<?php

class botMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('bot');
    }

    public function create () {
      return new botDO ();
    }
}

?>
