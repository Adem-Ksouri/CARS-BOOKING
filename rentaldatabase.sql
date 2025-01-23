-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 jan. 2025 à 11:39
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rentaldatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `idCar` int NOT NULL AUTO_INCREMENT,
  `model` varchar(50) NOT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`idCar`),
  KEY `model_car_fk` (`model`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `car`
--

INSERT INTO `car` (`idCar`, `model`, `color`) VALUES
(7, 'BMW-X6', 'white'),
(8, 'BMW-X6', 'black'),
(9, 'Peugeot2008', 'white'),
(10, 'Golf8', 'blue'),
(11, 'HyundaI8', 'black');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`first_name`, `last_name`, `phoneNumber`, `login`, `password`, `id`) VALUES
('Adem', 'Ksouri', '55910124', 'ksouriadem44@gmail.com', '$2y$10$dn/ZYaz0E0c3YyPCiE32d.vfU/wHmPRjNGvXnJCl.XsPABgODBgmO', 1),
('firas', 'briki', '53353635', 'firas.briki@gmail.com', '$2y$10$zOZN4zuwuWmsXvS52f9LquhQQpSr8/h.wdZ8jctT/JiB0XhKCLI/G', 11),
('bilel', 'sbai', '98567833', 'bilel.sbai@gmail.com', '$2y$10$K3hRIF77BIDTEq7J1tYP0ue4LhUjg9R6pGo1kz8v5bJiZCDn.Ua.G', 3);

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gearBox` enum('Automatic','Manual','','') NOT NULL,
  `nbSeats` int NOT NULL,
  `price` float NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `model`
--

INSERT INTO `model` (`name`, `gearBox`, `nbSeats`, `price`, `rate`) VALUES
('BMW-X6', 'Automatic', 5, 160, 9.2),
('Peugeot2008', 'Manual', 5, 92, 8.8),
('Golf8', 'Manual', 5, 100, 9),
('ToyotaCorolla', 'Automatic', 5, 110, 9.1),
('HyundaI8', 'Manual', 5, 92, 8.5);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int NOT NULL AUTO_INCREMENT,
  `idCar` int NOT NULL,
  `idClient` int NOT NULL,
  `location` varchar(50) NOT NULL,
  `pudate` date NOT NULL,
  `podate` date NOT NULL,
  `totalPrice` float NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idCar_fk` (`idCar`),
  KEY `idClient_fk` (`idClient`)
) ;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `idCar`, `idClient`, `location`, `pudate`, `podate`, `totalPrice`) VALUES
(61, 9, 3, 'ariana', '2025-01-14', '2025-01-16', 184),
(60, 7, 3, 'kelibia', '2025-01-22', '2025-01-24', 320),
(59, 10, 1, 'nabeul', '2025-01-22', '2025-01-24', 200),
(58, 7, 1, 'ariana', '2025-01-08', '2025-01-10', 320),
(57, 10, 1, 'tunis', '2025-01-07', '2025-01-09', 200);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
