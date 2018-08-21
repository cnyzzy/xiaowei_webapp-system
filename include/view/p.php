<?php
//print_r($_SERVER['HTTP_USER_AGENT']);
//session_start();
//$Wx = new Wx();

 //PRINT_R($Wx->GetTestCert());
 

//用于拼接内容，使其变成json格式
//设置超时参数
$opts=array(
        "http"=>array(
                "method"=>"GET",
                "timeout"=>3
                ),
        );
$context = stream_context_create($opts);
//超时这个部分我不懂，在网上随便复制的
for($i=0;$i<60;$i++){
$url = 'https://v1.hitokoto.cn/'  ;
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL,$url);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
$json_string = curl_exec($ch);  

//抓取一条一言的json内容
$data = json_decode($json_string);

$id = $data->id;
		 $sql2 = "SELECT * FROM sentence WHERE id ='{$id}' order by addtime desc limit 1";
		$result2 = $DB->query($sql2);
		$row2 = $DB->fetch_array($result2);
		if(empty($row2['content'])&&!empty($data->hitokoto)){
	 $sql = "INSERT INTO `sentence` (`id`, `content`, `type`, `from`, `creator`, `ctime`, `addtime`, `liked`, `commented`, `resource`) VALUES ('{$data->id}', '".addslashes($data->hitokoto)."', '{$data->type}', '{$data->from}', '{$data->creator}', '{$data->created_at}', '".time()."', '', '', '一言');";
			$DB->query($sql);
		echo addslashes($data->hitokoto).'<br>';}
}
echo '<br>';