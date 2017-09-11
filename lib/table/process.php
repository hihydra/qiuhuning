<?php
/**
*
*/
class process extends table
{
	public  $name='propose_process';


	public function getProcess(){
    	$process=new process();
        $datas=$process->getrows('','','listorder asc');
        foreach ($datas as $data) {
            $result[$data['id']]=$data['name'];
        }
    	return $result;
    }

}