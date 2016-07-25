<?php

class itemMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('item');
    }

    public function create () {
      return new item ();
    }
}
