<?php defined('ZRoot') or die('Access Denied.'); ?>       <script>
			         function check(form) {

          if(form.username.value=='') {
                 $.alert("姓名不能为空", "警告", function() {
form.username.focus();
});                     

                return false;
           }
       if(form.number.value.length!=11){
           $.alert("请输入正确的手机号", "警告", function() {
form.passw.focus();
});                     
                
                return false;
         } 
	 $.showLoading();
         document.F.submit();
		 return true; 
         }
</script>  
	 <h2>访客身份绑定<br></h2>
        </div>
	   <div class="login-wrap">
            <div class="login-box">
                 <form name="F" action="/bd/3" method="post">
                    <div class="input-wrap">
                        <input type="text" name="username" placeholder="姓名">
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="number" placeholder="手机号">
                    </div>
                  
                </form>
            </div> 提示：绑定访客身份后，使用平台将会受到限制
            <div class="btns">
                <a href="/home/login/1">学生</a>
                <a href="/home/login/2">教职工</a>
                <a class="current">访客</a>
            </div>