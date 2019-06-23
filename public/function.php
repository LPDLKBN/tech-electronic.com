<?php
function encrypti($string, $operation, $key = '') {
    $key = md5($key);
    $key_length = strlen($key);
    $string = $operation == 'D' ? base64_decode(str_replace('-', '/', $string)) : substr(md5($string . $key), 0, 8) . $string;
    $string_length = strlen($string);
    $rndkey = $box = array();
    $result = '';
    for ($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($key[$i % $key_length]);
        $box[$i] = $i;
    }
    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result.=chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if ($operation == 'D') {
        if (substr($result, 0, 8) == substr(md5(substr($result, 8) . $key), 0, 8)) {
            return substr($result, 8);
        } else {
            return '';
        }
    } else {
        return str_replace(array('=', '/'), array('', '-'), base64_encode($result));
    }
}
//加密函数
function lock_url($txt,$key='')
{
  $txt = $txt.$key;
  $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-=+";
  $nh = rand(0,64);
  $ch = $chars[$nh];
  $mdKey = md5($key.$ch);
  $mdKey = substr($mdKey,$nh%8, $nh%8+7);
  $txt = base64_encode($txt);
  $tmp = '';
  $i=0;$j=0;$k = 0;
  for ($i=0; $i<strlen($txt); $i++) {
    $k = $k == strlen($mdKey) ? 0 : $k;
    $j = ($nh+strpos($chars,$txt[$i])+ord($mdKey[$k++]))%64;
    $tmp .= $chars[$j];
  }
  return urlencode(base64_encode($ch.$tmp));
}
//解密函数
function unlock_url($txt,$key='')
{
  $txt = base64_decode(urldecode($txt));
  $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-=+";
  $ch = $txt[0];
  $nh = strpos($chars,$ch);
  $mdKey = md5($key.$ch);
  $mdKey = substr($mdKey,$nh%8, $nh%8+7);
  $txt = substr($txt,1);
  $tmp = '';
  $i=0;$j=0; $k = 0;
  for ($i=0; $i<strlen($txt); $i++) {
    $k = $k == strlen($mdKey) ? 0 : $k;
    $j = strpos($chars,$txt[$i])-$nh - ord($mdKey[$k++]);
    while ($j<0) $j+=64;
    $tmp .= $chars[$j];
  }
  return trim(base64_decode($tmp),$key);
}