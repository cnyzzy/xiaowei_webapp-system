var imgList =['app/gcdxy/model/img/1.jpg','app/gcdxy/model/img/1-1.png','app/gcdxy/model/img/1-2.png','app/gcdxy/model/img/1-3.png','app/gcdxy/model/img/1-4.png','app/gcdxy/model/img/1-5.png','app/gcdxy/model/img/1-6.png','app/gcdxy/model/img/1-7.png','app/gcdxy/model/img/1-8.png','app/gcdxy/model/img/1-9.png','app/gcdxy/model/img/1-10.png','app/gcdxy/model/img/2.jpg','app/gcdxy/model/img/2-1.png','app/gcdxy/model/img/2-2.png','app/gcdxy/model/img/2-3.png','app/gcdxy/model/img/2-4.png','app/gcdxy/model/img/3-1.png','app/gcdxy/model/img/3-2.png','app/gcdxy/model/img/3-3.png','app/gcdxy/model/img/3-4.png','app/gcdxy/model/img/4-1.png','app/gcdxy/model/img/4-2.png','app/gcdxy/model/img/4-3.png','app/gcdxy/model/img/6.jpg','app/gcdxy/model/img/6-1-4.png','app/gcdxy/model/img/6-21.png','app/gcdxy/model/img/6-21-1.png','app/gcdxy/model/img/6-22.png','app/gcdxy/model/img/6-22-1.png','app/gcdxy/model/img/6-22-2.png','app/gcdxy/model/img/6-22-3.png','app/gcdxy/model/img/7.jpg','app/gcdxy/model/img/btn-1.png','app/gcdxy/model/img/btn-2.png','app/gcdxy/model/img/btn-3.png','app/gcdxy/model/img/btn-4.png','app/gcdxy/model/img/btn-5.png','app/gcdxy/model/img/btn-6.png','app/gcdxy/model/img/btn-7.png','app/gcdxy/model/img/btn-8.png','app/gcdxy/model/img/btn-9.png','app/gcdxy/model/img/btn-10.png','app/gcdxy/model/img/btn-11.png','app/gcdxy/model/img/btn-11.png','app/gcdxy/model/img/btn-13.png','app/gcdxy/model/img/btn-14.png','app/gcdxy/model/img/btn-15.png','app/gcdxy/model/img/btn-16.png','app/gcdxy/model/img/btn-17.png','app/gcdxy/model/img/btn-18.png','app/gcdxy/model/img/btn-19.png','app/gcdxy/model/img/circle.png','app/gcdxy/model/img/17-1.png','app/gcdxy/model/img/17-2.png','app/gcdxy/model/img/17-3.png','app/gcdxy/model/img/17-4.png','app/gcdxy/model/img/17-5.png','app/gcdxy/model/img/17-6.png','app/gcdxy/model/img/17-7.png','app/gcdxy/model/img/17-8.png','app/gcdxy/model/img/person/bg.jpg','app/gcdxy/model/img/person/1-0.png','app/gcdxy/model/img/person/m1.png','app/gcdxy/model/img/person/m0.png','app/gcdxy/model/img/person/m2.png','app/gcdxy/model/img/person/m3.png','app/gcdxy/model/img/person/m4.png','app/gcdxy/model/img/person/m5.png','app/gcdxy/model/img/person/m6.png','app/gcdxy/model/img/person/m7.png','app/gcdxy/model/img/person/m8.png','app/gcdxy/model/img/info/n1.png','app/gcdxy/model/img/info/n2.png','app/gcdxy/model/img/info/n3.png','app/gcdxy/model/img/info/n4.png','app/gcdxy/model/img/info/n5.png','app/gcdxy/model/img/info/n6.png','app/gcdxy/model/img/info/n7.png','app/gcdxy/model/img/info/n8.png','app/gcdxy/model/img/photo/p1.png','app/gcdxy/model/img/photo/p2.png','app/gcdxy/model/img/photo/p3.png','app/gcdxy/model/img/photo/p4.png','app/gcdxy/model/img/photo/p5.png','app/gcdxy/model/img/photo/p6.png','app/gcdxy/model/img/photo/p7.png','app/gcdxy/model/img/photo/p8.png','app/gcdxy/model/img/words/w1.png','app/gcdxy/model/img/words/w2.png','app/gcdxy/model/img/words/w3.png','app/gcdxy/model/img/words/w4.png','app/gcdxy/model/img/words/w5.png','app/gcdxy/model/img/words/w6.png','app/gcdxy/model/img/words/w7.png','app/gcdxy/model/img/words/w8.png','app/gcdxy/model/img/11.jpg'];

