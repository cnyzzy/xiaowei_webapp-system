<?php
//test页面
//$output='';
//IF(EMPTY($output))ECHO'0';
		//$Wx = new Wx($DB);
		//$count=$Wx->GetMaterialCount();
		//PRINT_r($count);
		//$A=$Wx->GetMaterialList("news",0,10);
		//PRINT_r($A);


$testObj = new Test($DB);   

if(!empty($_GET['echostr'])){  
      
    $testObj->valid();  
      
}else{  
      
    $testObj->responseMsg();  
}  
  
exit;  
  
class Test  
{  
    /** 
     * 绑定url、token信息 
     */  
			var $conn;

function Test(&$DB){
		if (!$this->conn = $DB){
				$this->posterror("连接数据库失败");
} }
    public function valid(){  
        $echoStr = @$_GET["echostr"];  
		 $this->log('A'.$echoStr);     
        if ($this->checkSignature()) {  
		ob_clean();
            echo $echoStr;        $this->log($echoStr);     
        }  
        exit();  
    } 

    /** 
     * 检查签名，确保请求是从微信发过来的 
     */  
    private function checkSignature()  
    {  
        $signature = @$_GET["signature"];  
        $timestamp = @$_GET["timestamp"];  
        $nonce = @$_GET["nonce"];      
        $arrWxapi = SetRead('/system/config/Public/Wxapi.php');
        $token =  $arrWxapi['TOKEN'];//与在微信配置的token一致，不可泄露  
        $tmpArr = array($token, $timestamp, $nonce);  
        sort($tmpArr);  
        $tmpStr = implode( $tmpArr );  
        $tmpStr = sha1( $tmpStr );  
    
            return true;  
        
    }  

