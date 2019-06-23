(function ($) {
 "use strict";

$('#my-menu').mmenu();

$(".vm-menu").on('click', function(){
	$(".vm-dropdown").toggleClass("v-toggle");
});

$(".minicart-icon").on('click', function(){
	$(".cart-dropdown").slideToggle();
});

$(".vm-dropdown li").on('click', function() {
	$(this).children( 'ul.mega-menu').toggleClass('open');
})
/*---------------------
  menu-stick
--------------------- */
var s = $(".sticker");
var pos = s.position();					   
$(window).on('scroll',function() {
	var windowpos = $(window).scrollTop();
	if (windowpos > pos.top) {
	s.addClass("stick");
	} else {
		s.removeClass("stick");	
	}
});
/*--------------------------
 scrollUp
---------------------------- */	
$.scrollUp({
	scrollText: '<i class="fa fa-angle-up"></i>',
	easingType: 'linear',
	scrollSpeed: 900,
	animation: 'slide'
}); 

/*-------------------------------------
    Hero Slider
----------------------------------------*/
var mainSlider = $('.main-slider');
mainSlider.slick({
	arrows: true,
	accessibility:true,
	prevArrow:"<button type='button' class='slick-prev'></button>",
	nextArrow:"<button type='button' class='slick-next'></button>",
	autoplay: true,
	autoplaySpeed: 5000,
	dots: true,
	pauseOnFocus: true,
	pauseOnHover: true,
	fade: true,
	infinite: true,
	slidesToShow: 1,
	responsive: [
		{
		  breakpoint: 767,
		  settings: {
			  arrows: false
		  }
		},
		{
			breakpoint: 479,
			settings: {
				arrows: false
			}
		}
	]
});
mainSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
	var sliderTitle = $('.main-slider h2');
	var currentTitle = $('.slick-current h2');
	sliderTitle.removeClass('cssanimation leDoorCloseLeft sequence');
	currentTitle.addClass('cssanimation leDoorCloseLeft sequence');
});
mainSlider.on('afterChange', function(event, slick, currentSlide, nextSlide){
	var sliderTitle = $('.main-slider h2');
	var currentTitle = $('.slick-current h2');
	sliderTitle.removeClass('cssanimation leDoorCloseLeft sequence');
	currentTitle.addClass('cssanimation leDoorCloseLeft sequence');
});
/*--------------------------
 product category carousel
---------------------------- */
$(".product-categories-carousel").slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 6,
  adaptiveHeight: true,
  prevArrow: "<button type='button' class='slick-prev'></button>",
  nextArrow: "<button type='button' class='slick-next'></button>",
	responsive: [
		{
			breakpoint: 361,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 4
			}
		},
	]
});
/*--------------------------
 product category 2
---------------------------- */
$(".five-catItems").slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 5,
  adaptiveHeight: true,
  prevArrow: "<button type='button' class='slick-prev'></button>",
  nextArrow: "<button type='button' class='slick-next'></button>",
  responsive: [
    {
      breakpoint: 1400,
      settings: {
        slidesToShow: 4,
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 361,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
});
/*--------------------------
 one-carousel
---------------------------- */
$(".one-carousel").slick({
	dots: true,
	list:false,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 1,
	adaptiveHeight: true,
	arrows:true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
});
/*--------------------------
 product-deals
---------------------------- */
$(".product-deals").slick({
	dots: false,
	list:false,
	autoplay: true,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 1,
	slidesToScroll: 1,
	adaptiveHeight: true,
	arrows:false,
	responsive: [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 481,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}
	]
});
/*--------------------------
 product-carousel
---------------------------- */
$(".product-carousel").slick({
	dots: true,
	list:false,
	autoplay: true,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 5,
	slidesToScroll: 5,
	adaptiveHeight: true,
	arrows:true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
	responsive: [
		{
			breakpoint: 361,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 4
			}
		},
	]
});
/*--------------------------
 product-carousel
---------------------------- */
$(".products-three").slick({
	dots: true,
	list:false,
	autoplay: false,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 4,
	slidesToScroll: 4,
	adaptiveHeight: true,
	arrows:false,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
	responsive: [
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 993,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 361,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}
	]
});
/*--------------------------
 four-items
---------------------------- */
$(".four-items").slick({
	dots: true,
	list:false,
	autoplay: true,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 4,
	slidesToScroll: 4,
	adaptiveHeight: true,
	arrows: true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
	responsive: [
		{
			breakpoint: 993,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		},
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 361,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}
	]
});
/*--------------------------
 best-seller-carousel
---------------------------- */
$(".best-seller").slick({
	dots: true,
	list:false,
	autoplay: false,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 5,
	slidesToScroll: 5,
	adaptiveHeight: true,
	arrows:true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
	responsive: [
		{
			breakpoint: 361,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 4
			}
		},
	]
});
/*--------------------------
 product-carousel-full-width
---------------------------- */
$(".product-carousel-fullwidth").slick({
	dots: true,
	list:false,
	autoplay: false,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 6,
	slidesToScroll: 6,
	adaptiveHeight: true,
	arrows:false,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
	responsive: [
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 4,
			}
		},
		{
			breakpoint: 993,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		},
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 361,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}
	]
});
/*--------------------------
 blog-carousel
---------------------------- */
$(".blog-carousels").slick({
	dots: false,
	list:false,
	autoplay: false,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 1,
	slidesToScroll: 1,
	adaptiveHeight: true,
	arrows:true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
	responsive: [
		{
			breakpoint: 993,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		},
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 481,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}
	]
});
/*--------------------------
 recent-products
---------------------------- */
$(".recent-products").slick({
	dots: false,
	list:false,
	autoplay: false,
	autoplaySpeed: 5000,
	infinite: true,
	speed: 700,
	slidesToShow: 3,
	slidesToScroll: 3,
	adaptiveHeight: true,
	arrows:true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
	responsive: [
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		},
		{
			breakpoint: 361,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}
	]
});
/*--------------------------
brand carousel
---------------------------- */
$(".brand-items").slick({
	dots: false,
	infinite: true,
	speed: 300,
	slidesToShow: 8,
	slidesToScroll: 1,
	adaptiveHeight: true,
	autoplay: true,
	responsive: [
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 5,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 481,
			settings: {
				slidesToShow: 2,
			}
		}
	],
	arrows:true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
});
/*---------------------
product detail tab
--------------------- */
$(".product-img-tab").slick({
	vertical: true,
	verticalSwiping: true,
	dots: false,
	infinite: true,
	speed: 300,
	slidesToShow: 4,
	slidesToScroll: 1,
	autoplay: true,
	arrows:true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
});
function getImgTab (e) {
    var zoompro = document.getElementsByClassName('zoompro')[0];
    var thisImg = e.getAttribute('src');
    zoompro.setAttribute('src',thisImg);
};
/*---------------------
countdown
--------------------- */
$('[data-countdown]').each(function() {
	
	var $this = $(this), finalDate = $(this).data('countdown');
	
	$this.countdown(finalDate, function(event) {
	$this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span><p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
	});
	
});

