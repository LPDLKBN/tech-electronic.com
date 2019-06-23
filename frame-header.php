<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<!--header-area start-->
<header class="header-area">
	<div class="desktop-header">
		<!--header-top-->
		<div class="header-top">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="topbar-left">
							<ul class="list-none">
								<li>SHOP EVENTS & SAVE UP TO <span>40% OFF!</span></li>
								<li>Email: <span><?php echo $_config['domain_email']; ?></span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="topbar-right">
							<div class="social-icons pull-right">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-youtube"></i></a>
							</div>
							<div class="currency-bar lang-bar pull-right">
								<ul>
									<li><a href="#"><img src="static/picture/gb.png" alt="" />English <i class="fa fa-angle-down"></i></a>
										<ul>
											<li><a href="#">French</a></li>
											<li><a href="#">Chinese</a></li>
										</ul>
									</li>
									<li><span class="br">|</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--header-bottom-->
		<div style="height: 100px;">
			<div class="sticker header-bottom">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-2">
							<div class="logo">
								<a href="index.html"><img src="static/picture/logo.png" alt="logo" /></a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="mainmenu">  
								<nav>
									<ul>
										<li><a href="index.html">Home</a></li>
										<li>
											<a href="<?php echo get_series_url('B201',$cateClass->getSecondLevel('B201')->secondArr["typeUrl"],'default','default',1); ?>">
												<?php echo $cateClass->getSecondLevel('B201')->secondArr["typeName"]; ?>
												<b class="caret"></b>
											</a>
											<ul class="mega-menu">
												<?php echo getHeadBrandSeries('B201','Acer',8); ?>
												<?php echo getHeadBrandSeries('B201','Dell',8); ?>
												<?php echo getHeadBrandSeries('B201','Apple',8); ?>
												<?php echo getHeadBrandSeries('B201','Asus',8); ?>
												<li><a href="<?php echo get_brand_url('B201',$cateClass->getSecondLevel('B201')->secondArr["typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li>
											<a href="<?php echo get_series_url('B202',$cateClass->getSecondLevel('B202')->secondArr["typeUrl"],'default','default',1); ?>">
												<?php echo $cateClass->getSecondLevel('B202')->secondArr["typeName"]; ?>
												<b class="caret"></b>
											</a>
											<ul class="mega-menu">
												<?php echo getHeadBrandSeries('B202','Amazon',8); ?>
												<?php echo getHeadBrandSeries('B202','Hp',8); ?>
												<?php echo getHeadBrandSeries('B202','Acer',8); ?>
												<?php echo getHeadBrandSeries('B202','Lenovo',8); ?>
												<li><a href="<?php echo get_brand_url('B202',$cateClass->getSecondLevel('B202')->secondArr["typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo $cateClass->allType["allTypeUrl"]; ?>"><?php echo $cateClass->allType["allTypeName"]; ?> <b class="caret"></b></a>
											<ul class="submenu">
												<li><a href="<?php echo get_series_url('B204',$cateClass->getSecondLevel('B204')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B204')->secondArr["typeName"]; ?></a></li>
												<li><a href="<?php echo get_series_url('B206',$cateClass->getSecondLevel('B206')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B206')->secondArr["typeName"]; ?></a></li>
												<li><a href="<?php echo get_series_url('B203',$cateClass->getSecondLevel('B203')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B203')->secondArr["typeName"]; ?></a></li>
												<li><a href="<?php echo get_series_url('B205',$cateClass->getSecondLevel('B205')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B205')->secondArr["typeName"]; ?></a></li>
												<li><a href="<?php echo get_series_url('B209',$cateClass->getSecondLevel('B209')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B209')->secondArr["typeName"]; ?></a></li>
												<li><a href="<?php echo get_series_url('F609',$cateClass->getSecondLevel('F609')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('F609')->secondArr["typeName"]; ?></a></li>
											</ul>
										</li>
										<li><a href="battery-new-default-1.html"><span class="text-label label-featured">new</span>New Products</a></li>
										<li><a href="battery-hot-default-1.html"><span class="text-label label-hot">Hot</span>Best-selling Batteries</a></li>
										<li><a href="battery-video-1.html">Product Video</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--products-search-->
		<div class="products-search">
			<div class="container-fluid">
				<div class="row ">
					<div class="col-xl-2 col-lg-3">
						<div class="collapse-menu mt-0">
							<ul>
								<li><a href="javascript:void(0);" class="vm-menu"><i class="fa fa-navicon"></i><span>All Electronics</span></a>
									<ul class="vm-dropdown <?php echo isset($home)?"":"v-toggle"; ?>">
										<li><a href="<?php echo get_brand_url('A01',$cateClass->getFirstLevel('A01')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A01')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A01',"",""); ?>
												<li><a href="<?php echo get_brand_url('A01',$cateClass->getFirstLevel('A01')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A02',$cateClass->getFirstLevel('A02')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A02')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A02',"",""); ?>
												<li><a href="<?php echo get_brand_url('A02',$cateClass->getFirstLevel('A02')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A03',$cateClass->getFirstLevel('A03')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A03')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A03',"",""); ?>
												<li><a href="<?php echo get_brand_url('A03',$cateClass->getFirstLevel('A03')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A04',$cateClass->getFirstLevel('A04')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A04')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A04',"",""); ?>
												<li><a href="<?php echo get_brand_url('A04',$cateClass->getFirstLevel('A04')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A05',$cateClass->getFirstLevel('A05')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A05')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A05',"",""); ?>
												<li><a href="<?php echo get_brand_url('A05',$cateClass->getFirstLevel('A05')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A06',$cateClass->getFirstLevel('A06')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A06')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A06',"",""); ?>
												<li><a href="<?php echo get_brand_url('A06',$cateClass->getFirstLevel('A06')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A07',$cateClass->getFirstLevel('A07')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A07')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A07',"",""); ?>
												<li><a href="<?php echo get_brand_url('A07',$cateClass->getFirstLevel('A07')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A08',$cateClass->getFirstLevel('A08')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A08')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A08',"",""); ?>
												<li><a href="<?php echo get_brand_url('A08',$cateClass->getFirstLevel('A08')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A09',$cateClass->getFirstLevel('A09')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A09')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A09',"",""); ?>
												<li><a href="<?php echo get_brand_url('A09',$cateClass->getFirstLevel('A09')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A11',$cateClass->getFirstLevel('A11')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A11')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A11',"",""); ?>
												<li><a href="<?php echo get_brand_url('A11',$cateClass->getFirstLevel('A11')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A12',$cateClass->getFirstLevel('A12')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A12')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A12',"",""); ?>
												<li><a href="<?php echo get_brand_url('A12',$cateClass->getFirstLevel('A12')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A13',$cateClass->getFirstLevel('A13')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A13')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A13',"",""); ?>
												<li><a href="<?php echo get_brand_url('A13',$cateClass->getFirstLevel('A13')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
										<li><a href="<?php echo get_brand_url('A14',$cateClass->getFirstLevel('A14')->firstArr["be_typeUrl"]); ?>"><?php echo $cateClass->getFirstLevel('A14')->firstArr["be_typeName"]; ?> <b class="caret"></b></a>
											<ul class="mega-menu">
												<?php echo GetElecate('A14',"",""); ?>
												<li><a href="<?php echo get_brand_url('A14',$cateClass->getFirstLevel('A14')->firstArr["be_typeUrl"]); ?>">more >></a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<form action="search.html" method="GET">
							<div class="search-box">
								<select name="type">
									<option class="all-cate" value="">All Categories</option>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A01")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A01","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A02")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A02","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A03")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A03","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A04")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A04","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A05")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A05","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A06")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A06","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A07")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A07","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A08")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A08","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A09")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A09","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A11")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A11","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A12")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A12","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("A13")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("A13","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("B2")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("B2","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("C3")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("C3","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("D4")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("D4","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("E5")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("E5","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("F6")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("F6","",2); ?>
									</optgroup>
									<optgroup  class="cate-item-head" label="<?php echo $cateClass->getFirstLevel("G7")->firstArr["be_typeName"]; ?>">
										<?php echo GetCatecory("G7","",2); ?>
									</optgroup>
								</select>
								<input type="text" name="keystr" placeholder="<?php echo isset($keystr)?$keystr:'acer Aspire'; ?>" value=""/>
								<button type="submit">Search</button>
							</div>
						</form>
					</div>
					<div class="col-xl-4 col-lg-3">
						<div class="mini-cart pull-right">
							<ul>
								<li><a href="javascript:void(0);" class="minicart-icon cart-item cart-icon"><i class="icon_bag_alt"></i><?php echo $unit; ?><span class="total">0</span><span class="item-number">0</span></a>
									<div class="cart-dropdown">
										<ul class="top-cart-list">
											<!-- AJAX -->
										</ul>
										<div class="minicart-total fix">
											<span class="pull-left">total: <?php echo $unit; ?></span>
											<span class="pull-right"><span class="total">0</span></span>
										</div>
										<div class="mini-cart-checkout">
											<a href="cart.html" class="btn-common view-cart">VIEW CARD</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--mobile-header-->
	<div class="sticker mobile-header">
		<div class="container-fluid">
			<!--logo and cart-->
			<div class="row align-items-center">
				<div class="col-sm-4 col-6">
					<div class="logo">
						<a href="index.html"><img src="static/picture/logo.png" alt="logo" /></a>
					</div>
				</div>
				<div class="col-sm-8 col-6">
					<div class="mini-cart text-right">
						<ul>
							<li class="minicart-icon"><a href="javascript:void(0);" class="cart-item cart-icon"><i class="icon_bag_alt"></i><?php echo $unit; ?><span class="total">0</span><span class="item-number">0</span></a>
								<div class="cart-dropdown">
									<ul class="top-cart-list">
										<!-- AJAX -->
									</ul>
									<div class="minicart-total fix">
										<span class="pull-left">total: <?php echo $unit; ?></span>
										<span class="pull-right"><span class="total">0</span></span>
									</div>
									<div class="mini-cart-checkout">
									<a href="cart.html" class="btn-common view-cart">VIEW CARD</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--search-box-->
			<div class="row align-items-center">
				<div class="col-sm-12">
					<div class="search-box mt-sm-15">
					<form action="search.html" method="GET">
						<input type="text" name="keystr" placeholder="<?php echo isset($keystr)?$keystr:'acer Aspire'; ?>" value=""/>
						<button type="submit">Search</button>
					</form>
					</div>
				</div>
			</div>
			<!--site-menu-->
			<div class="row mt-sm-10">
				<div class="col-lg-12">
					<div class="menu-swich"><a href="#my-menu" class="mmenu-icon"><i class="fa fa-bars"></i><span>menu</span></a></div>
					<div class="mainmenu">
						<nav id="my-menu" style="z-index: 9999">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>
									<a href="<?php echo get_series_url('B201',$cateClass->getSecondLevel('B201')->secondArr["typeUrl"],'default','default',1); ?>">
										<?php echo $cateClass->getSecondLevel('B201')->secondArr["typeName"]; ?>
										<b class="caret"></b>
									</a>
									<ul>
										<?php echo getHeadBrandSeries('B201','Acer',8,"mobile"); ?>
										<?php echo getHeadBrandSeries('B201','Dell',8,"mobile"); ?>
										<?php echo getHeadBrandSeries('B201','Apple',8,"mobile"); ?>
										<?php echo getHeadBrandSeries('B201','Asus',8,"mobile"); ?>
										<li><a href="<?php echo get_brand_url('B201',$cateClass->getSecondLevel('B201')->secondArr["typeUrl"]); ?>">more >></a></li>
									</ul>
								</li>
								<li>
									<a href="<?php echo get_series_url('B202',$cateClass->getSecondLevel('B202')->secondArr["typeUrl"],'default','default',1); ?>">
										<?php echo $cateClass->getSecondLevel('B202')->secondArr["typeName"]; ?>
										<b class="caret"></b>
									</a>
									<ul>
										<?php echo getHeadBrandSeries('B202','Amazon',8,"mobile"); ?>
										<?php echo getHeadBrandSeries('B202','Hp',8,"mobile"); ?>
										<?php echo getHeadBrandSeries('B202','Acer',8,"mobile"); ?>
										<?php echo getHeadBrandSeries('B202','Lenovo',8,"mobile"); ?>
										<li><a href="<?php echo get_brand_url('B202',$cateClass->getSecondLevel('B202')->secondArr["typeUrl"]); ?>">more >></a></li>
									</ul>
								</li>
								<li><a href="<?php echo $cateClass->allType["allTypeUrl"]; ?>"><?php echo $cateClass->allType["allTypeName"]; ?> <b class="caret"></b></a>
									<ul class="submenu">
										<li><a href="<?php echo get_series_url('B204',$cateClass->getSecondLevel('B204')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B204')->secondArr["typeName"]; ?></a></li>
										<li><a href="<?php echo get_series_url('B206',$cateClass->getSecondLevel('B206')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B206')->secondArr["typeName"]; ?></a></li>
										<li><a href="<?php echo get_series_url('B203',$cateClass->getSecondLevel('B203')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B203')->secondArr["typeName"]; ?></a></li>
										<li><a href="<?php echo get_series_url('B205',$cateClass->getSecondLevel('B205')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B205')->secondArr["typeName"]; ?></a></li>
										<li><a href="<?php echo get_series_url('B209',$cateClass->getSecondLevel('B209')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('B209')->secondArr["typeName"]; ?></a></li>
										<li><a href="<?php echo get_series_url('F609',$cateClass->getSecondLevel('F609')->secondArr["typeUrl"],'default','default',1); ?>"><?php echo $cateClass->getSecondLevel('F609')->secondArr["typeName"]; ?></a></li>
									</ul>
								</li>
								<li><a href="battery-new-default-1.html">New Products</a></li>
								<li><a href="battery-hot-default-1.html">Hot</span>Best-selling Batteries</a></li>
								<li><a href="battery-video-1.html">Product Video</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--header-area end-->