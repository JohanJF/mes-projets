-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 31 mai 2019 à 13:55
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

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
  PRIMARY KEY (`id_board`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `board`
--

INSERT INTO `board` (`id_board`, `title`) VALUES
(1, 'mon titre'),
(2, 'mon titre');

-- --------------------------------------------------------

--
-- Structure de la table `board_user`
--

DROP TABLE IF EXISTS `board_user`;
CREATE TABLE IF NOT EXISTS `board_user` (
  `id_user_foreign` int(11) NOT NULL,
  `id_board_foreign` int(11) NOT NULL,
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
  `description` text NOT NULL,
  `id_list_foreign` int(11) NOT NULL,
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `name`, `firstname`, `address`, `mail`, `password`) VALUES
(1, 'JEAN-FRANCOIS', 'Johan', '4 rue du ruisseau', 'jeanfrancois.johan@stagiairesifa.fr', 'mada');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `address`, `mail`, `password`, `created_at`, `updated_at`) VALUES
(1, 'JF', 'Johan', '4 rue du ruisseau', 'jeanfrancois.johan@stagiairesifa.fr', 'mada', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `board_user`
--
ALTER TABLE `board_user`
  ADD CONSTRAINT `board_user_ibfk_1` FOREIGN KEY (`id_board_foreign`) REFERENCES `board` (`id_board`),
  ADD CONSTRAINT `board_user_ibfk_2` FOREIGN KEY (`id_user_foreign`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`id_board_foreign`) REFERENCES `board` (`id_board`);

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_list_foreign`) REFERENCES `list` (`id_list`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
