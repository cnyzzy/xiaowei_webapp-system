<?php
$bdname='';
if(is_weixin())$bdname='微信';
if(is_qq()||is_tim())$bdname='QQ';
if(is_wb())$bdname='微博';
