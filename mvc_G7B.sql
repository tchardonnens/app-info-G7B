SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";

CREATE TABLE `roles` (
    `id_role` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `role_name` ENUM('admin', 'gestionnaire', 'utilisateur')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
    `id_user` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname` varchar(255) NOT NULL,
    `lastname` varchar(255) NOT NULL,
    `mail` varchar(255) NOT NULL,
    `hashed_password` varchar(255) NOT NULL,
    `profile_picture` varchar(255) NOT NULL,
    `id_role` int NOT NULL,
    `creation_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    FOREIGN KEY (`id_role`) REFERENCES `roles`(`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `teams` (
    `id_team` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `building` varchar(255) NOT NULL,
    `floor` int NOT NULL,
    `creation_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `company` (
    `id_company` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `company_name` varchar(255) NOT NULL,
    `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `teams_users` (
    `id_team_user` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_team` int NOT NULL,
    `id_user` int NOT NULL,
    FOREIGN KEY (`id_team`) REFERENCES `teams`(`id_team`),
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sensors` (
    `id_sensor` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `sensor_type` varchar(255) NOT NULL,
    `measurement_interval` int NOT NULL,
    `starting_hour` int NOT NULL,
    `ending_hour` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sensor_data` (
    `id_data` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_sensor` int NOT NULL,
    `value` int NOT NULL,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    FOREIGN KEY (`id_sensor`) REFERENCES `teams`(`id_team`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tickets` (
    `id_ticket` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user` int,
    `id_admin` int NOT NULL,
    `object` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `opening_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `last_update_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `closing_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`),
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;