<?php
define('RROOT',ZSystem.'/data/app/dfcx/');

 $_SESSION['dfid']=$number;
 $a = empty($params[0]) ? '0':($params[0]);

 //__LASTFOCUS
 //__EVENTTARGET
 if(empty($_SESSION['dfidcode'])||$a=='0')$_SESSION['dfidcode']=IDcode();
 IF(EMPTY($_SESSION['dfidcode']))
 {$ARRAR['ok']=9;
	echo json_encode($ARRAR); EXIT;
 }
echo json_encode(getjsondate($a,$_SESSION['dfidcode'],$params,$DB));
function getjsondate($type,$id,$params,$DB){
	$Dfcx = new Dfcx($DB);
	$number=$_SESSION['zid']['number'];
	$name=$_SESSION['zid']['name'];
	if($type==1){
	 $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,'http://210.28.176.221/isimscx/default.aspx'); 
   curl_setopt($curl3, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl3, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl3, CURLOPT_HEADER, 0);
        curl_setopt($curl3, CURLOPT_TIMEOUT, 8);
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl3, CURLOPT_URL, 'http://210.28.176.221/isimscx/default.aspx');//登陆后要从哪个页面获取信息
curl_setopt($curl3, CURLOPT_POST, 1);
$wb='';
$type=count($params)-1;
switch ($type)
	{
	case '1':
	$wb='xiaoqu';
	$post['xiaoqu']=$params[1];
	$post['drlouming']='';
	$post['ablou']='';
	$post['drceng']='';
	$post['drfangjian']='';
	break; 
	case '2':
	$wb='drlouming';
$post['xiaoqu']=$params[1];
	$post['drlouming']=$params[2];
	$post['ablou']='';
	$post['drceng']='';
	$post['drfangjian']='';
	break; 
	case '3':
	$wb='ablou';
$post['xiaoqu']=$params[1];
	$post['drlouming']=$params[2];
	$post['ablou']=$params[3];
	$post['drceng']='';
	$post['drfangjian']='';
	break;
	case '4':
	$wb='drceng';
$post['xiaoqu']=$params[1];
	$post['drlouming']=$params[2];
	$post['ablou']=$params[3];
	$post['drceng']=$params[4];
	$post['drfangjian']='';
	break;
	case '5':$wb='';
		$post['xiaoqu']=$params[1];
	$post['drlouming']=$params[2];
	$post['ablou']=$params[3];
	$post['drceng']=$params[4];
	$post['drfangjian']=$params[5];

	$cookie_jar = ZSystem.'/data/app/dfcx/temp/';
	curl_setopt($curl3, CURLOPT_COOKIEJAR, $cookie_jar.$number.".php");
	$post['radio']='usedR';
$post['ImageButton1.x']=68;
$post['ImageButton1.y']=15;
	break;  
	default:
	$wb='';
	}
$type2=count($params);
switch ($type2)
	{
	case '2':
$ww="drlouming";
	break; 
	case '3':
	$ww='ablou';
	break;
	case '4':
	$ww='drceng';
	break;
	case '5':
	$ww='drfangjian';
	break;  

	}	
$post['__EVENTTARGET'] =$wb;
$post['__EVENTARGUMENT'] ='';
$post['__VIEWSTATE'] =$id;
$post['__VIEWSTATEGENERATOR'] ='';
$post['__LASTFOCUS'] =urlencode(iconv("utf-8","gbk",""));;
  curl_setopt($curl3, CURLOPT_POSTFIELDS, http_build_query($post));
