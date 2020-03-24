-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 mars 2020 à 08:38
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covid_market`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_produit_magasin`
--

CREATE TABLE `a_produit_magasin` (
  `id_produit` int(11) NOT NULL,
  `id_magasin` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `a_produit_magasin`
--

INSERT INTO `a_produit_magasin` (`id_produit`, `id_magasin`) VALUES
(1, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `magasin` (
  `id_magasin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `popup_content` varchar(50) DEFAULT NULL,
  `horaire` text DEFAULT NULL,
  `commentaires` text DEFAULT NULL,
  `adresse` varchar(60) DEFAULT NULL,
  `coordinates` varchar(50) DEFAULT NULL,
  `identifiant` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `magasin`
--

INSERT INTO `magasin` (`id_magasin`, `name`, `popup_content`, `horaire`, `commentaires`, `adresse`, `coordinates`, `identifiant`, `password`) VALUES
(1, 'Auchan', 'Auchan Tomblaine', 'lundi 8 - 18h\r\nmardi 8 - 18h\r\nmercredi 8 - 18h\r\njeudi 8 - 18h\r\nvendredi 8 - 18h\r\nsamedi 8 - 18h\r\ndimache 8 - 18h', 'Parking, cb accepter', 'Avenue Eugène Pottier, 54510 Tomblaine', '[6.221531,48.686275]', '1', '1'),
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

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `quantite`, `id_categorie`) VALUES
(1, 'Pâtes', NULL, 1),
(2, 'Riz', NULL, 1),
(3, 'Conserves de légumes', NULL, 1),
(4, 'Conserves de viande', NULL, 1),
(9, 'Sacs poubelle', NULL, 3),
(7, 'Savons', NULL, 2),
(8, 'Dentifrice', NULL, 2),
(10, 'Lessive', NULL, 3),
(11, 'Pansements', NULL, 4),
(12, 'Désinfectants', NULL, 4),
(13, 'Eaux', NULL, 5),
(14, 'Laits', NULL, 5),
(15, 'Sel', NULL, 6),
(16, 'Sucre', NULL, 6),
(17, 'Allummettes', NULL, 7),
(18, 'Piles AAA ', NULL, 7),
(19, 'Pelle', NULL, 8),
(20, 'Preservatifs', NULL, 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `a_produit_magasin`
--
ALTER TABLE `a_produit_magasin`
  ADD PRIMARY KEY (`id_produit`,`id_magasin`),
  ADD KEY `id_magasin` (`id_magasin`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD PRIMARY KEY (`id_magasin`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `a_produit_magasin`
--
ALTER TABLE `a_produit_magasin`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `magasin`
--
ALTER TABLE `magasin`
  MODIFY `id_magasin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
