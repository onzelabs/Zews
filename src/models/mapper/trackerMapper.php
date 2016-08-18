<?php

class trackerMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('tracker');
    }

    public function create () {
      return new Tracker ();
    }

    /* Foreign keys access methods */

    public function get_by_category($category_ix) {

      $sql='SELECT *';
      $sql.=' FROM '.$this->get_table();

      if (is_array($category_ix)) {
        $sql.=' WHERE category_ix IN (' . implode(',', array_map('intval', $category_ix)) . ')';
      }  else  {
        $sql.=' WHERE category_ix='.$category_ix;
      }

      return $this->get_by_query($sql);

    }
}

?>