$result2= curl_exec($curl3);
	 	 $result2 = @iconv('gbk', 'utf-8', $result2);
		 if($type!='5'&&$type!='0'){
		@preg_match('/<select name=\"'.$ww.'\"(.*?)>(.*?)<\/select>/ims', $result2, $block);
		@preg_match_all('/<option value=\"(.*?)\">(.*?)<\/option>/ims',$block[2],$block1);
		 $ARRAR['value']=$block1[1];
		 $ARRAR['name']=$block1[2];
if(EMPTY($ARRAR['value'][0])){
	unset($ARRAR['value'][0]);
	unset($ARRAR['name'][0]);
	sort($ARRAR['value']);
	sort($ARRAR['name']);
		 
}
		 $ARRAR['ok']=1;
		 }
		 $pattern           = '/<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)" \/>/is';
     preg_match_all($pattern, $result2, $matches);
     $res            = @$matches[1][0];
	  if($type=='0'&&!EMPTY($res)){
		$ARRAR['ok']=1;  
	  }
	    if($type=='0'&&EMPTY($res)){
		$ARRAR['ok']=0;  }
	 if($type=='5'){

		if(is_file(RROOT."temp/".$number.".php")){ 
		 $info=$Dfcx->GetRoomInfo($number);
		 if(EMPTY($info))$Dfcx->SendRoomInfo($number,$name,$params[1],$params[2],$params[3],$params[4],$params[5],'');
		 if(!EMPTY($info)&&EMPTY($info['room'])){
			 $Dfcx->DInfo($info['id']);
			 $Dfcx->SendRoomInfo($number,$name,$params[1],$params[2],$params[3],$params[4],$params[5],'');
		 }
		 $ARRAR['ok']=2;}else{ $ARRAR['ok']=0;}
		 }
	$_SESSION['dfidcode']=$res;
	 return $ARRAR;
	}ELSE IF($type==2){
		if(is_file(RROOT.$number.".php")) 
	{
		$arr1 = SetRead( '/system/data/app/dfcx/'.$number.'.php');
		$ARRAR['gm']=@$arr1['gm'];
$ARRAR['bz']=@$arr1['bz'];
$ARRAR['sy']=@$arr1['sy'];
$ARRAR['yy']=@$arr1['yy'];
	}else{
		$ch = curl_init();
  curl_setopt ($ch,CURLOPT_REFERER,'http://210.28.176.221/isimscx/default.aspx'); 
curl_setopt($ch, CURLOPT_URL, "http://210.28.176.221/isimscx/usedRecord.aspx");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   
	$cookie_jar = ZSystem.'/data/app/dfcx/temp/';
curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie_jar.$number.".php");
$html=curl_exec($ch);
preg_match('/<h6>(.*?)<\/h6>/ims', $html, $block);
@preg_match_all('/<span class="number orange">(.*?)<\/span>/ims',$block[1],$block1);

$ARRAR['gm']=@$block1[1][0];
$ARRAR['bz']=@$block1[1][1];
$ARRAR['sy']=@$block1[1][2];
$ARRAR['yy']=@$block1[1][3];
 $pattern           = '/<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)" \/>/is';
     preg_match_all($pattern, $html, $matches);
     $res            = @$matches[1][0];
	 $_SESSION['dfcxid']=$res;
	  $pattern           = '/<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="(.*?)" \/>/is';
     preg_match_all($pattern, $html, $matches);
     $res            = @$matches[1][0];
	 $_SESSION['dfcxid2']=$res;
curl_close($ch);
}
if(EMPTY($ARRAR['gm'])&&EMPTY($ARRAR['bz'])&&EMPTY($ARRAR['sy'])&&EMPTY($ARRAR['yy'])){$ARRAR['ok']=0;}else{
	$ARRAR['ok']=1;
	 SSWrite( $ARRAR ,$number. '.php');
	
	}

