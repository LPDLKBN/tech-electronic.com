<?php 
class GetMoreimages{
    public static function GetMoreImg($img)
	{
	    $imgArray=[];
		$img_arry=explode('|',$img);
		$count=count($img_arry);
		if($count>0){
			for($i=0;$i<$count;$i++)
			{
			$imgArray[]=$img_arry[$i];
			}
		}
		return $imgArray;
	}
}
?>
