

<form name="listform" id="listform"  action="<?php echo uri();?>" method="post">
<div class="blank20"></div>
<div id="tagscontent" class="right_box">

<table border="0" cellspacing="0" cellpadding="0" class="list" name="table1" id="table1" width="100%">
<thead>
<tr class="th">
<th><input title="点击可全选本页的所有项目"  onclick="CheckAll(this.form)" type="checkbox" name="chkall" class="checkbox" /> </th>
<th align="center"><!--id-->编号</th>
<th align="center"><!--oid-->订单号</th>
<th align="center"><!--price-->价格</th>
<th align="center"><!--pname-->客户</th>
<th align="time"><!--time-->活动时间</th>
<th align="center"><!--adddate-->下单时间</th>
<th align="center"><!--status-->状态</th>
<th align="center">操作</th>
</tr>

</thead>
<tbody>
{loop $data $d}
<tr class="s_out">

<td align="center" ><input onclick="c_chang(this)" type="checkbox" value="{$d.$primary_key}" name="select[]" class="checkbox" /> </td>
<td align="center">{$d['id']}</td>
<td align="center">{$d['oid']}</td>
<td align="center">{$d['price']}</td>
<td align="center">{$d['pname']}</td>
<td align="center">{$d['time']}</td>
<td align="center">{$d['adddate']}</td>
<td align="center">{$d['status']}</td>
<td align="center">
<a href="<?php echo modify("act/edit/table/$table/id/$d[$primary_key]");?>">处理</a>
<a onclick="javascript: return confirm('确实要删除吗?');" href="<?php echo modify("/act/delete/table/$table/id/$d[$primary_key]/token/$token");?>">删除</a>
</td>
</tr>
{/loop}

</tbody>
</table>
<div class="page"><?php if(get('table')!='type' && front::get('case')!='field') echo pagination::html($record_count); ?></div>
<div class="blank20"></div>
</div>
<div class="blank20"></div>

<input type="hidden" name="batch" value="">
<input  class="btn_d" type="button" value=" 删除 " name="delete" onclick="if(getSelect(this.form) && confirm('确实要删除ID为('+getSelect(this.form)+')的记录吗?')){this.form.action='<?php echo modify('act/batch',true);?>'; this.form.batch.value='delete'; this.form.submit();}"/>

</form>