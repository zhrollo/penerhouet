<?php
ob_start();
?>
<!-- bloc_css_instafeed -->
	<style>
		#instafeed img {
			width:300px;
		}
				
		#instafeed a {
		  padding:5px 5px 1px 5px;
		  margin:10px;
		  border:1px solid #e1e1e1;
		  display:inline-block;
		  border-radius: 4px;
		  position:relative;
		}
		#instafeed .likes {
		  background:rgba(222,89,135,0.8);
		  font-family:sans-serif;
		  font-size:1em;
		  position:absolute;
		  color:#ffffff;
		  right:5px;
		  top:5px;
		  left:5px;
		  opacity:0;
		  text-align:center;
		  line-height:150px;
		  text-shadow:0 1px rgba(0,0,0,0.5);
		  -webkit-font-smoothing:antialiased;
		  -webkit-transition: opacity 100ms ease;
			-moz-transition: opacity 100ms ease;
			-o-transition: opacity 100ms ease;
			-ms-transition: opacity 100ms ease;
			transition: opacity 100ms ease;
		}
		#instafeed a:hover .likes {
		  opacity:1;
		}
		
	</style>
<!-- /bloc_css_instafeed -->
	<link rel="stylesheet" href="<?= _ROOT ?>peh/css/peh-bienvenue.css">
<?php
$bloc_head=ob_get_contents();
ob_end_clean();

ob_start();
?>
<!-- bloc_content : Maison grand format -->

		<div class="jumbotron jumbotron-fluid">
			<div class="container push-spaces">
				<h1 class="display-4">Pen-er-Houët</h1>
				<h2 class="lead">Maison de vacances à Locmariaquer</h2>
			</div>
			
			<a href="#debut" class="arrow-down">
                <div class="arrow-container"><i class="fa fa-chevron-down fa-2x" style="color:#fff"></i></div>
            </a>
		</div>
		
		<div class="container">
			<span id="debut"></span>
			<h2>Bienvenue à Pen-er-Houët !</h2>
			
			
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<a href="<?= _ROOT._LANG._URL_LA_MAISON_EN_IMAGES ?>"><img class="card-img-top" src="<?= _ROOT ?>peh/img/bienvenue/visuel1.jpg" alt="<?= _TXT_BNVN_ALT_BLOC1 ?>"></a>
						<div class="card-body">
							<h3 class="card-title"><?= _TXT_BNVN_BLOC1_H3 ?></h3>
							<p class="card-text"><?= _TXT_BNVN_BLOC1_P ?></p>
							<a href="<?= _ROOT._LANG._URL_LA_MAISON_EN_IMAGES ?>" class="btn btn-primary"><?= _TXT_BNVN_BLOC1_BOUTON ?></a> 
						</div>
					</div>
				</div>
				<div class="col-sm-6 secondcard">
					<div class="card">
						<a href="<?= _ROOT._LANG._URL_ALENTOURS ?>"><img class="card-img-top" src="<?= _ROOT ?>peh/img/bienvenue/visuel2.jpg" alt="<?= _TXT_BNVN_ALT_BLOC2 ?>"></a>
						<div class="card-body">
							<h3 class="card-title"><?= _TXT_BNVN_BLOC2_H3 ?></h3>
							<p class="card-text"><?= _TXT_BNVN_BLOC2_P ?></p>
							<a class="btn btn-primary" href="<?= _ROOT._LANG._URL_ALENTOURS ?>" class="btn btn-primary"><?= _TXT_BNVN_BLOC2_BOUTON ?></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<a href="<?= _ROOT._LANG._URL_RESERVEZ ?>"><img class="card-img-top" src="<?= _ROOT ?>peh/img/bienvenue/visuel3.jpg" alt="<?= _TXT_BNVN_ALT_BLOC3 ?>"></a>
						<div class="card-body">
							<h3 class="card-title"><?= _TXT_BNVN_BLOC3_H3 ?></h3>
							<p class="card-text"><?= _TXT_BNVN_BLOC3_P ?></p>
							<a href="<?= _ROOT._LANG._URL_RESERVEZ; ?>" class="btn btn-primary"><?= _TXT_BNVN_BLOC3_BOUTON ?></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 secondcard">
					<div class="card">
						<a href="javascript:appreciation()"><img class="card-img-top" src="<?= _ROOT ?>peh/img/bienvenue/visuel4.jpg" alt="<?= _TXT_BNVN_ALT_BLOC4 ?>"><a/>
						<div class="card-body">
							<h3 class="card-title"><?= _TXT_BNVN_BLOC4_H3 ?></h3>
							<blockquote class="blockquote">
								<h4><b><span class="app_titre"></span></b></h4>
								<p id="star" ></p>
								<p class="app_texte"></p>
								<footer class="blockquote-footer"><span class="app_nom"></span> ; <cite title="<?= _TXT_BNVN_BLOC4_SOURCE ?>"><span class="app_source"></span></cite></footer>
							</blockquote>
							<a href="javascript:appreciation();" class="btn btn-primary"><?= _TXT_BNVN_BLOC4_BOUTON ?></a>
							<span id="appreciation-refresh"><i class=""></i></span>
						</div>
					</div>
				</div>
			</div>
		

