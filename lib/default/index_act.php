<?php
if (!defined('ROOT'))
    exit('Can\'t Access !');
class index_act extends act {
    function index_action() {
        $this->_tag=new tag;
        $tag=$this->_tag->getrows('','12','tagid asc');
        foreach ($tag as $key => &$value) {
            $tag[$key]['url']=$this->_tag->url($value['tagname']);
        }
        $this->view->tags=$tag;
        if(front::get('city')){
            $area = new area();
            $city = $area->getrow("slug = '".front::get('city')."'");
            $this->view->city = '0,'.$city['id'].',0';
        }else{
            $this->view->city = '';
        }
    	$this->check_pw();
    }
    function end() {
        if (front::$debug)
            $this->render('style/index.html');
        else
            $this->render();
    }
}