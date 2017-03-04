<?php if (!defined('ROOT')) exit('Can\'t Access !'); ?>

<?php if (count($_POST) > 0) {
    if ($remove->count > 0) { ?>
        <span class="message">清除成功。</span>
    <?php }
} ?>

<div class="blank10"></div>

<a class="btn_a" href="<?php echo FileCheckApp::GetUrl(array('action' => 'trojan_scan')) ?>">返回</a>
