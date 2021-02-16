<?php
	// contact-delete.php : action suppression de contact
	
	/* Conf */
	include_once("../config.php");
 
 	/* Connexion BDD */	
	include "bdd.php";

	/* Calculs */
	$id = $_GET['id'];
 
	/* delete */
	$sql = "DELETE FROM contact WHERE idContact=$id";
	$db->exec($sql);
	
	/* Redirect */
	header("Location:index.php?p=contact-liste");
?>