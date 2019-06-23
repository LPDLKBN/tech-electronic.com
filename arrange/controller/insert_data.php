<?php  
require_once('sql.class.php');
$insertData = $_POST;
$insert_res = Updata::InsertProduct($insertData);
echo $insert_res;
?>