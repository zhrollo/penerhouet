<?php
	// parametre-delete.php : action effacer un paramètre
	
	/* Conf */
	include_once("../config.php");

	/* Connexion BDD */	
	include "bdd.php";
 
	/* Calculs */
	$id = $_GET['id'];
 
	/* delete */
	$sql = "DELETE FROM parametre WHERE idParam=$id";
	$db->exec($sql);
	
	/* Redirect */
	header("Location:index.php?p=parametre-liste");
?>