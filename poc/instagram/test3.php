<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<!-- CSS Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- CSS Font awesome 5.8.2 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<!-- CSS commune PEH -->
	<link rel="stylesheet" href="../../peh/css/peh-commun.css">


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
</head>
<body>
<h1>test3.php : exploitation des images instagram rapatriées sur mon site perso penerhouet.com</h1>

<pre>
Fevrier 2021.
Recupérer ses photos publiées sur instagram devient très très compliqué.
Solution : 
- récupérer les photos instagram, les mettre dans un répertoire de mon site web, et afficher les 9 dernières.
Avantage :
- on s'affranchit des ruptures de services
</pre>

<?php
// On scanne le répertoire contenant les photos instagram (leur nom est préfixé par un numéro d'ordre exemple 106_149552880_195079932402319_4270988371897578827_n.jpg)
// On prend les 9 dernières
$nb_pictures = 9;

// calcul répertoire physique en fonction de la version de PHP
if (version_compare(phpversion(), '7.0.0', '<')) {
	$directory = realpath(__DIR__ . '/../..').'\peh\img\ig_peh';
} else {
	$directory = dirname(__DIR__,2).'\peh\img\ig_peh';
}

// tri descendant, sélection du nombre d'éléments souhaités
$scanned_directory = array_diff(scandir($directory,SCANDIR_SORT_DESCENDING), array('..', '.'));
$selection = array_chunk($scanned_directory, $nb_pictures);
$selection = $selection[0];
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>instagram</h3>
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
</div>

</body>
</html>

