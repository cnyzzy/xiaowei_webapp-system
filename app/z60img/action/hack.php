<?php
$File = ZApp.'/' . $AppName . '/model/json.js.html';
if(filemtime($File)<time()-60*2||!file_exists($File))
		  {
 $body = file_get_contents('http://weixiao.nickboy.cc/api/badge-avatar?type=settings&media_id=gh_658d5743dcef&callback=_jsonp970127005');

 $jsonp=jsonp_decode($body);
		  }
 if(!empty($jsonp->app)&&count($jsonp->items)>4){
	  if(!empty($jsonp->app->avatar_url)){
		  $simg=addslashes($jsonp->app->avatar_url);
		  $jsonp->app->avatar_url="[!ZYQQ970127005:NOMORE!]";
		  $Date=  '/**/_jsonp970127005('.json_encode($jsonp).')';
		  
		  $Data= str_replace("[!ZYQQ970127005:NOMORE!]","{if empty($"."img)}".$simg."{else}{php echo(addslashes($"."img))}{/if}",$Date);
		  if(filemtime($File)<time()-60*2||!file_exists($File))
		  {
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
 
	  }
	  }

	 
 }

 function jsonp_decode($jsonp, $assoc = false) {
		if($jsonp[0] !== '[' && $jsonp[0] !== '{') {
			$jsonp = substr($jsonp, strpos($jsonp, '('));
		}
		return json_decode(trim($jsonp,'();'), $assoc);
	}
