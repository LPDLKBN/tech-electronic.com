<?php 
require_once('DBConfig.class.php');
class Updata{
	//分页
	public static function GetPage($curpage,$showrow){
		$sql=" LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
		return $sql;
	}
	//查询操作
	public static function SearchProduct($keyarr=array(),$curpage,$showrow){
		$sql_search='select * from product where stock = "ok" ';
		if ($keyarr["keyword"]=="笔记本电池") {
			$sql_search.=' and pcode not like "%_Te%" and pcode not like "%_Ta%" and pcode not like "%_Oth%" and category like "%battery%" ';
		} else if ($keyarr["keyword"]=="平板电池") {
			$sql_search.=' and pcode like "%_Ta%" ';
		} else if ($keyarr["keyword"]=="手机电池") {
			$sql_search.=' and pcode like "%_Te%" ';
		} else if ($keyarr["keyword"]=="其他电池") {
			$sql_search.=' and pcode like "%_Oth%" ';
		} else if ($keyarr["keyword"]=="笔记本适配器") {
			$sql_search.=' and pcode not like "%_Se%" and category like "%adapter%" ';
		} else if ($keyarr["keyword"]=="电脑电源") {
			$sql_search.=' and pcode like "%_Se%" and category like "%adapter%" ';
		} else if ($keyarr["keyword"]=="电子产品") {
			$sql_search.=' and category like "%electronic%" ';
		} else {
			$sql_search.=' and( pcode like "%'.$keyarr["keyword"].'%" or okpcode like "%'.$keyarr["keyword"].'%" or category like "%'.$keyarr["keyword"].'%") ';
		}
		if ($keyarr["pid_min"]!=""&&$keyarr["pid_max"]!="") {
			$sql_search.=' and pid>="'.$keyarr["pid_min"].'" and pid<="'.$keyarr["pid_max"].'"';
		}
		$sql_search.=' order by pid DESC';
		if ($curpage!=="" && $showrow!=="") {
			$sql_search.=Updata::GetPage($curpage,$showrow);
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sql_search);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null; 
		return json_encode($result_arr);
	}
	//更新操作
	public static function UpdataProduct($checkedData){
		$updatasql="";
		foreach ($checkedData as $insertData_row) {
			$updatasql.="UPDATE product SET ";
			$wherestr='';
			$keyStr = "";
			$valStr = "";
			foreach ($insertData_row as $key => $val) {
				$val = str_replace("'", "\'", $val);
				$keyStr = $key;
				$valStr = "'".$val."'";
				if ($key!='pcode') {
					$updatasql.="$keyStr = $valStr,";	
				} else {
					$wherestr.=" where $keyStr = $valStr;";
				}
			}
			$updatasql=substr($updatasql, 0,-1);
			$updatasql.=$wherestr;
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$update = $pdo->prepare($updatasql);
		try {
		     $result = $update->execute();
		     $rowcount = $update->rowCount();
		     return json_encode(array(
		     	'proid'=> $rowcount,
		     	'result'=> var_export($result,true)
		     ));
		} catch (PDOException $e) {
		     return json_encode(array(
		     	'info'=>'updata error: ' ."\n" .$e->getMessage(),
		     	'resule'=>false
		     ));
		}
	}
	//插入操作
	public static function InsertProduct($insertData){
		$insertsql="";
		foreach ($insertData as $insertData_row) {
			$insertsql.="insert into product";
			$keyStr = "";
			$valStr = "";
			foreach ($insertData_row as $key => $val) {
				$val = str_replace("'", "\'", $val);
				$keyStr .= $key.',';
				$valStr .= "'".$val."',";
			}
			$keyStr=substr($keyStr, 0,-1);
			$valStr=substr($valStr, 0,-1);
			$insertsql.="($keyStr) values ($valStr);";
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$insert = $pdo->prepare($insertsql);
		try {
		     $result = $insert->execute();
		     $id = $pdo->lastinsertid();
		     return json_encode(array(
		     	'proid'=> $id,
		     	'result'=> var_export($result,true)
		     ));
		} catch (PDOException $e) {
		     return json_encode(array(
		     	'info'=>'insert error: ' ."\n" .$e->getMessage(),
		     	'resule'=>false
		     ));
		}
	}
}
?>