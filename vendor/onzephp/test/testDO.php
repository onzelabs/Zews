<?php

class TestDO extends BaseDO {
    protected $id;
    protected $field1;
    protected $field2;

    public function __construct () {
    }

    public function get_id() {
        return $this->id;
    }

    public function get_field1() {
        return $this->field1;
    }

    public function get_field2() {
        return $this->field2;
    }

    public function set_id($id) {
        $this->id=$id;
    }

    public function set_field1($field1) {
        $this->field1=$field1;
    }

    public function set_field2($field2) {
        $this->field2=$field2;
    }

}
