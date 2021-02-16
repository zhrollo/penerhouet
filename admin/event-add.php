<?php
	// event-add.php : action ajout événement
	
	// ---
	// Lorsqu'on ajout un événement,
	// Si periode a un état 1 DISPO --> on met à jour la periode à 0 RESERVE
	// Si periode a un état 2 INDISPONIBLE --> on maintient l'état de la période
	// Si periode a un état 0 RESERVE --> on maintient l'état de la période
	$etat=0;
	if (isset($_POST["etat"])) {
		$etat=$_POST["etat"];
	}
	// 0 RESERVE --> 0 RESERVE
	// 2 INDISPO --> 2 INDISPO
	$newEtat=$etat;
	// 1 DISPO --> 0 RESERVE
	if ($etat==1) {
		$newEtat=0;
	}
	// ---
	
	// Conf
	include_once("../config.php");
	
	// Démarrage de session
	session_start();
	
	// Instantiation
	require_once('google-api.php');
	$gapi = new GoogleApi();
	
	// On crée un event google calendar
	$retour = $gapi->createEvent($cfg_gcalendar_id, $_POST['titre'], $cfg_event_address, strtr( $_POST['description'], array(  "\n" => "\\n",  "\r" => "\\r"  )), $_POST['debut_date']."T".$_POST['debut_heure'].":00.000", $_POST['fin_date']."T".$_POST['fin_heure'].":00.000", $_SESSION['token']);
	$objRetour = json_decode($retour, true);

	// On récupère l'identifiant de l'event google calendar
	// On récupère le lien d'édition
	$eventId = $objRetour['id'];
	$eventUrl = $objRetour['htmlLink'];
	
	// Si la période est définie, on la met à jour...
	if ($_POST['idPeriode']!='') {
		// Connexion BDD
		include "bdd.php";
		
		
		// On transforme les 2 dates en timestamp
		$date1 = strtotime($_POST['debut_date']);
		$date2 = strtotime($_POST['fin_date']);
		 
		// On récupère la différence de timestamp entre les 2 précédents
		$nbJoursTimestamp = $date2 - $date1;
		 
		// ** Pour convertir le timestamp (exprimé en secondes) en jours **
		// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
		$duree = round($nbJoursTimestamp/86400); // 86 400 = 60*60*24
	
		// Mise à jour période
		$sql = "UPDATE periode SET perTitre=:titre, perDescription=:description,
		perEtat=:newEtat, perEventId=:eventId, perEventUrl=:eventUrl, perDateMin=:dateMin, perDateMax=:dateMax, perDuree=:duree WHERE idPeriode=:idPeriode;";
		
		$req = $db->prepare($sql);
		$req->execute(array(
			"titre" => $_POST['titre'],
			"description" => $_POST['description'],
			"eventId" => $eventId,
			"eventUrl" => $eventUrl,
			"idPeriode" => $_POST['idPeriode'],
			"newEtat" => $newEtat,
			"dateMin" => $_POST['debut_date'],
			"dateMax" => $_POST['fin_date'],
			"duree" => $duree
		));
	}
	
	// Redirect
	header("Location:index.php?p=periode-liste");	
?>	