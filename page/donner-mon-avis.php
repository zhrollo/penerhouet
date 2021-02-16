<?php
	$siteKey = $cfg_recaptcha_site_key2;
	$secret = $cfg_recaptcha_secret2;
	$TO = implode(',', $cfg_mail_to);
	
	$retour = "";
	if(isset($_POST['resume'])){	
	
		$message = "";

		$note = $_POST['note']; 
		$resume = $_POST['resume'];
		$avis = $_POST['monmessage']; 
		$signature = $_POST['signature']; 
		$email = $_POST['person_email']; 

		$message .= "note : $note\n";
		$message .= "resume : $resume\n";
		$message .= "avis : $avis\n";
		$message .= "signature : $signature\n";
		$message .= "email : $email\n";
		
		$retour = "KO";
			
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
			if (($verify!="")) {
				
				$captcha_success = json_decode($verify);
				/*			
				{
				  "success": true,
				  "challenge_ts": "2019-05-20T15:31:11Z",
				  "hostname": "localhost"
				}
				*/
			
				if ($captcha_success->success==true) {
					// *** SUCCES ***
					mail($TO, _MAIL_SUJET_PREFIXE._MAIL_SUJET_AVIS, $message);
					
					$retour = "OK";
					// *** SUCCES ***
				}
			}
		}		
	}
?>
<?php
ob_start();
?>

			<?php if ($retour=="OK") {?>
				<div class="messages">
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= _TXT_DVAV_FEEDBACK_OK ?>
					</div>
				</div>			
			<?php } ?>
			
			<?php if ($retour=="KO") {?>
				<div class="messages">
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= _TXT_DVAV_FEEDBACK_KO ?>
					</div>
				</div>			  
			<?php } ?>

			<p><?= _TXT_DVAV_TEXTE ?></p>

			<?= _TXT_DVAV_INFO ?>
				
			<div class="row">
				<div class="col-md-5 col-md-offset-3">
					<form id="reviewFormId" class="needs-validation" action="<?= _ROOT._LANG._URL_DONNEZ_VOTRE_AVIS ?>" method="POST" novalidate>

						<div class="form-group">
							<label for="note" class="control-label"><?= _LABEL_NOTEZ_VOTRE_SEJOUR?><?= _CHAMP_OBLIGATOIRE?></label><br/>
							<select class="form-control custom-select" name="note"  id="note"  placeholder="<?= _PLACEHOLDER_NOTEZ_VOTRE_SEJOUR ?>" required>
								<option value="" disabled selected><?= _PLACEHOLDER_NOTEZ_VOTRE_SEJOUR ?></option>
								<option value="5"><?= _TXT_DVAV_STAR_CAPTION_5?></option>
								<option value="4"><?= _TXT_DVAV_STAR_CAPTION_4?></option>
								<option value="3"><?= _TXT_DVAV_STAR_CAPTION_3?></option>
								<option value="2"><?= _TXT_DVAV_STAR_CAPTION_2?></option>
								<option value="1"><?= _TXT_DVAV_STAR_CAPTION_1?></option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="resume" class="control-label"><?= _LABEL_RESUME?><?= _CHAMP_OBLIGATOIRE?></label>
							<input type="text" class="form-control" name="resume" id="resume" placeholder="<?= _PLACEHOLDER_RESUME ?>" required/>
						</div>

						<div class="form-group">
							<label for="monmessage" class="control-label"><?= _LABEL_EXPERIENCE ?><?= _CHAMP_OBLIGATOIRE?></label>
							<textarea class="form-control" name="monmessage" id="monmessage" placeholder="<?= _PLACEHOLDER_EXPERIENCE ?>" rows="6" required></textarea>
						</div>	
						
						<div class="form-group">
							<label for="signature" class="control-label"><?= _LABEL_SIGNATURE ?><?= _CHAMP_OBLIGATOIRE?></label>
							<input type="text" class="form-control" name="signature" id="signature" placeholder="<?= _PLACEHOLDER_SIGNATURE ?>" required/>
						</div>
						
						<div class="form-group">
							<div class="error-icon">
								<label for="person_email" class="control-label"><?= _LABEL_EMAIL ?></label>
								<input class="form-control" id="person_email" name="person_email" placeholder="<?= _PLACEHOLDER_EMAIL ?>" type="email"  />
							</div>
						</div>	
						
						<div id='recaptcha' class="g-recaptcha"
							  data-sitekey="<?php echo $cfg_recaptcha_site_key2; ?>"
							  data-callback="onSubmit"
							  data-size="invisible"></div>
							  
						<button class="btn btn-block btn-primary" type="submit"><?= _TXT_DVAV_BOUTON ?></button>
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
	document.getElementById("reviewFormId").submit();
};
    </script>
<?php
$bloc_foot=ob_get_contents();
ob_end_clean();
?>		