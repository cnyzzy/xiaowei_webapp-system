<?php
 if(isset($_GET['url'])){
	 $url=$_GET['url'];
	 $domain=parse_url( $url);
	 if(strpos($domain['host'],'yctu.edu.cn')==false)$url=$arrInfo['url'];
 if(is_weixin()||is_qq()||is_tim()||is_wb())
{header("Location:". $url);
exit;}
 }
