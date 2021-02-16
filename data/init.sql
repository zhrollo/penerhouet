-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : penerhousdusr.mysql.db
-- Généré le :  mar. 02 oct. 2018 à 21:30
-- Version du serveur :  5.6.39-log
-- Version de PHP :  7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `penerhousdusr`
--

-- --------------------------------------------------------

--
-- Structure de la table `appreciation`
--

CREATE TABLE `appreciation` (
  `idAppreciation` int(11) NOT NULL,
  `appTitre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `appNote` int(1) NOT NULL,
  `appTexte` text CHARACTER SET utf8 NOT NULL,
  `appSignature` varchar(75) CHARACTER SET utf8 DEFAULT NULL,
  `appSource` varchar(30) CHARACTER SET utf8 NOT NULL,
  `appNomLocataire` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `appDateSejour` date DEFAULT NULL,
  `appLangue` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appreciation`
--

INSERT INTO `appreciation` (`idAppreciation`, `appTitre`, `appNote`, `appTexte`, `appSignature`, `appSource`, `appNomLocataire`, `appDateSejour`, `appLangue`) VALUES
(9, 'Séjour en famille', 5, 'Si vous avez envie de passer un séjour dans une maison de famille qui allie le charme de l\'ancien et la belle rénovation cosy, choisissez Pen-er-Houët ! vous vous y sentirez bien tout de suite. Rien ne manque pour les parents ni pour les enfants (qui peuvent profiter du grand jardin). Particulièrement agréable : la vue sur la mer depuis la chambre (des parents bien sûr) !!!!\r\n\r\nN\'hésitez plus.																												', 'valery P.', 'Abritel', '...', '2012-04-14', 'fr'),
(10, 'Maison très chaleureuse', 5, 'Très bon accueil de la part des propriétaires. Nous avons beaucoup apprécié les petites attentions en guise de bienvenue. La maison est splendide et très bien équipée. Le jardin est également très agréable (et immense !).\r\nOn s\'y sent vite chez soi.\r\nMerci à Anne & Samuel. Nous reviendrons c\'est sûr et avec du monde ! A l\'année prochaine !', 'Christelle P.', 'Abritel', '...', '2012-04-14', 'fr'),
(11, 'Votre maison est très agréable', 0, 'elle a beaucoup de cachet et de charme. La déco est soignée et nul doute qu\'une fois toute rénovée, elle deviendra la maison de vacances idéale pour un sejour en famille ou entre amis. Nous gardons l\'adresse.', 'Christelle, Valéry, Charlotte et Hugo', 'Livre d\'or', '...', '2012-04-20', 'fr'),
(12, 'Excellent séjour', 5, 'Nous avons été charmés par la maison dont les propriétaires ont su allier moderne et cachet de l\'ancien,une vrai maison de famille (très propre et bien équipée maison et jardin). D\'emblée on se sent chez soi! Très bien placée pour les ballades à pied ou découvrir le golfe en voiture. Nous avons apprécié la délicate attention des propriétaires, le cidre et les biscuits bretons ont parfaitement accompagné les huitres de LOCMARIAQUER. Nous pensons y revenir prochainement.', 'Claire K.', 'Abritel', '...', '2012-04-28', 'fr'),
(13, 'Nous avons passé une très agréable semaine…', 0, 'que nous comptons bien renouveler prochainement etant amoureux de la Bretagne. Maison où il fait bon vivre, on se sent comme chez les grands parents. Merci à vous pour ce séjour.', 'Claire, Jean et Théodore sans oublier la chatte', 'Livre d\'or', '...', '2012-05-05', 'fr'),
(14, 'La maison est très agréable', 0, 'Nous avons donc passés une excellente semaine, le temps étant stable, nous avons pu profiter du jardin. Merci beaucoup', 'Louise, Lucien, Manu, Isa', 'Livre d\'or', '...', '2012-07-21', 'fr'),
(15, 'Séjour des plus heureux', 0, 'Sous l\'œil attentif de ce digne couple de bretons, nous avons pu mener des parties acharnées de ce jeu des \'énigmes\' que vous proposez à vos hôtes. Votre sélection de polars est une petite merveille ; nous avons eu la chance de dévorer les Indridarson que nous n\'avions pu encore nous mettre sous la dent. Quant au Mankell, Les chaussures italiennes (sans son commisaire fétiche) je le conseille à tous les prochains vacanciers. L\'avantage de cette charmante demeure, c\'est qu\'elle permet à chacun de s\'approprier son espace, de trouver son petit coin. Si les garçons ont investi le jardin, les filles se sont approprié la véranda pour bouquiner confortablement installées dans les fauteuils en osier. Au delà du charme intrinsèque des lieux, vous avez réussi à faire de cette maison un hâvre d\'harmonie. Bravo à vous !', 'Claire, Louise, Simon, Ludo, Romain et Jérôme', 'Livre d\'or', '...', '2012-07-28', 'fr'),
(16, 'Un grand merci…', 0, 'Un grand merci de nous avoir accueillis dans votre charmante maison, où nous avons passé d\'excellentes vacances en famille ! Et un grand bravo pour la qualité de votre rénovation, qui donne à votre maison tout son cachet et en fait un lieu très agréable à vivre !', 'Albane, Paul, Yann et Florence', 'Livre d\'or', '...', '2012-08-18', 'fr'),
(17, 'Encore merci !', 5, 'Merci à Anne et Samuel pour leur accueil et pour le soin et les attentions apportés à la charmante maison. Celle-ci est vraiment agréable et vraiment bien équipée pour la location.\r\nNous avons passé 15 jours formidables de repos et de découverte de la région.\r\nLa vue des chambres sur le golfe est superbe, surtout au clair de lune.\r\nNous attendons impatiemment le rénovation du séjour.', 'Tam V.', 'Abritel', 'VO PHI', '2012-08-18', 'fr'),
(18, '15 jours formidables', 5, 'Nous avons passé 15 jours formidables à visiter votre belle région. La maison est très agrable, c\'est une belle maison de vacances très bien équipée. Merci pour toutes les attentions qui sont présents dans toute la maison. Nous attendons avec impatience la rénovation du séjour ! Merci encore pour votre accueil', 'Famille T. V. P.', 'Livre d\'or', '...', '2012-08-31', 'fr'),
(19, 'Super séjour en Bretagne !!!...', 5, 'Nous avons passés de très bonnes vacances. La maison est lumineuse, agréable, il y a tous les équipements à dispo.\r\n\r\nIl y a des marchés un peu partout avec de très bon produits, pas mal de balades à faire, et lorsque c\'est la saison des huitres plates, il faut en profiter.\r\n\r\nA conseiller à tous ceux qui veulent passer de bonnes vacances en Bretagne.', 'Stéphanie et Hubert C.', 'Abritel', '...', '2013-04-27', 'fr'),
(20, '', 0, 'Les enfants ont adoré les balades au bord de la mer et le grand jardin. La maison est très agréable et lumineuse. Merci pour cet accueil chaleureux.', 'Stéphanie, Hubert, Marie et Pierre (Les Lorrains)', 'Livre d\'or', '...', '2013-05-04', 'fr'),
(21, 'Un paradis chaleureux et authentique', 0, 'Excellent séjour dans une très agréable maison. Un endroit pour tous, de l\'espace pour courrir et surout un très bon spot pour la pêche aux moules. Très bon DVD de Franklin pour les enfants. Alcool et gateaux pour les parents ! Un paradis chaleureux et authentique', '', 'Livre d\'or', '...', '2013-05-11', 'fr'),
(22, 'Découverte d\'une région magnifique sous le soleil !', 5, 'Découverte d\'une région magnifique sous le soleil ! (grace au microclimat du golfe?). Maison très agréable qui nous a permis de passer un excellent séjour. Un grand merci Anne et Samuel.', 'Martine et René', 'Livre d\'or', '...', '2012-04-14', 'fr'),
(23, 'Découverte d\'une région magnifique sous le soleil !', 5, 'Découverte d\'une région magnifique sous le soleil ! (grace au microclimar du golfe…). Maison très agréable qui nous a permis de passer un excellent séjour. Un grand merci Anne et Samuel.', 'Martine et René', 'Livre d\'or', '...', '2013-05-17', 'fr'),
(24, 'Comme on aime…', 5, 'Comme sur les photos !!!\r\n\r\nOn ne peut la rater !!!\r\n\r\nCadre d\'exception !!!\r\n\r\nPour qui aime marcher, on peut oublier la voiture...\r\n\r\nAussi beaucoup à voir, en voiture, à quelque encablure...\r\n\r\nGolfe, îles, plages, villes et villages, ports, coquillages, tout à portée...\r\n\r\nEn plus, sous le soleil de plomb breton, si si...\r\n\r\nMerci d\'avoir mis à disposition de vos hôtes ce \'petit\' paradis...', 'J.-Marc C.', 'Abritel', '...', '2013-07-06', 'fr'),
(25, 'Traumhafter Sommerurlaub', 5, 'Für 2 Wochen habe wir dieses charmante, historische Haus gemietet. Das Haus ist sehr geschmackvoll mit Stil und vielen netten Details eingerichtet.\r\nDie Vermietung erfolgt privat durch die sehr sympathischen Eigentümer, welche das Haus mit viel Eigenleistung Stück für Stück renovieren.\r\nDie Lage ist traumhaft und selbst in der Hauptsaison findet man hier einen ruhigen Rückzugsort. Der riesige Garten und der Ausblick auf das Meer sprechen für sich.\r\nDie umliegenden Strände können gut mit dem Fahrrad erreicht werden (ca. 15 min.) und der Ort Locmariaquer ist sehr nett. Einkaufsmöglichkeiten sind in der näheren Umgebung ausreichend vorhanden.\r\nInsgesamt vergeben wir volle 5 Sterne und haben schon fürs nächste Jahr gebucht ;-)', 'Patrick D. ', 'HomeAway', '...', '2013-08-10', 'de'),
(26, 'Un charme fou', 5, 'Nous n\'avions plus envie de quitter cette maison de famille, qui possède à peu près toutes les qualités pour des vacances de charme.\r\n\r\nLa décoration est faite avec un goût parfait, équipée à la perfection.\r\n\r\nOn peu prendre son repas dans la salle à manger et le dessert dans la véranda qui donne sur un jardin rustique adorable.\r\n\r\nLe matin le lever de soleil sur le golf est une expérience de luxe sans pareil dont on ne pourrait jamais se lasser.\r\n\r\nLaisser une appréciation est presque une punition tellement nous souhaiterions que ce lieu reste une adresse secrète !\r\n\r\nLes propriétaires sont à l\'image de cette maison, ou la maison à leur image !\r\n\r\nNous étions en couple mais elle doit être idéale avec des enfants ou d\'autres amis , histoire de se faire des barbecue de homards ou de saucisses bretonnes !\r\n\r\nC\'est quand que l\'on repart ????', 'Isabelle G.', 'Abritel', '...', '2013-09-14', 'fr'),
(27, 'Pour des vacances réussies', 5, 'Pour la deuxième année consécutive nous avons passé nos vacances dans cette si jolie maison. Tout y est pensé pour faire plaisir aux petits comme aux grands : jardin immense, équipements intérieurs impeccables et délicates attentions et conseils d\'Anne et Samuel. Une région magnifique, des activités multiples et du soleil.<br/>Merci! C\'est la tête pleine de bons souvenirs que nous repartons.<br/> Et comme le dit le proverbe \'jamais 2 sans 3\', alors à l\'année prochaine !', 'Matthieu, Dorothée, Apolline et Adèle L.', 'Abritel', 'Lesage', '2014-08-22', 'fr'),
(28, 'Erholung pur!', 5, 'Wir haben die zweite und dritte Augustwoche 2015 am Golf verbracht.\r\nDas Ferienhaus liegt in einer bezaubernden, ruhigen Gegend mit einem wunderbaren Blick auf den Golf - insbesondere fanden wir den Sonnenaufgang mit dem sanften Gleiten der Schiffe überwältigend. Das Haus hat große einladende Räume, die Küche ist bestens ausgestattet, die Schlafzimmer sind einfach eingerichtet mit sehr bequemen Betten.\r\nDas Bad ist neu renoviert und bietet ebenfalls einen schönen Golfblick.\r\nInsgesamt war das Haus und sehr sauber und ordentlich.\r\nLiebevoll wurden wir mit frischen Blumen, einer Flasche Wein / Wasser und bretonischen Keksen empfangen. Gewürze, Speiseöl und Essig waren auch in der Küche. Es gab viele Bildbände und Infomaterial über die Gegend sowie Kochbücher, französische Literatur, Spiele und für draußen, Gartenmöbel.\r\nDer riesige Garten bietet viel Platz zum Spielen und Faulenzen. Es sind zwei Feigenbäume mit leckeren Früchten, ein riesiger Nussbaum und sonstige kleinere Obstbäume und Sträucher.\r\nDie Umgebung lässt sich vom Haus aus sehr gut erkunden, Locmariaqer ist mit dem Fahrrad innerhalb von 15 Minuten zu erreichen.\r\nWir haben es sehr genossen und können das Ferienhaus wärmstens weiterempfehlen.\r\nVielen lieben Dank an Anne und Samuel und alles Gute - es war ein wunderschöner Urlaub!', 'Altraud N.', 'Fewo Direkt', '...', '2015-08-08', 'de'),
(29, 'Great location for a relaxing holiday', 4, 'This is a wonderful house, large, spacious and light, beautifully decorated with many unexpected thoughtful touches.The owners are still making improvements, which will make it very special when complete. It surpassed our expectations, was very clean, comfortable, with everything you might want, and more, for a self catering holiday. The view over the Gulf of Morbihan is lovely, with a coastal footpath taking you into Locmariaquer, the garden area huge, plenty of nearby walks, and lovely beaches, a short drive away. Both Locmariaquer, and La Trinite Sur Mer have lively restaurants. A good location for couples or families with children. The owners have provided a very detailed folder with information on both house and suggestions for activities. They provided excellent customer care, and were contactable if any problem should arise. We would not hesitate to return, or to recommend to family or friends.', 'Paul S.', 'HomeAway', '...', '2015-08-22', 'en'),
(30, 'Surprenant', 5, 'Nous avons été surpris tant cette location correspondait à nos attentes.\r\n\r\nTrès bonne description de la location et vous ne pouvez pas en effet la rater.\r\n\r\nLa location était propre, spacieuse , lumineuse, au calme, l\'accueil des propriétaires charmant.\r\n\r\nLes promenades superbes à faire le long du Golfe du Morbihan sur les sentiers côtiers et en plus il a fait beau !\r\n\r\nBravo à Anne & Samuel, nous reviendrons, enfin moi je l\'espère.', 'Florence', 'Abritel', 'Florence G.', '2016-04-19', 'fr'),
(31, 'Maison de charme', 5, 'Maison de 1936 ! Maison familiale rénovée avec amour : parquet, cheminées, hauts plafonds... Très bonne literie ; au réveil : chants des oiseaux, vue sur la mer et soleil. Beaucoup de jeux, de livres et de Dvd sont disponibles. Véranda très agréable pour prendre l\'apéritif. Ballade sur le sentier côtier proche de la maison sur 8 km. Propriétaires très sympas et soucieux de votre bien être. Nous avons eu un gros coup de coeur.', 'Elodie', 'Abritel', 'Elodie P.', '2016-04-23', 'fr'),
(32, 'Un délice de maison', 5, 'Pen-er-Houët : un délice de maison, une maison sur le Golfe comme on en rêve. Une maison sur le golfe comme on en rêve. Calme, vaste, confortable. Tout y est très bien conçu.\r\n\r\nUne semaine pour notre plus grand bonheur et qui plus est avec un ensoleillement permanent ! \r\n\r\nMerci aussi pour votre accueil généreux', 'Martine et Jean-Frédéric avec leurs enfants', 'Livre d\'or', 'Baeta ', '2016-06-11', 'fr'),
(33, 'Au pays merveilleux des hortensias', 5, 'Séjour trop court pour aperçevoir les fées et les lutins.<br/>Donc obligation de \'rebeloter\', merci de votre accueil chaleureux. Amitiés des Mosellois.', 'La troupe', 'Livre d\'or', 'wintzerith', '2016-07-09', 'fr'),
(34, 'Merci pour tout', 5, 'Comme l\'année dernière deux fantastiques semaines en Bretagne. Merci pour tout.', 'Mila et Marc', 'Livre d\'or', 'Beyer', '2016-07-23', 'fr'),
(35, '4ème été passé chez vous', 5, 'Toujours aussi contents de notre séjour chez vous ! Tout y est parfait. Pour nos premières vacances à 5 l\'été prochain c\'est sûr on revient ! Le rdv est pris. Avec toute notre amitié un immense merci', 'Matthieu, Dorothée, Apolline, Adèle et fille n°3', 'Livre d\'or', 'Lesage', '2016-08-06', 'fr'),
(36, 'La maison du bonheur', 5, 'Si vous aimez le charme du passé, le calme et la sérénité, cette maison est pour vous.\r\nPlus envie de partir de ce cadre enchanteur...\r\nUn lieu rénové avec goût mais avec cette touche du passé qui nous charme dès que nous ouvrons la porte d\'entrée. Une maison douce et charmante qui nous rappelle l\'enfance, un grand jardin, une adorable véranda. Des petits coins charmants où l\'on peut se poser et rêver. Nous reviendrons à Pen er Hoüet... ', 'Anne, Stéphane, Manon, Louis et Jeanne', 'Abritel', 'Courreges', '2016-08-27', 'fr'),
(37, 'Nous ne voulons plus repartir...', 0, 'La maison est magnifique et très fonctionnelle. Une belle rénovation qui a conservé le charme du passé. Une maison merveilleuse... Une maison rêvée sur le golfe du Morbihan. Nous reviendrons...', 'Anne, Stéphane, Louis, Jeanne et Manon', 'Livre d\'or', '...', '2016-08-31', 'fr'),
(38, 'Séjour de rêve dans un cadre de vie assez idéal...', 5, 'En bref, une vraie maison, un vrai jardin, une vraie Bretagne.', 'Jean-Frédéric B', 'Google', 'Baeta', '2017-06-24', 'fr'),
(39, 'Une maison pour un séjour réussi', 5, 'On se sent tout de suite bien dans cette maison, parfaitement adaptée pour un séjour en famille ou avec des amis. Sa situation au bord du golfe offre de nombreuses possibilités de ballades et son immense jardin est un terrain de jeu que petits et grands apprécient. Et puis pour couronner le tout il y a la gentillesse d\'Anne et Samuel qui prennent le temps d\'indiquer les sentiers, les plages, les restaurants..... Comment ne pas revenir à Pen er Houet ?', 'Jean Claude M. ', 'Abritel', 'Mingues', '2017-07-01', 'fr'),
(41, 'Que de bons souvenirs', 5, '5e année consécutive passée dans votre si jolie maison...\r\n Que de bons souvenirs nous emportons encore cette année.\r\nil est déjà temps de repartir, c\'est passé encore une fois beaucoup trop vite. Rendez-vous pris pour l\'été prochain ! Bien amicalement', 'Matthieu, Dorothée, Apolline, Adèle et Sybille', 'Livre d\'or', 'Lesage', '2017-08-01', 'fr'),
(42, 'Votre maison à une très belle âme', 5, 'Votre maison une très belle âme et nous nous y sommes sentis comme chez nous. La région est très belle et nous l\'avons très appréciée à tel point que nous comptons y revenir.', 'L\'équipe toulousaine', 'Livre d\'or', 'Mingues', '2017-07-01', 'fr'),
(43, 'Un nouveau séjour vraiment très très agréable', 5, 'La maison est toujours aussi pratique et agréable à vivre. Cette année, le climat était avec nous côté chaleur. Superbe partie de plage à Saint-Pierre ! Merci pour cet accueil si agréable.', 'Martin et Jean-Frédéric', 'Livre d\'or', 'Baeta', '2017-06-24', 'fr'),
(44, 'Une semaine parfaite', 5, 'Comme l\'année dernière, une semaine parfaite. On adore cette maison, dans ce coin de Bretagne que nous connaissons déjà si bien ! Jamais deux sans trois, on reviendra ! Merci pour cet endroit, cette maison où l\'on se sent si bien point à bientôt.', 'Thomas, Nathalie, Alexandre, Maxime', 'Livre d\'or', 'Cazes Texier', '2017-05-28', 'fr'),
(45, 'Séjour parfait', 5, 'Weekend ensoleillé, séjour parfait. Le plein d\'iode. Bon repos. À refaire.', 'Amélie, Jean-Claude, Catherine et Patrick', 'Livre d\'or', 'Stadelmann', '2017-05-14', 'fr'),
(46, 'Je recommande vivement ce lieu', 5, 'Cette maison des années 30 rénovée avec goût est un lieu apaisant, où chacun peut trouver son espace de sérénité. Elle incite aussi à la convivialité, de la cuisine fort bien équipée au salon cosy. Un lieu magique dès lors que les regards se tournent vers l\'extérieur, pour une vue unique sur la baie en ouvrant les volets ! ', 'Christine', 'Google', 'Christine Bernard', '2018-01-21', 'fr'),
(47, 'Un cachet fou', 5, 'Cette maison des années 30 a un cachet fou (j\'adore les fenêtres !). Elle a été rénovée avec beaucoup de goût, dans l\'esprit \"maison de famille\". La vue sur la mer est fabuleuse. On s\'y sent bien, quel que soit le temps extérieur. Chacun peut y trouver son espace pour se ressourcer. On s\'y sent vraiment comme chez soi...Alors on y reviendra !', 'Christine', 'Facebook', 'Christine Bernard', '2018-01-21', 'fr'),
(48, 'A refaire sans hésitation !', 5, 'Maison hautement recommandée ! Elle a beaucoup de charmes, est parfaitement entretenue et bien située. Les pièces sont grandes, chaleureuses et disposent de tout le confort nécessaire à un séjour en famille ou entre amis. Le jardin est immense et les jeux/jouets à disposition ne manquent pas ! Ses propriétaires sont très sérieux, courtois, disponibles et arrangeants. Encore merci !', 'Charlotte', 'Facebook', 'Charlotte Sellier', '2018-06-10', 'fr'),
(49, 'Excellente semaine', 5, 'Nous avons passé une excellente semaine dans la maison d\'Anne et Samuel. Nous avons beaucoup apprécié le charme de la demeure et l\'accueil sympathique de ses propriétaires. L\'emplacement est idéal pour découvrir la région du Morbihan (Vannes, Auray,le Golfe, l\'Ile aux Moines, les mégalithes, les huîtres et Locmariaquer évidemment !). La maison est très bien équipée et Anne et Samuel sont à l\'écoute et très réactif au moindre soucis. Merci à eux pour leur accueil. Nous y reviendrons avec plaisir si l\'occasion se présente.', 'Sébastien', 'AirBnB', 'Sébastien Maugendre', '2018-04-28', 'fr'),
(50, 'What a view ! ', 5, 'Fantastic house and great garden ! And what a view ! We really enjoyed our stay ! ', 'Karen', 'AirBnb', 'Karen Alsenoy', '2018-07-14', 'uk'),
(51, 'Un week-end en janvier 2018', 5, 'Le charme de cette maison opère dans chaque pièce et inspire la sérénité, quelque soit le temps extérieur :)\r\nTrès belle rénovation, qui ne donne qu\'une envie : revenir !!!\r\nMerci à vous c\'était parfait.', 'La Haye Fouassière : Christine, Anne Sandrine, Maribé, Didier, Daniel, Stép', 'Livre d\'or', 'Benedicto & co', '2018-01-21', 'fr'),
(52, 'Charmante maison', 5, 'Grâce à votre charmante maison, nous avons pu apprécier la quiétude du Golfe et ses paysages authentiques. Quel plaisir aussi le matin de déjeuner le soleil se reflétant sur la mer ! Nous repartons reboostés avec l\'envie de revenir. Merci encore pour votre accueil.', 'Sylvie, Pascal, Léa et Benjamin', 'Livre d\'or', 'Sylvie Lelievre', '2018-05-12', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `conEmail` varchar(255) NOT NULL,
  `conNom` varchar(100) NOT NULL,
  `conLangue` varchar(2) NOT NULL,
  `conTag` varchar(50) NOT NULL,
  `conAnneeMin` varchar(4) NOT NULL,
  `conAnneeMax` varchar(4) NOT NULL,
  `conDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `conEmail`, `conNom`, `conLangue`, `conTag`, `conAnneeMin`, `conAnneeMax`, `conDate`) VALUES
(3, 'samuel.besnard@gmail.com', '', 'fr', '', '', '', '2017-12-26 10:18:44');

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE `parametre` (
  `idParam` int(11) NOT NULL,
  `parNom` varchar(50) NOT NULL,
  `parValeur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parametre`
--

INSERT INTO `parametre` (`idParam`, `parNom`, `parValeur`) VALUES
(1, 'complet', '1');

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE `periode` (
  `idPeriode` int(11) UNSIGNED NOT NULL,
  `perDateMin` date NOT NULL,
  `perDateMax` date NOT NULL,
  `perDuree` varchar(200) CHARACTER SET utf8 NOT NULL,
  `perEtat` tinyint(4) NOT NULL,
  `perVisible` tinyint(4) NOT NULL,
  `perTarif` decimal(10,0) NOT NULL,
  `perCommentaire` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`idPeriode`, `perDateMin`, `perDateMax`, `perDuree`, `perEtat`, `perVisible`, `perTarif`, `perCommentaire`) VALUES
(48, '2019-04-06', '2019-04-13', '7', 1, 1, '650', '-'),
(49, '2019-04-13', '2019-04-20', '7', 1, 1, '650', '-'),
(50, '2019-04-20', '2019-04-27', '7', 1, 1, '650', '-'),
(51, '2019-04-27', '2019-05-04', '7', 1, 1, '650', '-'),
(52, '2019-05-04', '2019-05-11', '7', 1, 1, '550', '-'),
(53, '2019-05-11', '2019-05-18', '7', 1, 1, '550', '-'),
(54, '2019-05-18', '2019-05-25', '7', 1, 1, '550', '-'),
(55, '2019-05-25', '2019-06-01', '7', 1, 1, '550', '-'),
(56, '2019-06-01', '2019-06-08', '7', 1, 1, '550', '-'),
(57, '2019-06-08', '2019-06-15', '7', 1, 1, '550', '-'),
(58, '2019-06-15', '2019-06-22', '7', 1, 1, '550', '-'),
(59, '2019-06-22', '2019-06-29', '7', 1, 1, '550', '-'),
(60, '2019-06-29', '2019-07-06', '7', 1, 1, '550', '-'),
(61, '2019-07-06', '2019-07-13', '7', 1, 1, '900', '-'),
(62, '2019-07-13', '2019-08-03', '21', 0, 1, '2700', 'XXX #7'),
(63, '2019-08-03', '2019-08-17', '14', 0, 1, '1800', 'YYY #5'),
(64, '2019-08-17', '2019-08-31', '14', 0, 1, '1800', 'ZZZ'),
(65, '2019-08-31', '2019-09-07', '7', 1, 1, '550', '-'),
(66, '2019-09-07', '2019-09-14', '7', 1, 1, '550', '-'),
(67, '2019-09-14', '2019-09-21', '7', 1, 1, '550', '-'),
(68, '2019-09-21', '2019-09-28', '7', 1, 1, '550', '-');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD PRIMARY KEY (`idAppreciation`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Index pour la table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`idParam`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`idPeriode`),
  ADD UNIQUE KEY `idPeriode` (`idPeriode`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appreciation`
--
ALTER TABLE `appreciation`
  MODIFY `idAppreciation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT pour la table `parametre`
--
ALTER TABLE `parametre`
  MODIFY `idParam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `periode`
--
ALTER TABLE `periode`
  MODIFY `idPeriode` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
