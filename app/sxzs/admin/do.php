<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 

define("cecharoot",ZSystem."/data/app/cjhd");


if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
$Cjhd = new Cjhd($DB);
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "add":
	
$number=$_SESSION['admin']['id'];
			if(isset($_POST['title']))$title=$_POST['title'];

			if(isset($_POST['time']))$time=$_POST['time'];

			if(isset($_POST['endtime']))$endtime=strtotime($_POST['endtime']);
			if(isset($_POST['content']))$content=$_POST['content'];
				if(isset($_POST['lcontent']))$lcontent=$_POST['lcontent'];


		$Cjhd->SendCjhd($title,$time,$endtime,$content,$lcontent);
		header("Location:/admin/cjhd/");
break;	
	case "edit":

$id = $_POST['id'];
	if($id){
			$array = array(
				'id'	=> $id,
			);
			if(isset($_POST['title']))$array['title']=$_POST['title'];

			if(isset($_POST['time']))$array['time']=$_POST['time'];
			if(isset($_POST['endtime']))$array['endtime']=strtotime($_POST['endtime']);
			if(isset($_POST['content']))$array['content']=$_POST['content'];
				if(isset($_POST['lcontent']))$array['lcontent']=$_POST['lcontent'];
			

			$array['isopen']=0;
			if(isset($_POST['isopen']))$array['isopen']=1;
			$ID=$Cjhd->EditCjhd($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
	}
		 header("Location:/admin/cjhd/edit/$id/1");
break;	
	case "deletet":
	$id = $_POST['id'];
$sql = "DELETE FROM cjhd_on WHERE id ='{$id}'";
		$row = $DB->query($sql);
		echo '1';	
		break;
	case "delete":
	$id = $_POST['id'];
$sql = "DELETE FROM cjhd WHERE id ='{$id}'";
		$row = $DB->query($sql);
		echo '1';	
		break;
case "editt":
	$id = $_POST['id'];

$Arr = array(
				'title'	=> $name,
			);
		$row = $DB->updateArr('ks_question',$Arr,"WHERE id ='{$id}'");
		 echo '1';
break;
case "cj":
	$id = $_POST['id'];

$array=$Cjhd->GetCjhdon($id);
//PRINT_R($array);
$Cjhd->Okcjhd_on($id,'0');
$nickname=@$array['nickname'];
$sid=@$array['sid'];
$number=@$array['number'];
$wxid=@$array['wxid'];
$sq3 = "SELECT * FROM  cjhd_re WHERE wxid = '".$wxid."' order by addtime ASC LIMIT 1";
$result3 =$DB->once_fetch_array($sq3);
	
 //if(!empty($result3))printjson("ok",'已登记');	
if($sid&&$number&&$nickname&&$name&&$wxid){
	$ip=getIP();
			$id = $DB->create('cjhd_re',array(
				'sid'       => @$sid,
				'onid'       => @$onid,
				'name'       => @$name,
				'nickname'       => @$nickname,
				'wxid'       => @$wxid,
				'number'       => @$number,
				'cj'  => '',		
				'ip'	=> @$ip,
				'addtime'	=> time(),
				'stime'	=> '',
			));
	//printjson("ok",'登记成功');	
			}else{
			printjson("error",'数据验证有误');	
}

		 echo '1';
break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Cjhd->OkCjhdSeat($id,$isok);
		echo '1';	
		break;
case "updateimg":
$timee=date("Y-m-d");
	 $dir=cecharoot.'/'.$timee.'/';
if(!is_dir($dir))mkdir($dir,0700);
    $base64_string = @$_POST['base64_string'];
    $fileName = getRandStr(12,false).'.jpge';
    $savename = $dir.$fileName;//localResizeIMG压缩后的图片都是jpeg格式
$resultfile=$timee.'/'.$fileName;
    $savepath = $savename; 
 if(file_exists($savepath)) {
	 unlink($savepath);
	 $un="，已覆盖";
 }
    $image = base64_to_img( $base64_string, $savepath );
    if($image){
        echo '{"status":1,"content":"上传成功'.@$un.'","url":"'.$resultfile.'"}';
    }else{
        echo '{"status":0,"content":"上传失败"}';
    } 


    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
      exit; // finish preflight CORS requests here
    }
    if ( !empty($_REQUEST[ 'debug' ]) ) {
      $random = rand(0, intval($_REQUEST[ 'debug' ]) );
      if ( $random === 0 ) {
        header("HTTP/1.0 500 Internal Server Error");
        exit;
      }
    }
break;
	case "addt":
	
			$name	= $_POST['name'];
		if($name){
			$messageid = $DB->create('ks_question',array(

				'title'		=> $name,
				'appid'	=> '1',
			));

		} echo '1';
break;	
	case "addo":
	
			$name	= $_POST['name'];
			$pid	= $_POST['id'];
		if($name){
			$messageid = $DB->create('ks_option',array(
'pid'		=> $pid,
				'content'		=> $name,
				'appid'	=> '1',
			));

		} echo '1';
break;
}
    function base64_to_img( $base64_string, $output_file ) {
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        return( $output_file ); 
    } 
	function printjson($type,$msg)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}
?>