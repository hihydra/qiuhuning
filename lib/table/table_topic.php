<?php

if (!defined('ROOT')) exit('Can\'t Access !');
class table_topic extends table_mode {
    function add_before(act $act) {
    }
    function save_before() {
    	parent::save_before();
    	if(!front::post('scene')) {
            front::$post['scene']='';
        }
    }
}