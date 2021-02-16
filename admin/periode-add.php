<?php
	// periode-add.php : action ajout d'une période

	// Conf
	include_once("../config.php");
 
 	// Connexion BDD
	include "bdd.php";

	// Paramètres
    $dateMin = $_POST['dateMin'];
    $dateMax = $_POST['dateMax'];
    $tarif = $_POST['tarif'];
    $titre = $_POST['titre'];
	$description = $_POST['description'];
    $visible = $_POST['visible'];
    $etat = $_POST['etat'];
	
	// On transforme les 2 dates en timestamp
	$date1 = strtotime($dateMin);
	$date2 = strtotime($dateMax);
	 
	// On récupère la différence de timestamp entre les 2 précédents
	$nbJoursTimestamp = $date2 - $date1;
	 
	// ** Pour convertir le timestamp (exprimé en secondes) en jours **
	// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
	$nbJours = round($nbJoursTimestamp/86400); // 86 400 = 60*60*24
	 
	$eventId = '';
	if (isset($_POST['eventId'])) {
	    $eventId = $_POST['eventId'];
	}
	
	$eventUrl = '';
	if (isset($_POST['eventUrl'])) {
		$eventUrl = $_POST['eventUrl'];
	}
	
    // checking empty fields
	$ok = 1;

	if (empty($dateMin)) {
		echo "<font color='red'>dateMin is empty.</font><br/>";
		$ok=0;
	}
	
    if ($ok==0) {                
?>
		<a href="javascript:self.history.back();" class="btn btn-primary">Retour</a>
<?php
    } else { 
		// INSERT
		$sql = "INSERT INTO periode (perDateMin, perDateMax, perDuree, perTarif, perTitre, perDescription, perVisible, perEtat, perEventId, perEventUrl) VALUES (:dateMin, :dateMax, :duree, :tarif, :titre, :description, :visible, :etat, :eventId, :eventUrl)";
		$req = $db->prepare($sql);
		$req->execute(array(
			"dateMin" => $dateMin,
			"dateMax" => $dateMax,
			"duree" => $nbJours,
			"tarif" => $tarif,
			"titre" => $titre,
			"description" => $description,
			"visible" => $visible,
			"etat" => $etat,
			"eventId" => $eventId,
			"eventUrl" => $eventUrl));

		// Redirect
		header("Location:index.php?p=periode-liste");
    }
?>