return $ARRAR;		
		
	}ELSE IF($type==3){
		if(is_file(RROOT.$number."d.php")) 
	{
		$arr1 = SetRead( '/system/data/app/dfcx/'.$number.'d.php');

$arrayy=@$arr1;

	}else{
		$ch = curl_init();
  curl_setopt ($ch,CURLOPT_REFERER,'http://210.28.176.221/isimscx/usedRecord.aspx'); 
curl_setopt($ch, CURLOPT_URL, "http://210.28.176.221/isimscx/usedRecord.aspx");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
	$cookie_jar = ZSystem.'/data/app/dfcx/temp/';
curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie_jar.$number.".php");
$html=curl_exec($ch);
preg_match('/<h6>(.*?)<\/h6>/ims', $html, $block);

@preg_match_all('/<span class="number orange">(.*?)<\/span>/ims',$block[1],$block1);
$post['txtstart'] =date('Y-m-d', strtotime('-10 days'));
$post['txtend'] =date('Y-m-d'); 
$post['__VIEWSTATE'] =$_SESSION['dfcxid'];
$post['__EVENTVALIDATION'] =$_SESSION['dfcxid2'];
$post['btnser'] ="查询";
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
$html=curl_exec($ch);
if(preg_match('/<table (.*?) class=\"dataTable\">(.*?)<\/table>/ims', $html, $block)){
			$sj= $block[2];
			$arrayy = array();		
					preg_match_all('/<tr(.*?)>(.*?)<\/tr>/ims',$sj ,$sblock);
				
				
					foreach($sblock[2] as $c=>$v){
					preg_match_all('/<td(.*?)>(.*?)<\/td>/ims',$v,$str_block);
					$arrayy[$c]=$str_block[2];
					
					
					}
				
			}
 if(!EMPTY($arrayy)){
	 SSWrite( $arrayy ,$number. 'd.php');
$info=$Dfcx->GetRoomInfo($number);
		
		 if(!EMPTY($info)&&EMPTY($info['room'])){
			 $Arr['room']=$arrayy[1][1];
			  $Arr['uptime']=time();
			 $Dfcx->EditInfo($info['id'],$Arr);
		 }
 }
	curl_close($ch);}
if(EMPTY($arrayy))$arrayy['ok']=0;
sort($arrayy);

return $arrayy ;		
		
	}ELSE IF($type==4){
		 if(is_file(RROOT.$number.".php")){
				unlink( RROOT.$number.".php");
				 }
			 if(is_file(RROOT.$number."d.php")){
				unlink( RROOT.$number."d.php");
				 }
				 $info=$Dfcx->GetRoomInfo($number);
				  $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,'http://210.28.176.221/isimscx/default.aspx'); 
   curl_setopt($curl3, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl3, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl3, CURLOPT_HEADER, 0);
        curl_setopt($curl3, CURLOPT_TIMEOUT, 8);
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl3, CURLOPT_URL, 'http://210.28.176.221/isimscx/default.aspx');//登陆后要从哪个页面获取信息
curl_setopt($curl3, CURLOPT_POST, 1);
				 		$post['xiaoqu']=$info['xq'];
	$post['drlouming']=$info['lc'];
	$post['ablou']=$info['abl'];
	$post['drceng']=$info['lc'];
	$post['drfangjian']=$info['fj'];

	$cookie_jar = ZSystem.'/data/app/dfcx/temp/';
	curl_setopt($curl3, CURLOPT_COOKIEJAR, $cookie_jar.$number.".php");
	$post['radio']='usedR';
$post['ImageButton1.x']=68;
$post['ImageButton1.y']=15;
 $Arr['uptime']=time();
			 $Dfcx->EditInfo($info['id'],$Arr);
echo"1";EXIT;
	}
		

}
 	function IDcode(){ 

     $url               = 'http://210.28.176.221/isimscx/default.aspx';
     $result            = curl_request($url);
     if (empty($result)) {
     return array(
            'status'    => "0",
            'message'   => "模拟登陆失败，网址可能改变",
         );    
     }
	 
   
     $pattern           = '/<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)" \/>/is';
     preg_match_all($pattern, $result, $matches);
     $res            = $matches[1][0]; 
	return $res;
	
}	 
    function curl_request($url,$post='',$referer=''){//$cookie='', $returnCookie=0,
        $curl   = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 8);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        }

        if ($referer) {
             curl_setopt($curl, CURLOPT_REFERER, $referer);
        }
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;       
}
function SSWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}