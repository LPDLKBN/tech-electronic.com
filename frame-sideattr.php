<?php  
function GetAttrNav($type,$brand,$series,$attr,$arrAttr=""){
	$result_arr=json_decode(Products::GetAttrNav($type,$brand,$series,$attr));
	if ($arrAttr=="") {
		$arrAttr=[];
	}
	foreach ($result_arr as $key => $rowbt) {
		if ($attr=="price") {
			$minPrice=floor($rowbt->min);
			$maxPrice=ceil($rowbt->max);
		?>
		<div id="slider-range" data-min-0="<?php echo $arrAttr==[]?$minPrice:$arrAttr[0]; ?>" data-max-0="<?php echo $arrAttr==[]?$maxPrice:$arrAttr[1]; ?>" data-min="<?php echo $minPrice; ?>" data-max="<?php echo $maxPrice; ?>"></div>
		<?php } else {
			$attrVal=trim($rowbt->$attr);
			if ($attrVal!="") {
		?>
		<li class="check-wrap">
			<input <?php echo in_array($attrVal,$arrAttr)?"checked":""; ?> type="checkbox" name="<?php echo $attr; ?>[<?php echo $key; ?>]" id="<?php echo $attr; ?>-<?php echo $key; ?>" value="<?php echo $attrVal; ?>">
			<label class="<?php echo in_array($attrVal,$arrAttr)?"act":""; ?>" for="<?php echo $attr; ?>-<?php echo $key; ?>"><span><i class="glyphicon glyphicon-ok"></i></span><?php echo $attrVal; ?></label>
		</li>		
<?php } } } } ?>
<form id="submit-attr" action="<?php echo $type.'/'.$typename.'/'.$brand.'/'.$series.'-'.$curpage.'.html'; ?>" method="post">
<div class="price_filter mt-40">
	<div class="section-title">
		<h3>Filter by price</h3>
	</div>
	<div class="price_slider_amount">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<input type="text" id="amount" name="round-price"  placeholder="Add Your Price" />
			</div>
		</div>
	</div>
	<?php echo GetAttrNav($type,$brandVal,$seriesVal,"price",$roundPrice); ?>
</div>
<?php  
if ($type!="B218"&&$type!="B219") {
?>
<div class="list-filter mt-43">
	<div class="section-title">
		<h3>Capacitor</h3>
	</div>
	<ul class="list-none mt-25">
		<?php echo GetAttrNav($type,$brandVal,$seriesVal,"dladd",$dladd); ?>
	</ul>
</div>
<div class="list-filter mt-43">
	<div class="section-title">
		<h3>voltage</h3>
	</div>
	<ul class="list-none mt-25">
		<?php echo GetAttrNav($type,$brandVal,$seriesVal,"dyadd",$dyadd); ?>
	</ul>
</div>
<div class="list-filter mt-43">
	<div class="section-title">
		<h3>Battery type</h3>
	</div>
	<ul class="list-none mt-25">
		<?php echo GetAttrNav($type,$brandVal,$seriesVal,"type",$dyadd); ?>
	</ul>
</div>
<?php } ?>
</form>