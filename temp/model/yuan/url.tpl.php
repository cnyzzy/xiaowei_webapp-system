<?php defined('ZRoot') or die('Access Denied.'); ?><?php include template('header'); ?>
<?php if($Operate == "index") { ?>
<form action="<?php echo $arrInfo['url'];?>/index.php/url/add" method="post">
请输入文字：<input type="text" name="url" value="" />  
<input type="submit" value="提交" />
</form>
<?php } ?>
<?php if($Operate == "add") { ?>
短地址:<?php echo $surl;?>
<?php } ?>
<?php include template('footer'); ?>