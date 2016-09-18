<?php

class sidebarController {

  public $data;

  private $tracker_categories;
  private $tracker_categoryMapper;

  /*
    Converts an array of (objects) tracker_categoryDO to an associative array like this:

        [tracker_category][0][tracker_id]=value;
        [tracker_category][0][category_ix]=value;
        [tracker_category][0][tracker_name]=value;
        [tracker_category][0][tracker_category]=value;
        ...
        [tracker_category][n][tracker_id]=value;
        [tracker_category][n][category_ix]=value;
        [tracker_category][n][tracker_name]=value;
        [tracker_category][n][tracker_category]=value;

  */
  public function __construct() {

    $this->data=[];

    $this->tracker_categoryMapper=new tracker_categoryMapper();
    $this->tracker_categories=$this->tracker_categoryMapper->get_by_user(1);

    foreach ($this->tracker_categories as $tracker_category) {
      $item=$tracker_category->get_values();

      if (!isset($this->data[$item['tracker_category']])) {
        $this->data[$item['tracker_category']]=[];
      }

      array_push($this->data[$item['tracker_category']],$item);
    }
    $this->data['categories']=$this->data;
  }

}
