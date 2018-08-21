<?php defined('ZRoot') or die('Access Denied.'); ?>             <script>
			         function check(form) {

          if(form.username.value=='') {
                 $.alert("姓名不能为空", "警告", function() {
form.username.focus();
});                      
                return false;
           }
       if(form.number.value==''){
                 $.alert("请输入工资号", "警告", function() {
    form.passw.focus();
});                
            
                return false;
         } 
	 $.showLoading();
         document.F.submit();
		 return true; 
         }
</script>  
			  <h2>教职工身份绑定<br></h2>
        </div>
	   <div class="login-wrap">
            <div class="login-box">
                 <form name="F" action="/bd/2" method="post">
                    <div class="input-wrap">
                        <input type="text" name="username" placeholder="姓名">
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="number" placeholder="工号(如66)">
                    </div>
                   
                </form>
            </div> 提示：数据更新至2017年4月
            <div class="btns">               
			<a href="/home/login/1">学生</a>
            <a class="current">教职工</a>
            <a href="/home/login/3">访客</a>
            </div>