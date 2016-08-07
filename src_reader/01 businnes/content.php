<?php

class content {

  public $data;

  private $id;

  public function __construct($path,$id) {

    $this->data=[];

    $this->id=$id;

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

  }

  private function getItemsbyTracker() {

  }

}

?>