    /** 
     * 接收消息，并自动发送响应信息 
     */  
    public function responseMsg(){  
          
        //验证签名  
        if ($this->checkSignature()){  
		
            $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];  
            $this->log_request_info();  
      
            //提取post数据  
            if (!empty($postStr)){ 
			
                    $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);  
                    $fromUsername = $postObj->FromUserName;//发送人  
                    $toUsername = $postObj->ToUserName;//接收人  
                    $MsgType = $postObj->MsgType;//消息类型  
                    $MsgId = $postObj->MsgId;//消息id  
                    $time = time();//当前时间做为回复时间  
 $sql = "SELECT * FROM wxid WHERE openid ='{$fromUsername}' and isok=1";
		$result = $this->conn->query($sql);
		$row = $this->conn->fetch_array($result);
$this->log($fromUsername);
		if(empty($row))
		{
			$IsXwUser=0;
		}else{
			$IsXwUser=1;
		}
		$this->log('USER'.$IsXwUser);
 
            //如果是文本消息（表情属于文本信息）  
                    if($MsgType == 'text'){  
                        $content = trim($postObj->Content);//消息内容  
                        if(!empty( $content )){  
                        $newsTpl = "<xml>  
                                <ToUserName><![CDATA[%s]]></ToUserName>  
                                <FromUserName><![CDATA[%s]]></FromUserName>  
                                <CreateTime>%s</CreateTime>  
                                <MsgType><![CDATA[%s]]></MsgType>  
                                <ArticleCount>%s</ArticleCount>  
                                <Articles>  
                                <item>  
                                <Title><![CDATA[%s]]></Title>   
                                <Description><![CDATA[%s]]></Description>  
                                <PicUrl><![CDATA[%s]]></PicUrl>  
                                <Url><![CDATA[%s]]></Url>  
                                </item>  
                                <item>  
                                <Title><![CDATA[%s]]></Title>  
                                <Description><![CDATA[%s]]></Description>  
                                <PicUrl><![CDATA[%s]]></PicUrl>  
                                <Url><![CDATA[%s]]></Url>  
                                </item>  
                                </Articles>  
                                </xml>"; 
                            //如果文本内容是图文，则回复图文信息，否则回复文本信息  
                            if($content == "课表"||$content == "课程表"){  
                   
                                $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','查询课程表必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
							
									$number=$row['number'];
									
									if($row['type'] != '1')
									{
								
									  $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此进入小薇平台使用其他功能','您绑定身份类型没有课程表','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd'); 
								}else{
									if(file_exists(ZSystem.'/data/app/timetables/now.php'))
{$arr = SetRead('/system/data/app/timetables/now.php');
}
	$arr2=array (
  'year' => '2017',
  'team' => '01',
);
if(empty($arr['year'])||empty($arr['team'])){
	SetWrite($arr2,'/system/data/app/timetables/now.php');
	$arr=$arr2;
}
define("KCBDATE",$arr['year'].$arr['team']);
									if(is_file('system/data/app/timetables/'.KCBDATE.'/'.$number.'.php')){
									$arr = require('system/data/app/timetables/'.KCBDATE.'/'.$number.'.php');}
									if(empty($arr))
									{
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此更新并查看课程表','您需要更新数据','http://weixin.yctu.edu.cn/img/kcb.png', 'http://weixin.yctu.edu.cn/kcb','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
									}else{
						
									$week=date("w");
									if($week==0)$week=7;
									$details='';
									foreach($arr[$week] as $k=>$v){ 
									if(isset($v['coursename'])&&!empty($v['coursename']))$details.='第'.$k.'节:'.$v['coursename'];
									if(isset($v['courseplace'])&&!empty($v['courseplace'])){$details.='['.$v['courseplace'].']'."\r\n";}
									elseif(!empty($v['coursename'])){$details.="\r\n";}
									if(isset($v[0]))
									{
											foreach($v[0] as $k=>$v){ 
											$weektype='双周';
											if(isset($v['coursesingle'])&&$v['coursesingle']==1)$weektype='单周';
											
									
										if(isset($v['coursename'])&&!empty($v['coursename']))$details.=$v['coursename'].'('.$weektype.')';
									if(isset($v['courseplace'])&&!empty($v['courseplace'])){$details.='['.$v['courseplace'].']'."\r\n";}elseif(!empty($v['coursename'])){$details.="\r\n";}
										
									}
									}
										
									}
									if(empty($details))$details='无';
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此查看课程表','今日课程:'."\r\n".$details,'', 'http://weixin.yctu.edu.cn/kcb','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
									}
								}
								}
							   echo $resultStr;  
                                $this->log($resultStr);   
                            }elseif($content == "成绩"||$content == "学分"||$content == "绩点"){  
							                   
                                $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','查询成绩必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
							
									$number=$row['number'];
									if($row['type'] != '1')
									{
								
									  $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此进入小薇平台使用其他功能','您绑定身份类型没有成绩','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd'); 
								}else{
									
									$sql = "select sum(xf) as sumxf,sum(jd) as sumjd,TRUNCATE(avg(xf),3) as xf,count(cj) as cj,TRUNCATE(avg(jd),3) as jd from cjinfo where number = '{$number}'  AND isok='1'";
									$result = $this->conn->query($sql);
									$arr = $this->conn->fetch_array($result);
			
									if(empty($arr['jd']))
									{
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此更新并查看成绩','您需要更新数据','http://weixin.yctu.edu.cn/img/cjcx.jpg', 'http://weixin.yctu.edu.cn/score','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
									}else{
						
				
									$details='';
									$details.='[成绩]'."\r\n".'科目数:'.$arr['cj']."\r\n";
									$details.='[学分]'."\r\n".'总计:'.$arr['sumxf']."  ".'平均:'.$arr['xf']."\r\n";
									$details.='[绩点]'."\r\n".'总计:'.$arr['sumjd']."  ".'平均:'.$arr['jd']."\r\n";
							
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此查看成绩','成绩查询包括必修课、选修课、校选课情况以及绩点学分统计'."\r\n"."\r\n".$details,'', 'http://weixin.yctu.edu.cn/score','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
									}
								}
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							
							
							}elseif($content == "培养计划"){
								 $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','查询成绩必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
							
									$number=$row['number'];
									if($row['type'] != '1')
									{
								
									  $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此进入小薇平台使用其他功能','您绑定身份类型没有培养计划','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd'); 
								}else{
									$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此查看培养计划','','http://weixin.yctu.edu.cn/img/pyjh.png', 'http://weixin.yctu.edu.cn/pyjh','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
	
								}
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "普通话"||$content == "普通话成绩"){
								 $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
							
									
								
									$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此查询普通话水平测试成绩','根据姓名和身份证号即可查询','', 'http://weixin.yctu.edu.cn/pth','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
								
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "植树"||$content == "2048"){
								 $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
							
									$number=$row['number'];
									$sql = "select maxs,addtime  from game where number = '{$number}' AND gameid='1'";
									$result = $this->conn->query($sql);
									$arr = $this->conn->fetch_array($result);
									$sql = "select maxs,addtime  from game order by maxs DESC limit 1";
									$result = $this->conn->query($sql);
									$arr2 = $this->conn->fetch_array($result);
									if(empty($arr['maxs']))
									{
								
									$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此开始植树2048游戏','','http://weixin.yctu.edu.cn/img/2048.png', 'http://weixin.yctu.edu.cn/zsj','游戏活动说明[已结束]','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');
								}else{
								$details='';
								$details.='[最高纪录]'."\r\n".'分数:'.$arr2['maxs']."  ".'时间:'.date('Y-m-d G:i:s',$arr2['addtime'])."\r\n";
								$details.='[你的记录]'."\r\n".'分数:'.$arr['maxs']."  ".'时间:'.date('Y-m-d G:i:s',$arr['addtime'])."\r\n";;

							
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此开始植树2048游戏','[活动已结束]'."\r\n"."\r\n".$details,'', 'http://weixin.yctu.edu.cn/zsj','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
									
								}
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "健步走"||$content == "跑步"){
								 $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','查询成绩必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
							
									$number=$row['number'];
									if($row['type'] == '3')
									{
								
									  $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此进入小薇平台使用其他功能','您绑定身份类型没有成绩','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd'); 
								}else{
									$sql = "select max(step) as maxs,sum(step) as total,TRUNCATE(avg(step),0) as astep,count(step) as days  from step where number = '{$number}' AND isok='1'";
									$result = $this->conn->query($sql);
									$arr = $this->conn->fetch_array($result);
									$j=date("H");
									if($j>=22){$timee=date("Y-m-d");}else{$timee=date("Y-m-d",strtotime("-1 day"));}
									$sql = "SELECT * FROM step WHERE number ='{$number}' and data='{$timee}'";
									$row = $this->conn->once_fetch_array($sql);
								if(empty($row)){
								$wei='您还未参加'.$timee.'的活动，快来参加吧'; 
								}else{$wei='您已经参加'.$timee.'的活动，快来看看名次吧';}
								$details='';
								$details.='[参与记录]'."\r\n".'您已经参与了'.$arr['days']."次活动，总共进行了".$arr['total'].'步 '."\r\n";
								$details.='[历史数据]'."\r\n".'最高:'.$arr['maxs']."步  ".'平均:'.$arr['astep'].'步 '."\r\n";;

							
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此进入健步走活动',$wei."\r\n"."\r\n".$details,'', 'http://weixin.yctu.edu.cn/walking','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
							
								
								}
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "电费"||$content == "用电"||$content == "电费查询"){  
							                   
                                $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','查询必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
							
									$number=$row['number'];
								if(is_file('system/data/app/dfcx/'.$number.'.php')){
									$arr = require('system/data/app/dfcx/'.$number.'.php');}
									if(empty($arr))
									{
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此更新并查看电费情况','您需要更新电费数据','', 'http://weixin.yctu.edu.cn/dfcx','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
									}else{
									$timei=filectime('system/data/app/dfcx/'.$number.'d.php');
							  $sql = "SELECT  * FROM dfcxinfo WHERE number ='{$number}'";
								$arr2 = $this->conn->once_fetch_array($sql);
			
									if(empty($arr2['room']))
									{
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此更新并查看电费','您需要更新电费数据','', 'http://weixin.yctu.edu.cn/dfcx','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
									}else{
						
				
									$details='';
									$details.='[电费概况]'."\r\n".'宿舍:'.$arr2['room']."\r\n";
									$details.='已用:'.$arr['yy']."度  ".'剩余:'.$arr['sy']."度\r\n";
									$details.='补助:'.$arr['bz']."度  ".'购买:'.$arr['gm']."度\r\n";
									$details.="\r\n".'缓存时间:'.date('Y-m-d G:i:s',$timei)."\r\n";
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此查看详细电费情况','内有近10天用量详情，您也可以更新电费数据'."\r\n"."\r\n".$details,'', 'http://weixin.yctu.edu.cn/dfcx','使用更多功能','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');
									}
								}
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							
							
							}elseif($content == "失物招领"){
								 $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','实名制必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
									$number=$row['number'];
							
									  $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此进入失物招领','','http://weixin.yctu.edu.cn/img/swzl.jpg', 'http://weixin.yctu.edu.cn/swzl','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd'); 
		
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "微博"||$content == "官微"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院官方微博','点此直接跳转','', 'http://weibo.com/ycsfxy','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "性别比"||$content == "男女生"||$content == "男女比例"||$content == "性别比例"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院男女生比例查询','快看看哪个院男生最多','', 'http://weixin.yctu.edu.cn/xbb','点此直达','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn/xbb');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "十九大"||$content == "十九大测试"||$content == "十九大考试"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'十九大测试','@全体师生:来自十九大的一份考卷,请查收','', 'http://weixin.yctu.edu.cn/sjd','点此直达','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn/sjd');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "实训"||$content == "实训助手"||$content == "预约"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'实训助手','预约教室点这里','', 'http://weixin.yctu.edu.cn/sxzs','点此直达','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn/sxzs');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "学号"||$content == "新生"||$content == "分班"||$content == "班级"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院新生查询','快看看你的班级学号','', 'http://weixin.yctu.edu.cn/xscx','点此直达','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn/xscx');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "校纪校规"||$content == "校纪"||$content == "校规"||$content == "校纪校规测试"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院校纪校规测试','满分可参与抽奖哦','', 'http://weixin.yctu.edu.cn/xjxg','点此直达','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn/xjxg');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "校报"||$content == "报纸"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院报','点此直接跳转','', 'http://weixin.cuepa.cn/?s_id=501&period_timed=','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "校友会"||$content == "校友"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院校友之家','点此直接跳转','', 'http://xyzj.yctu.edu.cn/','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "报修"||$content == "后勤报修"||$content == "保修"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院报修系统','点此直接跳转'."\r\n".'账号和密码均默认为学号','', 'http://hqbx.yctu.edu.cn/mobile.html','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "教务"||$content == "教务系统"||$content == "教务网"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院教务系统','点此直接跳转'."\r\n".'账号为学号，密码默认为身份证号'."\r\n".'若忘记密码请联系二级学院教务秘书或教务处','', 'http://jwgl.yctu.edu.cn','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "有缘人"||$content == "找朋友"||$content == "老乡"){
								 $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','参加此活动必须实名制(绑定教务系统账号)','', 'http://weixin.yctu.edu.cn/yyr','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
									$number=$row['number'];
							
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'找朋友','点此直接跳转'."\r\n".'寻找同名、同乡、同校和生日相同的TA'."\r\n".'只有2017级的数据哦','', 'http://weixin.yctu.edu.cn/yyr','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
		
								}
							   echo $resultStr;  
                                $this->log($resultStr);  
							}elseif($content == "图书馆"||$content == "图书"||$content == "借书"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'盐城师范学院图书馆','点此直接跳转'."\r\n".'图书馆微信:yctulib','', 'http://www.niowoo.com/weixin.php/Home/Library/searchBook/library_id/523','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
     
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "ZY"||$content == "仲原"||$content == "zy"||$content == "作者"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'关于作者','仲原'."\r\n".'玩笔杆子和键盘，爱做梦却深刻现实'."\r\n \r\n".'QQ:970127005'."\r\n".'E-mail:cnyzzy@qq.com'."\r\n微博:我们相距几千公里\r\n \r\n"."2016至2017年承担所有开发工作",'', 'http://weibo.com/100900190?refer_flag=1005050010_&is_hot=1','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
       
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "关于"||$content == "小薇"||$content == "小薇工作室"){
								 $ArticleCount = 2;   
								$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'小薇工作室','盐城师范学院言是传媒六大组织之一'."\r\n".'承担学校新媒体工作，包括但不仅限于微信公众号、微博、QQ智慧平台'."\r\n\r\n我们是一个年轻的组织\r\n".'为了讲好盐师这个故事'."\r\n".'我们将竭尽全力'."\r\n\r\n"."欢迎加入我们",'', 'yscmxw@yctu.edu.cn','小薇平台','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn');  
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "部门电话"||$content == "办公电话"){
								 $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','实名制必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
									$number=$row['number'];
							
									  $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此查询办公电话','','http://weixin.yctu.edu.cn/img/bmdh.png', 'http://weixin.yctu.edu.cn/bgdh','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd'); 
		
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							}elseif($content == "老师电话"||$content == "私人电话"||$content == "教师电话"){
								 $ArticleCount = 2;   
								if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','实名制必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
                               	if($IsXwUser==1)
								{
									$number=$row['number'];
							if($row['type']!='2'&&$number!='15223232')
									{
										$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此使用其他功能','您无权使用本功能','', 'http://weixin.yctu.edu.cn','查询办公电话','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn/bgdh');
									}else{
									  $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此查询教师电话','','http://weixin.yctu.edu.cn/img/jsdh.jpg', 'http://weixin.yctu.edu.cn/jsdh','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd'); 
									}
								}
							   echo $resultStr;  
                                $this->log($resultStr); 
							}
							else{  
							//搜索区
							 if(eregi("教师电话+",$content))
	{
		$ArticleCount=2;
		if($IsXwUser==0)$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点击这里绑定身份','实名制必须绑定教务系统账号','', 'http://weixin.yctu.edu.cn','小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd');  
       	if($IsXwUser==1)
		{
		$number=$row['number'];
		if($row['type']!='2'&&$number!='15223232')
									{
									$resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'点此使用其他功能','您无权使用本功能','', 'http://weixin.yctu.edu.cn','查询办公电话','描述2','http://weixin.yctu.edu.cn/xw.jpg','http://weixin.yctu.edu.cn/bgdh');
									}else{
									$a=str_replace("教师电话"," ",$content);
        $postn=preg_replace("/(\s+)/",'',$a);				
	$row1=array();
	$row2=array();
	$row3=array();
if(!empty($postn)&&!is_numeric($postn)){
	$sql1="SELECT  *, count(id) AS num FROM teacherphone where bm like '%{$postn}%' group by bm order by id desc";
	$row1 = @$this->conn->fetch_all_array($sql1);

	$sql3="SELECT  * FROM teacherphone where name like '%{$postn}%' order by id desc";
	$row3 = @$this->conn->fetch_all_array($sql3);
}elseif(!empty($postn)&&is_numeric($postn)&&strlen($postn)>6){
		$sql21="SELECT  * FROM teacherphone where bgdh1 like '%{$postn}%' or bgdh2 like '%{$postn}%' or zd like '%{$postn}%' or sjhm1 like '%{$postn}%' or sjhm2 like '%{$postn}%' order by id desc";
	$row2 = @$this->conn->fetch_all_array($sql21);
}elseif(!empty($postn)&&is_numeric($postn)&&strlen($postn)==5){
		$sql4="SELECT  * FROM teacherphone where jtdh like '%{$postn}%' order by id desc";

	$row4 = @$this->conn->fetch_all_array($sql4);

}		 $details='';	
	 if(!empty($row3)) {
		
	$details.='[姓名搜索]关键词:'.$postn."\r\n\r\n";

		 //姓名搜索
		foreach((array)$row3 as $key=>$Child) {
			$details.='['.$Child['bm'].']'. $Child['name']."\r\n";
			if(!empty($Child['bgdh1'])||!empty($Child['bgdh2']))
			{$details.='办公电话:';
		if(!empty($Child['bgdh1']))$details.=$Child['bgdh1']." ";
		if(!empty($Child['bgdh2']))$details.=$Child['bgdh2']." ";
		$details.="\r\n";
		}
			if(!empty($Child['sjhm1'])||!empty($Child['sjhm2']))
			{$details.='手机:';
		if(!empty($Child['sjhm1']))$details.=$Child['sjhm1']." ";
		if(!empty($Child['sjhm2']))$details.=$Child['sjhm2']." ";
		$details.="\r\n";
		}
		
		if(!empty($Child['zd']))
			{$details.='宅电:';
		$details.=$Child['zd']." ";
		$details.="\r\n";
		}
		
		if(!empty($Child['jthd']))
			{$details.='短号:';
		$details.=$Child['jtdh']." ";
		$details.="\r\n";
		}
		$details.="\r\n";
		}
	 }
	 if(!empty($row4)) {
//短号
$details.='[短号搜索]关键词:'.$postn."\r\n\r\n";
		 foreach((array)$row4 as $key=>$Child) {
			$details.='['.$Child['bm'].']'. $Child['name']."\r\n";
			if(!empty($Child['bgdh1'])||!empty($Child['bgdh2']))
			{$details.='办公电话:';
		if(!empty($Child['bgdh1']))$details.=$Child['bgdh1']." ";
		if(!empty($Child['bgdh2']))$details.=$Child['bgdh2']." ";
		$details.="\r\n";
		}
			if(!empty($Child['sjhm1'])||!empty($Child['sjmh2']))
			{$details.='手机:';
		if(!empty($Child['sjmh1']))$details.=$Child['sjhm1']." ";
		if(!empty($Child['sjhm2']))$details.=$Child['sjhm2']." ";
		$details.="\r\n";
		}
		
		if(!empty($Child['zd']))
			{$details.='宅电:';
		$details.=$Child['zd']." ";
		$details.="\r\n";
		}
		
		if(!empty($Child['jthd']))
			{$details.='短号:';
		$details.=$Child['jtdh']." ";
		$details.="\r\n";
		}
		$details.="\r\n";
		}
		}
	 
	 if(!empty($row2)) {
		 //号码
		$details.='[号码搜索]关键词:'.$postn."\r\n\r\n"; 
		  foreach((array)$row4 as $key=>$Child) {
			$details.='['.$Child['bm'].']'. $Child['name']."\r\n";
			if(!empty($Child['bgdh1'])||!empty($Child['bgdh2']))
			{$details.='办公电话:';
		if(!empty($Child['bgdh1']))$details.=$Child['bgdh1']." ";
		if(!empty($Child['bgdh2']))$details.=$Child['bgdh2']." ";
		$details.="\r\n";
		}
			if(!empty($Child['sjhm1'])||!empty($Child['sjmh2']))
			{$details.='手机:';
		if(!empty($Child['sjmh1']))$details.=$Child['sjhm1']." ";
		if(!empty($Child['sjhm2']))$details.=$Child['sjhm2']." ";
		$details.="\r\n";
		}
		
		if(!empty($Child['zd']))
			{$details.='宅电:';
		$details.=$Child['zd']." ";
		$details.="\r\n";
		}
		
		if(!empty($Child['jthd']))
			{$details.='短号:';
		$details.=$Child['jtdh']." ";
		$details.="\r\n";
		}
		$details.="\r\n";
		}
		
	 }
	 if(!empty($row1)) {
		 $details.='[部门搜索]关键词:'.$postn."\r\n\r\n"; 
		  foreach((array)$row1 as $key=>$Child){
			  $details.=$Child['bm'].':' .$Child['num']."人\r\n";

		}
		$details.="\r\n";
	 }
		if(empty($details))$details='无结果';								
		 $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,'教师电话搜索',$details,'', 'http://weixin.yctu.edu.cn/jsdh/s?searchpost='.$postn,'小薇平台使用说明','描述2','http://weixin.yctu.edu.cn/app/home/model/images/what.png','http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506708634&idx=1&sn=2bbd65ca9081fd7b8a4639f7271347a1&chksm=008a856037fd0c76e4dbdbfdb7e0d2bd92216cf2df666556f4fcbf3f238b0a84d2d7e4727527&mpshare=1&scene=23&srcid=0802GjDzUHhw6oqs4DYgqTkJ#rd'); 
									}
								}
						
	}
