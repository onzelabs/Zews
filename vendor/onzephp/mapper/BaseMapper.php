<?php

require_once 'iBaseMapper.php';

abstract class BaseMapper implements iBaseMapper {
    private $table;
    private $obj;

    public function __construct($table) {
        $this->table=$table;
    }

    abstract function create ();

    public function get_table () {
        return $this->table;
    }

    public function get_by_id ($id) {
        $result=ORM::for_table($this->table)->where('id',$id)->find_one();
        return ($this->get_rows($result));
    }

    public function get_all () {
        $result=ORM::for_table($this->table)->find_many();
        return ($this->get_rows($result));
    }

    public function get_all_orderby ($field) {
        $result=ORM::for_table($this->table)->order_by_asc($field)->find_many();
        return($this->get_rows($result));
    }

    public function get_by_query ($sql) {
        $result=ORM::for_table($this->table)->raw_query($sql)->find_many();
        if (sizeof($result)==1) {
          $result=$result[0];
        }
        return($this->get_rows($result));
    }

    public function delete ($id) {
        $result=ORM::for_table($this->table)->where('id',$id)->find_one();
        $result->delete();
    }

    public function insert ($do) {

        $result=ORM::for_table($this->table)->create();
        $values=$do->get_values();
        foreach ($values as $property => $value) {
            $result->{$property} = $value;
        }
        $result->save();
        //return ($this->get_rows($result));
        return($result->id);
    }

    public function update ($do) {

        $result=ORM::for_table($this->table)->where('id',$do->get_id())->find_one();
        $values=$do->get_values();
        foreach ($values as $property => $value) {
            $result->{$property} = $value;
        }
        $result->save();
        //return ($this->get_rows($result));
    }

    public function count () {
        $result=ORM::for_table($this->table)->count();
        return $result;
    }

    public function begin_transaction () {
      ORM::get_db()->beginTransaction();
    }

    public function commit () {
      ORM::get_db()->commit();
    }

    public function rollback () {
      ORM::get_db()->rollBack();
    }

    private function get_obj_properties ($obj) {
      return $obj->get_properties();
    }

    private function map_object ($orm) {
        $obj=$this->create();
        $properties=$this->get_obj_properties($obj);
        foreach ($properties as $property => $value) {
            $method='set_'.$property;
            $obj->{$method}($orm->{$property});
        }
        return $obj;
    }

    private function get_rows ($result) {
        if (!is_array($result)) {
            return ($this->map_object($result));
        } else {
            $rows=array();
            foreach ($result as $orm) {
                array_push ($rows, $this->map_object($orm));
            }
            return $rows;
        }
    }

}
