<?php

class tracker_message extends BaseDO {
    protected $id;
    protected $tracker_ix;
    protected $message;
    protected $is_read;
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

    public function get_tracker_ix(){
        return $this->tracker_ix;
    }

    public function set_tracker_ix($tracker_ix){
        $this->tracker_ix = $tracker_ix;
    }

    public function get_message(){
        return $this->message;
    }
    public function set_message($message){
        $this->message = $message;
    }

    public function set_is_read($is_read){
        $this->is_read = $is_read;
    }

    public function get_is_read(){
        return $this->is_read;
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
