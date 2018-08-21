<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>普通话查询-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">
		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
       
    </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="<?php echo $arrInfo['url'];?>">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>普通话查询</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
		 <a  id="sjj1"> <li class="green"> 江苏官网</li> </a>
	
	
            </ul>          <div class="weui_text_area">
    <h2 class="weui_msg_title"></h2>
    <p class="weui_msg_desc"><?php if(empty($timei)) { ?><?php } else { ?>缓存数据:<?php ECHO(date('Y-m-j G:i',$timei))?><?php } ?></p>
  </div> <ul class="xunjia-box">
  <div class="weui_tab">
  <div class="weui_navbar">
    <a href="#cj" class="weui_navbar_item weui_bar_item_on">
      成绩查询
    </a>
    <a  href="#zs" class="weui_navbar_item">
      证书查询
    </a>
  </div>
  <div class="weui_tab_bd">
  <div id="zs" class="weui_tab_bd_item">
 <div id="zscx">
 <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">证书编号</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="number" id='zszsh' placeholder="请输入证书编号">
    </div>
  </div>
 </div>
  <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">证件号码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="number" id='zszjh' placeholder="请输入证件号">
    </div>
  </div>
 </div>

 <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">

    </div>
  </div>
</div>
 <a href="javascript:;" onclick="zscx1()" class="weui_btn weui_btn_primary">查询</a>
 </div>
 <div id="zsshow"  style="display:none">
 <div class="weui_cells weui_cells_access animated fadeInRight" >
  <a class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>姓名</p>
    </div>
    <div class="weui_cell_ft" id="zname"></div>
  </a>   

        
	<a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>证件号</p>
    </div>
    <div class="weui_cell_ft" id='zzjh'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>准考证号</p>
    </div>
    <div class="weui_cell_ft" id='zzkzh'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>出生日期</p>
    </div>
    <div class="weui_cell_ft" id='zcsrq'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>考试时间</p>
    </div>
    <div class="weui_cell_ft" id='zkssj'></div>
  </a>
               </div>
			     <div class="weui_cells">
				 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>成绩</p>
    </div>

  </div>	</div> <div class="weui_cells">
 <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>最终分</p>
    </div>
    <div class="weui_cell_ft" id='zzzf'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>等级</p>
    </div>
    <div class="weui_cell_ft" id='zdj'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>证书编号</p>
    </div>
    <div class="weui_cell_ft" id='zzsbh'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>地区</p>
    </div>
    <div class="weui_cell_ft" id='zsf'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>测试站点</p>
    </div>
    <div class="weui_cell_ft" id='zcszd'></div>
  </a>
</div>  
 <div class="weui_cells">
			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>  <a href='javascript:exitz();' class="weui_btn weui_btn_plain_default">再次查询</a>
  			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>
</div>          
 </div>   
  
 </div>

 <div id="cj" class="weui_tab_bd_item weui_tab_bd_item_active">
 <div id="cjcx">
 <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="text" id='cxxm' placeholder="请输入姓名">
    </div>
  </div>
 </div>
  <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">证件号</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="" id='cxzjh' placeholder="请输入证件号">
    </div>
  </div>
 </div>
   <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">准考证号</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="number" id='cxzkz' placeholder="请输入准考证号">
    </div>
  </div>
 </div>
 <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     请至少输入三项中的任意两项
    </div>
  </div>
</div>
 <a href="javascript:;" onclick="cjcx1()" class="weui_btn weui_btn_primary">查询</a>
 </div>
