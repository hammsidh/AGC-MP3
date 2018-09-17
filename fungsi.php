<?php
error_reporting(0);

function photon_cdn($img_url){
  $arr_1o   = array(0,1,2,3);
  $wp       = 'https://i'.$arr_1o[array_rand($arr_1o)].'.wp.com/';
  $wps       = 'https://i'.$arr_1o[array_rand($arr_1o)].'.wp.com/';
  return str_replace('http://', $wp , $img_url);
}

function arzGrab($url){
$ua = 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2226.0 US Safari/537.36';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
$c = curl_exec($ch);
return $c;
}

function ngegrab($url){
ini_set("user_agent","Opera/9.80 (J2ME/MIDP; Opera Mini/4.2 19.42.55/19.892; U; en) Presto/2.5.25");
$grab = @fopen($url, 'r');
$contents = "";
if ($grab) {
while (!feof($grab)) {
$contents.= fread($grab, 8192);
}
fclose($grab);
}
return $contents;
}

if(file_exists('error_log')){
unlink('error_log');
}
function arzLink($txt) {
$txt = preg_replace("/[^a-zA-Z0-9]/", " ", strtolower($txt));
$txt = implode('-',array_unique(explode(' ', trim($txt))));
$txt = str_replace('”', '', $txt);
$txt = str_replace('“', '', $txt);
$txt = str_replace(',', '', $txt);
$txt = str_replace('"', '', $txt);
$txt = str_replace("'", '', $txt);
$txt = str_replace('--', '-', $txt);
return $txt;
}

function arzTgl($date){
$date=substr($date,0,10); 
$date=explode('-',$date);
$mn=date('F',mktime(0,0,0,$date[1]));
$dates=''.$date[2].' '.$mn.' '.$date[0].'';
return $dates;
}
function arzSingle($id, $arzKey){
$grab= json_decode(arzGrab('https://www.googleapis.com/youtube/v3/videos?alt=json&part=id,snippet,contentDetails&id='.$id.'&type=videos&key='.$arzKey.''), true);
return $grab;
}

function arzClear($value){
$value = ucwords(str_replace('-', ' ', $value));
$value = ucwords(str_replace('_', ' ', $value));
$value = ucwords(str_replace('#', ' ', $value));
$value = ucwords(str_replace('/', ' ', $value));
$value = ucwords(str_replace('%', ' ', $value));
$value = str_replace('  ', ' ', $value);
return $value;
}

$arzKey = '';

function arzCrop($awal, $akhir, $text){
$text = explode($awal, $text);
$text = explode($akhir, $text[1]);
$text = $text[0];
return $text;
}

function potong($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];}
return '';}}

?>