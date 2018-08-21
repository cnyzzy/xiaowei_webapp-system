<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>校庆祝福</title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice.css"/>

        <script>(function (doc, win) {
          var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
            recalc = function () {
              var clientWidth = docEl.clientWidth;
              if (!clientWidth) return;
              docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
            };

          if (!doc.addEventListener) return;
          win.addEventListener(resizeEvt, recalc, false);
          doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);		 function wait(form) {
				$.showLoading("正在加载...");
				setTimeout(function() {
        $.hideLoading();
			return true;
        }, 500)};
	
		</script>

		<style>
	.titlebar.reverse {
    background-color: #df4d26;
    border-color: #000;
	
}
.weui-btn_default2 {
    color: #FFF;
    background-color: #f8f8f8;
    BORDER-COLOR: #fff;
    border-radius: 25px;
    border-style: solid;
    border-width: 1px;
    background-color: rgba(208, 11, 11, 0.4);
}
.weui-btn_default3 {
    color: #FFF;
    background-color: #f8f8f8;
    BORDER-COLOR: #fff;
    border-radius: 25px;
    border-style: solid;
    border-width: 1px;
    background-color: rgba(0, 15, 37, 0.4);
}
.weui-btn:after {
    background-color: rgba(0,0,0,0.08);
}

</style>
  <style type="text/css">
        body { font-size: 12px; line-height: 120%; text-align: center; color:#333; }
        a { color: #333; text-decoration: none;}
        a:hover { text-decoration: underline;}
        * { margin: 0; padding: 0; border: none;}
        .clearfix:after { content:"."; display:block; height:0; clear:both; visibility:hidden}
        .clearfix { *height:1%;}
        #list { padding:30px 0px 10px; */margin: 0 auto; text-align: left; width: 100%}
        .box { border-top: 1px solid #eee; position: relative;  padding: 20px 10px;}
        .box:hover .close { display: block;}
        .close { display: none; top:0px; right: 0px; width: 28px; height: 28px; border: 1px solid #eee; position: absolute; background: #f2f4f7; line-height: 27px; text-align: center;}
        .close:hover { background: #c8d2e2; text-decoration: none;}
        .head { float: left; width: 60px; height: 60px; margin-right: 10px;}
        .content { float: left; width: 75%;}
        .main { margin-bottom: 10px;}
        .txt { margin-bottom: 10px;}
        .user { color: #369; }
        .pic { margin-right: 5px; width: 200px; border: 1px solid #eee;}
        .info { height: 20px; line-height: 19px; font-size: 12px; margin: 0 0 10px 0;}
        .info .time { color: #ccc; float: left; height: 20px; padding-left: 20px; background: url("<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/bg1.png") no-repeat left top;}
        .info .praise { color: #369; float: right; height: 20px; padding-left: 18px; background: url("<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/bg2.png") no-repeat left top;}
        .info .praise:hover { text-decoration: underline; background: url("<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/bg4.png") no-repeat left top;}
               .info .praise2 { float: right; height: 20px; padding-left: 18px;text-decoration: underline; background: url("<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/bg3.png") no-repeat left top;}
	   .praises-total { margin: 0 0 10px 0; height: 20px; background: url("<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/praise.png") no-repeat 5px 5px rgb(247, 247, 247); padding: 5px 0 5px 25px; line-height: 19px;}
        .comment-box { padding: 10px 0; border-top: 1px solid #eee;}
        .comment-box:hover { background: rgb(247, 247, 247);}
        .comment-box .myhead { float: left; width: 30px; height: 30px; margin-right: 10px;}
        .comment-box .comment-content { float: left; width: 400px; }
        .comment-box .comment-content .comment-time { color: #ccc; margin-top: 3px; line-height: 16px; position: relative;}
        .comment-box .comment-content .comment-praise { display: none; color: #369; padding-left: 17px; height: 20px; background: url("<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/praise.png") no-repeat;  position: absolute; bottom: 0px; right: 44px;}
        .comment-box .comment-content .comment-operate { display: none; color: #369; height: 20px;  position: absolute; bottom: 0px; right: 10px;}
        .comment-box .comment-content:hover .comment-praise { display: inline-block;}
        .comment-box .comment-content:hover .comment-operate { display: inline-block;}
        .text-box .comment { border: 1px solid #eee; display: block; height: 15px; width: 428px; padding: 5px; resize: none; color: #ccc}
        .text-box .btn { font-size: 12px; font-weight: bold; display: none; float: right; width: 65px; height: 25px; border: 1px solid #0C528D; color: #fff; background: #4679AC;}
        .text-box .btn-off { border: 1px solid #ccc; color: #ccc; background: #F7F7F7;}
        .text-box .word{ display: none; float: right; margin: 7px 10px 0 0; color: #666;}
        .text-box-on .comment{ height: 50px; color: #333;}
        .text-box-on .btn{ display: inline;}
        .text-box-on .word{ display: inline;}
		#bg {
    width: 100%;
}

fieldset, img {
    border: 0 none;
}
#user-name {
    position: absolute;
    text-align: right;
    right: 114px;
    bottom: 15px;
    color: #ffffff;
    font-weight: bold;
    font-size: 15px;
    text-shadow: 0 1px 0.5px #000000;
}
#avt {
    width: 74px;
    height: 74px;
    border: 1px solid #dbdbdb;
    position: absolute;
    right: 15px;
    bottom: -22px;
    padding: 1px;
    background-color: #ffffff;
}
body>header+article {
    padding-top: 205px;
}
i, span {
    vertical-align: unset;
}
    </style>
    <script>
	/**
 * Created by an.han on 14-2-20.
 */

window.onload = function () {
    var list = document.getElementById('list');
    var boxs = list.children;
    var timer;
	$(document).on('click', '.head', function(){
		
			
						var id = $(this).attr("oid");
						var mythis = $(this);
						mythis.attr('src','http://weixin.yctu.edu.cn/xw.jpg'); 
										  	$.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/z60love/do/fimg",
		dataType: 'json',timeout : 2000,
		data:"&id="+id,
		beforeSend:function(){ 
	
},
		success:function(result){
		      $.toast("头像已刷新","text");

		 console.log(result);
		 
if( result['img']){
console.log(result['img']);
mythis.attr('src',result['img']); 
}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {

        }
	})
 
				
				
			});
	
	

    //格式化日期
    function formateDate(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        var h = date.getHours();
        var mi = date.getMinutes();
        m = m > 9 ? m : '0' + m;
        return y + '-' + m + '-' + d + ' ' + h + ':' + mi;
    }

    //删除节点
    function removeNode(node) {
        node.parentNode.removeChild(node);
    }

    /**
     * 赞分享
     * @param box 每个分享的div容器
     * @param el 点击的元素
     */
    function praiseBox(box, el) {
        var txt = el.innerHTML;
        var praisesTotal = box.getElementsByClassName('praises-total')[0];
        var oldTotal = parseInt(praisesTotal.getAttribute('total'));
		var Oid = parseInt(praisesTotal.getAttribute('oid'));
        var newTotal;
        if (txt == '赞') {
							  	$.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/z60love/do/like",timeout : 5000,
		data:"&id="+Oid,
		beforeSend:function(){  
   newTotal = oldTotal + 1;
            praisesTotal.setAttribute('total', newTotal);
            praisesTotal.innerHTML = (newTotal == 1) ? '我觉得很赞' : '我和' + oldTotal + '个人觉得很赞';
            el.innerHTML = '取消赞';
			 el.setAttribute("class", "praise2");

		},
		success:function(result){

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
newTotal = oldTotal - 1;
            praisesTotal.setAttribute('total', newTotal);
            praisesTotal.innerHTML = (newTotal == 0) ? '' : newTotal + '个人觉得很赞';
            el.innerHTML = '赞'; 
			el.setAttribute("class", "praise");
	 praisesTotal.style.display = (newTotal == 0) ? 'none' : 'block';

        }
	})
         
        }
        else {
					  	$.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/z60love/do/unlike",
		data:"&id="+Oid,timeout : 5000,
		beforeSend:function(){   newTotal = oldTotal - 1;
            praisesTotal.setAttribute('total', newTotal);
            praisesTotal.innerHTML = (newTotal == 0) ? '' : newTotal + '个人觉得很赞';
            el.innerHTML = '赞'; 
			el.setAttribute("class", "praise");
},
		success:function(result){

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
   newTotal = oldTotal + 1;
            praisesTotal.setAttribute('total', newTotal);
            praisesTotal.innerHTML = (newTotal == 1) ? '我觉得很赞' : '我和' + oldTotal + '个人觉得很赞';
            el.innerHTML = '取消赞';
						el.setAttribute("class", "praise2");
	 praisesTotal.style.display = (newTotal == 0) ? 'none' : 'block';

        }
	})
          
        }
        praisesTotal.style.display = (newTotal == 0) ? 'none' : 'block';
    }


    function praiseReply(el) {
        var myPraise = parseInt(el.getAttribute('my'));
        var oldTotal = parseInt(el.getAttribute('total'));
        var newTotal;
        if (myPraise == 0) {
            newTotal = oldTotal + 1;
            el.setAttribute('total', newTotal);
            el.setAttribute('my', 1);
            el.innerHTML = newTotal + ' 取消赞';
									 el.setAttribute("class", "praise");

        }
        else {
            newTotal = oldTotal - 1;
            el.setAttribute('total', newTotal);
            el.setAttribute('my', 0);
            el.innerHTML = (newTotal == 0) ? '赞' : newTotal + ' 赞';
		 el.setAttribute("class", "praise2");

        }
        el.style.display = (newTotal == 0) ? '' : 'inline-block'
    }

    /**
     * 操作留言
     * @param el 点击的元素
    */
    function operate(el) {
        var commentBox = el.parentNode.parentNode.parentNode;
        var box = commentBox.parentNode.parentNode.parentNode;
        var txt = el.innerHTML;
        var user = commentBox.getElementsByClassName('user')[0].innerHTML;
        var textarea = box.getElementsByClassName('comment')[0];
        if (txt == '回复') {
            textarea.focus();
            textarea.value = '回复' + user;
            textarea.onkeyup();
        }
        else {
            removeNode(commentBox);
        }
    }
$(document).on('click', 'a', function(){
   var elc =  $(this).attr("class");
   var el = $(this).get(0);
           switch (elc) {

                //关闭分享
                case 'close':
                    removeNode(el.parentNode);
                    break;

                //赞分享
                case 'praise':
                    praiseBox(el.parentNode.parentNode.parentNode, el);
                    break;
   case 'praise2':
                    praiseBox(el.parentNode.parentNode.parentNode, el);
                    break;
                //回复按钮蓝
                case 'btn':
                    reply(el.parentNode.parentNode.parentNode, el);
                    break

                //回复按钮灰
                case 'btn btn-off':
                    clearTimeout(timer);
                    break;

                //赞留言
                case 'comment-praise':
                    praiseReply(el);
                    break;

                //操作留言
                case 'comment-operate':
                    operate(el);
                    break;
            }
});

   } 
	</script>
	</head>
	<body>
	        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>祝福盐师</h1>
				
            </div>
	

        <img id="bg" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/1_bg.png">

        <p id="user-name" class="data-name"></p>

        <img id="avt" class="data-avt" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/yctu.png">


        </header>
	
     <article style="bottom: 0;">   <div id="list">
	 
	   <?php if(isset($NoticeArray1)) { ?>	 
		  

	  		  <?php foreach((array)$NoticeArray1 as $key=>$loopChild) {?>
			        <div class="box clearfix">
           <?php if($loopChild['openid']==$openid) { ?> <a class="close" href="javascript:;">×</a><?php } ?>
            <img class="head" oid="<?php echo $loopChild['id'];?>" src="<?php echo $loopChild['headimg'];?>" alt=""/>
            <div class="content">
                <div class="main">
                    <p class="txt">
                        <span class="user"><?php if(!empty($loopChild['name'])) { ?><?php echo $loopChild['name'];?><?php } else { ?>匿名<?php } ?>：</span><?php echo $loopChild['content'];?></p>
                </div>
                <div class="info clearfix">
                    <span class="time"><?php if(!empty($loopChild['swhere'])) { ?><?php echo $loopChild['swhere'];?><?php } else { ?><?php echo(smartDate($loopChild['addtime'], 'Y-m-d H:i'))?><?php } ?></span>
                    <a class="<?php if(!empty($loopChild['iszan'])) { ?>praise2<?php } else { ?>praise<?php } ?>" href="javascript:;"><?php if(!empty($loopChild['iszan'])) { ?>取消赞<?php } else { ?>赞<?php } ?></a>
                </div>
                <div class="praises-total" total="<?php echo $loopChild['liku'];?>" oid="<?php echo $loopChild['id'];?>" style="display: block;"><?php if(!empty($loopChild['iszan'])) { ?><?php if($loopChild['liku']==1) { ?>我觉得很赞<?php } else { ?>我和<?php echo($loopChild['liku']-1)?>个人觉得很赞<?php } ?><?php } else { ?><?php echo $loopChild['liku'];?>个人觉得很赞<?php } ?></div>
            
            </div>
        </div>  
			  
			  
			  

              <?php }?>
<?php } else { ?>
    
        

             <?php } ?>

 


      
    </div> <div id="loadmore" class="weui-loadmore">
     <i class="weui-loading"></i><span class="weui-loadmore__tips">正在加载</span>
    </div>
</body>
		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
		      <script>
			  var page = 1;
      var loading = false;
	  $(document.body).infinite(20);
      $(document.body).infinite().on("infinite", function() {
        if(loading) return;
		$("#loadmore").html('<i class="weui-loading"></i><span class="weui-loadmore__tips">正在加载</span>');
        loading = true;
		page++;
	  $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/view',
                dataType: 'json',
                type: 'POST',
				data:"&id="+page,
				timeout : 5000,
                success: function (data) {
					
    
if( data[0]&& data[0].length!=0 ){
					for (var i = 0; i < data.length; i++) {
				var id=data[i]['id'];
					var headimg=data[i]['headimg'];
					var name=data[i]['name'];
					var swhere=data[i]['swhere'];
					var iszan=data[i]['iszan'];
					var content=data[i]['content'];
					var iszanp='praise2';
					var iszanz='取消赞';
					var liku=data[i]['liku']
					var iszant=liku+'个人觉得很赞';
					if (!iszan){iszanp='praise';}   
					if (!iszan){iszanz='赞';}  
					if (iszan&&liku=='1'){iszant='我觉得很赞';} 
					if (iszan&&liku){iszant+='我和';} 
				if (!iszan&&!liku){iszant='';} 
if (!name && typeof(name)!="undefined")   {name='匿名';}              
        $('#list').append('<div class="box clearfix"> <img class="head" oid="'+id+'" src="'+headimg+'" alt=""/> <div class="content"> <div class="main"> <p class="txt">  <span class="user">'+name+'：</span>'+content+'</p></div><div class="info clearfix"><span class="time">'+swhere+'</span><a class="'+iszanp+'" href="javascript:;">'+iszanz+'</a> </div><div class="praises-total" total="'+liku+'" oid="'+id+'" style="display: block;">'+iszant+'</div></div> </div> ');
      	              
					  
 }

    }else{
  if( data['zy']&& data['zy']==9 ){
   
				$("#loadmore").html('<span class="weui-loadmore__tips">加载完毕</span>');
$("#loadmore").addClass("weui-loadmore_line");
 $(document.body).destroyInfinite();
  }else{
      $.toast("服务器未反馈","forbidden");
	  		$("#loadmore").html('');

    }	}		

					   loading = false;
                   console.log(data[0]);
                },
                error : function(e) {
			   loading = false;
                    $.toast("网络故障","forbidden");
							$("#loadmore").html('');

                }
            });

      });
    </script>
	
       <?php include template('footer'); ?>