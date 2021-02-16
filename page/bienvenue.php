<?php
ob_start();
?>
<!-- bloc_css_instafeed -->
	<style>
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
		
		
			<!-- block instafeed -->
			<div class="row">
				<div class="col-md-12">
					<h3><?= _TXT_BNVN_INSTAGRAM ?></h3>
					<div id="instafeed"></div>
				</div>
			</div>
			<!-- /block instafeed -->
		</div>
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
ob_start();
?>
<!-- Début JS instafeed -->
<script type="text/javascript">
var token = '<?php echo $cfg_instagram_access_token; ?>',
    num_photos = 10, // maximum 20
    container = document.getElementById( 'instafeed' ), // it is our <ul id="rudr_instafeed">
    scrElement = document.createElement( 'script' );
 
window.mishaProcessResult = function( data ) {
	for( x in data.data ){
		container.innerHTML += '<a href="' + data.data[x].link + '" target="ig"><img class="animated flipInX" src="' + data.data[x].images.low_resolution.url + '"></a>';
	}
}
 
scrElement.setAttribute( 'src', 'https://api.instagram.com/v1/users/self/media/recent?access_token=' + token + '&count=' + num_photos + '&callback=mishaProcessResult' );
document.body.appendChild( scrElement );

</script>
<!-- Fin JS instafeed -->

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