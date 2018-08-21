<?php
define("walkcecharoot",ZSystem."/data/app/walking/zcq");
$j=date("H");
if($j>=6){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
	 $dir=walkcecharoot.'/'.$timee.'/';
if(!is_dir($dir))mkdir($dir,0700);
    $base64_string = @$_POST['base64_string'];
    $fileName = $number.'.jpge';
    $savename = $dir.$fileName;//localResizeIMG压缩后的图片都是jpeg格式

    $savepath = $savename; 
 if(file_exists($savepath)) {
	 unlink($savepath);
	 $un="，已覆盖";
 }
    $image = base64_to_img( $base64_string, $savepath );
$savename = $arrInfo['url']."/system/data/app/walking/zcq/".$timee.'/'.$fileName;
    if($image){
        echo '{"status":1,"content":"上传成功'.@$un.'","url":"'.$savename.'"}';
    }else{
        echo '{"status":0,"content":"上传失败"}';
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