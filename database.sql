-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `people` (`id`, `first_name`, `last_name`, `grade`, `gender`) VALUES
(8,	'Jane',	'Doe',	9,	'Female');

DROP TABLE IF EXISTS `people_classes`;
CREATE TABLE `people_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fkperson_id` int(11) NOT NULL,
  `fkclass_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkperson_id` (`fkperson_id`),
  KEY `fkclass_id` (`fkclass_id`),
  CONSTRAINT `people_classes_ibfk_1` FOREIGN KEY (`fkperson_id`) REFERENCES `people` (`id`),
  CONSTRAINT `people_classes_ibfk_2` FOREIGN KEY (`fkclass_id`) REFERENCES `classes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2017-08-01 18:02:58