<?php
/**
*
*/
class scene extends table
{
	public  $name='propose_scene';

    public function getScene(){
    	$scene=new scene();
        $datas=$scene->getrows('','','listorder asc');
        foreach ($datas as $data) {
            $result[$data['id']]=$data['name'];
        }
    	return $result;
    }
}