<?php
$StartMonth   = date('G:i','1533686400'); //开始日期
$EndMonth     = date('G:i','1533733200'); //结束日期
$ToStartMonth = strtotime( $StartMonth ); 
$ToEndMonth   = strtotime( $EndMonth );
$i            = false; //开始标示
$duringarray=array();
while( $ToStartMonth < $ToEndMonth ) {
  $NewMonth = !$i ? strtotime('+0 Minute', $ToStartMonth) :strtotime('+30 Minute', $ToStartMonth);
  $ToStartMonth =  $NewMonth ;
  $i = true;
  $duringarray[date('G:i',$NewMonth)]=ARRAY(
  'zynumber'=>0,
  'nownumber'=>0);
}
PRINT_R($duringarray);
?>