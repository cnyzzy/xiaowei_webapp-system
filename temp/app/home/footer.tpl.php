<?php defined('ZRoot') or die('Access Denied.'); ?>        <footer>
            <ul class="menubar animated fadeInUp delay3">
                <li class="tab<?php if($AppName=='notice') { ?> active<?php } ?>" onclick="window.location='/notice'">
                    <i class="iconfont">&#xe690;</i>
                    <label class="tab-label">公告</label>
                    <?php if($NoticeNum!=0) { ?><span class="point"></span><?php } ?>
                 
                </li>
                <li class="tab<?php if($AppName=='msg') { ?> active<?php } ?>" onclick="window.location='/msg'">
                    <i class="iconfont">&#xe69b;</i>
                    <label class="tab-label">消息</label>
                    <?php if($MsgNum!=0) { ?><span class="point"></span><?php } ?>
                </li>
                <li class="tab<?php if($AppAction=='index'&&$AppName=='home') { ?> active<?php } ?>" onclick="window.location='/home/index'">
                    <i class="iconfont">&#xe66f;</i>
                    <label class="tab-label">应用</label>
                    <?php if($AppNum!=0) { ?><span class="point"></span><?php } ?>
                </li>
                <li class="tab<?php if($AppAction=='self'&&$AppName=='home') { ?> active<?php } ?>" onclick="window.location='/home/self'">
                    <i class="iconfont">&#xe623;</i>
                    <label class="tab-label">我</label>
					 <?php if($SelfNum!=0) { ?><span class="point"></span><?php } ?>
                </li>
            </ul>
        </footer>
			<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?>    </body>
</html>