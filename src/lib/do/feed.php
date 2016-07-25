<?php

class feed extends BaseDO {
    protected $id;
    protected $name;
    protected $url;
    protected $category_feed;
    protected $category_ix;
    protected $title;
    protected $link;
    protected $description;
    protected $pubDate;
    protected $category;
    protected $image_url;
    protected $image_title;
    protected $image_link;
    protected $created_at;
    protected $updated_at;


    public function __construct () {
    }
    public function get_id(){
        return $this->id;
    }
    public function set_id($id){
        $this->id = $id;
    }
    public function get_name(){
        return $this->name;
    }
    public function set_name($name){
        $this->name = $name;
    }
    public function get_url(){
        return $this->url;
    }
    public function set_url($url){
        $this->url = $url;
    }

    public function get_category_feed(){
        return $this->category_feed;
    }

    public function set_category_feed($category_feed){
        $this->category_feed = $category_feed;
    }

    public function get_category_ix(){
        return $this->category_ix;
    }

    public function set_category_ix($category_ix){
        $this->category_ix = $category_ix;
    }
    public function get_title(){
        return $this->title;
    }

    public function set_title($title){
        $this->title = $title;
    }
    public function get_link(){
        return $this->link;
    }
    public function set_link($link){
        $this->link = $link;
    }
    public function get_description(){
        return $this->description;
    }
    public function set_description($description){
        $this->description = $description;
    }
    public function get_pubdate(){
        return $this->pubdate;
    }
    public function set_pubdate($pubdate){
        $this->pubdate = $pubdate;
    }

    public function get_category(){
        return $this->category;
    }
    public function set_category($category){
        $this->category = $category;
    }
    public function get_image_url(){
        return $this->image_url;
    }
    public function set_image_url($image_url){
        $this->image_url = $image_url;
    }
    public function get_image_title(){
        return $this->image_title;
    }
    public function set_image_title($image_title){
        $this->image_title = $image_title;
    }
    public function get_image_link(){
        return $this->image_link;
    }
    public function set_image_link($image_link){
        $this->image_link = $image_link;
    }
    public function get_created_at(){
        return $this->created_at;
    }
    public function set_created_at($created_at){
        $this->created_at = $created_at;
    }
    public function get_updated_at(){
        return $this->updated_at;
    }
    public function set_updated_at($updated_at){
        $this->updated_at = $updated_at;
    }

}
