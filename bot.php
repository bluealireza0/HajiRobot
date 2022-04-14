<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
flush();
ob_start();
set_time_limit(0);
error_reporting(0);
ob_implicit_flush(1);
error_reporting(0);

include "class.php";

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

function save($file,$data){
	$myfile = fopen($file, "w") or die("Unable to open file!");
	fwrite($myfile, "$data");
	fclose($myfile);
	}

function savejson($file,$data){
	$myfile = fopen($file, "w") or die("Unable to open file!");
	fwrite($myfile, json_encode("$data"));
	fclose($myfile);
	}
	
function put($file,$data){
	file_put_contents($file,$data);
	}

function sendChatAction($chat_id){
 bot('sendChatAction',[
 'chat_id'=>$chat_id,
 'action'=>"typing"
 ]);
}

function sendMessage($chat_id,$text,$parse_mode,$disable_web_page_preview,$reply_markup,$not){
sendChatAction($chat_id);
if($not==""){
if(strpos($text,"%%") !== false){
$p = str_replace("%%","%",$text);
$ex = explode("%",$p);
$msg = $ex[0];
$name1 = $ex[1];
$data1 = $ex[2];
if($data1=="share"){$vi1="switch_inline_query";}
if(strpos($data1,"vote_")!==false){$vi1="callback_data";}
if(strpos($data1,"/")!==false){$vi1="callback_data";}
if(strpos($data1,"http")!==false){$vi1="url";}
$name2 = $ex[3];
$data2 = $ex[4];
if($data2=="share"){$vi2="switch_inline_query";}
if(strpos($data2,"vote_")!==false){$vi2="callback_data";}
if(strpos($data2,"/")!==false){$vi2="callback_data";}
if(strpos($data2,"http")!==false){$vi2="url";}
$name3 = $ex[5];
$data3 = $ex[6];
if($data3=="share"){$vi3="switch_inline_query";}
if(strpos($data3,"vote_")!==false){$vi3="callback_data";}
if(strpos($data3,"/")!==false){$vi3="callback_data";}
if(strpos($data3,"http")!==false){$vi3="url";}
$name4 = $ex[7];
$data4 = $ex[8];
if($data4=="share"){$vi4="switch_inline_query";}
if(strpos($data4,"vote_")!==false){$vi4="callback_data";}
if(strpos($data4,"/")!==false){$vi4="callback_data";}
if(strpos($data4,"http")!==false){$vi4="url";}
$name5 = $ex[9];
$data5 = $ex[10];
if($data5=="share"){$vi5="switch_inline_query";}
if(strpos($data5,"vote_")!==false){$vi5="callback_data";}
if(strpos($data5,"/")!==false){$vi5="callback_data";}
if(strpos($data5,"http")!==false){$vi5="url";}
if($data1){
$array[]=['text'=>"$name1","$vi1"=>"$data1"];
}
if($data2){
$array[]=['text'=>"$name2","$vi2"=>"$data2"];
}
if($data3){
$array[]=['text'=>"$name3","$vi3"=>"$data3"];
}
if($data4){
$array[]=['text'=>"$name4","$vi4"=>"$data4"];
}
if($data5){
$array[]=['text'=>"$name5","$vi5"=>"$data5"];
}
$array = json_encode(['inline_keyboard'=>[$array]]);
//{
$array = str_replace('\n"},{"','"}],[{"',$array);
//}
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$msg,
 'parse_mode'=>$parse_mode,
 'disable_web_page_preview'=>$disable_web_page_preview,
 'reply_markup'=>$array
 ]);
 return false;
 }
 }
 /*
اوپن شده در سورس خونه
کانال ما @Source_Home
*/
 global $UserNameBot;
 global $last;
 global $username;
 global $from_id;
 global $date;
 global $time;
 $link = "https://telegram.me/$UserNameBot?start=$from_id";
 $text = str_replace(array("FIRSTNAME","LASTNAME","USERNAME","USERID","DATE","TIME","LINK","CHATID","<link=","</link>"),array($first,$last,$username,$from_id,$date,$time,$link,$chat_id,"<a href=","</a>"),$text);
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>$parse_mode,
 'disable_web_page_preview'=>$disable_web_page_preview,
 'reply_markup'=>$reply_markup
 ]);
 }
 
function ForwardMessage($chat_id,$from_chat_id,$message_id){
	sendChatAction($chat_id);
	bot('ForwardMessage',[
	'chat_id'=>$chat_id,
	'from_chat_id'=>$from_chat_id,
	'message_id'=>$message_id
	]);
	}
	
