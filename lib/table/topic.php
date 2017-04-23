<?php
/**
*
*/
class topic extends table
{
	public  $name='propose_topic';
    static $me;
	function get_form() {
        return array(
                'parentid'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(topic::option()),
                        'default'=>get('parentid'),
                ),
        );
    }
    public static function getInstance() {
        if (!self::$me) {
            $class=new topic();
            $class->init();
            self::$me=$class;
        }
        return self::$me;
    }
    function init() {
        $_topic=$this->getrows(null,1000,'listorder=0,listorder asc');
        $topic=array();
        foreach ($_topic as $one) {
            if (!front::$admin) continue;
            $topic[$one['id']]=$one;
        }
        $this->topic=$topic;
        $parent=array();
        foreach ($topic as $one) {
            $parent[$one['id']]=$one['parentid'];
        }
        $this->parent=$parent;
        $this->tree=new tree($parent);
    }
    static function option($id=0,&$option=array(0=>'请选择...'),&$level=0) {
        $topic=self::getInstance();
        if (is_array($topic->son($id))) foreach ($topic->son($id) as $_id) {
                $strpre=$level >0 ?str_pad('',$level * 12,'&nbsp;').'└': '';
                $option[$_id]=$strpre.$topic->topic[$_id]['name'];
                if (is_array($topic->son($_id))) {
                    $level++;
                    self::option($_id,$option,$level);
                    $level--;
                }
            }
        return $option;
    }
    function son($id) {
        if (!isset($this->tree)) $this->init();
        return $this->tree->get_son($id);
    }
    function hasson($id) {
        return self::getInstance()->tree->has_son($id);
    }
    static function gettopicdata($_id=0,&$data=array(),&$level=0) {
        $topic=self::getInstance();
        $topics=$topic->son($_id);
        foreach ($topics as $id) {
            $info_=$topic->topic[$id];
            $strpre=$level >0 ?str_pad('',$level * 12,'&nbsp;').'└': '';
            $info_['name']=$strpre.$info_['name'];
            $info_['level']=$level;
            $data[]=$info_;
            if (is_array($topic->son($id))) {
                $level++;
                self::gettopicdata($id,$data,$level);
                $level--;
            }
        }
        return $data;
    }

    static function getTopic(){
    	$topic=self::getInstance();
        $_topics=$topic->getrows(null,1000,'listorder=0,listorder asc');
        $_topics = $topic->index($_topics,'id');
    	foreach ($_topics as $key => &$_topic) {
            if ($_topic['parentid']) {
                $_topics[$_topic['parentid']]['next'][] = $_topic;
                unset($_topics[$key]);
            }
        }
        return $_topics;
    }

    public function index (array $array, $name)
    {
        $indexedArray = array();
        if (empty($array)) {
            return $indexedArray;
        }

        foreach ($array as $item) {
            if (isset($item[$name])) {
                $indexedArray[$item[$name]] = $item;
                continue;
            }
        }
        return $indexedArray;
    }

}