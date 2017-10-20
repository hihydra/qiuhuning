<?php
if (!defined('ROOT')) exit('Can\'t Access !');
class propose_act extends act
{
    public $auto_end = true;
    function init() {
        $user = array();
        $guest = front::get('guest');
        $guestuser = array();
        $this->_user = new user;
        if($guest=='1'&&config::get('opguestadd')) {
            $guestuser = $user = array(
                'userid' => 0,
                'username' => 'Guest',
                'nickname' => lang('tourist'),
                'groupid' => 0,
                'checked' => 1,
                'intro' => 'Guest',
                'point' => '',
                'introducer' => '',
                );
        }else {
            $username = cookie::get('login_username');
            $password = cookie::get('login_password');
            if($username != '' && $password != '') {
                $guestuser = $user = $this->_user->getrow(array('username'=>$username));
                if(front::cookie_encode($user['password']) != $password){
                    $guestuser = $user = array();
                }
            }
        }
        $this->view->guestuser = $guestuser;
        if(!$user && front::$act != 'login' && front::$act != 'register' &&front::$act != 'index'&&front::$act != 'propose')  front::redirect(url::create('user/login'));
        $this->view->user = $user;
    }
    function index_action(){
        $this->_process=new process;
        $process=$this->_process->getrows('','','listorder asc');

        $topic=topic::getTopic();

        $this->_scene=new scene;
        $scene=$this->_scene->getrows('','','listorder asc');

        $this->view->propose = compact('process','topic','scene');

        return;
    }

