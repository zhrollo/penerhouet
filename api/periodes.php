<?php
	// periodes.php : liste des périodes au format JSON
	
	/* Conf */
	include "../config.php";
	
	header('Content-type: application/json');
	
	/*
	3 niveaux	
	- visible = 0 : on affiche pas la periode	
	- visible = 1 : on affiche la periode	
		
	- etat = 1 : libe
	- etat = 0 : réservé
	- etat = 2 : indisponible
	
	*/	
	
	$query = "SELECT * FROM periode where perVisible=1 and perDateMin>CURDATE() ORDER BY perDateMin";
	
	/* 
	Connexion à la BDD 
	*/
	try {		
		$db = new PDO($cfg_bdd_cnx, $cfg_bdd_user, $cfg_bdd_pass);	
	} catch (Exception $e) {
		die('Connexion '.$cfg_bdd_cnx.' - Erreur : ' . $e->getMessage());	
	}	
	
	$array = array();	
	foreach($db->query($query) as $row) {
		$date_in=$row["perDateMin"];		
		$year  = substr($date_in,0,4);		
		$month = substr($date_in,5,2);		
		$day   = substr($date_in,8,2);		
		$dmin = $day."/".$month."/".$year;
		
		$date_in=$row["perDateMax"];		
		$year  = substr($date_in,0,4);		
		$month = substr($date_in,5,2);		
		$day   = substr($date_in,8,2);		
		$dmax = $day."/".$month."/".$year;
		
		$row2["id"] = $row["idPeriode"];
		/* 0: non dispo ; 1 : libre ; 2 : indisponible */
		$row2["etat"] = $row["perEtat"];		
		$row2["debut"] = $dmin;
		$row2["fin"] = $dmax;
		$row2["nbJours"] = $row["perDuree"];
		$row2["tarif"] = $row["perTarif"];
		
		$array[] = $row2;	
	}

	echo json_encode($array);
?>