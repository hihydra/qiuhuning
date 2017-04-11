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

        $this->_scene=new scene;
        $scene=$this->_scene->getrows('','','listorder asc');
        //var_dump(compact('process','topic','scene'));die;
        $this->view->propose = compact('process','topic','scene');
        return;
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