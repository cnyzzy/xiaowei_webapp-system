<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>盐师春秋</title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice.css"/>
			<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/Z60NEWS/model/css/aui.css"/>
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
        })(document, window);</script>
		<style>
	.titlebar.reverse {
    background-color: #df4d26;
    border-color: #000;
} 
.weui-msg {
    padding-top: 70px;
    text-align: center;
}
.weui-media-box_appmsg .weui-media-box__hd {
    margin-right: .8em;
    width: 120px;
    height: 100px;
    line-height: 180px;
    text-align: center;
}
.aui-middle-dome {
    position: relative;
    -webkit-transition: all 1s ease-in-out;
    margin: 0px 15px;
}
.aui-middle-dome-a {
    display: block;
    position: relative;
    font-size: 0px;
    text-decoration: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
    -webkit-touch-callout: none;
    padding: 10px 0px;
}
.aui-title-h3 {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    line-height: 22px;
    margin-right: 15px;
    font-size: 16px;
    font-weight: normal;
    color: #222;
    max-height: 100%;
    text-align: left;
    margin-bottom: 0;
    margin-top: 0;
}
.aui-title-img {
    width: 100%;
    padding-top: 10px;
    position: relative;
}
.aui-title-img img {
    width: 100%;
    height: 100%;
    display: block;
    border: none;
}

