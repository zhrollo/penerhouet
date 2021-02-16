<?php
	// parametre-liste.php : page liste de paramètres
	
	/* Récupération paramètres edit & mode */
	$edit = "";
	if (isset( $_GET['edit'])) {
		$edit = $_GET['edit'];
	}
	
	$mode = "";
	if (isset( $_GET['mode'])) {
		$mode = $_GET['mode'];
	}

?>
	<h2>Paramètres</h2>
<?php
		if ($mode=="ADD") {
?>
			<form action="parametre-add.php" method="post">
				<table class="table table-bordred table-striped">
					<tr>
						<td>Nom</td>
						<td><input type="text" name="parNom" value=""></td>
					</tr>
					<tr>
						<td>Valeur</td>
						<td><input type="text" name="parValeur" value=""></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input class="btn btn-primary" type="submit" name="formSubmit" value="OK"> 
							<a href="index.php?p=parametre-liste" class="btn btn-primary">Annuler</a>
						</td>
					</tr>
				</table>
			</form>
<?php
	}
?>
				<!-- Menu -->
				<table class="table table-bordred table-striped">
					<thead>
						<tr class="tr_header">
							<td>Nom</td>
							<td>Valeur</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
						<!-- ### FORM AJOUT ### -->
						<?php
						if ($mode=="ADD") {
						?>
						<?php
						} else {
						?>
							<a href="index.php?p=parametre-liste&mode=ADD"><i class="fas fa-plus"></i></a>
						<?php
						}

						date_default_timezone_set( 'Europe/Paris' );
						$query = "SELECT * FROM parametre order by parNom;";
						$today = date("Y-m-d");	

						foreach ($db->query($query) as $row) {
							if ($edit==$row["idParam"]) {
								
						?>
								<tr>
									<td class="tr_update" colspan="3">
										<form action="parametre-update.php" method="post">
											<table class="table table-bordred table-striped">
												<tr>
													<td>Nom paramètre</td>
													<td>
														<!-- pointeur pour se place sur la ligne --><a name="pointeur"></a>
														<input type="hidden" name="idParam" value="<?php echo $row["idParam"]; ?>">
														<input type="text" name="parNom" value="<?php echo $row["parNom"]; ?>">
													</td>
												</tr>
												<tr>
													<td>Valeur</td>
													<td>
														<input type="text" name="parValeur" value="<?php echo $row["parValeur"]; ?>">
													</td>							
												</tr>
												<tr>
													<td></td>
													<td>
														<input type="submit" name="formSubmit" value="OK" class="btn btn-primary"> 
														<a href="index.php?p=parametre-liste" class="btn btn-primary">Annuler</a>
													</td>
												</tr>
											</table>
										</form>
									</td>
								</tr>
							<?php
							} else {
							?>	
							<tr>
								<td><?php echo $row["parNom"]; ?></td>
								<td><?php echo $row["parValeur"]; ?></td>
								<td>
									<a href="index.php?p=parametre-liste&edit=<?php echo $row["idParam"] ?>#pointeur"><i class="fas fa-edit"></i></a>
									&nbsp;
									<a href="parametre-delete.php?id=<?php echo $row["idParam"] ?>" onClick="return confirm('Êtes-vous sûr de supprimer ?')"><i class="fas fa-trash"></i></a></td>
							</tr>
				<?php
							}
						}
		?>
				</tbody>
		</table>

<?php
	echo "<hr>";
	if ($mode=="LIGHT")	{
		$query = "SELECT * FROM parametre order by parNom;";
		foreach ($db->query($query) as $row) {	
			echo "n°".$row["idParam"]."<br>";
			echo $row["parNom"]."<br>";
			echo $row["parValeur"]."<br>"; 
			echo "<br><br><br>";
		}
	}
?>			