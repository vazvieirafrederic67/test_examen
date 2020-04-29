-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `House`;
CREATE TABLE `House` (
                         `house_id` int NOT NULL AUTO_INCREMENT,
                         `house_name` varchar(255) COLLATE utf8_bin NOT NULL,
                         `house_adress` text COLLATE utf8_bin NOT NULL,
                         `house_rooms` int NOT NULL,
                         PRIMARY KEY (`house_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `House` (`house_id`, `house_name`, `house_adress`, `house_rooms`) VALUES
(1,	'Le ranch du plaisir',	'8 avenue de la joie 67000 Strasbourg',	6),
(2,	'Le donjon de la souffrance',	'8 rue du martinet 68100 Mulhouse',	1200);

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
                        `user_id` int NOT NULL AUTO_INCREMENT,
                        `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
                        `user_house` int DEFAULT NULL,
                        PRIMARY KEY (`user_id`),
                        KEY `user_house` (`user_house`),
                        CONSTRAINT `User_ibfk_1` FOREIGN KEY (`user_house`) REFERENCES `House` (`house_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `User` (`user_id`, `user_name`, `user_house`) VALUES
(1,	'Hadrien',	1),
(2,	'Théo',	1),
(3,	'Fatine',	1),
(4,	'Mael',	1),
(5,	'Maitre Julien',	2),
(35,	'Jéjé',	1);

-- 2020-04-28 09:19:02