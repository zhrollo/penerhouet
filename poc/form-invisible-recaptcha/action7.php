<?php

// Recup $cfg_recaptcha_site_key2 & $cfg_recaptcha_secret2
require("../../config.php");

$response = $_POST["g-recaptcha-response"];
$secret = $cfg_recaptcha_secret2;
	
// Init
$ch = curl_init();

// Proxy support
if (_PROXY=='1') {
	curl_setopt($ch, CURLOPT_PROXY, _PROXY_URL);
	curl_setopt($ch, CURLOPT_PROXYPORT, _PROXY_PORT);
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, _PROXY_USERPWD);
	curl_setopt($ch, CURLOPT_PROXYTYPE, _PROXY_TYPE);
	curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
}

// Appel GET
$url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$response;
curl_setopt($ch, CURLOPT_URL, $url);		
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	
$verify = curl_exec($ch);

$retour = "KO";
if (($verify!="")) {
	// Analyse réponse GET
	$captcha_success = json_decode($verify);
	$score = $captcha_success->score;

	if ($captcha_success->success==true) {
		echo "<li>g-recaptcha-response = ".$_POST["g-recaptcha-response"];
		echo "<li>prenom = ".$_POST["prenom"];
		echo "<li>score = ".$score;	
		$retour = "OK";
	}
}
echo "<li>retour = ".$retour;

			

?>
<hr>
<a href="form7.php">RETURN form7.php</a>
