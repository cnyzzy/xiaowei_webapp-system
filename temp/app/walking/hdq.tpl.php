<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>健步走-活动区</title>
    <!-- Meta -->
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
     <!-- <link href='http://fonts.useso.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> -->
    <!-- Global CSS -->
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/prism/prism.css">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   
</head> 

<body data-spy="scroll">
    <!-- ******HEADER****** --> 


    <header id="header" class="header">  
        <div class="container">            
            <h1 class="logo pull-left">
                <a class="scrollto" href="#promo">
                    <span class="logo-title">健步走-活动区</span>
                </a>
            </h1><!--//logo-->              
            <nav id="main-nav" class="main-nav navbar-right" role="navigation">
              

            </nav><!--//main-nav-->
        </div>
    </header><!--//header-->
        
    <!-- ******PROMO****** -->
    <section id="promo" class="promo section offset-header">
        <div class="container text-center">
            <h2 class="title">排名:<br><span class="highlight">   
			<?php if($wei==1) { ?>未提交<?php } else { ?>
				第<?php if(empty($result2[0])) { ?>?<?php } else { ?><?php echo $result2[0];?><?php } ?>名</span>
				<?php if($row[8]==0) { ?>*<?php } ?><?php } ?>
				</h2>
            <p class="intro">当前排名来自于<br><?php echo $timee;?>排行榜</br>  
			<?php if($wei==1) { ?>您还未提交今天的步数，赶紧参与活动吧<?php } else { ?>
				您可以删除今天的步数而重新提交<?php } ?>
				</p>
            <div class="btns">
			<?php if($wei==1) { ?><a class="btn btn-cta-primary" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqup2"'>提交步数</a><?php } else { ?>
				<a class="btn btn-cta-primary" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqdel/<?php echo $number;?>">删除步数</a><?php } ?> 
                <a class="btn btn-cta-secondary" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqlist/<?php echo $timee?>">排行榜</a>
             <a class="btn btn-cta-primary" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqmy">个人记录</a>
			
				
            </div>
			<ul class="list-inline">
                   <?php if($row[8]==0) { ?><li>*未被审核，仅为参考排名</li><?php } ?> 
              
                </ul>
   <!--//meta-->
        </div><!--//container-->
        <div class="social-media">
            <div class="social-media-inner container text-center">
                <ul class="list-inline">
                     <li>当日排名在次日结束统计前均仅供参考</li><br>
                <li>您只能在当天22:00~次日22:00上传或修改一天的步数</li><br>
                <li>步数将在发放奖品前进行审核</li>
                </ul>
            </div>
        </div>
    </section><!--//promo-->
    
    <!-- ******ABOUT****** --> 
    <section id="about" class="about section">
        <div class="container">
            <h2 class="title text-center">活动介绍</h2>
            <p class="intro text-left">&nbsp;&nbsp;  &nbsp; &nbsp; 大家平时每天都会关注微信运动，查看自己走了多少步，也会看看是谁占领了你的封面，甚至还会为了在朋友圈夺冠而暗自努力。现在，一个更大的赛场等待您的参与，一次更激烈的较量等待您的出场！<br>
          &nbsp;&nbsp;  &nbsp; &nbsp; 在这里你不但能和全校的师生比拼步数，还能够占领全校的榜单并拿到丰厚的奖励哦。健走承载梦想，就让我们一起走向健康，走向幸福，走出好成绩，走出新天地！ </p>
           
        </div><!--//container-->

        <div class="container text-center">
            <h2 class="title">评奖规则</h2>
            <ul class="feature-list list-unstyled">
                <li><i class="fa fa-check"></i> 每日排行榜前三</li>
                <li><i class="fa fa-check"></i> 每周排行榜前列(微信推送)</li>
                <li><i class="fa fa-check"></i> 总排行榜前列</li>
                <li><i class="fa fa-check"></i> 每天超过1万步的参与者中随机抽取</li>
                <li><i class="fa fa-check"></i> 热心提出建议者</li>
            </ul>
        </div><!--//container-->
    </section><!--//features-->

    <!-- ******CONTACT****** --> 
    <section id="contact" class="contact section has-pattern">
        <div class="container">
            <div class="contact-inner">
                <h2 class="title  text-center">联系我们</h2>
                <p class="intro  text-center">非常感谢您参与这次活动 <br />如果期间有任何问题可以直接在<a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzAxMDU5NzAxMw==&scene=110#wechat_redirect">公众号</a>留言联系我们</p>
                <div class="author-message">                      
                    <div class="profile">
                       <a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzAxMDU5NzAxMw==&scene=110#wechat_redirect"> <img class="img-responsive" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/images/profile.png" alt="" /></A>
                    </div><!--//profile-->
                    <div class="speech-bubble">
                        <h3 class="sub-title">小薇工作室是什么?</h3>
                        <p>小薇工作室是盐城师院的校级新媒体组织，关注在校园大学生的生活动态及各二级学院的舆情、舆论，并制作相应的微博、微信及时进行推送。</a> 
                        <p>如果你有想法、有热情或者有任何新鲜事，请与我们联系。</p>
                        <p><strong>[Tip]:</strong> 投稿一旦录用即会发放稿酬哦</p> 
                    </div><!--//speech-bubble-->                        
                </div><!--//author-message--><!--//info-->
            </div><!--//contact-inner-->
        </div><!--//container-->
    </section><!--//contact-->  
      
    <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="container text-center">Copyright &copy; 2017.小薇工作室 All rights reserved.BY:ZY</div><!--//container-->
    </footer><!--//footer-->
     
    <!-- Javascript -->          
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/jquery-migrate-1.2.1.min.js"></script>    
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/jquery.easing.1.3.js"></script>   
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/bootstrap/js/bootstrap.min.js"></script>     
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script> 
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/plugins/prism/prism.js"></script>    
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/js/main.js"></script>  
	<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>


</html> 