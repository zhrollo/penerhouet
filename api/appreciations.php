<?php
	/* Récupération du paramètre langue */
	$lg="";
	if (isset($_GET["lg"])) {
		$lg=$_GET["lg"];
	}

	/* Conf */
	include "../config.php";
	
	header('Content-type: application/json');
	
	/* 
	Connexion à la BDD (4 params)
	*/
	try {
		$db = new PDO($cfg_bdd_cnx, $cfg_bdd_user, $cfg_bdd_pass, $cfg_bdd_conf);	
	} catch (Exception $e) {        
		die('Connexion '.$cfg_bdd_cnx.' - Erreur : ' . $e->getMessage());	
	}	
	
	if ($lg=="") {
		$query = "SELECT * FROM appreciation order by appDateSejour DESC";
	} else {
		$query = "SELECT * FROM appreciation where appLangue='".$lg."' order by appDateSejour DESC";
	}
	
	$array = array();
	foreach ($db->query($query) as $row) {		
		$row2["titre"] = $row["appTitre"];		
		$row2["note"] = $row["appNote"];		
		$row2["texte"] = $row["appTexte"];		
		$row2["signature"] = $row["appSignature"];		
		$row2["source"] = $row["appSource"];		
		$row2["nom_loc"] = $row["appNomLocataire"];		
		$row2["date_sejour"] = $row["appDateSejour"];				
		$array[] = $row2;	
	}	
	
	/* print_r($array); */ 	
	
	echo json_encode($array); 	
?>