<?php

class trackerMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('tracker');
    }

    public function create () {
      return new Tracker ();
    }

    public function get_by_category($category_ix) {
      $sql='SELECT *';
      $sql.=' FROM '.$this->get_table();
      $sql.=' WHERE category_ix='.$category_ix;

      return $this->get_by_query($sql);
    }

}

?>
