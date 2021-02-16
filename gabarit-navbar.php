<!-- Début barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?= _ROOT._LANG ?>"><span style="font-family:'Poiret One'; font-weight:400; font-style:normal; font-size:30px"><?= _PEH_TITRE ?></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _MENU_LA_MAISON ?></a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="<?= _ROOT._LANG._URL_LA_MAISON_EN_IMAGES ?>"><?= _MENU_LA_MAISON_EN_IMAGES ?></a>
				  <a class="dropdown-item" href="<?= _ROOT._LANG._URL_DESCRIPTIF ?>"><?= _MENU_DESCRIPTIF ?></a>
				  <a class="dropdown-item" href="<?= _ROOT._LANG._URL_SITUATION ?>"><?= _MENU_SITUATION ?></a>
				  <a class="dropdown-item" href="<?= _ROOT._LANG._URL_RESERVEZ ?>"><?= _MENU_TARIF ?></a>
				  <a class="dropdown-item" href="<?= _ROOT._LANG._URL_LIVRE_D_OR ?>"><?= _MENU_LIVRE_D_OR ?></a>
				  <a class="dropdown-item" href="<?= _ROOT._LANG._URL_QUESTION_FREQUENTES ?>"><?= _MENU_QUESTION_FREQUENTES ?></a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= _MENU_DECOUVREZ_LE_GOLFE ?></a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
					<a class="dropdown-item" href="<?= _ROOT._LANG._URL_ALENTOURS ?>"><?= _MENU_ALENTOURS ?></a>
					<a class="dropdown-item" href="<?= _ROOT._LANG._URL_LOCMARIAQUER ?>"><?= _MENU_LOCMARIAQUER ?></a>
					<a class="dropdown-item" href="<?= _ROOT._LANG._URL_ESCAPADES ?>"><?= _MENU_ESCAPADES ?></a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= _ROOT._LANG._URL_CONTACTEZ_LE_PROPRIETAIRE ?>"><?= _MENU_CONTACTEZ_LE_PROPRIETAIRE ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= _ROOT._LANG._URL_RESERVEZ ?>"><?= _MENU_RESERVEZ ?></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img id="imgNavSel" src="<?= _ROOT ?>peh/img/commun/<?= $lg ?>.gif" alt="..." class="img-thumbnail icon-small"> <?= _MENU_LANGAGE?></a>
				<div class="dropdown-menu" aria-labelledby="dropdown09">
					<a class="dropdown-item" href="<?= _ROOT ?>fr/<?= $p_fr ?><?= $query_mode ?>"><img id="imgNavFra" src="/peh/img/commun/fr.gif" alt="..." class="img-thumbnail icon-small"> <?= _MENU_LANGAGE_FR ?></a>
					<a class="dropdown-item" href="<?= _ROOT ?>en/<?= $p_en ?><?= $query_mode ?>"><img id="imgNavEng" src="/peh/img/commun/en.gif" alt="..." class="img-thumbnail icon-small"> <?= _MENU_LANGAGE_EN ?></a>
					<a class="dropdown-item" href="<?= _ROOT ?>de/<?= $p_de ?><?= $query_mode ?>"><img id="imgNavDeu" src="/peh/img/commun/de.gif" alt="..." class="img-thumbnail icon-small"> <?= _MENU_LANGAGE_DE ?></a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<!-- Fin barre de navigation -->
