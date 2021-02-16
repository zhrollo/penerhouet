<?php

/*********/
/* Mails */
/*********/

define("_MAIL_SUJET_PREFIXE","[penerhouet.com] ");
define("_MAIL_SUJET_CONTACT","[EN] Demande");
define("_MAIL_SUJET_AVIS","[EN] Nouvel avis déposé");
define("_MAIL_SUJET_RESA","[EN] Demande de réservation");

/**********/
/* Commun */
/**********/

/* Commun - Menu nav & plan du site */
define("_MENU_BIENVENUE","Welcome");

define("_MENU_LA_MAISON","The house");
define("_MENU_LA_MAISON_EN_IMAGES","Images of Pen-er-Houët");
define("_MENU_DESCRIPTIF","Facilities");
define("_MENU_SITUATION","Location");
define("_MENU_TARIF","Prices & availabilities");
define("_MENU_LIVRE_D_OR","Guestbook");
define("_MENU_QUESTION_FREQUENTES","FAQs");

define("_MENU_DECOUVREZ_LE_GOLFE","Discover the Gulf of Morbihan");
define("_MENU_ALENTOURS","Surroundings");
define("_MENU_LOCMARIAQUER","Locmariaquer");
define("_MENU_ESCAPADES","Trips");

define("_MENU_CONTACTEZ_LE_PROPRIETAIRE","Ask owner a question");

define("_MENU_RESERVEZ","Book online");

define("_MENU_DONNEZ_VOTRE_AVIS","Write a review");

define("_MENU_MENTIONS_LEGALES","Legal notice");

define("_MENU_CGV","Terms of use");
define("_MENU_RGPD","GPDR");

define("_MENU_LANGAGE","Language");

							

/* Commun - Gabarit */
define("_HEAD_TITLE","Holiday cottage in <b>Locmariaquer</b>, Morbihan, South Brittany, France.");
/* Commun - Footer left, middle, right, bottom */
define("_FOOTER1_TITLE","Holiday house in Locmariaquer, South Brittany.");
define("_FOOTER1_ADRESSE","Pen-er-Houët - 56740 Locmariaquer - France");
define("_FOOTER1_TELEPHONE","+33 6 78 71 34 66");
define("_FOOTER1_BTN_RESERVEZ","Booking");

define("_FOOTER2_PLAN_DU_SITE","SITE MAP");

define("_FOOTER3_RESEAUX_SOCIAUX","SOCIAL MEDIA");

define("_FOOTER4_NEWS","SIGN UP TO OUR NEWSLETTER");
define("_FOOTER4_BTN_LIB","Subscribe");
define("_FOOTER4_FEEDBACK_OK","Validated registration");
define("_FOOTER4_FEEDBACK_ALREADY","You are already registered");
define("_FOOTER4_FEEDBACK_INVALID_EMAIL","Wrong email");
define("_FOOTER4_FEEDBACK_MYSQL_ERROR","Registration failed");
define("_FOOTER4_FEEDBACK_AJAX_ERROR","Registration failed");

/* Commun - URL */

define("_ANCRE_HAUT_PAGE","top");

/* Commun - champs */
define("_LABEL_EMAIL","Email");
define("_LABEL_EXPERIENCE","Share your experience regarding your stay in Pen-er-Houët : how were the house, your room, the location, ... What did you like?");
define("_LABEL_MSG_PROPRIETAIRE","Message for the landlord");
define("_LABEL_PERIODE","Chosen period");
define("_LABEL_PRENOM","Firstname");
define("_LABEL_NOM","Surname");
define("_LABEL_NOTEZ_VOTRE_SEJOUR","Note your stay");
define("_LABEL_RESUME","Abstract");
define("_LABEL_SIGNATURE","Signature");
define("_LABEL_TELEPHONE","Phone");
define("_LABEL_RETOUR_EN_HAUT_DE_PAGE","Click to return on the top page");
define("_LABEL_NB_ADULTES","Number of adults");
define("_LABEL_NB_ENFANTS","Number of children (of 2-12 years)");
define("_LABEL_NB_BEBES","Number of babies (under 2 years)");

define("_PLACEHOLDER_EMAIL","Insert email");
define("_PLACEHOLDER_EXPERIENCE","Share your experience ");
define("_PLACEHOLDER_MSG_PROPRIETAIRE","Write your message to the owner");
define("_PLACEHOLDER_PERIODE","Specify the period of your choice (ex: from July 1st to 8th, 2017)");
define("_PLACEHOLDER_PRENOM","Give your firstname ");
define("_PLACEHOLDER_NOM","Give your surname");
define("_PLACEHOLDER_NOTEZ_VOTRE_SEJOUR","Note your stay");
define("_PLACEHOLDER_RESUME","Summarize your stay in few words");
define("_PLACEHOLDER_SIGNATURE","Sign your review with your name and surname");
define("_PLACEHOLDER_TELEPHONE","Give your phone");
define("_PLACEHOLDER_NB_ADULTES","Specify the number of adults");
define("_PLACEHOLDER_NB_ENFANTS","Specify the number of children (of 2-12 years)");
define("_PLACEHOLDER_NB_BEBES","Specify the number of babies (less than 2 years)");


