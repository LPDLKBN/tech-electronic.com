<?php
require_once('config.php');
require_once('DBConfig.class.php');
require_once('sql.class.php');
require_once('fun.php');
if (isset($_GET)) {
	$pid = $_GET["pid"];
	$result_arr=json_decode(Products::GetReview($pid));
	$singleNum = 0;
	$count = count($result_arr);
	if ($count>0) {
		for ($i=1; $i <= 5; $i++) { 
			$starArr[$i]=array("singleNum"=>0,"percent"=>"0%");
			foreach ($result_arr as $rowbt) {
				$star = $rowbt->star;
				if ($star==$i) {
					$starArr[$star]['singleNum']++;
				}
			}
		}
		for ($i=1; $i <= 5; $i++) { 
			$starArr[$i]['percent'] = round(($starArr[$i]['singleNum'] / $count) * 100) ."%";
		};
		echo json_encode($starArr);
	} else {
		echo 0;
	}
}
?>