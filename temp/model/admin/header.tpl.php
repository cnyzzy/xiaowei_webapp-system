<?php defined('ZRoot') or die('Access Denied.'); ?>
    <header class="am-topbar am-topbar-inverse admin-header">
        <div class="am-topbar-brand">
            <a href="javascript:;" class="tpl-logo">
                <img src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/img/logo.png" alt="">
            </a>
        </div>
        <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

        </div>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                        <span class="am-icon-bell-o"></span> 提醒 <span class="am-badge tpl-badge-success am-round">1</span></span>
                    </a>
                    <ul class="am-dropdown-content tpl-dropdown-content">
                        <li class="tpl-dropdown-content-external">
                            <h3>你有 <span class="tpl-color-success">1</span> 条提醒</h3><a href="###">全部</a></li>
                        <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl"><span class="am-icon-btn am-icon-plus tpl-dropdown-ico-btn-size tpl-badge-success"></span> 概况部分尚未开发</a>
                            <span class="tpl-dropdown-list-fr">很久前</span>
                        </li>
                        
                    </ul>
                </li>
                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                        <span class="am-icon-comment-o"></span> 消息 <span class="am-badge tpl-badge-danger am-round">1</span></span>
                    </a>
                    <ul class="am-dropdown-content tpl-dropdown-content">
                        <li class="tpl-dropdown-content-external">
                            <h3>你有 <span class="tpl-color-danger">1</span> 条新消息</h3><a href="###">全部</a></li>
                        <li>
                            <a href="#" class="tpl-dropdown-content-message">
                                <span class="tpl-dropdown-content-photo">
                      <img src="<?php echo $arrInfo['url'];?>/zy.jpg" alt=""> </span>
                                <span class="tpl-dropdown-content-subject">
                      <span class="tpl-dropdown-content-from"> ZY </span>
                                <span class="tpl-dropdown-content-time">很久前 </span>
                                </span>
                                <span class="tpl-dropdown-content-font"> 欢迎使用，发现BUG请及时提交。 </span>
                            </a>
                          
                        </li>

                    </ul>
                </li>
                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                        <span class="am-icon-calendar"></span> 进度 <span class="am-badge tpl-badge-primary am-round">2</span></span>
                    </a>
                    <ul class="am-dropdown-content tpl-dropdown-content">
                        <li class="tpl-dropdown-content-external">
                            <h3>你有 <span class="tpl-color-primary">2</span> 个任务进度</h3><a href="###">全部</a></li>
                        <li>
                            <a href="javascript:;" class="tpl-dropdown-content-progress">
                                <span class="task">
                        <span class="desc">首次使用本系统 </span>
                                <span class="percent">100%</span>
                                </span>
                                <span class="progress">
                        <div class="am-progress tpl-progress am-progress-striped"><div class="am-progress-bar am-progress-bar-success" style="width:100%"></div></div>
                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="tpl-dropdown-content-progress">
                                <span class="task">
                        <span class="desc">学会使用 </span>
                                <span class="percent">30%</span>
                                </span>
                                <span class="progress">
                       <div class="am-progress tpl-progress am-progress-striped"><div class="am-progress-bar am-progress-bar-secondary" style="width:30%"></div></div>
                    </span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                        <span class="tpl-header-list-user-nick"><?php echo $_SESSION['admin']['name'];?></span><span class="tpl-header-list-user-ico"> <img src="<?php echo $_SESSION['admin']['img'];?>"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="<?php echo $arrInfo['url'];?>/admin/self"><span class="am-icon-cog"></span> 设置</a></li>
                        <li><a href="<?php echo $arrInfo['url'];?>/admin/login/exit"><span class="am-icon-power-off"></span> 退出</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $arrInfo['url'];?>/admin/login/exit" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
            </ul>
        </div>
    </header>







    <div class="tpl-page-container tpl-page-header-fixed">


        <div class="tpl-left-nav tpl-left-nav-hover">
            <div class="tpl-left-nav-title">
                管理项目
            </div>
            <div class="tpl-left-nav-list">
                <ul class="tpl-left-nav-menu">
                    <li class="tpl-left-nav-item">
                        <a href="<?php echo $arrInfo['url'];?>/admin" class="nav-link<?php if($Action=='index') { ?> active<?php } ?>">
                            <i class="am-icon-home"></i>
                            <span>首页</span>
                        </a>
                    </li>
          <?php if($_SESSION['admin']['rightint']>8) { ?>          <li class="tpl-left-nav-item">
                        <a href="<?php echo $arrInfo['url'];?>/admin/chart" class="nav-link tpl-left-nav-link-list<?php if($Action=='chart') { ?> active<?php } ?>">
                            <i class="am-icon-bar-chart"></i>
                            <span>概况统计</span>
                            <i class="tpl-left-nav-content tpl-badge-danger">
               0
             </i>
                        </a>
                    </li><?php } ?>
				  <?php if($_SESSION['admin']['rightint']==4||$_SESSION['admin']['rightint']>6) { ?>    	            <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-weixin"></i>
                            <span>微信管理</span>
 <?php if($Action=='wxapi'||$Action=='wxre'||$Action=='wxpush'||$Action=='wxpushy'||$Action=='wxaapi') { ?>  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu" style="display: block;"><?php } else { ?>
						     <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu"><?php } ?>
                            <li>  
								<a href="<?php echo $arrInfo['url'];?>/admin/wxre"<?php if($Action=='wxre') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>自动回复</span>
                                  
                                </a>
                               <a href="<?php echo $arrInfo['url'];?>/admin/wxpush"<?php if($Action=='wxpush'||$Action=='wxpushy  ') { ?> class="active"<?php } ?>> 
                                    <i class="am-icon-angle-right"></i>
                                    <span>推送汇总</span>
									  <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>          <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-wpforms"></i>
                            <span>绑定管理</span>
                          <?php if($Action=='mwxid'||$Action=='minfo'||$Action=='mwxidd'||$Action=='mwxxid'||$Action=='mwxxidd'||$Action=='minfod'||$Action=='mwxidh'||$Action=='mqqidd'||$Action=='mqqid'||$Action=='mqqidh'||$Action=='mwxxidh') { ?>  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu" style="display: block;"><?php } else { ?>
						     <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu"><?php } ?>
                            <li>
							 
                       
                                <a href="<?php echo $arrInfo['url'];?>/admin/mwxid"<?php if($Action=='mwxid'||$Action=='mwxidd') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>微信管理</span>
									<?php if($HWxidNum) { ?><i class="tpl-left-nav-content tpl-badge-success"><?php echo $HWxidNum;?></i><?php } ?>
                                    <i class="tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
								 <a href="<?php echo $arrInfo['url'];?>/admin/mwxidh"<?php if($Action=='mwxidh') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>微信回收站</span>
									<?php if($HWxidNumH) { ?><i class="tpl-left-nav-content tpl-badge-primary"><?php echo $HWxidNumH;?></i><?php } ?>
                                </a>
								<a href="<?php echo $arrInfo['url'];?>/admin/mwxxid"<?php if($Action=='mwxxid'||$Action=='mwxxidd') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>微信小程序管理</span>
									<?php if($HWxxidNum) { ?><i class="tpl-left-nav-content tpl-badge-success"><?php echo $HWxxidNum;?></i><?php } ?>
                                    <i class="tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
								 <a href="<?php echo $arrInfo['url'];?>/admin/mwxxidh"<?php if($Action=='mwxxidh') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>微信小程序回收站</span>
									<?php if($HWxxidNumH) { ?><i class="tpl-left-nav-content tpl-badge-primary"><?php echo $HWxxidNumH;?></i><?php } ?>
                                </a>
								    <a href="<?php echo $arrInfo['url'];?>/admin/mqqid"<?php if($Action=='mqqid'||$Action=='mqqidd') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>QQ智慧平台管理</span>
									<?php if($HWxidNum) { ?><i class="tpl-left-nav-content tpl-badge-success"><?php echo $HQqidNum;?></i><?php } ?>
                                    <i class="tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
								 <a href="<?php echo $arrInfo['url'];?>/admin/mqqidh"<?php if($Action=='mqqidh') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>QQ回收站</span>
									<?php if($HWxidNumH) { ?><i class="tpl-left-nav-content tpl-badge-primary"><?php echo $HQqidNumH;?></i><?php } ?>
                                </a>
								
								
									<a href="<?php echo $arrInfo['url'];?>/admin/minfo"<?php if($Action=='minfo'||$Action=='minfod') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>教务资料管理</span>
									<?php if($HJwNum) { ?><i class="tpl-left-nav-content tpl-badge-success"><?php echo $HJwNum;?></i><?php } ?> <i class="tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
                               
                            </li>
                        </ul>
                    </li><?php } ?> <?php if($_SESSION['admin']['rightint']>4) { ?>
                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-cubes"></i>
                            <span>APP</span>
 <?php if(@$isapp=='1') { ?>  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu" style="display: block;"><?php } else { ?>
						     <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu"><?php } ?>
                            <li>
                                
								<?php if(isset($HAppNavList)) { ?>
 <?php foreach((array)$HAppNavList as $key=>$loopChild) {?>
      <?php if($_SESSION['admin']['rightint']>6||($_SESSION['admin']['rightint']>4&&(strtolower(substr($key, 0, strlen($_SESSION['admin']['rightapp']))) ===strtolower($_SESSION['admin']['rightapp'])))) { ?>  <a <?php if($Action==$key) { ?> class="active"<?php } ?> href="<?php echo $arrInfo['url'];?>/admin/<?php echo $key;?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span><?php echo $loopChild;?></span>
									 <?php if($key=="home") { ?><i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i><?php } ?>  <?php } ?>   
</a> <?php }?><?php } ?>
                            </li>
                        </ul>
                    </li><?php } ?>
              <?php if($_SESSION['admin']['rightint']==4||$_SESSION['admin']['rightint']>5) { ?>           <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-cog"></i>
                            <span>系统管理</span>
 <?php if($Action=='base'||$Action=='appset'||$Action=='user'||$Action=='log'||$Action=='userd'||$Action=='usera') { ?>  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu" style="display: block;"><?php } else { ?>
						     <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu"><?php } ?>
                            <li>
                             <?php if($_SESSION['admin']['rightint']>6) { ?>      <a href="<?php echo $arrInfo['url'];?>/admin/base"<?php if($Action=='base') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>基本设置</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a><?php } ?>
								
								<?php if($_SESSION['admin']['rightint']>6) { ?>    
                                <a href="<?php echo $arrInfo['url'];?>/admin/wxapi"<?php if($Action=='wxapi') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>公众号API</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
								  <a href="<?php echo $arrInfo['url'];?>/admin/wxaapi"<?php if($Action=='wxaapi') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>小程序API</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
								<a href="<?php echo $arrInfo['url'];?>/admin/qquniapi"<?php if($Action=='wxaapi') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>QQ智慧平台API</span>
                                    <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                                </a>
								<?php } ?>

                              <?php if($_SESSION['admin']['rightint']>5) { ?>   <a href="<?php echo $arrInfo['url'];?>/admin/appset"<?php if($Action=='appset') { ?> class="active"<?php } ?>>
                                    <i class="am-icon-angle-right"></i>
                                    <span>APP配置</span>
                                    <?php if($HAppNum) { ?><i class="tpl-left-nav-content tpl-badge-success"><?php echo $HAppNum;?></i><?php } ?><?php } ?>
                                <?php if($_SESSION['admin']['rightint']>6) { ?>     <a href="<?php echo $arrInfo['url'];?>/admin/user"<?php if($Action=='user'||$Action=='userd'||$Action=='usera') { ?> class="active"<?php } ?>>
                                        <i class="am-icon-angle-right"></i>
                                        <span>权限管理</span>
                                       <?php if($HAppNum) { ?> <i class="tpl-left-nav-content tpl-badge-primary"><?php echo $HUserNum;?> </i><?php } ?><?php } ?>
                                         <?php if($_SESSION['admin']['rightint']==4||$_SESSION['admin']['rightint']>6) { ?>    <a href="<?php echo $arrInfo['url'];?>/admin/log"<?php if($Action=='log') { ?> class="active"<?php } ?>>
                                            <i class="am-icon-angle-right"></i>
                                            <span>操作记录</span>
                                    <?php if($HLogNum) { ?><i class="tpl-left-nav-content tpl-badge-success"><?php echo $HLogNum;?></i><?php } ?>

                                        </a><?php } ?>
                            </li>
                        </ul>
                    </li>
<?php } ?>
 

                    <li class="tpl-left-nav-item">
                        <a href="<?php echo $arrInfo['url'];?>/admin/self" class="nav-link tpl-left-nav-link-list<?php if($Action=='self') { ?> active<?php } ?>">
                            <i class="am-icon-key"></i>
                            <span>账号管理</span>

                        </a>
                    </li>
                </ul>
            </div>
        </div>



