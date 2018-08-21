/*
* @Author: Administrator
* @Date:   2017-12-13 15:45:28
* @Last Modified by:   Administrator
* @Last Modified time: 2018-02-09 16:57:15
*/
var imgList =['/app/gcdxy/model/img/6.jpg','/app/gcdxy/model/img/info/n1.png','/app/gcdxy/model/img/info/n2.png','/app/gcdxy/model/img/info/n3.png','/app/gcdxy/model/img/info/n4.png','/app/gcdxy/model/img/info/n5.png','/app/gcdxy/model/img/info/n6.png','/app/gcdxy/model/img/info/n7.png','/app/gcdxy/model/img/info/n8.png','/app/gcdxy/model/img/info/n9.png','/app/gcdxy/model/img/info/n10.png','/app/gcdxy/model/img/photo/p1.png','/app/gcdxy/model/img/photo/p2.png','/app/gcdxy/model/img/photo/p3.png','/app/gcdxy/model/img/photo/p4.png','/app/gcdxy/model/img/photo/p5.png','/app/gcdxy/model/img/photo/p6.png','/app/gcdxy/model/img/photo/p7.png','/app/gcdxy/model/img/photo/p8.png','/app/gcdxy/model/img/photo/p9.png','/app/gcdxy/model/img/photo/p10.png','/app/gcdxy/model/img/btn-2.png','/app/gcdxy/model/img/btn-3.png','/app/gcdxy/model/img/btn-4.png','/app/gcdxy/model/img/circle.png','/app/gcdxy/model/img/btn-1.png','/app/gcdxy/model/img/btn-2.png','/app/gcdxy/model/img/btn-3.png','/app/gcdxy/model/img/btn-4.png','/app/gcdxy/model/img/btn-5.png','/app/gcdxy/model/img/btn-6.png','/app/gcdxy/model/img/btn-7.png','/app/gcdxy/model/img/btn-8.png','/app/gcdxy/model/img/btn-9.png','/app/gcdxy/model/img/btn-10.png','/app/gcdxy/model/img/btn-11.png','/app/gcdxy/model/img/btn-11.png','/app/gcdxy/model/img/btn-13.png','/app/gcdxy/model/img/btn-14.png','/app/gcdxy/model/img/btn-15.png','/app/gcdxy/model/img/btn-16.png','/app/gcdxy/model/img/btn-17.png','/app/gcdxy/model/img/btn-18.png'];

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
        },1500)
        
    }
});

loader.start();
var nameArr=["戴斌荣","方忠","黄志纯","刘必清","孟国栋","郁霞秋","徐川","汪玲"];
var voids="";
isMp3=false;
var locationVoice="";
var wavetimer =null; 
$(function () {
    LoadingShare();
    GetAudio();
    var num =parseInt(GetQueryString("c")) ;
    var score =GetQueryString("s");
    $(".lname").html(nameArr[num-1]);
    $(".score").html(score);
    //聆听
    $(".btn-listen1").on("click",function(){
        waveMove();
        $(".btn-stop1").show();
        $("audio")[0].pause();
        if(!isMp3){
           downloadVoice(voids); 
           onVoicePlayEnd();
       }else{
          $("#audio1")[0].play();
          $("#audio1")[0].onended = function() {
            audioEnd();
        };
       }
        
    });
    $(".btn-stop1").on("click",function(){
        clearInterval(wavetimer);
         $(".wave-box,.btn-stop1").hide();
        $(".btn-listen1").show();
         $("audio")[0].play();
        if(!isMp3){
           stopVoice();
       }else{
          $("#audio1")[0].pause();
       }
        
    });
    //我要参与
    $(".btn-join1").on("click",function(){
        window.location.href="http://weixin.yctu.edu.cn/gcdxy";
    });



    PlusNums("DianShiTai.G.180201");
    Share("书记领读  品味真理的味道", "http://weixin.yctu.edu.cn/gcdxy", "http://weixin.yctu.edu.cn/app/gcdxy/model/img/icon.jpg", "一起来重温经典，朗读《共产党宣言》", "DianShiTai.G.180201");


});

$('body').on('touchmove', function(e) {
    e.preventDefault();
});
function LoadingShare() {

}
function downloadVoice(voids){
	    wx.downloadVoice({
            serverId: voids, // 需要下载的音频的服务器端ID，由uploadVoice接口获得
            isShowProgressTips: 1, // 默认为1，显示进度提示
            success: function (res) {
            	console.log(res.localId);
                locationVoice=res.localId;
                wx.playVoice({
                    localId: res.localId // 需要播放的音频的本地ID，由stopRecord接口获得
                    // console.log(res.localId);
                });
            }
        });
}

function stopVoice(){
    wx.stopVoice({
        localId: locationVoice // 需要暂停的音频的本地ID，由stopRecord接口获得
    });
}
function onVoicePlayEnd(){
    wx.onVoicePlayEnd({
    success: function (res) {
        var localId = res.localId; // 返回音频的本地ID
        audioEnd();
    }
})
}


function audioEnd(){
    clearInterval(wavetimer);
         $(".wave-box").hide();
         $(".btn-stop1").hide();
         $(".btn-listen1").show();
         $("audio")[0].play(); 
}







function GetAudio() {
    $.get("/gcdxy/geta", {
            "u": GetQueryString("u")
        },
        function(result) {
     if (result == "-1" || result == "") {
	 alert("网络连接错误，点击重试！");}else{
            var entity = JSON.parse(result);
          
            var path =entity.Code;
            $(".headimg").attr("src",path);
            if (entity.State == 1) {
                isMp3=false;
                voids=entity.WxAudio//需要上传到微信端获取声音
 $.ajax({  
          type:"GET", 
		url:"/gcdxy/getmp3",
		 async:true, 
		 timeout : 10000,
		 data:"&u="+GetQueryString("u"),
		
        success:function(result){ 


	}, 
         error:function (result) {   

         }, 
  });
            }else{
                isMp3=true;
                 //本地音频 在文件audioMp3 下
                var audio1 = new Audio();
                audio1.setAttribute("id","audio1");
                audio1.controls = false ;
                audio1.src = 'http://weixin.yctu.edu.cn/system/data/app/gcdxy/mp3/'+entity.AudioMp3;  
                $("body").append(audio1);  
            }
	 }
        
    })
}

function waveMove() {
    $(".wave-box").show();
      a_index1 = 1;
      wavetimer = setInterval(function(){
         if (a_index1 <= 3) {
          $(".wave").attr("src", "/app/gcdxy/model/img/6-22-" + a_index1 + ".png");
          a_index1++;
         } else {
          a_index1 = 1;
         };
      }, 130);
  }



