<?php

class propose extends table {
    public $name='propose';

	function get_form() {
        return array(
        	    'topic'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(topic::option()),
                        'default'=>get('topic'),
                ),
                'scene'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(scene::getScene()),
                ),
                'process'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(process::getProcess()),
                ),
        );
    }
}