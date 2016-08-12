<?php

class itemMapper extends BaseMapper {

    public function __construct() {
       parent::__construct('item');
    }

    public function create () {
      return new item ();
    }

    public function get_by_tracker($tracker_ix) {
      $sql='SELECT *';
      $sql.=' FROM '.$this->get_table();
      $sql.=' WHERE feed_ix='.$tracker_ix;

      return $this->get_by_query($sql);
    }

    public function page_by_tracker($tracker_ix, $page, $num_items, $order) {
      $sql='SELECT *';
      $sql.=' FROM '.$this->get_table();
      $sql.=' WHERE feed_ix='.$tracker_ix;
      $sql.=' LIMIT '.$num_items;
      $sql.=' OFFSET '.($page-1)*$num_items;

      return $this->get_by_query($sql);
    }
}
