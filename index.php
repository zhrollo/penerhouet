<?php
/* 
	index.php : la page principale qui récupère toutes les demandes
	
	le .htaccess nous communique en GET, deux paramètres
	- lg : la langue (fr, en, de)
	- p  : la page
*/

/* init */
/* affiche erreur trouvée */
$bloc_erreur="";
$bloc_content="";

$bloc_head="";
$bloc_foot="";
$bloc_js_google_stat="";

/* récupération de la conf */
/* - notamment _ROOT qui fait le lien entre le hostname et le root du site (exemple http://localhost:8080/2018/index.php ; le _ROOT doit être défini à /2018/) */
require "config.php";

/* Récupération des textes et URL liés à la langue */
require "lang.php";

/* A partir d'ici on a $lg, $p, $idx */


/* Récupération du code lié à la page */
$full_p = "page/".$p_fr.".php"; 
if (!file_exists ($full_p)) {
	//
	$bloc_erreur = "Erreur : page ".$p_fr." introuvable";
	
	// cas d'erreur, on affiche la home
	$idx=_IDX_HOME;
	$p=$transco_page_destination[$lg][$idx];
	$full_p = "page/".$p.".php"; 
}
require ($full_p);

if ($idx!=_IDX_MAINTENANCE) {
	/* 
		Fil d'ariane
		------------
		Le fil d'ariane permet d'injecter du texte dans
		- le titre HTML (balise <title> dans le <head>)
		- le texte dans le fil d'ariane sur deux niveaux pour toutes les pages <> de la home
		- le titre en balise <h2> pour que l'utilisateur se repère
	*/
	$fil_ariane = unserialize(_SERIALIZED_FIL_ARIANE);
	$fil_slashed = $fil_ariane[$idx];
	$items = explode("/", $fil_slashed);
	$nb_item = count($items);

	$parent = "";
	$titre = "";
	if ($nb_item==1) {
		$titre=$items[0];
	}
	if ($nb_item==2) {
		$parent = "<span class=\"breadcrumb-item\">".$items[0]."</span>";
		$titre=$items[1];
	}

	/* echo "<br><br><br>$lg - $p - $idx<br>"; */

	/* 
		SEO
		---
		Les textes des variables meta 
		
		<title><?= _SEO_TITLE ?><?= _SEO_SEP ?><?= $titre?></title>
		<meta name="description" content="<?= _SEO_DESC ?>" />
		<meta name="keywords" lang="<?= _SEO_KEYWORDS_LANG ?>" content="<?= _SEO_KEYWORDS_CONTENT ?>" />	
	*/
	$seo_desc = unserialize(_SERIALIZED_SEO_DESC);
	if (isset($seo_desc[$idx])) {
		define("_SEO_DESC", $seo_desc[$idx]);	
	} else {
		$bloc_erreur = "err_page _SEO_DESC[$idx] non défini.<br>".$bloc_erreur;
	}

	$seo_keywords_content = unserialize(_SERIALIZED_SEO_KEYWORDS_CONTENT);
	if (isset($seo_keywords_content[$idx])) {
		define("_SEO_KEYWORDS_CONTENT", $seo_keywords_content[$idx]);
	} else {
		$bloc_erreur = "err_page _SEO_KEYWORDS_CONTENT[$idx] non défini.<br>".$bloc_erreur;
	}


	/*
		Affichage du gabarit de page
		----------------------------
		Permet à ce que toutes les pages aient la même navigation
		- header
			- title
			- balises SEO
		- body
			- nav
			- breadcrumb
			- titre h2
			- contenu
		- footer
	*/

	if ($idx==_IDX_HOME) { 	
		require "gabarit-home.php";
	} else {
		require "gabarit.php";
	}
}
?>