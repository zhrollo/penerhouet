<?php
	// periode-liste.php : liste de périodes et évenements gCalendar associés
	// @param mode. Préciser ADD pour mode ajout période / événement. Si vide, liste simple
	// @param cible. Cas mode ADD uniquement. Préciser si on ajoute une période ou un événement. Respectivement periode ; event 
	// @param logout. Permet de resetter le token
	
	// Récupération paramètres mode & cible
	$mode = "";
	if (isset( $_GET['mode'])) {
		$mode = $_GET['mode'];
	}
	$cible = "";
	if (isset( $_GET['cible'])) {
		$cible = $_GET['cible'];
	}

	// http://localhost:8080/admin/index.php?p=periode-liste&logout
	// Traitement action logout
	if (isset($_GET['logout'])) {
		unset($_SESSION['token']);
	}
	
	// ---
	$tabLibJour[0]="Dim";
	$tabLibJour[1]="Lun";
	$tabLibJour[2]="Mar";
	$tabLibJour[3]="Mer";
	$tabLibJour[4]="Jeu";
	$tabLibJour[5]="Ven";
	$tabLibJour[6]="Sam";
	
	// On récupère la dernière période pour proposer de saisir une période équivalente en ajout 
	$query1 = "SELECT * FROM periode order by perDateMax DESC limit 1;";
	foreach($db->query($query1) as $row1) {			
		$dmin = new DateTime($row1["perDateMin"]);
		$dmax = new DateTime($row1["perDateMax"]);
		$interval = date_diff($dmin, $dmax);
		$duree = $interval->format('%d');
		if ($duree%7!=0) {
			// Si la durée précédente n'est pas multiple de 7
			$d2min = new DateTime($row1["perDateMax"]);
			$d2max = new DateTime($row1["perDateMax"]);
			$d2max->add(new DateInterval('P7D'));
		} else {
			$sInterval = 'P'. $duree.'D';
			$d2min = $dmin->add(new DateInterval($sInterval));
			$d2max = $dmax->add(new DateInterval($sInterval));
		}
		
		$defautDateMin = date_format($d2min, 'Y-m-d');
		$defautDateMax = date_format($d2max, 'Y-m-d');
		$defautTarif = $row1["perTarif"];
	}
	// Si la BDD on met la date du jour en date min & max
	if (!isset($row1)) {
		$defautDateMin = date_format(new DateTime(), 'Y-m-d');
		$defautDateMax = date_format(new DateTime(), 'Y-m-d');
		$defautTarif = 0;
	}
	


	// Instantiation
	require_once('./google-api.php');
	$gapi = new GoogleApi();

	// Traitement callback authentification google / gCalendar
	if(isset($_GET['code'])) {
		try {
			// Récupérer le token d'accès avec l'API
			$data = $gapi->GetAccessToken($cfg_gapp_client_id, $cfg_gapp_redirect_url, $cfg_gapp_client_secret, $_GET['code']);
			
			// Mise en session du token
			$_SESSION['token'] = $data['access_token'];
		}
		catch(Exception $e) {
			echo $e->getMessage();
			exit();
		}
	}

	// *** Si on n'est pas authentifié sur gCalendar on propose l'authentification
	if (!isset($_SESSION['token'])) {
		// Si pas authentifié...
		$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode($cfg_gapp_redirect_url) . '&response_type=code&client_id=' . $cfg_gapp_client_id . '&access_type=online';
		
?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		gCalendar n'est pas activé ! <a href="<?php echo $login_url ?>">Activer gCalendar maintenant.</a>
	</div>
<?php
	}

	// *** Si on est authentifié sur gCalendar on vérifie qu'on arrive bien à récupérer les événements
	// Si ça plante c'est que le token est périmé. On propose dans ce cas de resetter le token
	if (isset($_SESSION['token'])) {
		try {
			$retour = $gapi->GetEventList($cfg_gcalendar_id, $_SESSION['token']);
		} catch (Exception $e) {
			$retour=json_decode('{"items": []}',true);
?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Erreur token <a href="index.php?p=periode-liste&logout">Reset token</a>
	</div>	
<?php
		}
	}
?>		