img {
    max-width: 100%;
    display: block;
}
.aui-title-vio {
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALQAAAC0CAYAAAA9zQYyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Rjk4RjY5ODBBNUEzMTFFNzgzMDJEM0RCNUMwMzYyNUYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Rjk4RjY5ODFBNUEzMTFFNzgzMDJEM0RCNUMwMzYyNUYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpCQjYwNkFGNUE1QTMxMUU3ODMwMkQzREI1QzAzNjI1RiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCQjYwNkFGNkE1QTMxMUU3ODMwMkQzREI1QzAzNjI1RiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PsRw2YEAAA55SURBVHja7J0LsFVVGce/e7yCCIjIQ0TwESimPMQRUytLKQMtRRnLpMdMY9pD0zRN7WVTZFpqjlaQ9NImU6eUUAtLHR+AIaaCmgw+QF4pisgbQU7fn7X2dDye91l777X2/v9m/sHQ9Z691/rfdb/1+r6OYrEoxCn9VburCg187XrVatVGNpsbOmjopuiuGqzqo+pd4c+eLX7fLdbYkd5QvW71iupVNj0N3S57qoaq9rMmHtSGYdvlLdUK1TLVEtUi1UvsIhq6Fv1Uo1UHWSP38vx5YfIXVc+pFqieZxfS0AerDlWNUA0M/F02qOarHlc9ZQ1PQ+cAhA9Hq46ycW8W2WKNPUv1jKpIQ2eL3VQftEYelLMf4DdVs1UP2Tichg6YI62RhzO63MFi1RzVI2KWDGnoAMBKxFjVcQFM7NKcUGLU/rtqJQ3t7yrFJ1Qfol+bAhPI6aoXaGg/wMRugg0tdqI/WwZLf7eLWeemoVOgm2qi6qP0olPmqW5RvUZDJ/TMqmNUp0l6O3dZZ5vqbtUM1VYaOj72VX1BzHY0iR+M0n8Us6ZNQztkFzsij7UjNEk+vp6mWkNDt8/7VGeIOZJJ0gO7j3eoZqq209CtTfrOFnNgiPjDYtUNqlU0dOMMU31VuDHiK5tVN4vZcaSh63C6ajw9EwRzVTeKRyf7fDI0QoyviTnSScIBlw6uFU/WrX0x9ADVRaq+9EeQ4Cz2daqFNLQ5YP9lMUtzJGx+p3ogz4YeZ2Nmri1nh3vFbMYU82RoXPE/S8ytEZI9sBFzvZi168wbulN1ISd/medl1RWScM6RpA29s538DWN/54Llqh9JgrdjkjQ0Jn0Xq4awn3PFSmvqtVkydFfVZcJTcnkF2Z8mi7mwG7yhYeZvcmSmqVU/UK0L2dA0MykPPybHaeo4DY215Us5ASRlLFV9X2K6CVOI8cHPpJlJBZC56hyJaTMtLkOfrPoA+45UAccdPheKoQ9Xnco+I3U4zsprQyN7/RfZV6RBPmNDEC8NjS3trwtPzZHGQWKg88WchffO0J+X8HMsk+TBGfizfTM04uZj2DekRXAReqwvht6DcTNxwKfF3FxK1dBYSzyHcTNxAE5inittJtxs19AnCLe1iTtQXWFCWoZGMM/1ZuKaE9sJPdoxNOLmTrY/cQxCjjOTNjRqlxzEticxcYC0uGrWiqG7iNnhISROkA1glyQMjYNHTDRO4qZ7K3O0Zg2NNWfmnSNJgXIj/eM09CRhYR6SHAXruVgMvZ+YLW5CkgRnp4fFYehJbFuS4gTRqaFHqA5ku5KUeI9qlEtDf4ptSlLmNFeGRg66wWxPkjKDpYF8iI0Ymst0xBfGtWvoATZ+JsQHRqr2asfQGJ2ZjJz4Arx4fM0vqJE5CfvoSFrdJYAXRWopFK3ZkvEO3VXVW/J99AB9fG61vq51/PNoz82MhNqo5/GYxJwA0ENQVRfVD3AiLW8Xk5EvEac9H2x2hP6h+Lm6gSyWt6nm8TfwDtC5WFbdI0fv/JLq8mZG6P09NfNs1W8kpkR/gfKomJomSAUwKifvHPlzaaOTwiM9fImHVVNp5oqgTuA1qqdz9ptJGjX0GM8eHj+J0+jbuvxC9UZO3nVMoyEHbnH38ezhp9KrDY/UN6nOi/lzUIdwSdm/JZ05a0/VPnZxoKahj/Cskx6qFCuRqvxbtUjMvTzXrBazlPtihf9vUwrveni5oSuFHKM96yCuZjTPYzF8z2dU365iZpDGBtzoejF0fzuU+8RT9GfTzHf8/e5QXWVDmmqkUZIYIUevWob2bdlnFb3ZEijO87ajmBw1Bu9s4GvTOiIxMiRDr6c3W6bd1Q6EFqgtudDz9xxZbVIIc/uWPIZrzq3TTo3tmapbHY3ycXNwNUNj92Vn+iDXbFZNUT0R0DP3EHOkdGW5oVmCLd+sUF0t5tRiaBwYGbpQ9o8kn8xRfTdQM7/Du52eG7pIr7XM9ga/Doe9Hgy8r4aUGxpred3pgR1HMGGENRl4l3rLaBiNr5OynbZA2cvO/7ZGIcfgQDvFNf1UV4qpTLBThg2NjZdvOTZz2lf1BpbG0ExT8H9w9QwH5ier3puxd8My3K128rc5Y+82qNTQe3v6kMUUPw+/xi4RUxQpxNsglWJoHPK6J6Pznb1LDT3A007p8ODzcO72x6qPS1glOAoZ76ty9ix96X6MNGqCi5lIRXVFBsOQrNA3MjR+snZnezREfxuGnCv5upQaAv0iQw9gWzQNDpZjNeQkYSUwX8Cy884Fz0eaosefh5wlE20Y4mO6tO0Z76uKozQM7XMWno4APg9hyDfE3OPzaXDI26QQ9OwUVrRyxWGq4aq7VXeptrFJEqdHgYZ2CsKQU2x8PZzNkfwIXRC/z3AUA/08LCFdpLpA0lsSzWMM3aMzhVgrazF0LXCl7WAbhsxIOAzJYwy9I+TgNad4wSmwCWJ2G0ezOeI3NCcvyYDQ43wxKyJ92RwcobPCCDtpnCi8w+ma7jD0W5wUJv55mLugtMJITgqd0rXT85CjI6OfN0t1i8RbeSCPk8LtMHQIuReywnIxd/ieZ1PEwtZOxtCJgNshSKc1M4VQIHeG9jnkyEIMjUygf5DkL97mMYbeYehNHhs65Bj6VRte/CeltstjDL0JhmZCRLdg1Qi7gvcI1/iTZj0MvYHt4IwFdlRezaZIhXUcod3wmo2Tn2BTpD9Cv8lJYVuf91errWy71Fkb3YfDDNzHi7I+TwqfteGFr1UGOjL+eZV4PTL0KuHN70ZBZnyUNZvLpvCOVZ0lMeABbI+aYEf1XjEbJJvZHN6xLZoURoYm1Vlkw4sVbApv+S/+JzL0ck4KK37eWtWfxBwmCo1KO4VdMjwp3DHYRLtJyzixecfnoXPuU10cqJlL+7aUgfadumegr8pZWm5o7moZFoupmIqa2Zsy+H6HiEkVPDRj77Wk1NBFT+PDYgqN8j2Pf2O1G3JE9FZ9R3VihkKOJeW/lhZzcM7d6sUnxaRaCL0cCTYH15Qb+gXG0Jmi0dN2o2wIsn/AffV8pZfmLYr8EoUg4wN9/oqGXp7RSRBpDBRJOl11oapbYM++qJKhix6GHaxTmHzbjWwxBCn6ZmjwrGed0oO+bJl2knD2sSHI8QHE0M/UmjjM96xTeGCqdXo5CEEmicn25HMIMr+WobHbss6jh8VyEtNmNc9+4q5w6GgbguwToqGBb7cujqA/m2aM4++HEAQbTh/x7D2x9ryinqEf9+yhjxOuRzcDDpwdG9P3/ayYQqS7ePKuj1Z6yHKeFHNx1pfdI2TtPEb1IL3aEONj7juM/kPEpGkoZWAK7zq7EUODuTH9lLcKtmifkuSTtYQGyjmflMDn7CHpF0jCLasl5f9YbXt0jmcd1cPOtrvSszXbCJsiXXLyvg9V+sdqhl7o4WiIhf7L7ShE3skQuxKRlxLXxWohaEexWHWDB9WcJnj4Mji3jcP304VJcrD6cKrq/TmbOGMD8MpmDY2f9p96/mLz7MRgpZh7kW9lvCO7WRMPtiYekdMf5KmVJoT1DA0uUw3jb3TiEVtUX5EqN6zqnZm9n+1HPJwMVr0uWM/Q/xKmOCD+gNwoM2p9QT1DIx65i+1IPAFx85vtGDoa4texLUnKFOuNzo0a+m2O0sQDEP6+4sLQ4D6O0iTl0Xl6I1/YqKGR+/hvbFeSEii8tMKloQEyb25k25IURuc7Gv3iZgy9tZlvTIgjZkkTWb2aLf31j0YCc0IcgaMMtzTzHzRraAz/N7GdSUJgIrg+TkODp8UctickTnCAv+nl4larjd4sTL9L4mVaK/9RoY2fnjvZ5iQmcPn1uSQNDVD6dyXbnjhmYzvztHYMjS3xX7P9iWNQ02ZDGoYGi4TnPIg7sNjQVrqKgoOH+LMw+z9pHxwLndLuN3FhaNTyuEH8q3VNwgH7Gz8XB0crCo4eCKsev2K/kBbBkYqFLr5RweFDzWU8TVoAyUGnu/pmBccPd7v4l2Oa+MvLNtQQXw0t9gGXs69IHVB2+lrXc684DI1afz+ROpcZSa5Bbg1kPlrt+hsXYnrgN1RX2QcnpBSsiv1MYqrWW4jxwZe5jo9IJvitxFicql4qMBccpfoS+5EofxGHKxpJj9ARyDV9G/sy99wft5mTGqEjzlB9jP2aSzCoTUnig5I0NEC5hIns39yNzL9P6sOSNnQUU5+VULhD0gPGulUSzueShqHBcNV5kp96IHkEB9YeS/pD0zI0QGXSS1W7su8zBfYerpEWr1CFbGiAAkCXCGt6ZwWkHMAO4MtpPUDahgaod3eBmLohJFxwhPhqSfmeqQ+GBigAOklMGWQSHjg6fKN4ULTJF0NHHKY6W/ypJU3qx8vI0fKwLw/km6FBXzFVjobQL16DssTX21BDaOjaYI0amzAnC9erfQOGuVvMuYy3fXs4Xw0dMVTMwaZ+9JEXoFz2LyWlJbksGBp0sRPGD9NPqfKIjZc3+/yQIRg6AmWAsWW+G72VKKitg1LEC0J42JAMDVDr+gQxp/a60muxgiU4lCHBTf5NoTx0aIaO6GUnjAhDdqL3nIKJHtJxIVfG2tAePlRDR2CyeIrqaLwLvdgWMMJsa+RVob5E6IaOwJkQnLM+nMZuycg4FYdluODTI2fF0KXGHmdHbB5NrR8jo8LUTMlQnu+sGTqip+pY1VjhSb5ysJb8TzE3STZk7eWyaugITBjHqI4XbqUjlzfK8s0TD3f4aOjm2ceO2oiz87KWvcYa+AGJKbELDe0H+6sOVY2yf88SL4jJhP+kmANEuSKvhi6lV4m5D5Hwjq5i02OBNTG0Ls+dSUO/O+beV3WA6kD7Zy/PnnG1jYcj4brTdnYdDd0ovVV7qwbZP6O/x731jpF3qZjC7cus8HdmdaWhY6FPicExydzVhivdSv6M/t7T/jdYJttozYo/N9u/R8IkbrnVGjZx8/xPgAEAz/A8WV7L/AoAAAAASUVORK5CYII=');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 50px;
}