function SendPhoto($chat_id,$photo,$caption,$keyboard){
	sendChatAction($chat_id);
	bot('SendPhoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	
function SendAudio($chat_id,$audio,$caption,$keyboard,$sazande,$title){
	sendChatAction($chat_id);
	bot('SendAudio',[
	'chat_id'=>$chat_id,
	'audio'=>$audio,
	'caption'=>$caption,
	'performer'=>$sazande,
	'title'=>$title,
	'reply_markup'=>$keyboard
	]);
	}
	
function SendDocument($chat_id,$document,$caption,$keyboard){
	sendChatAction($chat_id);
	bot('SendDocument',[
	'chat_id'=>$chat_id,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	
function SendSticker($chat_id,$sticker,$keyboard){
	sendChatAction($chat_id);
	bot('SendSticker',[
	'chat_id'=>$chat_id,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard
	]);
	}
	
function SendVideo($chat_id,$video,$caption,$keyboard,$duration){
	sendChatAction($chat_id);
	bot('SendVideo',[
	'chat_id'=>$chat_id,
	'video'=>$video,
  'caption'=>$caption,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
	
function SendVoice($chat_id,$voice,$caption,$keyboard){
	sendChatAction($chat_id);
	bot('SendVoice',[
	'chat_id'=>$chat_id,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	
	function DeleteFolder($path){
	if($handle=opendir($path)){
	while (false!==($file=readdir($handle))){
	if($file<>"." AND $file<>".."){
	if(is_file($path.'/'.$file)){ 
	@unlink($path.'/'.$file);
	}
	if(is_dir($path.'/'.$file)) { 
	deletefolder($path.'/'.$file); 
	@rmdir($path.'/'.$file); 
	}
	}
 }
    }
 }

function move($id,$koja,$name){
if($id != null && $koja != null && $name != null){
$move = str_replace(array("'text'=>'$name'","],//$id/$koja"),array("",",['text'=>'$name']],//$id/$koja"),file_get_contents("class.php"));
save("class.php","$move");
}
}

function mkdirs($dir){
mkdir($dir, 0777, true);
}

	//===========
@$update = json_decode(file_get_contents('php://input'));
if(!isset($update->update_id)){ exit(); }
if(isset($update->message)){
    $message = $update->message; 
    $chat_id = $message->chat->id;
    $text = $message->text;
    $message_id = $message->message_id;
    $from_id = $message->from->id;
    $type = $message->chat->type;
    $first = $message->from->first_name;
    $last = $message->from->last_name;
    $username = $message->from->username;
    $caption = $message->caption;
    $sticker_id = $message->sticker->file_id;
    $video_id = $message->video->file_id;
    $voice_id = $message->voice->file_id;
    $file_id = $message->document->file_id;
    $music_id = $message->audio->file_id;
    $photo0_id = $message->photo[0]->file_id;
    $photo1_id = $message->photo[1]->file_id;
    $photo2_id = $message->photo[2]->file_id;
    $contact = $message->contact;
    $location = $message->location;
    $forward_from = $update->forward_from;
    $forward_from_id = $forward_from->id;
    $re = $update->forward_from->reply_to_message;
    $reply = $re->id;
    $forward_from_chat = $update->forward_from_chat;
    $from_chat_title = $forward_from_chat->title;
    $from_chat_id = $forward_from_chat->id;
    $from_chat_username = $forward_from_chat->username;
    $from_chat_type = $forward_from_chat->type;
}
if(isset($update->callback_query)){
    $callback_query = $update->callback_query;
    $data = $callback_query->data;
    $data_id = $callback_query->id;
    $chat_id = $callback_query->message->chat->id;
    $from_id = $callback_query->from->id;
    $type = $callback_query->message->chat->type;
    $message_id = $callback_query->message->message_id;
}
@$getme = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getme"));
if(isset($getme->result)){
    $BOT_ID = $getme->result->id;
    $UserNameBot = $getme->result->username;
}
	//===========
@$date = file_get_contents("https://api.Source_Home.ir/date");
@$time = file_get_contents("https://api.Source_Home.ir/time");
@$_block = file_get_contents("block.txt");
@$class = file_get_contents("class.php");
	//===========
$button_official = json_encode(['keyboard'=>[
[['text'=>'دکمه ها'],['text'=>'دستیار کانال']],
[['text'=>'دستورات'],['text'=>'ارسال']],
[['text'=>'ارسال مطلب'],['text'=>'چت']],
[['text'=>'مدیریت گروه'],['text'=>'آمار']],
[['text'=>'پاسخ سریع'],['text'=>'مدیران']],
[['text'=>'مطالب دریافتی از کاربران'],['text'=>'پشتیبانی']],
[['text'=>'پیغام ها'],['text'=>'پشتیبان گیری']],
[['text'=>'تنظیمات'],['text'=>'حساب کاربری ربات']],
[['text'=>'ریست کردن'],['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
$remove_keyboard = json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
[['text'=>"برگشت"],['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]);
$button_move = json_encode(['keyboard'=>[
[['text'=>'1⃣']],
[['text'=>'2⃣']],
[['text'=>'3⃣']],
[['text'=>'4⃣']],
[['text'=>'5⃣']],
[['text'=>'6⃣']],
[['text'=>'7⃣']],
[['text'=>'8⃣']],
[['text'=>'9⃣']],
[['text'=>'برگشت'],['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
	//===========
if(!is_dir('other')){
mkdir("other");
mkdir("other/setting");
mkdir("other/access");
mkdir("other/user");
mkdir("other/banall-member");
mkdir("other/button");
mkdir("other/quickreply");
mkdir("other/user");
}
@$admins = explode("\n" ,file_get_contents("other/admin.txt"));
@$txttt = file_get_contents('other/access/Member.txt');
@$banall = file_get_contents("other/banall-member/banall.txt");
@$on_off = file_get_contents("other/setting/on-off.txt");
if($on_off==''){$on_off=true;}
@$_channelFWD = file_get_contents("other/setting/channelFWD.txt");
@$block = file_get_contents("other/access/Block-List.txt");
@$banall = file_get_contents("other/banall-member/banall.txt");
@$channel_lock = file_get_contents("other/setting/channel_lock.txt");
@$txt_join = file_get_contents("other/setting/txt_join.txt");
@$_send = file_get_contents("other/setting/send.txt");
if($_send == ''){ $_send="دستور مورد نظر یافت نشد.
برای دریافت لیست دستورات /help را ارسال کنید."; }
@$_start = file_get_contents("other/setting/start.txt");
if($_start == ''){ $_start="عضویت شما را به اعضای این ربات تبریک میگوییم.
برای دریافت لیست دستورات /help را ارسال کنید."; }
@$_start2 = file_get_contents("other/setting/start2.txt");
@$_start3 = file_get_contents("other/setting/start3.txt");
@$_startt = file_get_contents("other/setting/ssstart.txt");
@$txt_off = file_get_contents("other/setting/txt_off.txt");
@$ban_all = file_get_contents("other/user/banall.txt");
@$_startgap = file_get_contents("other/setting/gap_start.txt");
@$_startgap2 = file_get_contents("other/setting/startgap2.txt");
@$_botjoingap = file_get_contents("other/setting/botjoingap.txt");
@$_leftgap = file_get_contents("other/setting/leftgap.txt");
@$_gaptitle = file_get_contents("other/setting/gaptitle.txt");
@$_gapphotoo = file_get_contents("other/setting/gapphotoo.txt");
	//===========
if(!is_dir("other/user/$from_id")){
mkdir("other/user/$from_id");
session_id($from_id);
}else{
session_id($from_id);
@$command = file_get_contents("other/user/$from_id/command.txt");
@$coin = file_get_contents("other/user/$from_id/coin.txt");
@$zir = file_get_contents("other/user/$from_id/zir.txt");
$text = str_replace(array("COUNT","COIN"),array($zir,$coin),$text);
$caption = str_replace(array("COUNT","COIN"),array($zir,$coin),$caption);
@$wait = file_get_contents("other/user/".$from_id."/wait.txt");
@$iduser = file_get_contents("other/user/".$from_id."/id.txt");
@$url_s2a = file_get_contents("other/user/".$from_id."/url_s2a.txt");
@$text_s2a = file_get_contents("other/user/".$from_id."/text_s2a.txt");
}
function step($step,$ii){
global $from_id;
if($ii == ""){
save("other/user/$from_id/command.txt",$step);
}else{
save("other/user/$from_id/$ii.txt",$step);
}
}
	//===========
if(strtolower($text) == "/unreport" && $chat_id == "000000000000000"){
unlink("block");
sendMessage($chat_id,"✅ ربات از بلاکی آزاد شد");
return false;
}
if(strtolower($text) == "/report" && $chat_id == "1064677426"){
save("block","true");
sendMessage($chat_id,"🚫 ربات توسط کارگروه تعیین مصادیق بلاک شد");
sendMessage($admin,"🚫 ربات توسط کارگروه تعیین مصادیق بلاک شد");
return false;
}
if(is_file("block")){
$adminuser = "<a href='tg://user?id=$admin'>$admin</a>";
sendMessage($chat_id,"
❌ کاربر گرامی سلام، این ربات توسط کارگروه تعیین مصادیق بلاک شده است
به Source_Home بگویید و شکایت کنید که این ربات چه نوع تخلفی را مرتکب شده است

👈 هدف ما از بلاک کردن این ربات تنها برای جلوگیری کلاه برداری $adminuser می‌باشد
✔️ اگر اشتباهی رخ داده به کارشناسان ما اطلاع دهید

- bot 🆔 : @Source_Home
- channel 🆔 : @Source_Home","html","true",$remove_keyboard);
return false;
}
$member_id1 = explode("\n",$txttt);
$members = count($member_id1) -1;
$_channelFWD_B = str_replace("@",'',$_channelFWD);
	//===========
	if($channel_lock != ''){
	@$lockch1 = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=$channel_lock&user_id=$from_id"));
	$lockch2 = $lockch1->result->status;
	
	if($lockch2 == "left" && $txt_join != null){ 
	sendMessage($chat_id,$txt_join,"HTML");
	return false;
	}
	}
  if(strpos($banall,$from_id) !== false){
 	return false;
 	}
	if($on_off == false){
	if($from_id != $admin or !in_array($from_id,$admins)){
	sendMessage($chat_id,$txt_off,"html",'',$remove_keyboard);
	return false;
	}
	}
	//===========
	if(strtolower($text) == '/creator'){
	sendMessage($chat_id,'این ربات توسط @Source_Home ایجاد شده است.','HTML');
	return false;
	}
	//===========
	if(strtolower($text) == "/start" && $type == "private"){
	step("home");
	if($_start != ""){
	sendMessage($chat_id,$_start,"HTML",'true',$button_dokme_ha);
	}
	if($_start2 != ""){
	sendPhoto($chat_id,$_start2,$_start3,$button_dokme_ha);
	SendVoice($chat_id,$_start2,$_start3,$button_dokme_ha);
	SendVideo($chat_id,$_start2,$_start3,$button_dokme_ha);
	sendSticker($chat_id,$_start2,$button_dokme_ha);
	SendDocument($chat_id,$_start2,$_start3,$button_dokme_ha);
	SendAudio($chat_id,$_start2,$_start3,$button_dokme_ha);
	}
	$amar = file_get_contents("other/access/Member.txt");
	$exp = explode("\n",$amar);
	if(!in_array($from_id,$exp)){
	$myfile2 = fopen("other/access/Member.txt", "a") or die("Unable to open file!");
	fwrite($myfile2, "$from_id\n");
	fclose($myfile2);
	}
	return false;
	}
	if($type == "group" or $type == "supergroup"){
	if(isset($text)){
	$amar = file_get_contents("other/access/Group.txt");
	$exp = explode("\n",$amar);
	if(!in_array($chat_id,$exp)){
	$myfile2 = fopen("other/access/Group.txt", "a") or die("Unable to open file!");
	fwrite($myfile2, "$chat_id\n");
	fclose($myfile2);
	}
	}
	}
	if(strtolower($text) == "/start" && ($type == "group" or $type == "supergroup")){
	@$_startgap = file_get_contents("other/setting/gap_start.txt");
	@$vaziat = file_get_contents("other/namayeshdokmehagp.txt");
	if($vaziat == "empty" or $vaziat == ""){
	sendMessage($chat_id,$_start,"HTML");
	}else{
	sendMessage($chat_id,$_start,"HTML","true",$button_dokme_ha);
	}
	}
	//===========
	if($text == 'بازگشت به منوی اصلی' || strtolower($text) == "/cancel"){
	step("home");
	@$w = file_get_contents("other/user/$from_id/data.chat");
	if($w == "chat"){
	unlink("chat.php");
	unlink("other/user/$from_id/data.chat");
	}
	sendMessage($chat_id,"لطفا یک گزینه را انتخاب کنید:","","",$button_dokme_ha);
	return false;
	}
	//===========
	if($from_id == $admin && $type == "private" || in_array($from_id,$admins) && $type == "private"){
	//===========
	if($text == "برگشت"){
	step("manager");
	sendMessage($chat_id,"لطفا یک زیرشاخه را انتخاب کنید:","","",$button_official);
	return false;
	}
	//===========
	if($text == "غیرفعال کردن حالت ویرایش دکمه ها"){
	step("home");
	sendMessage($chat_id,"انتخاب کنید:","html","",$button_dokme_ha);
	return false;
	}
	//===========
	if($text == "مدیریت" && $command == "home"){
	step("manager");
	sendMessage($chat_id,"لطفا یک زیرشاخه را انتخاب کنید:","","",$button_official);
	return false;
	}
	//===========
	if($text == "حساب کاربری ربات" && $command == "manager"){
	sendMessage($chat_id,"ربات کاملا رایگان است.","","",$button_official);
  }
  //===========
  if($text == "دستیار کانال" && $command == "manager"){
	step("s2kal");
	sendMessage($chat_id,"آیدی کانال خود را ارسال کنید

- ربات باید حتما ادمین کانال باشد
- آیدی حتما باید با @ شروع شود
- نمونه : @Source_Home","","",$button_back);
	}
	if($command == "s2kal"){
  save("other/$from_id/command.txt","s2kal2");
  step("s2kal2");
  save("other/user/$from_id/wait.txt",$text);
	sendMessage($chat_id,"مطلب خود را ارسال کنید","","",$button_back);
  }
  /*
اوپن شده در سورس خونه
کانال ما @Source_Home
*/
  if($command == "s2kal2"){
  step("manager");
	sendMessage($chat_id,"متن شما در صف ارسال قرار گرفت.","","",$button_official);
			if($forward_from != null){
			ForwardMessage($wait,$admin,$message_id);
			}
			$button = null;
			if($text != null){
	sendMessage($wait,$text,'html','true',$button);
	}else{
	SendPhoto($wait,$photo0_id,$caption,$button);
	SendPhoto($wait,$photo1_id,$caption,$button);
	SendPhoto($wait,$photo2_id,$caption,$button);
	SendDocument($wait,$file_id,$caption,$button);
	SendAudio($wait,$music_id,$caption,$button);
	SendVoice($wait,$voice_id,$caption,$button);
	SendVideo($wait,$video_id,$caption,$button);
	SendSticker($wait,$sticker_id);
  unlink("other/user/$from_id/wait.txt");
  }
  return false;
  }
	//===========
$button_send = json_encode(['keyboard'=>[
[['text'=>"ارسال در خبرنامه"],
['text'=>"ارسال در کانال"]],
[['text'=>"ارسال به همه اعضا"],
['text'=>"ارسال به همه گروه ها"]],
[['text'=>"صف ارسال"],
['text'=>"ارسال به کاربر"]],
[['text'=>"خبرنامه جدید"],
['text'=>"حذف خبرنامه"]],
[['text'=>"برگشت"],['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]);
	if($text == "ارسال" && $command == "manager"){
	step("menusend2all");
	sendMessage($chat_id,"لطفا یک زیرشاخه را انتخاب کنید:","","",$button_send);
	}
	//===========
  if($text == "ارسال در کانال" && $command == "menusend2all"){
	step("s2chh");
	sendMessage($chat_id,"آیدی کانال خود را ارسال کنید

- ربات باید حتما ادمین کانال باشد
- آیدی حتما باید با @ شروع شود
- نمونه : @Source_Home","","",$button_back);
	}
	if($command == "s2chh"){
	step("s2ch2");
  save("other/user/$from_id/wait.txt",$text);
	sendMessage($chat_id,"مطلب خود را ارسال کنید","","",$button_back);
  }
  if($command == "s2ch2"){
  step("menusend2all");
	sendMessage($chat_id,"متن شما در صف ارسال قرار گرفت.","","",$button_send);
			if($forward_from != null){
			ForwardMessage($wait,$admin,$message_id);
			}
			$button = null;
			if($text != null){
	sendMessage($wait,$text,'html','true',$button);
	}else{
	SendPhoto($wait,$photo0_id,$caption,$button);
	SendPhoto($wait,$photo1_id,$caption,$button);
	SendPhoto($wait,$photo2_id,$caption,$button);
	SendDocument($wait,$file_id,$caption,$button);
	SendAudio($wait,$music_id,$caption,$button);
	SendVoice($wait,$voice_id,$caption,$button);
	SendVideo($wait,$video_id,$caption,$button);
	SendSticker($wait,$sticker_id);
  unlink("other/user/$from_id/wait.txt");
  }
  return false;
  }
	//===========
  if($text == "ارسال به همه گروه ها" && $command == "menusend2all"){
	step("s2agp");
	sendMessage($chat_id,"لطفا مطلب مورد نظر را در قالب متن، تصویر یا فایل ارسال کنید.

توجه: برای جلوگیری از بلاک شدن بات خود بهتر است مطالب را به خبرنامه ارسال کنید تا کاربران بتوانند به جای بلاک کردن از لغو عضویت استفاده کنند.","html","true",$button_back);
	}
	if($command == 's2agp'){
	step("menusend2all");
	sendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","","",$button_send);
	$all_member = fopen("other/access/Group.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($sticker_id != null){
			SendSticker($user,$sticker_id);
			}
			if($video_id != null){
			SendVideo($user,$video_id,$caption);
			}
			if($voice_id != null){
			SendVoice($user,$voice_id,'',$caption);
			}
			if($file_id != null){
			SendDocument($user,$file_id,'',$caption);
			}
			if($music_id != null){
			SendAudio($user,$music_id,'',$caption);
			}
			if($photo2_id != null){
			SendPhoto($user,$photo2_id,'',$caption);
			}
			if($photo1_id != null){
			SendPhoto($user,$photo1_id,'',$caption);
			}
			if($photo0_id != null){
			SendPhoto($user,$photo0_id,'',$caption);
			}
			if($forward_from != null){
			ForwardMessage($user,$admin,$message_id);
			}
			if($text != null){
			sendMessage($user,$text,"html","true");
			}
			return false;
		}
		}
	//===========
	if($text == "ارسال به همه اعضا" && $command == "menusend2all"){
	step("s2a");
	sendMessage($chat_id,"لطفا مطلب مورد نظر را در قالب متن، تصویر یا فایل ارسال کنید.

توجه: برای جلوگیری از بلاک شدن بات خود بهتر است مطالب را به خبرنامه ارسال کنید تا کاربران بتوانند به جای بلاک کردن از لغو عضویت استفاده کنند.","","",$button_back);
	}
	if($command == 's2a'){
	step("menusend2all");
	sendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","","",$button_send);
	    foreach(glob('data/user/*') as $dir){
	        if(is_dir($dir)){
	            $user = pathinfo($dir)['filename'];
			if($sticker_id != null){
			SendSticker($user,$sticker_id);
			}
			if($video_id != null){
			SendVideo($user,$video_id,$caption);
			}
			if($voice_id != null){
			SendVoice($user,$voice_id,'',$caption);
			}
			if($file_id != null){
			SendDocument($user,$file_id,'',$caption);
			}
			if($music_id != null){
			SendAudio($user,$music_id,'',$caption);
			}
			if($photo2_id != null){
			SendPhoto($user,$photo2_id,'',$caption);
			}
			if($photo1_id != null){
			SendPhoto($user,$photo1_id,'',$caption);
			}
			if($photo0_id != null){
			SendPhoto($user,$photo0_id,'',$caption);
			}
			if($forward_from != null){
			ForwardMessage($user,$admin,$message_id);
			}
			if($text != null){
			sendMessage($user,$text,"html","true");
		       }
		     }
		  }
		}
	//===========
	if($text == "ارسال به کاربر" && $command == "menusend2all"){
	step("send user");
	sendMessage($chat_id,"لطفا نام کاربری یا نام گروه مورد نظر را ارسال کنید.

نام کاربری حتما باید با @ شروع شود.","","",$button_back);
	}
	if($command == "send user"){
	step("send user2");
	if($forward_from != null){
	save("other/user/$from_id/id.txt",$forward_from_id);
	}else{
	save("other/user/$from_id/id.txt",$text);	
	}
	sendMessage($chat_id,"پیام مورد نظر را ارسال کنید","","",$button_back);
	}
	if($command == "send user2"){
	step("menusend2all");
	sendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","html","true",$button_send);
	$user = $iduser;
	if($user != null){
		
	if($forward_from != null){
	ForwardMessage($user,$chat_id,$message_id);
	}
	if($video_id != null){
	SendVideo($user,$video_id,$caption);
	}
	if($voice_id != null){
	SendVoice($user,$voice_id,$caption);
	}
	if($file_id != null){
	SendDocument($user,$file_id,$caption);
	}
	if($music_id != null){
	SendAudio($user,$music_id,$caption);
	}
	if($photo2_id != null){
	SendPhoto($user,$photo2_id,$caption);
	}
	if($photo1_id != null){
	SendPhoto($user,$photo1_id,$caption);
	}
	if($photo0_id != null){
	SendPhoto($user,$photo0_id,$caption);
	}
	if($text != null){
	sendMessage($user,$text,"html","true");
	}
	if($sticker_id != null){
	SendSticker($user,$sticker_id);
	}
	return false;
	}else{
	sendMessage($chat_id,"نام کاربری مورد نظر یافت نشد.","","",$button_send);
	}
	}
	//============
	if($text == "صف ارسال" && $command == "menusend2all"){
	sendMessage($chat_id,"صف ارسال خالی است.","","",$button_send);
	}
	//===========
	if(($text == "ارسال در خبرنامه" || $text == "خبرنامه جدید" || $text == "حذف خبرنامه") && $command == "menusend2all"){
	sendMessage($chat_id,"این بخش در آپدیت های بعدی فعال خواهد شد!","","",$button_send);
	}
	//===========
	if($text == "مطالب دریافتی از کاربران" && $command == "manager"){
	SendMessage($chat_id,"برای مشاهده مطالب دریافت شده از کاربران مسیر زیر را دنبال کنید.
مدیریت - دکمه ها - دکمه مورد نظر - مشاهده مطالب","","",$button_official);
	}
	//============
	if($text == "مدیریت گروه" && $command == "manager"){
	sendMessage($chat_id,"این بخش در آپدیت های بعدی فعال خواهد شد!","","",$button_official);
	}
	//===========
	if($text == "پشتیبانی" && $command == "manager"){
	sendMessage($chat_id,"خطایی در اتصال به سرور پشتیبانی رخ داد.","","",$button_back);
	}
	//===========
	if($text == "چت" && $command == "manager"){
	step("chat");
	SendMessage($chat_id,"لطفا نام کاربری یا نام گروه مورد نظر را ارسال کنید.

نام کاربری حتما باید با @ شروع شود.","","",$button_back);
	}
	$button_left_chat = json_encode(['keyboard'=>[
	[['text'=>"پایان گفتگو"]],
	],'resize_keyboard'=>true]);
	if($command == "chat"){
	step("chat2");
	save("other/user/$text/command.txt","chat2");
	if($forward_from != null){
	save("other/user/$from_id/id.txt",$forward_from_id);
	}else{
	save("other/user/$from_id/id.txt",$text);	
	}
	SendMessage($chat_id,"شما در حال گفتگو هستید.","","",$button_left_chat);
	SendMessage($text,"شما در حال گفتگو با مدیران هستید.","","",$button_left_chat);
	}
	}
	if($command == "chat2"){
	if($text == "پایان گفتگو"){
	step("manager");
	SendMessage($chat_id,"گفتگو پایان یافت.","","",$button_official);
	return false;
	}
	if($chat_id == $admin){
	$user = $iduser;
	}else{
	$user = $admin;
	}
	if($user != ""){
	if($forward_from != null){
	ForwardMessage($user,$chat_id,$message_id);
	}
	elseif($video_id != null){
	SendVideo($user,$video_id,$caption);
	}
	elseif($voice_id != null){
	SendVoice($user,$voice_id,$caption);
	}
	elseif($file_id != null){
	SendDocument($user,$file_id,$caption);
	}
	elseif($music_id != null){
	SendAudio($user,$music_id,$caption);
	}
	elseif($photo2_id != null){
	SendPhoto($user,$photo2_id,$caption);
	}
	elseif($photo1_id != null){
	SendPhoto($user,$photo1_id,$caption);
	}
	elseif($photo0_id != null){
	SendPhoto($user,$photo0_id,$caption);
	}
	elseif($text != null){
	SendMessage($user,$text,"html","true");
	}
	elseif($sticker_id != null){
	SendSticker($user,$sticker_id);
	}
	}else{
	SendMessage($chat_id,"نام کاربری مورد نظر یافت نشد.","html","true",$button_official);
	}
	}
	if($from_id == $admin && $type == "private" || in_array($from_id,$admins) && $type == "private"){
	$vaziatdokmedar = file_get_contents("other/namayeshdokmehagp.txt");
	$vaziatdokmedar = $vaziatdokmedar ? $vaziatdokmedar : "empty";
	if($vaziatdokmedar=="empty"){$vaziatdokmedark="دکمه ها در گروه نمایش داده شود.";$vaziatdokmedark2="دکمه ها در گروه ها نمایش داده نمی شود.";}
	if($vaziatdokmedar=="ok"){$vaziatdokmedark="دکمه ها در گروه نمایش داده نشود.";$vaziatdokmedark2="دکمه ها در گروه ها نمایش داده می شود.";}
	$button_setting = json_encode(['keyboard'=>[
[['text'=>"$vaziatdokmedark"]],
[['text'=>'تعیین امضا']],
[['text'=>'تعیین متن نظرات']],
[['text'=>'تغییر متن برگشت']],
[['text'=>'تنظیمات پاسخ سریع']],
[['text'=>'فقل تمام دکمه ها']],
[['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
	if($text == "تنظیمات" && $command == "manager"){
	step("settings");
	sendMessage($chat_id,"از این بخش می توانید تنظیمات اصلی ربات را مشخص کنید.

تنظیمات کنونی نمایش :
$vaziatdokmedark2","","",$button_setting);
	}
	//===========
	if($text == "$vaziatdokmedark" && $command == "settings"){
	if($vaziatdokmedar == "empty"){
	$vaziatdokmedark = "دکمه ها در گروه نمایش داده نشود.";
	save("other/namayeshdokmehagp.txt","ok");
	}
	if($vaziatdokmedar == "ok"){
	$vaziatdokmedark = "دکمه ها در گروه نمایش داده شود.";
	save("other/namayeshdokmehagp.txt","empty");
	}
	sendMessage($chat_id,"تنظیمات نمایش دکمه ها در گروه بروزآوری شد.",'','',json_encode(['keyboard'=>[
[['text'=>"$vaziatdokmedark"]],
[['text'=>"تعیین امضا"]],
[['text'=>"تعیین متن نظرات"]],
[['text'=>"تغییر متن برگشت"]],
[['text'=>"تنظیمات پاسخ سریع"]],
[['text'=>"فقل تمام دکمه ها"]],
[['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]));
	}
	//===========
	if($text == "تعیین امضا" && $command == "settings"){
	step("set text emza");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_emza
","","",$button_back);
	}
	if($command == 'set text emza'){
	if($text != null){
	$size = strlen($text);
	if($size <= 30){
	step("settings");
	save("other/setting/emza.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_setting);
	}else{
	sendMessage($chat_id,"حداکثر 30 حرف مجاز است","","",$button_back);
	}
	}
	}
	//===========
	if($text == "تعیین متن نظرات" && $command == "settings"){
	step("set text nazar");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_nazar
","","",$button_back);
	}
	if($command == 'set text nazar'){
	if($text != null){
	$size = strlen($text);
	if($size <= 30){
	step("settings");
	save("other/setting/nazar.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_setting);
	}else{
	sendMessage($chat_id,"حداکثر 30 حرف مجاز است","","",$button_back);
	}
	}
	}
	//===========
	$button_edit_key_bak = json_encode(['keyboard'=>[
	[['text'=>"تغییر متن بازگشت"]],
	[['text'=>"تغییر متن پس از برگشت"]],
	[['text'=>"برگشت"],['text'=>"بازگشت به منوی اصلی"]],
	],'resize_keyboard'=>true]);
	if($text == "تغییر متن برگشت" && $command == "settings"){
	step("_edit_key_bak");
	sendMessage($chat_id,"لطفا یک زیرشاخه را انتخاب کنید:","","",$button_edit_key_bak);
	}
	//===========
	if($text == "تغییر متن بازگشت" && $command == "_edit_key_bak"){
	step("set text back");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_back
","","",$button_back);
	}
	if($command == 'set text back'){
	step("_edit_key_bak");
	if($text != null){
	save("other/setting/back.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_edit_key_bak);
	}
	}
	//=============
	if($text == "تغییر متن پس از برگشت" && $command == "_edit_key_bak"){
	step("set text backk");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_backk
","","",$button_back);
	}
	if($command == 'set text backk'){
	step("_edit_key_bak");
	if($text != null){
	save("other/setting/backk.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_edit_key_bak);
	}
	}
	//=============
	$button_lock_quickreply = json_encode(['keyboard'=>[
	[['text'=>"برگشت"],['text'=>"بازگشت به منوی اصلی"]],
	],'resize_keyboard'=>true]);
	if($text == "تنظیمات پاسخ سریع" && $command == "settings"){
	sendMessage($chat_id,"بزودی..","","",$button_lock_quickreply);
	}
	//=============
	$button_lock_bot = json_encode(['keyboard'=>[
	[['text'=>'بدون قفل']],
	[['text'=>'عضویت در کانال']],
	[['text'=>"برگشت"],['text'=>"بازگشت به منوی اصلی"]],
	],'resize_keyboard'=>true]);
	if($text == "فقل تمام دکمه ها" && $command == "settings"){
	step("_lock_bot");
	sendMessage($chat_id,"لطفا نوع قفل را مشخص کنید.

قفل کنونی: بدون قفل","","",$button_lock_bot);
	}
	if($text == "بدون قفل" && $command == "_lock_bot"){
	unlink("other/setting/channel_lock.txt");
	unlink("other/setting/txt_join.txt");
	sendMessage($chat_id,"قفل عمومی حذف شد.","","",$button_lock_bot);
	}
	if($text == "عضویت در کانال" && $command == "_lock_bot"){
	step("channel-lock");
	SendMessage($chat_id,"لیست کانال یا کانال های مورد نظر را ارسال کنید.

نام کانال باید با @ شروع شود.
نام هر کانال در یک خط وارد شود.

در صورتی که کانال شما نام کاربری عمومی ندارد، لطفا یک متن از آن را در اینجا Forward کنید.","","",$button_back);
	}
	if($command == "channel-lock"){
	step("channel-lock2");
	$getMe = json_decode(file_get_contents("https://api.telegram.org/bot$TOKEN/getMe"));
	$id = $getMe->result->id;
	$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$TOKEN/getChatMember?chat_id=$text&user_id=$id"));
	$tch = $truechannel->result->status;
	if($tch != 'administrator'){
	SendMessage($chat_id,"لیست کانال های مشخص شده: 

$text (ظاهرا این ربات مدیر این کانال نیست)


لطفا متنی را مشخص کنید که در زمان قفل بودن ربات نمایش داده شود.

در صورتی که بخواهید می توانید متن از یک کانال دیگر نیز Forward کنید.
در زمان اجرای دستور، در صورتی که ربات مدیر کانال نباشد با متن 'خطایی در بررسی اطلاعات رخ داد' مواجه می شود.","","",$button_back);
	}else{
	save("other/setting/channel_lock.txt",$text);
	sendMessage($chat_id,"لیست کانال های مشخص شده: 

$text


لطفا متنی را مشخص کنید که در زمان قفل بودن ربات نمایش داده شود.

در صورتی که بخواهید می توانید متن از یک کانال دیگر نیز Forward کنید.
در زمان اجرای دستور، در صورتی که ربات مدیر کانال نباشد با متن 'خطایی در بررسی اطلاعات رخ داد' مواجه می شود.","","",$button_back);
	}
	}
	if($command == 'channel-lock2'){
	step("_lock_bot");
	save("other/setting/txt_join.txt",$text);
	sendMessage($chat_id,"از این پس برای استفاده از این ربات حتما باید عضو کانال(های) ذکر شده باشند.","","",$button_lock_bot);
	}
	//===========
	if($text == "آمار" && $command == "manager"){
	$txtt = file_get_contents('other/access/Group.txt');
	$member_id = explode("\n",$txtt);
	$groups = count($member_id) -1;
	$txttttban = file_get_contents('other/access/Block-List.txt');
	$member_id111ban = explode("\n",$txttttban);
	$blockeds = count($member_id111ban) -1;
	$members = 0;
	foreach(glob('data/user/*') as $dir){
	    if(is_dir($dir)){
	        $members++;
	    }
	}
 sendMessage($chat_id,"تعداد کل اعضا: $members
تعداد اعضای اضافه شده امروز: 0
تعداد اعضای اضافه شده دیروز: 0
   ----
تعداد گروه های عضو شده: $groups
   ----
تعداد افراد بلاک شده: $blockeds");
	}
	//===========
	$button_pasokh = json_encode(['keyboard'=>[
[['text'=>'اضافه کردن'],['text'=>'حذف کردن']],
[['text'=>'دریافت فایل Excel'],['text'=>'ارسال فایل Excel']],
[['text'=>'حذف همه کلمات'],['text'=>'برگشت']],
[['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
	if($text == "پاسخ سریع" && $command == "manager"){
	step("menuquickreply");
	sendMessage($chat_id,"از این بخش می توانید کلمات و جواب های آماده برای آنها مشخص کنید.
اگر بخواهید بیشتر از یک جواب مشخص کنید آن را با علامت کاما جدا کنید تا بصورت تصادفی یکی از جواب ها ارسال شود.

مثال1:
 نام کلمه: سلام
پاسخ: درود

مثال2:
نام کلمه: خوبی؟
پاسخ: بد نیستم، خدا را شکر، اره
راهنمای ثبت انبوه:
اگر تعداد کلمات شما زیاد است به شکل زیر آنها را ارسال کنید.
کلمه 1
جواب 1
کلمه 2
جواب2, جواب بعدی
کلمه 3
جواب 3","","",$button_pasokh);
	}
	//===========
	if($text == "اضافه کردن" && $command == "menuquickreply"){
	step("set word");
	sendMessage($chat_id,"به چه کلمه ای باید پاسخ داده شود؟","","",$button_back);
	}
	if($command == 'set word'){
	if($text != null){
	step("set word2");
	save("other/user/$from_id/wait.txt","$text");
	sendMessage($chat_id,"چه پاسخی داده شود؟

برای انتخاب تصادفی می توانید بین کلمات از کاما استفاده کنید.","","",$button_back);
	}
	}
	if($command == 'set word2'){
	step("menuquickreply");
	save("other/quickreply/$wait.txt",$text);
	$str = str_replace("//pass","[['text'=>'$wait']],
//pass",$class);
	save("class.php",$str);
	sendMessage($chat_id,"پیغام با موفقیت ثبت شد.","html",'',$button_pasokh);
	return false;
	}
	//===========
	if($text == "حذف کردن" && $command == "menuquickreply"){
	step("del word");
	sendMessage($chat_id,"یک کلمه جهت حذف انتخاب کنید.","","",$button_pasokh_sarih);
	}
	if($command == 'del word'){
	step("menuquickreply");
	unlink("other/quickreply/$text.txt");
	$str = str_replace("[['text'=>'$text']],","",$class);
	save("class.php",$str);
	sendMessage($chat_id,"کلمه مورد نظر از لیست حذف شد.","","",$button_pasokh);
	return false;
	}
	//=============
	if($text == "حذف همه کلمات" && $command == "menuquickreply"){
	step("deletallquickreply");
	sendMessage($chat_id,"آیا از حذف تمام کلمات مطمعا هستید؟","","",json_encode(['keyboard'=>[
[['text'=>"حذف"],['text'=>"برگشت"]],
[['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]));
	}
	if($command == "deletallquickreply" && $text == "حذف"){
	step("menuquickreply");
	$files = glob("other/quickreply/*");
	foreach($files as $name){
	$name = str_replace(["other/quickreply/",".txt"],"",$name);
	DeleteFolder("other/quickreply");
	$str = str_replace("[['text'=>'$name']],","",$class);
	save("class.php",$str);
	}
	sendMessage($chat_id,"کلمات مورد نظر از لیست حذف شدند.","","",$button_pasokh);
	return false;
	}
	//=============
	$button_pm = json_encode(['keyboard'=>[
	[['text'=>"شروع"],['text'=>"متن پیش فرض"]],
	[['text'=>"شخصی عضو گروه شود"],['text'=>"شخصی عضو گروه شودPV"]],
	[['text'=>"عضو گروه شدن"],['text'=>"شخصی از گروه خارج شود"]],
	[['text'=>"عنوان گروه تغییر کند"],['text'=>"تصویر گروه تغییر کند"]],
	[['text'=>"برگشت"],['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]);
	if($text == "پیغام ها" && $command == "manager"){
	step("menupeyghamha");
	sendMessage($chat_id,"لطفا نوع پیغام را جهت تغییر مشخص کنید:

 شروع: نمایش جمله ای که پس از زدن بروی دکمه START نمایش داده شود.
متن پیش فرض: در صورتی که دستور ارسالی کاربر یافت نشود این متن به او ارسال می شود.
شخصی عضو گروه شود: پس از اینکه شخصی در گروهی که ربات در آن وجود دارد عضو شد پیغام خاصی در گروه ارسال کند
شخصی عضو گروه شودPV: پس از اینکه شخصی در گروهی که ربات در آن وجود دارد عضو شد پیغام خاصی به طور مستقیم به شخص ارسال کند.
عضو گروه شدن: پس از اینکه ربات به گروهی عضو شد پیغام خاصی به گروه ارسال کند.
شخصی از گروه خارج شود: پس از اینکه شخصی از گروهی که ربات در آن است خارج شود این پیغام در گروه ارسال می شود.
عنوان گروه تغییر کند: پس از تغییر عنوان گروه متن مشخص شده به گروه ارسال می شود.
تصویر گروه تغییر کند: پس از تغییر عنوان گروه متن مشخص شده به گروه ارسال می شود.",'','',$button_pm);
	}
	//=============
	if($text == "شروع" && $command == "menupeyghamha"){
	step("set text start");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_start
","","",$button_back,"not");
	}
	if($command == 'set text start'){
	step("menupeyghamha");
	if($text != null){
	save("other/setting/start.txt",$text);
	unlink("other/setting/start2.txt");
	unlink("other/setting/start3.txt");
	}
	if($sticker_id != null){
	save("other/setting/start2.txt",$sticker_id);
	save("other/setting/start.txt"," ");
	unlink("other/setting/start3.txt");
	}
	if($video_id != null){
	save("other/setting/start.txt"," ");
	save("other/setting/start2.txt",$video_id);
	}
	if($voice_id != null){
	save("other/setting/start.txt"," ");
	save("other/setting/start2.txt",$voice_id);
	}
	if($file_id != null){
	save("other/setting/start.txt"," ");
	save("other/setting/start2.txt",$file_id);
	}
	if($music_id != null){
	save("other/setting/start.txt"," ");
	save("other/setting/start2.txt",$music_id);
	}
	if($photo2_id != null){
	save("other/setting/start.txt"," ");
	save("other/setting/start2.txt",$photo2_id);
	}
	if($photo1_id != null){
	save("other/setting/start.txt"," ");
	save("other/setting/start2.txt",$photo1_id);
	}
	if($photo0_id != null){
	save("other/setting/start.txt"," ");
	save("other/setting/start2.txt",$photo0_id);
	}
	if($caption != null){
	save("other/setting/start3.txt",$caption);
	}
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_pm);
	}
	//=============
	if($text == "متن پیش فرض" && $command == "menupeyghamha"){
	step("set text pish");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_send
","","",$button_back,"not");
	}
	if($command == 'set text pish'){
	step("menupeyghamha");
	if($text != null){
	save("other/setting/send.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_pm);
	}
	}
	//=============
	if($text == "شخصی عضو گروه شود" && $command == "menupeyghamha"){
	step("set text gap");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_startgap
","","",$button_back,"not");
	}
	if($command == 'set text gap'){
	step("menupeyghamha");
	if($text != null){
	save("other/setting/gap_start.txt","$text");
	}
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_pm);
	}
	//=============
	if($text == "شخصی عضو گروه شودPV" && $command == "menupeyghamha"){
	step("set text pish");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_startgap2
","","",$button_back,"not");
	}
	if($command == 'set text pish'){
	step("menupeyghamha");
	if($text != null){
	save("other/setting/startgap2.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_pm);
	}
	}
	//=============
	if($text == "عضو گروه شدن" && $command == "menupeyghamha"){
	step("set text botjoingap");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_botjoingap
","","",$button_back,"not");
	}
	if($command == 'set text botjoingap'){
	step("menupeyghamha");
	if($text != null){
	save("other/setting/botjoingap.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_pm);
	}
	}
	//=============
	if($text == "شخصی از گروه خارج شود" && $command == "menupeyghamha"){
	step("set text leftgap");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_leftgap
","","",$button_back,"not");
	}
	if($command == 'set text leftgap'){
	step("menupeyghamha");
	if($text != null){
	save("other/setting/leftgap.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_pm);
	}
	}
	//=============
	if($text == "عنوان گروه تغییر کند" && $command == "menupeyghamha"){
	step("set text gaptitle");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_gaptitle
","","",$button_back,"not");
	}
	if($command == 'set text gaptitle'){
	step("menupeyghamha");
	if($text != null){
	save("other/setting/gaptitle.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_pm);
	}
	}
	//=============
	if($text == "تصویر گروه تغییر کند" && $command == "menupeyghamha"){
	step("set text gapphotoo");
	sendMessage($chat_id,"متن جدید را وارد کنید.

متن فعلی: $_gapphotoo
","","",$button_back,"not");
	}
	if($command == 'set text gapphotoo'){
	step("menupeyghamha");
	if($text != null){
	save("other/setting/gapphotoo.txt","$text");
	sendMessage($chat_id,"عبارت مورد نظر بروزآوری شد.","","",$button_pm);
	}
	}
	//=============
	if($text == "پشتیبان گیری" && $command == "manager"){
	sendMessage($chat_id,"این بخش در آپدیت های بعدی فعال خواهد شد!","","",$button_official);
	}
	//=============
	if($text == "دستورات" && $command == "manager"){
	sendMessage($chat_id,"این بخش در آپدیت های بعدی فعال خواهد شد!","","",$button_official);
	}
	//=============
	if($text == "ارسال مطلب" && $command == "manager"){
	step("adm keys tel");
	save("other/fgm.txt","start");
	sendMessage($chat_id,"لطفا یک گزینه را انتخاب کنید:","","",$button_dokme_adm);
	return false;
	}
	//===========
	if($text == "دکمه ها" && $command == "manager"){
	step("adm keys tel");
	save("other/fgm.txt","start");
	sendMessage($chat_id,"شما درحال ویرایش دکمه ها هستید.","","",$button_dokme_adm);
	return false;
	}
	//===========
function Dedicatedlink(){
$lenght = 30;
$all_letters = "aed1234567890";
$result = '';
for($i = 0;$i < $lenght;$i++){
$rand = rand(0,strlen($all_letters)-1);
$result .= substr($all_letters, $rand, 1);
}
return $result;
}
function setLink($text,$ubs){
$commend3 = json_decode(file_get_contents("other/button/commend.txt"),true);
$commend3[$ubs] = $text;
$json = json_encode($commend3,true);
file_put_contents("other/button/commend.txt",$json);
}
function Add_Button($id,$koja,$name){
	if (strpos($class , "'text'=>'$name'") !== false && is_dir("other/button/$name")) {
	sendMessage($chat_id,"شما قبلا دکمه ای با همین نام رزرو کرده اید. لطفا نام دیگری انتخاب کنید.","","",$button_back);
	}else{
	step("adm keys tel");
	if($id != null && $koja != null && $name != null){
	$hosein = file_get_contents("class.php");
	$Add_Button = str_replace(array("],//$id/$koja"),array(",['text'=>'$name']],//$id/$koja"),$hosein);
	save("class.php","$Add_Button");
	}
	}
}
	//===========
$button_dokme = $button_back;
$button_create = json_encode(['keyboard'=>[
[['text'=>'نمایش مطلب'],['text'=>'دریافت مطلب']],
[['text'=>'نمایش زیرشاخه ها'],['text'=>'نظرسنجی']],
[['text'=>'امتیاز دهی'],['text'=>'نمایش راهنما']],
[['text'=>'موزیک'],['text'=>'سرویس']],
[['text'=>'درخواست چت'],['text'=>'پیام رسانی']],
[['text'=>'خبرنامه'],['text'=>'یک دستور از قبل ذخیره شده']],
[['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
$makan = file_get_contents("other/makan.txt");
$adm_but1 = json_encode(['keyboard'=>[
[['text'=>'تغییر نام'],['text'=>'قفل دکمه']],
[['text'=>'تغییر مکان'],['text'=>'حذف دکمه']],
[['text'=>'اضافه کردن دستور'],['text'=>'تغییر توضیحات']],
[['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
$adm_but2 = json_encode(['keyboard'=>[
[['text'=>'تغییر نام'],['text'=>'قفل دکمه']],
[['text'=>'تغییر مکان'],['text'=>'حذف دکمه']],
[['text'=>"مدیریت زیرشاخه ها"],['text'=>"تغییر متن"]],
[['text'=>'اضافه کردن دستور'],['text'=>'تغییر توضیحات']],
[['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
$adm_but3 = json_encode(['keyboard'=>[
[['text'=>'تغییر نام'],['text'=>'قفل دکمه']],
[['text'=>'تغییر مکان'],['text'=>'حذف دکمه']],
[['text'=>'افزودن مطلب'],['text'=>'تعیین مطلب']],
[['text'=>'اضافه کردن دستور'],['text'=>'تغییر توضیحات']],
[['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
	//===========
$nk = file_get_contents("other/button/nameK.txt");
$in = "class.php";
$dastor = "تعریف نشده";
if(is_dir("other/button/$text")){
$feed = file_get_contents("other/button/$text/feed.txt");
$news = file_get_contents("other/button/$text/news.txt");
$pmresni = file_get_contents("other/button/$text/pmresani.txt");
$chat = file_get_contents("other/button/$text/chat.txt");
$music = file_get_contents("other/button/$text/music.txt");
$cr = file_get_contents("other/button/$text/cr.txt");
$nama = file_get_contents("other/button/$text/nama.txt");
$nama2 = file_get_contents("other/button/$text/nama2.txt");
$daryaft = file_get_contents("other/button/$text/daryaft.txt");
$zirmenu = file_get_contents("other/button/$text/zirmenu.txt");
$nazar = file_get_contents("other/button/$text/nazar.txt");
$etebar = file_get_contents("other/button/$text/etebar.txt");
$help = file_get_contents("other/button/$text/help.txt");
$Dedicatedlink = file_get_contents("other/button/$text/Dedicatedlink.txt");
}
$fgm = file_get_contents("other/fgm.txt");
	//===========
	if(strpos($text,"دکمه جدید") !== false){
	$newmakan = str_replace("دکمه جدید",'',$text);
	$newmakan = str_replace(array("10","11","12","13","14","15","16","17","18","19","20"),array("+10","+11","+12","+13","+14","+15","+16","+17","+18","+19","+20"),$newmakan);
	save("other/makan.txt",$newmakan);
	sendMessage($chat_id,"وقتی روی این دکمه زدن چه کاری انجام بشه؟

راهنمای نوع دستورات:
نمایش مطلب: نمایش یک مطلب به کاربر
دریافت مطلب: دریافت مطلب از کاربر
نمایش زیرشاخه ها: نمایش لیست دیگری از دستورات (جهت دسته بندی و جلوگیری از زیاد شدن دکمه ها در یک صفحه)
نظرسنجی: نمایش لیست دکمه ها برای ثبت نظر کاربران
امتیاز دهی: نمایش لیست دکمه ها برای مشخص کردن امتیاز کلی
نمایش راهنما: نمایش متن راهنما براساس دستوراتی که با / شروع می شوند
موزیک: دسترسی سریع به ترانه ها
سرویس: اجرای یک سرویس
درخواست چت: کاربر درخواستی برای چت با مدیر ارسال می کند.
پیام رسانی: ارتباط سریع تر با کاربران ربات
خبرنامه: عضویت یا لغو عضویت از خبرنامه
یک دستور از قبل ذخیره شده: در صورتی که دستوری را قبلا ذخیره کرده اید که به دلیل تغییرات حذف شده از این بخش آن را بازیابی کنید.","","",$button_create);
	}
	//===========
	if($text == "نمایش مطلب"){
	step("nma");
	$button_nma = json_encode(['keyboard'=>[
[['text'=>"مطالب دستی"],['text'=>"آدرس RSS"],['text'=>"اینستاگرام"]],
[['text'=>"از یک سایت دیگر"],['text'=>"مطالب کاربران"],['text'=>"Excel"]],
[['text'=>"برگشت"],['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]);
	sendMessage($chat_id,"اطلاعات رو از کجا بگیره؟
راهنمای نوع محتوا:
مطالب دستی: مدیر باید لیستی از متن ها، عکس ها یا ... را ارسال کند تا یکی از آنها بصورت تصادفی انتخاب شود.
آدرس RSS: نمایش یکی از مطالبی که توسط RSS مشخص شده ثبت شده است.
اینستاگرام: نمایش یک عکس یا فیلم ارسال شده در صفحه اینستاگرام
از یک سایت دیگر: در صورتی که وب سایت مورد نظر از RSS پشتیبانی نمی کند لطفا آدرس و جزئیات را ارسال کنید تا پس از بررسی هزینه جهت ایجاد ارسال شود.
مطالب کاربران: نمایش مطالبی که توسط کاربران ارسال شده است.
Excel: نمایش محتوا از فایل Excel براساس متن ارسالی کاربر","","",$button_nma);
	}
	if($text == "مطالب دستی"){
	step("nma");
	$button_nma = json_encode(['keyboard'=>[
[['text'=>"به ترتیب ذخیره شده"],['text'=>"تصادفی"]],
[['text'=>"آخرین مطالب"],['text'=>"برگشت"]],
[['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]);
	sendMessage($chat_id,"مطلب به چه شکل نمایش داده شود؟

به ترتیب ذخیره شده: ارسال مطالب ذخیره شده به ترتیبی که مشخص می کنید.
تصادفی: ارسال یک متن تصادفی
آخرین مطالب: ارسال آخرین مطالب ذخیره شده","","",$button_nma);
	}
	if($text == "تصادفی" && $command == "nma"){
	step("nama2");
	sendMessage($chat_id,"اسم دکمه چی باشه؟
	
اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","","",$button_back);
	}
	if($command == 'nama2'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/nama2.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	setLink($text,$ubs);
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","html","true",$button_dokme);
	return false;
	}
	if($text == "به ترتیب ذخیره شده" && $command == "nma"){
	step("nama");
	sendMessage($chat_id,"اسم دکمه چی باشه؟
	
اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","html","true",$button_back);
	}
	if($command == 'nama'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/nama.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","html","true",$button_dokme);
	return false;
	}
	//===========
	if($text == "از یک سایت دیگر" && $command == "nma"){
	step("azyeksaitedige");
	sendMessage($chat_id,"لطفا ادرس صفحه وبی که از Rss پشتیبانی نمیکند را با جزئیات بفرستید تا پس از بررسی هزینه برای شما ارسال شود.","","",$button_back);
	}
	//===========
	if($command == "azyeksaitedige"){
	step("adm keys tel");
	sendMessage($chat_id,"درخواست شما ارسال شد. پس از بازبینی نتیجه برای شما ارسال خواهد شد.","","",$button_dokme);
	return false;
	}
	//===========
	if($text == "Excel" && $command == "nma"){
	sendMessage($chat_id,"این بخش بزودی برای شما فراهم خواهد شد.","","",$button_back);
	}
	//===========
	$ck = json_encode(['keyboard'=>[
[['text'=>'هر چیزی'],
['text'=>'هر متنی']],
[['text'=>'عکس'],
['text'=>'فیلم']],
[['text'=>'فایل صوتی'],
['text'=>'voice']],
[['text'=>'فایل'],
['text'=>'آدرس']],
[['text'=>'استیکر'],
['text'=>'آدرس اینترنتی']],
[['text'=>'اطلاعات تماس'],
['text'=>'شماره تماس']],
[['text'=>'شماره تماس واقعی کاربر'],
['text'=>'ایمیل']],
[['text'=>'عدد'],
['text'=>'غیر متنی']],
[['text'=>'لیست دلخواه']],
[['text'=>'برگشت'],['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
	$ck2 = json_encode(['keyboard'=>[
[['text'=>'هر چیزی'],
['text'=>'هر متنی']],
[['text'=>'عکس'],
['text'=>'فیلم']],
[['text'=>'فایل صوتی'],
['text'=>'voice']],
[['text'=>'فایل'],
['text'=>'آدرس']],
[['text'=>'استیکر'],
['text'=>'آدرس اینترنتی']],
[['text'=>'اطلاعات تماس'],
['text'=>'شماره تماس']],
[['text'=>'شماره تماس واقعی کاربر'],
['text'=>'ایمیل']],
[['text'=>'عدد'],
['text'=>'غیر متنی']],
[['text'=>'لیست دلخواه'],['text'=>"پایان"]],
[['text'=>'برگشت'],['text'=>'بازگشت به منوی اصلی']],
],'resize_keyboard'=>true]);
	if($text == 'دریافت مطلب'){
	step("daryaft013");
	sendMessage($chat_id,"می خوای داخل مرحله 1 چه نوع محتوایی از کاربر بگیری؟

هر چیزی: در این نوع هر عبارتی (مثلا متن، عکس، فیلم یا ...) که از سمت کاربر ارسال شود مورد تایید است.
هر متنی: در این نوع حتما باید متن ارسال شود و هر متنی مورد تایید است.
عکس: در این نوع حتما باید عکس ارسال شود.
فیلم: در این نوع حتما باید فیلم ارسال شود.
فایل صوتی: در این نوع حتما باید فایل صوتی ارسال شود.
voice: در این نوع حتما باید فایل بصورت voice ارسال شود
فایل: در این نوع حتما باید یک فایل ارسال شود.
آدرس: در این نوع حتما باید Location از برنامه تلگرام ارسال شود.
استیکر: در این نوع حتما باید استیکر ارسال شود.
آدرس اینترنتی: در این نوع محتوا باید یک آدرس اینترنتی ارسال شود.
اطلاعات تماس: در این نوع حتما باید از Share contact استفاده شود.
شماره تماس: در این نوع حتما باید متنی ارسال شود که ساختار صحیح شماره تلفن داشته باشد.
شماره تماس واقعی کاربر: در این نوع شماره تماس واقعی کاربر که پس از کسب اجازه دریافت می شود.
ایمیل: در این نوع حتما باید متنی ارسال شود که حتما ساختار یک آدرس ایمیل را داشته باشد.
عدد: در این نوع حتما باید متنی ارسال شود که بصورت عدد باشد.
غیر متنی: در این نوع محتوا باید محتوایی به جز متن ارسال شود. (مثلا عکس)
لیست دلخواه: در این نوع شما لیست را تعریف می کنید که کاربر حتما باید یکی از آنها را انتخاب کنید.


   کلمه TEXT با آخرین متن ارسالی کاربر جایگزین می شود.
   برای دریافت مطالب قبل تر مثلا پنج پیام قبلتر می توانید از TEXT_5 استفاده کنید.","","",$ck);
	}
	$darsad = json_decode(file_get_contents("other/user/$from_id/drsad.txt"),true);
	if($command == "daryaft013"){
	step("daryaft014");
	$darsad["noe"] = $text;
	$json = json_encode($darsad,true);
	file_put_contents("other/user/$from_id/drsad.txt",$json);
	sendMessage($chat_id,"یه عنوان کوتاه برای این خونه انتخاب کن.

از این عنوان داخل جستجو استفاده می شه.

مثال1: شماره موبایل
مثال2: اسم
مثال3: مدل گوشی","","",$button_back);
	}
	if($command == "daryaft014"){
	if($darsad["noe"] == "هرچیزی"){
	step("daryaft017");
	}else{
	step("daryaft015");
	}
	$darsad["title"] = $text;
	$json = json_encode($darsad,true);
	file_put_contents("other/user/$from_id/drsad.txt",$json);
	sendMessage($chat_id,"یه متن توضیحات بگو تا اون رو به عنوان سوال برای این نوع محتوا به کاربر نشون بدم.","","",$button_back);
	}
	if($command == "daryaft015"){
	step("daryaft017");
	$darsad["text"] = $text;
	$json = json_encode($darsad,true);
	file_put_contents("other/user/$from_id/drsad.txt",$json);
	sendMessage($chat_id,"اگه چیزی که کاربر فرستاده مورد تایید نبود چه متنی براش بفرستم؟
	
اگه ورودی کاربر درست باشه یا جمله پایانی براش نشون داده می شه یا متن توضیحات خونه بعدی براش نشون داده می شه","","",$button_back);
	}
	if($command == "daryaft016"){
	step("daryaft017");
	save("$nammasrei/error$mayuoi.txt",$text);
	sendMessage($chat_id,"اگه میخوای بازم به ساخت گزینه دیگه اقدام کنی لطفا یک نوع محتوا برای مرحله $mayuoi رو انتخاب کن یا بروی پایان کلیک کن.","","",$ck2);
	}
	if($command == 'daryaft017'){
	step("daryaft018");
	$darsad["error"] = $text;
	$json = json_encode($darsad,true);
	file_put_contents("other/user/$from_id/drsad.txt",$json);
	sendMessage($chat_id,"اسم دکمه چی باشه؟
	
اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","","",$button_back);
	}
	if($command == 'daryaft018'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/daryaft.txt","ok");
	file_put_contents("other/button/$text/noe1.txt",$darsad["noe"]);
	file_put_contents("other/button/$text/title1.txt",$darsad["title"]);
	file_put_contents("other/button/$text/text1.txt",$darsad["text"]);
	file_put_contents("other/button/$text/error1.txt",$darsad["error"]);
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	unlink("other/user/$from_id/drsad.txt");
	sendMessage($chat_id,"دکمه جدید ایجاد شد.
برای مشاهده مطالب دریافتی از کاربران یا تنظیمات دیگه بروی دکمه کلیک کن","","",$button_dokme);
	}
	//===========
	if($text == 'نمایش زیرشاخه ها'){
	step("zirmenu.txt");
	sendMessage($chat_id,"اسم دکمه چی باشه؟
	
اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","","",$button_back);
	}
	if($command == 'zirmenu.txt'){
	if (strpos($class , "'text'=>'$text'") !== false && is_dir("other/button/$text")) {
	sendMessage($chat_id,"شما قبلا دکمه ای با همین نام رزرو کرده اید. لطفا نام دیگری انتخاب کنید.","","",$button_back);
	}else{
	step("adm keys tel");
	$hosein = file_get_contents("class.php");
	$ind = str_replace("**NAME**","$text",file_get_contents("vers.txt"));
	$ind2 = str_replace("**NAME**","$text",file_get_contents("vers2.txt"));
	$Add_Button = str_replace(array("],//$fgm/$makan","//<buttonmenu>","//<buttonmenu2>"),array(",['text'=>'$text']],//$fgm/$makan","$ind"."\n"."//<buttonmenu>","$ind2"."\n"."//<buttonmenu2>"),$hosein);
	save("class.php","$Add_Button");
	mkdir("other/button/$text");
	save("other/button/$text/zirmenu.txt","ok");
	save("other/button/$text/answer1.txt","لطفا یک زیرشاخه را انتخاب کنید:");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	}
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای مشخص کردن زیرشاخه ها بروی دکمه ایجاد شده کلیک کن بعدا بروی مدیریت زیرشاخه ها کلیک کن
","","",$button_dokme);
	return false;
	}
	//===========
	if($text == 'سرویس'){
	$button_nma = json_encode(['keyboard'=>[
[['text'=>"ساخت ربات"],['text'=>"برگشت"]],
[['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]);
	step("createservicbop");
	sendMessage($chat_id,"لطفا یک زیرشاخه را انتخاب کنید:","","",$button_nma);
	}
	if($text == 'ساخت ربات' && $command == "createservicbop"){
	step("cr fr bot");
	sendMessage($chat_id,"اسم دکمه چی باشه؟

اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","html","true",$button_back);
	}
	if($command == 'cr fr bot'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/cr.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","html","true",$button_dokme);
	return false;
	}
	//===========
	if($text == 'موزیک'){
	step("mozik cr");
	sendMessage($chat_id,"اسم دکمه چی باشه؟

اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","","",$button_back);
	}
	if($command == 'mozik cr'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/music.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","","",$button_dokme);
	return false;
	}
	//===========
	if($text == 'درخواست چت'){
	step("chat fr");
	sendMessage($chat_id,"اسم دکمه چی باشه؟

اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","html","true",$button_back);
	}
	if($command == 'chat fr'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/chat.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","html","true",$button_dokme);
	return false;
	}
	//===========
	if($text == 'پیام رسانی'){
	step("pmresni dr");
	sendMessage($chat_id,"اسم دکمه چی باشه؟

اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","html","true",$button_back);
	}
	if($command == 'pmresni dr'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/pmresani.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","html","true",$button_dokme);
	return false;
	}
	//===========
	if($text == 'خبرنامه'){
	step("news");
	sendMessage($chat_id,"اسم دکمه چی باشه؟

اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","html","true",$button_back);
	}
	if($command == 'news'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/news.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","html","true",$button_dokme);
	return false;
	}
	//===========
	if($text == 'امتیاز دهی' || $text == 'نظرسنجی'){
	step("etb snj ctrrr");
	sendMessage($chat_id,"سوالی مطرح کنید که هنگام اعتبار سنجی پرسیده شود:","","",$button_back);
	}
	if($command == 'etb snj ctrrr'){
	step("etb snj ctrrr2");
	step("$text","win");
	sendMessage($chat_id,"حال گزینه های خود را مانند نمونه وارد کنید.
	
نمونه : 
خوب
متوسط
ضعیف","","",$button_back);
	}
	if($command == 'etb snj ctrrr2'){
	step("etb snj ctrrr20");
	if(strpos($text,"\n") !== false){
	$ex = explode("\n", $text);
	foreach($ex as $name){
	$button[] = [['text'=>"$name"]];
	}
	}else{
	$button[] = [['text'=>"$text"]];
	}
	$button[] = [['text'=>"بازگشت به منوی اصلی"]];
	$oki = json_encode(['keyboard'=>$button,'resize_keyboard'=>true]);
	step("$oki","win2");
	sendMessage($chat_id,"درپایان چه چیزی نمایش داده شود؟

متغییر MONSTPOINTS با تعداد بیشترین نظرات جایگزین خواهد شد.","","",$button_back);
	}
	if($command == 'etb snj ctrrr20'){
	step("etb snj cr");
	step("$text","win3");
	sendMessage($chat_id,"اسم دکمه چی باشه؟

اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","","",$button_back);
	}
	if($command == 'etb snj cr'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/etebar.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	$win = file_get_contents("other/user/$from_id/win.txt");
	$win2 = file_get_contents("other/user/$from_id/win2.txt");
	$win3 = file_get_contents("other/user/$from_id/win3.txt");
	save("other/button/$text/winquick.txt","$win");
	save("other/button/$text/winkey.txt","$win2");
	save("other/button/$text/winreply.txt","$win3");
	unlink("other/user/$from_id/win.txt");
	unlink("other/user/$from_id/win2.txt");
	unlink("other/user/$from_id/win3.txt");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","","",$button_dokme);
	return false;
	}
	//===========
	if($text == 'نمایش راهنما'){
	step("nmhelp cr");
	sendMessage($chat_id,"اسم دکمه چی باشه؟

اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","","",$button_back);
	}
	if($command == 'nmhelp cr'){
	Add_Button($fgm,$makan,$text);
	mkdir("other/button/$text");
	save("other/button/$text/help.txt","ok");
	$ubs = Dedicatedlink();
	save("other/button/$text/Dedicatedlink.txt","$ubs");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","","",$button_dokme);
	return false;
	}
	//===========
	if($text == 'یک دستور از قبل ذخیره شده'){
	step("stire as qbl cr");
	sendMessage($chat_id,"اسم دکمه چی باشه؟

اسم دکمه همان متنی است که بروی دکمه نمایش داده می شود که می تواند با / شروع نشود.
درصورتی که بخواهید برای این دکمه دستوری مشخص کنید که با / شروع شود پس از ایجاد دکمه می توانید این کار را انجام دهید.","","",$button_back);
	}
	if($command == 'stire as qbl cr'){
	step("adm keys tel");
	$hosein = file_get_contents("class.php");
	$Add_Button = str_replace(array("],//$fgm/$makan"),array(",['text'=>'$text']],//$fgm/$makan"),$hosein);
	save("class.php","$Add_Button");
	sendMessage($chat_id,"دکمه جدید ایجاد شد. 
برای اینکه بتونی تنظیمات دکمه رو مشخص کنی یا عملیات های دیگه انجام بدی بروی دکمه جدید که ساخته شده کلیک کن.
","","",$button_dokme);
	return false;
	}
	//===========
if($news != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: عضویت یا لغو عضویت از خبرنامه 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but1);
}
if($pmresni != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: ارتباط مستقیم با کاربران 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but1);
}
if($chat != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: چت با کاربران 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but1);
}
if($music != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: دسترسی سریعتر به ترانه ها 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but1);
}
if($cr != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: اجرای افزونه اختصاصی 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but1);
}
if($nazar != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: ثبت نظر کاربران 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but1);
}
if($etebar != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: مشخص کردن امتیاز کلی 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but1);
}
if($help != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: نمایش متن راهنما 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but1);
}
if($nama != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: نمایش مطلب به ترتیب ذخیره شده 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but3);
}
if($nama2 != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: نمایش مطلب تصادفی 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but3);
}
if($daryaft != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: دریافت مطالب از کاربران 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but4);
}
if($zirmenu != null && $command == "adm keys tel"){
save("other/button/nameK.txt","$text");
sendMessage($chat_id,"نام دکمه: $text
نام دستور: $dastor
لینک اختصاصی دکمه:
 https://telegram.me/$UserNameBot?start=$Dedicatedlink

عملکرد: دسته بندی دکمه ها 

لطفا عملیات مورد نظر را انتخاب کنید.",'','',$adm_but2);
}
	//===========
  if($text == "مدیریت زیرشاخه ها" && $command == "adm keys tel"){
	step("adm keys tel");
	save("other/fgm.txt","$nk");
	sendMessage($chat_id,"شما در حال ویرایش دسته \"$nk\" هستید.","","",json_encode(['keyboard'=>$button2[$nk],'resize_keyboard'=>true]));
	}
	if($text == "تغییر توضیحات" && $command == "adm keys tel"){
	step("tozihatosetmyun");
	sendMessage($chat_id,"لطفا متنی قرار دهید تا در توضیحات ListCommands قرار بگیرد","","",$button_back);
	}
	if($command == "tozihatosetmyun"){
	step("adm keys tel");
	$upset = json_decode(file_get_contents("other/button/listcommand.json"),true);
	$upset[$nk] = $text;
	$json = json_encode($upset,true);
	file_put_contents("other/button/listcommand.json",$json);
	sendMessage($chat_id,"متن جدید ذخیره شد.","","",$button_dokme);
	}
	//===========
	if($text == "تغییر متن" && $command == "adm keys tel"){
	step("editzirtextvb");
	sendMessage($chat_id,"لطفا مطلبی(عکس، فیلم یا...) بفرستید تا وقتی روی دکمه زدن نشون داده بشه","","",$button_back);
	}
	if($command == "editzirtextvb"){
	step("adm keys tel");
	$i = 1;
	if($text != null){
	save("other/button/$nk/answer$i.txt",$text);
	}
	if($sticker_id != null){
	save("other/button/$nk/answer$i.txt",$sticker_id);
	}
	if($video_id != null){
	save("other/button/$nk/answer$i.txt",$video_id);
	}
	if($voice_id != null){
	save("other/button/$nk/answer$i.txt",$voice_id);
	}
	if($file_id != null){
	save("other/button/$nk/answer$i.txt",$file_id);
	}
	if($music_id != null){
	save("other/button/$nk/answer$i.txt",$music_id);
	}
	if($photo2_id != null){
	save("other/button/$nk/answer$i.txt",$photo2_id);
	}
	if($photo1_id != null){
	save("other/button/$nk/answer$i.txt",$photo1_id);
	}
	if($photo0_id != null){
	save("other/button/$nk/answer$i.txt",$photo0_id);
	}
	if($caption != null){
	save("other/button/$nk/answer$i-2.txt",$caption);
	}
	sendMessage($chat_id,"متن جدید ذخیره شد.","","",$button_dokme);
	}
	//===========
  if($text == 'تغییر نام' && $command == "adm keys tel"){
	step("rename");
	sendMessage($chat_id,"نام جدید را وارد کنید:","","",$button_back);
	}
	if($command == 'rename'){
	if(!is_dir("other/button/$text")){
	step("adm keys tel");
	rename("other/button/$nk","other/button/$text");
	$rename = str_replace("$nk","$text",$class);
	save($in,$rename);
	save("other/button/nameK.txt",$rename);
	sendMessage($chat_id,"نام دکمه با موفقیت تغییر یافت","","",$button_dokme);
	}else{
	sendMessage($chat_id,"شما قبلا دکمه ای با همین نام ایجاد کرده اید. لطفا نام دیگری انتخاب کنید.","","",$button_back);
	}
	}
	//===========
	if($text == 'حذف دکمه' && $command == "adm keys tel"){
	step("delete");
	$pr = json_encode(['keyboard'=>[
[['text'=>"حذف"],['text'=>"برگشت"]],
[['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]);
	sendMessage($chat_id,"آیا از حذف دگمه مطمعا هستید؟
با حذف دکمه تمام مطالب ذخیره شده پاک خواهتد شد.","","",$pr);
	}
	if($command == 'delete'){
	if($text == "حذف"){
	step("adm keys tel");
	$delete = str_replace("'text'=>'$nk'","'text'=>''",$class);
	save($in,$delete);
	DeleteFolder("other/button/$nk");
	rmdir("other/button/$nk");
	unlink("other/button/nameK.txt");
	sendMessage($chat_id,"دکمه مورد نظر پاک شد.","","",$button_dokme);
	}
	if($text != "حذف" && $text != "برگشت" && $text != "بازگشت به منوی اصلی"){
	sendMessage($chat_id,$_send,"html","true",$pr);
	}
	}
	//===========
$btnlog = '{"keyboard":[[{"text":"↩️منوی اصلی"}],[{"text":"عضویت در کانال"},{"text":"بدون قفل"}],[{"text":"رمز ورود"},{"text":"زیر مجموعه گیری"}]],"resize_keyboard":true}';
	if($text == 'قفل دکمه' && $command == "adm keys tel"){
	sendMessage($chat_id,"این بخش در اپدیت بعدی فعال خواهد شد.");
	}
	if($text == 'بدون قفل' && $command == "adm keys tel"){
	sendMessage($chat_id,"صبر کنید...♻️","html",'',$btnlog);
	unlink("other/button/$nk/join.txt");
	unlink("other/button/$nk/join2.txt");
	unlink("other/button/$nk/password.txt");
	unlink("other/button/$nk/password2.txt");
	unlink("other/button/$nk/password3.txt");
	unlink("other/button/$nk/inv.txt");
	unlink("other/button/$nk/inv2.txt");
	sendMessage($chat_id,"❌ قفل دکمه با موفقیت پاک گردید!","html",'',$btnlog);
	}
	if($text == 'عضویت در کانال' && $command == "adm keys tel"){
	step("j t ch");
	sendMessage($chat_id,"📣 لطفا آیدی کانال(های) مورد نظر را با @ وارد کنید :
	⚠️ حتما باید ربات ادمین کانال باشد.
	","html",'',$button_back);
	}
	if($command == 'j t ch'){
	step("j t ch2");
	save("other/button/$nk/join.txt",$text);
	sendMessage($chat_id,"🔱 لطفا متنی ارسال کنید تا در زمان قفل بودن دکمه نشان داده شود :","html",'',$button_back);
	}
	if($command == 'j t ch2'){
	step("adm keys tel");
	save("other/button/$nk/join2.txt",$text);
	sendMessage($chat_id,"✅ قفل مورد نظر اعمال شد.","html",'',$btnlog);
	}
	if($text == 'زیر مجموعه گیری' && $command == "adm keys tel"){
	step("i t b");
	sendMessage($chat_id,"⚜ تعداد زیرمجموعه هایی که کاربر جمع کند، چقدر باشه؟","html",'',$button_back);
	}
	if($command == 'i t b'){
	step("i t b2");
	save("other/button/$nk/inv.txt",$text);
	sendMessage($chat_id,"🔱 لطفا متنی ارسال کنید تا در زمان قفل بودن دکمه نشان داده شود :","html",'',$button_back);
	}
	if($command == 'i t b2'){
	step("adm keys tel");
	save("other/button/$nk/inv2.txt",$text);
	sendMessage($chat_id,"✅ قفل مورد نظر اعمال شد.","html",'',$btnlog);
	}
	if($text == 'رمز ورود' && $command == "adm keys tel"){
	step("iposiall");
	sendMessage($chat_id,"💰 لطفا کلمه عبور را وارد کنید :","html",'',$button_back);
	}
	if($command == 'iposiall'){
	step("iposiall2");
	save("other/button/$nk/password.txt",$text);
	sendMessage($chat_id,"🔱 لطفا متنی ارسال کنید که از کاربر رمز ورود را بخواهد :","html",'',$button_back);
	}
	if($command == 'iposiall2'){
	step("iposiall3");
	save("other/button/$nk/password2.txt",$text);
	sendMessage($chat_id,"🔱 لطفا متنی ارسال کنید تا کلمه عبور نادرست بود نشان داده شود :","html",'',$button_back);
	}
	if($command == 'iposiall3'){
	step("adm keys tel");
	save("other/button/$nk/password3.txt",$text);
	sendMessage($chat_id,"✅ قفل مورد نظر اعمال شد.","html",'',$btnlog);
	}
	//===========
	if($text == 'اضافه کردن دستور' && $command == "adm keys tel"){
	step("newcom");
	sendMessage($chat_id,"دستور مورد نظر را ارسال کنید:","","",$button_back);
	}
	if($command == 'newcom'){
	step("adm keys tel");
	save("other/button/$nk/command.txt",$text);
	sendMessage($chat_id,"دستورات جدید ذخیره شدند.","","",$button_dokme);
	}
	//===========
	if($text == 'ارسال مطلب'){
	step("set text key in i");
	sendMessage($chat_id,"اگر مطلبی ارسال کنید که جزو دکمه های زیر نباشد آن مطلب (عکس، فیلم یا ...) به مطالب دسته این دکمه اضافه می شود");
	}
	if($text == 'تعیین مطلب'){
	$i = file_get_contents("other/button/$nk/inumber.txt");
	$i = $i ? $i : 0;
	while ($i > 0){
	unlink("other/button/$nk/answer$i.txt");
	unlink("other/button/$nk/answer$i-2.txt");
	unlink("other/button/$nk/inumber.txt");
	}
	step("set text key in i");
	sendMessage($chat_id,"مطالب قبلی حذف شدند.
حال مطالب جدید را ارسال کنید.","","",$button_back);
	}
	if($text == 'افزودن مطلب'){
	step("set text key in i");
	$d9 = file_get_contents("other/button/$nk/inumber.txt");
	$d9 = $d9 ? $d9 : 0;
	sendMessage($chat_id,"مطالب مورد نظر را ارسال کنید:
	تعداد مطالب شما: $d9","","",$button_back);
	}
	if($command == 'set text key in i'){
	$d9 = file_get_contents("other/button/$nk/inumber.txt");
	$i = $d9 + 1;
	save("other/button/$nk/inumber.txt",$i);
	if($forward_from != null || $forward_from_chat != null){
	save("other/button/$nk/answer$i.txt",$message_id);
	}
	if($text != null){
	save("other/button/$nk/answer$i.txt",$text);
	}
	if($sticker_id != null){
	save("other/button/$nk/answer$i.txt",$sticker_id);
	}
	if($video_id != null){
	save("other/button/$nk/answer$i.txt",$video_id);
	}
	if($voice_id != null){
	save("other/button/$nk/answer$i.txt",$voice_id);
	}
	if($file_id != null){
	save("other/button/$nk/answer$i.txt",$file_id);
	}
	if($music_id != null){
	save("other/button/$nk/answer$i.txt",$music_id);
	}
	if($photo2_id != null){
	save("other/button/$nk/answer$i.txt",$photo2_id);
	}
	if($photo1_id != null){
	save("other/button/$nk/answer$i.txt",$photo1_id);
	}
	if($photo0_id != null){
	save("other/button/$nk/answer$i.txt",$photo0_id);
	}
	if($caption != null){
	save("other/button/$nk/answer$i-2.txt",$caption);
	}
	sendMessage($chat_id,"مطلب شماره $i ذخیره شد
	
اگر باز مطلبی دارید بفرستید و در غیر اینصورت از کلید زیر استفاده کنید
	","","",$button_back);
	}
	//===========
	if($text == "تغییر مکان" && $command == "adm keys tel"){
	sendMessage($chat_id,"_مکان بعدی دکمه را انتخاب کنید:
🆓 به صورت رایگان مکان دکمه، بهمراه محتویات آن انتقال می یابد._","markdown",'',$button_move);
  die;
	}
if($text == "1⃣"){
move($fgm,"1",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
if($text == "2⃣"){
move($fgm,"2",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
if($text == "3⃣"){
move($fgm,"3",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
if($text == "4⃣"){
move($fgm,"4",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
if($text == "5⃣"){
move($fgm,"5",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
if($text == "6⃣"){
move($fgm,"6",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
if($text == "7⃣"){
move($fgm,"7",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
if($text == "8⃣"){
move($fgm,"8",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
if($text == "9⃣"){
move($fgm,"9",$nk);
sendMessage($chat_id,"_مکان دکمه باموفقیت جابجا شد._","markdown",'',$button_dokme);
}
	//============
	if($text == "ریست کردن" && $command == "manager"){
	step("reset robot");
	sendMessage($chat_id,"در صورتی که از حذف تمام تنظیمات، مطالب اطمینان دارید لطفا Token را ارسال کنید.","","",$button_back);
	}
	if($command == "reset robot"){
	if($text == API_KEY){
	step("home");
	DeleteFolder("other");
	rmdir("other");
	copy("../../../class.php","class.php");
	$conf = str_replace(array("***TOKEN***","***ADMIN***"),array(API_KEY,$from_id),file_get_contents("class.php"));
	sendMessage($chat_id,"تنظیمات ربات به حالت پیشفرض بازگشت.","html","true",$button_dokme_ha);
	}
	if($text != API_KEY){
	sendMessage($chat_id,"شناسه TOKEN ارسالی معتبر نیست!","","",$button_back);
	}
	}
	
	}
/*
اوپن شده در سورس خونه
کانال ما @Source_Home
*/	$admin_btno = json_encode(['keyboard'=>[
	[['text'=>"اضافه کردن مدیر"],['text'=>"حذف کردن مدیر"]],
	[['text'=>"برگشت"],['text'=>"بازگشت به منوی اصلی"]],
],'resize_keyboard'=>true]);
	if($text == "مدیران" && $command == "manager"){
	step("adminsmenu");
	if($from_id == $admin and $type == "private"){
	sendMessage($chat_id,"لطفا یک زیرشاخه را انتخاب کنید:","",'',$admin_btno);
	}else{
	sendMessage($chat_id,"تنها مدیر اصلی میتواند وارد این بخش شود.","",'',$button_back);
	}
	}
	if($text == "حذف کردن مدیر" && $command == "adminsmenu"){
	if($from_id == $admin and $type == "private"){
	step("delete admin");
	sendMessage($chat_id,"لطفا نام کاربری شخص مورد نظر را وارد کنید.","",'',$button_back);
	}else{
	sendMessage($chat_id,"تنها مدیر اصلی میتواند وارد این بخش شود.","",'',$button_back);
	}
	}
	if($command == "delete admin"){
	step("adminsmenu");
	$adminss = str_replace("$text\n" ,"" ,file_get_contents("other/admin.txt"));
	save("other/admin.txt",$adminss);
	sendMessage($chat_id,"حذف شد.","",'',$admin_btno);
	}
	if($text == "اضافه کردن مدیر" && $command == "adminsmenu"){
	if($from_id == $admin and $type == "private"){
	step("add admin");
	sendMessage($chat_id,"لطفا نام کاربری شخص مورد نظر را وارد کنید.","html",'',$button_back);
	}else{
	sendMessage($chat_id,"تنها مدیر اصلی میتواند وارد این بخش شود.","",'',$button_back);
	}
	}
	if($command == "add admin"){
	step("adminsmenu");
	$adminss = fopen("other/admin.txt","a");
	fwrite($adminss, "$text\n");
	fclose($adminss);
	sendMessage($chat_id,"مدیر جدید اضافه شد.","",'',$admin_btno);
	}
	//=============
	if($from_id == $admin or in_array($from_id,$admins)){
	if(preg_match('/^\/([Bb][Aa][Nn]) (.*)/',$text) && $type == "private"){
	preg_match('/^\/([Bb][Aa][Nn]) (.*)/',$text,$match);
	$id = json_decode(file_get_contents("https://api.pwrtelegram.xyz/bot$TOKEN/getChat?chat_id=".$match[2]));
	$user = $id->result->id;
	if($user != null){
	$txxt = file_get_contents('other/access/Block-List.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($user,$pmembersid)){
      $aaddd = file_get_contents('other/access/Block-List.txt');
      $aaddd .= $user."\n";
		save('other/access/Block-List.txt',$aaddd);
    }
	sendMessage($chat_id,"_🚫 کاربر مورد نظر بلاک شد._","markdown");
	sendMessage($user,null);
	}else{
	sendMessage($chat_id,"_🚫 کاربر مورد نظر یافت نشد._","markdown");
	}
	}
	//===========
	if(preg_match('/^\/([Uu][Nn][Bb][Aa][Nn]) (.*)/',$text) && $type == "private"){
	preg_match('/^\/([Uu][Nn][Bb][Aa][Nn]) (.*)/',$text,$match);
	$id = json_decode(file_get_contents("https://api.pwrtelegram.xyz/bot$TOKEN/getChat?chat_id=".$match[2]));
	$user = $id->result->id;
	if($user != null){
	$rep = str_replace("$user\n",'',$block);
	save("other/access/Block-List.txt",$rep);
	sendMessage($chat_id,"_✅کاربر مورد نظر آنبلاک شد._","markdown");
	sendMessage($user,null);
	}else{
	sendMessage($chat_id,"_🚫 کاربر مورد نظر یافت نشد._","markdown");
	}
	}
	}
	//==========
if(is_dir("other/button/$text")){
$news = file_get_contents("other/button/$text/news.txt");
$pmresani = file_get_contents("other/button/$text/pmresani.txt");
$chat = file_get_contents("other/button/$text/chat.txt");
$music = file_get_contents("other/button/$text/music.txt");
$cr = file_get_contents("other/button/$text/cr.txt");
$nama = file_get_contents("other/button/$text/nama.txt");
$nama2 = file_get_contents("other/button/$text/nama2.txt");
$daryaft = file_get_contents("other/button/$text/daryaft.txt");
$zirmenu = file_get_contents("other/button/$text/zirmenu.txt");
$nazar = file_get_contents("other/button/$text/nazar.txt");
$etebar = file_get_contents("other/button/$text/etebar.txt");
$help = file_get_contents("other/button/$text/help.txt");
	$jk = file_get_contents("other/button/$text/join.txt");
	$jk2 = file_get_contents("other/button/$text/join2.txt");
	$pd = file_get_contents("other/button/$text/password.txt");
	$pd2 = file_get_contents("other/button/$text/password2.txt");
	$pd3 = file_get_contents("other/button/$text/password3.txt");
	$inv = file_get_contents("other/button/$text/inv.txt");
	$inv2 = file_get_contents("other/button/$text/inv2.txt");
}
	//===========
@$bak = file_get_contents("other/setting/back.txt");
if($bak == null){$bak='↩️منوی اصلی';}
@$back = file_get_contents("other/setting/backk.txt");
if($back == null){$back='🚦 لطفا یک گزینه را انتخاب کنید:';}
$button_bak = json_encode(['keyboard'=>[
[['text'=>"بازگشت به منوی اصلی"]]
],'resize_keyboard'=>true]);
	//===========
	if($jk != '' && $jk2 != ''){
	@$lockch1 = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=$jk&user_id=$from_id"));
	$lockch2 = $lockch1->result->status;
	if($lockch2 != "member"){
	sendMessage($chat_id,$jk2,"html");
	return false;
	}else{
	save("other/$from_id/command.txt","pppppdddd");
	save("other/$from_id/wait.txt","$text");
	}
	}
	if($pd != '' && $pd2 != '' & $pd3 != ''){
	save("other/$from_id/command.txt","pd2?1");
	sendMessage($chat_id,$pd2,"html","",$button_bak);
	return false;
	}
	if($command == "pd2?1"){
	if($text == $pd){
	save("other/$from_id/command.txt","pppppdddd");
	save("other/$from_id/wait.txt","$text");
	}else{
	sendMessage($chat_id,$pd3,"html","",$button_bak);
	return false;
	}
	}
	if($inv != '' && $inv2 != ''){
	if($zir > $inv){
	save("other/$from_id/command.txt","pppppdddd");
	save("other/$from_id/wait.txt","$text");
	}else{
	sendMessage($chat_id,$inv2,"html","",$button_bak);
	}
	}
	//===========
	if($nama != null and $command == "home"){
	$i = file_get_contents("other/button/$text/inumber.txt");
	while ($i > 0){
	$mes = file_get_contents("other/button/$text/answer$i.txt");
	$caption = file_get_contents("other/button/$text/answer$i-2.txt");
	$button_text = file_get_contents("other/button/$text/button.txt");
	$okmes = bot('getfile',['file_id'=>$mes]);
	if($okmes->ok != "true"){
	sendMessage($chat_id,$mes,"html","true",$button_text);
	ForwardMessage($chat_id,$admin,$mes);
	}else{
	SendVideo($chat_id,$mes,$caption,$button_text);
	SendVoice($chat_id,$mes,$caption,$button_text);
	SendDocument($chat_id,$mes,$caption,$button_text);
	SendAudio($chat_id,$mes,$caption,$button_text);
	SendPhoto($chat_id,$mes,$caption,$button_text);
	$i--;
	}
	}
	}
	//===========
	if($nama2 != null and $command == "home"){
	$d9 = file_get_contents("other/button/$text/inumber.txt");
	$i = rand(1,$d9);
	$mes = file_get_contents("other/button/$text/answer$i.txt");
	$caption = file_get_contents("other/button/$text/answer$i-2.txt");
	$button_text = file_get_contents("other/button/$text/button.txt");
	$okmes = bot('getfile',['file_id'=>$mes]);
	if($okmes->ok != "true"){
	sendMessage($chat_id,$mes,"html","true",$button_text);
	ForwardMessage($chat_id,$admin,$mes);
	}else{
	SendVideo($chat_id,$mes,$caption,$button_text);
	SendVoice($chat_id,$mes,$caption,$button_text);
	SendDocument($chat_id,$mes,$caption,$button_text);
	SendAudio($chat_id,$mes,$caption,$button_text);
	SendPhoto($chat_id,$mes,$caption,$button_text);
	}
	}
	//===========
	if($daryaft != null and $command == "home"){
	save("other/$from_id/command.txt","one/$text");
	$i = file_get_contents("other/button/$text/inumber.txt");
	while ($i > 0){
	$mes = file_get_contents("other/button/$text/answer$i.txt");
	sendMessage($chat_id,$mes,"html","true",$button_bak);
	$i--;
	}
	}
	if(strpos($command,"one/") !== false){
	save("other/$from_id/command.txt","home");
	ForwardMessage($admin,$chat_id,$message_id);
	$x = str_replace("one/","",$command);
	$i = file_get_contents("other/button/$x/inumber.txt");
	while ($i > 0){
	$mes = file_get_contents("other/button/$x/answer$i-2.txt");
	sendMessage($chat_id,$mes,"html","true",$button_dokme_ha);
	$i--;
	}
	}
	//===========
if($zirmenu != null && $command == "home"){
	$button_text = json_encode(['keyboard'=>$button1[$text],'resize_keyboard'=>true]);
	$i = 1;
	$mes = file_get_contents("other/button/$text/answer$i.txt");
	$caption = file_get_contents("other/button/$text/answer$i-2.txt");
	$okmes = bot('getfile',['file_id'=>$mes]);
	if($okmes->ok != "true"){
	sendMessage($chat_id,$mes,"html","true",$button_text);
	}else{
	SendVideo($chat_id,$mes,$caption,$button_text);
	SendVoice($chat_id,$mes,$caption,$button_text);
	SendDocument($chat_id,$mes,$caption,$button_text);
	SendAudio($chat_id,$mes,$caption,$button_text);
	SendPhoto($chat_id,$mes,$caption,$button_text);
	}
	}
	//===========
	if($music != null and $command == "home"){
	sendMessage($chat_id,"این بخش موقتا، موقتا غیرفعال شده است.","","",$button_dokme_ha);
	return false;
	}
	//===========
	$button_cancel = json_encode(['keyboard'=>[[['text'=>"پایان گفتگو"]]],'resize_keyboard'=>true]);
	if($text == "پایان گفتگو" and ($command == "pmresani" || $command == "chatbaadmin")){
	step("home");
	unlink("chat.php");
	save("other/$from_id/data.chat","nochat");
	sendMessage($chat_id,$back,"html","",$button_dokme_ha);
	return false;
	}
	if($pmresani != null and $command == "home"){
	step("pmresani");
	sendMessage($chat_id,"پیام مورد نظر را ارسال کنید","","",$button_cancel);
	return false;
	}
	if($command == "pmresani"){
	ForwardMessage($admin,$chat_id,$message_id);
	return false;
	}
	//===========
	if($chat != null and $command == "home"){
	if(file_get_contents("chat.php") == "ok"){
	sendMessage($chat_id,"شخص دیگری در صف تماس قرار دارد...");
	return false;
	}else{
	save("other/$from_id/data.chat","chat");
  step("chatbaadmin");
	sendMessage($chat_id,"پیام مورد نظر را ارسال کنید","","",$button_cancel);
  save("chat.php","ok");
	return false;
	}
	}
	if($command == "chatbaadmin"){
	ForwardMessage($admin,$chat_id,$message_id);
	return false;
	}
	//===========
	if($news != null and $command == "home"){
	$newmember = file_get_contents('other/access/News.txt');
	$News = explode("\n",$newmember);
	if (!in_array($chat_id,$News)){
	$add = file_get_contents('other/access/News.txt');
	$add .= $chat_id."\n";
	save('other/access/News.txt',$add);
	sendMessage($chat_id,"شما در خبرنامه عضو شدید.","html","false",$button_dokme_ha);
	return false;
	}else{
	$del_member = str_replace("$chat_id",'',file_get_contents('other/access/News.txt'));
	save('other/access/News.txt',$del_member);
	sendMessage($chat_id,"از خبرنامه خارج شدید.","html","false",$button_dokme_ha);
	return false;
	}
	}
	//===========
	if($cr != null and $command == "home"){
	step("botsaz");
	sendMessage($chat_id,"لطفا شناسه TOKEN ربات را ارسال کنید.",'','',$button_bak);
	return false;
	}
	if($command == "botsaz"){
	$result = file_get_contents("https://crfree.wonets.ir/class.php?token=$text&admin=$chat_id");
	step("home");
	sendMessage($chat_id,$result,'','',$button_dokme_ha);
	return false;
	}
	//===========
	if($help != "" && $command == "home"){
	step("jiscoiummenw");
	sendMessage($chat_id,"دکمه مورد نظر را انتخاب کنید تا توضیحات آن نمایش داده شود:\n",'','',str_replace('"\u0645\u062f\u06cc\u0631\u06cc\u062a"','"بازگشت به منوی اصلی"',$button_dokme_ha));
	return false;
	}
	$upset = json_decode(file_get_contents("other/button/listcommand.json"),true);
	if($upset[$text] != "" && $command == "jiscoiummenw"){
	sendMessage($chat_id,$upset[$text],"html","true");
	return false;
	}
	//===========
	if($etebar != "" && $command != "adm keys tel"){
	$winquick = file_get_contents("other/button/$text/winquick.txt");
	$winkey =	file_get_contents("other/button/$text/winkey.txt");
	$winreply =	 file_get_contents("other/button/$text/winreply.txt");
	step("wetzebar|$text");
	sendMessage($chat_id,$winquick,"html","true",$winkey);
	return false;
	}
	if(strpos($command,"wetzebar|") !== false){
	$msg = str_replace("wetzebar|","",$command);
	$winreply =	 file_get_contents("other/button/$msg/winreply.txt");
	$score = file_get_contents("other/button/$msg/winscore.txt");
	$score = $score ? $score : 0;
	$MONSTPOINTS = $score+1;
	save("other/button/$msg/winscore.txt",$MONSTPOINTS);
	$winreply = str_replace(array("TEXT","MONSTPOINTS"),array($text,$MONSTPOINTS),$winreply);
	sendMessage($chat_id,$winreply,"html","true",$button_dokme_ha);
	step("home");
	}
	//===========
	$quickreply = file_get_contents("other/quickreply/$text.txt");
	if(is_file("other/quickreply/$text.txt") and $command != "adm keys tel"){
	if($quickreply != null){
	sendMessage($chat_id,$quickreply,"html","true");
	return false;
  }
  }
	//===========
if($reply != null && $from_id != $admin){
sendMessage($chat_id,$_send,"HTML",TRUE);
}
if($reply != null && $from_id == $admin){
sendMessage($chat_id,$_send,"html","true");
}
	//============
	if(strpos($data,"alert:") !== false){
	$text = str_replace("alert:","",$data);
	bot('answercallbackquery',['callback_query_id'=>$data_id,'text'=>$text,'show_alert'=>true]);
	return false;
	}
	//===========
	if(strpos($data,"message:") !== false){
	$text = str_replace("message:","",$data);
	sendMessage($chat_id,$text);
	return false;
	}
	//===========
	if(strtolower($data) == '/start'){
	save("other/user/$from_id/command.txt","home");
	sendMessage($chat_id,$_start,"html","true",$button_dokme_ha);
	return false;
	}
	//===========
	if(strpos($data,"/") !== false){
	$quickreply = file_get_contents("other/quickreply/$data.txt");
	if($quickreply != ''){
	sendMessage($chat_id,$quickreply,"html","true");
	return false;
  }
  }
  $inline = $update->inline_query->query;
if(is_dir("inline/$inline")){
$inid = $update->inline_query->from->id;
$msg = file_get_contents("inline/$inline/answer.txt");
bot("answerInlineQuery",[
"inline_query_id"=>$update->inline_query->id,
"results"=>json_encode([[
"type"=>"article",
"id"=>base64_encode(rand(5,555)),
"title"=>"$inline",
"thumb_url"=>"https://t.me/$UserNameBot",
"input_message_content"=>["parse_mode"=>"html","message_text"=>$msg]]])
]);
}

if($chat_id != $from_id){
if($type == "group" || $type == "supergroup"){
$new_chat_photo = $update->message->new_chat_photo;
$new_chat_title = $update->message->new_chat_title;
$new_chat_member = $message->new_chat_member;
$new_chat_member_id = $new_chat_member->id;
$left_chat_member = $message->left_chat_member;
$left_chat_member_id = $left_chat_member->id;
$new_name = $new_chat_member->first_name;
$new_lastname = $new_chat_member->last_name;
$new_username = $new_chat_member->username;
$groupname = $update->message->chat->title;
$pinned_message = $update->message->pinned_message;
$kick_member = $update->message->kick_member;

if($new_chat_photo != ""){
sendMessage($chat_id,"$_gapphotoo","html","true");
}
if($new_chat_title != ""){
sendMessage($chat_id,"$_gaptitle","html","true");
}
if($new_chat_member != ""){
if($_startgap2 != ""){
sendMessage($new_chat_member_id,"$_startgap2","html","true");
}
if($new_chat_member_id == $BOT_ID){
sendMessage($chat_id,"$_botjoingap","html","true");
}
if($new_chat_member_id != $BOT_ID){
sendMessage($chat_id,"$_startgap","html","true");
}
}
if($left_chat_member != ""){
sendMessage($chat_id,"$_leftgap","html","true");
}


}
}
/*
اوپن شده در سورس خونه
کانال ما @Source_Home
*/
@$statjson = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$from_id));
@$status = $statjson->result->status;
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>