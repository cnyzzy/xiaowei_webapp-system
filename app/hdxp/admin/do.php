<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 

define("cecharoot",ZSystem."/data/app/hdxp");


if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
$Hdxp = new Hdxp($DB);
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "add":
	
$number=$_SESSION['admin']['id'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['stype']))$stype=$_POST['stype'];
			if(isset($_POST['swhere']))$swhere=$_POST['swhere'];
					if(isset($_POST['xtime']))$xtime=$_POST['xtime'];
			if(isset($_POST['xwhere']))$xwhere=$_POST['xwhere'];
			if(isset($_POST['place']))$place=$_POST['place'];
					if(isset($_POST['video']))$video=$_POST['video'];
			if(isset($_POST['time']))$time=$_POST['time'];
			if(isset($_POST['opentime']))$opentime=strtotime($_POST['opentime']);
			if(isset($_POST['endtime']))$endtime=strtotime($_POST['endtime']);
			if(isset($_POST['content']))$content=$_POST['content'];
				if(isset($_POST['lcontent']))$lcontent=$_POST['lcontent'];
			if(isset($_POST['seat']))
			{
				$keyword_list = trim($_POST['seat']);
$keyword_arr = explode("\r\n", $keyword_list);

				$seat=json_encode($keyword_arr);
			}
			if(isset($_POST['owner']))$owner=$_POST['owner'];
				if(isset($_POST['firstimg']))$firstimg=$_POST['firstimg'];
			if(isset($_POST['smallimg']))$smallimg=$_POST['smallimg'];
			$arrcimg=array();
			if(isset($_POST['cimg1']))$arrcimg[]=$_POST['cimg1'];
if(isset($_POST['cimg2']))$arrcimg[]=$_POST['cimg2'];
			if(isset($_POST['cimg3']))$arrcimg[]=$_POST['cimg3'];
if(isset($_POST['cimg4']))$arrcimg[]=$_POST['cimg4'];
			if(isset($_POST['cimg5']))$arrcimg[]=$_POST['cimg5'];
if(isset($_POST['cimg6']))$arrcimg[]=$_POST['cimg6'];
	if(!empty($arrcimg))
			{

				$cimg=json_encode($arrcimg);
			}
	

		$Hdxp->SendHdxp($number,$title,$time,$place,$opentime,$endtime,$seat,$firstimg,$smallimg,$content,$lcontent,$cimg,$owner,'0',$swhere,$stype,$xwhere,$xtime,$video);
		header("Location:/admin/hdxp/");
break;	
	case "edit":

$id = $_POST['id'];
	if($id){
			$array = array(
				'id'	=> $id,
			);
	}$array['number']=$_SESSION['admin']['id'];
			if(isset($_POST['title']))$array['title']=$_POST['title'];
			if(isset($_POST['stype']))$array['stype']=$_POST['stype'];
			if(isset($_POST['swhere']))$array['swhere']=$_POST['swhere'];
					if(isset($_POST['xtime']))$array['xtime']=$_POST['xtime'];
			if(isset($_POST['xwhere']))$array['xwhere']=$_POST['xwhere'];
			if(isset($_POST['place']))$array['place']=$_POST['place'];
					if(isset($_POST['video']))$array['video']=$_POST['video'];
			if(isset($_POST['time']))$array['time']=$_POST['time'];
			if(isset($_POST['opentime']))$array['opentime']=strtotime($_POST['opentime']);
			if(isset($_POST['endtime']))$array['endtime']=strtotime($_POST['endtime']);
			if(isset($_POST['content']))$array['content']=$_POST['content'];
				if(isset($_POST['lcontent']))$array['lcontent']=$_POST['lcontent'];
			if(isset($_POST['seat']))
			{
				$keyword_list = trim($_POST['seat']);
$keyword_arr = explode("\r\n", $keyword_list);

				$array['seat']=json_encode($keyword_arr);
			}
			if(isset($_POST['owner']))$array['owner']=$_POST['owner'];
				if(isset($_POST['firstimg']))$array['firstimg']=$_POST['firstimg'];
			if(isset($_POST['smallimg']))$array['smallimg']=$_POST['smallimg'];
			$arrcimg=array();
			if(isset($_POST['cimg1']))$arrcimg[]=$_POST['cimg1'];
if(isset($_POST['cimg2']))$arrcimg[]=$_POST['cimg2'];
			if(isset($_POST['cimg3']))$arrcimg[]=$_POST['cimg3'];
if(isset($_POST['cimg4']))$arrcimg[]=$_POST['cimg4'];
			if(isset($_POST['cimg5']))$arrcimg[]=$_POST['cimg5'];
if(isset($_POST['cimg6']))$arrcimg[]=$_POST['cimg6'];
	if(!empty($arrcimg))
			{

				$array['cimg']=json_encode($arrcimg);
			}
			$array['ip']=getIP();

			$array['isshow']=0;
			if(isset($_POST['isshow']))$array['isshow']=1;
			$ID=$Hdxp->EditHdxp($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		
		 header("Location:/admin/hdxp/edit/$id/1");
break;	
	case "deletet":
	$id = $_POST['id'];
$sql = "DELETE FROM hdxp_seat WHERE id ='{$id}'";
		$row = $DB->query($sql);
		echo '1';	
		break;
	case "delete":
	$id = $_POST['id'];
$sql = "DELETE FROM hdxp WHERE id ='{$id}'";
		$row = $DB->query($sql);
		echo '1';	
		break;
case "editt":
	$id = $_POST['id'];
	$name = $_POST['name'];
$Arr = array(
				'title'	=> $name,
			);
		$row = $DB->updateArr('ks_question',$Arr,"WHERE id ='{$id}'");
		 echo '1';
break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Hdxp->OkHdxpSeat($id,$isok);
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
        echo '{"status":1,"content":"OK'.@$un.'","url":"'.$resultfile.'"}';
    }else{
        echo '{"status":0,"content":"F"}';
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
?>