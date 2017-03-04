<?php /* Smarty version 2.6.25, created on 2017-03-04 14:13:12
         compiled from admin/system.htm */ ?>
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
/editor/jquery.wysiwyg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/editor/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/editor/jquery.wysiwyg.js"></script>
<?php echo ' 
<script type="text/javascript">
  $(function()
  {
      $(\'#companyinfos\').wysiwyg();
  });
</script>

<style type="text/css">

body {background:white;}
#info {padding:10px;}
</style>
'; ?>

</head>
<body>

<div id="info">


  <?php if ($this->_tpl_vars['ifadmin'] == '1'): ?>  
  <?php if ($this->_tpl_vars['companyinfos']): ?>

  <form action="system.php?action=companyinfos" method="post" name="companyinfos1">
   <div class="blank30"></div>        
   <textarea name="companyinfos" id="companyinfos" rows="10" cols="70"><?php echo $this->_tpl_vars['conf']['companyinfos']; ?>
</textarea>   
  <?php echo $this->_tpl_vars['c_up_sys_success']; ?>
<input type="hidden" name="_companyinfos" value="_companyinfos" /><input type="submit" name="submit" value="保存" />    
  </form>
   <?php endif; ?>
  <?php if ($this->_tpl_vars['system']): ?>
  <div class="tags">
<div id="tagstitle">
   <a id="one1" onclick="setTab('one',1,6)" class="hover">客服系统配置</a>
  </div> 
  <div id="tagscontent">
    <div id="con_one_1">
  <form action="system.php?action=systeminfo" method="post" name="systeminfo">
  <table cellspaing="0" cellpadding="3" class="border" cellpadding="4" class="list" name="table" id="table" width="100%">
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong><?php echo $this->_tpl_vars['lang']['url']; ?>
:</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%">
<input type="text" name="url" value="<?php echo $this->_tpl_vars['conf']['url']; ?>
" size="30" /></td>
    </tr>

    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong><?php echo $this->_tpl_vars['lang']['company_name']; ?>
:</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><input type="text" name="company" value="<?php echo $this->_tpl_vars['conf']['company']; ?>
" size="20" /></td>
    </tr>
     <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong><?php echo $this->_tpl_vars['lang']['if_customer_info']; ?>
:</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%">
      <select name="customer_info">           
          <option value="1" <?php if ($this->_tpl_vars['conf']['customer_info'] == true): ?>selected="selected"<?php endif; ?>>是</option>
          <option value="0" <?php if ($this->_tpl_vars['conf']['customer_info'] == false): ?>selected="selected"<?php endif; ?>>否</option> 
        </select>
      </td>
    </tr>
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong><?php echo $this->_tpl_vars['lang']['tracker_refresh']; ?>
:</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><input type="text" name="tracker_refresh" value="<?php echo $this->_tpl_vars['conf']['tracker_refresh']; ?>
" size="20" /></td>
    </tr>
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong><?php echo $this->_tpl_vars['lang']['template']; ?>
:</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%">
        <select name="template">
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['template']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
          <option value="<?php echo $this->_tpl_vars['template'][$this->_sections['i']['index']]['dir']; ?>
"<?php if ($this->_tpl_vars['template'][$this->_sections['i']['index']]['dir'] == $this->_tpl_vars['template_dir']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template'][$this->_sections['i']['index']]['name']; ?>
</option>
        <?php endfor; endif; ?>
        </select>
      </td>
    </tr>
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong><?php echo $this->_tpl_vars['lang']['select_lang']; ?>
:</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%">
        <select name="language">
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['language']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
          <option value="<?php echo $this->_tpl_vars['language'][$this->_sections['i']['index']]['file']; ?>
"<?php if ($this->_tpl_vars['language'][$this->_sections['i']['index']]['file'] == $this->_tpl_vars['lang_file']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['language'][$this->_sections['i']['index']]['name']; ?>
</option>
        <?php endfor; endif; ?>
        </select>
      </td>
    </tr>
  </table>
<div class="blank20"></div>
  <input type="hidden" name="systeminfo" value="systeminfo" /><input class="button" type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" />
<div class="blank20"></div>
</form>
</div></div></div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['departments']): ?>
	  <div class="tags">
<div id="tagstitle">
   <a id="one1" onclick="setTab('one',1,6)" class="hover">客服部门配置</a>
  </div> 
  <div id="tagscontent">
    <div id="con_one_1">
         <form action="system.php?action=departments" method="post" name="departments">
  <table cellspaing="0" cellpadding="3" class="border" class="list" name="table" id="table" width="100%">
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td align="right" width="10%"><strong>部门名称：</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><input type="text" name="name" size="20" /> <input type="submit" name="add" value="添加" class="button" /><input type="hidden" name="do" value="add" /></td>
    </tr>

   
     <?php echo $this->_tpl_vars['list']; ?>

  </table>
</form>
</div></div></div>
            <?php endif; ?>
       <?php if ($this->_tpl_vars['operators']): ?>
	     <div class="tags">
<div id="tagstitle">
   <a id="one1" onclick="setTab('one',1,6)" class="hover">添加系统客服</a>
  </div> 
  <div id="tagscontent">
    <div id="con_one_1">
         <form action="system.php?action=operators" method="post" name="operators">
  <table cellspaing="0" cellpadding="1" class="border" class="list" name="table" id="table" width="100%">
 
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td align="right" width="10%"><strong>用户</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><input type="text" name="username" size="20" /></td>
    </tr>
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong>密码</strong></strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><input type="text" name="password" size="20" /></td>
    </tr>
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong>姓名</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><input type="text" name="realname" size="20" /></td>
    </tr>
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong>部门</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><select name="departmentid">
        <?php echo $this->_tpl_vars['selectdname']; ?>

      </select></td>
    </tr>
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong>类型</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><select name="level">
        <option value="0">管理</option>
        <option value="1" selected="selected">客服</option>
      </select></td>
    </tr>
	</table>

