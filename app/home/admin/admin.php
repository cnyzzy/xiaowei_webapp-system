<?php
$aaa = empty($params[0]) ? 'index':($params[0]);
$bbb = empty($params[1]) ? 'index':($params[1]);
if(is_file(ZApp.'/'.$Action.'/admin/'.$aaa.'.php')){
		require_once(ZApp.'/'.$Action.'/admin/'.$aaa.'.php');
}
if(is_file(ZApp.'/'.$Action.'/admin/'.$aaa.'.html')){
		include appTemplate($aaa);
}