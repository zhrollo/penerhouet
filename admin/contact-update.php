<?php
	// contact-update.php : action mise à jour de contact
	
	/* Conf */
	include_once("../config.php");
 
 	/* Connexion BDD */	
	include "bdd.php";

	/* Calculs */
	$idContact = $_POST['idContact'];
    $conEmail = $_POST['conEmail'];
    $conLangue = $_POST['conLangue'];
    $conTag = $_POST['conTag'];
    $conNom = $_POST['conNom'];
    $conAnneeMin = $_POST['conAnneeMin'];
    $conAnneeMax = $_POST['conAnneeMax'];
        
	/* Contrôles */
	$ok=1;
	if(empty($conEmail)) {
		echo "<font color='red'>conEmail is empty.</font><br/>";
		$ok=0;
	}
	
    if($ok==0) {                
?>
		<a href="javascript:self.history.back();" class="btn btn-primary">Retour</a>
<?php
    } else { 
		/* Update */
		$sql = "UPDATE contact SET conEmail=trim(:conEmail), conLangue=:conLangue, conTag=:conTag, conNom=trim(:conNom), conAnneeMin=:conAnneeMin, conAnneeMax=:conAnneeMax WHERE idContact=:idContact;";

		$req = $db->prepare($sql);
		$req->execute(array(
			"conEmail" => $conEmail,
			"conLangue" => $conLangue,
			"idContact" => $idContact,
			"conTag" => $conTag,
			"conNom" => $conNom,
			"conAnneeMin" => $conAnneeMin,
			"conAnneeMax" => $conAnneeMax
			));
	
		/* redirect */		header("Location:index.php?p=contact-liste");
    }
?>
</body>
</html>