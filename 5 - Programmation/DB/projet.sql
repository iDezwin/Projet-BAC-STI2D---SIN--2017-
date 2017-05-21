-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Lun 08 Mai 2017 à 14:55
-- Version du serveur :  5.5.54-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `day` text NOT NULL,
  `id` int(11) NOT NULL,
  `heure_o` int(11) NOT NULL,
  `minute_o` int(11) NOT NULL,
  `heure_f` int(11) NOT NULL,
  `minute_f` int(11) NOT NULL,
  `etat` int(1) NOT NULL,
  `mode` int(11) NOT NULL,
  `defaut` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`day`, `id`, `heure_o`, `minute_o`, `heure_f`, `minute_f`, `etat`, `mode`, `defaut`) VALUES
('Dimanche', 7, 14, 50, 0, 0, 1, 1, 0),
('Samedi', 6, 12, 2, 15, 15, 1, 1, 0),
('Vendredi', 5, 0, 0, 0, 0, 1, 1, 0),
('Jeudi', 4, 7, 30, 18, 45, 1, 1, 0),
('Mercredi', 3, 13, 45, 0, 0, 1, 1, 0),
('Mardi', 2, 0, 0, 0, 0, 1, 1, 0),
('Lundi', 1, 14, 11, 14, 12, 1, 1, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `test`
--
ALTER TABLE `test`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
