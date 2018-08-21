<?php
$NOW = empty($bbb) ? 1:($bbb);

$sql = "SELECT * FROM  rg_result WHERE id = '".$NOW."'";
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
	 $sq2 = "SELECT * FROM  rg_question WHERE id = '".$key."'";
	 $result2 =$DB->once_fetch_array($sq2);	
	 $result[$key]['title']=$result2['title'];
	  $sq2 = "SELECT * FROM  rg_option WHERE id = '".$Child."'";
	 $result2 =$DB->once_fetch_array($sq2);	
	 $result[$key]['option']=$result2['content'];
	  $result[$key]['score']=$result2['score'];

 }
if(!empty($Array['result'])){
$total=json_decode($Array['result'],true);
	foreach($total as $key=>$a)
{
    $tarray[] = array(
	'type'=>$key,
	'num'=>$a,
	);
}
  $tarray = my_sort($tarray,'num',SORT_DESC); 
//print_r($tarray);
}
 function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){  
        if(is_array($arrays)){  
            foreach ($arrays as $array){  
                if(is_array($array)){  
                    $key_arrays[] = $array[$sort_key];  
                }else{  
                    return false;  
                }  
            }  
        }else{  
            return false;  
        } 
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);  
        return $arrays;  
    } 