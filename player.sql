-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 14 jan. 2018 à 00:39
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alexcaus_bddivao`
--

-- --------------------------------------------------------

--
-- Structure de la table `client_ivao`
--

DROP TABLE IF EXISTS `wp_devcom`;
CREATE TABLE `wp_devcom` (
  `id` int(11) NOT NULL,
  `devcom_option_pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `devcom_option_discord` varchar(255) CHARACTER SET utf8 NOT NULL,
  `devcom_option_steamid` varchar(17) CHARACTER SET utf8 NOT NULL,
  `devcom_option_user_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client_ivao`
--
ALTER TABLE `wp_devcom`
  ADD PRIMARY KEY (`id`);
  ADD devcom_option_pseudo ('devcom_option_pseudo'); 

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client_ivao`
--
ALTER TABLE `wp_devcom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
