<?php
define('RROOT',ZSystem.'/data/app/pth/');


empty($params[0]) ? $a = '1' : $a =$params[0];
if(is_file(RROOT.$number.'.php')){
				$arr = SetRead("/system/data/app/pth/".$number.'.php');
				foreach ($arr as $key=>$v) {
  $arr[$key]=urldecode($v);

}

				$timei=filectime(RROOT.$number.'.php');
				$isok=1;
}else{$isok=0;}


