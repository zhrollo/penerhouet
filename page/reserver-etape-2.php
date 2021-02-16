<?php
	/*
	reserver-etape2.php : réservation étape 2/2
	Utilise "invisible RECAPTCHA"
	
	GET reserver2-etape2.php
	- sel : passer la période
	*/
ob_start();
?>
	<link rel="stylesheet" href="/peh/css/peh-reservez.css">
<?php
$bloc_head=ob_get_contents();
ob_end_clean();


	/* 
	Connexion à la BDD 
	*/
	try {		
		$db = new PDO($cfg_bdd_cnx, $cfg_bdd_user, $cfg_bdd_pass);	
	} catch (Exception $e) {        
		die('Connexion '.$cfg_bdd_cnx.' - Erreur : ' . $e->getMessage());	
	}	

	$texte="";
	
	$sel="";
	if (isset($_GET['sel'])) {
		$sel=$_GET['sel'];
	}
	/* Etat 1=A louer ; */
	$query = "SELECT * FROM periode where perVisible=1 and perEtat=1 and idPeriode=".$sel.";";

	$texte = "";
	
	$row3 = array();

	$rows = $db->query($query);
	if (is_array($rows) || is_object($rows)) {
		foreach($rows as $row) {			
			$row2["id"] = $row["idPeriode"];
			if ($row["perEtat"]==1) {
				$row2["etat"] = "on";
			} else {
				$row2["etat"] = "off";
			}

			$date_in=$row["perDateMin"];
			$year  = substr($date_in,0,4);
			$month = substr($date_in,5,2);
			$day   = substr($date_in,8,2);
			$dmin = $day."/".$month."/".$year;
			
			$date_in=$row["perDateMax"];
			$year  = substr($date_in,0,4);
			$month = substr($date_in,5,2);
			$day   = substr($date_in,8,2);
			$dmax = $day."/".$month."/".$year;

			$row2["periode"] = _MOT_DU.$dmin._MOT_AU.$dmax;

			
			
			if ($row["perDuree"]%7==0) {
				$nb_semaine = $row["perDuree"]/7;
				if ($nb_semaine>1) {
					$row2["duree"] = $nb_semaine._MOT_SEMAINES;
				} else {
					$row2["duree"] = $nb_semaine._MOT_SEMAINE;
				}
			} else {
				$row2["duree"] = $row["perDuree"]._MOT_JOURS;
			}
			
			if ($row["perEtat"]==1) {
				$row2["tarif"] = $row["perTarif"]._MOT_EUR;
			} else {
				$row2["tarif"] = "";
			}

			$texte = $row2["periode"].', '.$row2["duree"];
			
		}
	}
