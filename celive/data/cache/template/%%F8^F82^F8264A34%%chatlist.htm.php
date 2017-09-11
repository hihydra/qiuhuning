<?php /* Smarty version 2.6.25, created on 2017-03-04 14:13:58
         compiled from admin/chatlist.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/common.css" rel="stylesheet" type="text/css" />
<title>CElive</title>
</head>

<?php echo '
<style type="text/css">
.box {
  float:left;  
  margin:5px 10px;
  font-size:12px;
}

body {background:white;}

.border td {
	border:1px #F8F8F8 solid;
	padding:3px;
}

#info {padding:10px;}
</style>
'; ?>

<body>

<div id="info">
<div class="tags">
<div id="tagstitle">
   <a id="one1" onclick="setTab('one',1,6)" class="hover">交谈内容列表</a>
  </div> 
  <div id="tagscontent">
    <div id="con_one_1">

<div class="blank10"></div>


<table border="0" cellspacing="0" cellpadding="4" class="list" name="table" id="table">
<thead>
        <tr>
          <th align="center" width="11%"><!--userid-->状态提示</th>
          <th align="center" width="11%"><!--username-->选择客服</th>
          <th style="text-align:left;padding-left:15px;" width="80%"><!--nickname-->选择客户</th>
        </tr>
</thead>
<tbody>

<tr class="s_out" onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">


<td align="center">(<?php if (! $this->_tpl_vars['oname']): ?>客服<?php else: ?><?php echo $this->_tpl_vars['oname']; ?>
<?php endif; ?> 和 <?php if (! $this->_tpl_vars['name']): ?>访客<?php else: ?><?php echo $this->_tpl_vars['name']; ?>
<?php endif; ?>)</td>
<td align="center"><?php echo $this->_tpl_vars['namelist']; ?>
</td>
<td align="left" style="padding-left:15px;"><?php echo $this->_tpl_vars['list']; ?>
</td>
</tr>


<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td width="20%">
              <div align="center" style="font-weight:bold;">详细内容</div>
            </td>
            
            <td width="80%" bgcolor="#FFFFFF" colspan="2">
            <span style="font-size:12px; color:#06C"><?php echo $this->_tpl_vars['chat_info']; ?>
</span>
            <div align="left" style="margin-left:20px;"><span class="text1"><?php echo $this->_tpl_vars['chat_list']; ?>
</span></div></td>
            </tr> 

      </tbody>
    </table>


<div class="blank20"></div>
</div>
</body>
</html>