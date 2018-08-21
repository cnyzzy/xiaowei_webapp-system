<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>失物招领编辑-小薇平台管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="XIAOWEI Admin" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/admin.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/app.css">
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/echarts.min.js"></script>
</head>

<body data-type="generalComponents">
<?php include template('header'); ?>
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                编辑-失物招领管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP</a></li>
                <li class="am-active">编辑-失物招领管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑失物招领
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/swzl/do' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">标题 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="title" placeholder="题目" value="<?php echo $Array['title'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">类别 </label>
                                    <div class="am-u-sm-9">
									<select name="stype" data-am-selected="{searchBox: 1}">
  <option value="1"<?php if($Array['stype']=='sw') { ?>selected="selected"<?php } ?>>失物</option>
    <option value="2"<?php if($Array['stype']=='zl') { ?>selected="selected"<?php } ?>>招领</option>
</select>
                                    </div>
                                </div>   
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">物品名称 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="tname" placeholder="名称" value="<?php echo $Array['tname'];?>">
                                    </div>
                                </div>
																<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">地点范围 </label>
                                    <div class="am-u-sm-9">
									<select name="swhere" data-am-selected="{searchBox: 1}">
<option value="2"<?php if($Array['swhere']=='2') { ?> selected="selected" <?php } ?>>==新长校区==</option>
<option value="21"<?php if($Array['swhere']=='21') { ?> selected="selected" <?php } ?>>公共教学楼</option>
<option value="22"<?php if($Array['swhere']=='22') { ?> selected="selected" <?php } ?>>操场/体育馆</option>
<option value="23"<?php if($Array['swhere']=='23') { ?> selected="selected" <?php } ?>>食堂</option>
<option value="24"<?php if($Array['swhere']=='24') { ?> selected="selected" <?php } ?>>其他教学楼</option>
<option value="25"<?php if($Array['swhere']=='25') { ?> selected="selected" <?php } ?>>实验楼</option>
<option value="26"<?php if($Array['swhere']=='26') { ?> selected="selected" <?php } ?>>图书馆</option>
<option value="27"<?php if($Array['swhere']=='27') { ?> selected="selected" <?php } ?>>道路</option>
<option value="28"<?php if($Array['swhere']=='28') { ?> selected="selected" <?php } ?>>商业街/创业园</option>
<option value="29"<?php if($Array['swhere']=='29') { ?> selected="selected" <?php } ?>>其他</option>
<option value="3"<?php if($Array['swhere']=='3') { ?> selected="selected" <?php } ?>>==通榆校区==</option>
<option value="31"<?php if($Array['swhere']=='31') { ?> selected="selected" <?php } ?>>主楼</option>
<option value="32"<?php if($Array['swhere']=='32') { ?> selected="selected" <?php } ?>>图书馆</option>
<option value="33"<?php if($Array['swhere']=='33') { ?> selected="selected" <?php } ?>>操场/体育馆</option>
<option value="34"<?php if($Array['swhere']=='34') { ?> selected="selected" <?php } ?>>食堂</option>
<option value="35"<?php if($Array['swhere']=='35') { ?> selected="selected" <?php } ?>>其他教学楼</option>
<option value="36"<?php if($Array['swhere']=='36') { ?> selected="selected" <?php } ?>>道路</option>
<option value="37"<?php if($Array['swhere']=='37') { ?> selected="selected" <?php } ?>>其他</option>
<option value="4"<?php if($Array['swhere']=='4') { ?> selected="selected" <?php } ?>>==附近==</option>
<option value="41"<?php if($Array['swhere']=='41') { ?> selected="selected" <?php } ?>>育才路</option>
<option value="42"<?php if($Array['swhere']=='42') { ?> selected="selected" <?php } ?>>宝龙</option>
<option value="43"<?php if($Array['swhere']=='43') { ?> selected="selected" <?php } ?>>金鹰</option>
<option value="44"<?php if($Array['swhere']=='44') { ?> selected="selected" <?php } ?>>盐城工学院</option>
<option value="45"<?php if($Array['swhere']=='45') { ?> selected="selected" <?php } ?>>中南城</option>
<option value="46"<?php if($Array['swhere']=='46') { ?> selected="selected" <?php } ?>>其他</option>
<option value="5"<?php if($Array['swhere']=='5') { ?> selected="selected" <?php } ?>>==交通工具==</option>
<option value="51"<?php if($Array['swhere']=='51') { ?> selected="selected" <?php } ?>>公交</option>
<option value="52"<?php if($Array['swhere']=='52') { ?> selected="selected" <?php } ?>>出租车</option>
<option value="53"<?php if($Array['swhere']=='53') { ?> selected="selected" <?php } ?>>长途客车/火车</option>
<option value="54"<?php if($Array['swhere']=='54') { ?> selected="selected" <?php } ?>>公共自行车</option>
<option value="55"<?php if($Array['swhere']=='55') { ?> selected="selected" <?php } ?>>其他</option>
<option value="6"<?php if($Array['swhere']=='6') { ?> selected="selected" <?php } ?>>==其他==</option>
</select>
                                    </div>
                                </div> 
																<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">详细地址</label>
                                    <div class="am-u-sm-9">
                                       <input type="text" placeholder="" name="mwhere" value="<?php echo $Array['mwhere'];?>">
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">图片 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="img" placeholder="" value="<?php echo $Array['img'];?>">
                                    </div>
                                </div>
									                


									<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">详细描述</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="2" id="user-intro" placeholder="详细描述" name="content"><?php echo $Array['content'];?></textarea>
                                    </div>
                                </div>
								
																<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">QQ</label>
                                    <div class="am-u-sm-9">
                                       <input type="number" placeholder="qq" name="data" value="<?php echo $Array['qq'];?>">
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">手机 </label>
                                    <div class="am-u-sm-9">
									<input type="number" name="mobile" placeholder="链接" value="<?php echo $Array['mobile'];?>">
                                      
                                    </div>
                                </div>
																	<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">浏览量 </label>
                                    <div class="am-u-sm-9">
                                        <input type="number" name="ll" placeholder="" value="<?php echo $Array['ll'];?>">
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">评论量 </label>
                                    <div class="am-u-sm-9">
                                        <input type="number" name="pl" placeholder="" value="<?php echo $Array['pl'];?>">
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">关心量 </label>
                                    <div class="am-u-sm-9">
                                        <input type="number" name="gx" placeholder="" value="<?php echo $Array['gx'];?>">
                                    </div>
                                </div>
								
								<?php if($Array['addtime']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">添加时间</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time2" placeholder="<?php ECHO(date('Y-m-j G:i:s',$Array['addtime']))?>" disabled="true">
                                    </div>
                                </div><?php } ?>
									<?php if($Array['ip']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">IP</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time2" placeholder="<?php echo $Array['ip'];?>" disabled="true">
                                    </div>
                                </div><?php } ?>
								

                                   <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">通过(未过)</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="isok" class="ios-switch bigswitch tpl-switch-btn"<?php if($Array['isok']==1) { ?> checked <?php } ?>/>
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                   
                                 
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                         <?php if($ok==0) { ?> <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
										<?php } ?>  <?php if($ok==1) { ?><small>数据已更新</small><?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>










        </div>

    </div>


    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/app.js"></script>
</body>

</html>