<?php
if (!defined('ROOT'))
    exit('Can\'t Access !');
class index_act extends act {
    function index_action() {
        $this->_tag=new tag;
        $tag=$this->_tag->getrows('','6','tagid asc');
        $this->view->tags=$tag;
    	$this->check_pw();
    }
    function end() {
        if (front::$debug)
            $this->render('style/index.html');
        else
            $this->render();
    }
}