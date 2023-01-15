-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 15 jan. 2023 à 18:39
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tamagotchiProject`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE `actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `action_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actions`
--

INSERT INTO `actions` (`id`, `action_name`) VALUES
(1, 'eat'),
(2, 'drink'),
(3, 'bedtime'),
(4, 'enjoy');

-- --------------------------------------------------------

--
-- Structure de la table `tamagotchi`
--

CREATE TABLE `tamagotchi` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `faim` int(2) NOT NULL,
  `soif` int(2) NOT NULL,
  `ennui` int(2) NOT NULL,
  `sommeil` int(2) NOT NULL,
  `living` int(2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `level` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tamagotchi`
--

INSERT INTO `tamagotchi` (`id`, `name`, `faim`, `soif`, `ennui`, `sommeil`, `living`, `user_id`, `level`, `created_at`, `last_update`) VALUES
(1, 'Alpha', 0, 100, 35, 35, 0, 1, 1, '2023-01-15 19:04:21', '2023-01-15 19:04:30'),
(2, 'Bêta', 0, 100, 15, 75, 0, 1, 1, '2023-01-15 19:06:05', '2023-01-15 19:07:00'),
(3, 'Kappa', 90, 80, 55, 80, 1, 1, 1, '2023-01-15 19:07:08', '2023-01-15 19:32:44');

--
-- Déclencheurs `tamagotchi`
--
DELIMITER $$
CREATE TRIGGER `update_stats_bedtime` AFTER UPDATE ON `tamagotchi` FOR EACH ROW IF NEW.sommeil <> OLD.sommeil THEN
        BEGIN
        INSERT INTO tamagotchis_actions (tamagotchi_id, action_id, date)
        VALUES (NEW.id, 3, NOW());
        END;
        END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stats_enjoy` AFTER UPDATE ON `tamagotchi` FOR EACH ROW IF NEW.ennui <> OLD.ennui THEN
        BEGIN
        INSERT INTO tamagotchis_actions (tamagotchi_id, action_id, date)
        VALUES (NEW.id, 4, NOW());
        END;
        END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stats_faim` AFTER UPDATE ON `tamagotchi` FOR EACH ROW IF NEW.faim <> OLD.faim THEN
        BEGIN
        INSERT INTO tamagotchis_actions (tamagotchi_id, action_id, date)
        VALUES (NEW.id, 1, NOW());
        END;
        END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stats_soif` AFTER UPDATE ON `tamagotchi` FOR EACH ROW IF NEW.soif <> OLD.soif AND NEW.soif THEN
        BEGIN
        INSERT INTO tamagotchis_actions (tamagotchi_id, action_id, date)
        VALUES (NEW.id, 2, NOW());
        END;
        END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tamagotchis_actions`
--

CREATE TABLE `tamagotchis_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `action_id` varchar(255) NOT NULL,
  `tamagotchi_id` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tamagotchis_actions`
--

INSERT INTO `tamagotchis_actions` (`id`, `action_id`, `tamagotchi_id`, `date`) VALUES
(1, '1', '1', '2023-01-15 19:04:26'),
(2, '2', '1', '2023-01-15 19:04:26'),
(3, '3', '1', '2023-01-15 19:04:26'),
(4, '4', '1', '2023-01-15 19:04:26'),
(5, '1', '1', '2023-01-15 19:04:27'),
(6, '2', '1', '2023-01-15 19:04:27'),
(7, '3', '1', '2023-01-15 19:04:27'),
(8, '4', '1', '2023-01-15 19:04:27'),
(9, '2', '1', '2023-01-15 19:04:27'),
(10, '1', '1', '2023-01-15 19:04:28'),
(11, '2', '1', '2023-01-15 19:04:28'),
(12, '3', '1', '2023-01-15 19:04:28'),
(13, '4', '1', '2023-01-15 19:04:28'),
(14, '2', '1', '2023-01-15 19:04:28'),
(15, '1', '1', '2023-01-15 19:04:28'),
(16, '2', '1', '2023-01-15 19:04:28'),
(17, '3', '1', '2023-01-15 19:04:28'),
(18, '4', '1', '2023-01-15 19:04:28'),
(19, '2', '1', '2023-01-15 19:04:28'),
(20, '1', '1', '2023-01-15 19:04:29'),
(21, '2', '1', '2023-01-15 19:04:29'),
(22, '3', '1', '2023-01-15 19:04:29'),
(23, '4', '1', '2023-01-15 19:04:29'),
(24, '2', '1', '2023-01-15 19:04:29'),
(25, '1', '1', '2023-01-15 19:04:29'),
(26, '2', '1', '2023-01-15 19:04:29'),
(27, '3', '1', '2023-01-15 19:04:29'),
(28, '4', '1', '2023-01-15 19:04:29'),
(29, '2', '1', '2023-01-15 19:04:29'),
(30, '1', '1', '2023-01-15 19:04:30'),
(31, '2', '1', '2023-01-15 19:04:30'),
(32, '3', '1', '2023-01-15 19:04:30'),
(33, '4', '1', '2023-01-15 19:04:30'),
(34, '2', '1', '2023-01-15 19:04:30'),
(35, '1', '2', '2023-01-15 19:06:16'),
(36, '2', '2', '2023-01-15 19:06:16'),
(37, '3', '2', '2023-01-15 19:06:16'),
(38, '4', '2', '2023-01-15 19:06:16'),
(39, '1', '2', '2023-01-15 19:06:17'),
(40, '2', '2', '2023-01-15 19:06:17'),
(41, '3', '2', '2023-01-15 19:06:17'),
(42, '4', '2', '2023-01-15 19:06:17'),
(43, '3', '2', '2023-01-15 19:06:17'),
(44, '1', '2', '2023-01-15 19:06:59'),
(45, '2', '2', '2023-01-15 19:06:59'),
(46, '3', '2', '2023-01-15 19:06:59'),
(47, '4', '2', '2023-01-15 19:06:59'),
(48, '1', '2', '2023-01-15 19:06:59'),
(49, '2', '2', '2023-01-15 19:06:59'),
(50, '3', '2', '2023-01-15 19:06:59'),
(51, '4', '2', '2023-01-15 19:06:59'),
(52, '1', '2', '2023-01-15 19:07:00'),
(53, '2', '2', '2023-01-15 19:07:00'),
(54, '3', '2', '2023-01-15 19:07:00'),
(55, '4', '2', '2023-01-15 19:07:00'),
(56, '2', '2', '2023-01-15 19:07:00'),
(57, '1', '2', '2023-01-15 19:07:00'),
(58, '2', '2', '2023-01-15 19:07:00'),
(59, '3', '2', '2023-01-15 19:07:00'),
(60, '4', '2', '2023-01-15 19:07:00'),
(61, '2', '2', '2023-01-15 19:07:00'),
(62, '1', '2', '2023-01-15 19:07:00'),
(63, '2', '2', '2023-01-15 19:07:00'),
(64, '3', '2', '2023-01-15 19:07:00'),
(65, '4', '2', '2023-01-15 19:07:00'),
(66, '2', '2', '2023-01-15 19:07:00'),
(67, '1', '3', '2023-01-15 19:08:23'),
(68, '2', '3', '2023-01-15 19:08:23'),
(69, '3', '3', '2023-01-15 19:08:23'),
(70, '4', '3', '2023-01-15 19:08:23'),
(71, '1', '3', '2023-01-15 19:08:25'),
(72, '2', '3', '2023-01-15 19:08:25'),
(73, '3', '3', '2023-01-15 19:08:25'),
(74, '4', '3', '2023-01-15 19:08:25'),
(75, '1', '3', '2023-01-15 19:08:27'),
(76, '2', '3', '2023-01-15 19:08:27'),
(77, '3', '3', '2023-01-15 19:08:27'),
(78, '4', '3', '2023-01-15 19:08:27'),
(79, '1', '3', '2023-01-15 19:08:30'),
(80, '2', '3', '2023-01-15 19:08:30'),
(81, '3', '3', '2023-01-15 19:08:30'),
(82, '4', '3', '2023-01-15 19:08:30'),
(83, '2', '3', '2023-01-15 19:08:30'),
(84, '1', '3', '2023-01-15 19:08:32'),
(85, '2', '3', '2023-01-15 19:08:32'),
(86, '3', '3', '2023-01-15 19:08:32'),
(87, '4', '3', '2023-01-15 19:08:32'),
(88, '1', '3', '2023-01-15 19:08:39'),
(89, '2', '3', '2023-01-15 19:08:39'),
(90, '3', '3', '2023-01-15 19:08:39'),
(91, '4', '3', '2023-01-15 19:08:39'),
(92, '1', '3', '2023-01-15 19:08:43'),
(93, '2', '3', '2023-01-15 19:08:43'),
(94, '3', '3', '2023-01-15 19:08:43'),
(95, '4', '3', '2023-01-15 19:08:43'),
(96, '3', '3', '2023-01-15 19:08:43'),
(97, '1', '3', '2023-01-15 19:08:45'),
(98, '2', '3', '2023-01-15 19:08:45'),
(99, '3', '3', '2023-01-15 19:08:45'),
(100, '4', '3', '2023-01-15 19:08:45'),
(101, '1', '3', '2023-01-15 19:08:47'),
(102, '2', '3', '2023-01-15 19:08:47'),
(103, '3', '3', '2023-01-15 19:08:47'),
(104, '4', '3', '2023-01-15 19:08:47'),
(105, '1', '3', '2023-01-15 19:08:47'),
(106, '1', '3', '2023-01-15 19:08:53'),
(107, '2', '3', '2023-01-15 19:08:53'),
(108, '3', '3', '2023-01-15 19:08:53'),
(109, '4', '3', '2023-01-15 19:08:53'),
(110, '1', '3', '2023-01-15 19:32:44'),
(111, '2', '3', '2023-01-15 19:32:44'),
(112, '3', '3', '2023-01-15 19:32:44'),
(113, '4', '3', '2023-01-15 19:32:44');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`) VALUES
(1, 'Cloé');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tamagotchi`
--
ALTER TABLE `tamagotchi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tamagotchis_actions`
--
ALTER TABLE `tamagotchis_actions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tamagotchi`
--
ALTER TABLE `tamagotchi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tamagotchis_actions`
--
ALTER TABLE `tamagotchis_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
