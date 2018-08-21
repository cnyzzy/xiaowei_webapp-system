<?php defined('ZRoot') or die('Access Denied.'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>成绩单</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jqmobo.css" />

<script src="http://staticfile.qnssl.com/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
    !window.jQuery && document.write('<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mobile/jquery-1.10.1.min.js"><\/script>');
</script>   
    
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
    		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
    <style>

</style>
</head>
<body style='background:#fff;'>
    
    <div id="toptitle" >
        
        <div class="header_left">
            
        </div>
        <h1 class="htitle">
            成绩单——盐城师范学院校纪校规测试</h1>
    </div>
    
    
    <div style="text-align: center; margin: 0px 0 10px;">
        <div class="formfield" style="padding-bottom: 30px;">
            <div id="divKaoShi">
                <link rel='stylesheet' href='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/newwjx/css/default.css' />
                <link rel='stylesheet' href='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/score-user-phone.css' />
                <style>
                    div.formfield
                    {
                        padding:0px;
                        margin:0px;
                    }
                    body
                    {
                        width:100%;
                        min-width:320px;
                        font-size:16px;
                    }
                </style>
                <script>
							<?php if($is100!=1) { ?>
			$(document).ready(function(){

		$.alert("您还未获得抽奖机会，请继续努力", "加油");});<?php } ?>
					var isWeiXin=1;
                    var activityId="16074974";
                    var joinId="";
                    var notShowChartWhenLoaded=1;//加载完成时显示图形
                </script>
                <script>
				function getaward()
				{
	<?php if($nodj==1) { ?>		
				$.prompt({
  title: '输入姓名',
  text: '姓名将作为凭证',
  input: '<?php if($name!="新生") { ?><?php echo $name;?><?php } ?>',autoClose: true,
  empty: false, // 是否允许为空
  onOK: function (name) {
 				$.prompt({
  title: '手机号码',
  text: '号码将作为凭证',
  input: '',
  empty: false,autoClose: true,
  onOK: function (input) {
  var phone = input;

             if(!(/^1[3|5|7|8][0-9]\d{4,8}$/.test(phone))){ 
$.toast("号码无效", "forbidden");
    } else{
                     flag = true;
					 $.showLoading("正在提交信息");
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/xjxg/do/cjdj",
		data:"&name="+name+"&mobile="+phone,
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   
	if(result.type!='ok'){
	$.hideLoading();
	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
          window.location.reload(true);
        }, 1000)
	}
	if(result.type=='ok'){
	$.toast(result.msg);
				 setTimeout(function() {
        window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/cj";
        }, 800)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
          window.location.reload(true);
        }, 1000)
	}

		
	});
             }
			
  },
  onCancel: function () {
   $.toast("取消操作", "cancel");
  }
});
  },
  onCancel: function () {
   $.toast("取消操作", "cancel");
  }
});<?php } else { ?>			
 $.showLoading("正在加载");
	 setTimeout(function() {
        window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/cj";
        }, 500)<?php } ?>	
				}
                    function setanswer(qur){
                        var divAnswer=document.getElementById("divAnswer");
                        var anserhtml=qur.innerHTML;
                        var hideCorrect=qur.hideCorrect;
                        var imgs=divAnswer.getElementsByTagName("img");
                        for(var i=0;i<imgs.length;i++)
                        {
                            if(imgs[i].alt=="正确")
                            {
                                var divimg=imgs[i].parentNode.parentNode;
                                divimg.style.display=qur.hideCorrect?"":"none";
                            }
                        }
                        qur.innerHTML=qur.hideCorrect?"只显示错误题目": "显示全部题目";
                        qur.hideCorrect=!qur.hideCorrect;
                    }  
                    var hasSort=false;
                    function sortAnswer(){
                        if(hasSort)return;
                        hasSort=true;
                        var divAnswer=document.getElementById("divAnswer");
                        if(divAnswer && window.localStorage && window.JSON){
                            var key = "sortorder_" + activityId;
                            var sortobj=window.localStorage.getItem(key);
                            var sortorders=new Object();
                            if(sortobj){
                                sortorders= JSON.parse(sortobj);
                                if(sortorders){
                                    var aDiv = divAnswer.getElementsByTagName('div');
                                    var arr = [];
                                    for(var i=0;i<aDiv.length;i++)
                                    {
                                        if(aDiv[i].getAttribute("topic"))
                                            arr.push(aDiv[i]);
                                    }
                                    arr.sort(function(a,b){
                                        var topic1=a.getAttribute('topic');var topic2=b.getAttribute('topic');
                                        var order1=sortorders[topic1]||0;var order2=sortorders[topic2]||0;
                                        return order1 - order2;
                                    });
                                    var allhtml="";
                                    for(var i=0;i<arr.length;i++)
                                    {
                                        var topic=arr[i].getAttribute("topic");
                                        if(topic && sortorders[topic]){
                                            var label=arr[i].getElementsByTagName("label");
                                            if(label[0])
                                                label[0].innerHTML=sortorders[topic]+". ";
                                        }
                                        allhtml+=arr[i].outerHTML;
                                    }
                                    if(arr[0]){
                                        arr[0].parentNode.innerHTML=allhtml;
                                    }
                                }
                            }
                        }
                    }
                function openDialogByIframe(width, height, url,fullScreen) {  
                    var winWinth = $(window).width(), winHeight = $(document).height();
                    height=$(window).height()-40;
                    width=$(window).width()-20;

                    $("body").append("<div id='yz_popIframeDiv'></div>");  
                    var eleOb=document.getElementById(url);
                    var cHtml= "<div id='yz_popTanChu'><div style='position:relative;'><a id='yz_popTanChuClose' style='background:url(<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/bt_closed.gif) no-repeat;width:30px;height:30px;margin:-15px -18px 0 0;display:inline;float:right;cursor:pointer;position:absolute;right:0;'></a></div>";
                    if(!eleOb){
                        cHtml+="<iframe id='yz_popwinIframe' frameborder='0' hspace='0' src="+ url + "></iframe>";
                    }
                    else
                        cHtml+="<div id='yz_popdivData' style='padding:10px;height:"+(height-30)+"px;overflow:auto;width:"+width+"px;'></div>";
                    cHtml+="</div>";
                    $("body").append(cHtml);
                    $("#yz_popIframeDiv").css({  
                        width : winWinth,  
                        height : winHeight,  
                        background : "#000",  
                        position : "absolute",  
                        left : "0",  
                        top : "0"  
                    });  
                    $("#yz_popIframeDiv").fadeTo(0, 0.5);  
                    var yz_popTanChuLeft = $(window).width() / 2 - width / 2;  
                    var yz_popTanChuTop = $(window).height() / 2 - height / 2  
                            + $(window).scrollTop();  
                    $("#yz_popTanChu").css({  
                        width : width,  
                        height : height,   
                        left : yz_popTanChuLeft,  
                        top : yz_popTanChuTop,  
                        background : "#fff",  
                        position : "absolute" ,
                        zIndex:1000
                    });  
                    if(eleOb){
                        $("#yz_popdivData").html(eleOb.innerHTML);
                    }
                    var winIframeHeight = height;  
                    $("#yz_popwinIframe").css({  
                        width : width,  
                        height : winIframeHeight,  
                        "border-bottom" : "1px #ccc solid",  
                        background : "#ffffff"
                    });   
                    $("#yz_popTanChuClose,#yz_popIframeDiv").click(function() {  
                        $("#yz_popIframeDiv").remove();  
                        $("#yz_popTanChu").remove();  
                    });  
                }
                $(function(){
                    $(".formfield").css("padding-bottom","0");
                });
                </script>
            </div>
            <div class="description" id="divdsc">
                <div class='score-form__content score-form__box-inner'> <div class='score-form__details-wrapper'><h3 class='overall__score-title give'>成绩单</h3>
				<div class='score-form__list clearfix'> <div class='score-form__items pull-left scorefirst' style='width:148px;'>
				<div class='form__items--rt' style='width:90px;'><strong><?php if($sarr['total']) { ?><?php echo $sarr['total'];?><?php } else { ?>??<?php } ?></strong><em>/100</em></div><div class='form__items--lt' style='width:55px;'>
				<i class='icon  score-form__icon--score'></i> <h4>得分</h4></div></div><div class='score-form__items pull-left' style='width:152px;'>
				<div class='form__items--rt' style='width:80px;'><strong><?php if($sarr['total']) { ?><?php echo($sarr['total']/5)?><?php } else { ?>??<?php } ?></strong><em>/20</em></div> <div class='form__items--lt' style='width:70px;'><i class='icon  score-form__icon--quantity'></i><h4>答对题数</h4></div></figure></div>
				<div class='dotted-line wjx-margin-30 clear'>
				<div class='score-form__details-wrapper' style='padding-bottom:20px;text-align:left;'>
				<a href='<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/' class='sumitbutton' >再来一次</a></div></div> </div></div>
				
				<div class='score-form__details-wrapper' style='padding-bottom:20px;text-align:left;'>
				<div class='clearfix'><h3 class='overall__score-title give pull-left'>答题解析</h3>&nbsp;&nbsp;
				<a href="javascript:void(0);"  class='score-form__set-answer' onclick="setanswer(this);" id='divShowError' style='display:none;'>只显示错误题目</a> </div>
				<div class='dotted-line wjx-margin-30 clear' style='margin:15px 0;'></div>
				<a href='javascript:' class='sumitbutton' onclick="document.getElementById('divShowError').style.display=document.getElementById('divAnswer').style.display='';this.style.display='none';sortAnswer();">
				查看答案解析</a>
				<div class='score-form__dec-answer' id='divAnswer' style='display:none;'><div><div style='margin:10px;'>单选题</div>
				
				<?php if($sarr) { ?>
				<?php foreach((array)$sarr as $key=>$Child) {?><div style='margin-bottom:10px;padding:5px 0;' topic='<?php echo($key+1)?>'><div>
				<?php if(isset($Child['title'])) { ?>
				<?php echo($key+1)?>、<?php echo $Child['title'];?> &nbsp;&nbsp;<span style='color:#ff941a;'>分值:5</span>
				</div><div style='margin:5px 0 5px 20px;'>您的回答为：<?php if($Child['yoption']) { ?><?php echo $Child['yoption'];?><?php } ?>;<?php if($Child['score']==5) { ?><img src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/achievement_dui.png' alt='正确' style='vertical-align:middle;'/><br/>
				<?php } else { ?><img src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/achievement_cuo.png' alt='错误' style='vertical-align:middle;'/><br/><font color='#4096ee'>正确答案为：</font><?php if($Child['roption']) { ?><?php echo $Child['roption'];?><?php } ?><?php } ?>
				</div>
				  	<?php } ?></div><?php }?>
					<?php } ?>
		</div></div> </div>
		<?php if($row) { ?>
		<div class='dotted-line wjx-margin-30 clear'></div>
			<div class='score-form__details-wrapper' style='padding-bottom:20px;text-align:left;'>
				<div class='clearfix'><h3 class='overall__score-title give pull-left'>答题记录</h3>&nbsp;&nbsp;
				
				<div class='dotted-line wjx-margin-30 clear' style='margin:15px 0;'></div>
				<a href='javascript:' class='sumitbutton' onclick="document.getElementById('divJl').style.display='';this.style.display='none';">
				查看我的记录</a>
		<div class='score-form__dec-answer' id='divJl' style='display:none;'><div><div style='margin:10px;'>记录</div>
		</div>
						<?php foreach((array)$row as $key=>$Child) {?><div style='margin-bottom:10px;padding:5px 0;' topic='<?php echo($key+1)?>'><div>
				<?php if(isset($Child['sroce'])) { ?>
				<?php echo($key+1)?>、<?php ECHO(date('Y-m-j G:i:s',$Child['addtime']))?> &nbsp;&nbsp;<span style='color:#ff941a;'>分数:<?php echo $Child['sroce'];?></span>
				</div>
				  	<?php } ?></div><?php }?>
		
		
		
		</div>
		
		
            </div>


        </div>
		<?php } ?>  <?php if($is100==1) { ?>
		<div class='dotted-line wjx-margin-30 clear'></div>
         </div>
      
        <div id="divAward" style="width: 240px; margin:10px auto 20px;" >
            <div style="color: Red; margin-bottom: 5px;">  <?php if($nocj==1) { ?>恭喜您获得了1次抽奖机会！<?php } else { ?>您已经抽过奖了<?php } ?></div>
            <table class="award" id="tbAward" align="center" style="background: #ffe297;" cellspacing="4">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="background: #ffe297;">
                        <a class="button white" onclick="getaward();" style="color: #fff; background: #e87814; margin: 0;"><?php if($nocj==1) { ?>开始抽奖<?php } else { ?>再去看看<?php } ?></a>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        
<?php } ?>

        
        <div id="userdialog" style="background: #FFF; width: 80%; max-width: 500px; margin: 20px auto; display: none;">
            
        </div>
        
    </div>

    <div id="divPowerBy" style="margin: 30px auto 20px; text-align: center; color: #666;"><a href='http://weixin.yctu.edu.cn' target='_blank' style='color:#444; text-decoration:none; font-weight:normal;' data-ajax='false' title='作者'>小薇工作室</a>&nbsp;提供技术支持</div>
 


    <div id="divWeiXin">

    </div>
    <script>
        function postHeight() {
            if (window == window.top)
                return;
            try {
                var pmp = parent.postMessage ? parent : parent.document.postMessage ? parent.document : null;
                if (pmp != null)
                    return pmp.postMessage("heightChanged," + ($("body").height() + 20), "*");
            } catch (e) {
            }
        }
        $(function(){
            if (window !=window.top)
                $("body").css("background","#fff");
            postHeight();
        });
        $(function(){ 
            if(!isWeiXin)
                return;
            pushHistory(); 
            window.addEventListener("popstate", function(e) { 
                pushHistory(); 
                if(isWeiXin && window.WeixinJSBridge) { 
                    WeixinJSBridge.call('closeWindow'); 
                } 
            }, false); 
            function pushHistory() { 
                var state = { 
                    title: "title", 
                    url: "#"
                }; 
                window.history.pushState(state, "title", "#"); 
            } 
        });
    </script>

    <?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>