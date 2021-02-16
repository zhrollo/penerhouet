<?php
	/*
	action-reservation.php : réservation 
	Utilise "invisible RECAPTCHA"
	
	Cette page est appelée par : reservation-etape-2.php
	Elle récupère les informations postées par le formulaire, elle vérifie que l'invisible reCAPTCHA est correct.
	Si c'est correct, on envoie un mail aux admins, on a $retour=OK.
	Sinon $retour=KO
	
	On reroute sur GET reservation-etape-1.php en transmettant le $retour afin de donner un feedback à l'utilisateur
	*/
	
	$siteKey = $cfg_recaptcha_site_key2;
	$secret = $cfg_recaptcha_secret2;
	$TO = implode(',', $cfg_mail_to);
	
	$retour = "KO";
	
	if(isset($_POST['nom'])){	
		if(isset($_POST["g-recaptcha-response"])) {
			$response = $_POST["g-recaptcha-response"];
			
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
			
			// Analyse réponse GET
			$captcha_success = json_decode($verify);
			
			if ($captcha_success->success==true) {
				// *** SUCCES ***
				$message = "";

				$periode = $_POST['periode'];
				$nb_personnes = $_POST['nb_personnes'];
				$nb_enfants = $_POST['nb_enfants'];
				$nb_bebes = $_POST['nb_bebes'];
				$nom = $_POST['nom']; 
				$prenom = $_POST['prenom'];
				$email = $_POST['person_email']; 
				$tel = $_POST['telephone']; 
				$msg = $_POST['monmessage']; 

				$message .= "période : $periode\n";
				$message .= "prenom : $prenom\n";
				$message .= "nom : $nom\n";
				$message .= "email : $email\n";
				$message .= "téléphone : $tel\n";
				$message .= "nb adultes : $nb_personnes\n";
				$message .= "nb enfants : $nb_enfants\n";
				$message .= "nb bébés : $nb_bebes\n";
				$message .= "msg : $msg\n";

				mail($TO, _MAIL_SUJET_PREFIXE._MAIL_SUJET_RESA, $message);

				$retour = "OK";
			}
		}
	}

	$goto_url = $cfg_url._ROOT._LANG._URL_RESERVEZ."?retour=".$retour;
	header("Location: ".$goto_url); 
?>