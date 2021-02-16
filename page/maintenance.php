<?php
ob_start();
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
header('X-Powered-By:');
?>
<!DOCTYPE html>
<html lang="<?= $lg ?>">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Pen-er-Houët</title>
	<meta name="robots" content="none" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSS Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">	
	<link rel="stylesheet" href="<?= _ROOT ?>peh/css/peh.css">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>
<body>
	<div id="content">
		<div align="center">
			<p style="font-family:'Poiret One'; font-weight:400; font-style:normal; font-size:50px"><?= _PEH_TITRE ?></p>
			<p><?= _HEAD_TITLE ?></p> 
			
		</div>

		<div class="container">
			<h2 class="page-header"><?= _TXT_MNTN_H2_TITRE ?></h2>
			<div class="row">
				<div class="col-md-6">
					<img src="<?= _ROOT ?>peh/img/bienvenue/peh-2018-facade-0068-1920-1137px.jpg" alt="" class="card-img-top">
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<div class="caption">
							<p><?= _TXT_MNTN_P_TEXTE ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>