<?php

class propose extends table {
    public $name='propose';
    static $me;
    public static function getInstance() {
        if (!self::$me) {
            $class=new propose();
            self::$me=$class;
        }
        return self::$me;
    }
	function get_form() {
        return array(
        	    'topic_id'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(topic::option()),
                        'default'=>get('topic'),
                ),
                'scene_id'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(scene::getScene()),
                ),
                'process_id'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(process::getProcess()),
                ),
        );
    }
}
        