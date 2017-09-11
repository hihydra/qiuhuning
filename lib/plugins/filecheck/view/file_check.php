<?php if (!defined('ROOT'))
    exit('Can\'t Access !'); ?>

<?php if (count($_POST) == 0) { ?>
    <div id="message_a">
        强烈推荐安装后，<strong style="color:red">备份文件并生成校验信息 ! </strong><a href="#" onclick="javascript:turnoff('message_a')">&nbsp;(×)</a>
    </div>
<?php } ?>



<?php if (empty($_POST)) { ?>
    <?php if (empty($datafiles) == false) { ?>
        <div class="tags" style="margin-bottom:20px;">
<div id="tagstitle">
<a href="#" id="one1" class="hover">文件指纹信息</a>
</div>
</div>

<div id="tagscontent" class="right_box">
<div class="blank10"></div>
        <table border="0" cellspacing="0" cellpadding="0" name="table1" id="table1" width="100%">
        <thead>
            <tr class="th">
                <th align="center">时间</th>
                <th align="center">目录</th>
                <th align="center">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datafiles as $dfile) { ?>
                <tr>
                    <form class="checkform" method="post" action="">
                        <td align="center">
                            <?php echo $dfile->date; ?>
                            <?php if (empty($dfile->dir) == false) { ?>
                        </td>
                        <td align="center">
                                <?php echo $dfile->dir; ?>
                            <?php } ?>
                            <?php if (empty($dfile->file) == false) { ?>
                                文件:
                                <?php echo $dfile->file; ?>
                            <?php } ?>
                        </td>
                        <td>
                        <input name="name" type="hidden" value="<?php echo $dfile->name; ?>">
                        <input class="btn_a" name="check" type="submit" value="扫描文件改动">
                        <span class="wait">正在扫描文件，请耐心等待...</span>
                        <?php if ($dfile->name != 'system') { ?>
                        <input class="btn_a" name="delete" type="submit" value="删除备份" onclick="return confirm('确定要删除此备份吗?');">
                        <?php } ?>
                        <?php if ($dfile->name == 'system') { ?>
                            (系统备份)
                        <?php } ?>
                        <span class="wait">正在删除备份...</span>
                    </td>
                    </form>
                </tr>
            <?php } ?>
        </tbody>
    </table>

        <div class="blank10"></div>
        </div>

    <?php } ?>
 <div class="blank30"></div>
    <a class="btn_a" href="<?php echo FileCheckApp::GetUrl(array('action' => 'file_backup')) ?>">选择生成文件校验信息</a>

<?php } ?>



<?php if (count($_POST) > 0) { ?>

    <?php if ($check->pass == true) { ?>
    <div class="tags" style="margin-bottom:20px;">
<div id="tagstitle">
<a href="#" id="one1" class="hover">扫描结果</a></div>
</div>
<div id="tagscontent" class="right_box">
<div class="blank10"></div>

共扫描文件<?php echo $check->count; ?>个，没有发现异常。


    <?php } ?>

    <?php if ($check->pass == false) { ?>

 <div class="tags" style="margin-bottom:20px;">
<div id="tagstitle">
<a href="#" id="one1" class="hover">扫描结果</a></div>
</div>
    <div id="tagscontent" class="right_box file_check_search">
        <div class="blank10"></div>
        共扫描文件：<span><?php echo $check->count; ?></span>个。
        <div class="blank10"></div>
        被更改文件(<span><?php echo $check->changed_count; ?></span>)个,
        <div class="blank10"></div>
        被新增文件(<span><?php echo $check->created_count; ?></span>)个,
        <div class="blank10"></div>
        被删除文件(<span><?php echo $check->lost_count; ?></span>)个。
        <div class="blank10"></div>
   
    <?php } ?>

    <div class="blank10"></div>

    <form class="checkform" method="post"
          action="<?php echo FileCheckApp::GetUrl(array('action' => 'file_recover')) ?>">
        <?php if ($check->changed_count > 0) { ?>
           <table border="0" cellspacing="0" cellpadding="0" id="table1" width="100%">
<thead>
<tr class="th">
<th colspan="2" algin="center">被更改文件</th>
</tr>
</thead>
<tbody id="listtable">
                
                    <?php foreach ($check->changed as $file) { ?>
                        <tr>
<td algin="center" width="10">
                        <input type="checkbox" name="changed[]" value="<?php echo $file; ?>"/>
                               </td>
                               <td algin="left">
                                <?php echo $file; ?>
                            </td>
                            </tr>
                    <?php } ?>
                </tbody>
    </table>
            <div class="blank10"></div>
        <?php } ?>
        <?php if ($check->created_count > 0) { ?>
           <table border="0" cellspacing="0" cellpadding="0" id="table1" width="100%">
<thead>
<tr class="th">
<th colspan="2" algin="center">被新增文件</th>
</tr>
</thead>
<tbody id="listtable">
                    <?php foreach ($check->created as $file) { ?>
                        <tr>
<td algin="center" width="10">
    <input type="checkbox" name="created[]" value="<?php echo $file; ?>"/>
                                    </td>
                               <td algin="left">
                                <?php echo $file; ?>
                            </td>
                                 </tr>
                    <?php } ?>
               </tbody>
    </table>
            <div class="blank10"></div>
        <?php } ?>
        <?php if ($check->lost_count > 0) { ?>
            <table border="0" cellspacing="0" cellpadding="0" id="table1" width="100%">
<thead>
<tr class="th">
<th colspan="2" algin="center">被删除文件</th>
</tr>
</thead>
<tbody id="listtable">
                    <?php foreach ($check->lost as $file) { ?>
                         <tr>
<td algin="center" width="10">
    <input type="checkbox" name="lost[]" value="<?php echo $file; ?>"/>
                                    </td>
                               <td algin="left">
                                <?php echo $file; ?>
                            </td>
                                    </tr>
                    <?php } ?>
                </tbody>
    </table>
            <div class="blank10"></div>
        <?php } ?>

        </ul>

        <div class="blank10"></div>

        <?php if ($check->pass == false) { ?>
            <input name="name" type="hidden" value="<?php echo $check->name; ?>">
            <input class="btn_a" name="check" type="submit" value="还原文件"
                   onclick="return confirm('确定需要处理选中的文件吗?');">
            <span class="wait">正在还原文件，请耐心等待...</span>
        <?php } ?>
    </form>
<div class="blank10"></div>
</div>
    <div class="blank10"></div>

    <a class="btn_a" href="<?php echo FileCheckApp::GetUrl(array('action' => 'file_check')) ?>">返回</a>

<?php } ?>


