<?php

class tracker_category extends BaseDO {
    protected $tracker_ix;
    protected $category_ix;
    protected $order;
    protected $created_at;
    protected $updated_at;

    public function __construct () {
    }

    public function get_tracker_ix(){
        return $this->tracker_ix;
    }

    public function set_tracker_ix($tracker_ix){
        $this->tracker_ix = $tracker_ix;
    }

    public function get_category_ix(){
        return $this->category_ix;
    }

    public function set_category_ix($category_ix){
        $this->category_ix = $category_ix;
    }

    public function get_order(){
        return $this->order;
    }
    public function set_order($order){
        $this->order = $order;
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

?>
