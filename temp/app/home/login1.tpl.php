<?php defined('ZRoot') or die('Access Denied.'); ?> <script>
			         function check(form) {

          if(form.username.value.length!=8) {
               $.alert("学号不正确", "警告", function() {
form.username.focus();
});                
                return false;
           }
       if(form.passwd.value==''){
               $.alert("请输入密码", "警告", function() {
form.passw.focus();
});                    
                return false;
         } 
		 if(form.yanzm.value.length!=4) {
		 $.alert("验证码不正确", "警告", function() {
 form.yanzm.focus();
});             
                return false;
           }
		    $.showLoading();
         document.F.submit();
		 return true; 
         }
</script>
		  <h2>学生教务系统身份绑定<br></h2>
        </div>
			   <div class="login-wrap">
            <div class="login-box">
		
                <form name="F" action="/bd/1" method="post">
                    <div class="input-wrap">
                        <input type="text" name="username" placeholder="学号" >
                    </div>
                    <div class="input-wrap">
                        <input type="password" name="passwd" placeholder="密码">
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="yanzm" placeholder="验证码" >
<img  id="zycode_img" title="验证码" href="javascript:void(0)" onclick="document.getElementById('zycode_img').src='<?php echo $arrInfo['url'];?>/code/'+Math.random()"src="<?php echo $arrInfo['url'];?>/code/+Math.random()" align="absbottom" class="validate-code">

                    </div>
                    
                </form>
            </div>
            <div class="btns">
                <a class="current">学生</a>
                <a href="/home/login/2">教职工</a>
                <a href="/home/login/3">访客</a>
            </div>