<?php  
	function GetResultList($keyarr=array(),$curpage,$showrow)
	{
		$result_arr=json_decode(Updata::SearchProduct($keyarr,$curpage,$showrow));
		foreach ($result_arr as $rowbt) {
			$pid=$rowbt->pid;
			$color=$rowbt->color;
			$pcode=$rowbt->pcode;
		    $dl=$rowbt->dl;
		    $dy=$rowbt->dy;
		    $dladd=$rowbt->dladd;
		    $dyadd=$rowbt->dyadd;
		    $power=$rowbt->power;
		    $pin=$rowbt->pin;
		    $seriesadd=$rowbt->seriesadd;
		    $comp=$rowbt->comp;
		    $category=$rowbt->category;
?>
<tr>
    <td class="checkbox"><input type="checkbox" id="<?php echo $pid; ?>"><label for="<?php echo $pid; ?>"><?php echo $pid; ?></label></td>
    <td class="change"><div class="text" data-name="pcode"><?php echo $pcode; ?></div></td>
    <td class="change"><div class="text" data-name="color"><?php echo $color; ?></div></td>
    <td class="change"><div class="text" data-name="dl"><?php echo $dl; ?></div></td>
    <td class="change"><div class="text" data-name="dy"><?php echo $dy; ?></div></td>
    <td class="change <?php echo preg_match('/^[0-9]+\.*[0-9]*m*[ah]{2}$/i',$dladd)?"":"dot"; ?>"><div class="text" data-name="dladd"><?php echo $dladd; ?></div></td>
    <td class="change <?php echo preg_match('/^[0-9]+\.*[0-9]*[v]{1}$/i',$dyadd)?"":"dot"; ?>"><div class="text" data-name="dyadd"><?php echo $dyadd; ?></div></td>
    <td class="change"><div class="text" data-name="power"><?php echo $power; ?></div></td>
    <td class="change"><div class="text" data-name="pin"><?php echo $pin; ?></div></td>
    <td class="change <?php echo preg_match('/^\s+|\s+$/',$seriesadd)?"dot":""; ?>"><div class="text" data-name="seriesadd"><?php echo $seriesadd; ?></div></td>
    <td class="change"><div class="text" data-name="comp"><?php echo $comp; ?></div></td>
    <td class="change down <?php echo preg_match('/^[A-K][0-9]{3,4}$/',$category)?"":"dot"; ?>"><div class="text" data-name="category"><?php echo $category; ?></div></td>
    <td>
        <div class="info-boll no-act"><img src="static/picture/no-act.png"/></div>
        <button type="button" class="save">保存</button>
    </td>
</tr>
<?php } } ?>
