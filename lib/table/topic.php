<?php
/**
*
*/
class topic extends table
{
	public  $name='propose_topic';

	function get_form() {
        return array(
                'scene'=>array(
                        'selecttype'=>'checkbox',
                        'select'=>form::arraytoselect(scene::getScene()),
                ),
        );
    }

    public function getTopic(){
    	$topic=new topic();
        $datas=$topic->getrows('','','listorder asc');
        foreach ($datas as $data) {
            $result[$data['id']]=$data['name'];
        }
    	return $result;
    }
}