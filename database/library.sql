-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 21 avr. 2021 à 03:27
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `accepter`
--

CREATE TABLE `accepter` (
  `id_A` int(20) NOT NULL,
  `utilisateur` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `isbn` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `rendu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `aid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `password`) VALUES
('admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `isbn` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `qte` int(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id` double NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`isbn`, `name`, `author`, `genre`, `qte`, `image`, `id`, `Description`) VALUES
(0, 'STATISTIQUE ET PROBABILITÉS ', 'Abdesselam Rafik', 'SCIENCE', 12, '9782340047259_1_75.jpg', 9782340047259, 'Ce livre présente une synthèse rigoureuse de la théorie mathématique de la statistique et des probabilités. Sa présentation structurée avec une approche volontairement pratique facilite l’apprentissage et la compréhension .Il traite du calcul des probabilités et de modèles probabilistes et explique comment les appliquer à des problèmes bien concrets issus de la réalité.'),
(0, 'MATHS POUR BTS', 'Studyrama', 'SCIENCE', 30, 'bts.jpg', 9782759021, 'Enfin un manuel de mathématiques pour les groupements E et F des BTS.'),
(0, 'python proba stat', 'M Vincent Vigon ', 'INFORMATIQUE', 99, '41SkUoEfspL._SX385_BO1,204,203,200_.jpg', 9798636799368, 'En alternant théorie et scripts en Python, ce livre offre une illustration concrète des probabilités avec une belle ouverture sur les statistiques. Basé sur le programme de modélisation de l’agrégation de mathématiques, il se destine toutefois à un plus large public.'),
(0, 'Exercices corrigés en probabilités', 'jean pierre', 'Examen', 77, '51x05+WFP8L._SX329_BO1,204,203,200_.jpg', 9872167276, ''),
(0, 'Exercices corrigés d`Analyse', 'Mohammed Aassila', 'Examen', 86, '41PxHBn-5sL._SX389_BO1,204,203,200_.jpg', 9782652521, 'Ce livre rassemble des rappels de cours clairs et complets ainsi que des exercices corrigés en analyse .'),
(0, 'HTML et Developpement Web ', 'Franzi François', 'INFORMATIQUE', 40, '41WJ38SKC2L._SX391_BO1,204,203,200_.jpg', 9787478271, 'Cet ouvrage de référence se base sur SELFHTML la documentation la plus connue concernant la programmation web ');

-- --------------------------------------------------------

--
-- Structure de la table `issue`
--

CREATE TABLE `issue` (
  `id` int(255) NOT NULL,
  `utilisateur` varchar(30) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `isbn` float NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `rendu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `issue`
--

INSERT INTO `issue` (`id`, `utilisateur`, `sid`, `isbn`, `name`, `author`, `date`, `rendu`) VALUES
(81, '1991', 'Yussef Lk', 9782340000000, 'LE TRAITEMENT NUMÉRIQUE DES IMAGES EN C++ ', 'Barra Vincent', '2021-04-13 02:43:51', '2021-04-24');

-- --------------------------------------------------------

--
-- Structure de la table `request`
--

CREATE TABLE `request` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `request`
--

INSERT INTO `request` (`id`, `name`, `author`, `sid`) VALUES
(1, 'Mathématiques licence 1', 'Frédéric Bertrand', '1991');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `sid`, `name`, `branch`, `sem`, `password`, `email`) VALUES
(36, '1991', 'Yussef Lk', 'Génie Informatique', '4', '32c785d68836fb464d0b3dd983b95f9c', ''),
(1111111, 'hl', 'hichal', 'latr', '8', 'hl', 'hl@mail.com'),
(1111114, '2222', 'Reda Haiki ', 'Génie Informatique', '4', '21232f297a57a5a743894a0e4a801fc3', 'reda.haiki@ump.ac.ma');

-- --------------------------------------------------------

--
-- Structure de la table `suspendu`
--

CREATE TABLE `suspendu` (
  `ids` int(20) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `brance` varchar(30) NOT NULL,
  `sem` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suspendu`
--

INSERT INTO `suspendu` (`ids`, `sid`, `name`, `brance`, `sem`, `password`, `email`) VALUES
(38, 'hicham', 'hicham', '4', '8', 'hicham', 'admin@gmai.ma'),
(0, '1111', 'admin', 'Génie Informatique', '6', 'd41d8cd98f00b204e9800998ecf842', 'admin@admin.com'),
(0, 'hlm', 'hi', 'GÃ©nie AppliquÃ©', '2', 'd41d8cd98f00b204e9800998ecf842', 'sj@om.com'),
(0, 'hlm', 'hi', 'GÃ©nie AppliquÃ©', '2', 'd41d8cd98f00b204e9800998ecf842', 'sj@om.com'),
(0, 'hlm', 'hi', 'GÃ©nie AppliquÃ©', '2', 'd41d8cd98f00b204e9800998ecf842', 'sj@om.com'),
(0, 'hlm', 'hi', 'GÃ©nie AppliquÃ©', '2', 'd41d8cd98f00b204e9800998ecf842', 'sj@om.com'),
(0, 'hlm', 'hi', 'GÃ©nie AppliquÃ©', '2', 'd41d8cd98f00b204e9800998ecf842', 'sj@om.com'),
(0, 'hlm', 'hi', 'GÃ©nie AppliquÃ©', '2', 'd41d8cd98f00b204e9800998ecf842', 'sj@om.com'),
(0, '', '', '', '', 'd41d8cd98f00b204e9800998ecf842', ''),
(0, '', '', '', '', '', ''),
(0, '2020', 'hicham', 'Management', '2', '', '2020@gmail');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Index pour la table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