</style>
    </head>
    <body ontouchstart>
        <header>
            <div class="titlebar reverse">
			 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1><?php if($NoticeW==5) { ?>盐师视频<?php } ?><?php if($NoticeW!=5) { ?>盐师视频<?php } ?></h1>
            </div>

         
        </header>
	 <?php if(isset($NoticeArray1)) { ?>	 
		    <div class="weui-panel">
        <div class="weui-panel__hd">内容</div>

		  <?php foreach((array)$NoticeArray1 as $key=>$loopChild) {?>
		      
				 
		<?php $d=json_decode($loopChild['dcontent'],true);?>
<?php $loopChild['dcontent2']=$d['dcontent'];?>
<?php $loopChild['smallimg']=$d['smallimg'];?>
   <div class="weui-panel__bd"> 
		<a style="color:#000" class="weui_cell" href="/<?php echo $AppName;?>/videoD/<?php echo $loopChild['id'];?>">
          <div class="weui-media-box weui-media-box_text">
            <h4 class="aui-title-h3"><?php echo $loopChild['title'];?><?php if($loopChild['istop']==1) { ?><font color="red">[置顶]</font><?php } ?></h4>
				<div class="aui-title-img"><img src="<?php echo $loopChild['smallimg'];?>" alt=""><span class="aui-title-vio"></span></div>
								<div class="aui-title-text clearfix">
            <ul class="weui-media-box__info">
    
              <li class="weui-media-box__info__meta weui-media-box__info__meta_extra"><?php echo $loopChild['editor'];?></li>
            </ul>
          </div>
        </div></a>

</div>
      

              <?php }?>
           		  <?php } else { ?>
			   <div class="weui-msg">
      <div class="weui-msg__icon-area"><i class="weui-icon-info weui-icon_msg"></i></div>
      <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">空空如也</h2>
        <p class="weui-msg__desc">暂时还没有内容哦 请去别处看看</p>
      </div> </div>
             <?php } ?></div>
		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
       <?php include template('footer'); ?>