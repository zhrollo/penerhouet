<?php
	// parametre-add.php : ajout de paramètre
	
	/* Conf */
	include_once("../config.php");

	/* Connexion BDD */	
	include "bdd.php";
	
	/* Calculs */
    $parNom = $_POST['parNom'];
    $parValeur = $_POST['parValeur'];
        
	/* Contrôles */
	$ok=1;
	if(empty($parNom)) {
		echo "<font color='red'>Le nom de paramètre est vide.</font><br/>";
		$ok=0;
	}
	
    if($ok==0) {                
?>
		<a href="javascript:self.history.back();" class="btn btn-primary">Retour</a>
<?php
    } else { 
		/*
		INSERT
		*/
		$sql = "INSERT INTO parametre (parNom, parValeur) VALUES(:parNom, :parValeur)";

		$req = $db->prepare($sql);
		$req->execute(array(
			"parNom" => $parNom,
			"parValeur" => $parValeur
		));
			

		/* Redirect */
		header("Location:index.php?p=parametre-liste");
    }
?>
