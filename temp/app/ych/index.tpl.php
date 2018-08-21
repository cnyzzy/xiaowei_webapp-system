<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width,user-scalable=no" />          

    <title>盐城话四六级考试</title>
    <link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/style.css" />
    <link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/jquery.mmenu.all.css" rel="stylesheet" />
	<style type="text/css">
body{background:#DDD url("<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/abcd.jpg") top center no-repeat !important;}body .avatar .img-circle{background:#333 !important}body form .btn{background:#333 !important;border-color:#fff !important}#header h1,#header p{background-size:100% auto !important}
    </style>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/jquery.hammer.min.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/jquery.mmenu.min.all.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/wxm-core.js"></script> 
	    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script> 

</head>
<body id="test1" class="test1">
    <div id="content">
        <div id="header_bar">
        </div>
        <!-- E header_bar -->
			
        <div class="container">
            <div id="header" class="text-center">
                <div style="height: 20px;"></div>
				
				 <div class="container">
        <div class="text-center header">
            <h1 class="bold">
                 ★盐城话四六级考试★</h1>
            <p>
				
                <span style="padding:4px;">已有<font color="#FFCC00"><?php echo $arr1['times'];?></script></font>人参与测试</span>
            </div>
            <!-- E header -->
            <div id="bd" class="panel">
                <div id="panel1" class="panel-body">
                    <form action="#">
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            来盐师读大学不会点盐城话怎么行，快来看看自己的盐城话水平吧。英语四六级有难度，盐城话四六级还不是小意思</dd>
                    </dl>
                    <div class="buttons">
                        <a href="#result" class="btn btn-lg btn-success" style="width: 100%" onclick="return next(0);">
                            <strong style="color:#fdfd88;">开始测试</strong></a>
                    </div>
                    <div class="buttons" style="margin-top: 10px;">
                        <a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzAxMDU5NzAxMw==&from=timeline&isappinstalled=0#wechat_redirect" id="weixinfollowlink2" class="btn btn-lg btn-danger" style="width: 100%;
                            background: #0e6796; border-color: #000;">微信关注:盐城师范学院</strong></a>
                    </div>
                    </form>
                </div>
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl><dd>1.“訄(qiu)”的意思是</dd></dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            A.话多 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            B.逼迫 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="2" />
                            C.巧妙打开 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.以上都不对</li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            2.“神尼啊”是啥意思？</dd></dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            A.什么啊 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            B.我的天哪</li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            C.是你啊 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.谁啊 </li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            3.“下些(xia xie)”是什么意思</dd></dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            A.脱鞋 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            B.学习 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            C.瞎写 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.瞎了 </li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            4.“不要冲军”的“冲军”是什么意思？
                        </dd>
                    </dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            A.打瞌睡</li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="2" />
                            B.乱跑 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            C.跑得很快 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.走开 </li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            5.“亲妈妈”指的是什么？</dd></dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            A.正宗好妈妈，亲的 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            B.干妈 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            C.很惊讶 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.亲外婆 </li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            6.“盐碎”是什么意思
                        </dd>
                    </dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            A.香菜 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            B.碎盐块  </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            C.粗盐</li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.精盐 </li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            7.“尬去”是撒意思
                        </dd>
                    </dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            A.哪里去 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            B.没有这回事 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            C.回家 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.从家出发 </li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            8.“不要虎的了”是什么意思</dd></dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            A.不要冲动</li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            B.不要碰到 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            C.不要弄洒 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.不要看 </li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            9.“磕地头子”是身体什么部位？</dd></dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            A.头  </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="10" />
                            B.膝盖 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="8" />
                            C.手肘</li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.手指头</li>
                    </ul>
                    </form>
                </div>
                <!-- E panel-body -->
                <!-- E panel-body -->
                <div id="panel2" class="panel-body js_answer" style="display: none;">
                    <form action="#" method="POST">
                    <a name="result" href="javascript:void(0)"></a>
                    <div class="form-group avatar text-center">
                        <label for="" class="sr-only">
                            前言</label>
                        <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;
                            text-align: center; width: 100%; padding-top: 18px;">
                            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ks.jpg"></span> </a>
                    </div>
                    <dl>
                        <dd>
                            10.“来斯”是什么意思？</dd></dl>
                    <ul class="list-group  js_group">
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            A.会来事 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            B.性格好</li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="5" />
                            C.厉害 </li>
                        <li class="list-group-item" onclick="return toggle(this);">
                            <input name="g" type="radio" class="" value="0" />
                            D.会玩 </li>
                    </ul>
                    </form>
                </div>

                
            <div id="panel3" class="panel-body js_result" data-id="0" style="display: none;">
                <h1 class="bold text-danger">
                     我去？还没到10分？</h1>
                <hr>
                <dl>
                    <dt>详细分析:</dt>
                    <dd>
                        
                           <font color="#000"> 哇哦！能考出如此惊天地、泣鬼神的分数，可见本人是多么的不一般。你在盐城是要被摊成鸡蛋的。 </font>
                    </dd>
                </dl>
                <div class="buttons">
                    <a href="javascript:void(0)" class="btn btn-lg btn-success" style="width: 100%" onclick="$(&#39;#mcover&#39;).show()">
                        邀请小伙伴一起玩</a>
                </div>
            </div>
            <div id="panel3" class="panel-body js_result" data-id="1" style="display: none;">
                <h1 class="bold text-danger">
                     一般般，连五十分都没拿到</h1>
                <hr>
                <dl>
                    <dt>详细分析:</dt>
                    <dd>
                   
                            <font color="#000">一定不是本地人吧，不过您已获得盐城话金种子称号！</font>
                    </dd>
                </dl>
                <div class="buttons">
                    <a href="javascript:void(0)" class="btn btn-lg btn-success" style="width: 100%" onclick="$(&#39;#mcover&#39;).show()">
                        邀请小伙伴一起玩</a>
                </div>
            </div>
            <div id="panel3" class="panel-body js_result" data-id="2" style="display: none;">
                <h1 class="bold text-danger">
                       差一点点就60分了撒~</h1>
                <hr>
                <dl>
                    <dt>详细分析:</dt>
                    <dd>
                    
                              <font color="#000">你的盐城话已经相当不错了，虽然没有及格，不过没关系、抽个空泡个盐城妞/帅哥，相信你会拿走你该得的满分！</font>
                    </dd>
                </dl>
                <div class="buttons">
                    <a href="javascript:void(0)" class="btn btn-lg btn-success" style="width: 100%" onclick="$(&#39;#mcover&#39;).show()">
                        邀请小伙伴一起玩</a>
                </div>
            </div>
            <div id="panel3" class="panel-body js_result" data-id="3" style="display: none;">
                <h1 class="bold text-danger">
                     不错不错，70分</h1>
                <hr>
                <dl>
                    <dt>详细分析:</dt>
                    <dd>
                       
                              <font color="#000">您已获得盐城形象代言人特权！抽空去看看丹顶鹤，相信你的盐城口语会带有一股仙气哟~</font>
                    </dd>
                </dl>
                <div class="buttons">
                    <a href="javascript:void(0)" class="btn btn-lg btn-success" style="width: 100%" onclick="$(&#39;#mcover&#39;).show()">
                        邀请小伙伴一起玩</a>
                </div>
            </div>
            <div id="panel3" class="panel-body js_result" data-id="4" style="display: none;">
                <h1 class="bold text-danger">
                    80分，离成功已经很近！</h1>
                <hr>
                <dl>
                    <dt>详细分析:</dt>
                    <dd>
                     
                            <font color="#000"> 没有拿到满分也正常，谁让我们的测试那么难呢~努力练习盐城话，成为盐城的骄傲吧！</font>
                    </dd>
                </dl>
                <div class="buttons">
                    <a href="javascript:void(0)" class="btn btn-lg btn-success" style="width: 100%" onclick="$(&#39;#mcover&#39;).show()">
                        邀请小伙伴一起玩</a>
                </div>
            </div>
            <div id="panel3" class="panel-body js_result" data-id="5" style="display: none;">
                <h1 class="bold text-danger">
                      90分，正宗盐城人！</h1>
                <hr>
                <dl>
                    <dt>详细分析:</dt>
                    <dd>
                        
                            <font color="#000"> 噗~~竟然拿到了这么高的分数，看来你是有备而来！如此流利的盐城话，令人钦佩！</font>
                    </dd>
                </dl>
                <div class="buttons">
                    <a href="javascript:void(0)" class="btn btn-lg btn-success" style="width: 100%" onclick="$(&#39;#mcover&#39;).show()">
                        邀请小伙伴一起玩</a>
                </div>
            </div>
            <div id="panel3" class="panel-body js_result" data-id="6" style="display: none;">
                <h1 class="bold text-danger">
                    哇塞，满分！</h1>
                <hr>
                <dl>
                    <dt>详细分析:</dt>
                    <dd>
                       <font color="#000">
                            盐城话是你居家旅行，学习考试，发家致富，打情骂俏之必备利器！本次测试，你成功过关！</font>
                    </dd>
                </dl>
                <div class="buttons">
                    <a href="javascript:void(0)" class="btn btn-lg btn-success" style="width: 100%" onclick="$(&#39;#mcover&#39;).show()">
                        邀请小伙伴一起玩</a>
                </div>
            </div>
            <!-- E bd -->
        </div>
        <!-- E container -->
<input type="hidden" name="totalsc" id="totalsc" value="0"  />
<script type="text/javascript">
var total = 10;
var scoreArr = new Array(parseInt(total));
    scoreArr[0] = new Array(2);
    scoreArr[0][0] = 1;
    scoreArr[0][1] = 4;
    scoreArr[1] = new Array(2);
    scoreArr[1][0] = 5;
    scoreArr[1][1] = 30;
    scoreArr[2] = new Array(2);
    scoreArr[2][0] = 31;
    scoreArr[2][1] = 65;
    scoreArr[3] = new Array(2);
    scoreArr[3][0] = 66;
    scoreArr[3][1] = 80;
    scoreArr[4] = new Array(2);
    scoreArr[4][0] = 81;
    scoreArr[4][1] = 95;
    scoreArr[5] = new Array(2);
    scoreArr[5][0] = 96;
    scoreArr[5][1] = 100;
var tScore = 0;

var dataForWeixin={
    img:    "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ych.png",
    url:    "http://weixin.yctu.edu.cn/ych",
    title:  "我在盐城话四六级考试中得了 ",
    desc:   "盐城话四六级考试",
};
	if($("#totalsc").val()==0)
   {var title1=dataForWeixin.desc}else{var title1= dataForWeixin.title+"0分 你能超过我吗？"}
function next(t){
    $("div#bd > div.panel-body").hide();
    $("div.js_answer").eq(t).show();
    $("div.js_answer").eq(t).children("input").attr("checked","");       
    gotoTop();
}
function result(t){
    share_pop("open",10000);
    $("div#bd > div.panel-body").hide();
	var total = 5;
var scoreArr = new Array(parseInt(total));
    scoreArr[0] = new Array(2);
    scoreArr[0][0] = 1;
    scoreArr[0][1] = 4;
    scoreArr[1] = new Array(2);
    scoreArr[1][0] = 5;
    scoreArr[1][1] = 30;
    scoreArr[2] = new Array(2);
    scoreArr[2][0] = 31;
    scoreArr[2][1] = 65;
    scoreArr[3] = new Array(2);
    scoreArr[3][0] = 66;
    scoreArr[3][1] = 80;
    scoreArr[4] = new Array(2);
    scoreArr[4][0] = 81;
    scoreArr[4][1] = 95;
    scoreArr[5] = new Array(2);
    scoreArr[5][0] = 96;
    scoreArr[5][1] = 100;
    for(var i = 0; i < parseInt(total);i++){
        if(parseInt(t) >= parseInt(scoreArr[i][0]) && parseInt(t) <= parseInt(scoreArr[i][1])){
            $("div.js_result").eq(i).show();
			$("div.js_result").eq(i).find(".resultscore").eq(0).html($("#totalsc").val());
			gotoTop();
		}
        else
            continue;
    }

}
function toggle(t){

    $(t).children("input").attr("checked","checked");
    $("li.list-group-item").removeClass('active')
    var score = $(t).children("input:checked").val();
    tScore  = parseInt(tScore) + parseInt(score);
	$("#totalsc").val(tScore);

    $(t).addClass('active');
    var t = $("div.js_answer").index($(t).parents("div.js_answer")) + 1;
    if(t == total||t>total){
		if(tScore==0)
   {title1=dataForWeixin.desc}else{title1= dataForWeixin.title+tScore+" 分 你能超过我吗？"}
        result(tScore);
		wxwx(title1);
    }else{
        setTimeout(function(){next(t);},200);
    }
}

 function wxwx(title1){
  wx.onMenuShareTimeline({
    title: title1, // 分享标题
    link: dataForWeixin.url, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
    imgUrl: "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ych.png", // 分享图标
    success: function () { 
        // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});
wx.onMenuShareAppMessage({
    title: dataForWeixin.desc, // 分享标题
    desc: title1, // 分享描述
    link: dataForWeixin.url, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
    imgUrl: "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ych.png", // 分享图标
    type: '', // 
    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    success: function () { 
        // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});
wx.onMenuShareQQ({
    title: dataForWeixin.desc, // 分享标题
    desc: title1, // 分享描述
    link: dataForWeixin.url, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
    imgUrl:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ych.png", // 分享图标
    success: function () { 
       // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
       // 用户取消分享后执行的回调函数
    }
});
wx.onMenuShareQZone({
    title: dataForWeixin.desc, // 分享标题
    desc: title1, // 分享描述
    link: dataForWeixin.url, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
    imgUrl: "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ych.png", // 分享图标
    success: function () { 
       // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
       // 用户取消分享后执行的回调函数
    }
});
wx.onMenuShareWeibo({
    title: dataForWeixin.desc, // 分享标题
    desc: title1, // 分享描述
    link: dataForWeixin.url, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
    imgUrl: "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ych.png", // 分享图标
    success: function () { 
       // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
       // 用户取消分享后执行的回调函数
    }
});}
function gotoTop(){
    $("body,html").animate({scrollTop:($("#header").offset().top + $("#header").height())}, 1000);
}

  wx.config({
    appId: "<?php echo $signPackage['appId'];?>",
    timestamp: "<?php echo $signPackage['timestamp'];?>",
    nonceStr: "<?php echo $signPackage['nonceStr'];?>",
    signature: "<?php echo $signPackage['signature'];?>",
    jsApiList: [
      'onMenuShareTimeline',
	  'onMenuShareAppMessage',
'onMenuShareQQ',
'onMenuShareWeibo',
'onMenuShareQZone'
    ]
  });
  wx.ready(function () {
     
  
  });
  
</script>
</div>


<div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display: none;"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/guide.png"></div>


    <div id="pop_success" class="text-center" style="display: none;">
        <div class="bd text-center">
            <p style="line-height: 110px;">
                分享成功</p>
        </div>
        <!-- E bd -->
    </div>
    <!-- E pop_success -->

    <!-- E tip -->


    <script>
        $(function() {
            $("a#close1").click(function() {
                share_pop("close", 0);
            });

        });
        function shareSuccess() {
            share_pop("open", 0);
            $("div#pop_success").show().delay(1500).fadeOut("slow");
        }
        function share_pop(t, time) {
            if (t == "open") {
                setTimeout('showShare()', 15000);
            } else {
                $('#follow').hide();
            }
        }
        function showShare() {
            $('#follow').show();
        }
    </script>

    <div id="copy">
        <p class="text-center">
            &copy; <a target="_blank">By:ZY</a>
        </p>
    </div>
    <!-- E copy -->
    <div id="share_tips" class="sr-only">
        <div class="container text-right">
            点击右上角，分享给朋友/朋友圈 <i class="glyphicon glyphicon-hand-up element-animation"></i>
        </div>
        <!-- E container -->
    </div>
</body>
</html>