?>
<?php
ob_start();
?>
<!-- form -->
	<?= _TXT_RSR1_ACCROCHE ?>

	<h3><?= _TXT_RSR1_H3 ?></h3>
			
			<!-- 2 étapes -->
			<div class="stepwizard col-md-offset-2">
				<div class="stepwizard-row setup-panel">
					<div class="stepwizard-step">
						<a href="<?= _ROOT._LANG._URL_RESERVEZ ?>" type="button" class="btn btn-default btn-circle">1</a>
						<p><?= _TXT_RSR1_BTN1_LIB?></p>
					</div>
					<div class="stepwizard-step">
						<a href="#step-2" type="button" class="btn btn-primary btn-circle" disabled="disabled">2</a>
						<p><?= _TXT_RSR1_BTN2_LIB ?></p>
					</div>
				</div>
			</div>
			<!-- /3 étapes -->
			
			<h4>Complétez vos informations</h4>

			<div class="row">
				<div class="col-md-5 col-md-offset-3">
					<form id="resaFormId" class="needs-validation" action="<?= _ROOT._LANG._URL_RESERVATION ?>" method="POST" novalidate>
						
						<div class="form-group">
							<label for="periode" class="control-label"><?= _LABEL_PERIODE?><?= _CHAMP_OBLIGATOIRE?></label>
							<input type="text" class="form-control" name="periode" id="periode" placeholder="<?= _PLACEHOLDER_PERIODE ?>" value="<?php echo $texte; ?>" required/>
							<div class="valid-feedback">OK</div>
							<div class="invalid-feedback">KO</div>
						</div>

						<div class="form-group">
							<label for="prenom" class="control-label"><?= _LABEL_PRENOM?><?= _CHAMP_OBLIGATOIRE?></label>
							<input type="text" class="form-control" name="prenom" id="prenom" placeholder="<?= _PLACEHOLDER_PRENOM ?>" required/>
							<div class="valid-feedback">OK</div>
							<div class="invalid-feedback">KO</div>
						</div>

						<div class="form-group">
							<label for="nom" class="control-label"><?= _LABEL_NOM?><?= _CHAMP_OBLIGATOIRE?></label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="<?= _PLACEHOLDER_NOM ?>" required/>
							<div class="valid-feedback">OK</div>
							<div class="invalid-feedback">KO</div>
						</div>
						
						<div class="form-group">
							<div class="error-icon">
								<label for="person_email" class="control-label"><?= _LABEL_EMAIL?><?= _CHAMP_OBLIGATOIRE?></label>
								<input class="form-control" id="person_email" name="person_email" placeholder="<?= _PLACEHOLDER_EMAIL ?>" type="email" required />
								<div class="invalid-feedback">KO</div>
							</div>
					  </div>						

						<div class="form-group">
							<label for="telephone" class="control-label"><?= _LABEL_TELEPHONE?></label>
							<input type="text" class="form-control" name="telephone" id="telephone" placeholder="<?= _PLACEHOLDER_TELEPHONE ?>" />
							<div class="valid-feedback">OK</div>
							<div class="invalid-feedback">KO</div>
						</div>

						<div class="form-group">
							<label for="nb_personnes" class="control-label"><?= _LABEL_NB_ADULTES?></label>
							<input type="text" class="form-control" name="nb_adultes" id="nb_adultes" placeholder="<?= _PLACEHOLDER_NB_ADULTES ?>" />
							<div class="valid-feedback">OK</div>
							<div class="invalid-feedback">KO</div>
						</div>
						
						<div class="form-group">
							<label for="nb_enfants" class="control-label"><?= _LABEL_NB_ENFANTS?></label>
							<input type="text" class="form-control" name="nb_enfants" id="nb_enfants" placeholder="<?= _PLACEHOLDER_NB_ENFANTS ?>" />
							<div class="valid-feedback">OK</div>
							<div class="invalid-feedback">KO</div>
						</div>

						<div class="form-group">
							<label for="nb_bebes" class="control-label"><?= _LABEL_NB_BEBES?></label>
							<input type="text" class="form-control" name="nb_bebes" id="nb_bebes" placeholder="<?= _PLACEHOLDER_NB_BEBES ?>" />
							<div class="valid-feedback">OK</div>
							<div class="invalid-feedback">KO</div>
						</div>
						
						
						<div class="form-group">
							<label for="monmessage" class="control-label"><?= _LABEL_MSG_PROPRIETAIRE?><?= _CHAMP_OBLIGATOIRE?></label>
							<textarea class="form-control" name="monmessage" id="monmessage" placeholder="<?= _PLACEHOLDER_MSG_PROPRIETAIRE ?>" rows="6" required></textarea>
							<div class="valid-feedback">OK</div>
							<div class="invalid-feedback">KO</div>
						</div>						
						
						<div id='recaptcha' class="g-recaptcha"
							  data-sitekey="<?php echo $cfg_recaptcha_site_key2; ?>"
							  data-callback="onSubmit"
							  data-size="invisible"></div>
							  
						<button id="submit_button" class="btn btn-block btn-primary" type="submit"><?= _TXT_RSR2_BOUTON ?></button>
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
	document.getElementById("resaFormId").submit();
};
</script>
<?php
$bloc_foot=ob_get_contents();
ob_end_clean();
?>
