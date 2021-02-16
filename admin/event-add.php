<?php
	// event-add.php : action ajout �v�nement
	
	// ---
	// Lorsqu'on ajout un �v�nement,
	// Si periode a un �tat 1 DISPO --> on met � jour la periode � 0 RESERVE
	// Si periode a un �tat 2 INDISPONIBLE --> on maintient l'�tat de la p�riode
	// Si periode a un �tat 0 RESERVE --> on maintient l'�tat de la p�riode
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
	
	// D�marrage de session
	session_start();
	
	// Instantiation
	require_once('google-api.php');
	$gapi = new GoogleApi();
	
	// On cr�e un event google calendar
	$retour = $gapi->createEvent($cfg_gcalendar_id, $_POST['titre'], $cfg_event_address, strtr( $_POST['description'], array(  "\n" => "\\n",  "\r" => "\\r"  )), $_POST['debut_date']."T".$_POST['debut_heure'].":00.000", $_POST['fin_date']."T".$_POST['fin_heure'].":00.000", $_SESSION['token']);
	$objRetour = json_decode($retour, true);

	// On r�cup�re l'identifiant de l'event google calendar
	// On r�cup�re le lien d'�dition
	$eventId = $objRetour['id'];
	$eventUrl = $objRetour['htmlLink'];
	
	// Si la p�riode est d�finie, on la met � jour...
	if ($_POST['idPeriode']!='') {
		// Connexion BDD
		include "bdd.php";
		
		
		// On transforme les 2 dates en timestamp
		$date1 = strtotime($_POST['debut_date']);
		$date2 = strtotime($_POST['fin_date']);
		 
		// On r�cup�re la diff�rence de timestamp entre les 2 pr�c�dents
		$nbJoursTimestamp = $date2 - $date1;
		 
		// ** Pour convertir le timestamp (exprim� en secondes) en jours **
		// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
		$duree = round($nbJoursTimestamp/86400); // 86 400 = 60*60*24
	
		// Mise � jour p�riode
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