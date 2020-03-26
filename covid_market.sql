-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 25 mars 2020 à 17:59
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
(1, 1, 8),
(20, 1, NULL),
(3, 1, 7),
(4, 1, 12),
(7, 4, NULL),
(8, 4, NULL),
(21, 4, 3),
(2, 1, NULL),
(9, 1, NULL),
(7, 1, NULL),
(8, 1, NULL),
(10, 1, NULL),
(11, 1, NULL),
(12, 1, NULL),
(13, 1, NULL),
(14, 1, NULL),
(15, 1, NULL),
(16, 1, NULL),
(17, 1, NULL),
(18, 1, NULL),
(19, 1, NULL),
(21, 1, NULL),
(1, 18, NULL),
(2, 18, NULL),
(3, 18, NULL),
(4, 18, NULL),
(9, 18, NULL),
(7, 18, NULL),
(8, 18, NULL),
(10, 18, NULL),
(11, 18, NULL),
(12, 18, NULL),
(13, 18, NULL),
(14, 18, NULL),
(15, 18, NULL),
(16, 18, NULL),
(17, 18, NULL),
(18, 18, NULL),
(19, 18, NULL),
(20, 18, NULL),
(21, 18, NULL),
(1, 19, NULL),
(2, 19, NULL),
(3, 19, NULL),
(4, 19, NULL),
(9, 19, NULL),
(7, 19, NULL),
(8, 19, NULL),
(10, 19, NULL),
(11, 19, NULL),
(12, 19, NULL),
(13, 19, NULL),
(14, 19, NULL),
(15, 19, NULL),
(16, 19, NULL),
(17, 19, NULL),
(18, 19, NULL),
(19, 19, NULL),
(20, 19, NULL),

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
  `horaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `commentaires` text,
  `adresse` varchar(60) DEFAULT NULL,
  `coordinates` varchar(50) DEFAULT NULL,
  `identifiant` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_magasin`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `magasin`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

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
(20, 'Preservatifs', 8)
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
