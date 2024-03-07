-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 mars 2024 à 16:18
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `infoger`
--

-- --------------------------------------------------------

--
-- Structure de la table `accede`
--

CREATE TABLE `accede` (
  `Id_client` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accede`
--

INSERT INTO `accede` (`Id_client`, `Id_service`) VALUES
(1, 3),
(1, 4),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `Id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id_categorie`, `nom_categorie`) VALUES
(1, 'Hebergement web'),
(2, 'Data Service');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `Id_client` int(11) NOT NULL,
  `tel_referent` varchar(50) DEFAULT NULL,
  `mail_referent` varchar(50) DEFAULT NULL,
  `nom_entreprise` varchar(50) DEFAULT NULL,
  `adresse_entreprise` varchar(50) DEFAULT NULL,
  `nom_referent` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id_client`, `tel_referent`, `mail_referent`, `nom_entreprise`, `adresse_entreprise`, `nom_referent`) VALUES
(1, 'tel_referent1', 'mail_referent1', 'nom_entreprise11234', 'adresse_ent', 'nom_referent1'),
(2, '0477471031', 'hawks@gmail.com222', 'narcissique', '100 avenue champs elysées', 'Hawks1'),
(3, '', 'you10@', '', '', 'you'),
(4, '26565', 'teste', 'RT', '@gmdmod', 'exemple'),
(5, NULL, NULL, 'RT2', NULL, NULL),
(6, NULL, NULL, 'Youness', NULL, NULL),
(7, 'test1', 'test1', 'test1', 'test1', 'test1'),
(8, 'num1', 'mail1', 'entreprise1', 'adresse1', 'nom1'),
(9, '', '', '', '', 'nom1'),
(10, '', '', '', '', 'test1'),
(11, '', '', '', '', ''),
(12, 'f', 'f', 'f', 'f', 'g'),
(13, '', '', '', '', ''),
(14, 'dqs', 'youness', 'fsq', 'qsf', 'gfqszfqsqsfqfsqfs'),
(15, 'max', 'max', 'max', 'max', 'max'),
(16, '', '', '', '', ''),
(17, 'T', 'E', 'E', 'R', 'j'),
(18, 'ez', 'ez', 'ez', 'ez', 'ez'),
(19, '', '', '', '', 'ez'),
(20, '', 're', '', '', 're'),
(21, 'leto', 'leto', 'leto', 'leto', 'leto');

--
-- Déclencheurs `client`
--
DELIMITER $$
CREATE TRIGGER `historise_client` AFTER INSERT ON `client` FOR EACH ROW BEGIN
	INSERT INTO log_client (id_client,date_event)
	VALUES (
		NEW.Id_client,
		NOW()
	);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `log_client`
--

CREATE TABLE `log_client` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_event` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `log_client`
--

INSERT INTO `log_client` (`id`, `id_client`, `date_event`) VALUES
(1, 4, '2023-10-16'),
(2, 5, '2023-10-16'),
(3, 6, '2023-10-16'),
(4, 7, '2023-11-13'),
(5, 8, '2023-11-13'),
(6, 9, '2023-11-13'),
(7, 10, '2023-11-13'),
(8, 11, '2023-11-30'),
(9, 12, '2023-11-30'),
(10, 13, '2023-11-30'),
(11, 14, '2023-11-30'),
(12, 15, '2023-11-30'),
(13, 16, '2023-12-11'),
(14, 17, '2023-12-11'),
(15, 18, '2024-01-08'),
(16, 19, '2024-01-08'),
(17, 20, '2024-01-08'),
(18, 21, '2024-02-21');

-- --------------------------------------------------------

--
-- Structure de la table `nom_parametre`
--

CREATE TABLE `nom_parametre` (
  `Id_nom_parametre` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nom_parametre`
--

INSERT INTO `nom_parametre` (`Id_nom_parametre`, `nom`) VALUES
(1, 'Chemin'),
(2, 'nom VirtualHost');

-- --------------------------------------------------------

--
-- Structure de la table `nom_status`
--

CREATE TABLE `nom_status` (
  `Id_nom_status` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nom_status`
--

INSERT INTO `nom_status` (`Id_nom_status`, `nom`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE `parametre` (
  `Id_parametre` int(11) NOT NULL,
  `valeur_parametre` varchar(50) DEFAULT NULL,
  `Id_nom_parametre` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL,
  `Id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parametre`
--

INSERT INTO `parametre` (`Id_parametre`, `valeur_parametre`, `Id_nom_parametre`, `Id_service`, `Id_client`) VALUES
(1, 'okokok', 1, 3, 1),
(7, 'rignrng', 2, 3, 1),
(8, NULL, 1, 3, 2),
(9, NULL, 2, 3, 2),
(10, '', 1, 3, 3),
(11, '', 2, 3, 3),
(12, 'RTC', 1, 3, 4),
(13, 'RTVH', 2, 3, 4),
(14, 'letoc', 1, 3, 21),
(15, 'letoVH', 2, 3, 21),
(16, 'youness1', 1, 3, 6),
(17, 'youness2', 2, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `Id_service` int(11) NOT NULL,
  `nom_service` varchar(50) DEFAULT NULL,
  `Id_categorie` int(11) NOT NULL,
  `disponible` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`Id_service`, `nom_service`, `Id_categorie`, `disponible`) VALUES
(3, 'VirtualHost', 1, 'true'),
(4, 'DNS', 1, 'false'),
(5, 'Cloud computing', 1, 'false');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `Id_status` int(11) NOT NULL,
  `Id_nom_status` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL,
  `Id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`Id_status`, `Id_nom_status`, `Id_service`, `Id_client`) VALUES
(3, 1, 3, 1),
(8, 1, 3, 2),
(10, 1, 3, 3),
(12, 1, 3, 4),
(13, 1, 3, 21),
(15, 2, 3, 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accede`
--
ALTER TABLE `accede`
  ADD PRIMARY KEY (`Id_client`,`Id_service`),
  ADD KEY `Id_service` (`Id_service`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Id_client`);

--
-- Index pour la table `log_client`
--
ALTER TABLE `log_client`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK_log_client_client` (`id_client`);

--
-- Index pour la table `nom_parametre`
--
ALTER TABLE `nom_parametre`
  ADD PRIMARY KEY (`Id_nom_parametre`);

--
-- Index pour la table `nom_status`
--
ALTER TABLE `nom_status`
  ADD PRIMARY KEY (`Id_nom_status`);

--
-- Index pour la table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`Id_parametre`),
  ADD KEY `Id_nom_parametre` (`Id_nom_parametre`),
  ADD KEY `Id_service` (`Id_service`),
  ADD KEY `Id_client` (`Id_client`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Id_service`),
  ADD KEY `Id_categorie` (`Id_categorie`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id_status`),
  ADD KEY `Id_nom_status` (`Id_nom_status`),
  ADD KEY `Id_service` (`Id_service`),
  ADD KEY `Id_client` (`Id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `Id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `Id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `log_client`
--
ALTER TABLE `log_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `nom_parametre`
--
ALTER TABLE `nom_parametre`
  MODIFY `Id_nom_parametre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `nom_status`
--
ALTER TABLE `nom_status`
  MODIFY `Id_nom_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `parametre`
--
ALTER TABLE `parametre`
  MODIFY `Id_parametre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `Id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `Id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
