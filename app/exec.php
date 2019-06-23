<?php

//支付成功页面
set_time_limit(3600);
session_start();
require_once('./common.php');
require_once("../data/DBConfig.class.php");
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

//print_r($_SESSION);exit;
// ### Approval Status
// Determine if the user approved the payment or not
if (isset($_GET['success']) && $_GET['success'] == 'true')
{
    // Get the payment Object by passing paymentId
    // payment id was previously stored in session in
    // CreatePaymentUsingPayPal.php
    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);
    // ### Payment Execute
    // PaymentExecution object includes information necessary
    // to execute a PayPal account payment.
    // The payer_id is added to the request query parameters
    // when the user is redirected from paypal back to your site
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);
    try {
        //支付成功后进入
        //result为支付成功后paypal返回的数据.
        $result = $payment->execute($execution, $apiContext);
        $result->payer->payer_info;
		if(empty($_SESSION['customeremail'])){
			$email = $result->payer->payer_info->email;
			}else{
			$email=	$_SESSION['customeremail'];
			}
        $aa = $result->player;
        $street1 = $result->payer->payer_info->shipping_address->line1;
        $street2 = $result->payer->payer_info->shipping_address->line2;
        $phone = $result->payer->payer_info->shipping_address->phone;
        $companyname = $result->payer->payer_info->shipping_address->recipient_name;
        $country = $result->payer->payer_info->shipping_address->country_code;
        $payer_id = $result->payer->payer_info->payer_id;
        $city = $result->payer->payer_info->shipping_address->city;
        $state = $result->payer->payer_info->shipping_address->state;
        $postal = $result->payer->payer_info->shipping_address->postal_code;
        $or_total = $result->transactions[0]->amount->total;
        $or_bianhao = $result->transactions[0]->related_resources[0]->sale->id;
        $a = $or_bianhao = $result->transactions[0]->invoice_number;
        $neirong = $_SESSION['product'];
        $b = date("Ymd");
        $dd_bianhao = $b . '' . $a;
        $dd_time = date("Y-m-d H:i:s");
        $ip = getenv("REMOTE_ADDR");
        $yum = $_SERVER["SERVER_NAME"];
        if ($_SESSION['attention']||$_SESSION['email']||$_SESSION['phone'])
        {
           
            $attention = $_SESSION['attention'];
        }else{
            $attention="";
        }
      
        $sql = "insert into paypalorder (dd_bianhao,or_bianhao,payer_id,neirong,or_total,country,personname,street1,street2,city,state,postal,phone,email,dd_time,ip,yum,attention) values ('$dd_bianhao','$or_bianhao','$payer_id','$neirong','$or_total','$country','$companyname','$street1','$street2','$city','$state','$postal','$phone','$email','$dd_time','$ip','$yum',' $attention')";
        $pdo = DB::get_conn();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $query->execute();
        

        $userid = session_id();
        //删除购物车
        $delsql = "delete from gouwuche where userid='".$userid."'";
        $query = $pdo->prepare($delsql);
        $query->execute();
        //修改unpayed表产品状态
        $unpayid = !empty($_SESSION['insertid'])?$_SESSION['insertid']:'';
        $upsql = "update `unpayed` set `status` = 1 where id = '".$unpayid."'";
        $query = $pdo->prepare($upsql);
        $query->execute();

        unset($_SESSION['paypalway']);
        unset($_SESSION['phone']);
        unset($_SESSION['customeremail']);
        unset($_SESSION['customerattention']);
        unset($_SESSION['insertid']);


        $title = "Purchase success";
        $content = "<html><p>Dear $companyname</p>" . "<p>Good Day! Nice contacting with you. "
                . "Thanks for your order on our website-(machiibattery.com)."
                . " We are glad to inform you that your order has been processed. "
                . "We will offer the tracking number to you to let you know. "
                . "Please wait one or two days.</p>You have paid order(s) as follows,
                <p>Total Amount:$or_total'EUR' </p>
                  <p>Product:$neirong</p><p>With Best Regards
                    Olivia</p></html>"; //发送邮件的内容
        //
        $subject = "Purchase success"; //标题
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers.="Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers.="From:info@tech-electronic.com\r\n";
        $headers.="Reply-To:server@tech-electronic.com\r\n";
        mail($email, $subject, $content, $headers);
         unset($_SESSION['emailh']);
        unset($_SESSION['attention']);
        header("location:../pay_success.php"); //跳转到pay_success.php 页面
    } catch (Exception $ex) {
        header("location:../pay_error.php"); //跳转到pay_error.php 页面
        exit(1);
        //支付失败！
    }
    return $payment;
}
else
{
    echo "支付失败!";
}
?>
