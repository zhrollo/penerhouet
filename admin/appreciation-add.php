<?php
	// appreciation-add.php : action ajout d'une appréciation
	
	/* Conf */
	include_once("../config.php");

	/* Connexion BDD */	
	include "bdd.php";
				
	/* Calculs */
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

	
    if ($ok==0) {                
?>
		<a href="javascript:self.history.back();" class="btn btn-primary">Retour</a>
<?php
    } else { 
		/*
		INSERT
		*/
		$sql = "INSERT INTO appreciation (appDateSejour, appTitre, appTexte, appSignature, appNote, appSource, appNomLocataire, appLangue) VALUES(:appDateSejour, :appTitre, :appTexte, :appSignature, :appNote, :appSource, :appNomLocataire, :appLangue)";

		$req = $db->prepare($sql);
		$req->execute(array(
			"appDateSejour" => $appDateSejour,
			"appTitre" => $appTitre,
			"appTexte" => $appTexte,
			"appSignature" => $appSignature,
			"appNote" => $appNote,
			"appSource" => $appSource,
			"appLangue" => $appLangue,			
			"appNomLocataire" => $appNomLocataire));
			

		/* Redirect */
		header("Location:index.php?p=appreciation-liste");
    }
?>
