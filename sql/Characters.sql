-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Characters`;
CREATE TABLE `Characters` (
  `CharacterID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Species` varchar(50) DEFAULT NULL,
  `Affiliation` varchar(50) DEFAULT NULL,
  `Description` tinytext,
  PRIMARY KEY (`CharacterID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Characters` (`CharacterID`, `Name`, `Occupation`, `Species`, `Affiliation`, `Description`) VALUES
(1,	'Han Solo',	'Captain of the Millennium Falcon\nGeneral in the Re',	'Human',	'Galactic Empire; Rebel Alliance; New Republic; Gal',	'Han Solo is one of the most awesome characters in anything. Ever.');

-- 2015-11-13 09:24:39
