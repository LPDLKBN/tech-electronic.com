<?php  
/**
 * 定义产品分类和meta、title标签的内容
 */
class Category
{
	public $allType =array("allTypeName"=>"All - By Type","allTypeUrl"=>"battery.html");
	public $firstArr =array();//一级分类数组
	public $secondArr =array();//二级分类数组
	// 定义meta标签keyword和description以及title
	public $title="";
	public $metaKeyword="";
	public $metaDescription="";
	// 赋值一级分类
	public function getFirstLevel($be_type)
	{
		switch ($be_type) { //A开头的一级分类 此每类有独立链接
			case 'A01':
				$this->firstArr["be_typeName"] = "Toy & Baby Gear";//一级分类名
				$this->firstArr["be_typeUrl"] = "Toy-Baby-Gear";//一级分类区分词
				return $this;
				break;
			case 'A02':
				$this->firstArr["be_typeName"] = "Car Parts & Accessories";//一级分类名
				$this->firstArr["be_typeUrl"] = "Car-Parts-Accessories";//一级分类区分词
				return $this;
				break;
			case 'A03':
				$this->firstArr["be_typeName"] = "Home & Living";//一级分类名
				$this->firstArr["be_typeUrl"] = "Home-Living";//一级分类区分词
				return $this;
				break;
			case 'A04':
				$this->firstArr["be_typeName"] = "Kitchen & Dining";//一级分类名
				$this->firstArr["be_typeUrl"] = "Kitchen-Dining";//一级分类区分词
				return $this;
				break;
			case 'A05':
				$this->firstArr["be_typeName"] = "Mobile phones & Accessories";//一级分类名
				$this->firstArr["be_typeUrl"] = "Mobile-phones-Accessories";//一级分类区分词
				return $this;
				break;
			case 'A06':
				$this->firstArr["be_typeName"] = "Laptops & Tablets";//一级分类名
				$this->firstArr["be_typeUrl"] = "Laptops-Tablets";//一级分类区分词
				return $this;
				break;
			case 'A07':
				$this->firstArr["be_typeName"] = "Home Audio & Video";//一级分类名
				$this->firstArr["be_typeUrl"] = "Home-Audio-Video";//一级分类区分词
				return $this;
				break;
			case 'A08':
				$this->firstArr["be_typeName"] = "Health & Beauty";//一级分类名
				$this->firstArr["be_typeUrl"] = "Health-Beauty";//一级分类区分词
				return $this;
				break;
			case 'A09':
				$this->firstArr["be_typeName"] = "Video Cameras & Camcorder Accessories";//一级分类名
				$this->firstArr["be_typeUrl"] = "Video-Cameras";//一级分类区分词
				return $this;
				break;
			case 'A11':
				$this->firstArr["be_typeName"] = "Lights & Lighting";//一级分类名
				$this->firstArr["be_typeUrl"] = "Lights-Lighting";//一级分类区分词
				return $this;
				break;
			case 'A12':
				$this->firstArr["be_typeName"] = "Electrical Equipment & Supplies";//一级分类名
				$this->firstArr["be_typeUrl"] = "Electrical-Equipment-Supplies";//一级分类区分词
				return $this;
				break;
			case 'A13':
				$this->firstArr["be_typeName"] = "Security & Safety";//一级分类名
				$this->firstArr["be_typeUrl"] = "Security-Safety";//一级分类区分词
				return $this;
				break;
			case 'A14':
				$this->firstArr["be_typeName"] = "Computers & Networking";//一级分类名
				$this->firstArr["be_typeUrl"] = "Computers-Networking";//一级分类区分词
				return $this;
				break;
			case 'B2':
				$this->firstArr["be_typeName"] = "Telecommunication / multimedia";//一级分类名
				$this->firstArr["be_typeUrl"] = "";//一级分类区分词
				return $this;
				break;
			case 'C3':
				$this->firstArr["be_typeName"] = "Medical";//一级分类名
				$this->firstArr["be_typeUrl"] = "";//一级分类区分词
				return $this;
				break;
			case 'D4':
				$this->firstArr["be_typeName"] = "Professional equipment";//一级分类名
				$this->firstArr["be_typeUrl"] = "";//一级分类区分词
				return $this;
				break;
			case 'E5':
				$this->firstArr["be_typeName"] = "Industrial Equipment";//一级分类名
				$this->firstArr["be_typeUrl"] = "";//一级分类区分词
				return $this;
				break;
			case 'F6':
				$this->firstArr["be_typeName"] = "House";//一级分类名
				$this->firstArr["be_typeUrl"] = "";//一级分类区分词
				return $this;
				break;
			case 'G7':
				$this->firstArr["be_typeName"] = "Outdoor leisure";//一级分类名
				$this->firstArr["be_typeUrl"] = "";//一级分类区分词
				return $this;
				break;
			case 'H8':
				$this->firstArr["be_typeName"] = "Accessories";//一级分类名
				$this->firstArr["be_typeUrl"] = "";//一级分类区分词
				return $this;
				break;
			case 'K9':
				$this->firstArr["be_typeName"] = "Automobiles & Motorcycles";//一级分类名
				$this->firstArr["be_typeUrl"] = "";//一级分类区分词
				return $this;
				break;
			default:
				break;
		}
	}
	//赋值二级分类
	public function getSecondLevel($type)
	{
		if (preg_match('/A01/i',$type)) { //A01~A14属于电子产品
			switch ($type) {
				case 'A0101':
					$this->secondArr["typeName"] = "Baby Monitors";//二级分类名
					$this->secondArr["typeUrl"] = "Baby-Monitors";//二级分类区分词
					$this->secondArr["cateTitle"]="Baby Monitor for IP Camera";
					$this->secondArr["cateKeyword"]="Baby Monitor,Wireless Camera Baby,Baby Monitor for IP Camera";
					$this->secondArr["cateDescription"]="Baby Monitor help parents to keep an eye on their bundle, or bundles, of joy using IP cameras. Baby Monitor is a must have thing that makes parenting easier!";
					return $this;
					break;
				case 'A0102':
					$this->secondArr["typeName"] = "Baby Toys";//二级分类名
					$this->secondArr["typeUrl"] = "Baby-Toys";//二级分类区分词
					$this->secondArr["cateTitle"]="High-quality baby toys&Early learning toys";
					$this->secondArr["cateKeyword"]="Baby Toys, Early Learning Toys,";
					$this->secondArr["cateDescription"]="Explore our selection of high-quality baby toys, Choose from rattles, musical animals, baby gyms, mobiles, plush & organic toys, children's books and much more.Early learning toys teach your child about the world, reinforcing basic motor skills, spatial sense, color recognition, counting, and more.";
					return $this;
					break;
				case 'A0103':
					$this->secondArr["typeName"] = "Finger Spinner";//二级分类名
					$this->secondArr["typeUrl"] = "Finger-Spinner";//二级分类区分词
					$this->secondArr["cateTitle"]="Finger Spinner Sale";
					$this->secondArr["cateKeyword"]="Finger Spinner";
					$this->secondArr["cateDescription"]="You can get best finger and hand spinners ! We offers fashion tri spinners, finger gyro and more. Find the special toys from here!";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A02/i',$type)) {
			switch ($type) {
				case 'A0201':
					$this->secondArr["typeName"] = "Car Electronics";//二级分类名
					$this->secondArr["typeUrl"] = "Car-Electronics";//二级分类区分词
					$this->secondArr["cateTitle"]="Car Accessories &Car Electronics";
					$this->secondArr["cateKeyword"]="car accessories,car adapter";
					$this->secondArr["cateDescription"]="We offers the best car accessories and car electronics,  including gps, dvd player, car radio, speakers, car audio, stereo and so on";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A03/i',$type)) {
			switch ($type) {
				case 'A0301':
					$this->secondArr["typeName"] = "Alarm Clocks&Wall Clocks";//二级分类名
					$this->secondArr["typeUrl"] = "Alarm-Clocks";//二级分类区分词
					$this->secondArr["cateTitle"]="From Wall Clocks to Desk Clocks";
					$this->secondArr["cateKeyword"]="Wall Clocks,Clocks,Alarm Clock";
					$this->secondArr["cateDescription"]="Save time (and money) by shopping with us. A wide selection of unique clocks! From wall clocks to desk clocks, bring home the right timepiece for you.";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A04/i',$type)) {
			switch ($type) {
				case 'A0401':
					$this->secondArr["typeName"] = "Digital Scales";//二级分类名
					$this->secondArr["typeUrl"] = "Digital-Scales";//二级分类区分词
					$this->secondArr["cateTitle"]="Digital Kitchen Scale Home Food Scales";
					$this->secondArr["cateKeyword"]="Scale,Digital Scale,Digital Kitchen Scale";
					$this->secondArr["cateDescription"]="Essential Home Food Scales. Our digital scales can be very accurate. Whether you’re an avid cook, baking fanatic, or die-hard coffee nerd, you’re going to benefit from using a kitchen scale. ";
					return $this;
					break;
				case 'A0402':
					$this->secondArr["typeName"] = "Cooking Tools";//二级分类名
					$this->secondArr["typeUrl"] = "Cooking-Tools";//二级分类区分词
					$this->secondArr["cateTitle"]="Cheap kitchen tools & gadgets online store";
					$this->secondArr["cateKeyword"]="Kitchen Gadgets,Kitchen Utensils,Kitchen Tools";
					$this->secondArr["cateDescription"]="Cheap kitchen tools & gadgets online store. Browse our great selection of Kitchen, Cutting & Utility Boards, & more";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A05/i',$type)) {
			switch ($type) {
				case 'A0501':
					$this->secondArr["typeName"] = "Phone Holder";//二级分类名
					$this->secondArr["typeUrl"] = "Phone-Holder";//二级分类区分词
					$this->secondArr["cateTitle"]="Cell Phone Holder, Stand, Mounts & More";
					$this->secondArr["cateKeyword"]="phone holder for the car,smartphone car mount,Phone Holder,Phone Stand";
					$this->secondArr["cateDescription"]="Universal phone holder that keeps your phone safe when your hands are busy. Use it in the car, in the gym, in the kitchen. We carry a wide selection of Cell Phone Mounts and Holders with the best prices, fast shipping and top-rated customer service. Best smartphone car mount, best phone holder for t";
					return $this;
					break;
				case 'A0502':
					$this->secondArr["typeName"] = "Phone Accessories";//二级分类名
					$this->secondArr["typeUrl"] = "Phone-Accessories";//二级分类区分词
					$this->secondArr["cateTitle"]="Cell Phone Accessories";
					$this->secondArr["cateKeyword"]="Cell Phone Accessories";
					$this->secondArr["cateDescription"]="Cell Phone Accessories - Your Online Cell Phones & Accessories Store! Products including iPhone accessories, & smartphone accessories like BLUETOOTH, batteries, cases, chargers, phone covers, headsets & more";
					return $this;
					break;
				case 'A0503':
					$this->secondArr["typeName"] = "Smart Watch";//二级分类名
					$this->secondArr["typeUrl"] = "Smart-Watch";//二级分类区分词
					$this->secondArr["cateTitle"]="The smartwatch is the ultimate smartphone accessory";
					$this->secondArr["cateKeyword"]="The smartwatch is the ultimate smartphone accessory.Shop Best Buy for a great selection of smartwatches from popular brands that match your lifestyle. It can tell the time, of course, but it can also beam important notifications straight to your wrist, and run native apps.";
					$this->secondArr["cateDescription"]="smart watch ,smart watch android, bluetooth watch, smart watch iphone, pebble watch, phone watch, android watch";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A06/i',$type)) {
			switch ($type) {
				case 'A0601':
					$this->secondArr["typeName"] = "Case";//二级分类名
					$this->secondArr["typeUrl"] = "Case";//二级分类区分词
					$this->secondArr["cateTitle"]="Laptop and Tablet Bags, Cases & Sleeves";
					$this->secondArr["cateKeyword"]="tablet case,Tablet Bag,Sleeves";
					$this->secondArr["cateDescription"]="Find the right tablet case for your iPad, Kindle, Samsung and many other devices. Best Tablet Cases - Protective Covers to Kid-Proof a Tablet.";
					return $this;
					break;
				case 'A0602':
					$this->secondArr["typeName"] = "Tablet & Laptop Accessories";//二级分类名
					$this->secondArr["typeUrl"] = "Tablet-Laptop-Accessories";//二级分类区分词
					$this->secondArr["cateTitle"]="Tablet & Laptop Accessories";
					$this->secondArr["cateKeyword"]="chargers,keyboards,screen";
					$this->secondArr["cateDescription"]="A wide selection of Tablet & Laptop Accessories including screen protectors, chargers, cases, keyboards and more.";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A07/i',$type)) {
			switch ($type) {
				case 'A0701':
					$this->secondArr["typeName"] = "Video Game";//二级分类名
					$this->secondArr["typeUrl"] = "Video-Game";//二级分类区分词
					$this->secondArr["cateTitle"]="Video Game accessories for Nintendo Wii / Sony PS3 / Xbox 360 / Wii / Sony PSP.";
					$this->secondArr["cateKeyword"]="Video Games,Console Games,PC Games,";
					$this->secondArr["cateDescription"]="If you're an avid gamer, you'll find a thrilling selection of games, consoles and accessories. Our products include controllers, video rockers, cables, accessories for Nintendo Wii / Sony PS3 / Xbox 360 / Wii / Sony PSP.";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A08/i',$type)) {
			switch ($type) {
				case 'A0801':
					$this->secondArr["typeName"] = "Makeup&Skin Care";//二级分类名
					$this->secondArr["typeUrl"] = "Makeup-Skin-Care";//二级分类区分词
					$this->secondArr["cateTitle"]="Makeup Tools, Nail Accessories & Makeup Brushes";
					$this->secondArr["cateKeyword"]="skin care tools,cosmetic bags,makeup tools,Beauty tools";
					$this->secondArr["cateDescription"]="For those who are serious about self-care, we offer a wealth of beauty supplies online, including makeup tools, skin care tools, and cosmetic bags. That will make you more beautiful";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A09/i',$type)) {
			switch ($type) {
				case 'A0901':
					$this->secondArr["typeName"] = "Digital Video Recorder";//二级分类名
					$this->secondArr["typeUrl"] = "Digital-Video-Recorder";//二级分类区分词
					$this->secondArr["cateTitle"]="Surveillance Video Recorders";
					$this->secondArr["cateKeyword"]="DVR, Video Recorder";
					$this->secondArr["cateDescription"]="Find great deals for TV DVR Recorder in Home DVRs and Hard Drive Recorders.  By considering your preferences and resources, you can find the right DVR to meet your needs and streamline your entertainment experience.";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A11/i',$type)) {
			switch ($type) {
				case 'A1101':
					$this->secondArr["typeName"] = "Led Grow Light";//二级分类名
					$this->secondArr["typeUrl"] = "Led-Grow-Light";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				case 'A1102':
					$this->secondArr["typeName"] = "Outdoor Lighting";//二级分类名
					$this->secondArr["typeUrl"] = "Outdoor-Lighting";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A12/i',$type)) {
			switch ($type) {
				case 'A1201':
					$this->secondArr["typeName"] = "Power Tools ";//二级分类名
					$this->secondArr["typeUrl"] = "Power-Tools ";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				case 'A1202':
					$this->secondArr["typeName"] = "Electrical Equipment Supplies ";//二级分类名
					$this->secondArr["typeUrl"] = "Electrical-Equipment-Supplies ";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				case 'A1203':
					$this->secondArr["typeName"] = "Test Measure Inspection Equipment";//二级分类名
					$this->secondArr["typeUrl"] = "Test-Measure";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A13/i',$type)) {
			switch ($type) {
				case 'A1301':
					$this->secondArr["typeName"] = "IP Cameras";//二级分类名
					$this->secondArr["typeUrl"] = "IP-Cameras";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				case 'A1302':
					$this->secondArr["typeName"] = "CCTV Systems";//二级分类名
					$this->secondArr["typeUrl"] = "CCTV-Systems";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				case 'A1303':
					$this->secondArr["typeName"] = "Access Control Systems ";//二级分类名
					$this->secondArr["typeUrl"] = "Access-Control-Systems ";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				case 'A1304':
					$this->secondArr["typeName"] = "Mobile Signal Boosters";//二级分类名
					$this->secondArr["typeUrl"] = "Mobile-Signal-Boosters";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/A14/i',$type)) {
			switch ($type) {
				case 'A1401':
					$this->secondArr["typeName"] = "";//二级分类名   暂无
					$this->secondArr["typeUrl"] = "";//二级分类区分词
					$this->secondArr["cateTitle"]="";
					$this->secondArr["cateKeyword"]="";
					$this->secondArr["cateDescription"]="";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/B2/i',$type)) {
			switch ($type) {
				case 'B201':
					$this->secondArr["typeName"] = "Laptop battery";
					$this->secondArr["typeUrl"] = "Laptop-battery";
					return $this;
					break;
				case 'B202':
					$this->secondArr["typeName"] = "Tablet battery";
					$this->secondArr["typeUrl"] = "Tablet-battery";
					return $this;
					break;
				case 'B203':
					$this->secondArr["typeName"] = "cell phone battery";
					$this->secondArr["typeUrl"] = "Mobile-phone-battery";
					return $this;
					break;
				case 'B204':
					$this->secondArr["typeName"] = "Camcorder battery";
					$this->secondArr["typeUrl"] = "Camcorder-battery";
					return $this;
					break;
				case 'B205':
					$this->secondArr["typeName"] = "Camera battery";
					$this->secondArr["typeUrl"] = "Camera-battery";
					return $this;
					break;
				case 'B206':
					$this->secondArr["typeName"] = "Onboard camera battery";
					$this->secondArr["typeUrl"] = "Onboard-camera-battery";
					return $this;
					break;
				case 'B207':
					$this->secondArr["typeName"] = "Cordless phone battery";
					$this->secondArr["typeUrl"] = "Cordless-phone-battery";
					return $this;
					break;
				case 'B208':
					$this->secondArr["typeName"] = "GPS Battery";
					$this->secondArr["typeUrl"] = "GPS-Battery";
					return $this;
					break;
				case 'B209':
					$this->secondArr["typeName"] = "Bluetooth speaker battery";
					$this->secondArr["typeUrl"] = "Bluetooth-speaker-battery";
					return $this;
					break;
				case 'B210':
					$this->secondArr["typeName"] = "Two-way Radio battery";
					$this->secondArr["typeUrl"] = "Walkie-talkie-battery";
					return $this;
					break;
				case 'B211':
					$this->secondArr["typeName"] = "E-reader battery";
					$this->secondArr["typeUrl"] = "E-reader-battery";
					return $this;
					break;
				case 'B212':
					$this->secondArr["typeName"] = "Power bank";
					$this->secondArr["typeUrl"] = "Power-bank";
					return $this;
					break;
				case 'B213':
					$this->secondArr["typeName"] = "Game console battery";
					$this->secondArr["typeUrl"] = "Game-console-battery";
					return $this;
					break;
				case 'B214':
					$this->secondArr["typeName"] = "Headphones battery";
					$this->secondArr["typeUrl"] = "Headphones-battery";
					return $this;
					break;
				case 'B215':
					$this->secondArr["typeName"] = "Universal remote control battery";
					$this->secondArr["typeUrl"] = "Universal-remote-control-battery";
					return $this;
					break;
				case 'B216':
					$this->secondArr["typeName"] = "Wireless mouse battery";
					$this->secondArr["typeUrl"] = "Wireless-mouse-battery"; 
					return $this;
					break;
				case 'B217':
					$this->secondArr["typeName"] = "Printer battery";
					$this->secondArr["typeUrl"] = "Printer-battery"; 
					return $this;
					break;
				case 'B218':
					$this->secondArr["typeName"] = "Notebook adapter";
					$this->secondArr["typeUrl"] = "Notebook-adapter"; 
					return $this;
					break;
				case 'B219':
					$this->secondArr["typeName"] = "PC power supply";
					$this->secondArr["typeUrl"] = "PC-power-supply";
					return $this;
					break;
				case 'B220':
					$this->secondArr["typeName"] = "WiFi Router battery";
					$this->secondArr["typeUrl"] = "WiFi-Router-battery"; 
					return $this;
					break;
				case 'B221':
					$this->secondArr["typeName"] = "Keyboard Touchpad Battery";
					$this->secondArr["typeUrl"] = "Keyboard-Touchpad-Battery"; 
					return $this;
					break;
				case 'B222':
					$this->secondArr["typeName"] = "Studio Flash battery";
					$this->secondArr["typeUrl"] = "Studio-Flash-battery"; 
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/C3/i',$type)) {
			switch ($type) {
				case 'C301':
					$this->secondArr["typeName"] = "Biomedical battery";
					$this->secondArr["typeUrl"] = "Biomedical-battery";
					return $this;
					break;
				case 'C302':
					$this->secondArr["typeName"] = "Laboratory battery";
					$this->secondArr["typeUrl"] = "Laboratory-battery";
					return $this;
					break;
				case 'C303':
					$this->secondArr["typeName"] = "Medical equipment battery";
					$this->secondArr["typeUrl"] = "medical-furniture-battery";
					return $this;
					break;
				case 'C304':
					$this->secondArr["typeName"] = "Vacuum cleaner with slime";
					$this->secondArr["typeUrl"] = "Vacuum-cleaner-with-slime";
					return $this;
					break;
				case 'C305':
					$this->secondArr["typeName"] = "Battery incubator and incubator";
					$this->secondArr["typeUrl"] = "Battery-incubator-incubator";
					return $this;
					break;
				case 'C306':
					$this->secondArr["typeName"] = "Patient Monitor";
					$this->secondArr["typeUrl"] = "Patient-Monitor";
					return $this;
					break;
				case 'C307':
					$this->secondArr["typeName"] = "Defibrillator battery";
					$this->secondArr["typeUrl"] = "Defibrillator-battery";
					return $this;
					break;
				case 'C308':
					$this->secondArr["typeName"] = "ECG battery";
					$this->secondArr["typeUrl"] = "ECG-battery";
					return $this;
					break;
				case 'C309':
					$this->secondArr["typeName"] = "Battery operating room equipment";
					$this->secondArr["typeUrl"] = "Battery-operating-room-equipment";
					return $this;
					break;
				case 'C310':
					$this->secondArr["typeName"] = "Vital signs monitor";
					$this->secondArr["typeUrl"] = "Vital-signs-monitor";
					return $this;
					break;
				case 'C311':
					$this->secondArr["typeName"] = "Oximeter battery";
					$this->secondArr["typeUrl"] = "Oximeter-battery";
					return $this;
					break;
				case 'C312':
					$this->secondArr["typeName"] = "Battery pump, push syringe";
					$this->secondArr["typeUrl"] = "Battery-pump-push-syringe";
					return $this;
					break;
				case 'C313':
					$this->secondArr["typeName"] = "Battery sphygmomanometer, thermometer";
					$this->secondArr["typeUrl"] = "Battery-sphygmomanometer-thermometer";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/D4/i',$type)) {
			switch ($type) {
				case 'D401':
					$this->secondArr["typeName"] = "Power tool battery";
					$this->secondArr["typeUrl"] = "Power-tool-battery";
					return $this;
					break;
				case 'D402':
					$this->secondArr["typeName"] = "Generator battery";
					$this->secondArr["typeUrl"] = "Generator-battery";
					return $this;
					break;
				case 'D403':
					$this->secondArr["typeName"] = "Measuring device battery";
					$this->secondArr["typeUrl"] = "Measuring-device-battery";
					return $this;
					break;
				case 'D404':
					$this->secondArr["typeName"] = "Battery electric pruner";
					$this->secondArr["typeUrl"] = "Battery-electric-pruner";
					return $this;
					break;
				case 'D405':
					$this->secondArr["typeName"] = "Card payment terminal battery";
					$this->secondArr["typeUrl"] = "Card-payment-terminal-battery";
					return $this;
					break;
				case 'D406':
					$this->secondArr["typeName"] = "Barcode reader battery";
					$this->secondArr["typeUrl"] = "Barcode-reader-battery";
					return $this;
					break;
				case 'D407':
					$this->secondArr["typeName"] = "Mobile Computer";
					$this->secondArr["typeUrl"] = "Mobile-Computer";
					return $this;
					break;
				case 'D408':
					$this->secondArr["typeName"] = "RAID Cache Battery";
					$this->secondArr["typeUrl"] = "RAID-Cache-Battery";
					return $this;
					break;
				case 'D409':
					$this->secondArr["typeName"] = "Modem Backup Battery";
					$this->secondArr["typeUrl"] = "Modem-Backup-Battery";
					return $this;
					break;
				default:
					break;
			}			
		} else if (preg_match('/E5/i',$type)) {
			switch ($type) {
				case 'E501':
					$this->secondArr["typeName"] = "Lead acid battery";
					$this->secondArr["typeUrl"] = "Lead-acid-battery";
					return $this;
					break;
				case 'E502':
					$this->secondArr["typeName"] = "UPS battery";
					$this->secondArr["typeUrl"] = "UPS-battery";
					return $this;
					break;
				case 'E503':
					$this->secondArr["typeName"] = "Lithium-ion battery";
					$this->secondArr["typeUrl"] = "Lithium-ion-battery";
					return $this;
					break;
				case 'E504':
					$this->secondArr["typeName"] = "Lithium Iron Phosphate Battery (LiFePO4)";
					$this->secondArr["typeUrl"] = "Lithium-Iron-Phosphate-Battery";
					return $this;
					break;
				case 'E505':
					$this->secondArr["typeName"] = "Inverter battery (ASI)";
					$this->secondArr["typeUrl"] = "Inverter-battery";
					return $this;
					break;
				case 'E506':
					$this->secondArr["typeName"] = "Emergency lighting battery";
					$this->secondArr["typeUrl"] = "Battery-emergency-light";
					return $this;
					break;
				case 'E507':
					$this->secondArr["typeName"] = "Cyclon Battery";
					$this->secondArr["typeUrl"] = "Cyclon-Battery";
					return $this;
					break;
				case 'E508':
					$this->secondArr["typeName"] = "Automatic door battery";
					$this->secondArr["typeUrl"] = "Automatic-door-battery";
					return $this;
					break;
				case 'E509':
					$this->secondArr["typeName"] = "Crane remote control battery";
					$this->secondArr["typeUrl"] = "Crane-remote-control-battery";
					return $this;
					break;
				case 'E510':
					$this->secondArr["typeName"] = "PLC battery";
					$this->secondArr["typeUrl"] = "PLC-battery";
					return $this;
					break;
				case 'E511':
					$this->secondArr["typeName"] = "Scrubber dryer battery";
					$this->secondArr["typeUrl"] = "Scrubber-dryer-battery";
					return $this;
					break;
				case 'E512':
					$this->secondArr["typeName"] = "Handling equipment battery";
					$this->secondArr["typeUrl"] = "Handling-equipment-battery";
					return $this;
					break;
				case 'E513':
					$this->secondArr["typeName"] = "Lead acid battery accessories";
					$this->secondArr["typeUrl"] = "Lead-acid-battery";
					return $this;
					break;
				case 'E514':
					$this->secondArr["typeName"] = "Lead acid battery tester";
					$this->secondArr["typeUrl"] = "Lead-acid battery";
					return $this;
					break;
				case 'E515':
					$this->secondArr["typeName"] = "Lead crystal battery";
					$this->secondArr["typeUrl"] = "Lead-crystal-battery";
					return $this;
					break;
				default:
					break;
			}			
		} else if (preg_match('/F6/i',$type)) {
			switch ($type) {
				case 'F601':
					$this->secondArr["typeName"] = "Vacuum Cleaner Battery";
					$this->secondArr["typeUrl"] = "Vacuum-Cleaner-Battery";
					return $this;
					break;
				case 'F602':
					$this->secondArr["typeName"] = "Central alarm battery for Daitem, Logisty, Visonic, Somfy ...";
					$this->secondArr["typeUrl"] = "Central-alarm-battery";
					return $this;
					break;
				case 'F603':
					$this->secondArr["typeName"] = "Shaver battery";
					$this->secondArr["typeUrl"] = "Shaver-battery";
					return $this;
					break;
				case 'F604':
					$this->secondArr["typeName"] = "E-cigarette battery";
					$this->secondArr["typeUrl"] = "E-cigarette-battery";
					return $this;
					break;
				case 'F605':
					$this->secondArr["typeName"] = "Lawn mower battery";
					$this->secondArr["typeUrl"] = "Lawn-mower-battery";
					return $this;
					break;
				case 'F606':
					$this->secondArr["typeName"] = "Tractor and Rider Battery";
					$this->secondArr["typeUrl"] = "Tractor-Rider-Battery";
					return $this;
					break;
				case 'F607':
					$this->secondArr["typeName"] = "Garage door opener battery";
					$this->secondArr["typeUrl"] = "garage-battery";
					return $this;
					break;
				case 'F608':
					$this->secondArr["typeName"] = "Toothbrush Battery";
					$this->secondArr["typeUrl"] = "Toothbrush-Battery";
					return $this;
					break;
				case 'F609':
					$this->secondArr["typeName"] = "Smart watch battery";
					$this->secondArr["typeUrl"] = "Smart-watch-battery";
					return $this;
					break;
				default:
					break;
			}			
		} else if (preg_match('/G7/i',$type)) {
			switch ($type) {
				case 'G701':
					$this->secondArr["typeName"] = "Golf battery";
					$this->secondArr["typeUrl"] = "Golf-battery";
					return $this;
					break;
				case 'G702':
					$this->secondArr["typeName"] = "Balance car battery";
					$this->secondArr["typeUrl"] = "Balance-battery";
					return $this;
					break;
				case 'G703':
					$this->secondArr["typeName"] = "Mobile Warming battery";
					$this->secondArr["typeUrl"] = "Mobile-Warming-battery";
					return $this;
					break;
				case 'G704':
					$this->secondArr["typeName"] = "Toy battery";
					$this->secondArr["typeUrl"] = "Toy-battery";
					return $this;
					break;
				case 'G705':
					$this->secondArr["typeName"] = "Model car/plane battery";
					$this->secondArr["typeUrl"] = "Model-battery";
					return $this;
					break;
				case 'G706':
					$this->secondArr["typeName"] = "Fishing battery";
					$this->secondArr["typeUrl"] = "Fishing-battery";
					return $this;
					break;
				case 'G707':
					$this->secondArr["typeName"] = "Paintball Battery and Airsoft";
					$this->secondArr["typeUrl"] = "Paintball-Battery";
					return $this;
					break;
				case 'G708':
					$this->secondArr["typeName"] = "Dog collar battery";
					$this->secondArr["typeUrl"] = "Dog-collar-battery";
					return $this;
					break;
				case 'G709':
					$this->secondArr["typeName"] = "Drone drone";
					$this->secondArr["typeUrl"] = "Drone-drone";
					return $this;
					break;
				default:
					break;
			}			
		} else if (preg_match('/H8/i',$type)) {
			switch ($type) {
				case 'H801':
					$this->secondArr["typeName"] = "Accessories";
					$this->secondArr["typeUrl"] = "Accessories";
					return $this;
					break;
				case 'H802':
					$this->secondArr["typeName"] = "Supercapacitors";
					$this->secondArr["typeUrl"] = "Supercapacitors";
					return $this;
					break;
				case 'H803':
					$this->secondArr["typeName"] = "Smart Array Controllers";
					$this->secondArr["typeUrl"] = "Smart-Array-Controllers";
					return $this;
					break;
				default:
					break;
			}
		} else if (preg_match('/K9/i',$type)) {
			switch ($type) {
				case 'K901':
					$this->secondArr["typeName"] = "Car battery";//二级分类名
					$this->secondArr["typeUrl"] = "Car-battery";//二级分类区分词
					return $this;
					break;
				case 'K902':
					$this->secondArr["typeName"] = "Mobility Scooters battery";//二级分类名
					$this->secondArr["typeUrl"] = "Scooters-battery";//二级分类区分词
					return $this;
					break;
				case 'K903':
					$this->secondArr["typeName"] = "Motorhome battery";//二级分类名
					$this->secondArr["typeUrl"] = "Motorhome-battery";//二级分类区分词
					return $this;
					break;
				case 'K904':
					$this->secondArr["typeName"] = "Heavyweight battery";//二级分类名
					$this->secondArr["typeUrl"] = "Heavyweight-battery";//二级分类区分词
					return $this;
					break;
				case 'K905':
					$this->secondArr["typeName"] = "Quad bike battery";//二级分类名
					$this->secondArr["typeUrl"] = "Quad-battery";//二级分类区分词
					return $this;
					break;
				case 'K906':
					$this->secondArr["typeName"] = "Tractor starter battery & construction machine";//二级分类名
					$this->secondArr["typeUrl"] = "Tractor-starter-battery";//二级分类区分词
					return $this;
					break;
				case 'K907':
					$this->secondArr["typeName"] = "Electric bike battery";//二级分类名
					$this->secondArr["typeUrl"] = "Electric-bike-battery";//二级分类区分词
					return $this;
					break;
				case 'K908':
					$this->secondArr["typeName"] = "Marine battery";//二级分类名
					$this->secondArr["typeUrl"] = "Marine-battery";//二级分类区分词
					return $this;
					break;
				case 'K909':
					$this->secondArr["typeName"] = "Racing car battery";//二级分类名
					$this->secondArr["typeUrl"] = "Racing-car-battery";//二级分类区分词 (图片不符)
					return $this;
					break;
				case 'K910':
					$this->secondArr["typeName"] = "Wheelchair battery";//二级分类名
					$this->secondArr["typeUrl"] = "Wheelchair-battery";//二级分类区分词
					return $this;
					break;
				case 'K911':
					$this->secondArr["typeName"] = "Jet ski battery";//二级分类名
					$this->secondArr["typeUrl"] = "Jet-ski-battery";//二级分类区分词
					return $this;
					break;
				case 'K912':
					$this->secondArr["typeName"] = "Snowmobile battery";//二级分类名
					$this->secondArr["typeUrl"] = "Snowmobile-battery";//二级分类区分词
					return $this;
					break;
				case 'K913':
					$this->secondArr["typeName"] = "Starter battery, ULM, glider, paramotor";//二级分类名
					$this->secondArr["typeUrl"] = "Starter-battery";//二级分类区分词 (图片不符)
					return $this;
					break;
				case 'K914':
					$this->secondArr["typeName"] = "Airplane service battery, ULM, glider, paramotor";//二级分类名
					$this->secondArr["typeUrl"] = "Airplane-service-battery";//二级分类区分词
					return $this;
					break;
				case 'K915':
					$this->secondArr["typeName"] = "Traction battery";//二级分类名
					$this->secondArr["typeUrl"] = "Traction-battery";//二级分类区分词
					return $this;
					break;
				case 'K916':
					$this->secondArr["typeName"] = "Solar battery";//二级分类名
					$this->secondArr["typeUrl"] = "Solar-battery";//二级分类区分词
					return $this;
					break;
				default:
					break;
			}
		}
	}
	// 赋值meta标签keyword和description以及title
	public function get_meta_seo($page,$arr=array())
	{
		switch ($page) {
			case 'index':
				$this->title="Our Best Selling replacement Batteries - PLC batteries, Laptop batteries,cellphone batteries - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="Batteries, Discount Batteries, wholesale Batteries, retail Batteries, replacement batteries, PLC batteries, Laptop batteries, cellphone batteries";
				$this->metaDescription="".$_SERVER['SERVER_NAME']." supplies discounted batteries in bulk, wholesale and retail quantities to industry; and a full range to individual customers. We stock a range of batteries which include PLC batteries, Laptop batteries, cellphone batteries and other replacement batteries.";
				return $this;
				break;
			case 'battery':
				$this->title="View our incredible catalog of batteries of various types - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="batteries for Laptop，batteries for cellphone，Camera batteries，NiMH battery, NiCd battery, medical batteries";
				$this->metaDescription="Find new batteries on Machiibattery.com. We offer batteries for Laptop, cellphone, Camera, Security and alarm Systems, CCTV's, UPS Systems, Emergency Lighting Systems, OEM electrical equipment, Electronic applications, Medical or any area where there is a need for a reliable long-life power source.";
				return $this;
				break;
			case 'category':  //A01~A14属于电子产品类,描述内容不同于电池类和适配器类
				if ($arr["be_type"]=="A01") {
					$this->title="";
					$this->metaKeyword="baby monitor,baby toy";
					$this->metaDescription="Choose the best baby monitors, baby toys, and other baby gear for your needs. Keeping your bundle of joy comfortable and happy is easy with a wide selection of baby gear from us.";
					return $this;
				} else if ($arr["be_type"]=="A02") {
					$this->title="";
					$this->metaKeyword="auto parts,auto accessories,car parts";
					$this->metaDescription="We offer a wide selection of auto parts & auto accessories to customers. You'll always find the best car parts, great customer service and the right prices at our online store.";
					return $this;
				} else if ($arr["be_type"]=="A03") {
					$this->title="";
					$this->metaKeyword="Home Decor,clock";
					$this->metaDescription="Home Decor - Shop For Furniture, Storage & Organizational Tools, Bedding, Kitchen & Dining.. We carry a wide selection of Home Living furniture to give your house a fresh, sophisticated look. Using this bedside alarm clock! Waking up made easy. Decorate your home or office with one of our wall clock";
					return $this;
				} else if ($arr["be_type"]=="A04") {
					$this->title="";
					$this->metaKeyword="Thermometers,Timers,Scales,Mandolines & Slicers,Kitchen Utensils,Food Processors";
					$this->metaDescription="These kitchen gadgets can make cooking simple. Shop our selection of Thermometers, Timers &amp; Scales in the Kitchen Department .";
					return $this;
				} else if ($arr["be_type"]=="A05") {
					$this->title="";
					$this->metaKeyword="cell phones accessories,smartphone accessories,Windows phone accessories";
					$this->metaDescription="Buy cell phones accessories online for the latest iPhones, Android smartphones,Windows phones. Find the best deals on Apple,LG,Sony,Lenovo and Samsung devices.";
					return $this;
				} else if ($arr["be_type"]=="A06") {
					$this->title="";
					$this->metaKeyword="Laptop Accessories,Tablets PC Accessories";
					$this->metaDescription="Online Shopping Laptops&Tablet PC , Browse Through Our Directory of Laptop&Tablet PC for Samsung,Acer,Asus,Dell,Sony";
					return $this;
				} else if ($arr["be_type"]=="A07") {
					$this->title="";
					$this->metaKeyword="Home Audio,Video Department,HOME THEATER,wireless speakers";
					$this->metaDescription="Home Electronics in the Home Audio / Video Department. Smarthome Home Automation at the guaranteed lowest prices.";
					return $this;
				} else if ($arr["be_type"]=="A08") {
					$this->title="";
					$this->metaKeyword="Beauty tools,makeup brushes";
					$this->metaDescription="Beauty tools, kits, and accessories help to make your more beautiful. Whether you're in need of pressed powders, a deep cleaning skin care device or specifically shaped makeup brushes, We offer smart solutions at reasonable prices.";
					return $this;
				} else if ($arr["be_type"]=="A09") {
					$this->title="";
					$this->metaKeyword="action cameras,camcorders,camera & camcorder accessories,camera lenses";
					$this->metaDescription="Camera &Camcorders accessories for Samsung, Sony, Panasonic & Canon with fast shipping and top-rated customer service. Waterproof HD camcorder record life's greatest moments in high-definition.";
					return $this;
				} else if ($arr["be_type"]=="A11") {
					$this->title="";
					$this->metaKeyword="Grow light,led light,Lighting";
					$this->metaDescription="Grow lights and lighting systems at great prices, available to order securely online or in store. The best growing lights for your hydroponics setup.";
					return $this;
				} else if ($arr["be_type"]=="A12") {
					$this->title="";
					$this->metaKeyword="Electrical Equipment,Wire,Cable";
					$this->metaDescription="High-quality professional electrical supplies and Accessories. Get the electrical equipment, parts, and components to get the job done right.";
					return $this;
				} else if ($arr["be_type"]=="A13") {
					$this->title="";
					$this->metaKeyword="IP Cameras,CCTV Systems";
					$this->metaDescription="Online shopping for Tools , Home Improvement from a great selection of Personal Protective Equipment, Emergency , Survival Kits, First Aid Kits, Safes ,more at everyday low prices.";
					return $this;
				} else if ($arr["be_type"]=="A14") {
					$this->title="";
					$this->metaKeyword="";
					$this->metaDescription="";
					return $this;
				} else if ($arr["be_type"]=="B2") {
					$this->title="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName']." All Brands, Cheap ".$arr['typeName']." [Page ".$arr["page"]." All products]  - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName'].", Cheap ".$arr['typeName'].", ".$arr['typeName'].", New ".$arr['typeName']." Brand, ".$arr['typeName']." Pack";
					$this->metaDescription="All our ".$arr["brand"]."  ".$arr["series"]." Replacement ".$arr['typeName']." are guaranteed to meet or exceed OEM (original) specifications backed by 30 days money back guarantee. [Page ".$arr["page"]." All products]";
					return $this;
				} else if ($arr["be_type"]=="C3") {
					$this->title="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName']." All Brands, Cheap ".$arr['typeName']." [Page ".$arr["page"]." All products]  - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName'].", Cheap ".$arr['typeName'].", ".$arr['typeName'].", New ".$arr['typeName']." Brand, ".$arr['typeName']." Pack";
					$this->metaDescription="All our ".$arr["brand"]."  ".$arr["series"]." Replacement ".$arr['typeName']." are guaranteed to meet or exceed OEM (original) specifications backed by 30 days money back guarantee. [Page ".$arr["page"]." All products]";
					return $this;
				} else if ($arr["be_type"]=="D4") {
					$this->title="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName']." All Brands, Cheap ".$arr['typeName']." [Page ".$arr["page"]." All products]  - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName'].", Cheap ".$arr['typeName'].", ".$arr['typeName'].", New ".$arr['typeName']." Brand, ".$arr['typeName']." Pack";
					$this->metaDescription="All our ".$arr["brand"]."  ".$arr["series"]." Replacement ".$arr['typeName']." are guaranteed to meet or exceed OEM (original) specifications backed by 30 days money back guarantee. [Page ".$arr["page"]." All products]";
					return $this;
				} else if ($arr["be_type"]=="E5") {
					$this->title="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName']." All Brands, Cheap ".$arr['typeName']." [Page ".$arr["page"]." All products]  - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName'].", Cheap ".$arr['typeName'].", ".$arr['typeName'].", New ".$arr['typeName']." Brand, ".$arr['typeName']." Pack";
					$this->metaDescription="All our ".$arr["brand"]."  ".$arr["series"]." Replacement ".$arr['typeName']." are guaranteed to meet or exceed OEM (original) specifications backed by 30 days money back guarantee. [Page ".$arr["page"]." All products]";
					return $this;
				} else if ($arr["be_type"]=="F6") {
					$this->title="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName']." All Brands, Cheap ".$arr['typeName']." [Page ".$arr["page"]." All products]  - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName'].", Cheap ".$arr['typeName'].", ".$arr['typeName'].", New ".$arr['typeName']." Brand, ".$arr['typeName']." Pack";
					$this->metaDescription="All our ".$arr["brand"]."  ".$arr["series"]." Replacement ".$arr['typeName']." are guaranteed to meet or exceed OEM (original) specifications backed by 30 days money back guarantee. [Page ".$arr["page"]." All products]";
					return $this;
				} else if($arr["be_type"]=="G7") {
					$this->title="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName']." All Brands, Cheap ".$arr['typeName']." [Page ".$arr["page"]." All products]  - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName'].", Cheap ".$arr['typeName'].", ".$arr['typeName'].", New ".$arr['typeName']." Brand, ".$arr['typeName']." Pack";
					$this->metaDescription="All our ".$arr["brand"]."  ".$arr["series"]." Replacement ".$arr['typeName']." are guaranteed to meet or exceed OEM (original) specifications backed by 30 days money back guarantee. [Page ".$arr["page"]." All products]";
					return $this;
				} else if($arr["be_type"]=="H8") {
					$this->title="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName']." All Brands, Cheap ".$arr['typeName']." [Page ".$arr["page"]." All products]  - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName'].", Cheap ".$arr['typeName'].", ".$arr['typeName'].", New ".$arr['typeName']." Brand, ".$arr['typeName']." Pack";
					$this->metaDescription="All our ".$arr["brand"]."  ".$arr["series"]." Replacement ".$arr['typeName']." are guaranteed to meet or exceed OEM (original) specifications backed by 30 days money back guarantee. [Page ".$arr["page"]." All products]";
					return $this;
				} else if($arr["be_type"]=="K9") {
					$this->title="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName']." All Brands, Cheap ".$arr['typeName']." [Page ".$arr["page"]." All products]  - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr['typeName'].", Cheap ".$arr['typeName'].", ".$arr['typeName'].", New ".$arr['typeName']." Brand, ".$arr['typeName']." Pack";
					$this->metaDescription="All our ".$arr["brand"]."  ".$arr["series"]." Replacement ".$arr['typeName']." are guaranteed to meet or exceed OEM (original) specifications backed by 30 days money back guarantee. [Page ".$arr["page"]." All products]";
					return $this;
				};
				break;
			case 'brand':
				if ($arr["be_type"]=="A") {//不考虑电子产品增加品牌页面 
					$this->title="";
					$this->metaKeyword="";
					$this->metaDescription="";
					return $this;
				} else if ($arr["be_type"]=="B2") {
					$this->title="".$arr["typeName"]." Various brands, ".$arr["typeName"]." series or model - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["typeName"].", such as ACER, ASUS, DELL, HP, SAMSUNG, SONY, TOSHIBA, FUJITSU, MSI, UNIWILL, ".$arr["typeName"].", New ".$arr["typeName"]." Brand";
					$this->metaDescription="Welcome to the ".$arr["typeName"]." Accessories store. Do you want to replace your ".$arr["typeName"]." or charger? Why not do it on our site! Our catalog includes all brands and all computer models. Quality products, new and guaranteed 12 months to feed your ".$arr["typeName"]." without risk";
					return $this;
				} else if ($arr["be_type"]=="C3") {
					$this->title="".$arr["typeName"]." Various brands, ".$arr["typeName"]." series or model - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["typeName"].", such as ACER, ASUS, DELL, HP, SAMSUNG, SONY, TOSHIBA, FUJITSU, MSI, UNIWILL, ".$arr["typeName"].", New ".$arr["typeName"]." Brand";
					$this->metaDescription="Welcome to the ".$arr["typeName"]." Accessories store. Do you want to replace your ".$arr["typeName"]." or charger? Why not do it on our site! Our catalog includes all brands and all computer models. Quality products, new and guaranteed 12 months to feed your ".$arr["typeName"]." without risk";
					return $this;
				} else if ($arr["be_type"]=="D4") {
					$this->title="".$arr["typeName"]." Various brands, ".$arr["typeName"]." series or model - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["typeName"].", such as ACER, ASUS, DELL, HP, SAMSUNG, SONY, TOSHIBA, FUJITSU, MSI, UNIWILL, ".$arr["typeName"].", New ".$arr["typeName"]." Brand";
					$this->metaDescription="Welcome to the ".$arr["typeName"]." Accessories store. Do you want to replace your ".$arr["typeName"]." or charger? Why not do it on our site! Our catalog includes all brands and all computer models. Quality products, new and guaranteed 12 months to feed your ".$arr["typeName"]." without risk";
					return $this;
				} else if ($arr["be_type"]=="E5") {
					$this->title="".$arr["typeName"]." Various brands, ".$arr["typeName"]." series or model - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["typeName"].", such as ACER, ASUS, DELL, HP, SAMSUNG, SONY, TOSHIBA, FUJITSU, MSI, UNIWILL, ".$arr["typeName"].", New ".$arr["typeName"]." Brand";
					$this->metaDescription="Welcome to the ".$arr["typeName"]." Accessories store. Do you want to replace your ".$arr["typeName"]." or charger? Why not do it on our site! Our catalog includes all brands and all computer models. Quality products, new and guaranteed 12 months to feed your ".$arr["typeName"]." without risk";
					return $this;
				} else if ($arr["be_type"]=="F6") {
					$this->title="".$arr["typeName"]." Various brands, ".$arr["typeName"]." series or model - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["typeName"].", such as ACER, ASUS, DELL, HP, SAMSUNG, SONY, TOSHIBA, FUJITSU, MSI, UNIWILL, ".$arr["typeName"].", New ".$arr["typeName"]." Brand";
					$this->metaDescription="Welcome to the ".$arr["typeName"]." Accessories store. Do you want to replace your ".$arr["typeName"]." or charger? Why not do it on our site! Our catalog includes all brands and all computer models. Quality products, new and guaranteed 12 months to feed your ".$arr["typeName"]." without risk";
					return $this;
				} else if($arr["be_type"]=="G7") {
					$this->title="".$arr["typeName"]." Various brands, ".$arr["typeName"]." series or model - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["typeName"].", such as ACER, ASUS, DELL, HP, SAMSUNG, SONY, TOSHIBA, FUJITSU, MSI, UNIWILL, ".$arr["typeName"].", New ".$arr["typeName"]." Brand";
					$this->metaDescription="Welcome to the ".$arr["typeName"]." Accessories store. Do you want to replace your ".$arr["typeName"]." or charger? Why not do it on our site! Our catalog includes all brands and all computer models. Quality products, new and guaranteed 12 months to feed your ".$arr["typeName"]." without risk";
					return $this;
				} else if($arr["be_type"]=="H8") {
					$this->title="".$arr["typeName"]." Various brands, ".$arr["typeName"]." series or model - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["typeName"].", such as ACER, ASUS, DELL, HP, SAMSUNG, SONY, TOSHIBA, FUJITSU, MSI, UNIWILL, ".$arr["typeName"].", New ".$arr["typeName"]." Brand";
					$this->metaDescription="Welcome to the ".$arr["typeName"]." Accessories store. Do you want to replace your ".$arr["typeName"]." or charger? Why not do it on our site! Our catalog includes all brands and all computer models. Quality products, new and guaranteed 12 months to feed your ".$arr["typeName"]." without risk";
					return $this;
				} else if($arr["be_type"]=="K9") {
					$this->title="".$arr["typeName"]." Various brands, ".$arr["typeName"]." series or model - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr["typeName"].", such as ACER, ASUS, DELL, HP, SAMSUNG, SONY, TOSHIBA, FUJITSU, MSI, UNIWILL, ".$arr["typeName"].", New ".$arr["typeName"]." Brand";
					$this->metaDescription="Welcome to the ".$arr["typeName"]." Accessories store. Do you want to replace your ".$arr["typeName"]." or charger? Why not do it on our site! Our catalog includes all brands and all computer models. Quality products, new and guaranteed 12 months to feed your ".$arr["typeName"]." without risk";
					return $this;
				};
				break;
			case 'product':
				if ($arr["be_type"]=="A01") {
					$this->title="";
					$this->metaKeyword="baby monitor,baby toy";
					$this->metaDescription="Choose the best baby monitors, baby toys, and other baby gear for your needs. Keeping your bundle of joy comfortable and happy is easy with a wide selection of baby gear from us.";
					return $this;
				} else if ($arr["be_type"]=="A02") {
					$this->title="";
					$this->metaKeyword="auto parts,auto accessories,car parts";
					$this->metaDescription="We offer a wide selection of auto parts & auto accessories to customers. You'll always find the best car parts, great customer service and the right prices at our online store.";
					return $this;
				} else if ($arr["be_type"]=="A03") {
					$this->title="";
					$this->metaKeyword="Home Decor,clock";
					$this->metaDescription="Home Decor - Shop For Furniture, Storage & Organizational Tools, Bedding, Kitchen & Dining.. We carry a wide selection of Home Living furniture to give your house a fresh, sophisticated look. Using this bedside alarm clock! Waking up made easy. Decorate your home or office with one of our wall clock";
					return $this;
				} else if ($arr["be_type"]=="A04") {
					$this->title="";
					$this->metaKeyword="Thermometers,Timers,Scales,Mandolines & Slicers,Kitchen Utensils,Food Processors";
					$this->metaDescription="These kitchen gadgets can make cooking simple. Shop our selection of Thermometers, Timers &amp; Scales in the Kitchen Department .";
					return $this;
				} else if ($arr["be_type"]=="A05") {
					$this->title="";
					$this->metaKeyword="cell phones accessories,smartphone accessories,Windows phone accessories";
					$this->metaDescription="Buy cell phones accessories online for the latest iPhones, Android smartphones,Windows phones. Find the best deals on Apple,LG,Sony,Lenovo and Samsung devices.";
					return $this;
				} else if ($arr["be_type"]=="A06") {
					$this->title="";
					$this->metaKeyword="Laptop Accessories,Tablets PC Accessories";
					$this->metaDescription="Online Shopping Laptops&Tablet PC , Browse Through Our Directory of Laptop&Tablet PC for Samsung,Acer,Asus,Dell,Sony";
					return $this;
				} else if ($arr["be_type"]=="A07") {
					$this->title="";
					$this->metaKeyword="Home Audio,Video Department,HOME THEATER,wireless speakers";
					$this->metaDescription="Home Electronics in the Home Audio / Video Department. Smarthome Home Automation at the guaranteed lowest prices.";
					return $this;
				} else if ($arr["be_type"]=="A08") {
					$this->title="";
					$this->metaKeyword="Beauty tools,makeup brushes";
					$this->metaDescription="Beauty tools, kits, and accessories help to make your more beautiful. Whether you're in need of pressed powders, a deep cleaning skin care device or specifically shaped makeup brushes, We offer smart solutions at reasonable prices.";
					return $this;
				} else if ($arr["be_type"]=="A09") {
					$this->title="";
					$this->metaKeyword="action cameras,camcorders,camera & camcorder accessories,camera lenses";
					$this->metaDescription="Camera &Camcorders accessories for Samsung, Sony, Panasonic & Canon with fast shipping and top-rated customer service. Waterproof HD camcorder record life's greatest moments in high-definition.";
					return $this;
				} else if ($arr["be_type"]=="A11") {
					$this->title="";
					$this->metaKeyword="Grow light,led light,Lighting";
					$this->metaDescription="Grow lights and lighting systems at great prices, available to order securely online or in store. The best growing lights for your hydroponics setup.";
					return $this;
				} else if ($arr["be_type"]=="A12") {
					$this->title="";
					$this->metaKeyword="Electrical Equipment,Wire,Cable";
					$this->metaDescription="High-quality professional electrical supplies and Accessories. Get the electrical equipment, parts, and components to get the job done right.";
					return $this;
				} else if ($arr["be_type"]=="A13") {
					$this->title="";
					$this->metaKeyword="IP Cameras,CCTV Systems";
					$this->metaDescription="Online shopping for Tools , Home Improvement from a great selection of Personal Protective Equipment, Emergency , Survival Kits, First Aid Kits, Safes ,more at everyday low prices.";
					return $this;
				} else if ($arr["be_type"]=="A14") {
					$this->title="";
					$this->metaKeyword="";
					$this->metaDescription="";
					return $this;
				} else if ($arr["be_type"]=="B2") {
					$this->title="".$arr['keyword'].",".$arr["typeName"].",".$arr[0]->cs." - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr['keyword'].",".$arr[0]->cs.",".$arr["typeName"]."";
					$this->metaDescription="High quality ".$arr[0]->cs." ".$arr['keyword']." ".$arr["typeName"]." for ".$arr[0]->jianjie2." Replacement Batteries ".$arr["typeName"]." wholesale or retail in ".$_SERVER['SERVER_NAME'].", ".$arr['keyword']." ".$arr["typeName"]." is guaranteed to meet or exceed ".$arr[0]->cs." original specifications, buy ".$arr['keyword']." ".$arr["typeName"]." get 30% off.";
					return $this;
				} else if ($arr["be_type"]=="C3") {
					$this->title="".$arr['keyword'].",".$arr["typeName"].",".$arr[0]->cs." - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr['keyword'].",".$arr[0]->cs.",".$arr["typeName"]."";
					$this->metaDescription="High quality ".$arr[0]->cs." ".$arr['keyword']." ".$arr["typeName"]." for ".$arr[0]->jianjie2." Replacement Batteries ".$arr["typeName"]." wholesale or retail in ".$_SERVER['SERVER_NAME'].", ".$arr['keyword']." ".$arr["typeName"]." is guaranteed to meet or exceed ".$arr[0]->cs." original specifications, buy ".$arr['keyword']." ".$arr["typeName"]." get 30% off.";
					return $this;
				} else if ($arr["be_type"]=="D4") {
					$this->title="".$arr['keyword'].",".$arr["typeName"].",".$arr[0]->cs." - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr['keyword'].",".$arr[0]->cs.",".$arr["typeName"]."";
					$this->metaDescription="High quality ".$arr[0]->cs." ".$arr['keyword']." ".$arr["typeName"]." for ".$arr[0]->jianjie2." Replacement Batteries ".$arr["typeName"]." wholesale or retail in ".$_SERVER['SERVER_NAME'].", ".$arr['keyword']." ".$arr["typeName"]." is guaranteed to meet or exceed ".$arr[0]->cs." original specifications, buy ".$arr['keyword']." ".$arr["typeName"]." get 30% off.";
					return $this;
				} else if ($arr["be_type"]=="E5") {
					$this->title="".$arr['keyword'].",".$arr["typeName"].",".$arr[0]->cs." - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr['keyword'].",".$arr[0]->cs.",".$arr["typeName"]."";
					$this->metaDescription="High quality ".$arr[0]->cs." ".$arr['keyword']." ".$arr["typeName"]." for ".$arr[0]->jianjie2." Replacement Batteries ".$arr["typeName"]." wholesale or retail in ".$_SERVER['SERVER_NAME'].", ".$arr['keyword']." ".$arr["typeName"]." is guaranteed to meet or exceed ".$arr[0]->cs." original specifications, buy ".$arr['keyword']." ".$arr["typeName"]." get 30% off.";
					return $this;
				} else if ($arr["be_type"]=="F6") {
					$this->title="".$arr['keyword'].",".$arr["typeName"].",".$arr[0]->cs." - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr['keyword'].",".$arr[0]->cs.",".$arr["typeName"]."";
					$this->metaDescription="High quality ".$arr[0]->cs." ".$arr['keyword']." ".$arr["typeName"]." for ".$arr[0]->jianjie2." Replacement Batteries ".$arr["typeName"]." wholesale or retail in ".$_SERVER['SERVER_NAME'].", ".$arr['keyword']." ".$arr["typeName"]." is guaranteed to meet or exceed ".$arr[0]->cs." original specifications, buy ".$arr['keyword']." ".$arr["typeName"]." get 30% off.";
					return $this;
				} else if($arr["be_type"]=="G7") {
					$this->title="".$arr['keyword'].",".$arr["typeName"].",".$arr[0]->cs." - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr['keyword'].",".$arr[0]->cs.",".$arr["typeName"]."";
					$this->metaDescription="High quality ".$arr[0]->cs." ".$arr['keyword']." ".$arr["typeName"]." for ".$arr[0]->jianjie2." Replacement Batteries ".$arr["typeName"]." wholesale or retail in ".$_SERVER['SERVER_NAME'].", ".$arr['keyword']." ".$arr["typeName"]." is guaranteed to meet or exceed ".$arr[0]->cs." original specifications, buy ".$arr['keyword']." ".$arr["typeName"]." get 30% off.";
					return $this;
				} else if($arr["be_type"]=="H8") {
					$this->title="".$arr['keyword'].",".$arr["typeName"].",".$arr[0]->cs." - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr['keyword'].",".$arr[0]->cs.",".$arr["typeName"]."";
					$this->metaDescription="High quality ".$arr[0]->cs." ".$arr['keyword']." ".$arr["typeName"]." for ".$arr[0]->jianjie2." Replacement Batteries ".$arr["typeName"]." wholesale or retail in ".$_SERVER['SERVER_NAME'].", ".$arr['keyword']." ".$arr["typeName"]." is guaranteed to meet or exceed ".$arr[0]->cs." original specifications, buy ".$arr['keyword']." ".$arr["typeName"]." get 30% off.";
					return $this;
				} else if($arr["be_type"]=="K9") {
					$this->title="".$arr['keyword'].",".$arr["typeName"].",".$arr[0]->cs." - ".$_SERVER['SERVER_NAME']."";
					$this->metaKeyword="".$arr['keyword'].",".$arr[0]->cs.",".$arr["typeName"]."";
					$this->metaDescription="High quality ".$arr[0]->cs." ".$arr['keyword']." ".$arr["typeName"]." for ".$arr[0]->jianjie2." Replacement Batteries ".$arr["typeName"]." wholesale or retail in ".$_SERVER['SERVER_NAME'].", ".$arr['keyword']." ".$arr["typeName"]." is guaranteed to meet or exceed ".$arr[0]->cs." original specifications, buy ".$arr['keyword']." ".$arr["typeName"]." get 30% off.";
					return $this;
				};
				break;
			case 'search':
				$this->title="Your search results : ".$arr["keystr"].". [Page ".$arr["page"]." All products] - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="".$arr["keystr"].", Laptop battery, camera battery, camera battery, computer battery, medical battery, household battery, etc.";
				$this->metaDescription="Your suche results for : ".$arr["keystr"]." [Page ".$arr["page"]." All products]";
				return $this;
				break;
			case 'dldy':
				$this->title="High quality ".$arr["brand"]." ".$arr["series"]." ".$arr["typeName"].",".$arr["attr"]." [Page ".$arr["page"]." All products] - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="".$arr["brand"]." ".$arr["series"]." ".$arr["typeName"]." life, high quality ".$arr["typeName"].",".$arr["attr"]."";
				$this->metaDescription="High quality ".$arr["attr"]." ".$arr["brand"]." ".$arr["series"]." ".$arr["typeName"].", We have more high quality batteries available to you. Including laptop batteries hp, bose, dell, etc. [Page ".$arr["page"]." All products]";
				return $this;
				break;
			case 'new':
				$this->title="New Arrivals in ".$arr["brand"]." Batteries, [Page ".$arr["page"]." All products]";
				$this->metaKeyword="New ".$arr["brand"]." Batteries, ".$arr["brand"]." batteries, ".$arr["brand"]." batteries prices";
				$this->metaDescription="All new arrivals in ".$arr["brand"]." Batteries. Every single year, we supply brand new ".$arr["brand"]." batteries to customers. 100% Satisfaction, Best Quality. Product Safety. Our current range consists of thousands of products, from all the premium manufacturers including Acer, Apple, ASUS, HP, Samsung, Sony and Toshiba. [Page ".$arr["page"]." All products]";
				return $this;
				break;
			case 'hot':
				$this->title="Top-Selling ".$arr["brand"]." Batteries - our current most popular ".$arr["brand"]." batteries. [Page ".$arr["page"]." All products]";
				$this->metaKeyword="Top-Selling ".$arr["brand"]." Batteries, ".$arr["brand"]." batteries, ".$arr["brand"]." batteries prices";
				$this->metaDescription="Here list current most popular ".$arr["brand"]." batteries. Buy ".$arr["brand"]." batteries online at ".$_SERVER['SERVER_NAME'].",  Our ".$arr["brand"]." batteries can be bought in bulk at great prices, and are available in various package sizes. [Page ".$arr["page"]." All products]";
				return $this;
				break;
			case 'video':
				$this->title="Hot sale batteries -View product videos online";
				$this->metaKeyword="batteries, product videos";
				$this->metaDescription="View product videos online. Plentiful battery and battery pack for Laptop ,cellphone,camer,smartwatch. Accessories&parts for brands TOSHIBA,SONY, IBM, DELL, HP, FUJITSU, MEDION and more.";
				return $this;
				break;
			case 'cart':
				$this->title="Shopping Cart - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="";
				$this->metaDescription="";
				return $this;
				break;
			case 'about':
				$this->title="About US - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="About US, Laptop Battery,dell Laptop Battery,Laptop AC Adapter, Cheap Laptop Batteries, Battery Pack, Laptop Power Supply";
				$this->metaDescription="We supply the best laptop battery & accessories to customers. Thank you for using ".$_SERVER['SERVER_NAME'].". We offer wholesale and retail cheap replacement batteries / chargers for laptops and other products. We hope we have made your shopping fast and easy.";
				return $this;
				break;
			case 'faq':
				$this->title="FAQ - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="FAQ, Laptop Battery,dell Laptop Battery,Laptop AC Adapter, Cheap Laptop Batteries, Battery Pack, Laptop Power Supply";
				$this->metaDescription="Thank you for using ".$_SERVER['SERVER_NAME'].". We offer wholesale and retail cheap replacement batteries / chargers for laptops. We hope we have made your shopping fast and easy. Li-Ion Battery Technology is a fascinating science! How to care for your Laptop Battery? How do you keep your battery going for as long as possible?";
				return $this;
				break;
			case 'payment':
				$this->title="payment - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="payment, Laptop Battery,dell Laptop Battery,Laptop AC Adapter, Cheap Laptop Batteries, Battery Pack, Laptop Power Supply";
				$this->metaDescription="We accept PayPal payment, and also accept Check and Money Order.";
				return $this;
				break;
			case 'return':
				$this->title="return - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="return, Laptop Battery,dell Laptop Battery,Laptop AC Adapter, Cheap Laptop Batteries, Battery Pack, Laptop Power Supply";
				$this->metaDescription="All of our products carry a 100% satisfaction guarantee. If you are not satisfied with your purchase, for any reason, you may return the product(s) to us within 30 days";
				return $this;
				break;
			case 'shipping':
				$this->title="shipping - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="shipping, Laptop Battery,dell Laptop Battery,Laptop AC Adapter, Cheap Laptop Batteries, Battery Pack, Laptop Power Supply";
				$this->metaDescription="We ship to worldwide. All order will be shipped at the same days as soon as payment was received. We can ship to virtually any address in the world. Note that there are restrictions on some products, and some products cannot be shipped to international destinations.";
				return $this;
				break;
			default:
				$this->title="Laptop Battery,dell Laptop Battery, Wholesale Laptop Batteries and AC Adapters - ".$_SERVER['SERVER_NAME']."";
				$this->metaKeyword="Laptop Battery,dell Laptop Battery,Laptop AC Adapter, Cheap Laptop Batteries, Battery Pack, Laptop Power Supply";
				$this->metaDescription="".$_SERVER['SERVER_NAME']." is the home of British most comprehensive laptop batteries,dell Laptop Battery,and ac adapters website. Wholesale or retail laptop batteries and laptop adapters with high quality & low price. Just enjoy your digital life with a new laptop battery.";
				return $this;
				break;
		}
	}
}
?>