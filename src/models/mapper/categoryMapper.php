<?php

class categoryMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('category');
    }

    public function create () {
      return new category ();
    }
}

?>
