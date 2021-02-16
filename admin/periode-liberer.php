<?php
	// periode-liberer.php : action lib�rer une p�riode
	
	// ---
	// Lorsqu'on retire du calendrier, on en profite pour mettre � jour la p�riode.
	// Si p�riode a un �tat 1 DISPO -->  on maintient l'�tat de la p�riode (1 DISPO)
	// Si p�riode a un �tat 2 INDISPONIBLE --> on maintient l'�tat de la p�riode (1 DISPO)
	// Si p�riode a un �tat 0 RESERVE --> on met � 1 DISPO
	$etat=0;
	if (isset($_GET["etat"])) {
		$etat=$_GET["etat"];
	}
	// Par d�faut on maintient l'�tat
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
	
	// D�marrage de session
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