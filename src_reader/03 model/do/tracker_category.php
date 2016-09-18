<?php

class tracker_category extends BaseDO {
    protected $tracker_id;
    protected $category_ix;
    protected $tracker_name;
    protected $tracker_category;

    public function __construct () {
    }

    public function get_tracker_id(){
        return $this->tracker_id;
    }

    public function set_tracker_id($tracker_id){
        $this->tracker_id = $tracker_id;
    }

    public function get_category_ix(){
        return $this->category_ix;
    }

    public function set_category_ix($category_ix){
        $this->category_ix = $category_ix;
    }

    public function get_tracker_name(){
        return $this->tracker_name;
    }
    public function set_tracker_name($tracker_name){
        $this->tracker_name = $tracker_name;
    }

    public function get_tracker_category(){
        return $this->tracker_category;
    }
    public function set_tracker_category($tracker_category){
        $this->tracker_category = $tracker_category;
    }

}

?>
