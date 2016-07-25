<?php

class bot extends BaseDO {
    protected $id;
    protected $name;
    protected $state;
    protected $starts;
    protected $ends;
    protected $created_at;
    protected $updated_at;

    public function __construct () {
    }

    public function get_id(){
        return $this->id;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function get_name(){
        return $this->name;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function get_state(){
        return $this->state;
    }

    public function set_state($state){
        $this->state = $state;
    }

    public function get_starts(){
        return $this->starts;
    }

    public function set_starts($starts){
        $this->starts = $starts;
    }

    public function get_ends(){
        return $this->ends;
    }

    public function set_ends($ends){
        $this->ends = $ends;
    }

    public function get_created_at(){
        return $this->created_at;
    }

    public function set_created_at($created_at){
        $this->created_at = $created_at;
    }

    public function get_updated_at(){
        return $this->updated_at;
    }

    public function set_updated_at($updated_at){
        $this->updated_at = $updated_at;
    }

}
