<?php if (!defined('ROOT')) exit('Can\'t Access !'); ?>

<?php if (count($_POST) == 0) { ?>



<div id="tagscontent" class="right_box">
<div class="blank10"></div>

    <form class="checkform" method="post" action="">
        <input class="btn_a" name="scan" type="submit" value="查杀木马">
        <span class="wait">正在扫描文件，请耐心等待...</span>
    </form>

    <a class="btn_a" href="<?php echo FileCheckApp::GetUrl(array('action' => 'trojan_history')) ?>">木马恢复区</a>

<div class="blank10"></div>
</div>
<?php } ?>

<?php if (count($_POST) > 0) { ?>
    <?php if ($scan->pass == false) { ?>
    <div class="tags" style="margin-bottom:20px;">
<div id="tagstitle">
<a href="#" id="one1" class="hover">扫描结果</a>
</div>
</div>

<div id="tagscontent" class="right_box">
<div class="blank10"></div>
        <form class="checkform" method="post" action="<?php echo FileCheckApp::GetUrl(array('action' => 'trojan_remove')) ?>">
            <?php foreach ($scan->fail as $fail) { ?>
                <input type="checkbox" name="files[]" value="<?php echo $fail->file; ?>" checked="checked">
                <span>可疑文件: <?php echo $fail->file; ?></span>
                <br/>
                <?php foreach ($fail->codes as $code) { ?>
                    <span><?php echo $code->name; ?>： </span>
                    <?php highlight_string($code->code); ?>
                    <br/>
                <?php } ?>
                <br/>
            <?php } ?>

            <div class="blank10"></div>
            <input class="btn_a" name="remove" type="submit" value="清除可疑文件">
            <!--input class="btn_a" name="replace" type="submit" value="清除可疑代码，保留文件"-->
            <span class="wait">正在清除，请耐心等待...</span>
        </form>
        <div class="blank10"></div>
    </div>
    <?php } ?>

    <?php if ($scan->pass) { ?>
        <div class="tags" style="margin-bottom:20px;">
<div id="tagstitle">
<a href="#" id="one1" class="hover">扫描结果</a>
</div>
</div>

<div id="tagscontent" class="right_box">
<div class="blank10"></div>
没有发现可疑文件。
<div class="blank10"></div>
</div>
    <?php } ?>

    <div class="blank10"></div>
    <a class="btn_a" href="<?php echo FileCheckApp::GetUrl(array('action' => 'trojan_scan')) ?>">返回</a>

<?php } ?>


