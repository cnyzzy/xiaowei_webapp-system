<?php
$NOW = empty($params[0]) ? 'all':($params[0]);
ob_end_clean();
error_reporting(0);
header('Content-Type: application/vnd.ms-excel;charset=gb2312');
if($NOW=='all')
{$name="小薇工作室微信推送统计总表";
$sql = "SELECT * FROM wxarticle order by data desc";
}else{
$ym=date('Ym',strtotime($NOW."01"));
$y=date('Y',strtotime($NOW."01"));
$m=date('m',strtotime($NOW."01"));
if($y<2015)exit;
$name="小薇工作室微信推送".$ym."统计表";
 $sql = "SELECT * FROM wxarticle where sid='".$ym."' order by data desc";
}
header("Content-Disposition:attachment;filename=".$name.".xls");
echo(iconv('UTF-8', 'GBK',  "推送日期"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "标题"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "推送位置"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "所属月份"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "图文消息id"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "统计日期"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "图文页阅读人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "图文页阅读次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "原文页阅读人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "原文页阅读次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "分享人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "分享次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "收藏人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "收藏次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "公众号会话阅读人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "公众号会话阅读次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "历史消息页阅读人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "历史消息页阅读次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "朋友圈阅读人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "朋友圈阅读次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "好友转发阅读人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "好友转发阅读次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "其他场景阅读人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "其他场景阅读次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "公众号会话转发朋友圈人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "公众号会话转发朋友圈次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "朋友圈转发朋友圈人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "朋友圈转发朋友圈次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "其他场景转发朋友圈人数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "其他场景转发朋友圈次数"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "送达人数"))."\t"; 
$arr = $DB->fetch_all_array($sql);
$arr=arrayCv($arr);
foreach((array)$arr as $key=>$loopChild)
 {
echo "\n"; 
echo $loopChild['data']."\t";
echo $loopChild['title']."\t";
echo $loopChild['sendid']."\t";
echo $loopChild['sid']."\t";
echo $loopChild['msgid']."\t";
echo $loopChild['stat_date']."\t";
echo $loopChild['int_page_read_user']."\t";
echo $loopChild['int_page_read_count']."\t";
echo $loopChild['ori_page_read_user']."\t";
echo $loopChild['ori_page_read_count']."\t";
echo $loopChild['share_user']."\t";
echo $loopChild['share_count']."\t";
echo $loopChild['add_to_fav_user']."\t";
echo $loopChild['add_to_fav_count']."\t";
echo $loopChild['int_page_from_session_read_user']."\t";
echo $loopChild['int_page_from_session_read_count']."\t";
echo $loopChild['int_page_from_hist_msg_read_user']."\t";
echo $loopChild['int_page_from_hist_msg_read_count']."\t";
echo $loopChild['int_page_from_feed_read_user']."\t";
echo $loopChild['int_page_from_feed_read_count']."\t";
echo $loopChild['int_page_from_friends_read_user']."\t";
echo $loopChild['int_page_from_friends_read_count']."\t";
echo $loopChild['int_page_from_other_read_user']."\t";
echo $loopChild['int_page_from_other_read_count']."\t";
echo $loopChild['feed_share_from_session_user']."\t";
echo $loopChild['feed_share_from_session_cnt']."\t";
echo $loopChild['feed_share_from_feed_user']."\t";
echo $loopChild['feed_share_from_feed_cnt']."\t";
echo $loopChild['feed_share_from_other_user']."\t";
echo $loopChild['feed_share_from_other_cnt']."\t";
echo $loopChild['target_user']."\t";
 }
function arrayCv($data) {
		if (is_array($data)) {
			
			foreach ($data as $key => $val) {
				if (!is_array($val)) {
					$arr[$key] = iconv('UTF-8', 'GBK',  $val);
				} else {

					$arr[$key] = arrayCv($val);
				}
			}
		} else {
			return iconv('UTF-8', 'GBK',  $data);
		}
		return $arr;

	}
?>