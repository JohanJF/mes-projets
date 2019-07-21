-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 22 juil. 2019 à 01:57
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

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

CREATE TABLE `board` (
  `id_board` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `board`
--

INSERT INTO `board` (`id_board`, `title`, `type`) VALUES
(1, 'tableau personnel 1', 'personnel'),
(2, 'tableau collab 1', 'collaboratif');

-- --------------------------------------------------------

--
-- Structure de la table `board_user`
--

CREATE TABLE `board_user` (
  `id_user_foreign` int(11) DEFAULT NULL,
  `id_board_foreign` int(11) NOT NULL,
  `administrateur` varchar(20) DEFAULT NULL,
  `activation` int(2) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `consult` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `board_user`
--

INSERT INTO `board_user` (`id_user_foreign`, `id_board_foreign`, `administrateur`, `activation`, `token`, `consult`) VALUES
(1, 1, NULL, 1, NULL, 'consulted'),
(1, 2, 'admin', 1, NULL, 'consulted'),
(3, 2, NULL, 1, 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'consulted');

-- --------------------------------------------------------

--
-- Structure de la table `list`
--

CREATE TABLE `list` (
  `id_list` int(11) NOT NULL,
  `title` text NOT NULL,
  `id_board_foreign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `list`
--

INSERT INTO `list` (`id_list`, `title`, `id_board_foreign`) VALUES
(1, 'liste 1', 1),
(2, 'ingredient', 2);

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `id_list_foreign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id_task`, `title`, `description`, `id_list_foreign`) VALUES
(1, 'tache 1', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmation` varchar(100) DEFAULT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `name`, `firstname`, `address`, `mail`, `password`, `confirmation`, `token`) VALUES
(1, 'JF', 'johan', '4 rue du ruisseau', 'jeanfrancois.johan@stagiairesifa.fr', 'a84d0af6aca8c3b116dd7e5c9fbac4ebbe0eb1bc', 'actif', 'e2a7d3f97342a924024f5312ab22f8a4ecf0d10d'),
(2, 'test', 'test', 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'actif', '8eaa75578e5aea8097a88c766f5b98170be1f242'),
(3, 'JF', 'jojo', '4 rue', 'jojomailjetable@yopmail.com', 'a84d0af6aca8c3b116dd7e5c9fbac4ebbe0eb1bc', 'actif', '8eaa75578e5aea8097a88c766f5b98170be1f242');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id_board`);

--
-- Index pour la table `board_user`
--
ALTER TABLE `board_user`
  ADD KEY `id_user_foreign` (`id_user_foreign`,`id_board_foreign`),
  ADD KEY `id_board_foreign` (`id_board_foreign`);

--
-- Index pour la table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `id_board_foreign` (`id_board_foreign`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_list_foreign` (`id_list_foreign`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `board`
--
ALTER TABLE `board`
  MODIFY `id_board` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `list`
--
ALTER TABLE `list`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
