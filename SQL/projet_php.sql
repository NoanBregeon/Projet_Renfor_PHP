-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 11 avr. 2025 à 14:03
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
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `operation_type` varchar(20) DEFAULT NULL,
  `nombre1` int DEFAULT NULL,
  `nombre2` int DEFAULT NULL,
  `correct_answer` float DEFAULT NULL,
  `reste` int DEFAULT NULL,
  `difficulty` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `operation_type`, `nombre1`, `nombre2`, `correct_answer`, `reste`, `difficulty`) VALUES
(0, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 'addition', 10, 1, 11, NULL, 1),
(2, 'addition', 5, 4, 9, NULL, 1),
(3, 'addition', 3, 8, 11, NULL, 1),
(4, 'addition', 8, 5, 13, NULL, 1),
(5, 'addition', 1, 4, 5, NULL, 1),
(6, 'addition', 1, 4, 5, NULL, 1),
(7, 'addition', 3, 7, 10, NULL, 1),
(8, 'addition', 3, 10, 13, NULL, 1),
(9, 'addition', 4, 1, 5, NULL, 1),
(10, 'addition', 6, 10, 16, NULL, 1),
(11, 'addition', 2, 6, 8, NULL, 1),
(12, 'addition', 1, 1, 2, NULL, 1),
(13, 'addition', 8, 10, 18, NULL, 1),
(14, 'addition', 6, 5, 11, NULL, 1),
(15, 'addition', 3, 5, 8, NULL, 1),
(16, 'addition', 7, 7, 14, NULL, 1),
(17, 'addition', 9, 3, 12, NULL, 1),
(18, 'addition', 1, 3, 4, NULL, 1),
(19, 'addition', 1, 5, 6, NULL, 1),
(20, 'addition', 9, 9, 18, NULL, 1),
(21, 'addition', 14, 8, 22, NULL, 2),
(22, 'addition', 10, 10, 20, NULL, 2),
(23, 'addition', 4, 10, 14, NULL, 2),
(24, 'addition', 14, 5, 19, NULL, 2),
(25, 'addition', 20, 11, 31, NULL, 2),
(26, 'addition', 6, 15, 21, NULL, 2),
(27, 'addition', 8, 6, 14, NULL, 2),
(28, 'addition', 9, 1, 10, NULL, 2),
(29, 'addition', 8, 2, 10, NULL, 2),
(30, 'addition', 15, 5, 20, NULL, 2),
(31, 'addition', 17, 8, 25, NULL, 2),
(32, 'addition', 15, 16, 31, NULL, 2),
(33, 'addition', 7, 7, 14, NULL, 2),
(34, 'addition', 10, 20, 30, NULL, 2),
(35, 'addition', 20, 18, 38, NULL, 2),
(36, 'addition', 9, 8, 17, NULL, 2),
(37, 'addition', 9, 16, 25, NULL, 2),
(38, 'addition', 15, 10, 25, NULL, 2),
(39, 'addition', 7, 20, 27, NULL, 2),
(40, 'addition', 6, 8, 14, NULL, 2),
(41, 'addition', 11, 11, 22, NULL, 3),
(42, 'addition', 8, 5, 13, NULL, 3),
(43, 'addition', 1, 2, 3, NULL, 3),
(44, 'addition', 19, 3, 22, NULL, 3),
(45, 'addition', 8, 6, 14, NULL, 3),
(46, 'addition', 2, 8, 10, NULL, 3),
(47, 'addition', 29, 19, 48, NULL, 3),
(48, 'addition', 8, 1, 9, NULL, 3),
(49, 'addition', 24, 19, 43, NULL, 3),
(50, 'addition', 16, 16, 32, NULL, 3),
(51, 'addition', 11, 2, 13, NULL, 3),
(52, 'addition', 24, 5, 29, NULL, 3),
(53, 'addition', 10, 16, 26, NULL, 3),
(54, 'addition', 15, 12, 27, NULL, 3),
(55, 'addition', 7, 14, 21, NULL, 3),
(56, 'addition', 22, 24, 46, NULL, 3),
(57, 'addition', 29, 9, 38, NULL, 3),
(58, 'addition', 13, 7, 20, NULL, 3),
(59, 'addition', 29, 21, 50, NULL, 3),
(60, 'addition', 3, 11, 14, NULL, 3),
(61, 'soustraction', 10, 9, 1, NULL, 1),
(62, 'soustraction', 5, 3, 2, NULL, 1),
(63, 'soustraction', 4, 2, 2, NULL, 1),
(64, 'soustraction', 6, 2, 4, NULL, 1),
(65, 'soustraction', 9, 2, 7, NULL, 1),
(66, 'soustraction', 2, 1, 1, NULL, 1),
(67, 'soustraction', 1, 1, 0, NULL, 1),
(68, 'soustraction', 6, 2, 4, NULL, 1),
(69, 'soustraction', 7, 4, 3, NULL, 1),
(70, 'soustraction', 1, 1, 0, NULL, 1),
(71, 'soustraction', 3, 2, 1, NULL, 1),
(72, 'soustraction', 2, 2, 0, NULL, 1),
(73, 'soustraction', 3, 3, 0, NULL, 1),
(74, 'soustraction', 8, 4, 4, NULL, 1),
(75, 'soustraction', 6, 5, 1, NULL, 1),
(76, 'soustraction', 1, 1, 0, NULL, 1),
(77, 'soustraction', 6, 5, 1, NULL, 1),
(78, 'soustraction', 6, 4, 2, NULL, 1),
(79, 'soustraction', 5, 1, 4, NULL, 1),
(80, 'soustraction', 3, 2, 1, NULL, 1),
(81, 'soustraction', 13, 13, 0, NULL, 2),
(82, 'soustraction', 3, 1, 2, NULL, 2),
(83, 'soustraction', 17, 17, 0, NULL, 2),
(84, 'soustraction', 2, 2, 0, NULL, 2),
(85, 'soustraction', 18, 7, 11, NULL, 2),
(86, 'soustraction', 14, 6, 8, NULL, 2),
(87, 'soustraction', 18, 11, 7, NULL, 2),
(88, 'soustraction', 6, 6, 0, NULL, 2),
(89, 'soustraction', 3, 1, 2, NULL, 2),
(90, 'soustraction', 8, 8, 0, NULL, 2),
(91, 'soustraction', 8, 3, 5, NULL, 2),
(92, 'soustraction', 8, 7, 1, NULL, 2),
(93, 'soustraction', 11, 5, 6, NULL, 2),
(94, 'soustraction', 1, 1, 0, NULL, 2),
(95, 'soustraction', 16, 5, 11, NULL, 2),
(96, 'soustraction', 15, 6, 9, NULL, 2),
(97, 'soustraction', 15, 2, 13, NULL, 2),
(98, 'soustraction', 7, 4, 3, NULL, 2),
(99, 'soustraction', 11, 9, 2, NULL, 2),
(100, 'soustraction', 2, 1, 1, NULL, 2),
(101, 'soustraction', 12, 7, 5, NULL, 3),
(102, 'soustraction', 7, 7, 0, NULL, 3),
(103, 'soustraction', 26, 17, 9, NULL, 3),
(104, 'soustraction', 13, 8, 5, NULL, 3),
(105, 'soustraction', 8, 6, 2, NULL, 3),
(106, 'soustraction', 21, 2, 19, NULL, 3),
(107, 'soustraction', 2, 2, 0, NULL, 3),
(108, 'soustraction', 16, 10, 6, NULL, 3),
(109, 'soustraction', 26, 13, 13, NULL, 3),
(110, 'soustraction', 12, 12, 0, NULL, 3),
(111, 'soustraction', 25, 5, 20, NULL, 3),
(112, 'soustraction', 14, 7, 7, NULL, 3),
(113, 'soustraction', 19, 1, 18, NULL, 3),
(114, 'soustraction', 9, 7, 2, NULL, 3),
(115, 'soustraction', 4, 2, 2, NULL, 3),
(116, 'soustraction', 13, 13, 0, NULL, 3),
(117, 'soustraction', 4, 3, 1, NULL, 3),
(118, 'soustraction', 5, 1, 4, NULL, 3),
(119, 'soustraction', 24, 3, 21, NULL, 3),
(120, 'soustraction', 12, 2, 10, NULL, 3),
(121, 'multiplication', 1, 3, 3, NULL, 1),
(122, 'multiplication', 1, 5, 5, NULL, 1),
(123, 'multiplication', 4, 5, 20, NULL, 1),
(124, 'multiplication', 5, 5, 25, NULL, 1),
(125, 'multiplication', 5, 2, 10, NULL, 1),
(126, 'multiplication', 3, 5, 15, NULL, 1),
(127, 'multiplication', 4, 4, 16, NULL, 1),
(128, 'multiplication', 3, 3, 9, NULL, 1),
(129, 'multiplication', 3, 2, 6, NULL, 1),
(130, 'multiplication', 4, 1, 4, NULL, 1),
(131, 'multiplication', 3, 4, 12, NULL, 1),
(132, 'multiplication', 4, 4, 16, NULL, 1),
(133, 'multiplication', 3, 4, 12, NULL, 1),
(134, 'multiplication', 1, 1, 1, NULL, 1),
(135, 'multiplication', 5, 4, 20, NULL, 1),
(136, 'multiplication', 3, 2, 6, NULL, 1),
(137, 'multiplication', 5, 4, 20, NULL, 1),
(138, 'multiplication', 4, 4, 16, NULL, 1),
(139, 'multiplication', 4, 2, 8, NULL, 1),
(140, 'multiplication', 1, 4, 4, NULL, 1),
(141, 'multiplication', 9, 10, 90, NULL, 2),
(142, 'multiplication', 7, 2, 14, NULL, 2),
(143, 'multiplication', 1, 7, 7, NULL, 2),
(144, 'multiplication', 6, 7, 42, NULL, 2),
(145, 'multiplication', 10, 10, 100, NULL, 2),
(146, 'multiplication', 5, 6, 30, NULL, 2),
(147, 'multiplication', 10, 8, 80, NULL, 2),
(148, 'multiplication', 10, 8, 80, NULL, 2),
(149, 'multiplication', 10, 9, 90, NULL, 2),
(150, 'multiplication', 4, 6, 24, NULL, 2),
(151, 'multiplication', 5, 4, 20, NULL, 2),
(152, 'multiplication', 3, 2, 6, NULL, 2),
(153, 'multiplication', 3, 3, 9, NULL, 2),
(154, 'multiplication', 4, 10, 40, NULL, 2),
(155, 'multiplication', 9, 2, 18, NULL, 2),
(156, 'multiplication', 8, 1, 8, NULL, 2),
(157, 'multiplication', 10, 4, 40, NULL, 2),
(158, 'multiplication', 10, 9, 90, NULL, 2),
(159, 'multiplication', 8, 9, 72, NULL, 2),
(160, 'multiplication', 3, 1, 3, NULL, 2),
(161, 'multiplication', 11, 13, 143, NULL, 3),
(162, 'multiplication', 5, 13, 65, NULL, 3),
(163, 'multiplication', 2, 5, 10, NULL, 3),
(164, 'multiplication', 11, 3, 33, NULL, 3),
(165, 'multiplication', 5, 3, 15, NULL, 3),
(166, 'multiplication', 15, 13, 195, NULL, 3),
(167, 'multiplication', 13, 10, 130, NULL, 3),
(168, 'multiplication', 10, 5, 50, NULL, 3),
(169, 'multiplication', 2, 15, 30, NULL, 3),
(170, 'multiplication', 11, 6, 66, NULL, 3),
(171, 'multiplication', 5, 5, 25, NULL, 3),
(172, 'multiplication', 1, 12, 12, NULL, 3),
(173, 'multiplication', 10, 5, 50, NULL, 3),
(174, 'multiplication', 5, 8, 40, NULL, 3),
(175, 'multiplication', 14, 12, 168, NULL, 3),
(176, 'multiplication', 10, 11, 110, NULL, 3),
(177, 'multiplication', 1, 8, 8, NULL, 3),
(178, 'multiplication', 13, 1, 13, NULL, 3),
(179, 'multiplication', 6, 9, 54, NULL, 3),
(180, 'multiplication', 2, 3, 6, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roles` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
  `progression_addition` int DEFAULT '1',
  `valid_addition` int DEFAULT '0',
  `progression_soustraction` int DEFAULT '1',
  `valid_soustraction` int DEFAULT '0',
  `progression_division` int DEFAULT '1',
  `valid_division` int DEFAULT '0',
  `progression_multiplication` int DEFAULT '1',
  `valid_multiplication` int DEFAULT '0',
  `streak` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roles`, `progression_addition`, `valid_addition`, `progression_soustraction`, `valid_soustraction`, `progression_division`, `valid_division`, `progression_multiplication`, `valid_multiplication`, `streak`) VALUES
(1, 'Admin', 'Admin1234', 'admin', 60, 60, 60, 60, 60, 60, 60, 60, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
