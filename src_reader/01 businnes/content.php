<?php

class content {

  public $data;

  private $id;
  private $page;
  private $items_per_page;

  public function __construct($path,$id,$page) {

    $this->items_per_page=3;
    $this->data=[];

    $this->id=$id;
    $this->page=$page;

    switch ($path) {
      case 'getItemsbyCategory':
        $this->getItemsbyCategory();
        break;
      case 'getItemsbyTracker':
        $this->getItemsbyTracker();
        break;
      default:
        break;
    }

  }

  private function getItemsbyCategory() {
    $this->data['header']='';
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
    $this->data['pages']='';
    $this->data['items']=[];

    $trackerMapper=new trackerMapper();
    $trackers=$trackerMapper->get_by_id($this->id);
    $this->data['header']=$trackers->get_name();

    $itemMapper=new itemMapper();
    $items=$itemMapper->get_by_tracker($this->id);
    print_r (sizeof($items));

    $items=$itemMapper->page_by_tracker($this->id, $this->page, $this->items_per_page,null);
    $this->data['items']=[];
    foreach ($items as $item) {
      array_push($this->data['items'],$item->get_values());
    }

  }

  private function getImage ($content) {

  }

}

?>
