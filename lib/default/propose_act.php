<?php

class propose_act extends act
{
    public $auto_end = true;

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
            $this->out('message/orderssuccess.html');
         }
        /*
        if (front::post('submit')) {
            $this->propose = new propose();
            front::$post['userid'] = 1;

            front::$post['adddate'] = time();
            front::$post['ip'] = front::ip();

            if (!isset(front::$post['logisticsid'])){
                front::$post['logisticsid'] = 0;
            }
            $payname = front::$post['payname'] ? front::$post['payname'] : 'none';
            front::$post['oid'] = date('YmdHis') . '-' . front::$post['logisticsid'] . '-' . front::$post['mid'] . '-' . $payname;
            front::$post['process_id'] = 1;
            front::$post['status'] = 1;
            $insert = $this->propose->rec_insert(front::$post);
            /*
            if ($insert < 1) {
                front::flash($this->tname . lang('add_failure'));
            } else {
                if (config::get('sms_on') && config::get('sms_order_on')) {
                    $smsCode = new SmsCode();
                    $content = $smsCode->getTemplate('order', array($this->view->user['username'], front::$post['oid']));
                    sendMsg(front::$post['telphone'], $content);
                }
                if (config::get('sms_on') && config::get('sms_order_admin_on') && $mobile = config::get('site_mobile')) {
                    sendMsg($mobile, lang('web_ site') . date('Y-m-d H:i:s') . lang('ordersnotalreadydo'));
                    //echo 11;
                }

                //$user = $this->view->user;
                if (config::get('email_order_send_cust') && front::$post['postcode']) {
                    $title = lang('you_in') . config::get('sitename') . lang('the_order') . front::get('oid') . lang('has_been_submitted');
                    $this->sendmail(front::$post['postcode'], $title, $title);
                }
                if (config::get('email_order_send_admin') && config::get('email')) {
                    $title = lang('web_ site') . date('Y-m-d H:i:s') . lang('ordersnotalreadydo');
                    $this->sendmail(config::get('email'), $title, $title);
                }
                if (front::$post['payname'] && front::$post['payname'] != 'nopay') {

                    echo '<script type="text/javascript">alert("' . lang('orderssuccess') . ' ' . lang('now_turn_to_pay_page') . '");window.location.href="' . url('archive/payorders/oid/' . front::$post['oid'], true) . '";</script>';
                    exit;
                }
                echo '<script type="text/javascript">alert("' . lang('orderssuccess') . '");window.location.href="' . url('archive/orders/oid/' . front::$post['oid'], true) . '";</script>';
                exit;
            }
        } elseif (front::get('oid')) {
            preg_match_all("/-(.*)-(.*)-(.*)/isu", front::get('oid'), $oidout);
            $this->view->paytype = $oidout[3][0];
            //非会员不可查看
            if ($oidout[2][0] != $this->view->user['userid']) {
                alertinfo(lang('view_order_failure'), url::create('index/index'));
            }

            $where = array();
            $where['oid'] = front::get('oid');
            $this->view->orders = orders::getInstance()->getrow($where);
            $this->view->statusnum = $data['status'] = $this->view->orders['status'];
            $unpay = false;
            switch ($data['status']) {
                case 1:
                    $data['status'] = lang('complete');
                    break;
                case 2:
                    $data['status'] = lang('processing');
                    break;
                case 3:
                    $data['status'] = lang('shipped');
                    break;
                case 4:
                    $data['status'] = lang('pending_audit_payment');
                    break;
                case 5:
                    $data['status'] = lang('check_payment');
                    break;
                default:
                    $data['status'] = lang('ordersnotalreadydo');
                    $unpay = true;
                    break;
            }
            $this->view->orders['status'] = $data['status'];
            /*if ($this->view->paytype) {
                $this->view->gotopaygateway = '<a href="' . url('archive/payorders/oid/' . front::get('oid'), true) . '">进入支付页面</a>';
            }*/
            /*
            //获取支付链接
            if ($unpay && $this->view->paytype && $this->view->paytype != 'nopay' && $this->view->paytype != 'none') {

                $logisticsid = $oidout[1][0];
                $this->view->archive = archive::getInstance()->getrow($this->view->orders['aid']);
                $prices = getPrices($this->view->archive['attr2']);
                $this->view->archive['attr2'] = $prices['price'];
                $where = array();
                $payfilename = $where['pay_code'] = $this->view->paytype;
                $this->view->pay = pay::getInstance()->getrows($where);
                $where = array();
                $where['id'] = $logisticsid;
                $this->view->logistics = logistics::getInstance()->getrows($where);
                if ($this->view->logistics[0]['cashondelivery']) {
                    $this->view->logistics[0]['price'] = 0.00;
                } else {
                    if ($this->view->logistics[0]['insure']) {
                        $this->view->logistics[0]['price'] = $this->view->logistics[0]['price'] + ($this->view->archive['attr2'] * $this->view->orders['pnums']) * ($this->view->logistics[0]['insureproportion'] / 100);
                    }
                }
                if (!isset($this->view->logistics[0]['price'])) {
                    $this->view->logistics[0]['price'] = 0;
                }
                $this->view->pay[0]['pay_fee'] = $this->view->pay[0]['pay_fee'] / 100;
                $this->view->total = $this->view->archive['attr2'] * $this->view->orders['pnums'] + $this->view->logistics[0]['price'] + ($this->view->archive['attr2'] * $this->view->orders['pnums'] * $this->view->pay[0]['pay_fee']);
                $order['ordersn'] = front::get('oid');
                $order['title'] = $this->view->archive['title'];
                $order['id'] = $this->view->orders['id'];
                $order['orderamount'] = $this->view->total;
                include_once ROOT . '/lib/plugins/pay/' . $payfilename . '.php';
                $payclassname = $payfilename;
                $payobj = new $payclassname();
                $this->view->gotopaygateway = $payobj->get_code($order, unserialize_config($this->view->pay[0]['pay_config']));
            }

            //var_dump($this->view->user);var_dump($_SESSION);exit();

            $this->out('message/orderssuccess.html');
        } elseif (intval(front::get('aid'))) {
            front::check_type(front::get('aid'));
            $aid = intval(front::get('aid'));
            $this->view->archive = archive::getInstance()->getrow($aid);
            $this->view->categorys = category::getpositionlink2($this->view->archive['catid']);
            $this->view->paylist = pay::getInstance()->getrows('', 50);
            $this->view->logisticslist = logistics::getInstance()->getrows('', 50);
            $prices = getPrices($this->view->archive['attr2']);
            $this->view->archive['attr2'] = $prices['price'];
            if (!is_array($this->view->archive))
                $this->out('message/error.html');
            if ($this->view->archive['checked'] < 1)
                exit(lang('unaudited'));
            if (!rank::arcget($aid, $this->view->usergroupid)) {
                $this->out('message/error.html');
            }
        } else {

            $oreders_c = cookie::get('ce_orders_cookie');
            $oreders_c = base64_decode($oreders_c);
            $oreders_c = xxtea_decrypt($oreders_c, config::get('cookie_password'));
            //var_dump($oreders_c);
            if (preg_match('/(union|select|update|delete)/i', $oreders_c)) {
                alerterror(lang('illegal_character'));
            }
            $oreders_c = stripslashes(htmlspecialchars_decode($oreders_c));
            $aid = !empty($oreders_c) ? unserialize($oreders_c) : 0;
            if ($aid) {
                foreach ($aid as $key => $val) {
                    $archive = archive::getInstance()->getrow(intval($val['aid']));
                    $val['title'] = $archive['title'];
                    $prices = getPrices($archive['attr2']);
                    $val['attr2'] = $prices['price'];
                    $val['thumb'] = $archive['thumb'];
                    $val['url'] = $archive['url'];
                    $aid[$key] = $val;
                }
                $this->view->orderaidlist = $aid;
                $this->view->paylist = pay::getInstance()->getrows('', 50);
                $this->view->logisticslist = logistics::getInstance()->getrows('', 50);
            } else {
                if (isset(front::$get['oid'])) {
                    if ($_SERVER['HTTP_REFERER']) {
                        front::refresh($_SERVER['HTTP_REFERER']);
                    } else {
                        front::refresh(url('index'));
                    }
                    exit;
                }
                echo '<script type="text/javascript">alert("' . lang('the commodity shopping cart') . '");';
                if ($_SERVER['HTTP_REFERER']) {
                    echo 'window.location.href="' . $_SERVER['HTTP_REFERER'] . '";';
                } else {
                    echo 'window.location.href="' . url('index') . '";';
                }
                echo '</script>';
            }
        }*/
       // $this->render('pay/orders.html');
         //   return $insert;
         //   exit;
        // }
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