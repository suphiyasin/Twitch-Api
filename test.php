<?php
session_start();
include("api.php");
$use = new tw();
$use->auth = $_SESSION['authcode'];


$look = $use->login("TWITCH-USERNAME", "TWITCH-PASSWORD");
echo $look;

//for two factor
if(isset($_POST['codetoken'])){
	$check = $use->twofactor($_POST['codetoken'], $_POST['code']);
	echo $check;
}


//manuel two factor
//$check = $use->twofactor("captcha token", "mail code");
//echo $check;

//$use->follow("wtcn");

//$use->unfollow("wtcn");

//$x = $use->findID("wtcn");
//echo $x;



/*
$bilgi = $use->getInfo("wtcn");
//0 = bio , 1 = username, 2 = pplink, 3 = offline pp, 4 = viewcount, 5 = kayit tarihi, 6 = ekranda gözüken tarih
$a = explode("`", $bilgi);
echo '<img src="'.$a[3].'"/>';
*/

//$use->report("REASON FOR REPORT", "STREAMER-USERNAME");
