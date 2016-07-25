<?php

  class bot_source extends BaseDO {
    protected $id;
    protected $bot_ix;
    protected $source_ix;
    protected $source_type;
    protected $state;
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

    public function get_bot_ix(){
        return $this->bot_ix;
    }

    public function set_bot_ix($bot_ix){
        $this->bot_ix = $bot_ix;
    }

    public function get_source_ix(){
        return $this->source_ix;
    }

    public function set_source_ix($source_ix){
        $this->source_ix = $source_ix;
    }

    public function get_state(){
        return $this->state;
    }

    public function set_state($state){
        $this->state = $state;
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
