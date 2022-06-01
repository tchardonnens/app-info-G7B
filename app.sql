-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 01 juin 2022 à 07:28
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
-- Base de données : `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role_name` enum('admin','gestionnaire','utilisateur') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(1, 'utilisateur'),
(2, 'gestionnaire'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `sensors`
--

CREATE TABLE `sensors` (
  `id_sensor` int(11) NOT NULL,
  `sensor_type` varchar(255) NOT NULL,
  `measurement_interval` int(11) NOT NULL,
  `starting_hour` int(11) NOT NULL,
  `ending_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sensor_data`
--

CREATE TABLE `sensor_data` (
  `id_data` int(11) NOT NULL,
  `id_sensor` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id_team` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `floor` int(11) NOT NULL,
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id_team`, `name`, `building`, `floor`, `creation_ts`) VALUES
(1, 'RH', 'Tour 1', 3, '2022-06-01 05:48:01'),
(2, 'Compta', 'Tour 1', 4, '2022-06-01 05:48:17'),
(3, 'R&D', 'Tour 1', 6, '2022-06-01 05:49:16'),
(4, 'Commerciaux', 'Tour 1', 2, '2022-06-01 05:49:50'),
(5, 'Communication', 'Tour 1', 4, '2022-06-01 05:50:15'),
(6, 'Corpos', 'Tour1', 7, '2022-06-01 05:50:38');

-- --------------------------------------------------------

--
-- Structure de la table `teams_users`
--

CREATE TABLE `teams_users` (
  `id_team_user` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `object` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `opening_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `closing_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `user_picture` varchar(255) DEFAULT NULL,
  `id_role` int(11) NOT NULL DEFAULT '1',
  `creation_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `name`, `mail`, `hashed_password`, `user_picture`, `id_role`, `creation_ts`) VALUES
(9, 'Thomas', 'Chardonnens', 'chardonnens.thomas@protonmail.com', '$2y$10$ebLAfXIzuZk7R8QF2SAH8.7mkpcyh8dYg7hIaa4AJnr9U4iRQ2B6u', NULL, 1, '2022-06-01 04:32:02'),
(10, 'Tom', 'Brebis', 'test@test.com', '$2y$10$EQvMQDOMupkNpb5Zctp4M..rMLbMNNYzl1CqkvHLF8EmmMdGttiIS', NULL, 1, '2022-06-01 04:38:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id_sensor`);

--
-- Index pour la table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_sensor` (`id_sensor`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id_team`);

--
-- Index pour la table `teams_users`
--
ALTER TABLE `teams_users`
  ADD PRIMARY KEY (`id_team_user`),
  ADD KEY `id_team` (`id_team`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id_sensor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sensor_data`
--
ALTER TABLE `sensor_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `teams_users`
--
ALTER TABLE `teams_users`
  MODIFY `id_team_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD CONSTRAINT `sensor_data_ibfk_1` FOREIGN KEY (`id_sensor`) REFERENCES `teams` (`id_team`);

--
-- Contraintes pour la table `teams_users`
--
ALTER TABLE `teams_users`
  ADD CONSTRAINT `teams_users_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `teams` (`id_team`),
  ADD CONSTRAINT `teams_users_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
