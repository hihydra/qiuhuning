<?php

if (!defined('ROOT'))
    exit('Can\'t Access !');

class install_act extends act {

    function init() {
        header('Cache-control: private, must-revalidate');
        if (self::installed())
            exit('系统已安装！若要再安装，请删除文件 /install/locked ! ');
        set_time_limit(0);
    }

    function index_action() {

        $this->view->mysql_pass = false;
        if (front::get('step') == 2) {
            $connect = @mysql_connect(front::post('hostname'), front::post('user'), front::post('password'));
            if (front::post('createdb') && !@mysql_select_db(front::post('database'))) {
                @mysql_query("CREATE DATABASE " . front::post('database'));
                @mysql_query("ALTER DATABASE `$_POST[database]` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
            }
            front::$post['prefix'] = strtolower(front::$post['prefix']);
            if ($connect) {
                $ver = mysql_query('SELECT VERSION()  as ver');
                $ver = mysql_fetch_array($ver);
                $this->view->mysql_verion = $ver['ver'];
                $this->view->mysql_ver = (int) $ver['ver'];
                $db = @mysql_select_db(front::post('database'));
                if ($db)
                    $this->view->mysql_pass = true;
                else
                    $this->view->dberror = true;
                config::modify(front::$post);
                config::modify(array('cookie_password' => sha1(get_hash())));
                config::modify(array('install_admin' => front::post('admin_username')));
                if (!front::post('admin_password') || !front::post('admin_username') || front::post('admin_password') <> front::post('admin_password2')) {
                    $this->view->adminerror = true;
                }

                if ($this->view->mysql_pass && front::post('install')) {
                    $this->instalsqltype = front::post('testdata');
                    $this->smodarr = front::post('smod');
                    $this->prepare(); //WWW
                    return;
                }
                mysql_close($connect);
            }else {
                //var_dump($_POST);
                //config::modify(front::$post);
            }
        }
        $this->render();
    }

    private function prepare() {
        set_time_limit(0);
        if ($this->instalsqltype) {
            $sqlquery = file_get_contents(ROOT . '/install/data/install_testdb.sql');
        } else {
            $sqlquery = file_get_contents(ROOT . '/install/data/install.sql');
        }
        $smods = '';
        if (!empty($this->smodarr)) {
            $smods = implode(',', $this->smodarr);
            foreach ($this->smodarr as $val) {
                $modsqlquery.=file_get_contents(ROOT . '/install/data/install_' . $val . '.sql');
                if (!$modsqlquery)
                    exit('模块数据库文件不存在！');
                config::modifymod(front::$post, $val);
                config::modifymod(array('url' => front::post('site_url') . $val), $val);
                config::modifymod(array('username' => front::post('user')), $val);
                config::modifymod(array('host' => front::post('hostname')), $val);
            }
        }
        config::modify(array('mods' => $smods));
        if (!$sqlquery)
            exit('数据库文件不存在！');
        $sqlquery = $sqlquery . $modsqlquery;
        $sqlquery = str_replace('cmseasy_', config::get('database', 'prefix'), $sqlquery);
        $sqlquery = str_replace('\'admin\'', '\'' . front::post('admin_username') . '\'', $sqlquery);
        $sqlquery = str_replace('\'21232f297a57a5a743894a0e4a801fc3\'', '\'' . md5(front::post('admin_password')) . '\'', $sqlquery);

        file_put_contents(ROOT.'/install/install.data',$sqlquery);

        front::redirect(url::create('install/view'));

//        $user = new user();
//        $this->gather();
//        if (is_array($mysql->getrow("username='" . front::post('admin_username') . "'"))) {
//            $this->view->install = true;
//        }
    }

    function database_action() {
        $data_file=ROOT.'/install/install.data';

        if(file_exists($data_file)==false)
            exit('找不到数据文件。');

        $sqlquery=file_get_contents($data_file);

        $mysql = new user();
        $sqlquery = str_replace("\r", "", $sqlquery);
        $sqls = preg_split("/;[ \t]{0,}\n/", $sqlquery);
        $nerrCode = "";
        $i = 0;

        //WWW
        $sqls2=array();
        foreach ($sqls as $i=> $q) {
            $q = trim($q);
            if ($q != '') {
                $sqls2[]=$q;
            }
        }

        echo '<script type="text/javascript">setInterval(function(){window.scrollTo(0,document.body.scrollHeight);},300);</script>';
		echo '<style>*{line-height:180%;font-size:12px;color:#888;}</style>';
        foreach ($sqls2 as $i=>$q) {

            echo str_pad(' ',1024,' ');

            if(preg_match('/CREATE TABLE `?(\w+)`?/',$q,$match)>0)
                echo '正在安装数据表	'.$match[1].'...<br>';

            if(preg_match('/INSERT INTO `?\w+b_area`? VALUES\(\'(\d+)\'/',$q,$match)>0) {
                if(((int)$match[1])%600==0) {
                    if((int)$match[1]==600)
                        echo '正在安装地区数据...';
                    else
                        echo '...';
                }
                if($match[1]==3000)
                    echo '<br>';
            }

            if ($mysql->query($q)) {
                //usleep(10);
                //$i++;
            } else {
                $nerrCode .= "执行： <font color='blue'>$q</font> 出错!</font><br>";
            }
        }

        @unlink($data_file);

        //WWW
        echo '数据表安装完成 ！';
        echo '<script type="text/javascript">setTimeout(function(){window.top.location="'.url::create('install/success').'";},1000);</script>';
    }

    function view_action() {
        $this->render();
    }

    function success_action() {
        $this->render();
         file_put_contents(ROOT . '/install/locked', 'install-locked !');
        @unlink(ROOT . '/install/index.php');
    }

 
}