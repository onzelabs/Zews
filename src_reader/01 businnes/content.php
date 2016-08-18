<?php

class content {

  public $data;
  private $id;

  private $header;
  private $page;
  private $items;
  private $items_per_page;

  public function __construct($path,$id,$page) {
    $this->data=[];
    $this->id=$id;

    $this->page=$page;
    $this->items=[];
    $this->items_per_page=9;


    switch ($path) {
      case 'reader/all':
        $this->getAll();
        break;
      /*
      case 'getItemsbyCategory':
        $this->getItemsbyCategory();
        break;
      case 'getItemsbyTracker':
        $this->getItemsbyTracker();
        break;
      default:
        break;
        */
    }

  }

  public function getData() {

    $data['header']=$this->header;
    $data['page']=$this->page;
    $data['items']=[];

    foreach ($this->items as $item) {
      $row=$item->get_values();
      $row['tracker']=$item->get_tracker_name();
      array_push($data['items'],$row);
    }
    return $data;

  }

  private function getAll() {
    $this->header='All';

    $categoryMapper=new categoryMapper();
    $trackerMapper=new trackerMapper();
    $itemMapper=new itemMapper();

    $categories=$categoryMapper->get_by_user(1);
    $categories_id=[];
    foreach ($categories as $category) {
      array_push($categories_id,$category->get_id());
    }

    $trackers=$trackerMapper->get_by_category($categories_id);
    $trackers_id=[];
    foreach ($trackers as $tracker) {
      array_push($trackers_id,$tracker->get_id());
    }

    $this->items=$itemMapper->page_by_tracker($trackers_id,$this->page,$this->items_per_page);

  }



  /*
  private function getItemsbyCategory() {
    $this->data['header']='';
    $this->data['page']=$this->page;
    $this->data['number_of_items']=0;
    $this->data['items']=[];

    $categoryMapper=new categoryMapper();
    $category=$categoryMapper->get_by_id($this->id);
    $this->data['header']=$category->get_name();

    $trackerMapper=new trackerMapper();
    $itemMapper=new itemMapper();
    $trackers=$trackerMapper->get_by_category($this->id);

    foreach ($trackers as $tracker) {
      $tracker_name=[];
      $tracker_name['tracker_name']=$tracker->get_name();

      $items=$itemMapper->get_by_tracker($tracker->get_id());
      foreach ($items as $item) {
        $item_array=$item->get_values();
        array_push($item_array,$tracker_name);
        array_push($this->data['items'],$item_array);
      }
    }
  }

  private function getItemsbyTracker() {
    $this->data['header']='';
    $this->data['page']=$this->page;
    $this->data['number_of_items']=0;
    $this->data['items']=[];

    $trackerMapper=new trackerMapper();
    $trackers=$trackerMapper->get_by_id($this->id);
    $this->data['header']=$trackers->get_name();

    $itemMapper=new itemMapper();
    $items=$itemMapper->get_by_tracker($this->id);

    $items=$itemMapper->page_by_tracker($this->id, $this->page, $this->items_per_page);
    $this->data['number_of_items']=sizeof($items);
    $this->data['items']=[];
    foreach ($items as $item) {
      array_push($this->data['items'],$item->get_values());
    }

  }

  private function getImage ($content) {

  }
  */
}

?>
