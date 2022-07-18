<?php
class tw{
	
	public $auth;
	
	
	public function login($us, $pw){
$ch = curl_init();
$post = '{"username":"'.$us.'","password":"'.$pw.'","client_id":"kimne78kx3ncx6brgo4mv6wki5h1ko","undelete_user":false}';
    $_SESSION['usn'] = $us;
    $_SESSION['pasw'] = $pw;
curl_setopt($ch, CURLOPT_URL, 'https://passport.twitch.tv/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Cookie: server_session_id=98e3f8ef1de047e58d85aed9284aa72c; unique_id=1eHdEvZt0L5S7zfL9po6SMoYq470NMml; unique_id_durable=1eHdEvZt0L5S7zfL9po6SMoYq470NMml; twitch.lohp.countryCode=TR; experiment_overrides={%22experiments%22:{}%2C%22disabled%22:[]}; api_token=twilight.431d68d52dea41dab99c0a3efec00e6d';
$headers[] = 'Origin: https://www.twitch.tv';
$headers[] = 'Referer: https://www.twitch.tv/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';
$headers[] = 'Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$sonuc = json_decode($result, true);
try{
	$cap = $sonuc['captcha_proof'];
	echo '<form method="POST">
	<input type="text" name="code" placeholde="Code"></input><br/>
	<input type="hidden" name="codetoken" value="'.$cap.'"></input>
	<br/>
	<input type="submit"></input></form>';
	

}catch (Exception $e) {
   $token = $sonu['access_token'];
   $this->auth = $token;
   $_SESSION['authcode'] = $token;
   return $token;
}
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

	}
	public function twofactor($cap = NULL, $code){
		if(isset($_POST['codetoken'])){
			$cap = $_POST['codetoken'];
		}
		$ch = curl_init();
$post = '{"username":"'.$_SESSION["usn"].'","password":"'.$_SESSION["pasw"].'","client_id":"kimne78kx3ncx6brgo4mv6wki5h1ko","undelete_user":false,"captcha":{"proof":"'.$cap.'"},"twitchguard_code":"'.$code.'"}';
curl_setopt($ch, CURLOPT_URL, 'https://passport.twitch.tv/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Cookie: unique_id=1eHdEvZt0L5S7zfL9po6SMoYq470NMml; unique_id_durable=1eHdEvZt0L5S7zfL9po6SMoYq470NMml; twitch.lohp.countryCode=TR; experiment_overrides={%22experiments%22:{}%2C%22disabled%22:[]}; spare_key=eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJodHRwczovL3Bhc3Nwb3J0LnR3aXRjaC50diIsInN1YiI6IltcIjIzNjI3ODYwMlwiXSIsImF1ZCI6ImJydXRlLWZvcmNlLXByb3RlY3Rpb24iLCJleHAiOjE2NzM2MTEyNDAsImlhdCI6MTY1ODA1OTI0MCwibm9uY2UiOiJFVFRSVmpaaUQ2cHpKZWJEenU4V3pjbnhCdG1Fc3lEbnZ5QjUta01vVl9rPSJ9.f0oCyBZ30CUSMkKe8Zgx8kWirIPYKS-29DHDNUfid9_STxUa_A1KGKobEBfmAjns0aHxddB5IPGe-n1qICg41Q%3D%3D; last_login=2022-07-17T12:00:40Z; api_token=twilight.9c1eeeedce7809652a45a2ebf4456225; server_session_id=29f6f246931840659c18e6addca6d7a0; ga__12_abel-ssn=0aPUZSFce16MFG0IZXEzBcGT3MxguBKqbaBmVrKI61w7ovr6NP2ldz45KIsFyed1bz58axMpIlsqYi3OjmfiWCUItgz0C9O2QDSssMytwsLI8uMle6kcz5HifaIJSjJwCynl3TVscdjukj8jyCsPeSEaLAvh; ga__12_abel=0aPUZSFce16MFG0IZXEzBcGT3MxguBKqbaBmVrKI61w7ovr6NP2ldz45KIsFyed1bz58axMpIlsqYi3OjmfiWCUItgz0C9O2QDSssMytwsLI8uMle6kcz5HifaIJSjJwCynl3TVscdjukj8jyCsPeSEaLAvh';
$headers[] = 'Origin: https://www.twitch.tv';
$headers[] = 'Referer: https://www.twitch.tv/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';
$headers[] = 'Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$sonuc = json_decode($result, true);
$token = $sonuc['access_token'];
$this->auth = $token;
   $_SESSION['authcode'] = $token;
return $token;

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

	}

	
	public function follow($user){
		$ch = curl_init();
		$idal = $this->findID($user);

curl_setopt($ch, CURLOPT_URL, 'https://gql.twitch.tv/gql');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "[{\"operationName\":\"FollowButton_FollowUser\",\"variables\":{\"input\":{\"disableNotifications\":false,\"targetID\":\"".$idal."\"}},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"800e7346bdf7e5278a3c1d3f21b2b56e2639928f86815677a7126b093b2fdd08\"}}},{\"operationName\":\"AvailableEmotesForChannel\",\"variables\":{\"channelID\":\"".$idal."\",\"withOwner\":true},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"b9ce64d02e26c6fe9adbfb3991284224498b295542f9c5a51eacd3610e659cfb\"}}},{\"operationName\":\"SyncedSettingsEmoteAnimations\",\"variables\":{},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"64ac5d385b316fd889f8c46942a7c7463a1429452ef20ffc5d0cd23fcc4ecf30\"}}}]");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR';
$headers[] = 'Authorization: OAuth '.$this->auth.'';
$headers[] = 'Client-Id: kimne78kx3ncx6brgo4mv6wki5h1ko';
$headers[] = 'Client-Session-Id: c334fdd92be7b645';
$headers[] = 'Client-Version: cc85efe2-b440-42f6-88bf-e122be310b10';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Origin: https://www.twitch.tv';
$headers[] = 'Referer: https://www.twitch.tv/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';
$headers[] = 'X-Device-Id: 1eHdEvZt0L5S7zfL9po6SMoYq470NMml';
$headers[] = 'Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

	}
  
  public function unfollow($user){
	  $ch = curl_init();
$idal = $this->findID($user);
curl_setopt($ch, CURLOPT_URL, 'https://gql.twitch.tv/gql');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "[{\"operationName\":\"FollowButton_UnfollowUser\",\"variables\":{\"input\":{\"targetID\":\"".$idal."\"}},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"f7dae976ebf41c755ae2d758546bfd176b4eeb856656098bb40e0a672ca0d880\"}}},{\"operationName\":\"AvailableEmotesForChannel\",\"variables\":{\"channelID\":\"".$idal."\",\"withOwner\":true},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"b9ce64d02e26c6fe9adbfb3991284224498b295542f9c5a51eacd3610e659cfb\"}}}]");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR';
$headers[] = 'Authorization: OAuth '.$this->auth.'';
$headers[] = 'Client-Id: kimne78kx3ncx6brgo4mv6wki5h1ko';
$headers[] = 'Client-Session-Id: c334fdd92be7b645';
$headers[] = 'Client-Version: cc85efe2-b440-42f6-88bf-e122be310b10';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Origin: https://www.twitch.tv';
$headers[] = 'Referer: https://www.twitch.tv/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';
$headers[] = 'X-Device-Id: 1eHdEvZt0L5S7zfL9po6SMoYq470NMml';
$headers[] = 'Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

  }
  
