<?php

if (!defined('ROOT'))
    exit('Can\'t Access !');

class propose_act extends act
{

    function index_action(){
        $this->_process=new process;
        $process=$this->_process->getrows('','','listorder asc');

        $this->_topic=new topic;
        $topic=$this->_topic->getrows('','','listorder asc');

        $scene=scene::getScene();
        foreach ($topic as $key => &$value) {
           $scene_array = explode(',',$value['scene']);
           foreach ($scene_array as $k => $val) {
              $value['scenes'][] = $scene[$val];
           }

        }
        return compact('process','topic');
    }

    function jsScene_action()
    {
        front::check_type(front::get('ids'));
        $ids = intval(front::get('ids'));
        $scene = $this->scene->getrow($id);
        $price = getPrices($archive['attr2']);
        echo tool::text_javascript($price['price']);
        exit;
    }


    function end() {
        $this->render();
    }

    function out($tpl) {
        if (front::$debug) return;
        $this->render($tpl);
        $this->out=true;
        exit;
    }


}