<script type="text/javascript">
	// ???
	function majFinDateAdd() {
		var frm=document.getElementById("frmAddPeriode");
		frm.dateMax.selectedIndex=frm.dateMin.selectedIndex+7;
	}

	// ???
	function majFinDate() {
		var frm=document.getElementById("frmAddEvent");
		frm.fin_date.selectedIndex=frm.debut_date.selectedIndex+7;
	}
	
	// ???
	function verif() {
		var frm=document.getElementById("frmAddEvent");
		return (frm.fin_date.selectedIndex > frm.debut_date.selectedIndex);
	}
	
	// Sélectionner toutes les cases à cocher
	function toggle(source) {
		$("input[name='sel[]']").each( function () {
			$(this).prop( "checked", source.checked ); 
		});
	}
	
	// Suppression par lot de période
	function suppressionParLot() {
		var ids = "";
		$("input[name='sel[]']").each( function () {
			if ($(this).is(':checked')) {
				ids = ids + "," + $(this).val();
			}
		});
		if (ids!="") {
			if (confirm('Êtes-vous sûr de supprimer ?')) {
				ids=ids.substring(1);
				location = "index.php?p=periode-delete&id="+ids;
			}
		} else {
			alert ("Aucune case à cocher sélectionnée !");
		}
	}
	
	function validateFormAdd() {
		
		var testPeriodeOK = frmAddPeriode.dateMin.value<=frmAddPeriode.dateMax.value;
		if (!testPeriodeOK) {
			alert("La période est incorrecte. Date de début et fin incohérentes.");
		}
		return testPeriodeOK;
	}
</script>	

	<!-- Menu -->
	<h2>Périodes</h2>
<?php
// On affiche les champs pour l'ajout de période que si on n'est pas en mode edition sur une période
if ($mode=="ADD" && $cible=="periode") {
	$madate = date('Y-m-d');
	$tabDate=array();
	for ($s=0; $s<=$cfg_event_nb; $s++) {
		$tabDate[$s]=$madate;
		$madate = date('Y-m-d', strtotime("+1 day", strtotime($madate)));
	}	
?>
	<form id="frmAddPeriode" action="periode-add.php" onsubmit="return validateFormAdd()" method="post">
		<table class="table table-bordered table-striped" width="100%">		
			<tr>
				<td>Début</td>
				<td>
					<input data-toggle="datepicker" name="dateMin" value="<?php echo $defautDateMin; ?>" onchange="majFinDateAdd()">
				</td>
			</tr>
			<tr>
				<td>Fin</td>
				<td>
					<input data-toggle="datepicker" name="dateMax" value="<?php echo $defautDateMax; ?>">
				</td>
			</tr>
			<tr>
				<td>Tarif</td>
				<td>
					<input aria-describedby="eur" type="text" name="tarif" value="<?php echo $defautTarif; ?>" size="4"> EUR
				</td>
			</tr>
			<tr>
				<td>Nom locataire</td>
				<td><input class="form-control" type="text" name="titre" value="-" size="20"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td>
					<textarea class="form-control" name="description" rows="10"></textarea>
				</td>
			</tr>
			<tr>
				<td>Affichage</td>
				<td>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="affichageCheck" name="visible" value="1">
						<label class="form-check-label" for="affichageCheck">visible</label>
					</div>
				<!--	<input class="form-control" type="checkbox" name="visible" value="1" checked> visible -->
				</td>
			</tr>
			<tr>
				<td>Etat</td>
				<td>
					<select class="form-control" name="etat">
						<option value="1" checked>Disponible</option>
						<option value="0">Réservé</option>
						<option value="2">Indisponible</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Visible</td>
				<td>
					<select class="form-control" name="visible">
						<option value="1" checked>Visible</option>
						<option value="0">Masqué</option>
					</select>
				</td>
			</tr>			
			<tr>
				<td></td>
				<td>
					<input class="btn btn-primary" type="submit" name="formSubmit" value="Ajouter">
					<a class="btn btn-primary" href="index.php?p=periode-liste">Annuler</a>
				</td>
			</tr>
		</table>
	</form>		
<?php
} else {
?>
	<!-- Menu periodes -->
	<div class="dropdown">
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Actions...
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="index.php?p=periode-liste&mode=ADD&cible=periode">Ajouter</a>
			<a class="dropdown-item" href="javascript:suppressionParLot()" id="suppressionParLot">Supprimer</a>
<?php						
			// Affichage log in/log out google
			if (!isset($_SESSION['token'])) {
			?>
				<a class="dropdown-item" href="<?php echo $login_url ?>">Activer gCalendar</a>
			<?php
			} else {
				// Si authentifié...
			?>
				<a class="dropdown-item" href="index.php?p=periode-liste&logout">Désactiver gCalendar</a>
			<?php
			} // !isset($_SESSION['token']))
			?>
		</div>
	</div>
				
	
<?php
}
?>
	<table class="table table-bordered">
		<thead>
			<tr class="tr_header">
				<td><input type="checkbox" onClick="toggle(this)" /></td>
				<td></td>
				<td>Début</td>
				<td>Fin</td>
				<td>Tarif</td>
				<td>Nom locataire</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
