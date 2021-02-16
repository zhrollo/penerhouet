<?php
	// appreciation-delete.php : action suppression d'appréciation
	
	/* Conf */
	include_once("../config.php");
 
 	/* Connexion BDD */	
	include "bdd.php";

	/* Calculs */
	$id = $_GET['id'];
 
	/* delete */
	$sql = "DELETE FROM appreciation WHERE idAppreciation=$id";
	$db->exec($sql);
	
	/* Redirect */
	header("Location:index.php?p=appreciation-liste");
?>