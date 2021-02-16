<?php
	// parametre-update.php : action mise à jour paramètre
	
	/* Conf */
	include_once("../config.php");

	/* Connexion BDD */	
	include "bdd.php";
	
	/* Calculs */
	$idParam = $_POST['idParam'];
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
		/* Update */
		$sql = "UPDATE parametre SET parNom=:parNom, parValeur=:parValeur WHERE idParam=:idParam;";

		$req = $db->prepare($sql);
		$req->execute(array(
			"parNom" => $parNom,
			"parValeur" => $parValeur,
			"idParam" => $idParam
			));
	
		/* Redirect */
		header("Location:index.php?p=parametre-liste");
    }
?>
