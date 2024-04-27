-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 26 avr. 2024 à 15:31
-- Version du serveur : 8.0.32
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `locar`
--

-- --------------------------------------------------------

--
-- Structure de la table `automobile`
--

DROP TABLE IF EXISTS `automobile`;
CREATE TABLE IF NOT EXISTS `automobile` (
  `imm` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `prix_loc` double NOT NULL,
  `consommation` varchar(10) NOT NULL,
  `modele` int NOT NULL,
  `transm` varchar(50) NOT NULL,
  `carburant` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`imm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `automobile`
--

INSERT INTO `automobile` (`imm`, `marque`, `prix_loc`, `consommation`, `modele`, `transm`, `carburant`, `photo`) VALUES
('B-50-141515', 'AUDI A4', 400, '10L/100KM', 2023, 'manual', 'gasoline', 'images/audi-a4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `usersadmn`
--

DROP TABLE IF EXISTS `usersadmn`;
CREATE TABLE IF NOT EXISTS `usersadmn` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `admin` int NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usersadmn`
--

INSERT INTO `usersadmn` (`username`, `password`, `photo`, `admin`) VALUES
('test', '123', '', 0),
('youness', '123', 'images/youness.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
