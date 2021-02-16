<?php
	// event-delete.php : action suppression �v�nement gCalendar
	// @param $_GET['eventId'] identifiant de l'�v�nement gCalendar
	// @param $_SESSION['token'] 
	
	// Conf
	include_once("../config.php");

	// D�marrage de session
	session_start();
	
	// Instantiation
	require_once('google-api.php');
	$gapi = new GoogleApi();
	
	// Suppression d'�v�nement gCalendar
	$retour = $gapi->DeleteCalendarEvent($_GET['eventId'], $cfg_gcalendar_id, $_SESSION['token']);
	
	// Redirect
	header("Location:index.php?p=periode-liste");	
?>	