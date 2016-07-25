<?php

require_once 'iBaseDO.php';

class BaseDO implements iBaseDO {

    public function __construct() {
    }

    public function get_properties () {
        return get_class_vars(get_class($this));
    }

    public function get_values () {
        $values=array();
        $properties=$this->get_properties();
        foreach ($properties as $property => $value) {
            if (isset($this->{$property})) {
                $values[$property] = $this->{$property};
            }
        }
        return $values;
    }

}
