<?php isset($_SESSION['pcode'])?$pcodeArr=$_SESSION['pcode']:$pcodeArr=""; ?>
<!--latest-products-->
<div class="single-sidebar products-list mt-35">
	<div class="section-title mb-30">
		<h3>Latest Items</h3>
	</div>
	<div class="one-carousel dots-none">
		<div>
			<ul class="list-none">
				<?php echo getRecentList($pcodeArr,1,4); ?>
			</ul>
		</div>
		<div>
			<ul class="list-none">
				<?php echo getRecentList($pcodeArr,2,4); ?>
			</ul>
		</div>
	</div>
</div>