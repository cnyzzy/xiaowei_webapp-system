<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
	<head>
		<title>报名——小薇工作室</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		
		<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/demo.css">
		<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/sky-forms.css">
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/sky-forms-ie8.css">
		<![endif]-->
		
		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.validate.min.js"></script>
		<!--[if lt IE 10]>
			<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.placeholder.min.js"></script>
		<![endif]-->		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/sky-forms-ie8.js"></script>
		<![endif]-->
	</head>
	
	<body class="bg-cyan">
		<div class="body body-s">		
			<form action="<?php echo $arrInfo['url'];?>/ss" id="sky-form" class="sky-form" method="post"> 
				<header>个人信息填写</header>
								<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="input">
								<input type="text" name="name" placeholder="姓名" value='<?php echo $name;?>'>
							</label>
						</section>
						<section class="col col-6">
							<label class="input">
								<input type="text" name="number" placeholder="学号" value='<?php echo $number;?>'>
							</label>
							
						</section>
						
					</div>
					
					<section>
							<?php if($infowrong==1) { ?><b class="error">个人信息读取失败，可能学号与姓名填写错误</b><BR><?php } ?>
						<label class="select">				
							<select name="gender">
								<option value="0" selected disabled>性别</option>
								<option value="1" <?php if($gender=='男') { ?>selected = "selected"<?php } ?>>男生</option>
								<option value="2" <?php if($gender=='女') { ?>selected = "selected"<?php } ?>>女生</option>
							</select>
							<i></i>
						</label>
					</section>

					
								
					<section>
						<label class="select">
								<select name="zone">
								<option value="0" selected disabled>校区</option>
								<option value="1" <?php if($zone==1) { ?>selected = "selected"<?php } ?>>新长校区</option>
								<option value="2" <?php if($zone==2) { ?>selected = "selected"<?php } ?>>通榆校区</option>
							</select>
							<i></i>
						</label>
							<b class="tooltip tooltip-bottom-right">新校区是新长校区，老校区是通榆校区</b>
					</section>
										<section>
						<label class="input">
							<i class="icon-append icon-user"></i>
							<input type="text" name="collage" placeholder="学院" value='<?php echo $collage;?>'>
							<b class="tooltip tooltip-bottom-right">这是从数据库自动获取的，一般请不要修改</b>
						</label>
					</section>
					<section>
						<label class="input">
							<i class="icon-append icon-user"></i>
							<input type="text" name="class" placeholder="班级" value='<?php echo $class;?>'>
							<b class="tooltip tooltip-bottom-right">这是从数据库自动获取的，一般请不要修改</b>
						</label>
					</section>
				</fieldset>
				<fieldset>					
										<section>
						<label class="select">
								<select name="type">
								<option value="0" selected disabled>工作意愿</option>
								<option value="1" <?php if($type==1) { ?>selected = "selected"<?php } ?>>文字</option>
								<option value="2" <?php if($type==2) { ?>selected = "selected"<?php } ?>>摄影</option>
								<option value="3" <?php if($type==3) { ?>selected = "selected"<?php } ?>>主持</option>
								<option value="4" <?php if($type==4) { ?>selected = "selected"<?php } ?>>程序</option>
								<option value="5" <?php if($type==5) { ?>selected = "selected"<?php } ?>>微博</option>
								<option value="6" <?php if($type==6) { ?>selected = "selected"<?php } ?>>QQ</option>
								<option value="7" <?php if($type==7) { ?>selected = "selected"<?php } ?>>办公室</option>
								<option value="8" <?php if($type==8) { ?>selected = "selected"<?php } ?>>采访</option>
								<option value="9" <?php if($type==9) { ?>selected = "selected"<?php } ?>>其他</option>
								
							</select>
							<i></i>
						</label>
							<b class="tooltip tooltip-bottom-right">想要报名的工作项目</b>
					</section>					
				</fieldset>
<fieldset>
															<section>
						<label class="input">
							<i class="icon-append icon-user"></i>
							<input type="text" name="mobile" placeholder="手机号码" value='<?php echo $mobile;?>'>
							<b class="tooltip tooltip-bottom-right">这是您未来获得通知的重要方式</b>
						</label>
					</section>				
									<section>
						<label class="input">
							<i class="icon-append icon-user"></i>
							<input type="text" name="zycode" placeholder="验证码"> 
							<b class="tooltip tooltip-bottom-right"><img  id="zycode_img" title="验证码" src="<?php echo $arrInfo['url'];?>/do/code" align="absbottom"></img></b>
						</label>
						<?php if($codewrong==1) { ?><b class="error">验证码错误</b><?php } ?>
						<a href="javascript:void(0)" onclick="document.getElementById('zycode_img').src='<?php echo $arrInfo['url'];?>/do/code/'+Math.random()">换一个?</a>
					</section>
</fieldset>
				<footer>
					<button type="submit" class="button">提交</button>
				</footer>
			</form>			
		</div>		BY:仲原
		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function()
{
    // Validation     
    $("#sky-form").validate(
    {                  
        // Rules for form validation
        rules:
        {
            type:
            {
                required: true
            },
            mobile:
            {
                required: true,
                minlength: 11,
                maxlength: 11
            },
			number:
            {
                required: true,
                minlength: 8,
                maxlength: 8
            },
          zycode:
            {
                required: true,
                minlength: 4,
                maxlength: 4
            },
           
           name:
            {
                required: true
            },
         
            gender:
            {
                required: true
            },
            zone:
            {
                required: true
            }, 
			class:
            {
                required: true
            },
			collage:
            {
                required: true
            }
        },
        // Messages for form validation
        messages:
        {
            type:
            {
                required: '请填写您想加入的部门'
            },
          number:
            {
                required: '请填写您的学号',
				minlength: '请填写正确的学号',
                maxlength: '请填写正确的学号'
            },
            mobile:
            {
                required: '请填写您的手机号码',
				minlength: '请填写正确的手机号码',
                maxlength: '请填写正确的手机号码'
            },
			zycode:
            {
                required: '请填写验证码',
				minlength: '请填写正确的验证码',
                maxlength: '请填写正确的验证码'
            },
           name:
            {
                required: '请填写您的姓名'
            },
           
            gender:
            {
                required: '请填写您的性别'
            },
           zone:
            {
                required: '请填写您的收货地区'
            },
			class:
            {
                required: '请填写您的收货地区'
            },
			collage:
            {
                required: '请填写您的收货地区'
            }
        },                 
        // Do not change code below
        errorPlacement: function(error, element)
        {
            error.insertAfter(element.parent());
        }
    });
});        
</script>
	</body>
</html>