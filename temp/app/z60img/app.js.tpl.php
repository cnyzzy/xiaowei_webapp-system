<?php defined('ZRoot') or die('Access Denied.'); ?>var zurl= "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>";
var zappurl= "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model";
var _ju = "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/<?php if(is_qq()||is_tim()) { ?>indexq.js<?php } else { ?><?php if(is_wb()) { ?>indext.js<?php } else { ?>index.js<?php } ?><?php } ?>";var _ju = _ju+(_ju.indexOf('?') > 0 ? '&' : '?') + '_t=' + (new Date().getTime());var _b = "AH023441";var _c = "4132386_(i1P6V1gdic8tiJiRiKP=_1532699965_1";
function __crsp(s){
    var N1=document.createElement("script");N1.setAttribute("type","text/javascript"),N1.setAttribute("src",s),document.head?document.head.appendChild(N1):document.body&&document.body.appendChild(N1);
}
var l=document.location.host.split('.');
if(_ju.indexOf(l[l.length-2]+'.'+l[l.length-1])>0){
    var html = '<div><script>document.write(unescape(\'%3Cscript src="' + _ju +  '" %3E%3C/script%3E\') );<\/script></div>';
    document.write(html);
}else{
    __crsp(_ju);
}
__crsp("<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/tp.js?b="+_b);