//加载
var loader = new resLoader({
    resources: imgList,
    onStart : function(total){
    },
    onProgress : function(current, total){
        var percent =Math.round(current/total*100);
        $("#progress").html(percent+'%');
    },
    onComplete : function(total){
        setTimeout(function(){
            $('#loader').hide();
            $("#wrap").show();
              swiperFun();
        },1500)
        
    }
});

loader.start();
var _voice = {
    localId: '',//录音id
    serverId: ''//服务器音频id
};
var flag=false;
var cIndex=0;
var wavetimer = null;
var path="";
var myScroll;
var isFinish =false;
var isfail=false;
var totalScore=0;
var nameArr=["戴斌荣","方忠","黄志纯","刘必清","孟国栋","郁霞秋","徐川","汪玲"];
var  wordArr=[["无产阶级","运动","炸毁","资产阶级","打倒"],["改革","原则","斗争","共产主义","历史"],["共产主义","所有制","决裂","进程","传统"],["不屑","观点","推翻","共产主义","锁链"],["封建社会","消灭","阶级","资产阶级时代","阶级对立"],["共产党人","革命运动","所有制","发展程度","民主政党"],["资产阶级","统治","破坏","剥削","政治幻想"],["共产党人","革命运动","所有制","发展程度","民主政党"]];


$(function() {



  Check();
	//开启
	$(".btn-go").on("touchstart",function(){
     $(".swiper-container").fadeOut(500);
     $("#three").css("visibility", "visible");
	   stageView.start();
	});
	//聆听
	$(".btn-listen").on("touchstart",function(){
      $(".btn-listen").hide();
      $(".btn-close").show();
      $("audio")[0].pause();
      Sound["Audio"+cIndex].play();
      getAudioTime(cIndex);
	});

  //关闭
  $(".btn-close").on("touchstart",function(){
      StopAudioTime(cIndex);
  });
	
	//跟读
	$(".btn-record").on("touchstart",function(){
    stopAudio();
    StopAudioTime(cIndex);
    $(".word").attr("src","app/gcdxy/model/img/words/w"+cIndex+".png");
		$(".page6").fadeIn(500);
	});
	//返回
	$(".btn-back").on("touchstart",function(){
    stopAudio();
    StopAudioTime(cIndex);
		$(".page5").fadeOut(500);
	});
	//开始录音
	$(".btn-start").on("touchstart",function(){
		$(".btn-start,.tip1").hide();
		$(".btn-stop,.tip2").show();
    waveMove();
    startRecord();
	});
  //暂停录音
  $(".btn-stop").on("touchstart",function(){
    stopRecord();
    stopRecordFun1();
  });
  //试听
  $(".btn-st").on("touchstart",function(){
    if(_voice.serverId==""){
      alert("请先录音");
      return false;
    }
     playVoice();
  });
	//提交录音
	$(".btn-submit").on("touchstart",function(){
     if(_voice.serverId==""){
      alert("请先录音");
      return false;
    }
    stopVoice();

    if(flag){
      return false;
    }

    flag=true;
    if(!isfail){
      $(".load").show();
    }else{
       flag=false;
    }

   
    if(isFinish){
        Save();
    }else{
       // $(".load").show();
    }


	});
	//返回
	$(".btn-back1").on("touchstart",function(){
		 $(".page6").fadeOut(500);
	});
  //排行榜
  $(".btn-rank").on("touchstart",function(){
    GetList();
    $(".page8").fadeIn(500);
  });
//返回海报页
  $(".btn-back2").on("touchstart",function(){
     $(".page8").fadeOut(500);
  });
    $(".btn-join2").on("touchstart",function(){
     $(".page11").fadeIn(500);
  });
  $(".btn-back3").on("touchstart",function(){
     $(".page11").fadeOut(500);
  });


});

function Check() {
  $.get("/gcdxy/img", {
      "Code":'1'
    },
    function(result) {
      if (result == "-1") {
        Go("", "1");
      } else {
          path=result;
      }
      PlusNums("DianShiTai.G.180201");
      Share("书记领读  品味真理的味道", "http://weixin.yctu.edu.cn/gcdxy", "http://weixin.yctu.edu.cn/app/gcdxy/model/img/icon.jpg", "一起来跟随书记重温经典，朗读《共产党宣言》", "DianShiTai.G.180201");
    })
}


//
function  swiperFun() {
    var mySwiper = new Swiper('.swiper-container', {
    initialSlide:0,
    direction: "vertical",
    onInit: function(swiper) {
      $(".swiper-slide").eq(swiper.activeIndex).find(".animate").css("display","block")
    },
    onSlideChangeEnd: function(swiper) {
      var index = swiper.activeIndex;
      var prevIndex = swiper.previousIndex;
      $(".swiper-slide").eq(prevIndex).find(".animate").css("display","none")
      $(".swiper-slide").eq(index).find(".animate").css("display","block")

    },
    noSwiping: true,
    noSwipingClass: 'stop-swiping'
  });
}



