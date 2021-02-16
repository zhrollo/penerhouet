-- PEH / MAJ BDD en V1.03

INSERT INTO parametre (`idParam`, `parNom`, `parValeur`) VALUES (NULL, 'bddVersion', '1.03');

ALTER TABLE `periode` ADD `perDescription` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `perCommentaire` ;
ALTER TABLE `periode` CHANGE `perCommentaire` `perTitre` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;