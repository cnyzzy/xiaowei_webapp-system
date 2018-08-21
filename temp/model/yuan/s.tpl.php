<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html> 
<html>
	<head>
		<title>报名——勤管中心</title>
		
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
			<form action="<?php echo $arrInfo['url'];?>/ss" id="sky-form" class="sky-form" method="post"> 
				<header>个人信息填写</header>
					<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="input">
								<input type="text" name="name" placeholder="姓名" value=''>						
							</label>
							<b class="tooltip tooltip-bottom-right">姓名一定要填写正确</b>
						</section>
						<section class="col col-6">
							<label class="input">
								<input type="text" name="number" placeholder="学号" value=''>
							</label>
							<b class="tooltip tooltip-bottom-right">学号一定要填写正确</b>
						</section>
					</div>
										
				</fieldset>


				<footer>
					<button type="submit" class="button">提交</button>
				</footer>
			</form>			
		</div>
		<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/jquery-1.9.1.min.js"></script>
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
             
            name:
            {
                required: true
            },
			number:
            {
                required: true,
                minlength: 8,
                maxlength: 8
            },
        },
        // Messages for form validation
        messages:
        {
           
            number:
            {
                required: '请填写您的学号',
				minlength: '请填写正确的学号',
                maxlength: '请填写正确的学号'
            },
	
            name:
            {
                required: '请填写您的姓名'
            },
            
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