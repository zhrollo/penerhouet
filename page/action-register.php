<?php

	if ($_POST["email"]=="") {
		echo "EMPTY";
		exit();
	}
	
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		echo "INVALID_EMAIL";
		exit();
	}

	include_once("../config.php");

	/* 
	Connexion à la BDD (4 params)
	*/
	try {
		$db = new PDO($cfg_bdd_cnx, $cfg_bdd_user, $cfg_bdd_pass, $cfg_bdd_conf);	
		/* UTF8 pour les accents */
		$db->exec("set names $cfg_charset");
	} catch (Exception $e) {        
		die('Connexion '.$cfg_bdd_cnx.' - Erreur : ' . $e->getMessage());	
	}

	$sql = "SELECT count(*) as nb from contact where conEmail=:conEmail";
	$result = $db->prepare($sql); 
	$result->execute(array(
		"conEmail" => $_POST["email"]
		)); 
	$nRows = $result->fetchColumn(); 
	if ($nRows>0) {
		echo "ALREADY";
		exit();
	}
		
	/*
	INSERT
	*/
	$sql = "INSERT INTO contact (conEmail, conLangue) VALUES(:conEmail, :conLangue)";

	$req = $db->prepare($sql);
	$retour = $req->execute(array(
		"conLangue" => $_POST["langue"],
		"conEmail" => $_POST["email"]
		));
		
	if (!$retour) {
		echo "ERR_MYSQL";
		exit();
	}

	echo "OK";
?>