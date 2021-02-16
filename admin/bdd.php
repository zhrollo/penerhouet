<?php
	// bdd.php : connexion à la base de données
	
	/* 
	Connexion à la BDD 
	*/
	try {		
		$db = new PDO($cfg_bdd_cnx, $cfg_bdd_user, $cfg_bdd_pass, $cfg_bdd_conf);	
		$db->exec("set names $cfg_charset");
	} catch (Exception $e) {        
		die('Connexion '.$cfg_bdd_cnx.' - Erreur : ' . $e->getMessage());	
	}
	
?>