//录音结束
function stopRecordFun1(){
    clearInterval(wavetimer);
    $(".btn-stop,.tip2,.wave-box").hide();
    $(".btn-start,.tip1").show();
     $("audio")[0].play();
}

function getAudioTime(index){
      $(".bar-box").show();
      var audioTime =Sound["Audio"+index].duration;
      $(".totalTime").html(transformTime(audioTime));
      Sound["Audio"+index].ontimeupdate = function () { 
        var durTime =Sound["Audio"+index].duration;
        var curTime =  Sound["Audio"+index].currentTime;
       $(".stime").html(transformTime(curTime));
      　var percent = parseInt((curTime/durTime)*100);
       $(".bar-pro").css("width",percent+"%");
       $(".bj").css("margin-left",percent+"%");
    };
}

function StopAudioTime(index){
      $(".bar-box").hide();
      $(".btn-close").hide();
      $(".btn-listen").show();
      Sound["Audio"+index].pause();
      Sound["Audio"+index].load();
      $(".bar-pro").css("width","0%");
      $(".bj").css("margin-left","0%");
      $("audio")[0].play();
}

//音波
function waveMove() {
    $(".wave-box").show();
      a_index1 = 1;
      wavetimer = setInterval(function(){
         if (a_index1 <= 3) {
          $(".wave").attr("src", "app/gcdxy/model/img/6-22-" + a_index1 + ".png");
          a_index1++;
         } else {
          a_index1 = 1;
         };
      }, 130);
  }

//时间转换
function transformTime(t){
      var minutes = Math.floor(t/60)-Math.floor(t/3600)*60;  
      var second = Math.floor(t)-Math.floor(t/60)*60; 
      minutes =minutes>9?minutes:"0"+minutes;
      second =second>9?second:"0"+second;
      var timeShow = minutes+":"+second;
      return timeShow;
}

//停止音频播放
function stopAudio(){
    for(var todo in Sound){
        Sound[todo].pause();
    }
    $("audio")[0].play();
}




//开始录音
function startRecord() {
  $("audio")[0].pause();
  onVoiceRecordEnd();
    wx.startRecord({
      success: function() {
      },
      cancel: function () {
        alert('用户拒绝授权录音');
    }
});
}
//试听
function playVoice(){
   $("audio")[0].pause();
    wx.playVoice({
        localId:_voice.localId, // 需要播放的音频的本地ID，由stopRecord接口获得
    });
    onVoicePlayEnd();
}

//试听播放完成
function onVoicePlayEnd(){
wx.onVoicePlayEnd({
    success: function (res) {
        $("audio")[0].play();
    }
});
}
//录音时间超过一分钟
function onVoiceRecordEnd(){
wx.onVoiceRecordEnd({
    // 录音时间超过一分钟没有停止的时候会执行 complete 回调
    complete: function (res) {
         _voice.localId = res.localId;
         uploadVoice();
         stopRecordFun1();
    }
});
}




//结束录音
function stopRecord() {
    wx.stopRecord({
        success: function (res) {
            _voice.localId = res.localId;
            uploadVoice();
        },
        fail: function(res) {
            alert("录音失败，请重新录音");
        }
    });
}

//上传音频
function uploadVoice(){
    wx.uploadVoice({
        localId:_voice.localId, // 需要上传的音频的本地ID，由stopRecord接口获得
        isShowProgressTips: 0, // 默认为1，显示进度提示
        success: function (res) {
           _voice.serverId = res.serverId; // 返回音频的服务器端ID
           //转化音频
            setTimeout("translateVoice()",1000);
       },
        fail: function(res) {
            alert("上传录音失败，请重新录音");
        }
   });

}
//暂停播放
function stopVoice(){
    wx.stopVoice({
        localId: _voice.localId // 需要暂停的音频的本地ID，由stopRecord接口获得
    });
}
//下载
function downloadVoice(){
   wx.downloadVoice({
            serverId: _voice.serverId, // 需要下载的音频的服务器端ID，由uploadVoice接口获得
            isShowProgressTips: 0, // 默认为1，显示进度提示
            success: function (res) {
                wx.playVoice({
                    localId: res.localId // 需要播放的音频的本地ID，由stopRecord接口获得
                });
            }
        });
}

//转化
function translateVoice(){
wx.translateVoice({
   localId: _voice.localId, // 需要识别的音频的本地Id，由录音相关接口获得
    isShowProgressTips: 0, // 默认为1，显示进度提示
    success: function (res) {
        // alert(res.translateResult); // 语音识别的结果
        var result = res.translateResult;
        var score = 20.11;
        if(result){
           score=discernKey(result);
        }else{
            score =(Math.random()*12.88+20.11).toFixed(2);
        }
        isFinish=true;
        isfail=false;
        totalScore= score;
        if(flag){
          
          Save();
          // $(".load").hide();
        }
    },
     fail: function(res) {
          isfail=true;
           isFinish=false;
            alert("未识别到录音!");
flag=false;
$(".load").hide();
        }
   
});
}