<?php
	$query2 = "SELECT * FROM periode order by perDateMin;";
	$today = date("Y-m-d");


	/*traitement */

	$memo_date = "";
	foreach($db->query($query2) as $row2) {		
		
		/*
		On utilise 3 styles de ligne
		tr-nondispo : pour voir les périodes non disponibles
		tr-dispo : périodes dispos
		tr-perime : périodes passées qui étaient dispos (on ne pourra plus louer)
		*/
		if ($row2["perEtat"]==0) {
			if ($row2["perDateMin"] > $today) {
				$style_tr="nondispo";
			} else {
				$style_tr="nondispo-perime";
			}

			$lib_ajout_calendrier = "Ajout gCalendar";
			$lib_retrait_calendrier = "Libérer";
		}
		
		if ($row2["perEtat"]==1) {
			if ($row2["perDateMin"] > $today) {
				$style_tr="dispo";
			} else {
				$style_tr="dispo-perime";
			}
			
			$lib_ajout_calendrier = "Réserver";
			$lib_retrait_calendrier = "X";
		}
		
		if ($row2["perEtat"]==2) {
			$style_tr="indispo";
			
			$lib_ajout_calendrier = "Ajout gCalendar";
			$lib_retrait_calendrier = "Retrait gCalendar";
		}
?>	
		<tr class="tr-style-<?php echo $style_tr; ?> tr-visible<?php echo $row2["perVisible"]; ?>">
			<td><input type="checkbox" name="sel[]" value="<?php echo $row2["idPeriode"] ?>" /></td>
			<td>
				<?php if ($row2["perVisible"]==1) {?><i class="fa fa-eye fa-fw fa-lg"></i><?php } ?>
				<?php if ($row2["perVisible"]==0) {?><i class="fa fa-eye-slash fa-fw fa-lg"></i><?php } ?>

				<?php if ($row2["perEtat"]==2) {?><i class="fa fa-times-circle fa-fw fa-lg"></i><?php } ?>
				<?php if ($row2["perEtat"]==1) {?><i class="fa fa-check-circle fa-fw fa-lg"></i><?php } ?>
				<?php if ($row2["perEtat"]==0) {?><i class="fa fa-handshake fa-fw fa-lg"></i><?php } ?>
				
				<?php if ($row2["perEventUrl"]!="") {?><i class="fa fa-calendar fa-fw fa-lg" title="Calendrier présent"><?php } ?>
				<?php if (($row2["perEventUrl"]=="")&&($row2["perEtat"]!=1)) {?><i class="fa fa-exclamation-triangle fa-fw fa-lg" style="color:red" title="Attention il n'y a pas d'évenement gCalendar associé !"><?php } ?>

			</td>
		
			<td><?php
				// On affiche le date suivi du jour de la semaine
				$jourSemaine = $tabLibJour[date("w", strtotime($row2["perDateMin"]))];

				// le jour de la semaine est en rouge si pas samedi et pas une indispo...
				if (($jourSemaine!="Sam") && ($row2["perEtat"]!=2)) {
					$jourSemaine="<font color=\"red\">".$jourSemaine."</font>";
				}
				echo $jourSemaine." ".$row2["perDateMin"];
				
				// Ici on s'assure que la date de début de période est la même que la date de fin de la période précédante.
				// Autrement dit, que les dates se suivent et qu'il n'y a pas de trous dans le planning
				if (($row2["perDateMin"]!=$memo_date)&&($memo_date!="")) {
					echo "<font color=\"red\"><i class=\"fa fa-exclamation-triangle fa-fw fa-lg\" title=\"Les dates ne se suivent pas !\"></i></font>";
				}
				$memo_date=$row2["perDateMax"];
				?>
			</td>
			<td><?php 
				// On affiche le date suivi du jour de la semaine
				$jourSemaine = $tabLibJour[date("w", strtotime($row2["perDateMax"]))];
				// le jour de la semaine est en rouge si pas samedi et pas une indispo...
				if (($jourSemaine!="Sam") && ($row2["perEtat"]!=2)) {
					$jourSemaine="<font color=\"red\">".$jourSemaine."</font>";
				}
				echo "<span title=\"".$row2["perDuree"]." jours\">".$jourSemaine." ".$row2["perDateMax"]."</span>"; 
				if (($row2["perDuree"]%7!=0) && ($row2["perEtat"]!=2)) {
					echo "<font color=\"red\"><i class=\"fa fa-clock fa-fw fa-lg\" title=\"Durée de ".$row2["perDuree"]." jours !\"></i></font>";
				}
				?>
			</td>
			<td><?php
				if ($row2["perEtat"]!=2) {
					echo $row2["perTarif"];
				} else {
					echo "-";
				}
			?></td>
<?php
				if ($row2["perEventUrl"]!="") {
?>
			<td><a href="<?php echo $row2["perEventUrl"]; ?>" target="gCalendar" title="<?php echo $row2["perDescription"]; ?>"><?php echo $row2["perTitre"]; ?></a></td>
<?php
				} else {
?>
			<td><?php 
				$span="<span title=\"".$row2["perDescription"]."\">".$row2["perTitre"]."</span>";
				if (($row2["perEtat"]==1)&&($row2["perTitre"]!="-")) {
					echo "<font color=\"red\">".$span."</font>"; 
				} else {
					echo $span; 
				}
			?></td>	
<?php
				}
?>
			<td>
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Actions...
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item"href="index.php?p=periode-edit&id=<?php echo $row2["idPeriode"] ?>">Editer</a>
						<a class="dropdown-item"href="index.php?p=periode-delete&id=<?php echo $row2["idPeriode"] ?>" onClick="return confirm('Êtes-vous sûr de supprimer ?')">Supprimer</a>
						<?php
						if (isset($_SESSION['token'])) {
							if ($row2["perEventId"]=="") {
						?>
						<a class="dropdown-item" href="index.php?p=periode-liste&mode=ADD&cible=event&idPeriode=<?php echo $row2["idPeriode"] ?>&debut=<?php echo $row2["perDateMin"] ?>&fin=<?php echo $row2["perDateMax"] ?>&titre=<?php echo $row2["perTitre"] ?>&etat=<?php echo $row2["perEtat"] ?>&description=<?php echo urlencode($row2["perDescription"]) ?>#addevent"><?php echo $lib_ajout_calendrier; ?></a>
						<?php
							}
						}

						if (isset($_SESSION['token'])) {
							if ($row2["perEventId"]!="") {
						?>
								<a class="dropdown-item" href="periode-liberer.php?idPeriode=<?php echo $row2["idPeriode"] ?>&eventId=<?php echo $row2["perEventId"] ?>&etat=<?php echo $row2["perEtat"] ?>" onClick="return confirm('Êtes-vous sûr de libérer cette période ?')"><?php echo $lib_retrait_calendrier; ?></a>
						<?php
							}
						}
						?>	
					</div>
				</div>
			</td>			
		</tr>
<?php
	}
