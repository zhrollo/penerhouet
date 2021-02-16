<?php
	// periode-edit.php : Edition d'une période
?>
<h2>Périodes - edit</h2>

<?php
	// Requête
	$query = "SELECT * FROM periode where idPeriode=".$_GET["id"].";";
	foreach($db->query($query) as $row) {}
	$id = $row["idPeriode"];
	
	// On récupère l'événement gCalendar associé
	if ((isset($_SESSION['token']))&&($row["perEventId"]!="")) {
		require_once('./google-api.php');
		$gapi = new GoogleApi();
		$tz = new DateTimeZone($cfg_tz);
		$evt = $gapi->GetEvent($cfg_gcalendar_id, $row["perEventId"], $_SESSION['token']);
	}
?>
<form action="periode-update.php" method="post">
	<tr class="tr_update">
		<td colspan="8">
			<table class="table table-bordered table-striped" width="100%">
				<tr>
					<td>
						Début
					</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $row["idPeriode"]; ?>" size="10">
						<input data-toggle="datepicker" name="dateMin" value="<?php echo $row["perDateMin"]; ?>" >
					</td>
				</tr>
				<tr>
					<td>
						Fin
					</td>
					<td>
						<input data-toggle="datepicker" name="dateMax" value="<?php echo $row["perDateMax"]; ?>">
					</td>
				</tr>
				<tr>
					<td>
						Durée
					</td>
					<td>
						<?php echo $row["perDuree"]; ?>&nbsp;jours
					</td>
				</tr>
				<tr>
					<td>
						Tarif
					</td>
					<td>
						<input type="text" name="tarif" value="<?php echo $row["perTarif"]; ?>" size="4">&nbsp;EUR
					</td>
				</tr>
				<tr>
					<td>Nom locataire</td>
					<td>
						<input type="text" name="titre" value="<?php echo $row["perTitre"]; ?>" size="20">
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<textarea class="form-control" name="description" rows="10"><?php echo $row["perDescription"]; ?></textarea>
					</td>
				</tr>
				<?php if (isset($evt)) { ?>
				<tr>
					<td>Description gCalendar</td>
					<td>
						<textarea class="form-control" name="description2" rows="10"><?php echo $evt["description"] ?></textarea>
					</td>
				</tr>				
				<?php } ?>
				<tr>
					<td>
					</td>
					<td>
						<?php 
						if ($row["perVisible"]==0) {
						?>
							<input type="checkbox" name="visible" value="1">
						<?php
						} else {
						?>
							<input type="checkbox" name="visible" value="1" checked>
						<?php
						}
						?>
						&nbsp;Visible
					</td>
				</tr>
				<tr>
					<td>
						Disponible
					</td>
					<td>
						<select name="etat">
							<option value="1" <?php if ($row["perEtat"]==1) echo "selected"; ?>>Disponible</option>
							<option value="0" <?php if ($row["perEtat"]==0) echo "selected"; ?>>Réservé</option>
							<option value="2" <?php if ($row["perEtat"]==2) echo "selected"; ?>>Indisponible</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Id événement GCalendar
					</td>
					<td>
						<input type="text" name="eventId" value="<?php echo $row["perEventId"]; ?>" size="40">
					</td>
				</tr>
				<tr>
					<td>
						URL événement GCalendar
					</td>
					<td>
						<input type="text" name="eventUrl" value="<?php echo $row["perEventUrl"]; ?>" size="130">
					</td>
				</tr>								
				<tr>
					<td>
						
					</td>
					<td>
						<input class="btn btn-primary" type="submit" name="formSubmit" value="OK">
						<a class="btn btn-primary" href="index.php?p=periode-liste">Annuler</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</form>
<script>
$('[data-toggle="datepicker"]').datepicker(
{
  language: 'fr-FR',
  format: 'yyyy-mm-dd',
  weekStart: 1
});
</script>