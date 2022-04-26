SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";

CREATE TABLE `roles` (
    `id_role` int(1) NOT NULL,
    `role_name` ENUM('admin', 'gestionnaire', 'utilisateur'),
    PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
    `id_user` int(11) NOT NULL,
    `firstname` varchar(30) NOT NULL,
    `lastname` varchar(30) NOT NULL,
    `mail` varchar(40) NOT NULL,
    `hashed_password` varchar(80) NOT NULL,
    `profile_picture` varchar(100) NOT NULL,
    `id_role` int(1) NOT NULL,
    `creation_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (`id_user`),
    FOREIGN KEY (`id_role`) REFERENCES `roles`(`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `teams` (
    `id_team` int(11) NOT NULL,
    `building` varchar(255) NOT NULL,
    `floor` int(3) NOT NULL,
    `creation_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (`id_team`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `company` (
    `id_company` int(11) NOT NULL,
    `company_name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    PRIMARY KEY (`id_company`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `teams_users` (
    `id_team_user` int(11) NOT NULL,
    `id_team` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    PRIMARY KEY (`id_team_user`),
    FOREIGN KEY (`id_team`) REFERENCES `teams`(`id_team`),
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sensors` (
    `id_sensor` int(11) NOT NULL,
    `sensor_type` varchar(30) NOT NULL,
    `measurement_interval` int(10) NOT NULL,
    `starting_hour` int(4) NOT NULL,
    `ending_hour` int(4) NOT NULL,
    PRIMARY KEY (`id_sensor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sensor_data` (
    `id_data` int NOT NULL,
    `id_sensor` int(11) NOT NULL,
    `value` int NOT NULL,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (`id_data`),
    FOREIGN KEY (`id_sensor`) REFERENCES `teams`(`id_team`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tickets` (
    `id_ticket` int NOT NULL,
    `id_user` int(11),
    `id_admin` int(11) NOT NULL,
    `object` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `opening_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `last_update_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `closing_ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_ticket`),
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`),
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;