<?php


 if(isset($_GET['url'])){
 $url=urldecode($_GET['url']);
 $isno=0;
 if((!is_weixin()&&!is_qq()&&!is_wb()&&!is_tim())||isset($_GET['isok']))
{header("Location:". $url);}
 }else{$isno=1;}
  if(isset($_GET['isjsurl']))
{$isjsurl=1;}
 else{$isjsurl=0;}