  public function findID($us){
	  $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://gql.twitch.tv/gql');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "[{\"operationName\":\"Chat_ShareBitsBadgeTier_ChannelData\",\"variables\":{\"channelLogin\":\"".$us."\"},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"95383deae2b82f718b9d713ca433807ff60dffa8c834e2ae92abdfeb55586fc4\"}}},{\"operationName\":\"Chat_ShareResub_ChannelData\",\"variables\":{\"channelLogin\":\"".$us."\"},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"1cef2e84b602f767839e5ffd489e81536e9d11e0be250bb85a17974cedad8f54\"}}},{\"operationName\":\"CommunityPointsChatPrivateCalloutUser\",\"variables\":{\"login\":\"".$us."\"},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"15b66a0a6b743c72a63c273f2bfc4155c4209c1a85c29b6847474717877c3507\"}}},{\"operationName\":\"Chat_EarnedBadges_InitialSubStatus\",\"variables\":{\"channelLogin\":\"".$us."\"},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"85a95b95a12628668eaac4d2862b53bb376dba0325c80eae8f26539cedc5f1a3\"}}},{\"operationName\":\"UserEmotes\",\"variables\":{\"withOwner\":true},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"7c15c1c83a9cf574aa202ddf6f40594ff75b2715746d98a20eea068e0c1179b7\"}}}]");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR';
$headers[] = 'Authorization: OAuth '.$this->auth.'';
$headers[] = 'Client-Id: kimne78kx3ncx6brgo4mv6wki5h1ko';
$headers[] = 'Client-Session-Id: c334fdd92be7b645';
$headers[] = 'Client-Version: cc85efe2-b440-42f6-88bf-e122be310b10';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Origin: https://www.twitch.tv';
$headers[] = 'Referer: https://www.twitch.tv/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';
$headers[] = 'X-Device-Id: 1eHdEvZt0L5S7zfL9po6SMoYq470NMml';
$headers[] = 'Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$sonuc = json_decode($result, true);
$id = $sonuc[0]['data']['user']['id'];
return $id;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

  }
  
