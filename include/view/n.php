<?php
session_start();
PRINT_R($_SESSION['zid']);
PRINT_R($_SESSION['wx']);
UNSET($_SESSION['zid']);
UNSET($_SESSION['wx']);
 if(isset($_GET['url'])){
 if(is_weixin()||is_qq()||is_tim()||is_wb())
{header("Location:". $url);
exit;}
 }
