<!DOCTYPE html>
<html lang="<?= $lg ?>">
<head>
	<!-- The below 3 meta tags *must* come first in the head; any other head content must come *after* these tags  -->
	<title><?= _SEO_TITLE ?><?= _SEO_SEP ?><?= $titre?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<!-- CSS Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- CSS Font awesome 5.8.2 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<!-- CSS commune PEH -->
	<link rel="stylesheet" href="<?= _ROOT ?>peh/css/peh-commun.css">
	
	<!-- PEH JS -->		
	<script src="<?= _ROOT ?>peh/js/peh.js"></script>
	
	<!-- optim index.php -->		
	<link rel="canonical" href="<?= $cfg_url._ROOT ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?= _ROOT ?>favicon.ico">
	<link rel="apple-touch-icon" href="<?= _ROOT ?>apple-touch-icon.png">

	<!-- SEO -->
	<meta name="description" content="<?= _SEO_DESC ?>" />
	<meta name="keywords" lang="<?= _SEO_KEYWORDS_LANG ?>" content="<?= _SEO_KEYWORDS_CONTENT ?>" />
	<!-- /SEO -->
	
	<!-- Début bloc_head -->
	<?= $bloc_head ?>
	<!-- Fin bloc_head -->
</head>
<body>
	<!-- Back to top button -->
	<a id="button" href="#"></a>
<?php	
// *** Affichage bandeau "Site en maintenance" si le site est en maintenance et que je suis le seul à voir les bonnes pages...
if (MAINTENANCE==1) {
?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Site en maintenance...
	</div>
<?php
}
?>
<?php
require "gabarit-navbar.php";
?>
<?php if ($bloc_erreur!="") {?>
	<!-- bloc_erreur -->
	<div class="container">
		<div class="messages">
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?= $bloc_erreur ?>
			</div>
		</div>	
	</div>	
	<!-- /bloc_erreur -->
<?php } ?>	