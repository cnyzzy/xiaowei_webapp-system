<?php


 if(isset($_GET['url'])){
 $url=urldecode($_GET['url']);
 $isno=0;
 if(!is_weixin())
{header("Location:". $url);}
 }else{$isno=1;}	