    function propose_action()
    {
        if (front::post('submit')) {
            $this->propose = new propose();
            if(!$this->view->user['userid']){
/*
                if(!preg_match('/^1([0-9]+){5,}$/is',front::$post['telphone'])){
                    echo '<script type="text/javascript">alert("'.lang('phone_number_format_is_wrong').'");window.location.href="?case=propose";</script>';
                    exit;
                }
*/
                if (config::get('aliyun-sms')) {
                    $mobilenum = front::$post['mobilenum'];
                    $smsCode = new SmsCode();
                    if (!$smsCode->chkcode($mobilenum)) {
                        echo '<script type="text/javascript">alert("'.lang('cell_phone_parity_error').'");window.location.href="?case=propose";</script>';
                        return;
                    }
                }
/*
                if ($this->_user->getrow(array('tel' => front::$post['telphone']))) {
                    echo '<script type="text/javascript">alert("该手机号已注册请先登陆");window.location.href="' . url::create('user/login'). '";</script>';
                    exit;
                }
*/
                $username = front::$post['telphone'];
                $password = md5(substr(front::$post['telphone'],-6));
                $tel = front::$post['telphone'];
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'tel' => $tel,
                    'groupid' => 101,
                    'userip' => front::ip()
                    );
                $findUser = $this->_user->getrow(array('tel' => front::$post['telphone']));
                if ($findUser) {
                    front::$post['userid'] = $findUser['userid'];
                    cookie::set('login_username', $username);
                    cookie::set('login_password', front::cookie_encode($password));
                    session::set('username', $username);
                }else{
                    $insert_user = $this->_user->rec_insert($data);
                    front::$post['userid'] = $this->_user->insert_id();
                    if($insert_user){
                        cookie::set('login_username', $username);
                        cookie::set('login_password', front::cookie_encode($password));
                        session::set('username', $username);
                    }
                }
            }else{
                front::$post['userid'] = $this->view->user['userid'];
                front::$post['telphone'] = $this->view->user['tel'];
            }


            front::$post['time'] = front::$post['time']?front::$post['time']:'时间待定';
            front::$post['adddate'] = date("Y-m-d H:i:s",time());
            front::$post['ip'] = front::ip();

            if (!isset(front::$post['logisticsid'])){
                front::$post['logisticsid'] = 0;
            }
            $payname = front::$post['payname'] ? front::$post['payname'] : 'alipay';
            front::$post['oid'] = date('YmdHis') . '-' . front::$post['logisticsid'] . '-' . front::$post['userid'] . '-' . $payname;
            front::$post['process_id'] = 2;
            front::$post['status'] = 1;
            $insert = $this->propose->rec_insert(front::$post);

            if ($insert < 1) {
                echo '<script type="text/javascript">alert("'.lang('add_failure').'");window.location.href="?case=propose";</script>';
                return;
            } else{
                if(empty($insert_user)){
                    echo '<script type="text/javascript">window.location.href="' . url('propose/paypropose/oid/' .front::$post['oid'], true). '";</script>';
                }else{
                    echo '<script type="text/javascript">alert("已自动为您注册用户，用户名为手机号，密码为手机号后6位");window.location.href="' . url('propose/paypropose/oid/' .front::$post['oid'], true). '";</script>';
                }
            }
            exit;
        }
    }
    function paypropose_action(){
        if (!front::get('oid')) {
            $propose = propose::getInstance()->getrow(['userid'=>$this->view->user['userid']]);
            if (empty($propose)) {
                echo '<script type="text/javascript">alert("您还没有下过订单。");window.location.href="?case=propose";</script>';
                exit;
            }
            $oid = $propose['oid'];
        }else{
            $oid = front::get('oid');
        }
            //var_dump($oid);die;
        preg_match_all("/-(.*)-(.*)-(.*)/isu", $oid, $oidout);
        $this->view->paytype = $oidout[3][0];
        if($this->view->user['userid'] != $oidout[2][0]){
            echo '<script type="text/javascript">alert("您无法支付别人的订单。");window.location.href="?case=propose";</script>';
            exit;
        }
        $this->view->user_id = $oidout[2][0];
        $payfilename = $this->view->paytype;
        $where = array();
        $payfilename = $where['pay_code'] = $this->view->paytype;
        $this->view->pay = pay::getInstance()->getrows($where);
        $where = array();
        $where['oid'] = $oid;
            //var_dump(propose::getInstance()->getrow($where));die;
        $propose = propose::getInstance()->getrow($where);
            //var_dump($propose);exit;
        if($propose['status']==0 || empty($propose)){
            echo '<script type="text/javascript">alert("该订单不存在或者已关闭");window.location.href="?case=propose";</script>';
            exit;
        }
        $this->_process=new process;
        $propose['proces']=$this->_process->getrow("id=".$propose['process_id']);
        $this->_topic=new topic;
        $propose['topic']=$this->_topic->getrow("id=".$propose['topic_id']);
        $this->_scene=new scene;
        $propose['scene']=$this->_scene->getrow("id=".$propose['scene_id']);
        $this->view->process=$this->_process->getrows('','','listorder asc');
        $this->view->propose=$propose;
        $order['ordersn'] = $oid;
        $order['title'] = $this->view->propose['topic']['name'];
        $order['id'] =  $this->view->propose['id'];
        $order['orderamount'] = $this->view->propose['price'];
        include_once ROOT . '/lib/plugins/pay/' . $payfilename . '.php';
        $payclassname = $payfilename;
        $payobj = new $payclassname();

        $this->view->gotopaygateway = $payobj->get_code($order, unserialize_config($this->view->pay[0]['pay_config']));


    }

    function respond_action()
    {
        $out_trade_no = $_GET['subject'] ? $_GET['subject'] : $_POST['subject'];
        $code = explode('-', $out_trade_no);
   
        $payclassname = $code[3];
        $flist = array('alipay', 'nopay', 'paypal', 'paypal_ec', 'tenpay', 'malipay','wxpay');
        if (!in_array($payclassname, $flist)) {
            exit(lang('illegal_parameter'));
        }
        include_once ROOT . '/lib/plugins/pay/' . $payclassname . '.php';
        $payobj = new $payclassname();
        if (!front::$get['oid'] && !$out_trade_no) {
            exit(lang('illegal_parameter'));
        }
        //$status = $payobj->respond();
        if ($_POST['out_trade_no']) {
            if ($status) {
                exit('success');
            } else {
                exit('fail');
            }
        }
        if($_GET['trade_status'] == "WAIT_SELLER_SEND_GOODS"||$_GET['trade_status'] == "TRADE_FINISHED" || $_GET['trade_status'] == "TRADE_SUCCESS") {
            $where = $row = array();
            $row['status'] = 2 ;
            $row['process_id'] = 3 ;
            $where['oid'] = front::get('subject');
            $propose = propose::getInstance()->rec_update($row,$where);
            front::refresh(url('propose/paypropose/oid/' .front::get('subject'), true));
        } else {
            echo '<script type="text/javascript">alert("' . lang('go_order') . '")</script>';
            front::refresh(url('propose/paypropose/oid/' .front::get('subject'), true));
        }
    }
    function out($tpl)
    {
        if (front::$debug)
            return;
        $this->render($tpl);
        $this->out = true;
        exit;
    }

    function end()
    {
        if (isset($this->out))
            return;
        if ($this->auto_end) {
            if (front::$debug)
                $this->render('style/index.html');
            else
                $this->render();
        }
    }




}



        
        
        
        
        
        
        
        
        
        
        
        
        
        
        