<?php
// On scanne le répertoire contenant les photos instagram (leur nom est préfixé par un numéro d'ordre exemple 106_149552880_195079932402319_4270988371897578827_n.jpg)
// On prend les 9 dernières
$nb_pictures = 9;

// calcul répertoire physique en fonction de la version de PHP
if (version_compare(phpversion(), '7.0.0', '<')) {
	$directory = realpath(__DIR__ . '/..').'\peh\img\ig_peh';
} else {
	$directory = dirname(__DIR__,1).'\peh\img\ig_peh';
}

// tri descendant, sélection du nombre d'éléments souhaités
$scanned_directory = array_diff(scandir($directory,SCANDIR_SORT_DESCENDING), array('..', '.'));
$selection = array_chunk($scanned_directory, $nb_pictures);
$selection = $selection[0];
?>

			<!-- block instafeed -->
			<div class="row">
				<div class="col-md-12">
					<h3><?= _TXT_BNVN_INSTAGRAM ?></h3>
					<div id="instafeed">
						<?php
							foreach ($selection as $filename) {
						?>
						<a href="https://www.instagram.com/pen_er_houet/" target="ig"><img class="animated flipInX" src="../../peh/img/ig_peh/<?php echo $filename ; ?>"></a>
						<?php
						}
						?>						
					</div>
				</div>
			</div>
			<!-- /block instafeed -->
		</div>
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
ob_start();
?>




<!-- Début JS appreciation -->
<script type="text/javascript">
function appreciation() {
	// On affiche le spinner et on fait tourner 
	$( '#appreciation-refresh' ).addClass("fas fa-spinner fa-2x fa-spin");
	$.ajax({
		type: "GET",
		url: "/api/appreciations.php?lg=fr",
		cache: false,
		success: function(data){
			
			var i=Math.floor(Math.random()*data.length);
			$('span.app_titre').text(data[i].titre);
			$('p.app_texte').html(data[i].texte.replace('\\n','<br/>').replace('\n','<br/>'));
			$('span.app_nom').text(data[i].signature);
			$('span.app_source').text(data[i].source+" - "+data[i].date_sejour.substr(8,2)+"/"+data[i].date_sejour.substr(5,2)+"/"+data[i].date_sejour.substr(0,4));
			
			// Ajout des étoiles
			var val = parseFloat(data[i].note);
			var i;
			var textStar='';
			for (i = 0; i < val; i++) { 
				textStar += '<i class="fas fa-star"></i>';
			}
			$('p#star').html(textStar);
		}
	});
	// On efface le spinner
	$( '#appreciation-refresh' ).removeClass("fas fa-spinner fa-2x fa-spin");
}

appreciation();
</script>	
<!-- Fin JS appreciation -->
<?php
$bloc_foot=ob_get_contents();
ob_end_clean();
?>