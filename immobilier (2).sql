-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 déc. 2020 à 18:10
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `idAgent` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(100) NOT NULL,
  PRIMARY KEY (`idAgent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`idAgent`, `prenom`, `nom`, `adresse`, `telephone`) VALUES
('moussa', 'Moussa', 'diouf', 'rufisque', 778445567);

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

DROP TABLE IF EXISTS `bien`;
CREATE TABLE IF NOT EXISTS `bien` (
  `idBien` int(50) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`idBien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(100) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `prenom`, `nom`, `adresse`, `telephone`) VALUES
('seydina', 'seydina', 'diongue', 'dakar', 771442030);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`login`, `mdp`, `etat`) VALUES
('moussa', 'diouf', 'actif'),
('seydina', 'DIONGUE', 'actif');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `idLoc` int(50) NOT NULL AUTO_INCREMENT,
  `dateEtree` date DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `arriere` float DEFAULT NULL,
  `idBien` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`idLoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(50) NOT NULL AUTO_INCREMENT,
  `idBien` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(50) NOT NULL,
  `idClient` varchar(50) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`idReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
