<?php
	// accueil-admin.php : page d'accueil pour l'admin

	// Function to get the client IP address
	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

// Si on est en mode maintenance, 
if (MAINTENANCE==1) {
	$lignes="";
	// Si l'IP du client n'est pas incluse dans la liste des IP connues du mainteneur
	if (strpos(MAINTENANCE_IP, get_client_ip())!==false) {
		$lignes=$lignes."<b>Attention, le mode maintenance est activé et vous êtes le seul à voir le site penerhouet normalement !</b><br>";
	} else {
		$lignes=$lignes."<b>Attention, le mode maintenance est activé.</b><br>";
	}
	$lignes=$lignes."Votre IP = [".get_client_ip()."] ; ";
	$lignes=$lignes."Les IP déclarées pour les mainteneurs = [".MAINTENANCE_IP."]<br\>";
?>	
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?= $lignes ?>
	</div>
<?php
}
?>

<div class="card-columns">

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Abritel</h5>
			<p class="card-text">
				<a href="https://www.abritel.fr/pxe/feed/731.875167.1032660" target="abritel">Admin annonce Abritel</a><br/>
				<a href="https://www.abritel.fr/pxcalendars/rates/731.875167.1032660" target="abritel">Admin annonce Abritel / price maker</a><br/>
				<a href="https://www.abritel.fr/location-vacances/p875167" target="abritel">Annonce Abritel</a>
			</p>
		</div>
	</div>
	
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">AirBnb</h5>
			<p class="card-text">
				<a href="https://www.airbnb.fr/hosting" target="airbnb">Admin annonce AirBNB</a><br/>
				<a href="https://www.airbnb.fr/rooms/12458398" target="airbnb">Annonce AirBNB</a><br/>
			</p>
		</div>
	</div>
	
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Tripadvisor</h5>
			<p class="card-text">
				<a href="https://rentals.tripadvisor.com" target="ta">Admin annonce Tripadvisor</a><br>
				<a href="https://www.tripadvisor.fr/VacationRentalReview-g425018-d10355835-Pen_er_Houet_Maison_de_charme-Locmariaquer_Morbihan_Brittany.html" target="ta">Annonce tripadvisor</a><br>
			</p>
		</div>
	</div>
	
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Réseaux sociaux</h5>
			<p class="card-text">
				<a href="https://twitter.com/penerhouet" target="tw">twitter</a><br/>
				<a href="https://www.instagram.com/pen_er_houet/" target="ig">instagram</a><br/>
				<a href="https://www.facebook.com/penerhouet/" target="fb">facebook</a><br/>
			</p>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Statistiques</h5>
			<p class="card-text">
				<a href="https://analytics.google.com/analytics/web/ " target="gg">Google stats</a><br/>
				<a href="https://insights.hotjar.com/sites/1335667/dashboard " target="hj">hotjar</a><br/>
			</p>
		</div>
	</div>

	
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Hébergement</h5>
			<p class="card-text">
				<a href="<?php echo _PHPMYADMIN_URL; ?>" target="phpmyadmin" target="sql">phpMyAdmin</a><br/>
				<a href="index.php?p=phpinfo" target="php">phpinfo</a><br/>
			</p>
		</div>
	</div>

	
</div>

