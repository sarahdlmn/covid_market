-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 25 mars 2020 à 13:13
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `covid_market`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_produit_magasin`
--

DROP TABLE IF EXISTS `a_produit_magasin`;
CREATE TABLE IF NOT EXISTS `a_produit_magasin` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `id_magasin` int(11) NOT NULL DEFAULT '0',
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produit`,`id_magasin`),
  KEY `id_magasin` (`id_magasin`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `a_produit_magasin`
--

INSERT INTO `a_produit_magasin` (`id_produit`, `id_magasin`, `quantite`) VALUES
(1, 1, 5),
(20, 1, NULL),
(3, 1, 6),
(4, 1, 12),
(7, 4, NULL),
(8, 4, NULL),
(21, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Aliments de longue conservation'),
(2, 'Hygiene quoditienne'),
(3, 'Produits de ménage & désinfectants'),
(4, 'Produits Parapharmaceutiques'),
(5, 'Boissons'),
(6, 'Sel, sucre, miel, épices ..'),
(7, 'Feu, lumieres, Piles, ...'),
(8, 'Outils & autres');

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `id_magasin` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `popup_content` varchar(50) DEFAULT NULL,
  `horaire` text CHARACTER SET utf8mb4,
  `commentaires` text,
  `adresse` varchar(60) DEFAULT NULL,
  `coordinates` varchar(50) DEFAULT NULL,
  `identifiant` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_magasin`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `magasin`
--

INSERT INTO `magasin` (`id_magasin`, `name`, `popup_content`, `horaire`, `commentaires`, `adresse`, `coordinates`, `identifiant`, `password`) VALUES
(1, 'Auchan ', 'Auchan Tomblaine', NULL, NULL, NULL, '[6.221531,48.686275]', '1', '1'),
(2, 'Aldi', 'Aldi Tomblaine', NULL, NULL, NULL, '[6.219547,48.684658]', '2', '2'),
(3, 'Auchan', 'Auchan Lobau', NULL, NULL, NULL, '[6.198744,48.680994]', '3', '3'),
(4, 'Cora', 'Cora Essey', NULL, NULL, NULL, '[6.243782,48.703979]', '4', '4'),
(5, 'Cora', 'Cora Houdemont', NULL, NULL, NULL, '[6.185713,48.640396]', '5', '5'),
(6, 'Lidl', 'Lidl Tomblaine', NULL, NULL, NULL, '[6.216191,48.684829]', '6', '6'),
(7, 'Match', 'Match Saint-Max', NULL, NULL, NULL, '[6.213511,48.701634]', '7', '7'),
(8, 'MonoPrix', 'MonoPrix Nancy Centre', NULL, NULL, NULL, '[6.181327,48.688024]', '8', '8'),
(9, 'Carrefour', 'Carrefour Nancy', NULL, NULL, NULL, '[6.179257,48.695952]', '9', '9'),
(10, 'Leclerc', 'Leclerc Nancy', NULL, NULL, NULL, '[6.196569,48.695001]', '10', '10');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `id_categorie`) VALUES
(1, 'Pâtes', 1),
(2, 'Riz', 1),
(3, 'Conserves de légumes', 1),
(4, 'Conserves de viande', 1),
(9, 'Sacs poubelle', 3),
(7, 'Savons', 2),
(8, 'Dentifrice', 2),
(10, 'Lessive', 3),
(11, 'Pansements', 4),
(12, 'Désinfectants', 4),
(13, 'Eaux', 5),
(14, 'Laits', 5),
(15, 'Sel', 6),
(16, 'Sucre', 6),
(17, 'Allummettes', 7),
(18, 'Piles AAA ', 7),
(19, 'Pelle', 8),
(20, 'Preservatifs', 8),
(21, 'Raviolli', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
