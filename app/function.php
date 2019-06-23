<?php
//国家代码转换
function change($country){
        
    switch ($country){
        case 'AUSTRALIA':
          $country='AU';  
           break;
        case 'AUSTRIA';
            $country='AT';
            break;
        case 'CANADA';
            $country='CA';
            break;
        case 'DENMARK';
            $country='DK';
            break;
        case 'FINLAND';
            $country='FI';
            break;
        case 'FRANCE';
            $country='FR';
            break;
        case 'GERMANY';
            $country='DE';
            break;
        case 'IRELAND';
            $country='IE';
            break;
        case 'ISRAEL';
            $country='IL';
            break;
         case 'ITALY';
            $country=' IT';
            break;
         case 'JAPAN';
            $country='JP';
            break;
         case 'KAZAKHSTAN';
            $country='KZ';
            break;
         case 'NETHERLANDS';
            $country='NL';
            break;
        case 'NEW ZEALAND';
            $country='NZ';
            break;
        case 'NORWAY';
            $country='NO';
            break;
        case 'PHILIPPINES';
            $country='PH';
            break;
        case 'POLAND';
            $country='PL';
            break;
        case 'RUSSIA';
            $country='RU';
            break;
        case 'SINGAPORE';
            $country='SG';
            break;
        case 'SPAIN';
            $country='ES';
            break;
        case 'SWEDEN';
            $country='SE';
            break;
        case 'SWITZERLAND';
            $country='CH';
            break;
        case 'UNITED KINGDOM';
            $country='GB';
            break;
        case 'UNITED STATES';
            $country='US';
            break;
        case 'JAPAN';
            $country='JP';
            break;
        case 'United_States';
            $country='US';
            break;
        case 'BELGIUM';
            $country='BE';
            break;
        case 'BRAZIL';
            $country='BR';
            break;
        case 'CHINA';
            $country='C2';
            break;
        case 'HONG_KONG';
            $country='HK';
            break;
        case 'HONG KONG';
            $country='HK';
            break;
        case 'PORTUGAL';
            $country='PT';
            break;
        case 'SOUTH KOREA';
            $country='KR';
            break;
        case 'TAIWAN';
            $country='TW';
            break;
        case 'UNITED_KINGDOM';
            $country='GB';
            break; 
    }
    return $country;
}
//邮编格式
function postcode($country, $postal, $arr = [])
{
    $tips="The format of the mailbox you entered is not correct!";
    if ($country == "JP")
    {
        $pattern = '/[0-9]/';
        preg_match_all($pattern, $postal, $arr);
        if (count($arr[0])!=7)
        {
            echo "<script>alert('$tips');history.go(-1);</script>";
            exit;
        }
    }
    elseif ($country == "CA")
    {
        $pattern = '/[0-9]/';
        preg_match_all($pattern, $postal, $arr);
        if (count($arr[0]) !=6)
        {
            echo "<script>alert('$tips');history.go(-1);</script>";
            exit;
        }
    }
    elseif ($country == "RU")
    {
        $pattern = '/[0-9]/';
        preg_match_all($pattern, $postal, $arr);
        if (count($arr[0]) != 6)
        {
            echo "<script>alert('$tips');history.go(-1);</script>";
            exit;
        }
    }
    elseif ($country == "SE")
    {
        $pattern = '/[0-9]/';
        preg_match_all($pattern, $postal, $arr);
        if (count($arr[0]) != 5)
        {
            echo "<script>alert('$tips');history.go(-1);</script>";
            exit;
        }
    }
    elseif ($country == "GB")
    {
        $pattern = '/[0-9]/';
        preg_match_all($pattern, $postal, $arr);
        if (count($arr[0]) < 5)
        {
            echo "<script>alert('$tips');history.go(-1);</script>";
            exit;
        }
    }
    elseif ($country == "US")
    {
        $pattern = '/[0-9]/';
        preg_match_all($pattern, $postal, $arr);
        if (count($arr[0]) < 5)
        {
            echo "<script>alert('$tips');history.go(-1);</script>";
            exit;
        }
    }
    else
    {
        $pattern = '/[0-9]/';
        preg_match_all($pattern, $postal, $arr);
        if (count($arr[0]) < 5)
        {
            echo "<script>alert('$tips');history.go(-1);</script>";
            exit;
        }
    }
}