  public function getInfo($user){
	  $ch = curl_init();
$idal = $this->findID($user);
curl_setopt($ch, CURLOPT_URL, 'https://api.twitch.tv/helix/users?id='.$idal.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: api.twitch.tv';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Client-Id: d4uvtfdr04uq6raoenvj7m86gdk16v';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Origin: https://d4uvtfdr04uq6raoenvj7m86gdk16v.ext-twitch.tv';
$headers[] = 'Referer: https://d4uvtfdr04uq6raoenvj7m86gdk16v.ext-twitch.tv/';
$headers[] = 'Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$sonuc = json_decode($result, true);
$bio = $sonuc['data']['0']['description'];
$uname = $sonuc['data']['0']['login'];
$pp = $sonuc['data']['0']['profile_image_url'];
$offlinepp = $sonuc['data']['0']['offline_image_url'];
$viewcount = $sonuc['data']['0']['view_count'];
$kayit = $sonuc['data']['0']['created_at'];
$displayname = $sonuc['data']['0']['display_name'];
$sonuc = $bio.'`'.$uname.'`'.$pp.'`'.$offlinepp.'`'.$viewcount.'`'.$kayit.'`'.$displayname;
return $sonuc;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

  }
  
  public function report($text, $user){
	  $ch = curl_init();
$idal = $this->findID($user);
curl_setopt($ch, CURLOPT_URL, 'https://gql.twitch.tv/gql');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "[{\"operationName\":\"ReportWizard_CreateReport\",\"variables\":{\"input\":{\"content\":\"LIVESTREAM_REPORT\",\"description\":\"".$text."\",\"detailedReason\":\"malicious_pranks\",\"reason\":\"harassment\",\"targetUserID\":\"".$idal."\",\"sessionID\":\"090fe9eb9b6104cd9afe21fab5b3047b\"}},\"extensions\":{\"persistedQuery\":{\"version\":1,\"sha256Hash\":\"fbbc2da2ea493e98f6ee102068d7a4eba3b20e2766195df854903a893a1b1cbe\"}}}]");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR';
$headers[] = 'Authorization: OAuth '.$this->auth.'';
$headers[] = 'Client-Id: kimne78kx3ncx6brgo4mv6wki5h1ko';
$headers[] = 'Client-Session-Id: 0e4230b9602176d4';
$headers[] = 'Client-Version: cc85efe2-b440-42f6-88bf-e122be310b10';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Origin: https://www.twitch.tv';
$headers[] = 'Referer: https://www.twitch.tv/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';
$headers[] = 'X-Device-Id: 1eHdEvZt0L5S7zfL9po6SMoYq470NMml';
$headers[] = 'Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

  }
  
  
  
  
}

