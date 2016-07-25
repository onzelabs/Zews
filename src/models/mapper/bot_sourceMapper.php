<?php

class bot_sourceMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('bot_source');
    }

    public function create () {
      return new bot_sourceDO ();
    }
}

?>
