-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 juin 2021 à 20:26
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ifamaker`
--

-- --------------------------------------------------------

--
-- Structure de la table `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE IF NOT EXISTS `board` (
  `id_board` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id_board`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `board_user`
--

DROP TABLE IF EXISTS `board_user`;
CREATE TABLE IF NOT EXISTS `board_user` (
  `id_user_foreign` int(11) DEFAULT NULL,
  `id_board_foreign` int(11) NOT NULL,
  `administrateur` varchar(20) DEFAULT NULL,
  `activation` int(2) DEFAULT NULL,
  `token` text,
  `consult` varchar(50) DEFAULT NULL,
  KEY `id_user_foreign` (`id_user_foreign`,`id_board_foreign`),
  KEY `id_board_foreign` (`id_board_foreign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `list`
--

DROP TABLE IF EXISTS `list`;
CREATE TABLE IF NOT EXISTS `list` (
  `id_list` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `id_board_foreign` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_list`),
  KEY `id_board_foreign` (`id_board_foreign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `details` text,
  `id_list_foreign` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_task`),
  KEY `id_list_foreign` (`id_list_foreign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmation` varchar(100) DEFAULT NULL,
  `token` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `name`, `firstname`, `address`, `mail`, `password`, `confirmation`, `token`) VALUES
(1, 'JEAN-FRANCOIS', 'Johan', '4 rue du ruisseau, Borny', 'testifamaker@yopmail.com', '8bedf87d2a5bebc531262a0dc023e6aba41b42e7', 'actif', '295730318c2178fb79edc0eb724f344ede7d2dab');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `board_user`
--
ALTER TABLE `board_user`
  ADD CONSTRAINT `board_user_ibfk_1` FOREIGN KEY (`id_board_foreign`) REFERENCES `board` (`id_board`) ON DELETE CASCADE,
  ADD CONSTRAINT `board_user_ibfk_2` FOREIGN KEY (`id_user_foreign`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`id_board_foreign`) REFERENCES `board` (`id_board`) ON DELETE CASCADE;

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_list_foreign`) REFERENCES `list` (`id_list`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
