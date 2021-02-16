<?php
// menu.php : Menu administration

?><!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php">PEH ADMIN V<?php echo APP_VERSION; ?></a> (proxy <?php echo (_PROXY==1 ? 'ON' : 'OFF'); ?>)
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item"><a class="nav-link" href="index.php?p=appreciation-liste">appreciations</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?p=contact-liste">contacts</a></li>	
			<li class="nav-item"><a class="nav-link" href="index.php?p=parametre-liste">paramètres</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?p=periode-liste">périodes</a></li>
		</ul>
	</div>
	
</nav>
<br/>
<br/>

