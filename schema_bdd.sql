-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 16 mai 2022 à 09:46
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `infinite_measures`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `id_role` int(11) NOT NULL DEFAULT '1',
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name`, `mail`, `hashed_password`, `profile_picture`, `id_role`, `creation_ts`) VALUES
(1, 'Thomas', 'totochardo@gmail.com', '$2y$10$bYsiMlpyGAq61WUSWPLI2.LuV8Xk0zoXpSiZ8ormwCu2cFm6nbYAC', NULL, 1, '2022-05-05 12:44:46'),
(2, 'Bob', 'bob@test.fr', '$2y$10$h0hdyHkkFyJ7TXbCXRI3lejPaUnkXYXE/ufDG5FjjmOIwxPo4E75S', NULL, 1, '2022-05-05 13:16:02'),
(3, 'Thomas', 'super@test.fr', '$2y$10$lndfYXt6yQtfzdou4puOp.Ax7uPGLFVSL.IYmgjQZ8PWnVsCIfJyK', NULL, 1, '2022-05-05 15:57:46'),
(4, 'Bob', 'chardo@test.fr', '$2y$10$YG.f6TfaYkPxQ5rF2VTN6e1uQgQMFiwoOsbevwPDac34mVLIvabK2', NULL, 1, '2022-05-05 22:51:12'),
(5, 'Thomas', 'test@bowling.fr', '$2y$10$rS0oVuMWEE8lE4tapURH6.shvHSBi.5B6Qe7mEyLplpf.g2aGr3lm', NULL, 1, '2022-05-05 23:03:17'),
(6, 'Alice', 'test@test.fr', '$2y$10$ozVODoWNkFhZDQ.sZXd2UOaCyNkPhHK0Y35/dZw9YNr.3EDS7R8oK', NULL, 1, '2022-05-06 08:59:24'),
(7, 'Thomas', 'chardonnens.thomas@protonmail.com', '$2y$10$LCTX40xk8540Prx6kgxhRuEm9hfNHYPdRd9KXjTvXY3qJ8VBZRrbG', NULL, 1, '2022-05-06 11:26:07'),
(8, 'Marceau', 'test@marceau.fr', '$2y$10$dng8Nx7YeTEo2tFFFd/vRuhQLjpYAmVCNT3rpdVd3qZLtc5IcO.Wa', NULL, 1, '2022-05-06 12:10:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
