<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
#------------------------
/*flush();
ob_start();
set_time_limit(0);
error_reporting(0);
ob_implicit_flush(1);
error_reporting(0);*/
date_default_timezone_set('Asia/Tehran');

$admin = "367690492";
$TOKEN = $_ENV['API_TOKEN'];
define('API_KEY', $TOKEN, true);

$button_dokme_adm = json_encode(['keyboard'=>[
[['text'=>'دکمه جدید0']],//start/0
[['text'=>'دکمه جدید1']],//start/1
[['text'=>'دکمه جدید2']],//start/2
[['text'=>'دکمه جدید3']],//start/3
[['text'=>'دکمه جدید4']],//start/4
[['text'=>'دکمه جدید5']],//start/5
[['text'=>'دکمه جدید6']],//start/6
[['text'=>'دکمه جدید7']],//start/7
[['text'=>'دکمه جدید8']],//start/8
[['text'=>'دکمه جدید9']],//start/9
[['text'=>'دکمه جدید10']],//start/+10
[['text'=>'دکمه جدید11']],//start/+11
[['text'=>'دکمه جدید12']],//start/+12
[['text'=>'دکمه جدید13']],//start/+13
[['text'=>'دکمه جدید14']],//start/+14
[['text'=>'دکمه جدید15']],//start/+15
[['text'=>'دکمه جدید16']],//start/+16
[['text'=>'دکمه جدید17']],//start/+17
[['text'=>'دکمه جدید18']],//start/+18
[['text'=>'دکمه جدید19']],//start/+19
[['text'=>'دکمه جدید20']],//start/+20
[['text'=>"غیرفعال کردن حالت ویرایش دکمه ها"]],
],'resize_keyboard'=>true]);
if(json_decode(file_get_contents('php://input'))->message->chat->id != $admin || in_array($from_id,explode("\n" ,file_get_contents("other/admin.txt"))) == false){
$button_dokme_ha = json_encode(['keyboard'=>[
[['text'=>'']],//start/0
[['text'=>'']],//start/1
[['text'=>'']],//start/2
[['text'=>'']],//start/3
[['text'=>'']],//start/4
[['text'=>'']],//start/5
[['text'=>'']],//start/6
[['text'=>'']],//start/7
[['text'=>'']],//start/8
[['text'=>'']],//start/9
[['text'=>'']],//start/+10
[['text'=>'']],//start/+11
[['text'=>'']],//start/+12
[['text'=>'']],//start/+13
[['text'=>'']],//start/+14
[['text'=>'']],//start/+15
[['text'=>'']],//start/+16
[['text'=>'']],//start/+17
[['text'=>'']],//start/+18
[['text'=>'']],//start/+19
[['text'=>'']],//start/+20
],'resize_keyboard'=>true]);
}else{
$button_dokme_ha = json_encode(['keyboard'=>[
[['text'=>'']],//start/0
[['text'=>'']],//start/1
[['text'=>'']],//start/2
[['text'=>'']],//start/3
[['text'=>'']],//start/4
[['text'=>'']],//start/5
[['text'=>'']],//start/6
[['text'=>'']],//start/7
[['text'=>'']],//start/8
[['text'=>'']],//start/9
[['text'=>'']],//start/+10
[['text'=>'']],//start/+11
[['text'=>'']],//start/+12
[['text'=>'']],//start/+13
[['text'=>'']],//start/+14
[['text'=>'']],//start/+15
[['text'=>'']],//start/+16
[['text'=>'']],//start/+17
[['text'=>'']],//start/+18
[['text'=>'']],//start/+19
[['text'=>'مدیریت']],//start/+20
],'resize_keyboard'=>true]);
}
$button_pasokh_sarih = json_encode(['keyboard'=>[
/*
اوپن شده در سورس خونه
کانال ما @Source_Home
*/
[['text'=>'برگشت'],['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
$button1 = [
//<buttonmenu>
];
$button2 = [
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
];
