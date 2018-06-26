<?php

$strAccessToken = "fBFtgaHerG2noF379cb70+uHkZAaSJD3CftwfezK0VldN4ZBQ4fNrOkYJXfoV155Ot/Jlrx0SDNa1kujsqGhPCbQS5tRK25hwVL6CvlokmR+90FjwhYMvCBZAUEcZ6VDitO0cja3u159fcTT6F8FMwdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$inputtext = $arrJson['events'][0]['message']['text'];
$w = (explode(" ",$inputtext)); //ถ้าถามอากาศ เช่น อากาศ เชียงใหม่

$arrPostData = array();
	
if($inputtext == "สวัสดี") {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "มีอะไรให้รับใช้ครับท่าน";
  
} else if ($inputtext == "ชื่ออะไร") {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "Cinnamon ครับท่าน";
  
} else if ($inputtext == "ทำอะไรได้บ้าง") {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "เปิด ปิด ไฟ แอร์ เช็คอุณหภูมิ ครับท่าน";
  
} else if ($inputtext == "เปิดไฟนอน1") {
  	$mode = curl_init("http://128.199.137.43:3000/smtbot2017/mode/5/o");
  	curl_exec($mode);
  	$digital = curl_init("http://128.199.137.43:3000/smtbot2017/digital/5/1");
  	curl_exec($digital);
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "เปิดไฟแล้วครับ";
  
} else if ($inputtext == "ปิดไฟนอน1") {
  	$mode = curl_init("http://128.199.137.43:3000/smtbot2017/mode/5/o");
  	curl_exec($mode);
  	$digital = curl_init("http://128.199.137.43:3000/smtbot2017/digital/5/0");
  	curl_exec($digital);
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "ปิดไฟแล้วครับ";

} else if ($inputtext == "ความชื้น") {
  	$s = file_get_contents("http://128.199.137.43:3000/smtbot2017/variable/humidity");
 	 $h = json_decode($s, true);
  	$hu = $h['humidity'];
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "ความชื้นสัมพัธน์ตอนนี้ " . $hu . "%";

} else if ($inputtext == "อุณหภูมิ") {
  	$s = file_get_contents("http://128.199.137.43:3000/smtbot2017/variable/temperature");
  	$h = json_decode($s, true);
  	$hu = $h['temperature'];
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "อุณหภูมิตอนนี้ " . $hu . " C";

} else if ($inputtext == "อากาศ") {
  	$s = file_get_contents("http://128.199.137.43:3000/smtbot2017/variable/temperature");
  	$h = json_decode($s, true);
  	$hu = $h['temperature'];
 	$s2 = file_get_contents("http://128.199.137.43:3000/smtbot2017/variable/humidity");
 	$h2 = json_decode($s2, true);
 	$hu2 = $h2['humidity'];
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "อุณหภูมิ " . $hu . " C | ความชื้น " . $hu2 . " %";

} else if ($inputtext == "แผนที่") {
	$arrPostData['messages'][0]['type'] = "location";
	$arrPostData['messages'][0]['title'] = "ศูนย์ศึกษาวิภาวดี มหาวิทยาลัยรังสิต";
	$arrPostData['messages'][0]['address'] = "อาคาร TST Tower ชั้น 21-22 เลขที่ 21 ถ.วิภาวดีรังสิต ซ.9 จอมพล จตุจักร กรุงเทพ";
	$arrPostData['messages'][0]['latitude'] = "13.808112";
	$arrPostData['messages'][0]['longitude'] = "100.559255";
 
} else if ($inputtext == "รายงาน") {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "หลอดไฟ: นอน1-ปิด, นอน2-เปิด*, นอน3-ปิด | แอร์: นอน1-เปิด*, นอน2-เปิด*, นอน3-ปิด";

} else if ($inputtext == "เยี่ยม") {
	$arrPostData['messages'][0]['type'] = "sticker";
	$arrPostData['messages'][0]['packageId'] = "1";
	$arrPostData['messages'][0]['stickerId'] = "13";

} else if ($inputtext == "บาย") {
	$arrPostData['messages'][0]['type'] = "sticker";
	$arrPostData['messages'][0]['packageId'] = "1";
	$arrPostData['messages'][0]['stickerId'] = "408";

} else if ($inputtext == "ดูรูปหน่อย") {
	$arrPostData['messages'][0]['type'] = "image";
	$arrPostData['messages'][0]['originalContentUrl'] = "https://still-beach-54304.herokuapp.com/p1.jpg";
	$arrPostData['messages'][0]['previewImageUrl'] = "https://still-beach-54304.herokuapp.com/p2.jpg";

} else if ($inputtext == "ชอบเพลงอะไร") {
	$arrPostData['messages'][0]['type'] = "image";
	$arrPostData['messages'][0]['originalContentUrl'] = "https://still-beach-54304.herokuapp.com/p3.jpg";
	$arrPostData['messages'][0]['previewImageUrl'] = "https://still-beach-54304.herokuapp.com/p3.jpg";

} else if ($inputtext == "เรียนที่ไหน") {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "https://www.facebook.com/RSU.IT.SMT";
	
}else if ($inputtext == "ขอเพลงหน่อย") {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "https://www.youtube.com/watch?v=4TKCbe8jyRI";
	
}

if ($w[0] == "อากาศ" and isset($w[1])) {
	$prov = $w[1];
  	$a = file_get_contents("http://m.smart-fttx.com/test-weather.php?prov=$prov&token=inb32XpbrlLgd8HMCzhbhZsJq7VxkqqA");
 	$arrPostData['messages'][0]['type'] = 'text';
 	$arrPostData['messages'][0]['text'] = $a;
}

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);

?>
