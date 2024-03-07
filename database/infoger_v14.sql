-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.28-MariaDB - mariadb.org binary distribution
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

-- Listage des données de la table infoger.accede : ~3 rows (environ)
DELETE FROM `accede`;
INSERT INTO `accede` (`Id_client`, `Id_service`) VALUES
	(1, 3),
	(1, 4),
	(2, 3);

-- Listage des données de la table infoger.categorie : ~2 rows (environ)
DELETE FROM `categorie`;
INSERT INTO `categorie` (`Id_categorie`, `nom_categorie`) VALUES
	(1, 'Hebergement web'),
	(2, 'Data Service');

-- Listage des données de la table infoger.client : ~21 rows (environ)
DELETE FROM `client`;
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

-- Listage des données de la table infoger.log_client : ~18 rows (environ)
DELETE FROM `log_client`;
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

-- Listage des données de la table infoger.nom_parametre : ~2 rows (environ)
DELETE FROM `nom_parametre`;
INSERT INTO `nom_parametre` (`Id_nom_parametre`, `nom`) VALUES
	(1, 'Chemin'),
	(2, 'nom VirtualHost');

-- Listage des données de la table infoger.nom_status : ~3 rows (environ)
DELETE FROM `nom_status`;
INSERT INTO `nom_status` (`Id_nom_status`, `nom`) VALUES
	(1, 'Active'),
	(2, 'Inactive'),
	(3, 'Non disponible');

-- Listage des données de la table infoger.parametre : ~3 rows (environ)
DELETE FROM `parametre`;
INSERT INTO `parametre` (`Id_parametre`, `valeur_parametre`, `Id_nom_parametre`, `Id_service`, `Id_client`) VALUES
	(1, 'okokok', 1, 3, 1),
	(5, '/dossier client 2', 1, 3, 11),
	(7, 'rignrng', 2, 3, 1);

-- Listage des données de la table infoger.service : ~3 rows (environ)
DELETE FROM `service`;
INSERT INTO `service` (`Id_service`, `nom_service`, `Id_categorie`, `disponible`) VALUES
	(3, 'VirtualHost', 1, 'true'),
	(4, 'DNS', 1, 'true'),
	(5, 'Cloud computing', 1, 'false');

-- Listage des données de la table infoger.status : ~4 rows (environ)
DELETE FROM `status`;
INSERT INTO `status` (`Id_status`, `Id_nom_status`, `Id_service`, `Id_client`) VALUES
	(3, 2, 3, 1),
	(4, 1, 3, 2),
	(5, 2, 4, 1),
	(6, 1, 5, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
