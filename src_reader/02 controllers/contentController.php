<?php

class contentController {

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
    $this->items_per_page=20;

    switch ($path) {
      case 'all':
        $this->getAll();
        break;
      case 'category':
        $this->getItemsbyCategory();
        break;
      case 'tracker':
        $this->getItemsbyTracker();
        break;
    }

  }

  public function getData() {

    $data['header']=$this->header;
    $data['page']=$this->page;
    $data['items']=[];

    foreach ($this->items as $item) {
      $row=$item->get_values();
      //title
      $title=$item->get_title();
      $description=$item->get_description();
      if (strlen($title)+strlen($description)>150) {
          $row['description']=substr($description,0,150-strlen($title)-3);
      }
      //pubdate
      $pubdate=date("Ymd",strtotime($item->get_pubdate()));
      $today=date("Ymd");
      $diff=$today-$pubdate;
      switch ($diff) {
        case 0:
          $row['pubdate']=date("H:i",strtotime($item->get_pubdate()));;
          break;
        case 1:
          $row['pubdate']="Yesterday";
        default:
          if ($diff<365) {
            $row['pubdate']=date("M d",strtotime($item->get_pubdate()));;
          } else {
            $row['pubdate']=date("M d, Y",strtotime($item->get_pubdate()));;
          }
          break;
      }
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

  private function getItemsbyCategory() {
    $categoryMapper=new categoryMapper();
    $trackerMapper=new trackerMapper();
    $itemMapper=new itemMapper();

    $category=$categoryMapper->get_by_id($this->id);
    $this->header=$category->get_name();

    $trackers=$trackerMapper->get_by_category($category->get_id());
    $trackers_id=[];
    foreach ($trackers as $tracker) {
      array_push($trackers_id,$tracker->get_id());
    }

    $this->items=$itemMapper->page_by_tracker($trackers_id,$this->page,$this->items_per_page);
  }

  private function getItemsbyTracker() {

    $trackerMapper=new trackerMapper();
    $itemMapper=new itemMapper();

    $tracker=$trackerMapper->get_by_id($this->id);
    $this->header=$tracker->get_name();
    $this->items=$itemMapper->page_by_tracker($tracker->get_id(),$this->page,$this->items_per_page);
  }

}

?>
