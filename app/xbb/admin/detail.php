<?php
$NOW = empty($bbb) ? 1:($bbb);

$sql = "SELECT * FROM  ks_result WHERE id = '".$NOW."'";
$Array = $DB->once_fetch_array($sql);
$r=array();
$str=$Array['post'];
$a=explode("}",$str); 
foreach((array)$a as $key=>$Child)
 {
	 $b=explode("$",$Child); 
if(isset($b[1])){
$r[$b[0]]=$b[1];}
 }
  $result=ARRAY();
 foreach((array)$r as $key=>$Child)
 {
	 $sq2 = "SELECT * FROM  ks_question WHERE id = '".$key."'";
	 $result2 =$DB->once_fetch_array($sq2);	
	 $result[$key]['title']=$result2['title'];
	  $sq2 = "SELECT * FROM  ks_option WHERE id = '".$Child."'";
	 $result2 =$DB->once_fetch_array($sq2);	
	 $result[$key]['option']=$result2['content'];
	  $result[$key]['score']=$result2['score'];

 }
