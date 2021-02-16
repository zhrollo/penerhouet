<?php
	// periode-update.php : action modification d'une période

	/* Conf */
	include_once("../config.php");
 
 	/* Connexion BDD */	
	include "bdd.php";

	/* Calculs */
	$idPeriode = $_POST['id'];
    $dateMin = $_POST['dateMin'];
    $dateMax = $_POST['dateMax'];
    $tarif = $_POST['tarif'];
    $titre = $_POST['titre'];
	$description = $_POST['description'];
    $visible = $_POST['visible'];
    $etat = $_POST['etat'];
    $eventId = $_POST['eventId'];
    $eventUrl = $_POST['eventUrl'];

	// On transforme les 2 dates en timestamp
	$date1 = strtotime($dateMin);
	$date2 = strtotime($dateMax);
	 
	// On récupère la différence de timestamp entre les 2 précédents
	$nbJoursTimestamp = $date2 - $date1;
	 
	// ** Pour convertir le timestamp (exprimé en secondes) en jours **
	// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
	$nbJours = round($nbJoursTimestamp/86400); // 86 400 = 60*60*24
	
	$ok=1;

	if (empty($dateMin)) {
		echo "<font color='red'>dateMin is empty.</font><br/>";
		$ok=0;
	}
	
    if ($ok==0) {                
?>
		<a href="javascript:self.history.back();" class="btn btn-primary">Retour</a>
<?php
    } else { 
		/* update */
		$sql = "UPDATE periode SET perDateMin=:dateMin, perDateMax=:dateMax, perDuree=:duree, perTarif=:tarif, perTitre=:titre, 
		perDescription=:description, perVisible=:visible, perEtat=:etat, perEventId=:eventId, perEventUrl=:eventUrl WHERE idPeriode=:idPeriode;";
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
			"idPeriode" => $idPeriode,
			"eventId" => $eventId,
			"eventUrl" => $eventUrl));

		/* Redirect */
		header("Location:index.php?p=periode-liste");
    }
?>
</body>
</html>