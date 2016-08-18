<?php

class itemMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('item');
    }

    public function create () {
      return new item ();
    }

    /* Foreign keys access methods */

    public function get_by_tracker($tracker_ix) {

      $sql='SELECT *';
      $sql.=' FROM '.$this->get_table();

      if (is_array($tracker_ix)) {
        $sql.=' WHERE tracker_ix IN (' . implode(',', array_map('intval', $tracker_ix)) . ')';
      }  else  {
        $sql.=' WHERE tracker_ix='.$tracker_ix;
      }

      return $this->get_by_query($sql);

    }

    public function page_by_tracker($tracker_ix, $page, $num_items) {
      $sql='SELECT *';
      $sql.=' FROM '.$this->get_table();

      if (is_array($tracker_ix)) {
        $sql.=' WHERE tracker_ix IN (' . implode(',', array_map('intval', $tracker_ix)) . ')';
      }  else  {
        $sql.=' WHERE tracker_ix='.$tracker_ix;
      }

      $sql.=' ORDER BY pubdate DESC';
      $sql.=' LIMIT '.$num_items;
      $sql.=' OFFSET '.($page-1)*$num_items;

      return $this->get_by_query($sql);
    }

    /*
    public function page_by_category($category, $page, $num_items) {
      $sql='SELECT *';
      $sql.=' FROM '.$this->get_table();
      $sql.=' WHERE category_ix='.$category_ix;
      $sql.=' ORDER BY pubDate';
      $sql.=' LIMIT '.$num_items;
      $sql.=' OFFSET '.($page-1)*$num_items;

      return $this->get_by_query($sql);
    }
    */

}
