<?php if (!defined('ROOT')) exit('Can\'t Access !');?>

<?php if(count($_POST) == 0) { ?>
    <form class="checkform" method="post" action="">
        <input class="btn_a" name="check" type="submit" value="还原文件" onclick="return confirm('此操作涉及文件删除与替换操作，确定需要还原到此前状态吗?');">
        <span class="wait">正在还原文件，请耐心等待...</span>
    </form>
<?php } ?>

<?php if(count($_POST) > 0) { ?>
    <span class="message">共处理文件<?php echo $recover->count; ?>个。 还原成功。</span>

    <div class="blank10"></div>
<?php } ?>

<div class="blank10"></div>

<a class="btn_a" href="<?php echo FileCheckApp::GetUrl(array('action'=>'file_check')) ?>">返回</a>
