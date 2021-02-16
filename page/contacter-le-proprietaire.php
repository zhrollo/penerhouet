<?php
	/*
	contacter-le-proprietaire.php : écran de saisie de contact
	Utilise "invisible RECAPTCHA"
	
	*/

	/* ReCAPTCHA invisible */
	$siteKey = $cfg_recaptcha_site_key2;
	$secret = $cfg_recaptcha_secret2;
	$TO = implode(',', $cfg_mail_to);
	
	$retour = "DEFAUT";
	
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
			
			
			// echo "###<br>";
			// echo "<br/>url : ";
			// print_r($url);
			// echo "<br/>verify : ";
			// print_r($verify);
			// echo "###<br>";

			$retour = "KO";
			
			if (($verify!="")) {
				// Analyse réponse GET
				$captcha_success = json_decode($verify);
				$score = $captcha_success->score;
			
				if ($captcha_success->success==true) {
					/* Succès du recaptcha */
					$message = "";

					$nom = $_POST['nom']; 
					$prenom = $_POST['prenom'];
					$email = $_POST['person_email']; 
					$tel = $_POST['telephone']; 
					$msg = $_POST['monmessage']; 

					$message .= "score : $score\n";
					$message .= "nom : $nom\n";
					$message .= "prenom : $prenom\n";
					$message .= "email : $email\n";
					$message .= "tel : $tel\n";
					$message .= "msg : $msg\n";

					mail($TO, _MAIL_SUJET_PREFIXE._MAIL_SUJET_CONTACT, $message);
					
					$retour = "OK";
				}
			}
		}		
	}
?>
<?php
ob_start();
?>

<?php
$bloc_head=ob_get_contents();
ob_end_clean();
?>
<?php
ob_start();
?>
			<?php
			if (isset($_GET["mode"])) {
				echo "<h3>"._TXT_RCMP_H3."</h3>";
				echo _TXT_RCMP_P;
			} else {
				echo "<h3>"._TXT_CNTC_H3."</h3>";
				echo _TXT_CNTC_TEXTE;
			}
			?>
			
			<?php if ($retour=="OK") {?>
				<div class="messages">
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= _TXT_CNTC_FEEDBACK_OK ?>
					</div>
				</div>			
			<?php } ?>
			
			<?php if ($retour=="KO") {?>
				<div class="messages">
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= _TXT_CNTC_FEEDBACK_KO ?>
					</div>
				</div>			  
			<?php } ?>
		  
				
			<div class="row">
				<div class="col-md-5 col-md-offset-3">
					<form id="contactFormId" class="needs-validation" action="<?= _ROOT._LANG._URL_CONTACTEZ_LE_PROPRIETAIRE?>" method="POST" novalidate>
						
						<div class="form-group">
							<label for="prenom" class="control-label"><?= _LABEL_PRENOM?><?= _CHAMP_OBLIGATOIRE?></label>
							<input type="text" class="form-control" name="prenom" id="prenom" placeholder="<?= _PLACEHOLDER_PRENOM ?>" required/>
						</div>

						<div class="form-group">
							<label for="nom" class="control-label"><?= _LABEL_NOM?><?= _CHAMP_OBLIGATOIRE?></label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="<?= _PLACEHOLDER_NOM ?>" required/>
						</div>
						
						<div class="form-group">
							<div class="error-icon">
								<label for="person_email" class="control-label"><?= _LABEL_EMAIL?><?= _CHAMP_OBLIGATOIRE?></label>
								<input class="form-control" id="person_email" name="person_email" placeholder="<?= _PLACEHOLDER_EMAIL ?>" type="email" required />
							</div>
						</div>						

						<div class="form-group">
							<label for="telephone" class="control-label"><?= _LABEL_TELEPHONE?></label>
							<input type="text" class="form-control" name="telephone" id="telephone" placeholder="<?= _PLACEHOLDER_TELEPHONE ?>" />
						</div>

						<div class="form-group">
							<label for="monmessage" class="control-label"><?= _LABEL_MSG_PROPRIETAIRE?><?= _CHAMP_OBLIGATOIRE?></label>
							<textarea class="form-control" name="monmessage" id="monmessage" placeholder="<?= _PLACEHOLDER_MSG_PROPRIETAIRE ?>" rows="6" required></textarea>
						</div>						
						
						<div id='recaptcha' class="g-recaptcha"
							  data-sitekey="<?php echo $cfg_recaptcha_site_key2; ?>"
							  data-callback="onSubmit"
							  data-size="invisible"></div>
							  
						<button class="btn btn-block btn-primary" type="submit"><?= _TXT_CNTC_BOUTON?></button>
					</form>
				</div>
			</div>
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
?>
<?php
ob_start();
?>
	<!-- reCAPTCHA invisible -->
    <script src="https://www.google.com/recaptcha/api.js" async defer ></script>
	
	<!-- JS Validation Form -->	
	<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {

	  if (form.checkValidity() === false) {
		  // Erreur
          event.preventDefault();
          event.stopPropagation();
		} else {
			// C'est bon
			event.preventDefault();
			grecaptcha.execute();
		}
		
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// Callback pour poster
function onSubmit(token){
	document.getElementById("contactFormId").submit();
};
    </script>
<?php
$bloc_foot=ob_get_contents();
ob_end_clean();
?>		