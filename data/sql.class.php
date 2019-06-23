<?php 
require_once('DBConfig.class.php');
class Products{
	//搜索
	public static function GetSearch($type,$keyarr=array(),$curpage,$showrow){
		$sql_search="select * from product where 1=1 and stock='ok'";
		$sql_search.=" and category like '%$type%' and category not like '%electroni%' and category not like '%battery%' and category not like '%adapter%' and (";
		foreach ($keyarr as $keyval) {
			$sql_search.="(concat(cs,jianjie1) like '%$keyval%' or concat(cs,color) like '%$keyval%' or concat(cs,seriesadd) like '%$keyval%' or concat(cs,dladd) like '%$keyval%' or concat(cs,pcode) like '%$keyval%' or concat(cs,dyadd) like '%$keyval%') or";
			$sql_search.=" (rep like '%$keyval%' or comp like '%$keyval%' or jianjie1 like '%$keyval%' or jianjie2 like '%$keyval%' or pcode like '%$keyval%' or cs like '%$keyval%' or dl like '%$keyval%' or dy like '%$keyval%' or okpcode like '%$keyval%') or";	
		};
		$sql_search=substr($sql_search, 0,-2);
		$sql_search.=") order by pid DESC";
		if ($curpage!=="" && $showrow!=="") {
			$sql_search.=Products::GetPage($curpage,$showrow);
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
	//系列导航
	public static function GetSeriesNav($type,$brand,$attr=""){
		$sqlSeries="SELECT p.* FROM product p WHERE p.cs LIKE '%$brand%' and p.category='$type'";
		if ($attr!="") {
			$sqlSeries.=" and (p.dl like '%$attr%' or p.dy like '%$attr%')";
		};
		$sqlSeries.=" group by seriesadd";
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlSeries);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//属性筛选电容电压导航
	public static function GetAttrDlDyNav($type,$brand,$series,$attr){
		$sqlattrdldy="SELECT * FROM product";
		// if (!empty($series)) {
		// 	$sqlattrdldy.=",series";
		// };
		$sqlattrdldy.=" WHERE stock = 'ok'";
		if (!empty($type)) {
			$sqlattrdldy.=" and product.category like '%$type%'";
		};
		if (!empty($brand)) {
			$sqlattrdldy.=" and product.cs like '%$brand%'";
		};
		if (!empty($series)) {
			$sqlattrdldy.=" and product.seriesadd like '%$series%'";
		};
		if ($attr!="") {
			$sqlattrdldy.=" GROUP by product.$attr";
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlattrdldy);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//属性筛选电容电压
	public static function GetAttrDlDy($type,$brand,$series,$attr,$curpage,$showrow){
		$sqlattrdldy="SELECT * FROM product";
		// if (!empty($series)) {
		// 	$sqlattrdldy.=",series";
		// };
		$sqlattrdldy.=" WHERE stock = 'ok'";
		if (!empty($type)) {
			$sqlattrdldy.=" and product.category like '%$type%'";
		};
		if (!empty($brand)) {
			$sqlattrdldy.=" and product.cs like '%$brand%'";
		};
		if (!empty($series)) {
			$sqlattrdldy.=" and product.seriesadd like '%$series%'";
		};
		if ($attr!="") {
			$sqlattrdldy.=" and (product.dl like '%$attr%' or product.dy like '%$attr%')";
		};
		if ($curpage!=="" && $showrow!=="") {
			$sqlattrdldy.=Products::GetPage($curpage,$showrow);	
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlattrdldy);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//属性筛选导航
	public static function GetAttrNav($type,$brand,$series,$attr){
		if ($attr=="price") {
			$sqlattrnav="SELECT MIN(pprice) as min,MAX(pprice) as max FROM product";
		} else {
			$sqlattrnav="SELECT * FROM product";
		};
		// if (!empty($series)) {
		// 	$sqlattrnav.=",series";
		// };
		$sqlattrnav.=" WHERE stock = 'ok'";
		if (!empty($type)) {
			$sqlattrnav.=" and product.category like '%$type%'";
		};
		if (!empty($brand)) {
			$sqlattrnav.=" and product.cs like '%$brand%'";
		};
		if (!empty($series)) {
			$sqlattrnav.=" and product.seriesadd like '%$series%'";
		};
		if ($attr!="price") {
			$sqlattrnav.=" GROUP by $attr";
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlattrnav);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//属性筛选列表
	public static function GetAttr($type,$brand,$series,$roundPrice,$dl,$dy,$attrType,$curpage,$showrow){
		$sqlattr="SELECT * FROM product";
		// if (!empty($series)) {
		// 	$sqlattr.=",series";
		// };
		$sqlattr.=" WHERE stock = 'ok'";
		if (!empty($type)) {
			$sqlattr.=" and product.category like '%$type%'";
		};
		if (!empty($brand)) {
			$sqlattr.=" and product.cs like '%$brand%'";
		};
		if (!empty($series)) {
			$sqlattr.=" and product.seriesadd like '%$series%'";
		};
		if (!empty($roundPrice)) {
			if ($roundPrice[0]==$roundPrice[1]) {
				$sqlattr.=" and product.pprice = '$roundPrice[0]'";
			} else{
				$sqlattr.=" and product.pprice >= '$roundPrice[0]' and product.pprice <= '$roundPrice[1]'";
			};
		};
		$sqlattr_in="";
		if (!empty($dl)) {
			$sqlattr_in.=" (";
			foreach ($dl as $dlval) {
				$sqlattr_in.=" product.dl like '%$dlval%' or";
			}
			$sqlattr_in=substr($sqlattr_in, 0,-2);
			$sqlattr_in.=" ) or";
		};
		if (!empty($dy)) {
			$sqlattr_in.=" (";
			foreach ($dy as $dyval) {
				$sqlattr_in.=" product.dy like '%$dyval%' or";
			}
			$sqlattr_in=substr($sqlattr_in, 0,-2);
			$sqlattr_in.=" ) or";
		};
		if (!empty($attrType)) {
			$sqlattr_in.=" (";
			foreach ($attrType as $attrTypeval) {
				$sqlattr_in.=" product.type like '%$attrTypeval%' or";
			}
			$sqlattr_in=substr($sqlattr_in, 0,-2);
			$sqlattr_in.=" ) or";
		};
		$sqlattr_in=substr($sqlattr_in, 0,-2);
		if (!empty($dl)||!empty($dy)||!empty($attrType)) {
			$sqlattr=$sqlattr." and (".$sqlattr_in." )";	
		};
		$sqlattr.=" order by pid desc";
		if ($curpage!=="" && $showrow!=="") {
			$sqlattr.=Products::GetPage($curpage,$showrow);
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlattr);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取网站二级分类
	public static function GetCategory($be_type,$num,$act=""){
		$sqlcate="select category,seriesadd from product where stock='ok' and category like '%$be_type%' group by category order by category";
		if($num!="")
		{
			$sqlcate.=" limit $num";
		}
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlcate);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取网站显示类别品牌
	public static function GetBrand($type,$num,$attr=""){
		$sqlbrand="select cs from product where stock='ok' and proid<20000";
		if ($type!="") {
			$sqlbrand.=" and category like '%$type%'";
		};
		if ($attr!="") {
			$sqlbrand.=" and (dl like '%$attr%' or dy like '%$attr%')";	
		};
		$sqlbrand.=" group by cs order by cs";
		if($num!="")
		{
			$sqlbrand.=" limit $num";
		}
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlbrand);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取系列
	public static function GetBrandSeries($type,$brand,$num=""){
		$sqlSeries="SELECT p.* FROM product p WHERE stock = 'ok' and seriesadd !=''";
		if ($type!="") {
			$sqlSeries.=" and category LIKE '%$type%' and category not like '%electroni%' and category not like '%battery%' and category not like '%adapter%'";
		}
		if ($brand!="") {
			$sqlSeries.=" AND p.cs LIKE '%$brand%' GROUP BY seriesadd";
		} else {
			$sqlSeries.=" GROUP BY p.cs";
		}
		if ($num!="") {
			$sqlSeries.=" limit $num";	
		}
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlSeries);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll();
		$query->closeCursor();
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取型号
	public static function GetBrandJianjie($type,$brand){
		$sqlSeries="SELECT p.* FROM product p WHERE stock = 'ok' and jianjie1 !=''";
		if ($type!="") {
			$sqlSeries.=" and category LIKE '%$type%' and category not like '%electroni%' and category not like '%battery%' and category not like '%adapter%'";
		}
		if ($brand!="") {
			$sqlSeries.=" AND p.cs LIKE '%$brand%' GROUP BY jianjie1";
		} else {
			$sqlSeries.=" GROUP BY p.cs";
		}
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlSeries);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//分页
	public static function GetPage($curpage,$showrow){
		$sql=" LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
		return $sql;
	}
	//获取二级类别分页产品
	public static function GetCateList($type,$brand,$curpage,$showrow){
		$sqllist_page="select * from product where stock='ok' and category like '%$type%'";
		if ($brand!="") {
			$sqllist_page.=" and cs like '%$brand%'";
		};
		$sqllist_page.=" order by pid desc";
		if ($curpage!=="" && $showrow!=="") {
			$sqllist_page.=Products::GetPage($curpage,$showrow);	
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqllist_page);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取新产品或热门产品总数
	public static function GetCount($type,$brand,$hotnew=""){
		$sql_count="select count(*) as num from product where stock='ok' and proid<20000 and category not like '%electroni%' and category not like '%battery%' and category not like '%adapter%' and cs like '%$brand%'";
		if ($type!="") {
			$sql_count.=" and category like '%$type%'";
		};
		if ($hotnew=="hot") {
			$sql_count.=" and (pcode in('CHI17225_1','ECNM10260_Ta','ECN10243_Ta','ECNM1093_Ta','ECN10344_Ta','ECNM1068_Ta','ECN10266_Ta','ECN10336_Ta','ECNM10179_Ta','ECN10326_Ta','ECN10428_Ta','NEC11X104','ECN10570_Te','ECN10567_Ta','GIG11X106','GIG11X107','SA6125','HAS11I114','VE1148N_Te','ECN10569_Ta','MED11X109') or cs like '%Bose%' or cs like '%apple%')";
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sql_count);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取新品或热门类别产品
	public static function GetHotNew($conType,$brand,$curpage,$showrow){
		if ($conType=="new") {
			$sqllist="select * from product where stock='ok' and proid<20000 and category not like '%electroni%' and category not like '%battery%' and category not like '%adapter%'";
		} else if ($conType=="hot") {
			$sqllist="select * from product where stock='ok' and proid<20000 and category not like '%electroni%' and category not like '%battery%' and category not like '%adapter%' and (pcode in('CHI17225_1','ECNM10260_Ta','ECN10243_Ta','ECNM1093_Ta','ECN10344_Ta','ECNM1068_Ta','ECN10266_Ta','ECN10336_Ta','ECNM10179_Ta','ECN10326_Ta','ECN10428_Ta','NEC11X104','ECN10570_Te','ECN10567_Ta','GIG11X106','GIG11X107','SA6125','HAS11I114','VE1148N_Te','ECN10569_Ta','MED11X109') or cs like '%Bose%' or cs like '%apple%')";
		}
		if ($brand!="") {
			$sqllist.=" and cs like '%$brand%'";
		};
		$sqllist.=" order by pid desc";
		if ($curpage!=="" && $showrow!=="") {
			$sqllist.=Products::GetPage($curpage,$showrow);	
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqllist);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取电子页产品
	public static function GetEle($type,$roundPrice,$curpage,$showrow){
		$sqlEleProduct="select * from product where stock='ok' and category like '%$type%'";
		if (!empty($roundPrice)) {
			if ($roundPrice[0]==$roundPrice[1]) {
				$sqlEleProduct.=" and product.pprice = '$roundPrice[0]'";
			} else{
				$sqlEleProduct.=" and product.pprice >= '$roundPrice[0]' and product.pprice <= '$roundPrice[1]'";
			};
		};
		if ($curpage!=="" && $showrow!=="") {
			$sqlEleProduct.=Products::GetPage($curpage,$showrow);	
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlEleProduct);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取电子产品 (热门的  新的)
	public static function GetEleRes($cate,$conType,$curpage,$showrow,$cateGroup=false){  //$cate=="A" 在所有电子产品中查找
		if ($conType=="new") {
			$sqlElect="select * from product where stock='ok' and category like '%$cate%' and category not like '%electroni%' and category not like '%battery%' and category not like '%adapter%'";
		} else if ($conType=="hot") {
			$sqlElect="select * from product where stock='ok' and category not like '%electroni%' and category not like '%battery%' and category not like '%adapter%' and pcode in('SLY326','ECN10423_DV_2','ECN10417_DV_3','ECN10415_DV_1','ECN10417_DV_1','ECMN611','WEB_SA4340','ECMN200','YDZ0281','ECMN710','ECMN466','SLY309','ECMN070','ECMN414','ECMN909','ECMN722','SLY324')";
		} else {
			$sqlElect="select * from product where stock='ok' and category like '%$cate%' ";
		}
		if ($cateGroup) {
			$sqlElect.=" GROUP BY category";
		}
		if ($curpage!=="" && $showrow!=="") {
			$sqlElect.=Products::GetPage($curpage,$showrow);	
		};
		$sqlElect.=" order by pid desc";
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlElect);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取详情页产品
	public static function GetProductInfo($keyword,$pid){
		$sqlProduct="select * from product where stock='ok' and pid = $pid";
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlProduct);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取详情页相似产品
	public static function GetSimilar($cate,$series,$pid,$num){
		$pid0=intval($pid)-50;
		$pid1=intval($pid)+50;
		$sqlSimilar="select * from product where stock='ok' and ( pid between $pid0 and $pid1 ) and category = '$cate'";
		if (trim($series)!="") {
			$sqlSimilar.=" and ( ";
			$seriesArr=explode(",", $series);
			foreach ($seriesArr as $seriesVal) {
				$sqlSimilar.=" comp like '%$seriesVal%' or";
			}
			// $sqlSimilar=substr($sqlSimilar, 0,-2);
			$sqlSimilar.=" comp like '%%' )";
		}
		$sqlSimilar.=" order by pid desc limit 0,$num";
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlSimilar);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	//获取视频分页产品
	public static function GetVideoList($group=false,$curpage,$showrow){
		$sqlVideo_page="SELECT * FROM `provideolist`,`product` WHERE provideolist.pcode=product.pcode ";
		if ($group) {
			$sqlVideo_page.=" group by provideoname";	
		};
		$sqlVideo_page.=" order by pid desc";
		if ($curpage!=="" && $showrow!=="") {
			$sqlVideo_page.=Products::GetPage($curpage,$showrow);	
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlVideo_page);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null;
		return json_encode($result_arr);
	}
	// 插入评论
	public static function ExecuteReview($value=array()){
		$sqlReviewEx="insert into review(sid,pcode,re_name,re_content,star,status,date) values ('$value[session_id]','$value[product_pcode]','$value[review_name]','$value[review_content]','$value[star]','$value[status]','$value[date]')";
		$pdo = DB::get_conn();
		$update = $pdo->prepare($sqlReviewEx);
		$update->execute(); 
		$pdo = null;
	}
	//更新平均评分
	public static function UpdataRating($pcode,$average){
		$sqlRating="UPDATE product SET average='$average' where pcode='$pcode'";
		$pdo = DB::get_conn();
		$update = $pdo->prepare($sqlRating);
		$update->execute(); 
		$pdo = null;
	}
	// 查询评论
	public static function GetReview($pcode,$userid=""){
		$sqlReview="select * from review where 1=1 and pcode = '$pcode'";
		if ($userid!="") {
			$sqlReview.=" and sid='$userid'";
		};
		$sqlReview.=" and status = 1 order by id desc limit 0,10";
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlReview);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null; 
		return json_encode($result_arr);
	}
	// 获取最近浏览的产品
	public static function GetRecent($pcodeArr,$curpage,$showrow){
		if (is_array($pcodeArr) && count($pcodeArr)!=0) {
			$sqlRecent="select * from product where 1=1 and pcode in (";
			foreach ($pcodeArr as $pcode) {
				$sqlRecent.=" '$pcode',";
			}
			$sqlRecent.="'')";
		} else {
			$sqlRecent="select * from product where 1=1 order by pid desc";
		}
		if ($curpage!=="" && $showrow!=="") {
			$sqlRecent.=Products::GetPage($curpage,$showrow);	
		};
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sqlRecent);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null; 
		return json_encode($result_arr);
	}
	//获取购物车id
	public static function GetCartListDetailNum($userid,$pid,$gwc_key){
		$sql_gwc="select gwc_id from gouwuche where userid='$userid' and pid='$pid' and gwc_key='$gwc_key'";
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sql_gwc);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null; 
		return json_encode($result_arr);
	}
	//获取购物车数量和产品列表
	public static function GetCartList($userid){
	$sql_cart="select gouwuche.*,product.* from gouwuche,product where userid='$userid' and gouwuche.pid=product.pid";
	$pdo = DB::get_conn();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $pdo->prepare($sql_cart);
	$query->execute();
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$result_arr = $query->fetchAll(); 
	$query->closeCursor(); 
	$pdo = null; 
	return json_encode($result_arr);
	}
	//购物车执行操作
	public static function ExecuteGouwuche($gwc_shuliang,$gwc_id,$pid,$userid,$jian,$gwc_time,$ip,$listCount,$type,$gwc_procode,$gwc_prodes){
		if($type==""){
			//购物车开始
			if($listCount>=1){
				$sqlCartEx="UPDATE gouwuche SET gwc_shuliang=gwc_shuliang+'$gwc_shuliang' where gwc_id='$gwc_id'";
			}else if($listCount==0&&!empty($pid)){
				$sqlCartEx="insert into gouwuche(pid,userid,gwc_shuliang,gwc_key,gwc_procode,gwc_prodes,gwc_time,ip) values ('$pid','$userid',$gwc_shuliang,'$jian','$gwc_procode','$gwc_prodes','$gwc_time','$ip')";
			}
		}else if($type==0){
			//购物车清空
			$sqlCartEx="delete from gouwuche where gwc_id='$gwc_id'";
		}else if($type==1){
			//更新购物车数量
			$sqlCartEx="UPDATE gouwuche SET gwc_shuliang='$gwc_shuliang' where gwc_id='$gwc_id'";
		}
		$pdo = DB::get_conn();
		$update = $pdo->prepare($sqlCartEx);
		$update->execute(); 
		$pdo = null; 
	}
	//链接数据库执行语句并返回数组形式的数据
	public static function Execute($sql)
	{
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sql);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $query->fetchAll(); 
		$query->closeCursor(); 
		$pdo = null; 
		return json_encode($result_arr);
	}
	//链接数据库执行语句，返回id
	public static function Execute2($sql)
	{
		$pdo = DB::get_conn();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $pdo->prepare($sql);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->closeCursor(); 
		//获取当前最后一条数据插入的自增id
        $Insertid = $pdo->lastInsertId();
        $pdo = null;
        return $Insertid;
	}
}
?>