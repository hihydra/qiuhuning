  <div class="tags" style="margin-bottom:20px;">
<div id="tagstitle">
<a href="#" id="one1" class="hover">木马恢复区</a>
</div>
</div>

<div id="tagscontent" class="right_box">
<div class="blank10"></div>
    <?php foreach ($history->packages as $package) { ?>
        <li>
            <div class="blank10"></div>
            <form class="checkform" action="" method="post">
                <?php foreach ($package->files as $file) { ?>
                        <span><?php echo $file->file; ?></span>
                        <input type="hidden" name="file" value="<?php echo $file->file; ?>"/>
                <?php } ?>
                <div class="blank10"></div>
                <span>清除时间</span>
                <span>&nbsp;<?php echo $package->date; ?></span>
                <div class="blank10"></div>
                <input type="hidden" name="package" value="<?php echo $package->file; ?>"/>
                <input class="btn_a" name="delete" type="submit" value="删除"/>
                <span class="wait">正在删除文件...</span>
                <input class="btn_a" name="restore" type="submit" value="恢复" onclick="return confirm('确定要恢复可疑文件吗?');"/>
                <span class="wait">正在恢复文件...</span>
            </form>
        </li>
    <?php } ?>
</ul>
<div class="blank10"></div>
</div>
<div class="blank10"></div>
<div class="blank10"></div>
<a class="btn_a" href="<?php echo FileCheckApp::GetUrl(array('action' => 'trojan_scan')) ?>">返回</a>
