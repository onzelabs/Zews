<?php

class TestMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('table1');
    }

    public function create () {
      return new TestDO ();
    }

}
