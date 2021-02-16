<?php
	// periode-liberer.php : action libérer une période
	
	// ---
	// Lorsqu'on retire du calendrier, on en profite pour mettre à jour la période.
	// Si période a un état 1 DISPO -->  on maintient l'état de la période (1 DISPO)
	// Si période a un état 2 INDISPONIBLE --> on maintient l'état de la période (1 DISPO)
	// Si période a un état 0 RESERVE --> on met à 1 DISPO
	$etat=0;
	if (isset($_GET["etat"])) {
		$etat=$_GET["etat"];
	}
	// Par défaut on maintient l'état
	$newEtat=$etat;
	// 0 RESERVE --> 1 DISPO
	if ($etat==0) {
		$newEtat=1;
	}
	// ---
	
	// Conf
	include_once("../config.php");
	
 	// Connexion BDD
	include "bdd.php";	
	
	// Démarrage de session
	session_start();
	
	// Instantiation
	require_once('google-api.php');
	$gapi = new GoogleApi();
	
	try {
		$retour = $gapi->DeleteCalendarEvent($_GET['eventId'], $cfg_gcalendar_id, $_SESSION['token']);
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$sql = "UPDATE periode SET perEtat=:etat, perEventId='', perEventUrl='' WHERE idPeriode=:idPeriode;";
	$req = $db->prepare($sql);
	$req->execute(array(
		"idPeriode" => $_GET['idPeriode'],
		"etat" => $newEtat
	));

	/* Redirect */
	header("Location:index.php?p=periode-liste");
?>