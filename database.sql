-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `classes` (`id`, `name`) VALUES
(1,	'Algebra 1'),
(2,	'Geometry'),
(3,	'Algebra 2'),
(4,	'Pre-Calculus'),
(5,	'AP CSP'),
(6,	'AP Calculus'),
(7,	'AP Statistics'),
(8,	'Math 95'),
(9,	'Other');

DROP TABLE IF EXISTS `lengths`;
CREATE TABLE `lengths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lengths` (`id`, `name`) VALUES
(1,	'Once a week for 1 hour or less'),
(2,	'Once a week for 1 to 2 hours'),
(3,	'Two to three times a week for 1 hour or less'),
(4,	'Two to three times a week for 1 to 2 hours'),
(5,	'Every day for 1 hour or less'),
(6,	'Only the week before the test'),
(7,	'Other');

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `payments` (`id`, `name`) VALUES
(1,	'Between $10 to $20 per hour'),
(2,	'Between $1 to $10 per hour'),
(3,	'I can\'t pay for tutoring'),
(4,	'I can trade tutoring in another subject'),
(5,	'Other');

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
(8,	'Jane',	'Doe',	9,	'Female'),
(9,	'Jane',	'Doe',	9,	'Female'),
(10,	'Bill',	'New',	11,	'Male'),
(11,	'Bill',	'New',	11,	'Male'),
(12,	'Bill',	'New',	11,	'Male'),
(13,	'bob',	'Buenau',	9,	'Male'),
(14,	'bob',	'Buenau',	9,	'Male'),
(15,	'Tim',	'Randall',	11,	'Male'),
(16,	'Tim',	'Randall',	11,	'Male'),
(17,	'Tim',	'Scott',	10,	'Male'),
(18,	'Tim',	'Scott2',	10,	'Male'),
(19,	'Tim',	'Scott2',	10,	'Male'),
(20,	'Tim',	'Scott2',	10,	'Male'),
(21,	'Tim',	'Scott2',	10,	'Male'),
(22,	'Tim',	'Scott3',	10,	'Male'),
(23,	'Tim',	'Scott3',	10,	'Male'),
(24,	'LeAnn',	'Scott4',	11,	'Female'),
(25,	'Dina',	'Green',	12,	'Female'),
(26,	'Dina',	'Green',	12,	'Female'),
(27,	'Dina',	'Green',	12,	'Female'),
(28,	'Dina',	'Green',	12,	'Female'),
(29,	'Dina',	'Green',	12,	'Female'),
(30,	'Dina',	'Green',	12,	'Female'),
(31,	'Dina',	'Green',	12,	'Female'),
(32,	'Dina',	'Green',	12,	'Female'),
(33,	'Dina',	'Green',	12,	'Female'),
(34,	'Dina',	'Green',	12,	'Female'),
(35,	'Ben',	'Blue',	11,	'Male'),
(36,	'Ben',	'Blue',	11,	'Male'),
(37,	'Ben',	'Blue',	11,	'Male'),
(38,	'Ben',	'Blue',	11,	'Male'),
(39,	'Ben',	'Blue',	11,	'Male'),
(40,	'Ben',	'Blue',	11,	'Male');

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

INSERT INTO `people_classes` (`id`, `fkperson_id`, `fkclass_id`) VALUES
(1,	20,	3),
(2,	20,	5),
(3,	20,	8),
(4,	21,	3),
(5,	21,	5),
(6,	21,	8),
(7,	22,	3),
(8,	22,	5),
(9,	22,	7),
(10,	23,	3),
(11,	23,	5),
(12,	23,	7),
(13,	24,	3),
(14,	24,	5),
(15,	24,	7),
(16,	24,	8),
(17,	25,	4),
(18,	25,	7),
(19,	25,	9),
(20,	26,	4),
(21,	26,	7),
(22,	26,	9),
(23,	27,	4),
(24,	27,	7),
(25,	27,	9),
(26,	28,	4),
(27,	28,	7),
(28,	28,	9),
(29,	29,	4),
(30,	29,	7),
(31,	29,	9),
(32,	30,	4),
(33,	30,	7),
(34,	30,	9),
(35,	31,	4),
(36,	31,	7),
(37,	31,	9),
(38,	32,	4),
(39,	32,	7),
(40,	32,	9),
(41,	33,	4),
(42,	33,	7),
(43,	33,	9),
(44,	34,	4),
(45,	34,	7),
(46,	34,	9),
(47,	35,	4),
(48,	35,	5),
(49,	35,	7),
(50,	35,	9),
(51,	36,	4),
(52,	36,	5),
(53,	36,	7),
(54,	36,	9),
(55,	37,	4),
(56,	37,	5),
(57,	37,	7),
(58,	37,	9),
(59,	38,	4),
(60,	38,	5),
(61,	38,	7),
(62,	38,	9),
(63,	39,	4),
(64,	39,	5),
(65,	39,	7),
(66,	39,	9),
(67,	40,	4),
(68,	40,	5),
(69,	40,	7),
(70,	40,	9);

DROP TABLE IF EXISTS `times`;
CREATE TABLE `times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `times` (`id`, `name`) VALUES
(1,	'Free period'),
(2,	'Before school'),
(3,	'After school'),
(4,	'During Lunch'),
(5,	'On Weekend'),
(6,	'Other');

DROP TABLE IF EXISTS `times_lengths`;
CREATE TABLE `times_lengths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fktimes_id` int(11) NOT NULL,
  `fklengths_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fktimes_id` (`fktimes_id`),
  KEY `fklengths_id` (`fklengths_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tutors`;
CREATE TABLE `tutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tutors` (`id`, `name`) VALUES
(1,	'JCHS teacher'),
(2,	'JCHS student'),
(3,	'Non-JCHS adult'),
(4,	'Non-JCHS student'),
(5,	'Anyone!'),
(6,	'Other');

-- 2017-08-15 21:44:17