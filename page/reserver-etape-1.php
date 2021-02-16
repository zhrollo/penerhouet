<?php
ob_start();
?>
	<link rel="stylesheet" href="/peh/css/peh-reservez.css">
<?php
$bloc_head=ob_get_contents();
ob_end_clean();

	/*
	reservez-etape1.php : réservation étape 1/2
	Utilise "invisible RECAPTCHA" & "Bootstrap Validator"
	*/
	
	$query = "SELECT parNom, parValeur FROM parametre";
	
	/* 
	Connexion à la BDD 
	*/
	try {		
		$db = new PDO($cfg_bdd_cnx, $cfg_bdd_user, $cfg_bdd_pass);	
	} catch (Exception $e) {        
		die('Connexion '.$cfg_bdd_cnx.' - Erreur : ' . $e->getMessage());	
	}	
	
	$array = array();	
	foreach($db->query($query) as $row) {
		$param[$row["parNom"]]=$row["parValeur"];
	}
	
	
	/* Si complet, on part sur la page spécifique */
	if ($param["complet"]!="0") {
		header("Location: ".$cfg_url._ROOT._LANG._URL_CONTACTEZ_LE_PROPRIETAIRE."?mode=resa"); /* Redirect browser */
		exit();
	}
	
	/* Si on vient de reservation.php, on doit récupérer le feedback $retour */
	$retour="";
	if(isset($_GET["retour"])){
		$retour = $_GET["retour"];
	}
?>
<?php
ob_start();
?>
			<?= _TXT_RSR1_ACCROCHE ?>
			
			<h3><?= _TXT_RSR1_H3 ?></h3>
			<!-- 2 étapes -->
			<div class="stepwizard col-md-offset-2">
				<div class="stepwizard-row setup-panel">
					<div class="stepwizard-step">
						<a href="#step-1" type="button" class="btn btn-primary btn-circle" disabled="disabled">1</a>
						<p><?= _TXT_RSR1_BTN1_LIB ?></p>
					</div>
					<div class="stepwizard-step">
						<a href="#step-2" type="button" class="btn btn-default btn-circle"  disabled="disabled">2</a>
						<p><?= _TXT_RSR1_BTN2_LIB ?></p>
					</div>
				</div>
			</div>
			<!-- /3 étapes -->
  
			<?php if ($retour=="OK") {?>
				<div class="messages">
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= _TXT_RSR1_FEEDBACK_OK ?>
					</div>	
				</div>			
			<?php } ?>
			
			<?php if ($retour=="KO") {?>
				<div class="messages">
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= _TXT_RSR1_FEEDBACK_KO ?>
					</div>
				</div>			  
			<?php } ?>
			

			<h4><?= _TXT_RSR1_H4 ?></h4>
					
			<table id="periodes" class="table table-bordered table-striped"> 
			  <tr>
				<td class="field-label active">
				  <label><?= _TXT_RSR1_ENTETE_COL1?></label>
				</td>
				<td class="field-label active">
				  <label><?= _TXT_RSR1_ENTETE_COL2?></label>
				</td>
				<td class="field-label active">
				  <label><?= _TXT_RSR1_ENTETE_COL3?></label>
				</td>
			  </tr>
			</table>
			
			<?= _TXT_RSR1_INFO_COMP ?>
			
			
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
?>
<?php
ob_start();
?>
<script>
	$(document).ready(function(e) {
		$.post('<?= _ROOT ?>api/periodes.php',function(data) {
			$.each(data, function(index) {
				var item=data[index];
				/*
				console.log("id="+item.id);
				console.log("nbJours="+item.nbJours);
				console.log("etat="+item.etat);
				console.log("tarif="+item.tarif);
				console.log("---");
				*/
				
				/* On présente les durées en jour ou semaine */
				var s_duree = "";
				var mod = item.nbJours % 7;
				if (mod==0) {
					if (item.nbJours==7) {
						s_duree = (item.nbJours / 7) +' <?= _MOT_SEMAINE ?>';
					} else {
						s_duree = (item.nbJours / 7) +' <?= _MOT_SEMAINES ?>';
					}
				} else {
					if (item.nbJours<=1) {
						s_duree = (item.nbJours) +' <?= _MOT_JOUR ?>';
					} else {
						s_duree = (item.nbJours) +' <?= _MOT_JOURS ?>';
					}
				}
					
				var $tr = $('<tr class='+item.etat+'>');
				if (item.etat == "1") {
					$tr.append($('<td class=etat'+item.etat+'>').append('<?=_TXT_RSR1_ETAT_DISPONIBLE?>'));
					var $td = $('<td class=etat'+item.etat+'>').html('<a href=\'<?= _ROOT._LANG._URL_RESERVEZ2 ?>?sel='+item.id+'\'>'+item.debut+' <i class="fa fa-arrow-right" aria-hidden="true"></i> '+item.fin+', '+s_duree+ '</a>');
				}
				if (item.etat == "0") {
					$tr.append($('<td class=etat'+item.etat+'>').append('<?=_TXT_RSR1_ETAT_RESERVE?>'));
					var $td = $('<td class=etat'+item.etat+'>').html(item.debut+' <i class="fa fa-arrow-right" aria-hidden="true"></i> '+item.fin+', '+s_duree);
				}
				if (item.etat == "2") {
					$tr.append($('<td class=etat'+item.etat+'>').append('<?=_TXT_RSR1_ETAT_INDISPONIBLE?>'));
					var $td = $('<td class=etat'+item.etat+'>').html(item.debut+' <i class="fa fa-arrow-right" aria-hidden="true"></i> '+item.fin+', '+s_duree);
				}
				$tr.append($td);

				if (item.etat == "1") {
					var $td = $('<td class=etat'+item.etat+'>').html(item.tarif+' <?= _MOT_EUR ?>');
				} else {
					var $td = $('<td class=etat'+item.etat+'>');
				}				
				$tr.append($td);
				
				$tr.appendTo('#periodes');
			});
		},'JSON');	

		$('#submit1').click(function(evt){
			evt.preventDefault();
			$('#frm').submit();
		});
	});
</script>
<?php
$bloc_foot=ob_get_contents();
ob_end_clean();
?>