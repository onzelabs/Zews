<?php

class categoryMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('category');
    }

    public function create () {
      return new category ();
    }

    /* Foreign keys access methods */

    public function get_by_user($user_ix) {
      $sql='SELECT *';
      $sql.=' FROM '.$this->get_table();
      $sql.=' WHERE user_ix='.$user_ix;

      return $this->get_by_query($sql);
    }

}

?>
