-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 avr. 2025 à 08:14
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `progression`
--

DROP TABLE IF EXISTS `progression`;
CREATE TABLE IF NOT EXISTS `progression` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `user_answer` float DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `answered_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `operation_type` enum('addition','soustraction','multiplication','division') DEFAULT NULL,
  `nombre1` int DEFAULT NULL,
  `nombre2` int DEFAULT NULL,
  `correct_answer` float DEFAULT NULL,
  `difficulty` int DEFAULT NULL,
  `reste` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `operation_type`, `nombre1`, `nombre2`, `correct_answer`, `difficulty`, `reste`) VALUES
(1, 'addition', 18, 6, 24, 10, NULL),
(2, 'division', 30, 6, 5, 10, 0),
(3, 'addition', 14, 9, 23, 8, NULL),
(4, 'addition', 19, 19, 38, 10, NULL),
(5, 'addition', 15, 16, 31, 9, NULL),
(6, 'soustraction', 8, 8, 0, 5, NULL),
(7, 'division', 32, 3, 10, 10, 2),
(8, 'addition', 11, 5, 16, 6, NULL),
(9, 'soustraction', 7, 5, 2, 4, NULL),
(10, 'division', 63, 7, 9, 10, 0),
(11, 'addition', 3, 19, 22, 10, NULL),
(12, 'addition', 19, 6, 25, 10, NULL),
(13, 'division', 19, 6, 3, 10, 1),
(14, 'division', 6, 4, 1, 8, 2),
(15, 'soustraction', 7, 1, 6, 4, NULL),
(16, 'multiplication', 4, 13, 52, 7, NULL),
(17, 'addition', 4, 17, 21, 9, NULL),
(18, 'addition', 3, 3, 6, 2, NULL),
(19, 'division', 8, 4, 2, 5, 0),
(20, 'soustraction', 14, 2, 12, 8, NULL),
(21, 'addition', 13, 2, 15, 7, NULL),
(22, 'division', 50, 6, 8, 10, 2),
(23, 'division', 1, 1, 1, 1, 0),
(24, 'division', 6, 2, 3, 4, 0),
(25, 'soustraction', 2, 1, 1, 2, NULL),
(26, 'multiplication', 11, 19, 209, 10, NULL),
(27, 'multiplication', 7, 2, 14, 4, NULL),
(28, 'multiplication', 19, 16, 304, 10, NULL),
(29, 'multiplication', 15, 18, 270, 10, NULL),
(30, 'soustraction', 20, 2, 18, 10, NULL),
(31, 'multiplication', 15, 1, 15, 8, NULL),
(32, 'addition', 2, 4, 6, 3, NULL),
(33, 'addition', 8, 9, 17, 5, NULL),
(34, 'soustraction', 7, 1, 6, 4, NULL),
(35, 'multiplication', 15, 9, 135, 8, NULL),
(36, 'division', 22, 6, 3, 10, 4),
(37, 'soustraction', 4, 2, 2, 3, NULL),
(38, 'division', 33, 7, 4, 10, 5),
(39, 'soustraction', 2, 1, 1, 2, NULL),
(40, 'addition', 4, 2, 6, 3, NULL),
(41, 'soustraction', 1, 1, 0, 1, NULL),
(42, 'addition', 4, 3, 7, 1, NULL),
(43, 'soustraction', 3, 2, 1, 1, NULL),
(44, 'division', 2, 2, 1, 1, 0),
(45, 'addition', 1, 3, 4, 1, NULL),
(46, 'addition', 5, 20, 25, 1, NULL),
(47, 'multiplication', 16, 4, 64, 1, NULL),
(48, 'multiplication', 7, 12, 84, 1, NULL),
(49, 'division', 4, 1, 4, 1, 0),
(50, 'multiplication', 8, 12, 96, 1, NULL),
(51, 'multiplication', 10, 13, 130, 1, NULL),
(52, 'addition', 18, 7, 25, 1, NULL),
(53, 'addition', 5, 11, 16, 1, NULL),
(54, 'soustraction', 19, 13, 6, 1, NULL),
(55, 'soustraction', 2, 1, 1, 1, NULL),
(56, 'soustraction', 12, 12, 0, 1, NULL),
(57, 'soustraction', 9, 7, 2, 1, NULL),
(58, 'division', 76, 9, 8, 1, 4),
(59, 'addition', 17, 18, 35, 1, NULL),
(60, 'division', 7, 3, 2, 2, 1),
(61, 'soustraction', 13, 4, 9, 2, NULL),
(62, 'multiplication', 2, 1, 2, 2, NULL),
(63, 'soustraction', 3, 1, 2, 2, NULL),
(64, 'multiplication', 3, 4, 12, 2, NULL),
(65, 'addition', 13, 15, 28, 2, NULL),
(66, 'division', 15, 3, 5, 2, 0),
(67, 'division', 21, 5, 4, 2, 1),
(68, 'addition', 9, 14, 23, 2, NULL),
(69, 'addition', 3, 18, 21, 2, NULL),
(70, 'multiplication', 6, 11, 66, 2, NULL),
(71, 'soustraction', 9, 5, 4, 2, NULL),
(72, 'division', 48, 9, 5, 2, 3),
(73, 'soustraction', 17, 6, 11, 2, NULL),
(74, 'soustraction', 11, 3, 8, 2, NULL),
(75, 'addition', 2, 4, 6, 2, NULL),
(76, 'soustraction', 17, 10, 7, 2, NULL),
(77, 'multiplication', 6, 3, 18, 3, NULL),
(78, 'division', 5, 3, 1, 3, 2),
(79, 'multiplication', 6, 12, 72, 3, NULL),
(80, 'multiplication', 7, 9, 63, 3, NULL),
(81, 'multiplication', 20, 12, 240, 3, NULL),
(82, 'soustraction', 15, 4, 11, 3, NULL),
(83, 'soustraction', 11, 3, 8, 3, NULL),
(84, 'soustraction', 19, 1, 18, 3, NULL),
(85, 'addition', 9, 2, 11, 3, NULL),
(86, 'addition', 1, 13, 14, 3, NULL),
(87, 'soustraction', 12, 5, 7, 3, NULL),
(88, 'soustraction', 12, 12, 0, 3, NULL),
(89, 'division', 57, 7, 8, 3, 1),
(90, 'addition', 9, 10, 19, 3, NULL),
(91, 'division', 44, 5, 8, 3, 4),
(92, 'multiplication', 18, 1, 18, 3, NULL),
(93, 'addition', 1, 8, 9, 3, NULL),
(94, 'addition', 20, 5, 25, 4, NULL),
(95, 'multiplication', 14, 12, 168, 4, NULL),
(96, 'soustraction', 20, 5, 15, 4, NULL),
(97, 'division', 23, 3, 7, 4, 2),
(98, 'division', 35, 8, 4, 4, 3),
(99, 'multiplication', 6, 10, 60, 4, NULL),
(100, 'multiplication', 15, 1, 15, 4, NULL),
(101, 'addition', 9, 3, 12, 4, NULL),
(102, 'addition', 13, 9, 22, 4, NULL),
(103, 'addition', 9, 9, 18, 4, NULL),
(104, 'multiplication', 8, 11, 88, 4, NULL),
(105, 'division', 44, 5, 8, 4, 4),
(106, 'division', 14, 10, 1, 4, 4),
(107, 'division', 53, 6, 8, 4, 5),
(108, 'multiplication', 5, 12, 60, 4, NULL),
(109, 'soustraction', 13, 9, 4, 5, NULL),
(110, 'multiplication', 11, 5, 55, 5, NULL),
(111, 'soustraction', 19, 13, 6, 5, NULL),
(112, 'division', 81, 8, 10, 5, 1),
(113, 'division', 16, 3, 5, 5, 1),
(114, 'addition', 9, 6, 15, 5, NULL),
(115, 'division', 46, 9, 5, 5, 1),
(116, 'multiplication', 12, 12, 144, 5, NULL),
(117, 'addition', 8, 17, 25, 5, NULL),
(118, 'division', 6, 2, 3, 5, 0),
(119, 'multiplication', 20, 4, 80, 5, NULL),
(120, 'multiplication', 9, 2, 18, 5, NULL),
(121, 'multiplication', 1, 12, 12, 5, NULL),
(122, 'addition', 11, 5, 16, 5, NULL),
(123, 'division', 11, 3, 3, 5, 2),
(124, 'addition', 7, 2, 9, 5, NULL),
(125, 'soustraction', 6, 2, 4, 5, NULL),
(126, 'division', 12, 3, 4, 6, 0),
(127, 'division', 37, 7, 5, 6, 2),
(128, 'multiplication', 4, 12, 48, 6, NULL),
(129, 'division', 90, 9, 10, 6, 0),
(130, 'soustraction', 17, 17, 0, 6, NULL),
(131, 'addition', 8, 18, 26, 6, NULL),
(132, 'addition', 13, 1, 14, 6, NULL),
(133, 'addition', 8, 3, 11, 6, NULL),
(134, 'soustraction', 17, 10, 7, 6, NULL),
(135, 'division', 29, 9, 3, 6, 2),
(136, 'soustraction', 18, 9, 9, 6, NULL),
(137, 'multiplication', 11, 13, 143, 6, NULL),
(138, 'addition', 19, 13, 32, 6, NULL),
(139, 'division', 2, 1, 2, 6, 0),
(140, 'multiplication', 6, 6, 36, 6, NULL),
(141, 'division', 84, 9, 9, 6, 3),
(142, 'multiplication', 18, 6, 108, 6, NULL),
(143, 'multiplication', 4, 5, 20, 6, NULL),
(144, 'division', 48, 5, 9, 6, 3),
(145, 'soustraction', 12, 1, 11, 7, NULL),
(146, 'soustraction', 4, 2, 2, 7, NULL),
(147, 'addition', 1, 10, 11, 7, NULL),
(148, 'multiplication', 4, 16, 64, 7, NULL),
(149, 'addition', 13, 1, 14, 7, NULL),
(150, 'multiplication', 3, 9, 27, 7, NULL),
(151, 'division', 24, 4, 6, 7, 0),
(152, 'division', 45, 8, 5, 7, 5),
(153, 'multiplication', 17, 19, 323, 7, NULL),
(154, 'division', 16, 5, 3, 7, 1),
(155, 'soustraction', 13, 2, 11, 7, NULL),
(156, 'addition', 3, 17, 20, 7, NULL),
(157, 'soustraction', 13, 12, 1, 7, NULL),
(158, 'addition', 16, 8, 24, 7, NULL),
(159, 'division', 8, 1, 8, 7, 0),
(160, 'addition', 19, 16, 35, 7, NULL),
(161, 'multiplication', 5, 14, 70, 7, NULL),
(162, 'division', 34, 9, 3, 7, 7),
(163, 'division', 63, 9, 7, 8, 0),
(164, 'soustraction', 3, 1, 2, 8, NULL),
(165, 'soustraction', 5, 2, 3, 8, NULL),
(166, 'multiplication', 16, 11, 176, 8, NULL),
(167, 'addition', 7, 9, 16, 8, NULL),
(168, 'addition', 15, 3, 18, 8, NULL),
(169, 'multiplication', 2, 1, 2, 8, NULL),
(170, 'addition', 13, 10, 23, 8, NULL),
(171, 'addition', 3, 3, 6, 8, NULL),
(172, 'multiplication', 9, 3, 27, 8, NULL),
(173, 'soustraction', 4, 1, 3, 8, NULL),
(174, 'addition', 10, 15, 25, 8, NULL),
(175, 'addition', 7, 2, 9, 8, NULL),
(176, 'multiplication', 1, 13, 13, 8, NULL),
(177, 'division', 5, 1, 5, 8, 0),
(178, 'multiplication', 1, 12, 12, 9, NULL),
(179, 'addition', 12, 19, 31, 9, NULL),
(180, 'soustraction', 8, 4, 4, 9, NULL),
(181, 'soustraction', 9, 2, 7, 9, NULL),
(182, 'soustraction', 19, 4, 15, 9, NULL),
(183, 'multiplication', 19, 1, 19, 9, NULL),
(184, 'addition', 10, 6, 16, 9, NULL),
(185, 'soustraction', 9, 7, 2, 9, NULL),
(186, 'addition', 8, 6, 14, 9, NULL),
(187, 'soustraction', 14, 4, 10, 9, NULL),
(188, 'soustraction', 17, 8, 9, 9, NULL),
(189, 'addition', 15, 2, 17, 9, NULL),
(190, 'addition', 12, 4, 16, 9, NULL),
(191, 'soustraction', 7, 6, 1, 9, NULL),
(192, 'multiplication', 16, 13, 208, 9, NULL),
(193, 'soustraction', 16, 11, 5, 9, NULL),
(194, 'addition', 4, 5, 9, 9, NULL),
(195, 'addition', 1, 4, 5, 9, NULL),
(196, 'multiplication', 10, 18, 180, 10, NULL),
(197, 'division', 38, 4, 9, 10, 2),
(198, 'soustraction', 15, 13, 2, 10, NULL),
(199, 'multiplication', 16, 17, 272, 10, NULL),
(200, 'multiplication', 19, 4, 76, 10, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `age`, `role`) VALUES
(1, 'Admin', 'Admin1234', NULL, 'admin'),
(2, 'lisa', '1234', 8, 'user'),
(3, 'tom', 'abcd', 8, 'user'),
(4, 'emma', 'test', 8, 'user'),
(5, 'leo', 'maths', 8, 'user'),
(6, 'mia', 'cool', 8, 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