ob_clean();
	echo $resultStr;  						
				    $this->log($resultStr); 			
							$this->log('TIME:'.TIME());	
							
							
							
							
							
							
							
							
							
                                //回复文本信息  
                               // $textTpl = "<xml>  
                                 //           <ToUserName><![CDATA[%s]]></ToUserName>  
                                   //         <FromUserName><![CDATA[%s]]></FromUserName>  
                                  //          <CreateTime>%s</CreateTime>  
                                   //         <MsgType><![CDATA[%s]]></MsgType>  
                                   //         <Content><![CDATA[%s]]></Content>  
                                   //         <FuncFlag>0</FuncFlag>  
                                   //         </xml>";               
                               // $contentStr = '你发送的信息是：接收人：'.$toUsername.',发送人:'.$fromUsername.',消息类型：'.$MsgType.',消息内容：'.$content.' [测试]';  
                               // $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);  
                               // echo $resultStr;  
                               // $this->log($resultStr);  
                            }  
                        }else{  
                            echo "Input something...";  
                            $this->log($resultStr);  
                        }  
                          
                      //如果是图片消息  
                    }elseif ($MsgType == 'image'){  
                        $MediaId = $postObj->MediaId;//图片消息媒体id，可以调用多媒体文件下载接口拉取数据。  
                        $imageTpl = "<xml>  
                                    <ToUserName><![CDATA[%s]]></ToUserName>  
                                    <FromUserName><![CDATA[%s]]></FromUserName>  
                                    <CreateTime>%s</CreateTime>  
                                    <MsgType><![CDATA[%s]]></MsgType>  
                                    <Image>  
                                    <MediaId><![CDATA[%s]]></MediaId>  
                                    </Image>  
                                    </xml>";  
                        $resultStr = sprintf($imageTpl, $fromUsername, $toUsername, $time, $MsgType, $MediaId);  
                        echo $resultStr;  
                        $this->log("自动响应图片信息");  
                        $this->log($resultStr);  
                          
                    //如果是视频  
                    }else if($MsgType == 'video'){  
                        $MediaId = $postObj->MediaId;//视频消息媒体id，可以调用多媒体文件下载接口拉取数据。  
                        $ThumbMediaId = $postObj->ThumbMediaId;//视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。   
                        $videoTpl = "<xml>  
                                    <ToUserName><![CDATA[%s]]></ToUserName>  
                                    <FromUserName><![CDATA[%s]]></FromUserName>  
                                    <CreateTime>%s</CreateTime>  
                                    <MsgType><![CDATA[%s]]></MsgType>  
                                    <Video>  
                                    <MediaId><![CDATA[%s]]></MediaId>  
                                    <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>  
                                    <Title><![CDATA[%s]]></Title>  
                                    <Description><![CDATA[%s]]></Description>  
                                    </Video>   
                                    </xml>";  
                        $resultStr = sprintf($videoTpl, $fromUsername, $toUsername, $time, $MsgType, $MediaId,$ThumbMediaId,'我是标题','我是描述');  
                        echo $resultStr;  
                        $this->log("自动响应视频信息".$ThumbMediaId);  
                        $this->log($resultStr);  
                          
                    //如果是地理位置  
                    }else if($MsgType == 'location'){  
                        $Location_X = $postObj->Location_X;//维度  
                        $Location_Y = $postObj->Location_Y;//经度  
                        $Scale = $postObj->Scale;//地图缩放大小  
                        $Label = $postObj->Label;//地里位置信息  
                          //回复图文消息,ArticleCount图文消息个数,多条图文消息信息，默认第一个item为大图  
                                $ArticleCount = 2;   
                                $newsTpl = "<xml>  
                                <ToUserName><![CDATA[%s]]></ToUserName>  
                                <FromUserName><![CDATA[%s]]></FromUserName>  
                                <CreateTime>%s</CreateTime>  
                                <MsgType><![CDATA[%s]]></MsgType>  
                                <ArticleCount>%s</ArticleCount>  
                                <Articles>  
                                <item>  
                                <Title><![CDATA[%s]]></Title>   
                                <Description><![CDATA[%s]]></Description>  
                                <PicUrl><![CDATA[%s]]></PicUrl>  
                                <Url><![CDATA[%s]]></Url>  
                                </item>  
                                <item>  
                                <Title><![CDATA[%s]]></Title>  
                                <Description><![CDATA[%s]]></Description>  
                                <PicUrl><![CDATA[%s]]></PicUrl>  
                                <Url><![CDATA[%s]]></Url>  
                                </item>  
                                </Articles>  
                                </xml>";  
                                $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, 'news', $ArticleCount,$Label,'查看如何从学校前往此处','', 'http://apis.map.qq.com/uri/v1/routeplan?type=bus&from=盐城师范学院&tooord='.$Location_X.','.$Location_Y.'&to='.$Label.'&policy=1&referer=YCTU-1958','查看如何从此处前往学校','BY:ZY','http://weixin.yctu.edu.cn/app/home/model/images/map.png','http://apis.map.qq.com/uri/v1/routeplan?type=bus&fromcoord='.$Location_X.','.$Location_Y.'&to=盐城师范学院&policy=1&referer=YCTU-1958');  
                                echo $resultStr;  
                                $this->log($resultStr);  

                        echo $resultStr;  
                        $this->log($resultStr);  
                          
                    //如果是事件  
                    }else if($MsgType == 'event'){  
                          
                        $Event = $postObj->Event;  
                          
                        //subscribe(关注，也叫订阅)  
                        if($Event == 'subscribe'){  
                              
                            $EventKey = $postObj->EventKey;//事件KEY值，qrscene_为前缀，后面为二维码的参数值  
                              
                            //未关注时，扫描二维码  
                            if(!empty($EventKey)){  
                                $Ticket = $postObj->Ticket;//二维码的ticket，可用来换取二维码图片  
                                $this->log($fromUsername.'扫描二维码关注！EventKey='.$EventKey.',Ticket='.$Ticket);  
                            }else{  
                                $this->log($fromUsername.'关注我了！');  
                            }  
                              
                        //unsubscribe(取消关注)  
                        }elseif ($Event == 'unsubscribe'){  
                            $this->log($fromUsername.'取消关注我了！');  
                              
                        //已关注时，扫描二维码事件  
                        }elseif($Event == 'SCAN' || $Event == 'scan'){  
                            $EventKey = $postObj->EventKey;//事件KEY值，是一个32位无符号整数，即创建二维码时的二维码scene_id  
                            $Ticket = $postObj->Ticket;//二维码的ticket，可用来换取二维码图片  
                            $this->log($fromUsername.'关注我了！EventKey='.$EventKey.',Ticket='.$Ticket);  
                          
                        //菜单点击事件  
                        }elseif($Event == 'CLICK'){  
                            $EventKey = $postObj->EventKey;//事件KEY值，与自定义菜单接口中KEY值对应  
                            //回复文本信息  
                            $textTpl = "<xml>  
                                        <ToUserName><![CDATA[%s]]></ToUserName>  
                                        <FromUserName><![CDATA[%s]]></FromUserName>  
                                        <CreateTime>%s</CreateTime>  
                                        <MsgType><![CDATA[%s]]></MsgType>  
                                        <Content><![CDATA[%s]]></Content>  
                                        <FuncFlag>0</FuncFlag>  
                                        </xml>";               
                            $contentStr = '你点击了菜单，菜单项key='.$EventKey;  
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);  
                            echo $resultStr;  
                            $this->log($resultStr);  
  
                        //其他事件类型  
                        }else{  
                            $this->log('事件类型：'.$Event);  
                        }  
                          
                    //其他消息类型，链接、语音等  
                    }else{  
                        //回复文本信息  
                        $textTpl = "<xml>  
                                    <ToUserName><![CDATA[%s]]></ToUserName>  
                                    <FromUserName><![CDATA[%s]]></FromUserName>  
                                    <CreateTime>%s</CreateTime>  
                                    <MsgType><![CDATA[%s]]></MsgType>  
                                    <Content><![CDATA[%s]]></Content>  
                                    <FuncFlag>0</FuncFlag>  
                                    </xml>";               
                        $contentStr = '消息类型：'.$MsgType.'我们还没做处理。。。。';  
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);  
                        echo $resultStr;  
                        $this->log($resultStr);  
                    }  
      
            }else {  
                echo "";  
                exit;  
            }  
        }else{  
                $this->log("验证签名未通过！");        
        }  
    }  
    /** 
     * 记录请求信息 
     */  
    function log_request_info() {  
        $post = '';  
        foreach($_POST   as   $key   =>   $value)   {   
            $post = $post.$key.' : '.$value.' , ';   
        }   
        $get = '';  
        foreach($_GET   as   $key   =>   $value)   {   
            $get = $get.$key.' : '.$value.' , ';   
        }   
        $this->log("get信息：".$get);  
        $this->log("post信息：".$post);  
    }  
    /** 
     * 记录日志 
     * @param $str 
     * @param $mode 
     */  
    function log($str){  
        $mode='a';//追加方式写  
        $file = "log.txt";  
        $oldmask = @umask(0);  
        $fp = @fopen($file,$mode);  
        @flock($fp, 3);  
        if(!$fp)  
        {  
            Return false;  
        }  
        else  
        {  
            @fwrite($fp,$str);  
            @fclose($fp);  
            @umask($oldmask);  
            Return true;  
        }  
    }   
}  
  
?>
?>