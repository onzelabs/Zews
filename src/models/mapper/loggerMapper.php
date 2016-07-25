<?php

class loggerMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('logger');
    }

    public function create () {
      return new logger ();
    }
}

?>
