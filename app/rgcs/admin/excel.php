<?php
ob_clean();
header('Content-Type: application/vnd.ms-excel;charset=GBK');
header("Content-Disposition:attachment;filename=Result.xls");
$sql = "SELECT * FROM  rg_result order by addtime desc";
$row = $DB->fetch_all_array($sql);
echo(iconv( 'UTF-8','GBK',  "序号")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "工号")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "昵称")).chr(9);
echo(iconv( 'UTF-8','GBK',  "类型")).chr(9);
 echo(iconv( 'UTF-8','GBK',  "时间")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "IP")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "性别")).chr(9); 
 echo(iconv( 'UTF-8','GBK',  "年龄")).chr(9);
echo(iconv( 'UTF-8','GBK',  "警种")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "入职年月")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "A型匹配值")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "B型匹配值")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "C型匹配值")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "D型匹配值")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "E型匹配值")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "F型匹配值")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "G型匹配值")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "H型匹配值")).chr(9); 
echo(iconv( 'UTF-8','GBK',  "I型匹配值")).chr(9); 

$Array=arrayCv($row);
foreach((array)$Array as $key=>$loopChild)
 {
	echo   "\n"; 
echo   $loopChild['id'].chr(9); 
echo   @$loopChild['gonghao'].chr(9); 
echo   @$loopChild['nickname'].chr(9); 
echo   $loopChild['sroce'].chr(9); 
echo  date('Y-m-j G:i:s',$loopChild['addtime']).chr(9); 

echo   $loopChild['ip'].chr(9); 
echo   $loopChild['xingbie'].chr(9); 
echo   $loopChild['nianling'].chr(9); 
echo   $loopChild['jz'].chr(9); 
echo   $loopChild['rzny'].chr(9); 
if(!empty($loopChild['result'])){
	$total=json_decode($loopChild['result'],true);
	foreach($total as $key=>$a)
{
   	echo  $a.chr(9); 
}
}else{
	
	echo   chr(9); 
				echo   chr(9); 
				echo   chr(9); 
				echo   chr(9);
				echo   chr(9); 
				echo   chr(9); 
				echo   chr(9); 
				echo   chr(9);
				echo   chr(9);
	
}
		
		

 }
function arrayCv($data) {
		if (is_array($data)) {
			
			foreach ($data as $key => $val) {
				if (!is_array($val)) {
					$arr[$key] = iconv( 'UTF-8','GBK',  $val);
				} else {

					$arr[$key] = arrayCv($val);
				}
			}
		} else {
			return iconv( 'UTF-8','GBK',  $data);
		}
		return $arr;

	}