<?php  
session_start();
require_once('config.php');
require_once('DBConfig.class.php');
require_once("fun.php");
require_once("sql.class.php");
$review=[];
$review["session_id"] = session_id();
$defaultName="user_".rand(10000000,99999999);
isset($_POST['product_pcode'])?$review['product_pcode']=unhtml($_POST['product_pcode']):$review['product_pcode']="";
isset($_POST['review_name'])?$review['review_name']=unhtml($_POST['review_name']):$review['review_name']="";
if ($review['review_name']=="") {
	$review['review_name']=$defaultName;
};
isset($_POST['review_content'])?$review['review_content']=unhtml($_POST['review_content']):$review['review_content']="good!";
if ($review['review_content']=="") {
	$review['review_content']="good!";
};
isset($_POST['star'])?$review['star']=$_POST['star']:$review['star']=5;
$review['status']=1;
$review["date"]=time();
$reviewarr = json_decode(Products::GetReview($review['product_pcode']));
$reviewNum = count($reviewarr);
$re_stars = 0;
if ($reviewNum>=1) {
	foreach ($reviewarr as $reviewval) {
		$re_sid = $reviewval->sid;
		$re_name = $reviewval->re_name;
		$re_star = $reviewval->star;
		$re_stars += $re_star;
	};
	$re_stars += $review['star'];
	$review['review_name']=$re_name;	
} else {
	$re_stars = $review['star'];
};
$re_average = number_format(intval($re_stars) / (intval($reviewNum) + 1),2); //平均评分
$sReviewNum = count(json_decode(Products::GetReview($review['product_pcode'],$review["session_id"])));
if ($review['product_pcode']!=""&&$sReviewNum<3) {
	Products::UpdataRating($review['product_pcode'],$re_average);
	Products::ExecuteReview($review);
	$href=getenv("HTTP_REFERER");
	header("location:$href");
}else {
	echo "<script>alert('Your comment today has reached the limit,Thanks for coming!');history.back();</script>";
};
?>