<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html> 
<html>
	<head>
		<title>报名成功——勤管中心</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		
		<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/yuan/css/demo.css">
		<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/yuan/css/sky-forms.css">
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/yuan/css/sky-forms-ie8.css">
		<![endif]-->
		
		<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/jquery.validate.min.js"></script>
		<!--[if lt IE 10]>
			<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/jquery.placeholder.min.js"></script>
		<![endif]-->		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/sky-forms-ie8.js"></script>
		<![endif]-->
	</head>
	
	<body class="bg-cyan">
		<div class="body body-s">		
			<form action="" id="sky-form" class="sky-form" method="post"> 
				<header>报名成功</header>
								<fieldset>
								亲爱的的<?php echo $row['name'];?><?php echo $gender;?>:<br>
					<div class="row">
					你成功报名了
		
							<b ><?php echo $type;?></b>
		
						<section>
感谢您与其他<?php echo $nnum;?>位同学对勤管的支持!<br>一旦确定面试时间，我们将立刻通知你。<br>敬请期待。
					</section>
					
					</div>
					


			
				</fieldset>
				
				<footer>
	
				</footer>
			</form>			
		</div>		BY:网络部 仲原<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function()
{
    // Validation     
    $("#sky-form").validate(
    {                  
        // Rules for form validation
        rules:
        {

          mobile:
            {
                required: true,
                minlength: 11,
                maxlength: 11
            },
          zcode:
            {
                required: true,
                minlength: 4,
                maxlength: 4
            },
           
           
        },
        // Messages for form validation
        messages:
        {
           
            mobile:
            {
                required: '请填写您的手机号码',
				minlength: '请填写正确的手机号码',
                maxlength: '请填写正确的手机号码'
            },
			zcode:
            {
                required: '请填写验证码',
				minlength: '请填写正确的验证码',
                maxlength: '请填写正确的验证码'
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