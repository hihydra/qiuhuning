<?php /* Smarty version 2.6.25, created on 2017-03-04 14:11:18
         compiled from request.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 企业在线客服</title>
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/celive.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/js/jquery.js"></script>
<?php echo '
<style type="text/css">
/*全局样式*/
img,body,html{border:0;}
address,caption,cite,code,dfn,em,strong,th,var{font-style:normal;font-weight:normal;}
ol,ul{list-style:none;}
caption,th{text-align:left;}
h1,h2,h3,h4,h5,h6{font-size:130%;}
/*边角样式(圆角)*/
.x-box-tl{background:transparent url(images/corners.gif) no-repeat 0 0;zoom:1;}
.x-box-tc{height:8px;background:transparent url(images/tb.gif) repeat-x 0 0;overflow:hidden;}
.x-box-tr{background:transparent url(images/corners.gif) no-repeat right -8px;}
.x-box-ml{background:transparent url(images/l.gif) repeat-y 0;padding-left:4px;overflow:hidden;zoom:1;}
.x-box-mc{background:#eee url(images/tb.gif) repeat-x 0 -16px;padding:4px 10px;font-family:"Myriad Pro","MyriadWeb","Tahoma","Helvetica","Arial",sans-serif;color:#393939;font-size:12px;}
.x-box-mc h3{font-size:14px;font-weight:bold;margin:0 0 4px 0;zoom:1;}
.x-box-mr{background:transparent url(images/r.gif) repeat-y right;padding-right:4px;overflow:hidden;}
.x-box-bl{background:transparent url(images/corners.gif) no-repeat 0 -16px;zoom:1;}
.x-box-bc{background:transparent url(images/tb.gif) repeat-x 0 -8px;height:8px;overflow:hidden;}
.x-box-br{background:transparent url(images/corners.gif) no-repeat right -24px;}
.x-box-tl,.x-box-bl{padding-left:8px;overflow:hidden;}
.x-box-tr,.x-box-br{padding-right:8px;overflow:hidden;}
/*表单样式*/
.wPanel {
	margin: -140px auto auto -180px;
	position: absolute;
	top: 50%;
	left: 50%;
	height: 400px;
	width:347px
}
.x-form-text {
	height:16px;
	line-height:16px;
	vertical-align:middle;
}
.x-form-text, textarea.x-form-field {
	background:#FFFFFF url(images/text-bg.gif) repeat-x scroll 0pt;
	border:1px solid #B5B8C8;
	padding:1px 1px;
}
/*版权信息*/
.wPanelfoot{
	font-family:"Myriad Pro","MyriadWeb","Tahoma","Helvetica","Arial",sans-serif;
	color:#aaaaaa;
	font-size:12px;
	text-align:center;
	padding-top:2px;
}
.box1{
	padding:10px;
	margin-top:30px;
}
#content {
	margin-top:20px;
	color:green;
}
</style>
'; ?>

</head>

<body>  


<div class="wPanel">
	<div class="x-box-tl">
		<div class="x-box-tr">
			<div class="x-box-tc"></div>
		</div>
	</div>

	<div class="x-box-ml">
		<div class="x-box-mr">
			<div class="x-box-mc" style="height: 173px;">
				
				


 
<?php if ($this->_tpl_vars['status'] == '0'): ?>
<div class="box1" align="center">
<br />
<h2><?php echo $this->_tpl_vars['lang']['welcome_into']; ?>
<?php echo $this->_tpl_vars['conf']['company']; ?>
<?php echo $this->_tpl_vars['lang']['com_live_chat']; ?>
</h2>
<p><span><?php echo $this->_tpl_vars['offline']; ?>
</span></p>
<p>
<?php echo $this->_tpl_vars['gotocmseasy']; ?>

</p>
</div>
<?php else: ?>
<div class="box1"  align="center">
<h2><?php echo $this->_tpl_vars['lang']['welcome_into']; ?>
<?php echo $this->_tpl_vars['conf']['company']; ?>
<?php echo $this->_tpl_vars['lang']['com_live_chat']; ?>
</h2>
<p><span><?php echo $this->_tpl_vars['online']; ?>
</span></p>
<?php echo $this->_tpl_vars['xajax_live']; ?>

<?php echo ' 
<script type="text/javascript">
var CEl = function()
{
xajax_Request();
setTimeout(CEl, '; ?>
<?php echo $this->_tpl_vars['conf']['tracker_refresh']; ?>
<?php echo ');
}
CEl();
</script>
'; ?>
  

<p align="center" id="content"></p>
<p><?php echo $this->_tpl_vars['lang']['please_wait_for_the_customer_service_in_the_background']; ?>
</p>
</div>
<?php endif; ?>

              </div>
			</div>
		</div>

		<div class="x-box-bl">
			<div class="x-box-br">
				<div class="x-box-bc"></div>
			</div>
		</div>

	
</div>

</body>
</html>