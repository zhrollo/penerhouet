<?php
	header('Content-type: text/html; charset=utf-8');

	/* 
	Connexion à la BDD (4 params)
	*/
	try {
		$db = new PDO($cfg_bdd_cnx, $cfg_bdd_user, $cfg_bdd_pass, $cfg_bdd_conf);	
	} catch (Exception $e) {        
		die('Connexion '.$cfg_bdd_cnx.' - Erreur : ' . $e->getMessage());	
	}	

	date_default_timezone_set( 'Europe/Paris' );	
	$query = "SELECT * FROM appreciation where AppSource like 'Livre%' order by appDateSejour DESC;";
	$today = date("Y-m-d");	
?>
<?php
ob_start();
?>
			<div class="row">
				<div class="col-md-3">
					<img class="img-fluid" src="<?= _ROOT ?>peh/img/livre-d-or/img/peh_20100429_dessin_stephane_chambre-2-vue-golfe-du-morbihan.jpg" alt="<?= _TXT_LVDO_ALT ?>" />
				</div>
			
				<div class="col-md-9">
<?php
					$last_annee = "unknown";
					foreach ($db->query($query) as $row) {
						$annee = substr($row["appDateSejour"],0,4);
						if ($annee!=$last_annee) {
							echo "<h3>".$annee."</h3>";
							$last_annee = $annee;
						}
?>
	
					<div id="app<?php echo $row["idAppreciation"]; ?> class="">
						<i class="fas fa-pencil-alt" aria-hidden="true"></i>
<?php
						echo "<b>".$row["appTitre"]."</b><br>";
						echo $row["appTexte"]."<br>";
						echo $row["appSignature"]."<br>";
?>
					</div>
					<hr>
<?php
}
?>
			</div>
		</div>
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
?>