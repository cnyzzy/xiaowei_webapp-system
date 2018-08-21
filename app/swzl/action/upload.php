<?php
if (!is_dir(ZRoot.'/temp/uploadimg/')) mkdir(ZRoot.'/temp/uploadimg/');
$dir=ZRoot.'/temp/uploadimg/'.$number.'/';
if (!is_dir($dir)) mkdir($dir);
    $base64_string = @$_POST['base64_string'];
    $fileName = md5($number.TIME()).'.jpge';
    $savename = $dir.$fileName;
    $savepath = $savename; 
 if(file_exists($savepath)) {
	 unlink($savepath);
 }
    $image = base64_to_img( $base64_string, $savepath );

    if($image){
		$arr = array(); 

$arr['status']=1; 

$arr['content']="上传成功"; 

$arr['url']=$image; 

$arr['text']=$fileName; 

echo json_encode($arr);
    }else{
      $arr['status']=0; 

$arr['content']="上传失败"; 


echo json_encode($arr);
    } 

    function base64_to_img( $base64_string, $output_file ) {
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        return( $output_file ); 
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

	?>