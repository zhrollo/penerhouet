<?php
	// contact-list.php : page liste de contacts
	
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
	
	<!-- Menu -->
	<h2>Contacts</h2>

<?php
	if ($mode!="LIGHT")	{
?>		
<!-- ### FORM AJOUT ### -->
<?php
if ($mode=="ADD") {
?>
	<form action="contact-add.php" method="post" class="tr_add">
		<table class="table table-bordred table-striped">
			<tr>
				<td>Email</td>
				<td><input type="text" name="conEmail" value="0john@doe.com"></td>
			</tr>
			<tr>
				<td>Nom</td>
				<td><input type="text" name="conNom" value=""></td>
			</tr>
			<tr>
				<td>Langue</td>
				<td>
					<input type="radio" name="conLangue" value="fr" checked> français<br/>
					<input type="radio" name="conLangue" value="en" > anglais<br/>
					<input type="radio" name="conLangue" value="de" > allemand<br/>
				</td>
			</tr>
			<tr>
				<td>Tag</td>
				<td><input type="text" name="conTag" value=""></td>
			</tr>
			<tr>
				<td>Année min</td>
				<td><input type="text" name="conAnneeMin" value="<?php echo _ANNEE_EN_COURS ?>" size="4"></td>
			</tr>
			<tr>
				<td>Année max</td>
				<td><input type="text" name="conAnneeMax" value="<?php echo _ANNEE_EN_COURS ?>" size="4"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" class="btn btn-primary" name="formSubmit" value="Ajouter">
					<a href="index.php?p=contact-liste" class="btn btn-primary">Annuler</a>
				</td>
			</tr>
		</table>
	</form>
	

	
<?php
} else {
?>
	<a href="index.php?p=contact-liste&mode=ADD"><i class="fas fa-plus"></i></a>
	&nbsp;&nbsp;
	<a href="index.php?p=contact-liste&mode=LIGHT"><i class="fas fa-file-export"></i></a>
<?php		
}
?>

	<table class="table table-bordred table-striped">
		<thead>
			<tr class="tr_header">
				<td>Email</td>
				<td>Nom</td>
				<td>Langue</td>
				<td>Tag</td>
				<td>AnneeMin</td>
				<td>AnneeMax</td>
				<td>Date</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
<?php
$query = "SELECT * FROM contact order by conEmail;";
$today = date("Y-m-d");	

foreach ($db->query($query) as $row) {
	if ($edit==$row["idContact"]) {
		
?>
			<tr>
				<td colspan="8" class="tr_update">
					<form action="contact-update.php" method="post">
						<table class="table table-bordred table-striped">
							<tr>
								<td>Mail</td>
								<td>
									<a name="pointeur"></a> <!-- pointeur pour se place sur la ligne -->
									<input type="hidden" name="idContact" value="<?php echo $row["idContact"]; ?>">
									<input type="text" name="conEmail" value="<?php echo $row["conEmail"]; ?>">
								</td>
							</tr>
							<tr>
								<td>Nom</td>
								<td>
									<input type="text" name="conNom" value="<?php echo $row["conNom"]; ?>">
								</td>
							</tr>
							<tr>
								<td>Langue</td>
								<td>
									<input type="radio" name="conLangue" value="fr" <?php if ($row["conLangue"]=="fr") echo "checked"; ?>> français<br/>
									<input type="radio" name="conLangue" value="en" <?php if ($row["conLangue"]=="en") echo "checked"; ?>> anglais<br/>
									<input type="radio" name="conLangue" value="de" <?php if ($row["conLangue"]=="de") echo "checked"; ?>> allemand<br/>
								</td>
							</tr>
							<tr>
								<td>Tag</td>
								<td>
									<input type="text" name="conTag" value="<?php echo $row["conTag"]; ?>">
								</td>
							</tr>
							<tr>
								<td>Année min</td>
								<td>
									<input type="text" name="conAnneeMin" value="<?php echo $row["conAnneeMin"]; ?>">
								</td>
							</tr>
							<tr>
								<td>Année Max</td>
								<td>
									<input type="text" name="conAnneeMax" value="<?php echo $row["conAnneeMax"]; ?>">
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input class="btn btn-primary" type="submit" name="formSubmit" value="Valider"> 
									<a href="index.php?p=contact-liste" class="btn btn-primary">Annuler</a>
								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
<?php
} else {
?>	
	<tr class="tr0">
		<td><?php echo $row["conEmail"]; ?></td>
		<td><?php echo $row["conNom"]; ?></td>
		<td><?php echo $row["conLangue"]; ?></td>
		<td><?php echo $row["conTag"]; ?></td>
		<td><?php echo $row["conAnneeMin"]; ?></td>
		<td><?php echo $row["conAnneeMax"]; ?></td>
		<td><?= $row["conDate"]; ?></td>
		<td>
			<a href="index.php?p=contact-liste&edit=<?php echo $row["idContact"] ?>#pointeur"><i class="fas fa-edit"></i></a>
			&nbsp;
			<a href="contact-delete.php?id=<?php echo $row["idContact"] ?>" onClick="return confirm('Êtes-vous sûr de supprimer ?')"><i class="fas fa-trash"></i></a>
		</td> 	
	</tr>
<?php
	}
}
?>
	</tbody>
</table>
<?php
	} // if ($mode!="LIGHT")	{
?>	
<?php
	if ($mode=="LIGHT")	{
		$query = "SELECT *, concat(conLangue,'-',CONVERT(greatest(conAnneeMax,conAnneeMin),char(6))) as last FROM contact order by last desc, conEmail;";
		
		$last="bidon";
		foreach ($db->query($query) as $row) {	
			if ($last!=$row["last"]) {
				$last=$row["last"];
				echo "<br/>";
				echo "<h3>*** ".$last."***</h3>";
			}
			if (!$row["conNom"]=="") {
				echo trim($row["conNom"])." &lt;".trim($row["conEmail"])."&gt;<br>"; 
			} else {
				echo trim($row["conEmail"])."<br>"; 
			}
		}
	}
?>

