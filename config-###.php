<?php
/* 
	config.php : la configuration
*/

// Paramètre version
define('APP_VERSION', '1.06');

// paramètre MAINTENANCE modifiable
// - Mettre 0 pour que le site internet soit opérationnel
// - Mettre 1 pour déclarer le site en maintenance (tout le monde verra le site en maintenance sauf le poste ayant pour IP "MAINTENANCE_IP")
define('MAINTENANCE', 0);

// paramètre MAINTENANCE_IP modifiable
// - Mettre mon IP actuelle, ce qui me permet de pouvoir tester le site alors que toutes les autres IP voient le site en maintenance
// - ::1       = localhost en IPv6 (chrome)
// - 127.0.0.1 = localhost en IPv4 (FF)
define('MAINTENANCE_IP', '﻿﻿﻿﻿﻿::1,127.0.0.1');
//define('MAINTENANCE_IP', '﻿﻿﻿﻿﻿');

// Définition de la timezone - ne pas modifier
$cfg_tz = "Europe/Paris";
date_default_timezone_set($cfg_tz);
	
// Les différents sites - ne pas modifier
define('DEVELOPMENT', 'localhost');
define('PRODUCTION', 'penerhouet.com');

// recaptcha v3
// Google invisible ReCAPTCHA
// Déclaré via : https://www.google.com/recaptcha/admin#list
$cfg_recaptcha_site_key2 = '###';
$cfg_recaptcha_secret2 = '###';	

// Configuration dépendante du site
switch ($_SERVER['SERVER_NAME']) {
	case DEVELOPMENT:
		define("_ROOT","/");
		
		// Configuration MySQL
		$cfg_url = "http://localhost:8080";
		$cfg_bdd_host="localhost:3307";
		$cfg_bdd_user="root";
		$cfg_bdd_pass="###";
		$cfg_bdd_base="###";
		
	

		// Google Stats
		$bloc_js_google_stat = "
		<!-- Google Analytics OFF -->
		";
		
		// Google calendar id
		// Identifiant du calendrier "test localhost pour PEH"
		$cfg_gcalendar_id='###';

		// Emails de notification
		$cfg_mail_to = array(
		  "sam@yopmail.com"
		);
		
		// Proxy
		define("_PROXY","1");
		define("_PROXY_URL","###");
		define("_PROXY_PORT","8080");
		define("_PROXY_USERPWD","###:###");
		define("_PROXY_TYPE","HTTP");

		// phpMyAdmin
		define("_PHPMYADMIN_URL","http://localhost:8080/phpmyadmin/");
		break;

	default:
		define("_ROOT","/");

		// Configuration MySQL
		$cfg_url = "###";
		$cfg_bdd_host="###";
		$cfg_bdd_user="###";
		$cfg_bdd_pass="###";
		$cfg_bdd_base="###";	

		// Google Stats
		$bloc_js_google_stat = "###";

		// Emails de notification
		$cfg_mail_to = array(
		"###",
		"###"
		);
		
		// Google calendar id
		// Identifiant du calendrier "Reservations PEN ER HOUET"
		$cfg_gcalendar_id='###';
		
		/* Conf proxy */
		define("_PROXY","0");
		define("_PROXY_URL","");
		define("_PROXY_PORT","");
		define("_PROXY_USERPWD","");
		define("_PROXY_TYPE","");

		// phpMyAdmin
		define("_PHPMYADMIN_URL","#");
		break;
}


// Google API
// - Google App Client Id (CLIENT_ID)
// - Google App Client Secret (CLIENT_SECRET)
// - Google App Redirect Url
$cfg_gapp_client_id = '###';
$cfg_gapp_client_secret = '###';
$cfg_gapp_redirect_url = $cfg_url.'/admin/index.php?p=periode-liste';

// Instagram 
$cfg_instagram_user_id = '###';
$cfg_instagram_client_id = '###';
$cfg_instagram_access_token = '###';

// Google Calendar - événement qu'on crée
$cfg_event_address = "Pen-er-Houet, 56740 Locmariaquer";
$cfg_event_heure_debut = "15:30";
$cfg_event_heure_fin = "10:30";
$cfg_event_description = "Personnes présentes :
- XXX (xxx@gmail.com - 06 XX XX XX XX)
- 
- 
- 


Options :
- Ménage : XXX
- Draps : XXX

Mettre à disposition :
- Matériel enfant : XXX (lit parapluie, chaise haute, réhausseur, ...S)
";

// Nombre de dates à afficher en liste déroulante
$cfg_event_nb=365*4;

// Liste des sources d'appréciation
$cfg_liste_source_appreciation="Abritel,AirBnB,Facebook,Fewo Direkt,Google,HomeAway,Livre d'or,Site web";

// Identifiants des pages
$cpt=1;
define("_IDX_HOME",$cpt++);
define("_IDX_LA_MAISON_EN_IMAGES",$cpt++);
define("_IDX_DESCRIPTIF",$cpt++);
define("_IDX_SITUATION",$cpt++);
define("_IDX_RESERVATION",$cpt++);
define("_IDX_RESERVEZ",$cpt++);
define("_IDX_RESERVEZ2",$cpt++);
define("_IDX_LIVRE_D_OR",$cpt++);
define("_IDX_QUESTION_FREQUENTES",$cpt++);
define("_IDX_ALENTOURS",$cpt++);
define("_IDX_LOCMARIAQUER",$cpt++);
define("_IDX_ESCAPADES",$cpt++);
define("_IDX_CONTACTEZ_LE_PROPRIETAIRE",$cpt++);
define("_IDX_DONNEZ_VOTRE_AVIS",$cpt++);
define("_IDX_MENTIONS_LEGALES",$cpt++);
define("_IDX_CGV",$cpt++);
define("_IDX_RGPD",$cpt++);
define("_IDX_COMPLET",$cpt++);
define("_IDX_MAINTENANCE",$cpt++);


// MySQL
$cfg_bdd_conf=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$cfg_bdd_cnx='mysql:host='.$cfg_bdd_host.';dbname='.$cfg_bdd_base;	


// UTF-8
$cfg_charset = "UTF8";
mb_internal_encoding('UTF-8');


// Source des appréciations - modifiable
// Deux valeurs possibles
// - "php" - accès à la BDD table appreciation ; administrable sur www.penerhouet.com/admin
// - "json" - lecture fichier json statique http://www.penerhouet.com/api/appreciations.json
$cfg_source_appreciations="php";


// Source des périodes - modifiable
// Deux valeurs possibles
// - "php" - accès à la BDD table periode ; administrable sur www.penerhouet.com/admin
// - "json" - lecture fichier json statique http://www.penerhouet.com/api/periodes.json
$cfg_source_periodes="php";


//  Constantes
define("_ANNEE_EN_COURS",gmdate('Y'));
define("_ANNEE_PROCHAINE",(int)(gmdate('Y'))+1);
if (date("m")>=10) {
	define("_ANNEE_RESA",_ANNEE_PROCHAINE);
} else {
	define("_ANNEE_RESA",_ANNEE_EN_COURS);
}

// Textes communs quelquesoit la langue
define("_CHAMP_OBLIGATOIRE"," *");
define("_FOOTER4_COPYRIGHT","penerhouet.com 2011-"._ANNEE_EN_COURS);
define("_MENU_LANGAGE_FR","Français");
define("_MENU_LANGAGE_EN","English");
define("_MENU_LANGAGE_DE","Deutsch");
define("_PEH_TITRE", "Pen-er-Houët");
define("_SURFACE_TOTALE","135 m²");
?>