/* Commun - mots */
define("_MOT_JOUR"," day");
define("_MOT_JOURS"," days");
define("_MOT_SEMAINE"," week");
define("_MOT_SEMAINES"," weeks");
define("_MOT_EUR"," &euro;");
define("_MOT_DU","From ");
define("_MOT_AU"," to ");


/* Index SEO */

define("_SEO_TITLE","Pen-er-Houët *** | Charming rental in Locmariaquer");
define("_SEO_SEP"," | ");
define("_SEO_KEYWORDS_LANG","en");

/* Fil d'ariane */

$array = [
	_IDX_ALENTOURS => "Discover the Gulf of Morbihan/Alentours de Pen-er-Houët",
	_IDX_CGV => "Terms of use",
	_IDX_COMPLET => "Booking/Unavailable",
	_IDX_CONTACTEZ_LE_PROPRIETAIRE => "Ask owner a question",
	_IDX_DESCRIPTIF => "The house/Facilities",
	_IDX_DONNEZ_VOTRE_AVIS => "Write a review",
	_IDX_ESCAPADES => "Discover the Gulf of Morbihan/Escapades",
	_IDX_HOME => "Welcome",
	_IDX_LA_MAISON_EN_IMAGES => "The house/Images of Pen-er-Houët",
	_IDX_LIVRE_D_OR => "The house/Guestbook",
	_IDX_LOCMARIAQUER => "Discover the Gulf of Morbihan/Locmariaquer",
	_IDX_MENTIONS_LEGALES => "Legal notice",
	_IDX_QUESTION_FREQUENTES => "The house/FAQ",
	_IDX_RESERVATION => "Booking",
	_IDX_RESERVEZ => "Booking/1st step",
	_IDX_RESERVEZ2 => "Booking/2nd step",
	_IDX_RGPD => "GPDR",
	_IDX_SITUATION => "The house/Location",
];
$define_array = serialize($array);
define( "_SERIALIZED_FIL_ARIANE", $define_array );

/* SEO desc */
$array = [
	_IDX_ALENTOURS                 => "Visit the Gulf of Morbihan during your stay in Pen-er-Houët in Locmariaquer",
	_IDX_CGV                       => "Legal notice of the website penerhouet.com",
	_IDX_COMPLET                   => "Booking unavailable",
	_IDX_CONTACTEZ_LE_PROPRIETAIRE => "Contact the owner of Pen-er-Houët&#39s house in Locmariaquer",
	_IDX_DESCRIPTIF                => "Description of Pen-er-Houët, charming house in Locmariaquer.",
	_IDX_DONNEZ_VOTRE_AVIS         => "Share my experience about my stay in Pen-er-Houët",
	_IDX_ESCAPADES                 => "Visit the Gulf of Morbihan during your stay in Pen-er-Houët in Locmariaquer",
	_IDX_HOME                      => "Welcome to Pen-er-Hoüet, charming house in Locmariaquer, in the Gulf of Morbihan (southern Brittany). Seasonal rental for 6 to 7 people.",
	_IDX_LA_MAISON_EN_IMAGES       => "Holiday rentals Pen-er-Houët in Locmariaquer in images",
	_IDX_LIVRE_D_OR                => "The testimonials of our tenants who stayed in Pen-er-Houët, in our holiday home in Locmariaquer",
	_IDX_LOCMARIAQUER              => "Visit Locmariaquer",
	_IDX_MENTIONS_LEGALES          => "Legal notice of the website penerhouet.com",
	_IDX_QUESTION_FREQUENTES       => "Frequently Asked Questions about Pen-er-Houët rental in Locmariaquer",
	_IDX_RESERVATION               => "Book your stay in Pen-er-Houët",
	_IDX_RESERVEZ                  => "Book your stay, first step",
	_IDX_RESERVEZ2                 => "Book your stay, second step",
	_IDX_RGPD                      => "GPDR",
	_IDX_SITUATION                 => "Location of Pen-er-Houët, charming house in Locmariaquer, in the Gulf of Morbihan, South Brittany, France.",
];
$define_array = serialize($array);
define( "_SERIALIZED_SEO_DESC", $define_array );

/* SEO keywords content */
$tmp="rent house morbihan gulf, holiday rental, holidays, gulf of morbihan, locmariaquer, brittany, france, river auray, rent, holiday home, sea, beach, coastal path, house of charm, cottage, auray, crach, carnac , trinite sur mer, quiberon, vannes, lorient, pen-er-houet, locquidy, moustoir, guilvin, gr34, gr 34, saint pierre, kerpenhir, cruise on the gulf, monks island";
$array = [
	_IDX_ALENTOURS                 => $tmp,
	_IDX_CGV                       => $tmp,

	_IDX_COMPLET                   => $tmp,
	_IDX_CONTACTEZ_LE_PROPRIETAIRE => $tmp,
	_IDX_DESCRIPTIF                => $tmp,
	_IDX_DONNEZ_VOTRE_AVIS         => $tmp,
	_IDX_ESCAPADES                 => $tmp,
	_IDX_HOME                      => $tmp,

	_IDX_LA_MAISON_EN_IMAGES       => $tmp,
	_IDX_LIVRE_D_OR                => $tmp,
	_IDX_LOCMARIAQUER              => $tmp,
	_IDX_MENTIONS_LEGALES          => $tmp,
	_IDX_QUESTION_FREQUENTES       => $tmp,
	_IDX_RESERVATION               => $tmp,
	_IDX_RESERVEZ                  => $tmp,
	_IDX_RESERVEZ2                 => $tmp,
	_IDX_RGPD                      => $tmp,
	_IDX_SITUATION                 => $tmp,
];
$define_array = serialize($array);
define( "_SERIALIZED_SEO_KEYWORDS_CONTENT", $define_array );


