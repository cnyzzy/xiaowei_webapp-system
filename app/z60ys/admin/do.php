<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
define("cecharoot",ZSystem."/data/app/z60ys");

$Z60ys = new Z60ys($DB);
if($_SESSION['admin']['rightint']<7&&(strtolower(substr($Action, 0, strlen($_SESSION['admin']['rightapp']))) !==strtolower($_SESSION['admin']['rightapp']))){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "delete":
	$id = $_POST['id'];
		$Z60ys->DZ60ys($id);
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Z60ys->IsokZ60ys($id,$isok);
		echo '1';	
		break;
	case "edit":

		$id = $_POST['id'];
		if($id){
			$array = array(
				'title'	=> $_POST['title'],
			);
			if(isset($_POST['groupid']))$array['groupid']=$_POST['groupid'];
			if(isset($_POST['editor']))$array['editor']=$_POST['editor'];
			if(isset($_POST['dcontent']))$array['dcontent']=$_POST['dcontent'];
			if(isset($_POST['content']))$array['content']=$_POST['content'];
			$array['isok']=0;
			$array['istop']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			if(isset($_POST['istop']))$array['istop']=1;
			$Z60ys->EditZ60ys($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/Z60ys/edit/$id/1");
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
	case "add":
			if(isset($_POST['groupid']))$groupid=$_POST['groupid'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['editor']))$editor=$_POST['editor'];
			if(isset($_POST['dcontent']))$dcontent=$_POST['dcontent'];
			if(isset($_POST['content']))$content=$_POST['content'];
			if(isset($_POST['istop']))$istop=1;
		$Z60ys->SendZ60ys($groupid,$title,$editor,$dcontent,$content,$istop);
		header("Location:/admin/Z60ys/");
break;	
	case "imgadd":
			if(isset($_POST['groupid']))$groupid=$_POST['groupid'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['editor']))$editor=$_POST['editor'];
			if(isset($_POST['dcontent']))$d['dcontent']=$_POST['dcontent'];
			if(isset($_POST['smallimg']))$d['smallimg']=$_POST['smallimg'];
if (empty($d['smallimg']))$d['smallimg']="/app/z60ys/model/images/yctu.png";	
		$dcontent = addslashes(json_encode($d));

			if(isset($_POST['content'])){
			$keyword_list = trim($_POST['content']);
			$keyword_arr = explode("\r\n", $keyword_list);
		$content = addslashes(json_encode($keyword_arr));
			}
			if(isset($_POST['istop']))$istop=1;
		$Z60ys->SendZ60ys($groupid,$title,$editor,$dcontent,$content,$istop);
		header("Location:/admin/Z60ys/");
break;
	case "imgedit":

		$id = $_POST['id'];
		if($id){
			$array = array(
				'title'	=> $_POST['title'],
			);
			if(isset($_POST['groupid']))$array['groupid']=$_POST['groupid'];
			if(isset($_POST['editor']))$array['editor']=$_POST['editor'];
if(isset($_POST['dcontent']))$d['dcontent']=$_POST['dcontent'];
if(isset($_POST['smallimg']))$d['smallimg']=$_POST['smallimg'];
if (empty($d['smallimg']))$d['smallimg']="/app/z60ys/model/images/yctu.png";	
		$array['dcontent'] = addslashes(json_encode($d));

			if(isset($_POST['content'])){
			$keyword_list = trim($_POST['content']);
			$keyword_arr = explode("\r\n", $keyword_list);
		$array['content'] = addslashes(json_encode($keyword_arr));
			}
			$array['isok']=0;
			$array['istop']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			if(isset($_POST['istop']))$array['istop']=1;
			$Z60ys->EditZ60ys($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/Z60ys/imgedit/$id/1");
break;
	case "vadd":
			if(isset($_POST['groupid']))$groupid=$_POST['groupid'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['editor']))$editor=$_POST['editor'];
			if(isset($_POST['dcontent']))$d['dcontent']=$_POST['dcontent'];
			if(isset($_POST['smallimg']))$d['smallimg']=$_POST['smallimg'];
if (empty($d['smallimg']))$d['smallimg']="/app/z60ys/model/images/yctu.png";	
		$dcontent = addslashes(json_encode($d));

			if(isset($_POST['content'])){
		$content = trim($_POST['content']);
			}
			if(isset($_POST['istop']))$istop=1;
		$Z60ys->SendZ60ys($groupid,$title,$editor,$dcontent,$content,$istop);
		header("Location:/admin/Z60ys/");
break;
	case "vedit":

		$id = $_POST['id'];
		if($id){
			$array = array(
				'title'	=> $_POST['title'],
			);
			if(isset($_POST['groupid']))$array['groupid']=$_POST['groupid'];
			if(isset($_POST['editor']))$array['editor']=$_POST['editor'];
if(isset($_POST['dcontent']))$d['dcontent']=$_POST['dcontent'];
if(isset($_POST['smallimg']))$d['smallimg']=$_POST['smallimg'];
if (empty($d['smallimg']))$d['smallimg']="/app/z60ys/model/images/yctu.png";	
		$array['dcontent'] = addslashes(json_encode($d));

			if(isset($_POST['content'])){
		$array['content'] =trim($_POST['content']);
			}
			$array['isok']=0;
			$array['istop']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			if(isset($_POST['istop']))$array['istop']=1;
			$Z60ys->EditZ60ys($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/Z60ys/vedit/$id/1");
break;
}
    function base64_to_img( $base64_string, $output_file ) {
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        return( $output_file ); 
    } 
?>