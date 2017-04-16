<div id="tagscontent" class="right_box">

<form method="post" name="form1" action="<?php if(front::$act=='edit') $id="/id/".$data[$primary_key]; else $id=''; echo modify("/act/".front::$act."/table/".$table.$id);?>"  onsubmit="return checkform();">
<input type="hidden" name="onlymodify" value=""/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="table1">
<thead>
<tr class="th">
<th colspan="3">添加主题</th>
</tr>
</thead>
<tbody>
<tr>
<td width="19%" align="right">名称</td>
<td width="1%">&nbsp;</td>
<td width="70%">{form::getform('name',$form,$field,$data)} </td>
</tr>
<tr>
<td width="149" height="25" align="right">所属主题</td>
<td width="1%">&nbsp;</td>
<td align="left">{form::getform('parentid',$form,$field,$data)}
<span class="hotspot" onmouseover="tooltip.show('如果为一级主题，不需选择！');" onmouseout="tooltip.hide();"><img src="{$skin_path}/images/remind.gif" alt="" width="14" height="20"  style="margin-left:10px; margin-right:5px;"></span
></td>
</tr>
</tbody>
</table>
</div>
<div class="blank20"></div>
<input type="submit" name="submit" value="提交" class="btn_a" />
</form>
