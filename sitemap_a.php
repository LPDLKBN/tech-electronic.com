<?php
require_once("data/sql.class.php"); 
require_once("data/fun.php");
require_once("data/get_category.class.php");
$cateClass = new Category;
header("Content-Type: text/xml");
// 网址
$web_url="https://www.machiibattery.com/";
$str="<?xml version='1.0' encoding='UTF-8'?>\r\n";
$str.="<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>\r\n";

//大分类
$urlnavs = array(
   "index.html",
   "cart.html",
   "about.html",
   "payment.html",
   "shipping.html",
   "return.html",
   "faq.html",
   "battery.html",
   "battery-video-1.html",
);
foreach ($urlnavs as $key => $urlnav) {
   $str.="<url>\r\n";
   $str.="<loc>\r\n";
   $str.=$web_url.$urlnav." \r\n";
   $str.="</loc>\r\n";
   $str.="<changefreq>always</changefreq>\r\n";
   $str.="<priority>0.7</priority>\r\n";
   $str.="</url>\r\n";   
};
// 热门产品页面
$showrow = 36; //一页显示的行数
$total_rows = json_decode(Products::GetCount("","","hot"));
$total_rows=$total_rows[0]->num;
if ($total_rows>80) {
   $total_rows=80;
};
if ( $total_rows != 0 ){ 
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
};
for ($i=1; $i <= $curpage; $i++) { 
   $newUrl = "battery-hot-default-".$i.".html";
   if(!empty($newUrl)&&$newUrl!="index.html"){
      $str.="<url>\r\n";
      $str.="<loc>\r\n";
      $str.=$web_url.$newUrl." \r\n";
      $str.="</loc>\r\n";
      $str.="<changefreq>always</changefreq>\r\n";
      $str.="<priority>0.7</priority>\r\n";
      $str.="</url>\r\n";
   }
}
$result_arr=json_decode(Products::GetBrand("","",""));
foreach ($result_arr as $rowbt) {
   $sleBrand=$rowbt->cs;
   $total_rows = json_decode(Products::GetCount("",$sleBrand,"hot"));
   if ($total_rows[0]->num!=0) {
      $total_rows=$total_rows[0]->num;
      if ($total_rows>80) {
         $total_rows=80;
      };
      if ( $total_rows != 0 ){ 
          $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
      };
      for ($i=1; $i <= $curpage; $i++) { 
         $newUrl = "battery-hot-".strtolower($sleBrand)."-".$i.".html";
         if(!empty($newUrl)&&$newUrl!="index.html"){
            $str.="<url>\r\n";
            $str.="<loc>\r\n";
            $str.=$web_url.$newUrl." \r\n";
            $str.="</loc>\r\n";
            $str.="<changefreq>always</changefreq>\r\n";
            $str.="<priority>0.7</priority>\r\n";
            $str.="</url>\r\n";
         }
      }
   }
}
// 新产品页面
$showrow = 36; //一页显示的行数
$total_rows = json_decode(Products::GetCount("","","new"));
$total_rows=$total_rows[0]->num;
if ($total_rows>80) {
   $total_rows=80;
};
if ( $total_rows != 0 ){ 
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
};
for ($i=1; $i <= $curpage; $i++) { 
   $newUrl = "battery-new-default-".$i.".html";
   if(!empty($newUrl)&&$newUrl!="index.html"){
      $str.="<url>\r\n";
      $str.="<loc>\r\n";
      $str.=$web_url.$newUrl." \r\n";
      $str.="</loc>\r\n";
      $str.="<changefreq>always</changefreq>\r\n";
      $str.="<priority>0.7</priority>\r\n";
      $str.="</url>\r\n";
   }
}
$result_arr=json_decode(Products::GetBrand("","",""));
foreach ($result_arr as $rowbt) {
   $sleBrand=$rowbt->cs;
   $total_rows = json_decode(Products::GetCount("",$sleBrand,"new"));
   $BrandUrl=str_replace("(","%28",$sleBrand);
   $BrandUrl=str_replace(")","%29",$BrandUrl);
   $BrandUrl=str_replace(' ','-' ,$BrandUrl);
   $BrandUrl=str_replace('&','%40' ,$BrandUrl);
   if ($total_rows[0]->num!=0) {
      $total_rows=$total_rows[0]->num;
      if ($total_rows>80) {
         $total_rows=80;
      };
      if ( $total_rows != 0 ){ 
          $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
      };
      for ($i=1; $i <= $curpage; $i++) { 
         $newUrl = "battery-new-".strtolower($sleBrand)."-".$i.".html";
         if(!empty($newUrl)&&$newUrl!="index.html"){
            $str.="<url>\r\n";
            $str.="<loc>\r\n";
            $str.=$web_url.$newUrl." \r\n";
            $str.="</loc>\r\n";
            $str.="<changefreq>always</changefreq>\r\n";
            $str.="<priority>0.7</priority>\r\n";
            $str.="</url>\r\n";
         }
      }
   }
}
// 二级分类列表页面
$sql_cs1=" select * from product where stock='ok' and `category` not like 'A%' and `category` not like '%electroni%' and `category` not like '%battery%' and `category` not like '%adapter%' group by category";
$res_cs1 = json_decode(Products::Execute($sql_cs1));
$showrow = 12; //一页显示的行数 
foreach ($res_cs1 as $value) {
   $type=$value->category;
   $typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
   $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
   $total_rows = json_decode(Products::GetAttr($type,"","","","","","","",""));
   $total_rows=count($total_rows);
   if ($total_rows != 0 ){ 
       $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
   };
   //电池类型分页路径
   for ($i=1; $i <= $curpage; $i++) { 
      $typeUrl = get_series_url($type,$typeUrl0,"default","default",$i);
      if(!empty($typeUrl)&&$typeUrl!="index.html"){
         $str.="<url>\r\n";
         $str.="<loc>\r\n";
         $str.=$web_url.$typeUrl." \r\n";
         $str.="</loc>\r\n";
         $str.="<changefreq>always</changefreq>\r\n";
         $str.="<priority>0.7</priority>\r\n";
         $str.="</url>\r\n";
      }
   }
   // 品牌分类导航页面路径
   $brandCateUrl = get_brand_url($type,$typeUrl0);
   if(!empty($brandCateUrl)&&$brandCateUrl!="index.html"){
      $str.="<url>\r\n";
      $str.="<loc>\r\n";
      $str.=$web_url.$brandCateUrl." \r\n";
      $str.="</loc>\r\n";
      $str.="<changefreq>always</changefreq>\r\n";
      $str.="<priority>0.7</priority>\r\n";
      $str.="</url>\r\n";
   }
}
// 品牌->系列 列表路径
$sql_cs1=" select * from product where stock='ok' and `category` not like 'A%' and `category` not like '%electroni%' and `category` not like '%battery%' and `category` not like '%adapter%' group by cs";
$res_cs1 = json_decode(Products::Execute($sql_cs1));
foreach ($res_cs1 as $value) {
   $type=$value->category;
   $typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
   $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
   $result_arr=json_decode(Products::GetBrandSeries($type,""));
   if (count($result_arr)!=0) {
      $brand=$value->cs;
      $result_series=json_decode(Products::GetBrandSeries($type,$brand));
      $brandListUrl=get_series_url($type,$typeUrl0,$brand,"default",1);
      if(!empty($brandListUrl)&&$brandListUrl!="index.html"){
         $str.="<url>\r\n";
         $str.="<loc>\r\n";
         $str.=$web_url.$brandListUrl." \r\n";
         $str.="</loc>\r\n";
         $str.="<changefreq>always</changefreq>\r\n";
         $str.="<priority>0.7</priority>\r\n";
         $str.="</url>\r\n";
      }
      $sleSeriesArr=[];
      foreach ($result_series as $resVal) {
         $sleSeries0=$resVal->seriesadd;
         $sleSeries0=explode(",", $sleSeries0);
         foreach ($sleSeries0 as $key => $sleSeriesVal) {
            $sleSeriesArr[]=trim(ucfirst(strtolower($sleSeriesVal)));
         };
      }
      $sleSeriesArr=array_filter(array_unique($sleSeriesArr));
      foreach ($sleSeriesArr as $series) {
         $seriersListUrl=get_series_url($type,$typeUrl0,$brand,$series,1);
         if(!empty($brandListUrl)&&$brandListUrl!="index.html"){
            $str.="<url>\r\n";
            $str.="<loc>\r\n";
            $str.=$web_url.$seriersListUrl." \r\n";
            $str.="</loc>\r\n";
            $str.="<changefreq>always</changefreq>\r\n";
            $str.="<priority>0.7</priority>\r\n";
            $str.="</url>\r\n";
         }
      }
   }
}
// 电子页面（大分类）
$sql_cs1=" select * from product where stock='ok' and `category` like 'A%' and `category` not like '%electroni%' and `category` not like '%battery%' and `category` not like '%adapter%' group by category DESC";
$res_cs1 = json_decode(Products::Execute($sql_cs1));
$showrow = 12; //一页显示的行数 
foreach ($res_cs1 as $value) {
   $pid=$value->pid;
   $type=$value->category;
   $jianjie1=$value->jianjie1;
   $type = substr($type,0,3);
   $jianjie0=getjan($jianjie1);
   $pcode=trim($value->pcode);
   $typeName = $cateClass->getFirstLevel($type)->firstArr["be_typeName"];
   $typeUrl0 = $cateClass->getFirstLevel($type)->firstArr["be_typeUrl"];
   // 查询总数
   $total_rows = json_decode(Products::GetEle($type,"","",""));
   $total_rows=count($total_rows);
   if ($total_rows != 0 ){ 
       $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
   };
   //电池类型分页路径
   for ($i=1; $i <= $curpage; $i++) { 
      $ElectUrl = get_second_url($type,$typeUrl0,"",$i);
      if(!empty($ElectUrl)&&$ElectUrl!="index.html"){
         $str.="<url>\r\n";
         $str.="<loc>\r\n";
         $str.=$web_url.$ElectUrl." \r\n";
         $str.="</loc>\r\n";
         $str.="<changefreq>always</changefreq>\r\n";
         $str.="<priority>0.7</priority>\r\n";
         $str.="</url>\r\n";
      }
   }
}
// 电子页面（小分类）
$sql_cs1=" select * from product where stock='ok' and `category` like 'A%' and `category` not like '%electroni%' and `category` not like '%battery%' and `category` not like '%adapter%' group by category DESC";
$res_cs1 = json_decode(Products::Execute($sql_cs1));
$showrow = 12; //一页显示的行数 
foreach ($res_cs1 as $value) {
   $pid=$value->pid;
   $type=$value->category;
   $jianjie1=$value->jianjie1;
   $jianjie0=getjan($jianjie1);
   $pcode=trim($value->pcode);
   $typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
   $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
   // 查询总数
   $total_rows = json_decode(Products::GetEle($type,"","",""));
   $total_rows=count($total_rows);
   if ($total_rows != 0 ){ 
       $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
   };
   //电池类型分页路径
   for ($i=1; $i <= $curpage; $i++) { 
      $ElectUrl = get_second_url($type,$typeUrl0,"",$i);
      if(!empty($ElectUrl)&&$ElectUrl!="index.html"){
         $str.="<url>\r\n";
         $str.="<loc>\r\n";
         $str.=$web_url.$ElectUrl." \r\n";
         $str.="</loc>\r\n";
         $str.="<changefreq>always</changefreq>\r\n";
         $str.="<priority>0.7</priority>\r\n";
         $str.="</url>\r\n";
      }
   }
}
// 详情页面
$sql_cs1=" select * from product where stock='ok' and `category` not like '%electroni%' and `category` not like '%battery%' and `category` not like '%adapter%' ORDER BY pid DESC";
$res_cs1 = json_decode(Products::Execute($sql_cs1));
$showrow = 12; //一页显示的行数 
foreach ($res_cs1 as $value) {
   $pid=$value->pid;
   $type=$value->category;
   $jianjie1=$value->jianjie1;
   $jianjie0=getjan($jianjie1);
   $pcode=trim($value->pcode);
   if (preg_match('/A/i',$type)) {
      $keyword=$pcode;
   } else {
      $keyword=$jianjie0;
   }
   $typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
   $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
   $productUrl = get_products_url($keyword,$type,$typeUrl0,$pid);
   if(!empty($productUrl)&&$productUrl!="index.html"){
      $str.="<url>\r\n";
      $str.="<loc>\r\n";
      $str.=$web_url.$productUrl." \r\n";
      $str.="</loc>\r\n";
      $str.="<changefreq>always</changefreq>\r\n";
      $str.="<priority>0.7</priority>\r\n";
      $str.="</url>\r\n";
   }
}
$str.="</urlset>\r\n";
echo $str;
?>