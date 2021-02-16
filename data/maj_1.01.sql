-- PEH / MAJ BDD en V1.01

ALTER TABLE `appreciation` CHANGE `appLangue` `appLangue` VARCHAR( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `periode` ADD `perEventId` VARCHAR( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
ADD `perEventUrl` VARCHAR( 130 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

UPDATE periode SET `perEventId` = '3itg87n38qmpmtmo0c2oojv3ik',
`perEventUrl` = 'https://www.google.com/calendar/event?eid=M2l0Zzg3bjM4cW1wbXRtbzBjMm9vanYzaWsgdWloaGtrazkxMHJxdnNuczByZ2gwaGtlZThAZw' WHERE `periode`.`idPeriode` =62;

UPDATE periode SET `perEventId` = '2140cmrpem3v8q7bbm2k7gu89s',
`perEventUrl` = 'https://www.google.com/calendar/event?eid=MjE0MGNtcnBlbTN2OHE3YmJtMms3Z3U4OXMgdWloaGtrazkxMHJxdnNuczByZ2gwaGtlZThAZw' WHERE `periode`.`idPeriode` =63;

UPDATE periode SET `perEventId` = '0opou60r7ekf8j0ja648r9dtia',
`perEventUrl` = 'https://www.google.com/calendar/event?eid=MG9wb3U2MHI3ZWtmOGowamE2NDhyOWR0aWEgdWloaGtrazkxMHJxdnNuczByZ2gwaGtlZThAZw' WHERE `periode`.`idPeriode` =64;

