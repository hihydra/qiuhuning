<div id="tagscontent" class="right_box">

<form method="post" name="form1" action="<?php if(front::$act=='edit') $id="/id/".$data[$primary_key]; else $id=''; echo modify("/act/".front::$act."/table/".$table.$id);?>"  onsubmit="return checkform();">
<input type="hidden" name="onlymodify" value=""/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="table1">
<thead>
<tr class="th">
<th colspan="3">编辑订单</th>
</tr>
</thead>
<?php
    switch($d['status']){
      case 1:
      $d['status']='未支付';
      break;
      case 2:
      $d['status']='已支付';
      break;
      default:
      $d['status']='已关闭';
      break;
    }
?>
<tbody>
	  <tr>
      	<td width="20%" align="right">订单号：</td>
        <td width="70%"><font color="red">{$data[oid]}</font></td>
      </tr>
      <tr>
        <td width="20%" align="right">下单时间：</td>
        <td width="70%">{$data[adddate]}</td>
      </tr>
      <tr>
        <td align="right">价格：</td>
        <td>{form::getform('price',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">主题：</td>
        <td>{form::getform('topic_id',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">场景：</td>
        <td>{form::getform('scene_id',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">具体想法：</td>
        <td>{form::getform('idea',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">活动日期：</td>
        <td>{form::getform('time',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">活动地点：</td>
        <td>{form::getform('address',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">客户姓名：</td>
        <td>{form::getform('pname',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">联系电话：</td>
        <td>{form::getform('telphone',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">客户QQ：</td>
        <td>{form::getform('qq',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">客户微信：</td>
        <td>{form::getform('weixin',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">流程：</td>
        <td>{form::getform('process_id',$form,$field,$data)}</td>
      </tr>
      <tr>
        <td align="right">状态：</td>
        <td>
          <select id=status name=status >
            <option value="0">关闭</option>
            <option value="1" >未支付</option>
            <option value="2" >已支付</option>
          </select>
        </td>
      </tr>
</tbody>
</table>
</div>
<div class="blank20"></div>
<input type="submit" name="submit" value="提交" class="btn_a"/>
</form>
<script>
    $(document).ready(function(){
        $("#topic option").each(function(){
            if($(this).val()=={$data['topic_id']}){
                $(this).attr("selected","selected");
            }
        });
        $("#process option").each(function(){
            if($(this).val()=={$data['process_id']}){
                $(this).attr("selected","selected");
            }
        });
        $("#status option").each(function(){
            if($(this).val()=={$data['status']}){
                $(this).attr("selected","selected");
            }
        });
        //alert(defaultId);
    });
</script>
        