/********************/
/* ALNT = alentours */
/********************/
define("_TXT_ALNT_H3","Walks around Pen-er-Houët");
define("_TXT_ALNT_P_TEXTE_HAUT","Here's a quick look at the surroundings of Pen-er-Houët.");
define("_TXT_ALNT_UL_TEXTE_DROITE","<li>Walk in the hamlet of Loquidy</li>
				<li>Walk to the <strong>chapel of \"Le Moustoir\"</strong></li>
				<li>From the house, a <strong>coastal path</strong> leads to <strong>the village of Locmariaquer</strong></li>
				<li><strong>Hiking</strong> : the path to the <strong>GR34 trail</strong> go past the house</li>");

/* on serialise un tableau pour le stocker en define */
/* on remplace les apostrophes par &#39 pour ne pas planter le javascript photoswipe */
$array = [
	"Surroundings of Pen-er-Houët : fields",
	"Surroundings of Pen-er-Houët : fields",
	"Surroundings of Pen-er-Houët : Gulf of Morbihan",
	"Surroundings of Pen-er-Houët : Gulf of Morbihan",
	"Surroundings of Pen-er-Houët : Gulf of Morbihan",
	"Surroundings of Pen-er-Houët : Gulf of Morbihan",
	"Surroundings of Pen-er-Houët : Gulf of Morbihan",
	"Surroundings of Pen-er-Houët : Gulf of Morbihan",
	"Surroundings of Pen-er-Houët - Oyster farmyard seen from the house",
	"Surroundings of Pen-er-Houët : sunset",
	"Surroundings of Pen-er-Houët : Gulf of Morbihan",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
	"Surroundings of Pen-er-Houët - tide mill",
];

$define_array = serialize($array);
define( "_TXT_ALNT_DATA_TITLE_ARRAY", $define_array );

/********************/
/* BNVN = bienvenue */
/********************/
define("_TXT_BNVN_H2_BIENVENUE","Welcome to Pen-er-Houët !");

define("_TXT_BNVN_TEASE1_H3","Pen-er-Houët house");
define("_TXT_BNVN_TEASE1_P","Renovated House from the 30s");
define("_TXT_BNVN_TEASE2_H3","Fitted kitchen");
define("_TXT_BNVN_TEASE2_P","");
define("_TXT_BNVN_TEASE3_H3","Saint-Pierre beach");
define("_TXT_BNVN_TEASE3_P","2 miles away");
define("_TXT_BNVN_INSTAGRAM","#pen_er_houet on instagram");

define("_TXT_BNVN_BLOC1_H3","The house");
define("_TXT_BNVN_BLOC1_P","As a couple, with family, or with friends, the house of <b>Pen-er-Houët</b> in Locmariaquer is the ideal place to spend a quiet holiday.<br/><br/>
<b>This family house from the 1930s, combines the charm of old and modern comfort.</b><br><br>
It consists of 3 bedrooms (5 beds), 1 bathroom with bath, a kitchen, a dining room, a lounge, a TV room, a veranda.<br/> <br/>
<b> Relax in our two gardens</b> : a small garden overlooking the house (East facing), and a large walled garden behind the house.");
define("_TXT_BNVN_BLOC2_H3","Discover the Gulf of Morbihan");
define("_TXT_BNVN_BLOC2_P","<b>Pen-er-Houët</b> is located on the peninsula of <b>Locmariaquer</b> at the entrance of the <b>Gulf of Morbihan</b>.<br/><br>Enjoy your stay to discover these beautiful places, in the heart of the Gulf of Morbihan : <b>L'Île aux moines, les îles de Houat, Hoëdic, Belle-Île-en-Mer, ...</b><br/><br/>Do not leave without visiting also : <b>Saint-Philibert, La-Trinité-sur-Mer, Carnac, Auray, Le Bono, Erdeven, Etel, Saint-Cado, Vannes, Quiberon, Lorient, Quistinic, ...</b>");
define("_TXT_BNVN_BLOC3_H3","Terms of booking");
define("_TXT_BNVN_BLOC3_P","<b>From 550 &euro;</b> per week depending on the period.<br/>
<b>7 people, 3 bedrooms.</b><br/><br/>
The house is <b> available for rent each year, from April to September</b>.
<b>rental from Saturday to Saturday</b>, 7 days minimum.");
define("_TXT_BNVN_BLOC4_H3","Testimonials");
define("_TXT_BNVN_BLOC4_SOURCE","Source : ");
define("_TXT_BNVN_BLOC1_BOUTON","See the house");
define("_TXT_BNVN_BLOC2_BOUTON","Discover the Gulf of Morbihan");
define("_TXT_BNVN_BLOC3_BOUTON","Booking");
define("_TXT_BNVN_BLOC4_BOUTON","Read another one");

define("_TXT_BNVN_ALT_BLOC1","View of the river Auray");
define("_TXT_BNVN_ALT_BLOC2","Ocean view");
define("_TXT_BNVN_ALT_BLOC3","The keys of the house");
define("_TXT_BNVN_ALT_BLOC4","Seaside decoration");

/************************************/
/* CNTC = contactez le propriétaire */
/************************************/

define("_TXT_CNTC_H3","Do you have any question ?");
define("_TXT_CNTC_TEXTE","* : compulsory");
define("_TXT_CNTC_FEEDBACK_OK","Your message has been sent. Thank you, we will answer you as soon as possible !");
define("_TXT_CNTC_FEEDBACK_KO","Due to a technical error, your message could not be sent. You can retry your chance or send us a simple mail !");
define("_TXT_CNTC_BOUTON","Send your request to the owner");

/****************************/
/* DVAV = donnez votre avis */
/****************************/

define("_TXT_DVAV_TEXTE","You have stayed in Pen-er-Houët ...<br/><br/>
We hope you will have fond memories of your holiday in Locmariaquer. <br/> <br/>

If you have a little time and if you feel like it, do not hesitate to leave your comments in order to enlighten our future tenants! <br/> <br/>

Your opinion is very important to us and we would be very grateful if you could take a few moments to share your experience. <br/> <br/>

Thanks in advance and see you soon!");

define("_TXT_DVAV_FEEDBACK_OK","Your review has been sent. Thank you, we will come back to you soon !");
define("_TXT_DVAV_FEEDBACK_KO","Due to a technical error, your review could not be sent. You can retry your chance or send us a simple mail !"); 

define("_TXT_DVAV_INFO","Your opinion will be posted publicly on the web.<br/><br/>"); 

define("_TXT_DVAV_BOUTON","Send your review");

define("_TXT_DVAV_STAR_CAPTION_5","Excellent");
define("_TXT_DVAV_STAR_CAPTION_4","Very Good");
define("_TXT_DVAV_STAR_CAPTION_3","Average");
define("_TXT_DVAV_STAR_CAPTION_2","Poor");
define("_TXT_DVAV_STAR_CAPTION_1","Terrible");

/********************/
/* ESCP = escapades */
/********************/

/* on serialise un tableau pour le stocker en define */
/* on remplace les apostrophes par &#39 pour ne pas planter le javascript photoswipe */
$array = [
	"Houat Island",
	"Houat Island",
	"Houat Island",
	"Houat Island",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"Saint-Philibert",
	"La Trinité-sur-Mer : Stuhan Island",
	"La Trinité-sur-Mer",
	"Carnac - Megalithic alignments ok Kermario",
	"Carnac - Megalithic alignments ok Kermario",
	"Carnac - Megalithic alignments ok Kermario",
	"Carnac - Megalithic alignments ok Kermario",
	"Auray - Saint Goustan",
	"Auray",
	"Auray",
	"Le Bono",
	"Le Bono",
	"Le Bono",
	"Le Bono",
	"Le Bono",
	"Le Bono",
	"Le Bono",
	"Le Bono",
	"Le Bono",
	"Etel",
	"Etel",
	"Saint-Cado Island",
	"Saint-Cado Island",
	"Saint-Cado Island",
	"Saint-Cado Island",
	"Saint-Cado Island",
	"Saint-Cado Island",
	"Saint-Cado Island",
	"Saint-Cado Island",
	"Saint-Cado Island",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Quiberon - The wild coast",
	"Belle-Île-en-Mer - Le Palais",
	"Belle-île-en-Mer",
	"Belle-île-en-Mer - phare des Poulains",
	"Belle-île-en-Mer - phare des Poulains",
	"Poul-Fetan Village",
	"Poul-Fetan Village",
	"Poul-Fetan Village",
	];

$define_array = serialize($array);
define( "_TXT_ESCP_DATA_TITLE_ARRAY", $define_array );

define( "_TXT_ESCP_ILE_D_HOUAT","Houat Island");
define( "_TXT_ESCP_ST_PHILIBERT","Saint-Philibert (4 miles)");
define( "_TXT_ESCP_LA_TRINITE","La Trinité-sur-Mer (4 miles)");
define( "_TXT_ESCP_CARNAC","Carnac (6 miles)");
define( "_TXT_ESCP_AURAY","Auray (7 miles)");
define( "_TXT_ESCP_LE_BONO","Le Bono (11 miles)");
define( "_TXT_ESCP_ERDEVEN","Erdeven (24 km)");
define( "_TXT_ESCP_ETEL","Etel (15 miles)");
define( "_TXT_ESCP_ST_CADO","Saint-Cado small island (17 miles)");
define( "_TXT_ESCP_VANNES","Vannes (19 miles)");
define( "_TXT_ESCP_QUIBERON","Quiberon (20 miles)");
define( "_TXT_ESCP_BELLE_ILE_EN_MER","Belle-île-en-Mer (boarding at 20 miles)");
define( "_TXT_ESCP_LORIENT","Lorient (31 miles)");
define( "_TXT_ESCP_QUISTINIC","Quistinic (33 miles)");
define( "_TXT_ESCP_PONT_AVEN","Pont-Aven (52 miles)");

define( "_TXT_ESCP_ILE_D_HOUAT_DROITE", "");
define( "_TXT_ESCP_ST_PHILIBERT_DROITE", "\"Pointe de Men er Bellec\"");
define( "_TXT_ESCP_LA_TRINITE_DROITE", "The waterfront|Marina|\"Men Du\" Beach|Stuhan Island|\"Pointe de Kerbihan\"");
define( "_TXT_ESCP_CARNAC_DROITE", "Megalithic alignments ok Kermario");
define( "_TXT_ESCP_AURAY_DROITE", "Picturesque harbor of <strong>Saint-Goustan</strong>");
define( "_TXT_ESCP_LE_BONO_DROITE", "Bono Bridge|Cemetery of boats");
define( "_TXT_ESCP_ERDEVEN_DROITE", "Beaches");
define( "_TXT_ESCP_ETEL_DROITE", "\"La barre d&#39Etel\"");
define( "_TXT_ESCP_ST_CADO_DROITE", "Saint-Cado small island");
define( "_TXT_ESCP_VANNES_DROITE", "The old town and its ramparts");
define( "_TXT_ESCP_QUIBERON_DROITE", "The wild coast|Departure for <strong>Belle-Île-en-Mer</strong>|Port Haliguen");
define( "_TXT_ESCP_BELLE_ILE_EN_MER_DROITE", "Palais|Sauzon harbour|\"La pointe des Poulains\"");
define( "_TXT_ESCP_LORIENT_DROITE", "\"Cité de la Voile Eric Tabarly\"|The <strong>Interceltic festival</strong> in august");
define( "_TXT_ESCP_QUISTINIC_DROITE", "Poul-Fétan - Reconstituted village of the 19th century.");
define( "_TXT_ESCP_PONT_AVEN_DROITE", "Pont-Aven museum");


/***********************/
/* LCMR = locmariaquer */
/***********************/

define("_TXT_LCMR_P_TEXTE_HAUT","The town of Locmariaquer offers many coastal paths and footpaths. Explore these multiple landscapes !");

define("_TXT_LCMR_UL_TEXTE_DROITE","<li>Walk on <strong>the port</strong>, then towards the <strong>\"Le Guilvin\"</strong></li>
				<li>Megalithic sites : <strong>\"la table des marchands\"</strong>, tumulus and dolmens</li>
				<li>Walk on the <strong>Saint-Pierre beach</strong>, the <strong>Breneguy grove</strong></li>
				<li><strong>\"Pointe de Kerpenhir\"</strong> : magnificent view of the entrance to the Gulf of Morbihan</li>
				<li><strong>Cruise around the Gulf</strong> : discovery of the Gulf of Morbihan, stop at <strong>\"Île-aux-Moines\" island</strong></li>
				<li>Crossing to <strong>Port-Navalo</strong></li>
				<li>In season, departure to the islands of <strong>Houat</strong> and <strong>Hoëdic</strong></li>");
				
				
/* on serialise un tableau pour le stocker en define */
/* on remplace les apostrophes par &#39 pour ne pas planter le javascript photoswipe */
$array = [
	"The village of Locmariaquer",
	"Ship wreck",
	"Gulf of Morbihan at low tide",
	"Dry boat",
	"Gulf of Morbihan",
	"Gulf of Morbihan - boat",
	"Notre Dame de Béquerel - replica of &quot;Forban du Bono&quot;",
	"Saint-Pierre Beach",
	"Saint-Pierre Beach",
	"Saint-Pierre Beach",
	"Saint-Pierre Beach",
	"Saint-Pierre Beach",
	"Saint-Pierre Beach",
	"Saint-Pierre Beach",
	"Saint-Pierre Beach",
	"Locmariaquer - view of the &quot;pointe er Hourel&quot;",
	"Locmariaquer - view of the &quot;pointe er Hourel&quot;",
	"Locmariaquer - view of the &quot;pointe er Hourel&quot;",
	"Locmariaquer - view of the &quot;pointe er Hourel&quot;",
	"Locmariaquer - view of the &quot;pointe er Hourel&quot;",
	"Locmariaquer - view of the &quot;pointe er Hourel&quot;",
	"Locmariaquer - view of the &quot;pointe er Hourel&quot;",
	"Locmariaquer - &quot;Pointe er Hourel&quot;",
	"Locmariaquer - &quot;Pointe er Hourel&quot;",
	"Locmariaquer - &quot;Pointe er Hourel&quot;",
	"Locmariaquer - &quot;Pointe er Hourel&quot;",
	"Locmariaquer - &quot;Pointe er Hourel&quot;",
	"Locmariaquer - Breneguy",
	"Locmariaquer - Breneguy",
	"Locmariaquer - Breneguy",
	"Locmariaquer - Breneguy",
	"Locmariaquer - Breneguy",
	"Locmariaquer - Toul Keun",
	"Locmariaquer - Toul Keun",
	"Locmariaquer - Brénéguy swamp",
	"Locmariaquer - Brénéguy swamp",
	"Locmariaquer - view of the &quot;pointe er Hourel&quot;",
	"Locmariaquer - Statue of &quot;Notre-Dame de Kerdro&quot;",
	"Locmariaquer - Statue of &quot;Notre-Dame de Kerdro&quot;",
	"Locmariaquer - Pointe of Kenpenhir",
	"Locmariaquer - Pointe of Kerpenhir : view of the entrance to the Gulf of Morbihan",
	"Locmariaquer - Stacking of pebbles",
	"Locmariaquer - Stacking of pebbles",
	"Locmariaquer - Stacking of pebbles",
	"Locmariaquer - Stacking of pebbles",
	"Locmariaquer - view of the Méaban island",
	"Locmariaquer - Ocean"
];

$define_array = serialize($array);
define( "_TXT_LCMR_DATA_TITLE_ARRAY", $define_array );


/*********************/
/* LVDO = livre d'or */
/*********************/

define("_TXT_LVDO_ALT","drawing of the view from the bedroom of the house of pen-er-houet; view of the Gulf of Morbihan");


/*********************************/
/* PHEI = pen er houet en images */
/*********************************/
define("_TXT_PHEI_H3_FACADE","The house");
define("_TXT_PHEI_H3_JARDIN_1","Small garden in front of the house");
define("_TXT_PHEI_H3_VESTIBULE","Vestibule");
define("_TXT_PHEI_H3_ESCALIER_HAUT","Let's go upstairs...");
define("_TXT_PHEI_H3_CHAMBRE_1","1st bedroom");
define("_TXT_PHEI_H3_CHAMBRE_2","2nd bedroom");
define("_TXT_PHEI_H3_CHAMBRE_3","3rd bedroom");
define("_TXT_PHEI_H3_SALLE_TV","TV room");
define("_TXT_PHEI_H3_SDB","Bathroom");
define("_TXT_PHEI_H3_ESCALIER_BAS","Let's go down to the ground floor...");
define("_TXT_PHEI_H3_SALON","Living room");
define("_TXT_PHEI_H3_SALLE_A_MANGER","Dining room");
define("_TXT_PHEI_H3_CUISINE","Kitchen");
define("_TXT_PHEI_H3_VERANDA","Veranda");
define("_TXT_PHEI_H3_JARDIN_2","Large garden");

/* on serialise un tableau pour le stocker en define */
/* on remplace les apostrophes par &#39 pour ne pas planter le javascript photoswipe */
$array = [
	"The house",
	"Front garden",
	"Front garden - hydrangeas",
	"Front garden",
	"Corridor - front door",
	"Hallway leading to the living room (left handside), dining room and kitchen (right handside). The toilets on the ground floor are under the stairs.",
	"Let&#39s go upstairs...",
	"1st bedroom",
	"1st bedroom",
	"1st bedroom - view of the garden",
	"1st bedroom - view from the window",
	"1st bedroom - view from the window",
	"2nd bedroom",
	"2nd bedroom",
	"2nd bedroom",
	"2nd bedroom",
	"2nd bedroom - view from the window",
	"2nd bedroom - view from the window",
	"3rd bedroom - 3 single beds",
	"3rd bedroom",
	"3rd bedroom",
	"3rd bedroom",
	"3rd bedroom - view from the window",
	"TV room",
	"TV room",
	"TV room",
	"Bathroom",
	"Bathroom",
	"Bathroom",
	"Bathroom",
	"Bathroom - view from the window",
	"Let&#39s go down to the ground floor...",
	"Living room",
	"Living room",
	"Living room",
	"Living room",
	"Living room",
	"Dining room",
	"Dining room",
	"Dining room",
	"Fully equipped kitchen - washing machine, dishwasher, gas hob, oven, coffee maker, microwave, fridge",
	"Kitchen",
	"Kitchen",
	"Veranda",
	"Veranda",
	"Veranda",
	"Back garden",
	"Back garden",
	"Back garden",
	"Back garden",
	"Back garden"
];

$define_array = serialize($array);
define( "_TXT_PHEI_DATA_TITLE_ARRAY", $define_array );


/*******************************/
/* QSTF = questions fréquentes */
/*******************************/

	$array = 
	[
		[
			"titreN1" => "Your arrival",
			"listeN1" => [
				[
					"q"=>"How to get to \"Pen-er-Houët\" ?",
					"r"=>"Rental Pen-er-Houët<br>
						Pen-er-Houët<br>
						56740 Locmariaquer (France)<br>
						<br>
						GPS coordinates : 47.590241,-2.965547<br>
						
						Visit our page <a href=\""._ROOT._LANG._URL_SITUATION."\">Location</a> where you will find all the information.<br/>"
				],
				[
					"q"=>"Where can I park my car safely?",
					"r"=>"For our part, we used to park our vehicle in front of the house, along the road.
You also have the option to bring the car back into the yard. The access through the portal is a little narrow."
				],
				[
					"q"=>"Where to shop when I arrive?",
					"r"=>"
						The \"Intermarché\" supermarket at Crac'h is located 4 km from the house. <br/>
						In July and August, the store is open: Monday to Saturday from 9h to 20h, and Sunday morning from 9h to 13h. <br/>
						<a href=\"https://www.intermarche.com/home/magasins/accueil/morbihan/crach-06041.html\" target=\"_blank\">Consult the opening hours</a>"
				]
			]		
		],
		
		[
			"titreN1" => "Services",
			"listeN1" => [
				[
					"q"=>"Do you provide sheets, towels ?",
					"r"=>"We usually let the tenants bring their bed linen (pillowcases, duvet covers, sheets ...). However, if you wish, we can offer you the bed kit including duvet cover, fitted sheet and pillow cases for 15 &euro; per bed. If you are interested, thank you to confirm it."
				],
				[
					"q"=>"Do you have a cleaning service ?",
					"r"=>"If you wish, you can take a cleaning fee for 60 euros (to be confirmed on your arrival)."
				],
			]		
		],
		
		[
			"titreN1" => "Have you got...",
			"listeN1" => [
				[
					"q"=>"...board games ?",
					"r"=>"We make available board games"
				],
				[
					"q"=>"... baby equipment ?",
					"r"=>"To avoid overloading you, we can provide baby equipment (cot, high chair, changing mat, small bath)
Thank you to inform us before your arrival if you are interested."
				],
			]		
		],
		
		[
			"titreN1" => "Payment",
			"listeN1" => [
				[
					"q"=>"Can we pay by check holiday ?",
					"r"=>"We are not authorized to accept them."
				],
			]		
		],		
		
		[
			"titreN1" => "Prepare your stay in Pen-er-Houët",
			"listeN1" => [
				[
					"q"=>"How to prepare our stay ?",
					"r"=>"To enjoy your stay, tourist brochures and guides are available at your house.<br/><br/>
					<h5>In the meantime, here are some useful links to prepare your stay</h5>
					<h6>Locmariaquer</h6>
					<ul class=\"liste\">
						<li><a class=\"lien_ext\" href=\"http://www.morbihan-way.fr/en/\" title=\"Opens in a new window\">Tourist Office of Locmariaquer</a></li>
						<li><a class=\"lien_ext\" href=\"http://www.locmariaquer.fr\" title=\"Opens in a new window\">Mayor of Locmariaquer</a></li>
					</ul>

					<h6>The Gulf of Morbihan and the islands</h6>
					<ul class=\"liste\">
						<li><a class=\"lien_ext\" href=\"http://www.vedettes-angelus.com/\" title=\"Opens in a new window\">Angélus boats</a> : The Gulf of Morbihan and the islands from Locmariaquer</li>
					</ul>"
				],
			]		
		]		
	];

$define_array = serialize($array);
define( "_TXT_QSTF_DATA_FAQ", $define_array );
	
/***************************/
/* RCMP = reservez-complet */
/***************************/
define("_TXT_RCMP_H3","Booking not available");
define("_TXT_RCMP_P","After 9 years of seasonal rental, Pen-er-Houët is going to take a little break.<br>
We plan to start work that requires us to suspend reservations for "._ANNEE_RESA.".<br>
Do not hesitate to follow our news on Facebook ...<br><br>

If necessary, don't hesitate to drop us a line.<br><br>");
	
/****************************************************/
/* RSR = commun reservez-etape-1 & reservez-etape-1 */
/****************************************************/
	
define("_TXT_RSR1_ACCROCHE","Pen-er-Houët is <b>available for rent, every year, from April to September</b>.<br>
			<B>Rental from Saturday to Saturday</b>, 7 days minimum.<br/><br/>");
define("_TXT_RSR1_H3","Book in two steps");

define("_TXT_RSR1_BTN1_LIB","Choose your period");
define("_TXT_RSR1_BTN2_LIB","Send your request");



/***************************/
/* RSR1 = reservez-etape-1 */
/***************************/

define("_TXT_RSR1_FEEDBACK_OK","Your reservation request has been sent. Thank you ! We will respond as soon as possible.");
define("_TXT_RSR1_FEEDBACK_KO","Due to a technical error, the booking request could not be sent. You can retry your chance or send us a simple mail!");

define("_TXT_RSR1_H4","Select the period you want to book");

define("_TXT_RSR1_ENTETE_COL1","State");
define("_TXT_RSR1_ENTETE_COL2","Period");
define("_TXT_RSR1_ENTETE_COL3","Rate");

define("_TXT_RSR1_INFO_COMP","<h3>Booking modality</h3>
			<ul>
				<li>Rent : <b>30% down payment</b> on booking; <b>balance claimed on handing over the keys</b></li>
				<li><b>Security deposit: 500 &euro; </b>. Claimed upon handing over the keys, returned after the inventory.</li>
				<li><b>Tourist tax</b>: 1.10 &euro; / days / person over 13 years.</li>
			</ul>

			<h3>Optional services</h3>
			We offer the following optional services :
			<ul>
				<li>Cleaning fee</b></li>
				<li>Supplies of sheets</li>
			</ul>

			<h3>To note</h3>
			<ul>
				<li>The house is suitable for up to 7 people*</li>
				<li>The weekly rental is from Saturday from 15:30 to the following Saturday at 10:30</li>
				<li>No pets allowed</li>
			</ul>");

define("_TXT_RSR1_ETAT_RESERVE","Booked");			
define("_TXT_RSR1_ETAT_DISPONIBLE","Available");			
define("_TXT_RSR1_ETAT_INDISPONIBLE","Unavailable");

/***************************/
/* RSR2 = reservez-etape-2 */
/***************************/

define("_TXT_RSR2_H4","Complete your information");

define("_TXT_RSR2_BOUTON","Send your booking request to the owner");




/********************/
/* STTN = situation */
/********************/
define("_TXT_STTN_H3_VOITURE","How to get to Pen-er-Houët by car ?");
define("_TXT_STTN_H4_COORD_GPS","GPS coordinates");
define("_TXT_STTN_P_GPS","<b>47.590240, -2.965620</b><br>47°35'24.9\"N 2°57'56.2\"W");
define("_TXT_STTN_H4_ADRESSE","Address");
define("_TXT_STTN_P_ADRESSE","Rental  \"Pen-er-Houët\"<br>Pen-er-Houët<br>56740 Locmariaquer<br>France");
define("_TXT_STTN_H4_ITINERAIRE","Route");
define("_TXT_STTN_UL_ITINERAIRE","<ul>
					<li> From the Rennes or Nantes motorway take <b> direction Vannes / Quimper </b> </li>
					<li> Take the <b> exit 32 </b> towards <b> D28 - Crac'h - St-Philibert - La Trinité s / Mer - Locmariaquer </b> </li>
					<li> <b> Continue </b> then for 16 km in the <b> direction of Locmariaquer. </b> </li>
					<li> A little before your arrival at Locmariaquer, <b> at the traffic lights, turn left towards \"C3 - Locquidy\". </b> </li>
					<li> You are 1 minute from the house. </li>
					<li> Follow this little road. </li>
					<li> <b> Pass the bridge at tide </b> (on the left: the pond, on the right: the Gulf). </Li>
					<li> <b> Pen-er-Houët is the first house on your left </b>. There is a palm tree in front. </Li>
					<li> You can park in front of the house. </li>
					<li> Feel free to call us if you have any doubt or are lost. </li>
				</ul>");
define("_TXT_STTN_UL_ITINERAIRE_BIS","<ul>
					<li>From the Rennes or Nantes expressway take the direction of Vannes / Quimper</li>
					<li>Take exit 32 towards D28 - Crac'h - St-Philibert - La Trinité s/ Mer - Locmariaquer</li>
					<li>Drive through the town of Crac'h</li>
					<li>At the roundabout, take the second exit towards Locmariaquer.</li>
					<li>Continue straight on this long straight line</li>
					<li>Pass the hangar 'La cave des Marchands' (wine merchant) located on your left</li>
					<li>Then take the first road on the left (there is a wooden cabin which is a school bus stop)</li>
					<li>Continue this small road until you reach a stop sign</li>
					<li>Turn right at the end of the road</li>
					<li>Pen-er-Houët is the second house on your right.</li>
					<li>You can park in front of the house.</li>
					<li>Feel free to call us if you have any doubts or if you are lost.</li>
				</ul>");
				
define("_TXT_STTN_H4_CARTE_GOOGLE","Google Map");
define("_TXT_STTN_H4_ITINERAIRE_GOOGLE","Google itinerary");
define("_TXT_STTN_P_ITINERAIRE_GOOGLE","Google maps directions : ");
define("_TXT_STTN_H4_CARTE_WAZE","Waze map");

define("_TXT_STTN_H4_APPLI_WAZE","Waze app");
define("_TXT_STTN_P_APPLI_WAZE","Open Waze app");

define("_TXT_STTN_H3_TRAIN","How to get to Pen-er-Houët by train&nbsp;?");
define("_TXT_STTN_P_TRAIN","SNCF railway station - TGV to Auray");

define("_TXT_STTN_H3_AVION","How to get to Pen-er-Houët by plane&nbsp;?");
define("_TXT_STTN_P_AVION","Lorient Lann Bihoué Airport with daily connections from Paris and Nantes Atlantique Airport at 1h30.");

/**********************/
/* MNTN = maintenance */
/**********************/

define("_TXT_MNTN_H2_TITRE","Work in progress...");
define("_TXT_MNTN_P_TEXTE","Hello<br/><br/>
							We are currently maintaining our website...<br/>
							We will be back soon!<br/>
							<br/>
							In the meantime, if necessary, you can contact us : <a href=\"mailto:contact@penerhouet.com\">contact@penerhouet.com</a><br/>
							<br/>
							See you soon !<br/>
							<br/>
							Anne & Samuel

");


?>