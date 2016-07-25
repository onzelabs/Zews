<?php

class item extends BaseDO {
    protected $id;
    protected $feed_ix;
    protected $logger_ix;
    protected $element;
    protected $title;
    protected $link;
    protected $description;
    protected $author;
    protected $comments;
    protected $guid;
    protected $pubdate;
    protected $source;
    protected $content;
    protected $state;
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

    public function get_feed_ix(){
        return $this->feed_ix;
    }

    public function set_feed_ix($feed_ix){
        $this->feed_ix = $feed_ix;
    }

    public function get_logger_ix(){
        return $this->logger_ix;
    }

    public function set_logger_ix($logger_ix){
        $this->logger_ix = $logger_ix;
    }

    public function get_element(){
        return $this->element;
    }

    public function set_element($element){
        $this->element = $element;
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

    public function get_author(){
        return $this->author;
    }

    public function set_author($author){
        $this->author = $author;
    }

    public function get_comments(){
        return $this->comments;
    }

    public function set_comments($comments){
        $this->comments = $comments;
    }

    public function get_guid(){
        return $this->guid;
    }

    public function set_guid($guid){
        $this->guid = $guid;
    }

    public function get_pubdate(){
        return $this->pubdate;
    }

    public function set_pubdate($pubdate){
        $this->pubdate = $pubdate;
    }

    public function get_source(){
        return $this->source;
    }

    public function set_source($source){
        $this->source = $source;
    }

    public function get_content(){
        return $this->content;
    }

    public function set_content($content){
        $this->content = $content;
    }

    public function get_state(){
        return $this->state;
    }

    public function set_state($state){
        $this->state = $state;
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