/*----------------------------
 price-slider
------------------------------ */
var dataMin=Number($("#slider-range").attr("data-min")),dataMax=Number($("#slider-range").attr("data-max")),
		dataMin0=Number($("#slider-range").attr("data-min-0")),dataMax0=Number($("#slider-range").attr("data-max-0"));
$( "#slider-range" ).slider({
	range: true,
	min: dataMin,
	max: dataMax,
	values: [ dataMin0, dataMax0 ],
	slide: function( event, ui ) {
		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	},
	stop: function () {
		$("#submit-attr").submit();
	}
});
$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
" - $" + $( "#slider-range" ).slider( "values", 1 ) );
$(".check-wrap label").on("click",function () {
	if (!$(this).siblings("input").eq(0).prop("checked")) {
		$(this).addClass("act");
	} else {
		$(this).removeClass("act");
	};
});

$(document).ready(function (argument) {
	$("#slider-range").mouseup(function () {
		setTimeout(submitAttr,100);
	});
	$("#submit-attr label").click(function () {
		setTimeout(submitAttr,100);
	});
	function submitAttr(){
		$("#submit-attr").submit();
	};
});
/*---------------------------
 3D Trans
 ----------------------------*/ 
 $(".threed-trans>a").on("mouseenter mouseleave",function (e) {
 	var w = $(this).width();
    var h = $(this).height();
	var x = (e.pageX - ($(this).offset().left + (w / 2)));
	var y = -(e.pageY - ($(this).offset().top + (h / 2)));
	var angleM = Math.round((Math.atan2(y, x) * 180) / Math.PI);//获取鼠标位置以元素中心为原点的坐标
	var angleT = Math.abs(Math.round((Math.atan2(h/2, w/2) * 180) / Math.PI));//获取侧边对角度数
	var angleR = 90-angleT;
	var eType = e.type;
	if (eType=="mouseenter") {
		if (angleM>=angleT && angleM<2*angleR+angleT) { //上
			$(this).css({"transform":"rotateY(0deg) rotateX(-90deg)","-webkit-transform":"rotateY(0deg) rotateX(-90deg)"});
		} else if (angleM>=-angleT && angleM<angleT) { //右
			$(this).css({"transform":"rotateY(-90deg) rotateX(0deg)","-webkit-transform":"rotateY(-90deg) rotateX(0deg)"});
		} else if (angleM>=-(2*angleR+angleT) && angleM<-angleT) { //下
			$(this).css({"transform":"rotateY(0deg) rotateX(90deg)","-webkit-transform":"rotateY(0deg) rotateX(90deg)"});
		} else if (angleM>=2*angleR+angleT && angleM<=180 || angleM>=-180 && angleM<-(2*angleR+angleT) ) { //左
			$(this).css({"transform":"rotateY(90deg) rotateX(0deg)","-webkit-transform":"rotateY(90deg) rotateX(0deg)"});
		}
	} else {
		$(this).css({"transform":"rotate(0)"});
	}
	
 });
 $('.video-nav').slick({
	dots: false,
	infinite: true,
	speed: 300,
	slidesToShow: 5,
	slidesToScroll: 1,
	adaptiveHeight: true,
	autoplay: true,
	responsive: [
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 5,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 481,
			settings: {
				slidesToShow: 2,
			}
		}
	],
	arrows:true,
	prevArrow: "<button type='button' class='slick-prev'></button>",
	nextArrow: "<button type='button' class='slick-next'></button>",
});
/*--------------------------
 venobox
---------------------------- */	
$(document).ready(function(){
    $('.venobox').venobox();
});

})(jQuery); 