<div id="cjshow"  style="display:none">
 <div class="weui_cells weui_cells_access animated fadeInRight" >
  <a class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>姓名</p>
    </div>
    <div class="weui_cell_ft" id="name"><?php if(!empty($arr['name'])) { ?><?php echo $arr['name'];?><?php } ?></div>
  </a>   

        
	<a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>证件号</p>
    </div>
    <div class="weui_cell_ft" id='zjh'><?php if(!empty($arr['zjh'])) { ?><?php echo $arr['zjh'];?><?php } ?></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>准考证号</p>
    </div>
    <div class="weui_cell_ft" id='zkzh'><?php if(!empty($arr['zkzh'])) { ?><?php echo $arr['zkzh'];?><?php } ?></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>出生日期</p>
    </div>
    <div class="weui_cell_ft" id='csrq'><?php if(!empty($arr['csrq'])) { ?><?php echo $arr['csrq'];?><?php } ?></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>考试时间</p>
    </div>
    <div class="weui_cell_ft" id='kssj'><?php if(!empty($arr['kssj'])) { ?><?php echo $arr['kssj'];?><?php } ?></div>
  </a>
               </div>
			     <div class="weui_cells">
				 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>成绩</p>
    </div>

  </div>	</div> <div class="weui_cells">
 <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>最终分</p>
    </div>
    <div class="weui_cell_ft" id='zzf'><?php if(!empty($arr['zzf'])) { ?><?php echo $arr['zzf'];?><?php } ?></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>等级</p>
    </div>
    <div class="weui_cell_ft" id='dj'><?php if(!empty($arr['dj'])) { ?><?php echo $arr['dj'];?><?php } ?></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>证书编号</p>
    </div>
    <div class="weui_cell_ft" id='zsbh'><?php if(!empty($arr['zsbh'])) { ?><?php echo $arr['zsbh'];?><?php } ?></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>地区</p>
    </div>
    <div class="weui_cell_ft" id='sf'><?php if(!empty($arr['sf'])) { ?><?php echo $arr['sf'];?><?php } ?></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>测试站点</p>
    </div>
    <div class="weui_cell_ft" id='cszd'><?php if(!empty($arr['cszd'])) { ?><?php echo $arr['cszd'];?><?php } ?></div>
  </a>
</div>  
 <div class="weui_cells">
			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>  <a href='javascript:exitt();' class="weui_btn weui_btn_plain_default">再次查询</a>
  			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>
</div>          
 </div>   
   </ul>                  
  
  </div>
</div></div>
 </article>


<script>
function cjcx1() {
  $("#cjshow").hide();
    $("#cjcx").show();
	$.showLoading("加载数据...");
	 var xq = $('#xq').val();
            var xm= $('#cxxm').val();
			var zjh = $('#cxzjh').val();
            var zkz = $('#cxzkz').val();
            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/e/cj',
                dataType: 'json',
                type: 'POST',
				data:"&xm="+xm+"&zjh="+zjh+"&zkz="+zkz,
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
						$.toast(data.msg);

					$('#name').text(data.name);
					$('#zjh').text(data.zjh);
					$('#zkzh').text(data.zkzh);
					$('#csrq').text(data.csrq);
					$('#kssj').text(data.kssj);
					$('#zsbh').text(data.zsbh);
					$('#zzf').text(data.zzf);
					$('#dj').text(data.dj);
					$('#sf').text(data.sf);
					$('#cszd').text(data.cszd);
					$("#cjcx").hide();
					    $("#cjshow").show();
	}
                 
                },
                error : function(e) {
				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });

}
function zscx1() {
  $("#zsshow").hide();
    $("#zscx").show();
	$.showLoading("加载数据...");
	 var xq = $('#xq').val();

			var zjh = $('#zszjh').val();
            var zsh = $('#zszsh').val();
            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/e/zs',
                dataType: 'json',
                type: 'POST',
				data:"&zjh="+zjh+"&zsh="+zsh,
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
						$.toast(data.msg);

					$('#zname').text(data.name);
					$('#zzjh').text(data.zjh);
					$('#zzkzh').text(data.zkzh);
					$('#zcsrq').text(data.csrq);
					$('#zkssj').text(data.kssj);
					$('#zzsbh').text(data.zsbh);
					$('#zzzf').text(data.zzf);
					$('#zdj').text(data.dj);
					$('#zsf').text(data.sf);
					$('#zcszd').text(data.cszd);
					$("#zscx").hide();
					    $("#zsshow").show();
	}
                 
                },
                error : function(e) {
				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });

}

  
    </script>
		 <script>	$(document).ready(function() {
		  
<?php if($isok==1) { ?>
  $("#cjcx").hide();
    $("#cjshow").show();
		 <?php } else { ?> $("#cjshow").hide();
		   $("#cjcx").show(); <?php } ?>

        });
				function exitz(){
				 $("#zsshow").hide();
		   $("#zscx").show();
				}
		function exitt(){
			$.confirm({
  title: '退出',
  text: '这将清除您的数据缓存，确认再次查询？',
  onOK: function () {
$.showLoading("清除数据...");
	 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/pth/e/exit",
		data:"&by=zy",
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){
window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index";
		},
		})
		

  },
  onCancel: function () {
  $.toast("取消操作", "cancel");
  }
});
		}

							 
     
         </script>
    </body>        <footer>
           
        </footer>
		
</html>