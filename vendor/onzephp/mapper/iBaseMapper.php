<?php

interface iBaseMapper {
    public function create ();
    public function get_table ();
    public function get_by_id ($id);
    public function get_all ();
    public function get_all_orderby ($field);
    public function get_by_query ($sql);
    public function delete ($id);
    public function insert ($dto);
    public function update ($dto);
    public function count ();
}
