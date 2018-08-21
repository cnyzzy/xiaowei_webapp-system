<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>盐城师范学院校纪校规测试</title>
<script type="text/javascript">
    if (window.location.hash) {
        window.location.hash = "";
        window.location.href = window.location.href.replace("#", "");
    }
    var isWeiXin=1;
</script>
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jqmobo.css" />

<script src="http://staticfile.qnssl.com/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
    !window.jQuery && document.write('<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mobile/jquery-1.10.1.min.js"><\/script>');
</script>

 <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/hintinfo.js" type="text/javascript"></script>
 <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jqmobo2.js" type="text/javascript"></script>
 <style>
  


</style>
</head>
<body>
    
   
    <form id="form1" method="post" action="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/post/?">
    
    
    <div id="toptitle" >
        <div class="header_left">
            
        </div>
        <h1 class="htitle">
            盐城师范学院校纪校规测试</h1>
    </div>
    <?php if($again==1) { ?>
     <div id="divLoadAnswer" style="background:#fffaea;padding:15px 10px;">
         <b style="color:red;">提示：</b>再次提交会覆盖上次的答案解析   <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/result">查看上次成绩</a>
     </div>
     
    <?php } ?>
    
    <div id="divContent">
        <div id="divDesc" class="formfield">
            <span class="description">
                共20题，每题5分，总分100分。测试时间10分钟。</span>
        </div>
        
        
        
        
        
        <div id="divQuestion">
            <fieldset class='fieldset' style='' maxtime='600' id='fieldset1' ><div class='cutfield' id='divCut1' qtopic='1' topic='c1'>
			<div style='margin:7px 12px;'><b>单选题</b></div></div>
			 	<?php foreach((array)$oarr as $key=>$Child) {?>
				<div class="div_question" id="div<?php echo($key+1)?>">
				<div class='field ui-field-contain' id='div<?php echo($key+1)?>' req='1' topic='<?php echo($key+1)?>'  data-role='fieldcontain' type='3'>
				<div class="div_question" id="div<?php echo($key+1)?>"><div class="div_title_question_all"><div id="divTitle<?php echo($key+1)?>" class="div_title_question">
	<?php echo($key+1)?>、<?php echo $Child['title'];?> <span class="req">&nbsp;*</span></div><div style="clear:both;"></div></div>
			<div class='ui-controlgroup'>
				<?php foreach((array)$Child['option'] as $key2=>$Child2) {?>
			<div class='ui-radio'><span class='jqradiowrapper'>
			<input type='radio' value='<?php echo($key2+1)?>' id='q<?php echo($key+1)?>_<?php echo($key2+1)?>' name='q<?php echo($key+1)?>' style='display:none;'/>
			<a  class='jqradio' href='javascript:;'></a></span>
			<div class='label'  for='q<?php echo($key+1)?>_<?php echo($key2+1)?>'><?php echo $Child2['content'];?></div></div>
			<?php }?>
	</div></div><div class="errorMessage"></div></div>   </div><?php }?>
			
			</fieldset>
        </div>
        <div id="divMatrixRel" style="position: absolute; display: none; width: 80%; margin: 0 10%;"
            class="ui-input-text">
            <input type="text" placeholder="请注明..." id="matrixinput" style="min-height: 2em;
                width: 100%; padding: 0.3em 0.6em;" />
        </div>
        <div class="shopcart" id="shopcart" style="display:none;">
        </div>
        <div class="footer">
            <div class="ValError">
            </div>
            <div id="divSubmit" style="padding: 10px; display:none;">

                
                <a id="ctlNext" href="javascript:;" class="button blue" >
                    交卷</a>
  
            </div>
            
            <div id='divMaxTime' style="display: none; background: #f5faf2;  color: #7c7c7c; font-size: 18px; height: 42px;
                left: 0; line-height: 40px; position: fixed; text-align: center; top: 0; width: 100%;
                z-index: 100;">
                <span id="spanTimeTip">本页剩余作答时间</span>&nbsp;<span style="color: Red; font-size: 16px; display: inline-block;"
                    id='spanMaxTime'></span>
            </div>
            
        </div>
       
    </div>
   
     
    <div id="divPowerBy" style="margin: 0 auto;" class="logofooter"><div class='wjfooter'><a href='<?php echo $arrInfo['url'];?>' target='_blank' title='盐城师范学院'>小薇工作室</a>&nbsp;提供技术支持</div></div>

    


    


    <input type="hidden" value="1" id="action" name="action" />
    <input type="hidden" value="<?php echo $time;?>" id="starttime" name="starttime" />
    <input type="hidden" value="directphone" id="source" name="source" />
    </form>
    <a id='lnkCity' style="display: none;"></a>
    <a href="javascript:;" class="scrolltop" style="display:none;"></a>
    <script type="text/javascript">
        var activityId=16074974;
        var isYdb=0;
        var isPub=0;
        var cqType=6;
        var isDingDing=0;
        var ddcorpid="";
        var sojumpParm='';
        var isKaoShi=1;
     var lastTopic=0;
     var Password = "";
        var guid = "";
     var udsid=0;
     var langVer=0;
    var divTip=document.getElementById("divTip");
    var displayPrevPage="none";
    var isQQLogin=0;
    var wxthird=0;
    var parterts="";
    var parterjoiner="";
    var partersign="";
    var hashb=0;

    var outuser='';
    var outsign='';
     var sourceurl = '';
    var sourcename="";
    var isSimple='';
     var jiFenBao=0;var cAlipayAccount="";
        var isRunning=1;
     var SJBack='';var jiFen="0";
     var ItemDicData="";
      var rndnum="614662214.21748934";
      var totalPage=1;
      var totalCut=1;

        var needSaveJoin=0;
        var isChuangGuan=0;
        var maxOpTime=0;
        var qBeginDate="<?php echo $time;?>";
        var randomMode=0;
        var fisrtLoadTime=new Date().getTime();
        var isVip=0;
        

      
    </script>
   
    
      <script>
          var hasPageTime = 1;
          var maxTimer = null;var minTimer = null;
          var hasMaxtime = false;
          var maxSurveyTime=0;
          var initMaxSurveyTime = maxSurveyTime;
          var leftSeconds=0-10;
          var hasSurveyTime=false;
          if(leftSeconds>0){
            if(maxSurveyTime)
               maxSurveyTime=Math.min(leftSeconds,maxSurveyTime);
            else 
               if(leftSeconds<3600) maxSurveyTime=leftSeconds;
          }
          if(maxSurveyTime)hasSurveyTime=true;
          var hasAnswer=false;
          function getMaxTimeStr(counter) {
              var dcounter = "";
              var tempcounter = counter;
              var hour = parseInt(tempcounter / 3600);
              if (hour) {
                  if(hour<10)dcounter+="0";
                  dcounter += hour + ":";
                  tempcounter = tempcounter % 3600;
              }
              else dcounter="00:";
              var minute = parseInt(tempcounter / 60);
              if (minute) {
                  if(minute<10)dcounter+="0";
                  dcounter += minute + ":";
                  tempcounter = tempcounter % 60;
              }else dcounter+="00:";
              if (tempcounter){
                  if(tempcounter<10)dcounter+="0";
                  dcounter += tempcounter;
                  }else dcounter+="00";
              return dcounter;
          }
          function processMinMax()//处理最短时间与最长时间
          {
              if (maxTimer) clearInterval(maxTimer);
              if(minTimer)clearInterval(minTimer);
              if (!window.isRunning)
                  return;
              var maxTime =$(pageHolder[cur_page]).attr("maxtime");
              var spanTimeTip=document.getElementById("spanTimeTip");
              if(hasSurveyTime){
                 maxTime=maxSurveyTime;if(cur_page>0)maxTime--;
		         if(spanTimeTip)spanTimeTip.innerHTML="剩余作答时间";
              }
              var startCounterDate=new Date();
              if (maxTime) {
                  if(langVer==1)spanTimeTip.innerHTML="Remaining ";
                  //var maxCounter = maxTime;
                  hasMaxtime = true;
                  $("body").css("padding-top","42px");
                  var divMaxTime = document.getElementById("divMaxTime");
                  var spanMaxTime = document.getElementById("spanMaxTime");
                  divMaxTime.style.display = "";
                  var bsecond = divMaxTime.getElementsByTagName("b")[0];
                  if (bsecond) bsecond.innerHTML = "";
                  spanMaxTime.innerHTML = getMaxTimeStr(maxTime);
                  maxTimer = setInterval(function () {
                      //maxCounter--;
                      var currDate=new Date();
                      var totalMinSec=parseInt((currDate-startCounterDate)/1000);//
                      var maxCounter=maxTime-totalMinSec;
                      if(maxSurveyTime)maxSurveyTime--;
                      spanMaxTime.innerHTML = getMaxTimeStr(maxCounter);
                      if (maxCounter <= 0) {
                          clearInterval(maxTimer);
                          autoSubmit();

                      }
                  }, 1000);

              }
              var minTime = $(pageHolder[cur_page]).attr("mintime");
              // var needApply=!IsSampleService || (IsSampleService&&promoteSource=="t")||window.pubNeedApply;
              // if(!needApply)minTime=0;
              if (minTime) {
                  var ctrla = $("#ctlNext")[0];
                  var next_page = $("#divNext a")[0];
                  //if (cur_page < totalPage - 1)
                  //    ctrla = $("#divNext a")[0];
                  //else
                  //    ctrla = $("#ctlNext")[0];
                  if ($(pageHolder[cur_page]).attr("iszhenbie") == "time") {
                      var counter = minTime;
                      var next_page = $("#divNext")[0];
                      if(next_page)next_page.style.display = "none";
                      var prev_page = $("#divPrev")[0];
                      if (prev_page) prev_page.style.display = "none";
                      minTimer = setInterval(function () {
                          //counter--;
                          var currDate=new Date();
                          var totalMinSec=parseInt((currDate-startCounterDate)/1000);//
                          counter=minTime-totalMinSec;
                          if (counter <= 0) {
                              clearInterval(minTimer);
                              if (cur_page < totalPage - 1)
                                  show_next_page();
                              else{
                                  pageHolder[cur_page].style.display = "none";
                                  $(".ValError").html("提示：您的作答时间已经超过最长时间限制，请直接提交答卷！");
                              }
                          }
                      }, 1000);
                  }
                  else {
                      ctrla.disabled = true;
                      if (next_page) next_page.disabled = true;
                      if (next_page && !next_page.initVal) next_page.initVal = next_page.innerHTML;
                      if(!ctrla.initVal)
                          ctrla.initVal = ctrla.innerHTML;
                      if(cur_page==pageHolder.length-1)
                        ctrla.innerHTML = minTime + minTimeTip;
                      if(next_page) next_page.innerHTML = minTime+minTimeTip;
                      var counter = minTime;
                      minTimer = setInterval(function () {
                          //counter--;
                          var currDate=new Date();
                          var totalMinSec=parseInt((currDate-startCounterDate)/1000);//
                          counter=minTime-totalMinSec;
                          if(next_page) next_page.innerHTML = counter+minTimeTip;
                          ctrla.innerHTML = counter + minTimeTip;
                          if (counter <= 0) {
                              clearInterval(minTimer);
                              ctrla.disabled = false;
                              if (next_page) next_page.disabled = false;
                              if (next_page) next_page.innerHTML = next_page.initVal;
                              ctrla.innerHTML = ctrla.initVal;

                          }
                      }, 1000);
                  }
              }
          }
      </script>
    
    <script type="text/javascript">
        var needAvoidCrack=0;
        var tdCode="tdCode";
        var imgCode = $("#imgCode")[0];
        var submit_text = $("#yucinput")[0];
        var tCode = $("#"+tdCode)[0];
        var hasTouPiao=0;
    </script>
     
       <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/fastclick.js" type="text/javascript"></script> 
        <script>
        $(function() {  
            if(window.FastClick) FastClick.attach(document.body);  
        });  
       </script>
        <div id="divShare">

    </div>
    
    
    <?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
 
   
</body>
</html>
