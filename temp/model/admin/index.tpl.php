<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理首页-小薇平台管理后台</title>
	<meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="XIAOWEI Admin" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/admin.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/app.css">
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/echarts.min.js"></script>
</head>

<body data-type="index">
<?php include template('header'); ?>

        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                管理首页
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">分类</a></li>
                <li class="am-active">内容</li>
            </ol>
            <div class="tpl-content-scope">
                <div class="note note-info">
                    <h3>小薇平台
                        <span class="close" data-close="note"></span>
                    </h3>
                    <p> 这里是盐城师范学院公众号YCTU-1958的微信平台的管理系统</p>
                    <p><span class="label label-danger">身份:</span>  <?php if($_SESSION['admin']['rightint']==9) { ?>超级管理员<?php } ?><?php if($_SESSION['admin']['rightint']==8) { ?>平台管理员<?php } ?><?php if($_SESSION['admin']['rightint']==7) { ?>管理员<?php } ?><?php if($_SESSION['admin']['rightint']==6) { ?>应用管理员<?php } ?><?php if($_SESSION['admin']['rightint']==5) { ?>应用维护员<?php } ?><?php if($_SESSION['admin']['rightint']==4) { ?>审查账号<?php } ?>(<?php echo $_SESSION['admin']['rightint'];?>级)
                    </p> <p><span class="label label-warning">权限:</span>  <?php if($_SESSION['admin']['rightint']==9) { ?>最高权限<?php } ?>
											<?php if($_SESSION['admin']['rightint']==8) { ?>完全管理<?php } ?>
											<?php if($_SESSION['admin']['rightint']==7) { ?>完全管理，但不可新建7级及以上管理账号<?php } ?>
											<?php if($_SESSION['admin']['rightint']==6) { ?>只对【<?php echo $_SESSION['admin']['rightapp'];?>】完全管理<?php } ?>
											<?php if($_SESSION['admin']['rightint']==5) { ?>【<?php echo $_SESSION['admin']['rightapp'];?>】维护<?php } ?>
											<?php if($_SESSION['admin']['rightint']==4) { ?>不可操作账号<?php } ?></p>
                </div>
            </div>

            <div class="row">
                <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="am-icon-comments-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"> <?php echo $HWxidNum;?> </div>
                            <div class="desc"> 绑定数 </div>
                        </div>
                        <a class="more" href="<?php echo $arrInfo['url'];?>/admin/mwxid"> 查看更多
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
                    </div>
                </div>
                <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="am-icon-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"> <?php if(!empty($arrWx['num'])) { ?><?php echo(round(($HWxidNum/$arrWx['num'])*100, 3))?><?php } else { ?>???<?php } ?>% </div>
                            <div class="desc"> 绑定率 </div>
                        </div>
                        <a class="more" href="<?php echo $arrInfo['url'];?>/admin/chart"> 查看更多
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
                    </div>
                </div>
                <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="am-icon-weixin"></i>
                        </div>
                        <div class="details">
                            <div class="number"> <?php if(!empty($arrWx['num'])) { ?><?php echo $arrWx['num'];?><?php } else { ?>???<?php } ?> </div>
                            <div class="desc"> 微信关注 </div>
                        </div>
                        <a class="more" href="<?php echo $arrInfo['url'];?>/admin/chart"> 查看更多
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
                    </div>
                </div>
                <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                    <div class="dashboard-stat purple">
                        <div class="visual">
                            <i class="am-icon-cubes"></i>
                        </div>
                        <div class="details">
                            <div class="number"> <?php echo $HAppNum;?> </div>
                            <div class="desc"> APP </div>
                        </div>
                        <a class="more" href="<?php echo $arrInfo['url'];?>/admin/appset"> 查看更多
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
                    </div>
                </div>



            </div>

            <div class="row">
                <div class="am-u-md-6 am-u-sm-12 row-mb">
                    <div class="tpl-portlet">
                        <div class="tpl-portlet-title">
                            <div class="tpl-caption font-green ">
                                <i class="am-icon-cloud-download"></i>
                                <span> 概况统计</span>
                            </div>
                            <div class="actions">
                                <ul class="actions-btn">
                                    <li class="blue-ON">7天内</li>
                                </ul>
                            </div>
                        </div>

                        <!--此部分数据请在 js文件夹下中的 app.js 中的 “百度图表A” 处修改数据 插件使用的是 百度echarts-->
                        <div class="tpl-echarts" id="tpl-echarts-A">

                        </div>
                    </div>
                </div>
                <div class="am-u-md-6 am-u-sm-12 row-mb">
                    <div class="tpl-portlet">
                        <div class="tpl-portlet-title">
                            <div class="tpl-caption font-red ">
                                <i class="am-icon-bar-chart"></i>
                                <span> 用户统计</span>
                            </div>
                            <div class="actions">
                                <ul class="actions-btn">
                                    <li class="purple-on">总计</li>
                                    <li class="green-on">实时数据</li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="tpl-scrollable">
                            <div class="number-stats">
                                <div class="stat-number am-fl am-u-md-6">
                                    <div class="title am-text-right"> 绑定人次 </div>
                                    <div class="number am-text-right am-text-warning"> <?php echo $HWxidNum;?> </div>
                                </div>
                                <div class="stat-number am-fr am-u-md-6">
                                    <div class="title"> 解绑人次 </div>
                                    <div class="number am-text-success"> <?php echo $HWxidNumH;?> </div>
                                </div>

                            </div>

                            <table class="am-table tpl-table">
                                <thead>
                                    <tr class="tpl-table-uppercase">
                                        <th>号码</th>
                                        <th>姓名</th>
                                        <th>昵称</th>
                                        <th>身份</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach((array)$WxidArray as $key=>$loopChild) {?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $loopChild['img'];?>" alt="" class="user-pic">
                                            <a class="user-name" href="<?php echo $arrInfo['url'];?>/admin/mwxidd/<?php echo $loopChild['id'];?>"><?php echo $loopChild['number'];?></a>
                                        </td>
                                        <td><?php echo $loopChild['name'];?></td>
                                        <td><?php echo $loopChild['nickname'];?></td>
                                        <td class="font-green bold"><?php if($loopChild['type']=='1') { ?>学生<?php } ?><?php if($loopChild['type']=='2') { ?>教职工<?php } ?><?php if($loopChild['type']=='3') { ?>访客<?php } ?></td>
                                    </tr><?php }?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="am-u-md-6 am-u-sm-12 row-mb">

                    <div class="tpl-portlet">
                        <div class="tpl-portlet-title">
                            <div class="tpl-caption font-green ">
                                <span>操作记录</span>
                                <span class="caption-helper"> </span>
                            </div>
                            <div class="tpl-portlet-input">
                               
                            </div>
                        </div>
                        <div id="wrapper" class="wrapper">
                            <div id="scroller" class="scroller">
                                <ul class="tpl-task-list">
								<?php foreach((array)$LogArray as $key=>$loopChild) {?>
                                    <li>                             
                                      <?php $type=0;?>
                                        <div class="task-title">
                                           <?php if($loopChild['type']=='64'||($loopChild['type']=='43'&&$loopChild['dotype']=='5')) { ?><?php $type=1;?> <span class="label label-sm label-danger">重要</span><?php } ?>
											<?php if($loopChild['type']=='61'||$loopChild['type']=='62'||$loopChild['type']=='31') { ?><?php $type=2;?> <span class="label label-sm label-warning">系统</span><?php } ?>
											<?php if($loopChild['type']=='41'||($loopChild['type']=='43'&&$loopChild['dotype']!='5')||$loopChild['type']=='42') { ?><?php $type=3;?> <span class="label label-sm label-success">操作</span><?php } ?>
											<?php if($loopChild['type']=='11'||$loopChild['type']=='12') { ?><?php $type=4;?> <span class="label label-sm label-default">记录</span><?php } ?>
											<span class="task-title-sp">
											<?php if($type==4) { ?><?php echo $loopChild['name'];?><?php if($loopChild['type']=='11') { ?>登入<?php } ?><?php if($loopChild['type']=='12') { ?>登出<?php } ?>IP:<?php echo $loopChild['ip'];?><?php } ?>
											<?php if($type==3) { ?>在<?php if($loopChild['type']=='41') { ?>绑定管理<?php } ?><?php if($loopChild['type']=='42') { ?>绑定管理回收站<?php } ?><?php if($loopChild['type']=='43') { ?>教务系统资料管理<?php } ?>中，对编号为<?php echo $loopChild['toid'];?>的用户进行了一次<?php if($loopChild['dotype']=='2') { ?>删除<?php } ?><?php if($loopChild['dotype']=='3') { ?>修改<?php } ?><?php if($loopChild['dotype']=='4') { ?>新建<?php } ?><?php if($loopChild['dotype']=='5') { ?>查询<?php } ?><?php if($loopChild['dotype']=='6') { ?>权限<?php } ?>操作<?php } ?>
											<?php if($type==2) { ?>在<?php if($loopChild['type']=='61') { ?>基本配置管理<?php } ?><?php if($loopChild['type']=='62') { ?>APP管理<?php } ?><?php if($loopChild['type']=='31') { ?>微信API配置管理<?php } ?>中，以<?php if($loopChild['rightint']==9) { ?>超级管理员<?php } ?><?php if($loopChild['rightint']==8) { ?>平台管理员<?php } ?><?php if($loopChild['rightint']==7) { ?>管理员<?php } ?><?php if($loopChild['rightint']==6) { ?>应用管理员<?php } ?><?php if($loopChild['rightint']==5) { ?>应用维护员<?php } ?><?php if($loopChild['rightint']==4) { ?>审查账号<?php } ?>(<?php echo $loopChild['rightint'];?>级)身份进行了<?php if($loopChild['dotype']=='2') { ?>删除<?php } ?><?php if($loopChild['dotype']=='3') { ?>修改<?php } ?><?php if($loopChild['dotype']=='4') { ?>新建<?php } ?><?php if($loopChild['dotype']=='5') { ?>查询<?php } ?><?php if($loopChild['dotype']=='2') { ?>权限<?php } ?>操作<?php } ?>
											<?php if($type==1) { ?>在<?php if($loopChild['type']=='64') { ?>权限管理<?php } ?><?php if($loopChild['type']=='43'&&$loopChild['dotype']=='5') { ?>教务系统资料隐私管理<?php } ?>中，对<?php if($loopChild['type']=='43'&&$loopChild['dotype']=='5') { ?>编号为<?php echo $loopChild['toid'];?>的用户<?php } else { ?><?php echo $loopChild['toid'];?><?php } ?>进行了一次<?php if($loopChild['dotype']=='2') { ?>删除<?php } ?><?php if($loopChild['dotype']=='3') { ?>修改<?php } ?><?php if($loopChild['dotype']=='4') { ?>新建<?php } ?><?php if($loopChild['dotype']=='5') { ?>查询<?php } ?><?php if($loopChild['dotype']=='6') { ?>权限<?php } ?>操作<?php } ?>

											</span>    
										<div class="cosB"><?php ECHO(smartDate($loopChild['time']))?></div>
                                        </div>
                                           
                                      
                                    </li>
<?php }?>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="am-u-md-6 am-u-sm-12 row-mb">
                    <div class="tpl-portlet">
                        <div class="tpl-portlet-title">
                            <div class="tpl-caption font-green ">
                                <span>开发进度</span>
                            </div>

                        </div>

                        <div class="am-tabs tpl-index-tabs" data-am-tabs>
                            <ul class="am-tabs-nav am-nav am-nav-tabs">
                                <li class="am-active"><a href="#tab1">进行中</a></li>
                                <li><a href="#tab2">已完成</a></li>
                            </ul>

                            <div class="am-tabs-bd">
                                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                    <div id="wrapperA" class="wrapper">
                                        <div id="scroller" class="scroller">
                                            <ul class="tpl-task-list tpl-task-remind">
                                                <li>
                                                    <div class="cosB">
                                                        2017.02.14
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco">
                        <i class="am-icon-bell-o"></i>
                      </span>

                                                        <span> APP开发
                                                        </span></span>
                                                    </div>

                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-tab-panel am-fade" id="tab2">
                                    <div id="wrapperB" class="wrapper">
                                        <div id="scroller" class="scroller">
                                            <ul class="tpl-task-list tpl-task-remind">
                                                <li>
                                                    <div class="cosB">
                                                        2017年2月5日15:36:58
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco">
                        <i class="am-icon-bell-o"></i>
                      </span>

                                                        <span> 完成后台的权限控制设计，完成Log函数库。</span>
                                                    </div>

                                                </li>
                                                <li>
                                                    <div class="cosB">
                                                        2017年2月5日10:29:10
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-danger">
                        <i class="am-icon-bolt"></i>
                      </span>

                                                        <span> 完成首页和概况统计的函数库部分，至此核心函数库完成。</span>
                                                    </div>

                                                </li>

                                                <li>
                                                    <div class="cosB">
                                                        2017年2月4日17:19:12
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-info">
                        <i class="am-icon-bullhorn"></i>
                      </span>

                                                        <span> 完成权限管理。</span>
                                                    </div>

                                                </li>
                                                <li>
                                                    <div class="cosB">
                                                        2017年2月4日11:40:35
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-warning">
                        <i class="am-icon-plus"></i>
                      </span>

                                                        <span> 增加对绑定信息、教务资料的详细修改功能，增加隐私权限控制。</span>
                                                    </div>

                                                </li>
                                                <li>
                                                    <div class="cosB">
                                                        2017年2月3日21:41:50
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco">
                        <i class="am-icon-bell-o"></i>
                      </span>

                                                        <span> 完成对微信绑定的设计。
                                                        </span></span>
                                                    </div>

                                                </li>
                                                <li>
                                                    <div class="cosB">
                                                       2017年2月1日12:52:57
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-danger">
                        <i class="am-icon-bolt"></i>
                      </span>

                                                        <span> 完成微信API配置设计，重写AToken定时更新方法。修改左侧导航。</span>
                                                    </div>

                                                </li>

                                                <li>
                                                    <div class="cosB">
                                                       2017年1月31日16:34:52
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-info">
                        <i class="am-icon-bullhorn"></i>
                      </span>

                                                        <span> 完成系统基本设置部分，在路由导入后添加函数库调用。</span>
                                                    </div>

                                                </li> <li>
                                                    <div class="cosB">
                                                       2017年1月30日17:46:55
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-danger">
                        <i class="am-icon-bolt"></i>
                      </span>

                                                        <span> 重构APP的设计，增加安装卸载步骤。完善后台框架，Header部分提取。</span>
                                                    </div>

                                                </li>

                                                <li>
                                                    <div class="cosB">
                                                        2017年1月28日22:19:12
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-info">
                        <i class="am-icon-bullhorn"></i>
                      </span>

                                                        <span> 完成Admin函数库，后台构架设计完成。</span>
                                                    </div>

                                                </li>
                                                <li>
                                                    <div class="cosB">
                                                        2017年1月27日15:15:33
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-warning">
                        <i class="am-icon-plus"></i>
                      </span>

                                                        <span> 鸡年大吉，祝自己生日快乐。至此，Home、Msg、Notice函数库完成。</span>
                                                    </div>

                                                </li>
                                                <li>
                                                    <div class="cosB">
                                                        2017年1月26日20:51:46
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco">
                        <i class="am-icon-bell-o"></i>
                      </span>

                                                        <span>继续App拆分工作，重写Home部分。开始开发后台。
                                                           
                                                        </span>
                                                    </div>

                                                </li>
                                                <li>
                                                    <div class="cosB">
                                                        2017年1月25日22:23:04
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-danger">
                        <i class="am-icon-bolt"></i>
                      </span>

                                                        <span>进行Home微网站拆分，启用函数库</span>
                                                    </div>

                                                </li>

                                                <li>
                                                    <div class="cosB">
                                                        2017年1月24日19:24:33
                                                    </div>
                                                    <div class="cosA">
                                                        <span class="cosIco label-info">
                        <i class="am-icon-bullhorn"></i>
                      </span>

                                                        <span> 基本完成后台的前端修改。</span>
                                                    </div>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>

    </div>


    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/iscroll.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
	<script>
 var echartsA = echarts.init(document.getElementById('tpl-echarts-A'));
        option = {

            tooltip: {
                trigger: 'axis',
            },
            legend: {
                data: ['减少', '新增', '净增加']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [{
                type: 'category',
                boundaryGap: true,
                data: [<?php foreach((array)$datearray as $key=>$loopChild) {?>'<?php echo $loopChild['name'];?>',<?php }?>]
            }],

            yAxis: [{
                type: 'value'
            }],
            series: [{
                    name: '减少',
                    type: 'line',
                    stack: '总量',
                    areaStyle: { normal: {} },
                    data:  [<?php foreach((array)$datearray as $key=>$loopChild) {?>'<?php if(empty($Chart0[$loopChild['date']])) { ?>0<?php } else { ?><?php echo $Chart0[$loopChild['date']];?><?php } ?>',<?php }?>],
                    itemStyle: {
                        normal: {
                            color: '#59aea2'
                        },
                        emphasis: {

                        }
                    }
                },
                {
                    name: '新增',
                    type: 'line',
                    stack: '总量',
                    areaStyle: { normal: {} },
                    data: [<?php foreach((array)$datearray as $key=>$loopChild) {?>'<?php if(empty($Chart1[$loopChild['date']])) { ?>0<?php } else { ?><?php echo $Chart1[$loopChild['date']];?><?php } ?>',<?php }?>],
                    itemStyle: {
                        normal: {
                            color: '#e7505a'
                        }
                    }
                },
                {
                    name: '净增加',
                    type: 'line',
                    stack: '总量',
                    areaStyle: { normal: {} },
                    data: [<?php foreach((array)$datearray as $key=>$loopChild) {?>'<?php 
					empty($Chart1[$loopChild['date']]) ? $a = '0' : $a= $Chart1[$loopChild['date']];
					empty($Chart0[$loopChild['date']]) ? $b = '0' : $b= $Chart0[$loopChild['date']];
					echo($a-$b);?>',<?php }?>],
                    itemStyle: {
                        normal: {
                            color: '#32c5d2'
                        }
                    }
                }
            ]
        };
        echartsA.setOption(option);
</script>
</body>
</html>