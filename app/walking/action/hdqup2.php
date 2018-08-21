<?php  
$j=date("H");
if($j>=22){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}

?>