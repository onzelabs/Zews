<?php

class rss_Reader extends abstractTracker {

    private $items;

    public function __construct() {
      parent::__construct();
      $this->items=array();
    }

    protected function load_items() {
        $feed = new SimplePie();
        $feed->set_cache_location('C:/Users/Vicente/Documents/000 Proyectos/Onze Labs/000 Localhost/htdocs/2014_003_PoC/app/cache');
        $feed->set_feed_url($this->url);
        $feed->init();
        $feedItems=$feed->get_items();

        $feedMapper=new feedMapper();
        $feedDO=$feedMapper->get_by_id($this->id);

        foreach ($feedItems as $f) {
            $itemDO=new item();
            $itemDO->set_feed_ix($feedDO->get_id());
            $itemDO->set_element('');
            $itemDO->set_title($f->get_title());
            $itemDO->set_link($f->get_link());
            $itemDO->set_description($f->get_description());
            $author=$f->get_author();
            $itemDO->set_author($author->get_name());
            $itemDO->set_comments('');
            $itemDO->set_guid($f->get_id());
            $pubdate=new datetime($f->get_date());
            $itemDO->set_pubdate($pubdate->format('Y-m-d H:i:s'));
            $itemDO->set_source($f->get_source());
            $itemDO->set_content($f->get_content());
            $itemDO->set_state(0);
            $itemDO->set_created_at($this->start_at);
            $itemDO->set_updated_at(null);

            array_push($this->items,$itemDO);
        }
        return sizeof($this->items);
    }

    protected function verify_items() {
        $verified=0;
        $duplicated=0;

        $feedMapper=new feedMapper();
        $feedDO=$feedMapper->get_by_id($this->id);
        // DATE - Solo extrae la fecha. Se seleccionan ITEMS del día.
        $sql='SELECT title FROM item WHERE feed_ix='.$feedDO->get_id().' AND DATE_FORMAT(created_at,"%Y-%m-%d")=STR_TO_DATE("'.$this->start_at.'", "%Y-%m-%d")';

        $itemMapper=new itemMapper();
        $itemDO=$itemMapper->get_by_query($sql);
        foreach ($this->items as $item) {
            $verified+=1;
            $item->set_state(1);
            foreach ($itemDO as $item_in_db) {
                if ($item->get_title()===$item_in_db->get_title()) {
                    $duplicated+=1;
                    $item->set_state(99);
                }
            }
        }

        return array('verified' => $verified, 'duplicated' => $duplicated);

    }

    protected function analize_items() {
        $analized=0;

        foreach ($this->items as $item) {
            if ($item->get_state()===1) {
                $analized+=1;
                $item->set_state(2);
            }
        }

        return $analized;
    }

    protected function save_items() {
        $itemMapper=new itemMapper();
        $saved=0;
        foreach ($this->items as $item) {
            //print_r($item);
            if ($item->get_state()===2) {
                $saved+=1;
                /*
                if ($saved == 3) {
                    ORM::get_db()->rollBack();
                    trigger_error("No se puede dividir por cero", E_USER_ERROR);
                }
                */
                $itemMapper->insert($item);
            }
        }

        return $saved;

    }

    /* GETTERS & SETTERS */

}
