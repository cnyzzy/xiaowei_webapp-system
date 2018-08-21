<?php
if(is_file(ZSystem.'/data/app/jsdh/title.php')){
				$arr1 = SetRead( '/system/data/app/jsdh/title.php');
			}
$yunxu=0;
if($_SESSION['zid']['type']==2)$yunxu=1;
if($_SESSION['zid']['number']=='15223232')$yunxu=1;
if($_SESSION['zid']['number']=='16318421')$yunxu=1;