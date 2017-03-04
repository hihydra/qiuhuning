<?php if (!defined('ROOT')) exit('Can\'t Access !'); ?>

<script type="text/javascript">
    function selectAll(check) {
        var checkboxs = $(check.form).find(":input[name='files[]']");
        if ($(check).attr("checked") == 'checked')
            checkboxs.attr("checked", 'checked');
        else
            checkboxs.attr("checked", false);
    }

    $(document).ready(function() {
        var checkboxs = $('form.checkform').find(":input[name='files[]']");
        var check_all=$('form.checkform').find(":input.check_all");
        checkboxs.change(function () {
            if(this.checked != 'checked')
                check_all.attr("checked", false);
        });
    });
</script>

<div id="message_a">强烈推荐安装后，<strong style="color:red">备份文件并生成校验信息 ! </strong><a href="#" onclick="javascript:turnoff('message_a')">&nbsp;(×)</a>
</div>

<div class="tags" style="margin-bottom:20px;">
<div id="tagstitle">
<a href="#" id="one1" class="hover">选择备份信息</a>
</div>
</div>

<div id="tagscontent" class="right_box">
<div class="blank10"></div>


<?php if (count($_POST) == 0) { ?>
    <form class="checkform" method="post" action="">
     
       
       <table class="table table-striped" name="table1" id="table1" width="100%">
        <thead>
            <tr class="th">
                <th width="40"><input type="checkbox" class="check_all" value="全选" onclick="selectAll(this)"/></th>
                <th>名称</th>
             </tr>

        </thead>
        <tbody>
            <?php foreach ($file_list->dirs as $dir) { ?>
            <tr>
                <td align="center">
                    <input type="checkbox" name="files[]" value="<?php echo $dir; ?>"/>
                </td>
                <td align="left">
                    <?php echo $dir; ?>
                </td>
                </tr>
            <?php } ?>

            <?php foreach ($file_list->files as $file) { ?>
                <tr>
                <td align="center">
                    <input type="checkbox" name="files[]" value="<?php echo $file; ?>"/>
                 </td>
                <td align="left">
                    <?php echo $file; ?>
                </td>
                </tr>
            <?php } ?>
            <tr>
                <td align="center">
                    <input type="checkbox" class="check_all" value="全选" onclick="selectAll(this)"/>
                </td>
                <td align="left">
                    全选
                </td>
            </tr>
           </tbody>
    </table>


        <div class="blank10"></div>

        <input class="btn_a" name="backup" type="submit" value="备份文件并生成校验信息">
        <span class="wait">正在备份文件，请耐心等待...</span>
    </form>
<?php } ?>

<?php if (count($_POST) > 0) {
    if ($backup->Success == true) { ?>
        文件和校验信息已备份。
    <?php }
} ?>
<div class="blank10"></div>
</div>
<a class="btn_a" href="<?php echo FileCheckApp::GetUrl(array('action' => 'file_check')) ?>">返回</a>