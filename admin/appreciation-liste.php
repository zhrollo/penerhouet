<?php
	// appreciation-liste.php : page liste des appréciations. Gère l'ajout, la modification, la suppression d'appréciation. 
	// @param mode. Mode ADD pour gérer les ajouts. Mode LIGHT pour exporter sous forme de texte
	// @param edit. Identifiant de l'appréciation à éditer.
	
	// Récupération paramètres edit & mode
	$edit = "";
	if (isset( $_GET['edit'])) {
		$edit = $_GET['edit'];
	}
	
	$mode = "";
	if (isset( $_GET['mode'])) {
		$mode = $_GET['mode'];
	}
	
	// On crée un tableau des 52 prochains samedi
	for ($i=0; $i<=5; $i++) {
		if (date("w") == $i){
			$delta = 6-$i;
			$madate = date('Y-m-d', strtotime("+".$delta." day"));
			break;
		}
	}
	$madate = date('Y-m-d', strtotime("-1 week", strtotime($madate)));

			if ($mode!="LIGHT")	{
		?>		
				<!-- Menu -->
				<h2>Appreciations</h2>

						<!-- ### FORM AJOUT ### -->
						<?php
						if ($mode=="ADD") {
						?>
							<tr class="tr_add">
								<td colspan="8">
									<form action="appreciation-add.php" method="post">
										<table class="table table-bordred table-striped" width="100%">		
											<tr>
												<td>Date de fin de séjour</td>
												<td>
													<input data-toggle="datepicker" name="appDateSejour" value="<?php echo $madate; ?>">
												</td>
											</tr>
											<tr>
												<td>Langue</td>
												<td>
													<input type="radio" name="appLangue" value="fr" checked> français<br/>
													<input type="radio" name="appLangue" value="en" > anglais<br/>
													<input type="radio" name="appLangue" value="de" > allemand<br/>
												</td>
											</tr>
											<tr>
												<td>Titre</td>
												<td>
													<input type="text" name="appTitre" value="..."><br/>
												</td>
											</tr>
											<tr>
												<td>Texte</td>
												<td>
													<textarea name="appTexte" rows="10" cols="60%">...</textarea>
												</td>
											</tr>											<tr>
												<td>Signature</td>
												<td><input type="text" name="appSignature" value="..."></td>
											</tr>
											<tr>
												<td>Note</td>
												<td><input type="text" name="appNote" value="5" size="1"></td>
											</tr>
											<tr>
												<td>Source</td>
												<td>
													<select name="appSource">
														<option value="" ></option>
													<?php
														$sources = explode(",",$cfg_liste_source_appreciation);
														foreach($sources as $source) {
															?>
															<option value="<?php echo $source; ?>"><?php echo $source; ?></option>
													<?php
														}
													?>
													</select>
												</td>
											</tr>
											<tr>
												<td>Nom locataire</td>
												<td><input type="text" name="appNomLocataire" value="..."></td>
											</tr>
											<tr>
												<td></td>
												<td>
													<input class="btn btn-primary" type="submit" name="formSubmit" value="Ajouter">
													<a href="index.php?p=appreciation-liste" class="btn btn-primary">Annuler</a>
												</td>
											</tr>
										</table>
									</form>
						<?php
						} else {
						?>
							<a href="index.php?p=appreciation-liste&mode=ADD"><i class="fas fa-plus"></i></a>
							&nbsp;&nbsp;
							<a href="index.php?p=appreciation-liste&mode=LIGHT"><i class="fas fa-file-export"></i></a>
						<?php
						}
?>
				<table class="table table-bordred">
					<thead>
						<tr class="tr_header">
							<td>Fin de séjour</td>
							<td>Lg</td>
							<td>Appréciation</td>
							<td>Signature</td>
							<td>Note</td>
							<td>Source</td>
							<td>Nom locataire</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
<?php
						date_default_timezone_set( 'Europe/Paris' );
						$query = "SELECT * FROM appreciation order by appDateSejour DESC;";
						$today = date("Y-m-d");	

						foreach ($db->query($query) as $row) {
							$odd_year = substr($row["appDateSejour"],3,1) % 2;
							if ($edit==$row["idAppreciation"]) {
								
						?>
									<tr class="tr_update" >
										<td colspan="8">
											<form action="appreciation-update.php" method="post">
												<table class="table table-bordred">
													<tr>
														<td>Fin de séjour</td>
														<td>
															<!-- pointeur pour se place sur la ligne --><a name="pointeur"></a>
															<input type="hidden" name="idAppreciation" value="<?php echo $row["idAppreciation"]; ?>">
															<input data-toggle="datepicker" type="text" name="appDateSejour" value="<?php echo $row["appDateSejour"]; ?>" size="10">
														</td>
													</tr>
													<tr>
														<td>Langue</td>
														<td>
															<input type="radio" name="appLangue" value="fr" <?php if ($row["appLangue"]=="fr") echo "checked"; ?>> français<br/>
															<input type="radio" name="appLangue" value="en" <?php if ($row["appLangue"]=="en") echo "checked"; ?>> anglais<br/>
															<input type="radio" name="appLangue" value="de" <?php if ($row["appLangue"]=="de") echo "checked"; ?>> allemand<br/>
														</td>							
													</tr>
													<tr>
														<td>Titre</td>
														<td>
														<input type="text" name="appTitre" value="<?php echo $row["appTitre"]; ?>"><br/>
														</td>
													</tr>
													<tr>
														<td>Texte</td>
														<td>
														<textarea name="appTexte" rows="10" cols="60%"><?php echo $row["appTexte"]; ?></textarea>
														</td>
													</tr>
													<tr>
														<td>Signature</td>
														<td><input type="text" name="appSignature" value="<?php echo $row["appSignature"]; ?>"></td>
													</tr>
													<tr>
														<td>Note</td>
														<td><input type="text" name="appNote" value="<?php echo $row["appNote"]; ?>" size="1"></td>
													</tr>
													<tr>
														<td>Source</td>
														<td>
															<?php
																$sources = explode(",",$cfg_liste_source_appreciation);
															?>
															<select name="appSource">
															<?php
																foreach($sources as $source) {
																	?>
																	<option value="<?php echo $source; ?>" <?php if (strtolower($row["appSource"])==strtolower($source)) { echo " selected"; } ?>><?php echo $source; ?></option>
															<?php
																}
															?>
															</select>														
														</td>
													</tr>
													<tr>
														<td>Nom locataire</td>
														<td><input type="text" name="appNomLocataire" value="<?php echo $row["appNomLocataire"]; ?>"></td>
													</tr>
													<tr>
														<td></td>
														<td>
															<input class="btn btn-primary" type="submit" name="formSubmit" value="OK">
															<a href="index.php?p=appreciation-liste" class="btn btn-primary">Annuler</a>
														</td>
													</tr>
												</table>
											</form>
										</td>
									</tr>
							<?php
							} else {
							?>	
							<tr class="tr<?php echo $odd_year; ?>">
							
								<td><?php echo $row["appDateSejour"]; ?></td>
								<td><?php echo $row["appLangue"]; ?></td>
								<td>
									<b><?php echo $row["appTitre"]; ?></b><br/>
									<?php echo $row["appTexte"]; ?>
								</td>
								<td><?php echo $row["appSignature"]; ?></td>
								<td><?php echo $row["appNote"]; ?></td>
								<td><?php echo $row["appSource"]; ?></td>
								<td><?php echo $row["appNomLocataire"]; ?></td>
								<td> 
									<a href="index.php?p=appreciation-liste&edit=<?php echo $row["idAppreciation"]; ?>#pointeur"><i class="fas fa-edit"></i></a>&nbsp;
									<a href="appreciation-delete.php?id=<?php echo $row["idAppreciation"] ?>" onClick="return confirm('Êtes-vous sûr de supprimer ?')"><i class="fas fa-trash"></i></a>
								</td> 
							</tr>
				<?php
							}
						}
					}
		?>
				</tbody>
		</table>

<?php
	echo "<hr>";
	if ($mode=="LIGHT")	{
		$query = "SELECT * FROM appreciation order by appDateSejour DESC;";
		foreach ($db->query($query) as $row) {	
			echo "n°".$row["idAppreciation"]."<br>";
			echo $row["appTitre"]."<br>";
			echo $row["appTexte"]."<br>"; 
			echo $row["appSignature"]."<br>"; 
			echo "<br><br><br>";
		}
	}
?>
<script>
$('[data-toggle="datepicker"]').datepicker(
{
  language: 'fr-FR',
  format: 'yyyy-mm-dd',
  weekStart: 1
});
</script>