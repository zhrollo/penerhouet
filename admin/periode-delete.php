<?php
	// periode-delete.php : action effacer une ou plusieurs périodes
	// - $id : soit id de periode à supprimer ; soit liste d'identifiants de periode séparés par des virgules

	// Conf
	include_once("../config.php");

	// Connexion BDD
	include "bdd.php";

	// Récup liste des id de période à supprimer
	$id = $_GET['id'];

	// Récupération des id des événements gCalendar
	if (isset($_SESSION['token'])) {
		// Instantiation
		require_once('google-api.php');
		$gapi = new GoogleApi();

		$sql = "SELECT perEventId FROM periode WHERE idPeriode in ($id) and perEventId!=''";
		foreach($db->query($sql) as $row) {
			$retour = $gapi->DeleteCalendarEvent($row["perEventId"], $cfg_gcalendar_id, $_SESSION['token']);
		}
	}

	// Suppression enregistrements dans la table periode
	$sql = "DELETE FROM periode WHERE idPeriode in ($id)";
	$db->exec($sql);

	// Redirect
	header("Location:index.php?p=periode-liste");
?>