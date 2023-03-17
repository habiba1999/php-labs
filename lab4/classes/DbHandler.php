<?php
interface DbHandler {
    public function connect();
    public function get_data_all_records_paginated($fields = array(),  $start = 0);
    public function disconnect();   
    public function get_record_by_id($id,$primary_key);
    //public function get_no_data_in_db();
    
    
}