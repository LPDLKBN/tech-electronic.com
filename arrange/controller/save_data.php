<?php
require_once('sql.class.php');
$checkedData = $_POST;
$updata_res = Updata::UpdataProduct($checkedData);
echo $updata_res;
?>