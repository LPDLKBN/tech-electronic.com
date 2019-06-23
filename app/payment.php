<?php
//支付页面
session_start();
require_once('./common.php');
require_once ('../public/function.php');
require_once ('./function.php');
header("Content-type:text/html;charset=utf-8");
ob_start();
$userid = session_id();
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ShippingAddress;
use Paypal\Api\Invoice;
use Paypal\Api\InvoiceItem;
include("../data/fun.php");
include("../data/DBConfig.class.php");
include("../data/sql.class.php");
$type = '';
if(isset($_GET['type'])){
    $type = encrypti($_GET['type'], "D", "123456");
    //AAAAA
    $alrttips="Please fill in the complete personal information";
    if(!isset($_POST['personname'])||!isset($_POST['email'])||!isset($_POST['address1'])||!isset($_POST['postal'])||!isset($_POST['phone'])||!isset($_POST['city'])){
       echo"<script>alert('$alrttips');history.go(-1);</script>"; 
    }
}
$resArryCart = json_decode(Products::GetCartList($userid));
$cartlist = count($resArryCart);
$num = $cartlist;
$paymentType = "Sale";
$sp_total = 0;
$total = 0;
$shipping = 0; //运费
$tax = 0; //税费
$subtotal = 0;
$sum = 0; //购买产品总数
$discount=0;
$itemm = array();
$neirong = '';
$currency = "USD";
$bt = "Payment description";
isset($_GET['checkdis'])?$checkdis=unlock_url($_GET['checkdis'], "aaaaa"):$checkdis="123";
foreach ($resArryCart as $rs_num) {
    $single_num=$rs_num->gwc_shuliang;
    $sum += $single_num;
};
foreach ($resArryCart as $rs){
    $price = get_ouprice($rs->pprice);
    $price=str_replace(',','',$price);
    if ($checkdis=="discount" && $sum>=5) {
        $dicountArr=getDisc($price,$sum);
        $discount=$dicountArr["discount"];
    };
    $price=$price-$discount;
    $quantity = $rs->gwc_shuliang;
    $des = cutTitle($rs->gwc_prodes, 50) . "...";
    $name=$rs->cs." ".getjan($rs->jianjie1);
    $pcode=$rs->pcode;
    $sp_total += $price * $quantity;
    $neirong.=$pcode.' buy('.$quantity.'),'.$des.';';    
    $nameit = new Item();
    $nameit->setName($name)//名字
    ->setDescription($des)//描述
    ->setCurrency($currency)//货币单位
    ->setQuantity($quantity)//数量
    ->setSku($pcode) // 产品信息
    ->setPrice($price); //价格
    $itemm[] = $nameit;
}
$_SESSION['product'] = $neirong;

$shipping = get_shipping($sp_total);
$total = $shipping + $sp_total + $tax;
$itemList = new ItemList();
$itemList->setItems($itemm);
$payer = new Payer();
$payer->setPaymentMethod("paypal");
// 自定义用户收货地址，避免用户在paypal上账单的收货地址和销售方收货地址有出入
// 这里定义了收货地址，用户在支付过程中就不能更改收货地址，否则，用户可以自己更改收货地址
$personname=$phone=$street1=$street2=$city=$state=$postal=$country=$email=$attention="";
if ($type == "slow"){   
    $data=array();
    foreach($_POST as $key=>$val){
        if($key!="address1"||$key!="address2"||$key!="country"||$key!="personname"||$key!="attention"){
            $val=trim($val);
        }
        $data[$key]=preg_replace("/<([a-zA-Z]+)[^>]*>/","<\\1>",$val);
    }
    $personname=$data['personname'];
    $country=$data['country'];
    $phone=$data['phone'];
    $street1=$data['address1'];
    $street2=$data['address2'];
    $postal=$data['postal'];
    $city=$data['city'];
    $state=$data['state'];
    $email=$data['email'];
    $attention=$data['attention'];
    // postcode($country, $postal);
    $_SESSION['customeremail'] = $email;
    $_SESSION['customerattention'] = trim(htmlspecialchars($attention));
    $address = new ShippingAddress();
    $address->setRecipientName($personname)
            ->setLine1($street1)
            ->setLine2($street2)
            ->setCity($city)
            ->setState($state)
            ->setPhone($phone)
            ->setPostalCode($postal)
            ->setCountryCode($country);     
    $itemList->setShippingAddress($address);
}
    $ip = getenv("REMOTE_ADDR");
    $yum = $_SERVER['SERVER_NAME'];
    //      $addtime=date("Y-m-d H:i:s");
    $time=time();
    $addtime=date("Y-m-d H:i:s",$time);
    //      $addtime=date("2018");
    $sql = "insert into unpayed (userid,`name`,phone,street1,street2,city,state,postal,country,email,neirong,or_total,addtime,ip,yum,attention,`status`) values ('$userid','$personname','$phone','$street1','$street2','$city','$state','$postal','$country','$email','$neirong','$total','$addtime','$ip','$yum',' $attention',0)";
    $Insertid = Products::Execute2($sql);
    //将返回id存到session里
    $_SESSION['insertid'] = $Insertid;

    $details = new Details();
    $details->setShipping($shipping)
            ->setTax($tax)
            ->setSubtotal($sp_total);
    $amount = new Amount();
    $amount->setCurrency($currency)
            ->setTotal($total)
            ->setDetails($details);
    $transaction = new Transaction();
    $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($bt)//支付描述
            ->setInvoiceNumber(uniqid());
    $baseUrl = getBaseUrl();
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl("$baseUrl/exec.php?success=true")//支付后天跳转页面
            ->setCancelUrl("$baseUrl/cancel.php?success=false"); //支付取消后跳转页面
    $payment = new Payment();
    $payment->setIntent($paymentType)
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
    $payment->create($apiContext);
    $approvalUrl = $payment->getApprovalLink();
// $approvalUrl是paypal生成的付款地址
    header("Location: $approvalUrl");
    exit;