<div class="blank20"></div>
    <input type="submit" name="add" class="button" value="添加" /><input type="hidden" name="do" value="add" />
<div class="blank20"></div>

客服列表
   <table cellpadding="1" class="border" class="list" name="table" id="table" width="100%">
 
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <th align="right" width="11%"><strong>姓名</strong></th>
<th width="11%">登录名</th>
<th width="11%">部门</th>
<th width="11%">职务</th>
<th width="11%">状态</th>
           <th width="60%" style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;操作 <?php echo $this->_tpl_vars['isadmin']; ?>
</th>
    </tr>
     <?php echo $this->_tpl_vars['list']; ?>

  </table>

</form>
</div>
</div>
</div>

            <?php endif; ?>
      <?php if ($this->_tpl_vars['assigns']): ?>
         <div class="tags">
<div id="tagstitle">
<a id="one1" onclick="setTab('one',1,6)" class="hover">客服任务分配</a>
</div> 
<div id="tagscontent">
<div id="con_one_1">
  <table cellspaing="0" cellpadding="3" class="border" class="list" name="table" id="table" width="100%">

    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"></td>
      <td width="1%" align="right"></td>
      <td align="left"></td>
    </tr>   
     <?php echo $this->_tpl_vars['list']; ?>

  </table>
</div>
</div>
</div>
            <?php endif; ?>
      <?php if ($this->_tpl_vars['createcode']): ?>
	  <div class="tags">
<div id="tagstitle">
   <a id="one1" onclick="setTab('one',1,6)" class="hover">客服代码生成</a>
  </div> 
  <div id="tagscontent">
    <div id="con_one_1">
 <form action="system.php?action=createcode" method="post" name="createcode">        
  <table cellspaing="0" cellpadding="3" class="border" name="table" id="table" width="100%">
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td align="right" width="10%"><strong>选择部门：</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%">
      <select name="departmentid">
        <option value="0"><?php echo $this->_tpl_vars['lang']['all_departments']; ?>
</option>
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cel_departments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
        <option value="<?php echo $this->_tpl_vars['cel_departments'][$this->_sections['i']['index']]['id']; ?>
"<?php if ($this->_tpl_vars['departmentid'] == $this->_tpl_vars['cel_departments'][$this->_sections['i']['index']]['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cel_departments'][$this->_sections['i']['index']]['name']; ?>
</option>
        <?php endfor; endif; ?>
      </select>
      <select name="ifimages">
        <option value="0"><?php echo $this->_tpl_vars['lang']['createcode_mode']; ?>
</option>
        <option value="images" <?php if ($this->_tpl_vars['mode'] == 'images'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['createcode_mode_images']; ?>
</option>
        <option value="text" <?php if ($this->_tpl_vars['mode'] == 'text'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['createcode_mode_text']; ?>
</option>
      </select>
	  </td>
	  </tr>
	  <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
	  <td width="11%" align="right"><strong>QQ客服号码：</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><input type="text" name="qq" value="" size="30" />(示例:123456,100086)</td>
    </tr>
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong></strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><div class="blank20"></div>
    <input type="submit" class="button" name="submit" value="<?php echo $this->_tpl_vars['lang']['generate_code']; ?>
">
    <div class="blank20"></div></td>
    </tr> 
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong></strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%">
      <?php if ($this->_tpl_vars['departmentid'] !== ''): ?>

<textarea name="all" cols="50" rows="5" id="all">
<!-- BEGIN CmsEasy Live Code, Copyright (c) 2009 CmsEasy.cn. All Rights Reserved -->
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/js/include.php?cmseasylive<?php if ($this->_tpl_vars['mode'] == 'text'): ?>&text<?php endif; ?><?php if ($this->_tpl_vars['departmentid'] !== '0'): ?>&departmentid=<?php echo $this->_tpl_vars['departmentid']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['qq'] !== ''): ?>&qq=<?php echo $this->_tpl_vars['qq']; ?>
<?php endif; ?>"></script>
<!-- END CmsEasy Live Code, Copyright (c) 2009 CmsEasy.cn. All Rights Reserved -->
</textarea>

<?php endif; ?>
</td>
    </tr>
    
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong>图片模式：</strong></td>
<td width="1%">&nbsp;</td>
           <td width="80%"><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/js/imageModeDemo.html" target="_blank">查看演示</a></td>
    </tr> 
    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong>文字模式：</td>
<td width="1%">&nbsp;</td>
           <td width="80%">
      <!-- BEGIN CmsEasy Live Code, Copyright (c) 2009 CmsEasy.cn. All Rights Reserved -->
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/js/include.php?cmseasylive&text"></script>
<!-- END CmsEasy Live Code, Copyright (c) 2009 CmsEasy.cn. All Rights Reserved -->

</td>
    </tr>   

   <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
      <td width="11%" align="right"><strong></td>
      <td align="left"></td>
    </tr>
    
  </table>
  </form>
  </div></div></div>
  <?php endif; ?>
<?php endif; ?>
</div>
</div>
</body>
</html>