?>
	</tbody>
	</table>

<?php
if (isset($_SESSION['token'])) {
?>
	<h2>Evénements gCalendar</h2>
<?php
	if ($mode=="ADD" && $cible=="event") {
			// Dans le cas où on vient de "Réserver"
			$debut="";
			$fin="";
			$titre="XXX";
			$idPeriode="";
			$etat=1;
			if (isset($_GET["debut"])) {
				$debut=$_GET["debut"];
			}
			if (isset($_GET["fin"])) {
				$fin=$_GET["fin"];
			}
			if (isset($_GET["titre"])) {
				$titre=$_GET["titre"];
			}			
			if (isset($_GET["idPeriode"])) {
				$idPeriode=$_GET["idPeriode"];
			}
			if (isset($_GET["etat"])) {
				$etat=$_GET["etat"];
			}
			if (isset($_GET["description"])) {
				$description=urldecode($_GET["description"]);
			}
			if ((!isset($description))||($description=='')) {
				$description = $cfg_event_description;
			}
			
			// On crée un tableau 
			for ($i=0; $i<=5; $i++) {
				if (date("w") == $i){
					$delta = 6-$i;
					$madate = date('Y-m-d', strtotime("+".$delta." day"));
					break;
				}
			}
			$madate = date('Y-m-d', strtotime("-1 day", strtotime($madate)));
			$tabDate=array();
			for ($s=0; $s<=$cfg_event_nb; $s++) {
				$tabDate[$s]=$madate;
				$madate = date('Y-m-d', strtotime("+1 day", strtotime($madate)));
			}		
?>
			<form id="frmAddEvent" action="event-add.php" method="post">
				<table class="table table-bordered table-striped">
					<tr>
						<td>
							<a name="addevent"></a>Période
							<input type="hidden" name="etat" value="<?php echo $etat ?>" />
							<input type="hidden" name="idPeriode" value="<?php echo $idPeriode ?>" />
						</td>
						<td>
							<input data-toggle="datepicker" name="debut_date" value="<?php echo $debut; ?>" onchange="majFinDate()">
							<input type="text" name="debut_heure" value="<?php echo $cfg_event_heure_debut ?>" size="5" />
							&nbsp;à&nbsp;
							<input data-toggle="datepicker" name="fin_date" value="<?php echo $fin; ?>" onchange="verif()">
							<input type="text" name="fin_heure" value="<?php echo $cfg_event_heure_fin ?>" size="5" />
						</td>
					</tr>
					<tr>
						<td>Titre</td>
						<td><input type="text" name="titre" value="<?php echo $titre ?>" size="100" /> </td>
					</tr>
					<tr>
						<td>Description</td>
						<td>
							<textarea name="description" cols="100%" rows="10"><?php echo $description ?></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" class="btn btn-primary" name="formSubmit" value="Ajouter">
							<a href="index.php?p=periode-liste" class="btn btn-primary">Annuler</a>
						</td>
					</tr>
				</table>
			</form>		
<?php		
	}
?>
	<table class="table table-bordered table-striped">
		<thead>
			<tr class="tr_header">
				<td>Début</td>
				<td>Fin</td>
				<td>Titre</td>
				<td>Actions</td>
			</tr>
		</thead>	
		<tbody>
	<?php
	// On affiche les champs pour l'ajout de période que si on n'est pas en mode edition sur une période
	if ($mode=="ADD" && $cible=="event") {
	?>

	<?php
	} else {
	?>
		<div class="dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Actions...
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="index.php?p=periode-liste&mode=ADD&cible=event#addevent">Ajouter</a>
			</div>
		</div>
	<?php
	}
	
	if (isset($_SESSION['token'])) {
		$tz = new DateTimeZone($cfg_tz);
		foreach ($retour['items'] as $item) { 
			$id = $item['id'];
			$htmlLink = $item['htmlLink'];
			
			if (isset($item['start']['dateTime'])) {
				$start = $item['start']['dateTime'];
				$end = $item['end']['dateTime'];
				$dstart = new DateTime($start,$tz );
				$dend = new DateTime($end,$tz );
				$start2 = $dstart->format('Y-m-d');
				$end2 = $dend->format('Y-m-d');
			}
			
			if (isset($item['start']['date'])) {
				$start2 = $item['start']['date'];
				$end2 = $item['end']['date'];
			}
			
			$summary = "";
			if (isset($item['summary'])) {
				$summary = $item['summary'];
			}
	?>		
			<tr>
				<td><?php echo $start2 ?></td>
				<td><?php echo $end2 ?></td>
				<td><a href="<?php echo $htmlLink ?>" target="gCalendar"><?php echo $summary ?></a></td>
				<td>
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Actions...
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<!--<a class="dropdown-item" href="#" class="btn btn-primary a-btn-slide-text">Editer</span></a>-->
							<a class="dropdown-item" href="event-delete.php?eventId=<?php echo $item['id'] ?>" onClick="return confirm('Êtes-vous sûr de supprimer ?')" class="btn btn-primary a-btn-slide-text">Supprimer</a>
							<a class="dropdown-item" href="<?php echo $htmlLink ?>" class="btn btn-primary a-btn-slide-text" target="gCalendar">Voir (gCalendar)</span></a>
						</div>
					</div>
				</td>
			</tr>
<?php
		}
	}	
?>
		</tbody>
	</table>
<?php
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
