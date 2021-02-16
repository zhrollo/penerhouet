<?php
	// contact-add.php : action ajouter contact-add
	
	/* Conf */
	include_once("../config.php");

	/* Connexion BDD */	
	include "bdd.php";
	
	/* Calculs */
    $conEmail = $_POST['conEmail'];
    $conLangue = $_POST['conLangue'];
    $conTag = $_POST['conTag'];
    $conNom = $_POST['conNom'];
    $conAnneeMin = $_POST['conAnneeMin'];
    $conAnneeMax = $_POST['conAnneeMax'];
	
	/* Contrôles */
	$ok=1;

	
    if($ok==0) {                
?>
		<a href="javascript:self.history.back();" class="btn btn-primary">Retour</a>
<?php
    } else { 
		$sql = "SELECT count(*) as nb from contact where conEmail=:conEmail";
		$result = $db->prepare($sql); 
		$result->execute(array(
			"conEmail" =>$conEmail
			)); 
		$nRows = $result->fetchColumn(); 

		if ($nRows>0) {
			header("Location:index.php?p=contact-liste&retour=ALREADY");
			exit();
		}	else {
			/*
			INSERT
			*/
			$sql = "INSERT INTO contact (conEmail, conLangue, conTag, conNom, conAnneeMin, conAnneeMax) VALUES (:conEmail, :conLangue, :conTag, :conNom, :conAnneeMin, :conAnneeMax)";

			$req = $db->prepare($sql);
			$req->execute(array(
				"conEmail" => $conEmail,
				"conLangue" => $conLangue,
				"conTag" => $conTag,
				"conNom" => $conNom,
				"conAnneeMin" => $conAnneeMin,
				"conAnneeMax" => $conAnneeMax				
				));
				

			/* Redirect */
			header("Location:index.php?p=contact-liste");
		}	
    }
?>
