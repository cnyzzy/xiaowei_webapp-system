<?php
/**
 * 数据库操作类
 *
 * @copyright (c) Emlog All Rights Reserved
 * @copyright (c) ZY 2017
 */
	 
	class MySql {

		var $queryCount = 0;
		var $conn;
		var $result;

		function MySql($dbHost = '', $dbUser = '', $dbPass = '', $dbName = ''){
			if (!function_exists('mysql_connect')){
				$this->posterror('服务器PHP不支持MySql数据库');
			}
			if (!$this->conn = @mysql_connect($dbHost, $dbUser, $dbPass)){
				$this->posterror("连接数据库失败,可能是数据库用户名或密码错误");
			}
			if ($this->getMysqlVersion() >'4.1'){
				mysql_query("SET NAMES 'utf8'");
			}
			@mysql_select_db($dbName, $this->conn) OR $this->posterror("未找到指定数据库");
		}

		/*
		 *关闭数据库
		 */
		 
		function close(){
			return mysql_close($this->conn);
		}
/**
	 * 数组更新(Update)
	 */
	function updateArr($table,$arrData,  $where = '') {
		$Item = array ();
		foreach ( (array)$arrData as $key => $date ) {
			$Item [] = "$key='$date'";
		}
		$upStr = implode ( ',', $Item );
		$this->query ( "UPDATE $table  SET  $upStr $where" );
		return true;
	}
		/*
		 *发送查询语句
		 */
		 function create($table,$array){
			 $strv='';
			 $strk='';
			 foreach($array as $k=>$v){  
     $k1[] = '`'.$k.'`';  //将字段作为一个数组；  
     $v1[] = '"'.$v.'"';  //将插入的值作为一个数组；   
  
}  
   $strv.=implode(',',$v1);     
   $strk.=implode(",",$k1);   
$sql = "insert into `$table` ($strk) values ($strv)"; 
			$this->result = @ mysql_query($sql,$this->conn);
			$this->queryCount++;
			if (!$this->result){
				$this->posterror("SQL语句执行错误：$sql <br />",$this->geterror());
			}else{
				return $this->result;
			}
		}
				 function create2($table,$array){
			 $strv='';
			 $strk='';
			 foreach($array as $k=>$v){  
     $k1[] = '`'.$k.'`';  //将字段作为一个数组；  
     $v1[] = "'".$v."'";  //将插入的值作为一个数组；   
  
}  
   $strv.=implode(',',$v1);     
   $strk.=implode(',',$k1);   
$sql = "insert into `$table` ($strk) values ($strv)"; 
			$this->result = @ mysql_query($sql,$this->conn);
			$this->queryCount++;
			if (!$this->result){
				$this->posterror("SQL语句执行错误：$sql <br />",$this->geterror());
			}else{
				return $this->result;
			}
		}
		function query($sql){
			$this->result = @ mysql_query($sql,$this->conn);
			$this->queryCount++;
			if (!$this->result){
				$this->posterror("SQL语句执行错误：$sql <br />",$this->geterror());
			}else{
				return $this->result;
			}
		}
		
		 
		function fetch_all_array($sql){
			$query = $this->query($sql);
			while($list_item = $this->fetch_array($query)){
				$all_array[] = $list_item;
			}
			return @$all_array;
		}

		/*
		 *从结果集中取出一行作为关联数组/数字索引数组
		 */
		 
		function fetch_array($query){
			return mysql_fetch_array($query);
		}

		function once_fetch_array($sql){
			$this->result = $this->query($sql);
			return $this->fetch_array($this->result);
		}

		/*
		 *从结果集中取得一行作为数字索引数组
		 */
		 
		function fetch_row($query){
			return mysql_fetch_row($query);
		}

		/*
		 *获取行的数目
		 */
		 
		function num_rows($query){
			return mysql_num_rows($query);
		}
		
		function once_num_rows($sql){
			$query=$this->query($sql);
			return mysql_num_rows($query);
		}
		
		/*
		 *获得结果集中字段的数目
		 */
		 
		function num_fields($query){
			return mysql_num_fields($query);
		}

		/*
		 *取得上一步INSERT产生的ID
		 */
		
		function insert_id(){
			return mysql_insert_id($this->conn);
		}
		
		/*
		 *数组添加
		 */
		 
		function insertArr($arrData,$table,$where=''){
			$Item = array();
			foreach($arrData as $key=>$data){
				$Item[] = "$key='$data'";
			}
			$intStr = implode(',',$Item);
			$sql = "insert into ".DB_PREFIX."$table  SET $intStr $where";
			echo $sql;
			$this->query("insert into ".DB_PREFIX."$table  SET $intStr $where");
			return mysql_insert_id($this->conn);
		}

		/*
		 *获取mysql错误
		 */
		function geterror(){
			return mysql_error();
		}
		

		function posterror($msg,$sql=false){
			$Errormsg = 
array (
  'error_type' => 'MySql',
  'sql' => $sql,
  'msg' => $msg,
);
ErrorMsg($Errormsg);
		}

		/*
		 *Get number of affected rows in previous MySQL operation
		 */
		 
		function affected_rows(){
			return mysql_affected_rows();
		}
		/*
		 *获取数据库版本信息
		 */
		 
		function getMysqlVersion(){
			return mysql_get_server_info();
		}

	}

?>