function discernKey(words){
  var keys=wordArr[cIndex-1];
  var rightNum = 0;
  for (var i in keys) {
    if(words.indexOf(keys[i]) !=-1){
        rightNum++;
      }
    }
    var ranscore=20.11;

  switch(rightNum){
    case 0:
         ranscore =(Math.random()*12.88+20.11).toFixed(2);
       
        break;
    case 1:
        ranscore =(Math.random()*12.88+33.11).toFixed(2);
        break;
    case 2:
        ranscore =(Math.random()*12.88+46.11).toFixed(2);
        break;
    case 3:
        ranscore =(Math.random()*12.88+59.11).toFixed(2);
        break;
    case 4:
        ranscore =(Math.random()*12.88+72.11).toFixed(2);
        break;
    case 5:
        ranscore =(Math.random()*14.88+85.11).toFixed(2);
        break;
    default:
         ranscore =(Math.random()*12.88+20.11).toFixed(2);
        break;
  }
   return ranscore;
  
}



function saveimg(){
     var width = window.innerWidth;
    var height =window.innerHeight;
    setTimeout(function () {
        html2canvas($(".page7"), {
            onrendered: function(canvas) {
               var picShow = document.getElementById('picShow');
               picShow.appendChild(canvas);
               var url = canvas.toDataURL();
               var img = document.createElement("img");
               img.src = url;
               picShow.appendChild(img);
               $(".picShow").show();
$(".load").hide();
           }
       })
    },1500)
}




function Save() {
  var score1 = parseInt(totalScore*100);

  $.post("/gcdxy/save", {
      "MediaID":_voice.serverId,
      "Url":path,
      "Score":score1
    },
    function(result) {
      if (result == "-1" || result == "") {
        alert("网络连接错误，点击重试！");
        Go("", "1");
      } else {
        
        var entity = JSON.parse(result);
        var UserID = entity.ID;
    //生成二维码
       $("#qrcodeTable").qrcode({
              render: "canvas",
              text: "http://weixin.yctu.edu.cn/gcdxy/u/?u=" + UserID+"&c="+cIndex+"&s="+totalScore,
			  correctLevel: 3, 
              width:"150",
              height:"150"
       });
        HeadimageFun();
        $(".lname").html(nameArr[cIndex-1]);
        $(".score").html(totalScore);
        shareFun(nameArr[cIndex-1],totalScore,cIndex,UserID);
        $(".page6").fadeOut(200);
        $(".page7").fadeIn(200);
        saveimg();
      }
    
  });
}





function shareFun(name,score,pindex,userid){
    Share("我跟随"+name+"一起朗读了《共产党宣言》，获得了"+score+"分，快来加入我们吧！", "http://weixin.yctu.edu.cn/gcdxy/u/?u="+userid+"&c="+pindex+"&s="+score, "http://weixin.yctu.edu.cn/app/gcdxy/model/img/icon.jpg", "一起来重温经典，朗读《共产党宣言》", "DianShiTai.G.180201");
}



function  HeadimageFun(){
      var canvas = document.getElementById('headcanvas');
      var ctx = canvas.getContext("2d");
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      var img = new Image();
      var pathurl= path;
      img.src =pathurl;
      img.onload = function () {
          var scale = 120 / img.width;
          ctx.save();
          ctx.arc((window.innerWidth-img.width * scale)*0.5 + img.width * scale / 2, window.innerHeight * 0.02 + img.height * scale / 2, img.width * scale / 2, 0, 2 * Math.PI);
          ctx.clip();
          ctx.drawImage(img, (window.innerWidth-img.width * scale)*0.5, window.innerHeight * 0.02, img.width * scale, img.height * scale);

      }
      
}


function GetList() {
  $.get("/gcdxy/list", {},
    function(result) {
      var entity = JSON.parse(result);
      var shtml="";
       $.each(entity, function(index, obj) {
                        var Name = obj.Name; //名称
                        var Ranking = index + 1;
                       var Score = obj.Score/100;
                       if(Name){
                         shtml += "<dl><dd>" + Ranking + "</dd><dd>" + Name + "</dd><dd>" + Score + "</dd></dl>";
                       }
                       
                    });
             $(".list_con").html(shtml);
                     loaded();
      })
  }

    
function loaded() {
        myScroll = new IScroll('#wrapper', { mouseWheel: true });
}
$(".page8,.page11")[0].addEventListener('touchmove', function(e) { e.preventDefault(); }, false);
