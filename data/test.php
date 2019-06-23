<?php  
require_once('DBConfig.class.php');
/**
 * 
 */
class producttest{
	
	public static function SelectData()
	{
		$sql_search="select * from series where series like '%,%'";
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
	public static function InsertData($cs,$pcode,$series)
	{
		$insertsql="insert into series(cs,pcode,series) values ('$cs','$pcode','$series')";
		$pdo = DB::get_conn();
		$update = $pdo->prepare($insertsql);
		$update->execute(); 
		$pdo = null;
	}
	public static function DeleteData()
	{
		$sqlDelete="delete from series where series like '%,%'";
		$pdo = DB::get_conn();
		$update = $pdo->prepare($sqlDelete);
		$update->execute(); 
		$pdo = null;
	}
}
// $testsql = json_decode(producttest::SelectData());
// foreach ($testsql as $testvalue) {
// 	$seiresVal = $testvalue->series;
// 	$pcodeVal = $testvalue->pcode;
// 	$csVal = $testvalue->cs;
// 	$arrseires=explode(",", $seiresVal);
// 	foreach ($arrseires as $arrseiresVal) {
// 		producttest::InsertData($csVal,$pcodeVal,$arrseiresVal);
// 	};
// }
// producttest::DeleteData();
?>