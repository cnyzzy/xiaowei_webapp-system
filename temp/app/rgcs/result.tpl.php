<?php defined('ZRoot') or die('Access Denied.'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>测试结果</title>
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
		        <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/echarts.min.js"></script>	

    <style>

</style>
</head>
<body style='background:#fff;'>
    
    <div id="toptitle" >
        
        <div class="header_left">
            
        </div>
        <h1 class="htitle">
            人格测试结果</h1>
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

		//$.alert("测试已记录", "测试");
		});
		<?php } ?>
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
		url:"<?php echo $arrInfo['url'];?>/rgcs/do/cjdj",
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
                <div class='score-form__content score-form__box-inner'> <div class='score-form__details-wrapper'><h3 class='overall__score-title give'>测试结果</h3>
				<div class='score-form__list clearfix'> 
				<div class='score-form__items pull-left scorefirst' style=''>
				<div class='form__items--rt' style='width:90px;'><strong><?php if($tarray[0]['type']) { ?><?php echo $tarray[0]['type'];?><?php } else { ?>??<?php } ?></strong><em>/<?php if($tarray[0]['num']) { ?><?php echo $tarray[0]['num'];?><?php } else { ?>??<?php } ?></em></div>
				<div class='form__items--lt' style=''>
				<i class='icon  score-form__icon--score'></i> <h4>最适类型</h4></div></div>
				<div class='score-form__items pull-left scorefirst' style=''>
				<div class='form__items--rt' style='width:90px;'><strong><?php if($tarray[1]['type']) { ?><?php echo $tarray[1]['type'];?><?php } else { ?>??<?php } ?></strong><em>/<?php if($tarray[1]['num']) { ?><?php echo $tarray[1]['num'];?><?php } else { ?>??<?php } ?></em></div> 
				<div class='form__items--lt' style=''><i class='icon  score-form__icon--quantity'></i><h4>较适类型</h4></div></figure></div>
				<div class='score-form__items pull-left scorefirst' style=''>
				<div class='form__items--rt' style='width:90px;'><strong><?php if($tarray[2]['type']) { ?><?php echo $tarray[2]['type'];?><?php } else { ?>??<?php } ?></strong><em>/<?php if($tarray[2]['num']) { ?><?php echo $tarray[2]['num'];?><?php } else { ?>??<?php } ?></em></div> 
				<div class='form__items--lt' style=''><i class='icon  score-form__icon--quantity'></i><h4>较适类型</h4></div></figure></div>
				
				<div class='dotted-line wjx-margin-30 clear'>
				<div class='score-form__details-wrapper' style='padding-bottom:20px;text-align:left;'>
				<a href='<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/' class='sumitbutton' >再来一次</a></div></div> </div></div>
				<div class='score-form__details-wrapper' style='padding-bottom:20px;text-align:left;'>
				<div class='clearfix'><h3 class='overall__score-title give pull-left'>统计图</h3>&nbsp;&nbsp;
				<div class='dotted-line wjx-margin-30 clear' style='margin:15px 0;'></div>
				
				
				 <div id="leida" style="width: 100%;height:400px;"></div>
				 <div id="zhuzhuang" style="width: 100%;height:400px;"></div>

				 <script>
				 var leidaChart = echarts.init(document.getElementById('leida'));
				 var zhuzhuangChart = echarts.init(document.getElementById('zhuzhuang'));

        // 指定图表的配置项和数据
        var option1 = {
    title: {
        text: '测试结果雷达图'
    },
    tooltip: {},
    legend: {
      
    },
	
    radar: {
        // shape: 'circle',
        name: {
            textStyle: {
                color: '#fff',
                backgroundColor: '#999',
                borderRadius: 3,
                padding: [3, 5]
           }
        },
        indicator: [
           { name: 'A', max: 34},
            { name: 'B', max: 34},
             { name: 'C', max: 34},
              { name: 'D', max: 34},
            { name: 'E', max: 34},
             { name: 'F', max: 34},
              { name: 'G', max: 34},
            { name: 'H', max: 34},
             { name: 'I', max: 34},

        ]
    },
    series: [{
        name: '九型人格测试',
        type: 'radar',
        // areaStyle: {normal: {}},
        data : [
            {
                value : [<?php foreach((array)$total as $key=>$Child) {?><?php echo $Child;?>,<?php }?>],
                label: {
                    normal: {
                        show: true,
                        formatter:function(params) {
                            return params.value;
                        }
                    }},
            },
			

             
        ]
    }]
};
        var option2 = {
    title: {
        text: '测试结果柱状图'
    },
  
    color: ['#1d1e72'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'SHADOW'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : [<?php foreach((array)$tarray as $key=>$Child) {?>'<?php echo $Child['type'];?>',<?php }?>],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'直接访问',
            type:'bar',
            barWidth: '60%',
            itemStyle : {
				normal : {
					label: {
				          show: true,
				          position: 'top',
				          textStyle: {
				            color: '#1d1e72'
				      }
				   }
				},
			},
            data:[<?php foreach((array)$tarray as $key=>$Child) {?>'<?php echo $Child['num'];?>',<?php }?>],
        
        }

    ]
};
        // 使用刚指定的配置项和数据显示图表。
        leidaChart.setOption(option1);
		zhuzhuangChart.setOption(option2);
		</script>
		<div class='dotted-line wjx-margin-30 clear'></div>
				<div class='clearfix'><h3 class='overall__score-title give pull-left'>答题记录</h3>&nbsp;&nbsp;
				<div class='dotted-line wjx-margin-30 clear' style='margin:15px 0;'></div>
				<a href='javascript:' class='sumitbutton' onclick="document.getElementById('divAnswer').style.display='';this.style.display='none';sortAnswer();">
				查看144题</a>
				<div class='score-form__dec-answer' id='divAnswer' style='display:none;'><div><div style='margin:10px;'>单选题</div>
				
				<?php if($sarr) { ?>
				<?php foreach((array)$sarr as $key=>$Child) {?><div style='margin-bottom:10px;padding:5px 0;' topic='<?php echo($key+1)?>'><div>

			<?php if(!empty($Child['title'])&&($key!='total'||empty($key))) { ?>
				
				<?php echo($key+1)?>、<?php echo $Child['title'];?> &nbsp;&nbsp;<span style='color:#ff941a;'>类型:<?php echo $Child['score'];?></span>
				</div><div style='margin:5px 0 5px 20px;'>您的回答为：<?php if($Child['yoption']) { ?><?php echo $Child['yoption'];?><?php } ?>;
				</div>
				  	<?php } ?></div><?php }?>
					<?php } ?>
		</div></div> </div>
		<?php if($row) { ?>
		<div class='dotted-line wjx-margin-30 clear'></div>
			<div class='score-form__details-wrapper' style='padding-bottom:20px;text-align:left;'>
				<div class='clearfix'><h3 class='overall__score-title give pull-left'>测试记录</h3>&nbsp;&nbsp;
				
				<div class='dotted-line wjx-margin-30 clear' style='margin:15px 0;'></div>
				<a href='javascript:' class='sumitbutton' onclick="document.getElementById('divJl').style.display='';this.style.display='none';">
				查看我的记录</a>
		<div class='score-form__dec-answer' id='divJl' style='display:none;'><div><div style='margin:10px;'>记录</div>
		</div>
						<?php foreach((array)$row as $key=>$Child) {?><div style='margin-bottom:10px;padding:5px 0;' topic='<?php echo($key+1)?>'><div>
				<?php if(isset($Child['sroce'])) { ?>
				<?php echo($key+1)?>、<?php ECHO(date('Y-m-j G:i:s',$Child['addtime']))?> &nbsp;&nbsp;<span style='color:#ff941a;'>类型:<?php echo $Child['sroce'];?></span>
				</div>
				  	<?php } ?></div><?php }?>
		
		
		
		</div>
		
		
            </div>


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