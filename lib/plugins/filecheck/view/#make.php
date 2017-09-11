<?php if(count($_POST) == 0) { ?>
    <form ckass="checkform" method="post" action="">
         <input class="btn_a" name="make" type="submit" value="保存当前文件指纹信息">
    </form>
<?php } ?>

<?php if(count($_POST) > 0) {
    if($make->Success) { ?>
        文件指纹信息已保存。
        <form method="get" action="">
            <input  class="btn_a" name="submit" type="hidden" value="返回">
        </form>
    <?php }
} ?>