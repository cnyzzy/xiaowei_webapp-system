<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>公告详情-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="fonts/iconfont.css"/>
        <link rel="stylesheet" href="css/font.css"/>
        <link rel="stylesheet" href="css/weui.min.css"/>
        <link rel="stylesheet" href="css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="css/mui.css"/>
        <link rel="stylesheet" href="css/animate.css"/>
        <link rel="stylesheet" href="css/pages/notice_detail.css"/>
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
    </head>
    <body>
        <header>
            <div class="titlebar reverse">
                <a href="javascript:back()">
                    <i class="iconfont">&#xe640;</i>
                </a>
                <h1>公告</h1>
            </div>
        </header>
        <article>
            <div class="weui_cells">
                <div class="weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>赛维科技管理信息系统</p>
                    </div>
                </div>
                <div class="weui_cell no-padding">
                    <div class="weui_cell_bd weui_cell_primary">
                        <span>2016年5月1号</span>
                    </div>
                </div>
            </div>
        </article>
        <article class="weui_article">
            <p>元素信息专注于为客户提供基于云服务、大数据和移动互联网的社区化精益采购管理体系咨询服务。通过对供应商、寻源、价格、成本管理、物流执行等各方面进行全生命周期的精细化和流程梳理、优化采购工具和方式</p>
            <br>
            <p>客户需求和市场定价为导向，通过云端共享和数据分析，帮助企业变被动采购为主动采购，倒逼产品工艺和质量的提升，实现由单纯控制成本到创造增值价值的跨越、智慧</p>
            <p>
                <img src="images/poster.jpg" width="100%" height="100%">
            </p>
        </article>
        
    </body>
</html>