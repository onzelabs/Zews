<?php

class logger extends BaseDO {

    protected $id;
    protected $tracker_ix;
    protected $state;
    protected $pid;
    protected $loaded;
    protected $verified;
    protected $duplicated;
    protected $analized;
    protected $saved;
    protected $message;
    protected $created_at;
    protected $updated_at;

    public function __construct() {
      $this->id=null;
      $this->loaded=0;
      $this->verified=0;
      $this->duplicated=0;
      $this->analized=0;
      $this->saved=0;
    }

    public function save() {
        $loggerMapper=new loggerMapper();

        if ($this->id===null) {
          $this->id=$loggerMapper->insert($this);
        } else {
          $loggerMapper->update($this);
        }
    }

    public function send_email() {
    }

    /* GETTERS & SETTERS */

    public function get_id(){
        return $this->id;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function get_tracker_ix(){
        return $this->bot_source_ix;
    }

    public function set_tracker_ix($tracker_ix){
        $this->tracker_ix = $tracker_ix;
    }

    public function get_state(){
        return $this->state;
    }

    public function set_state($state){
        $this->state = $state;
    }

    public function get_pid(){
        return $this->pid;
    }

    public function set_pid($pid){
        $this->pid = $pid;
    }

    public function get_loaded(){
        return $this->loaded;
    }

    public function set_loaded($loaded){
        $this->loaded = $loaded;
    }

    public function get_verified(){
        return $this->verified;
    }

    public function set_verified($verified){
        $this->verified = $verified;
    }

    public function get_duplicated(){
        return $this->duplicated;
    }

    public function set_duplicated($duplicated){
        $this->duplicated = $duplicated;
    }

    public function get_analized(){
        return $this->analized;
    }

    public function set_analized($analized){
        $this->analized = $analized;
    }

    public function get_saved(){
        return $this->saved;
    }

    public function set_saved($saved){
        $this->saved = $saved;
    }

    public function get_message(){
        return $this->message;
    }

    public function set_message($message){
        $this->message = $message;
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
