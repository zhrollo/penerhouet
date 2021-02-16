<?php
/* 
	lang.php : la page qui gère les langues
	- $_GET["lg"] : la langue (fr, en, de)
*/

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

/* Récupération du paramètre langue */
$lg="";
if (isset($_GET["lg"])) {
	$lg=$_GET["lg"];
}

$var_lang='lg';
$rep_lang='lang';

if(empty($_SESSION[$var_lang])) {
    $_SESSION[$var_lang] = "fr";
}

if(empty($_GET[$var_lang])) {
    $_SESSION[$var_lang] = "fr";
} else {
    switch($_GET[$var_lang]) {
        case "fr":
        $_SESSION[$var_lang] = "fr";
        break;
        case "en":
        $_SESSION[$var_lang] = "en";
        break;
        case "de":
        $_SESSION[$var_lang] = "de";
        break;		
        default :
        $_SESSION[$var_lang] = "fr"; //au cas ou quelqu'un rentre autre chose que fr/en ou de
        break;
    }
}
$lg= $_SESSION[$var_lang];

/* Commun - HTML */
define("_LANG",$lg."/");



/* Récupération des URL des pages pour l'ensemble des langues */
include("lang/fr/fr_url.php");
include("lang/en/en_url.php");
include("lang/de/de_url.php");

$transco_page_destination = array_merge($transco_page_destination_fr, $transco_page_destination_en, $transco_page_destination_de);


/* Récupération de la page recherchée */
$p="";
if (isset($_GET["p"])) {
	$p=$_GET["p"];
}
if ($p=="") {
	$p=$transco_page_destination[$lg][_IDX_HOME];
}

// Si on est en mode maintenance, 
if (MAINTENANCE==1) {
	// Si l'IP du client n'est pas incluse dans la liste des IP connues du mainteneur
	if (strpos(MAINTENANCE_IP, get_client_ip())!==false) {
	} else {
		// on redirige sur la page maintenance sauf
		$p=$transco_page_destination[$lg][_IDX_MAINTENANCE];
	}
}

/* On calcule toutes les URL pour la langue */
define("_URL_HOME",$transco_page_destination[$lg][_IDX_HOME]);
define("_URL_LA_MAISON_EN_IMAGES",$transco_page_destination[$lg][_IDX_LA_MAISON_EN_IMAGES]);
define("_URL_DESCRIPTIF",$transco_page_destination[$lg][_IDX_DESCRIPTIF]);
define("_URL_SITUATION",$transco_page_destination[$lg][_IDX_SITUATION]);
define("_URL_RESERVATION",$transco_page_destination[$lg][_IDX_RESERVATION]);
define("_URL_RESERVEZ",$transco_page_destination[$lg][_IDX_RESERVEZ]);
define("_URL_RESERVEZ2",$transco_page_destination[$lg][_IDX_RESERVEZ2]);
define("_URL_LIVRE_D_OR",$transco_page_destination[$lg][_IDX_LIVRE_D_OR]);
define("_URL_QUESTION_FREQUENTES",$transco_page_destination[$lg][_IDX_QUESTION_FREQUENTES]);
define("_URL_ALENTOURS",$transco_page_destination[$lg][_IDX_ALENTOURS]);
define("_URL_LOCMARIAQUER",$transco_page_destination[$lg][_IDX_LOCMARIAQUER]);
define("_URL_ESCAPADES",$transco_page_destination[$lg][_IDX_ESCAPADES]);
define("_URL_CONTACTEZ_LE_PROPRIETAIRE", $transco_page_destination[$lg][_IDX_CONTACTEZ_LE_PROPRIETAIRE]);
define("_URL_DONNEZ_VOTRE_AVIS",$transco_page_destination[$lg][_IDX_DONNEZ_VOTRE_AVIS]);
define("_URL_MENTIONS_LEGALES",$transco_page_destination[$lg][_IDX_MENTIONS_LEGALES]);
define("_URL_CGV",$transco_page_destination[$lg][_IDX_CGV]);
define("_URL_COMPLET",$transco_page_destination[$lg][_IDX_COMPLET]);
define("_URL_RGPD",$transco_page_destination[$lg][_IDX_RGPD]);

/* On récupère les textes pour la langue */
$fichier_langage = $rep_lang."/".$lg."/".$lg."_txt.php";
include($fichier_langage);

/*
	$p0 : désigne la page saisie dans l'URL
	$p : désigne la page alias qui est la page référente
	$p_fr : équivalent de la page en FR
	$p_en : équivalent de la page en EN
	$p_de : équivalent de la page en DE
*/
$p0=$p;
$p_fr = $p;
$p_en = $p;
$p_de = $p;
$idx=-1;
foreach ($transco_page_destination as $key => $value) {
	foreach ($value as $key2 => $value2) {
		if ($p==$value2) {
			$idx=$key2;
		}
	}
}
if ($idx!=-1 && isset($transco_page_destination[$lg][$idx])) {
	$p = $transco_page_destination[$lg][$idx];
	$p_fr = $transco_page_destination["fr"][$idx];
	$p_en = $transco_page_destination["en"][$idx];
	$p_de = $transco_page_destination["de"][$idx];
	
	/* Cas particulier si on vient de la page réservation indisponible 
	*/
	if(isset($_GET["mode"])) {
		$query_mode="?mode=".$_GET["mode"];
	}
	else {	
		$query_mode="";
	}
}

/* A partir d'ici on a les textes et les URL */
?>