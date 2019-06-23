	<!-- modernizr js -->
	<script src="static/js/modernizr-3.6.0.min.js"></script>
	<!-- jquery-3.3.1 version -->
	<script src="static/js/jquery-3.2.1.min.js"></script>
	<!-- bootstra.min js -->
	<script src="static/js/bootstrap.min.js"></script>
	<!-- mmenu js -->
	<script src="static/js/jquery.mmenu.js"></script>
	<!-- easing js -->
	<script src="static/js/jquery.easing.min.js"></script>
	<!---slick-js-->
	<script src="static/js/slick.min.js"></script>
	<!---letteranimation-js-->
	<script src="static/js/letteranimation.min.js"></script>
	<!-- jquery-ui js -->
	<script src="static/js/jquery-ui.min.js"></script>
	<!-- jquery.countdown js -->
	<script src="static/js/jquery.countdown.min.js"></script>
	<!-- venobox js -->
	<script src="static/js/venobox.min.js"></script>
	<!-- plugins js -->
	<script src="static/js/plugins.js"></script>
	<!-- main js -->
	<script src="static/js/fly.js"></script>
	<script src="static/js/main.js"></script>
	<script src="static/js/cart.js"></script>
	<script>
		//检查数量框
        function modify(a) {
        	var reg = /^[0-9]*$/;
        	var inputV = $(a).val();
        	if (inputV<=0||!reg.test(inputV)) {
        		setTimeout(function() {
        			$(a).val("1");
        		}, 500);
        	};
        };
        function flyToCart(e) {
			var imgUrl = $(e).parents(".data_input").find("img").eq(0).attr("src");
	        var offset = $(".cart-item").offset(),startOffset = $(e).offset(),
	            scrollTop = $(window).scrollTop();
	        var flyer = $('<img class="u-flyer" style="width: 40px; height: 40px; border-radius: 50%; z-index: 99999;position: fixed;" src="' + imgUrl + '">');
	        var number = $(e).parents(".data_input").find("input[name='gwc_shuliang']").val();
	        var pid =  $(e).parents(".data_input").find("input[name='pid']").val();
	        var jian =  $(e).parents(".data_input").find("input[name='jian']").val();
	        var gwc_procode =  $(e).parents(".data_input").find("input[name='gwc_procode']").val();
	        var gwc_prodes =  $(e).parents(".data_input").find("input[name='gwc_prodes']").val();
	        flyer.fly({
	            start: {
	                left: startOffset.left,
	                top: startOffset.top - scrollTop
	            },
	            end: {
	                left: offset.left + 40,
	                top: offset.top - scrollTop + 15,
	                width: 0,
	                height: 0
	            },
	            onEnd: function () {
	            	shopCart.ajaxAddCart({
	            		animate:1,
	            		pid:pid,
	            		jian:jian,
	            		gwc_shuliang:number,
	            		gwc_procode:gwc_procode,
	            		gwc_prodes:gwc_prodes
	            	});
	                var str = '<i class="addCartOk">+1</i>';
	                $(".cart-icon").prepend(str);
	                setTimeout(function () {
	                    $(".addCartOk:last").remove();
	                }, 1000);
	            }
	        });
		};
		// 弹窗数据
		function dataPopFun(id) {
			$.ajax({
		        url:"data/json_ajax_id.php",
		        data:{id:id},
		        type:"POST",
		        dataType:"json",
		        beforeSend:function(){
		        	var anim = "<div class='main'>\
									<div class='loadEffect'>\
										<div><span></span></div>\
										<div><span></span></div>\
										<div><span></span></div>\
										<div><span></span></div>\
									</div>\
								</div>";
		        	$(".modal-body").html(anim);
		        },
		        success:function(data){
		        	var str='<div class="row data_input">\
						<div class="col-lg-4">\
							<div class="tab-content">';
							for (var i = 0; i < data.imgmore.length; i++) {
								var showClass = '';
								if (i==0) {
									showClass = 'in show active';
								};
						str+='<div id="product-'+i+'" class="tab-pane fade '+showClass+'">\
									<div class="product-details-thumb">\
										<img src="'+data.imgmore[i]+'" alt="'+data.jianjie0+'" />\
									</div>\
								</div>';
							}
						str+='</div>\
							<div class="nav nav-tabs products-nav-tabs horizontal quick-view mt-10 qv-item">';
							for (var j = 0; j < data.imgmore.length; j++) {
								var actClass = '';
								if (j==0) {
									var actClass = 'active';
								};
							str+='<div class="img-list"><a class="'+actClass+'" data-toggle="tab" href="#product-'+j+'"><img src="'+data.imgmore[j]+'" alt="'+data.jianjie0+'" /></a></div>';
							}
						str+='</div>\
						</div>\
						<div class="col-lg-8">\
							<div class="row">\
								<div class="col-lg-8">\
									<div class="product-details-desc">\
										<h2><a href="'+data.productUrl+'">'+data.jianjie2+'</a></h2>\
										<ul>\
											<li>1.6 GHz dual-core Intel Core i5 (Turbo Boost up to 2.7 GHz) with 3 MB shared L3 cache 8 GB of 1600 MHz LPDDR3 RAM; 128 GB PCIe-based flash storage</li>\
											<li>13.3-Inch (diagonal) LED-backlit Glossy Widescreen Display, 1440 x 900 resolution Intel HD Graphics 6000</li>\
											<li>OS X El Capitan, Up to 12 Hours of Battery Life Macbook Air does not have a Retina display on any model.</li>\
										</ul>\
										<div class="product-meta">\
											<ul class="list-none">\
												<li>SKU: '+data.pcode+' <span>|</span></li>\
												<li>Categories:\
													<a href="'+data.typeUrl+'" title="'+data.typeName+'">'+data.typeName+'</a>\
													<span>|</span>\
												</li>\
												<li>Brand: '+data.brand+'<span>|</span></li>';
												if (data.dl!=""||data.dl!=null) {
													str+='<li>'+data.dlname+': '+data.dl+'<span>|</span></li>';
												}
												if (data.dy!=""||data.dy!=null) {
													str+='<li>'+data.dyname+': '+data.dy+'<span>|</span></li>';
												}
											str+='</ul>\
										</div>\
										<div class="social-icons style-5">\
											<span>Share Link:</span>\
											<a href="#"><i class="fa fa-facebook"></i></a>\
											<a href="#"><i class="fa fa-twitter"></i></a>\
											<a href="#"><i class="fa fa-google-plus"></i></a>\
											<a href="#"><i class="fa fa-rss"></i></a>\
										</div>\
									</div>\
								</div>\
								<div class="col-lg-4">\
									<div class="product-action stuck text-left">\
										<div class="free-delivery">\
											<img src="https://www.tuttebatterie.com/img/s-pic/paypal_verified_seal.png" alt="">\
										</div>\
										<div class="product-price-rating">\
											<div>\
												<del>'+data.oldprice+' '+data.unit+'</del>\
											</div>\
											<span>'+data.price+' '+data.unit+'</span>\
											<div class="pull-right">\
												<i class="fa fa-star"></i>\
												<i class="fa fa-star"></i>\
												<i class="fa fa-star"></i>\
												<i class="fa fa-star"></i>\
												<i class="fa fa-star-o"></i>\
											</div>\
										</div>\
										<div class="product-colors mt-20">\
											<label>Select Color:</label>\
											<ul class="list-none">\
												<li>Red</li>\
												<li>Black</li>\
												<li>Blue</li>\
											</ul>\
											\
										</div>\
										<div class="product-quantity mt-15">\
											<label>Quatity:</label>\
											<a href="javascript:;" class="btn btn-primary btn-count active" role="button" count="reduce" onclick="countNum(this)">-</a>\
											<input type="number" onkeyup="modify(this);" name="gwc_shuliang" min="1" max="999" value="1" />\
											<a href="javascript:;" class="btn btn-primary btn-count active" role="button" count="plus" onclick="countNum(this)">+</a>\
										</div>\
										<div class="add-to-get mt-50">\
											<a href="#" class="add-to-cart">Add to Cart</a>\
											<a href="javascript:;" onclick="flyToCart(this)" class="add-to-cart compare">+ ADD to Compare</a>\
											<input type="hidden" oninput="OnInput(event)" onpropertychange="OnPropChanged(event)" name="pid" value="'+data.pid+'"/>\
											<input type="hidden" oninput="OnInput(event)" onpropertychange="OnPropChanged(event)" name="jian" value="'+data.jianjie0+'"/>\
											<input type="hidden" oninput="OnInput(event)" onpropertychange="OnPropChanged(event)" name="gwc_procode" value="'+data.pcode+'"/>\
											<input type="hidden" oninput="OnInput(event)" onpropertychange="OnPropChanged(event)" name="gwc_prodes" value="'+data.jianjie2+'"/>\
										</div>\
									</div>\
								</div>\
							</div>\
						</div>\
					</div>';
				    $(".modal-body").html(str);
		        },
		        complete:function () {
		        	/*---------------------
					 quick view small img tab
					--------------------- */
					$(".qv-item").slick({
						infinite: true,
						speed: 300,
						slidesToShow: 4,
						slidesToScroll: 1,
						autoplay: true,
						arrows:true,
						prevArrow: "<button type='button' class='slick-prev'></button>",
						nextArrow: "<button type='button' class='slick-next'></button>",
					});
					$('.products-nav-tabs [data-toggle="tab"]').on('click',function (e) {
				  		$(e.target).parents('[data-toggle="tab"]').parent().siblings().find('[data-toggle="tab"]').removeClass('active show');
				  	});
		        },
		        error:function(msg){
		            console.log(msg);
		        }
		    });
		};
		function getOff(act,qtyNum=0) {
        	if (act==1) {
	        	var offCheck = $("#offprice").prop("checked");
	        	var fastPayUrl = $('#fastpay').attr("data-action"),payUrl = $("#defaultForm").attr("data-action");
				<?php require_once("public/function.php"); $off = lock_url("discount", "aaaaa");?>
	        	if (offCheck==true) {
	        		if (qtyNum<5) {
	        			popInfo();
	        			$(".discount").text(0);
	        		} else {
	        			fastPayUrl = fastPayUrl+'?checkdis=<?php echo $off; ?>';
	        			payUrl = payUrl+'&checkdis=<?php echo $off; ?>';
	        			$("#pop-info-wrap").remove();
	        		}
	        	} else {
	        		close_pop();
	        	};
	        	$('#fastpay').attr({"action":fastPayUrl});
				$("#defaultForm").attr({"action":payUrl});
        	}
        };
        // 折扣提示弹窗
        function popInfo() {
        	var infostr='Your purchase quantity does not meet the wholesale purchase conditions';
        	var popHtml='<div id="pop-info-wrap" style="z-index:999;position:absolute;bottom:35px;left:0;background-color:#fff;-moz-box-shadow:2px 4px 13px #ADADAD; -webkit-box-shadow:2px 4px 13px #ADADAD; box-shadow:2px 4px 13px #ADADAD;width:100%;max-height:200px;"><p id="pop-info" style="padding: 20px;font-size: 16px;">'+infostr+'</p><button class="btn btn-warning btn-xs" onclick="close_pop()" style="position: absolute;right: 10px;bottom: 10px;">close</button><span style="position: absolute;left: 50%;width: 16px;height: 16px;bottom: -7px;background: #fff;transform: rotateZ(135deg);"></span></div>';
        	$(".pop-site").html(popHtml);
        };
        // 关闭弹窗
        function close_pop() {
        	$("#pop-info-wrap").remove();
        	$("#offprice").prop("checked",false);
        };
		// 弹窗加减
		function countNum(This) {
			var countWay = $(This).attr("count");
			var num=1;
			if (countWay=="plus") {
				num = $(This).prev("input").val();
				num++;
				if (num>999) {
					return false;
				}
				$(This).prev("input").val(num);
			}
			if (countWay=="reduce") {
				num = $(This).next("input").val();
				num--;
				if (num<1) {
					return false;
				}
				$(This).next("input").val(num);
			}
		}
	</script>
	<!-- Modal -->
	<div class="modal fade" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
				</div>
			</div>
		</div>
	</div>