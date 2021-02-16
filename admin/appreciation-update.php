<?php
	// appreciation-update.php : mise à jour d'appréciation
	
	/* Conf */
	include_once("../config.php");
 
 	/* Connexion BDD */	
	include "bdd.php";

	/* Calculs */
	$idAppreciation = $_POST['idAppreciation'];
    $appDateSejour = $_POST['appDateSejour'];
    $appTitre = $_POST['appTitre'];
    $appTexte = $_POST['appTexte'];
    $appSignature = $_POST['appSignature'];
    $appNote = $_POST['appNote'];
    $appSource = $_POST['appSource'];
    $appNomLocataire = $_POST['appNomLocataire'];
    $appLangue = $_POST['appLangue'];
        
	/* Contrôles */
	$ok=1;
	if (empty($appTitre)) {
		echo "<font color='red'>appTitre is empty.</font><br/>";
		$ok=0;
	}
	
    if ($ok==0) {
?>
		<a href="javascript:self.history.back();" class="btn btn-primary">Retour</a>
<?php
    } else { 
		/* Update */
		$sql = "UPDATE appreciation SET appDateSejour=:appDateSejour, appTitre=:appTitre, appTexte=:appTexte, appSignature=:appSignature, appNote=:appNote, appSource=:appSource, appNomLocataire=:appNomLocataire, appLangue=:appLangue WHERE idAppreciation=:idAppreciation;";

		$req = $db->prepare($sql);
		$req->execute(array(
			"appDateSejour" => $appDateSejour,
			"appTitre" => $appTitre,
			"appTexte" => $appTexte,
			"appSignature" => $appSignature,
			"appNote" => $appNote,
			"appSource" => $appSource,
			"appNomLocataire" => $appNomLocataire,
			"appLangue" => $appLangue,
			"idAppreciation" => $idAppreciation
			));
	
		/* redirect */
		header("Location:index.php?p=appreciation-liste");
    }
?>
</body>
</html>