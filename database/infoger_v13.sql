-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.32-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table infoger. accede
CREATE TABLE IF NOT EXISTS `accede` (
  `Id_client` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL,
  PRIMARY KEY (`Id_client`,`Id_service`),
  KEY `Id_service` (`Id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.accede : ~3 rows (environ)
INSERT INTO `accede` (`Id_client`, `Id_service`) VALUES
	(1, 3),
	(1, 4),
	(2, 3);

-- Listage de la structure de la table infoger. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.categorie : ~2 rows (environ)
INSERT INTO `categorie` (`Id_categorie`, `nom_categorie`) VALUES
	(1, 'Hebergement web'),
	(2, 'Data Service');

-- Listage de la structure de la table infoger. client
CREATE TABLE IF NOT EXISTS `client` (
  `Id_client` int(11) NOT NULL AUTO_INCREMENT,
  `tel_referent` varchar(50) DEFAULT NULL,
  `mail_referent` varchar(50) DEFAULT NULL,
  `nom_entreprise` varchar(50) DEFAULT NULL,
  `adresse_entreprise` varchar(50) DEFAULT NULL,
  `nom_referent` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.client : ~20 rows (environ)
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
	(20, '', 're', '', '', 're');

-- Listage de la structure de la table infoger. log_client
CREATE TABLE IF NOT EXISTS `log_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `date_event` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_log_client_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.log_client : ~16 rows (environ)
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
	(17, 20, '2024-01-08');

-- Listage de la structure de la table infoger. nom_parametre
CREATE TABLE IF NOT EXISTS `nom_parametre` (
  `Id_nom_parametre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_nom_parametre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.nom_parametre : ~2 rows (environ)
INSERT INTO `nom_parametre` (`Id_nom_parametre`, `nom`) VALUES
	(1, 'Chemin'),
	(2, 'nom VirtualHost');

-- Listage de la structure de la table infoger. nom_status
CREATE TABLE IF NOT EXISTS `nom_status` (
  `Id_nom_status` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_nom_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.nom_status : ~3 rows (environ)
INSERT INTO `nom_status` (`Id_nom_status`, `nom`) VALUES
	(1, 'Active'),
	(2, 'Inactive'),
	(3, 'Non disponible');

-- Listage de la structure de la table infoger. parametre
CREATE TABLE IF NOT EXISTS `parametre` (
  `Id_parametre` int(11) NOT NULL AUTO_INCREMENT,
  `valeur_parametre` varchar(50) DEFAULT NULL,
  `Id_nom_parametre` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL,
  `Id_client` int(11) NOT NULL,
  PRIMARY KEY (`Id_parametre`),
  KEY `Id_nom_parametre` (`Id_nom_parametre`),
  KEY `Id_service` (`Id_service`),
  KEY `Id_client` (`Id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.parametre : ~3 rows (environ)
INSERT INTO `parametre` (`Id_parametre`, `valeur_parametre`, `Id_nom_parametre`, `Id_service`, `Id_client`) VALUES
	(1, 'tetete', 1, 3, 1),
	(5, '/dossier client 2', 1, 3, 11),
	(7, 'rignrng', 2, 3, 1);

-- Listage de la structure de la table infoger. service
CREATE TABLE IF NOT EXISTS `service` (
  `Id_service` int(11) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(50) DEFAULT NULL,
  `Id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`Id_service`),
  KEY `Id_categorie` (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.service : ~3 rows (environ)
INSERT INTO `service` (`Id_service`, `nom_service`, `Id_categorie`) VALUES
	(3, 'VirtualHost', 1),
	(4, 'DNS', 1),
	(5, 'Cloud computing', 1);

-- Listage de la structure de la table infoger. status
CREATE TABLE IF NOT EXISTS `status` (
  `Id_status` int(11) NOT NULL AUTO_INCREMENT,
  `Id_nom_status` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL,
  `Id_client` int(11) NOT NULL,
  PRIMARY KEY (`Id_status`),
  KEY `Id_nom_status` (`Id_nom_status`),
  KEY `Id_service` (`Id_service`),
  KEY `Id_client` (`Id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table infoger.status : ~4 rows (environ)
INSERT INTO `status` (`Id_status`, `Id_nom_status`, `Id_service`, `Id_client`) VALUES
	(3, 1, 3, 1),
	(4, 2, 3, 2),
	(5, 1, 4, 1),
	(6, 3, 5, 1);

-- Listage de la structure de le déclencheur infoger. historise_client
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `historise_client` AFTER INSERT ON `client` FOR EACH ROW BEGIN
	INSERT INTO log_client (id_client,date_event)
	VALUES (
		NEW.Id_client,
		NOW()
	);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
