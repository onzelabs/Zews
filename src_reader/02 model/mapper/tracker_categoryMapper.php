<?php

class tracker_categoryMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('tracker');
    }

    public function create () {
      return new tracker_category ();
    }

    public function get_raw_data() {
      $sql='SELECT tracker.id as tracker_id,tracker.category_ix as category_ix,tracker.name as tracker_name,category.name as tracker_category';
      $sql.=' FROM tracker';
      $sql.=' INNER JOIN category';
      $sql.=' ON category.id=tracker.category_ix';
      $sql.=' ORDER BY category.id,tracker.id';

      return $this->get_by_query($sql);
    }

}

?>
