-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 22 mai 2020 à 22:05
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `caf`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `code_admin` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`code_admin`, `login`, `mdp`) VALUES
(1, 'admin', 'Com&Lettrenb!0'),
(2, 'admin1', 'nblettrecom0!!');

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites`
--

CREATE TABLE `disponibilites` (
  `code_etudiant` varchar(100) NOT NULL,
  `code_jour` varchar(100) NOT NULL,
  `code_horaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `disponibilites`
--

INSERT INTO `disponibilites` (`code_etudiant`, `code_jour`, `code_horaire`) VALUES
('kokik45', '1', 1),
('kokik45', '2', 1),
('kokik45', '3', 1),
('kokik45', '4', 1),
('kokik45', '5', 1),
('tab22tab', '1', 1),
('tab22tab', '1', 2),
('tab22tab', '1', 3),
('tab22tab', '1', 4),
('tab22tab', '2', 1),
('tab22tab', '2', 2),
('tab22tab', '2', 3),
('tab22tab', '2', 4),
('tab22tab', '2', 5),
('tab22tab', '3', 1),
('tab22tab', '3', 2),
('tab22tab', '3', 3),
('tab22tab', '3', 4),
('timluc121', '1', 6),
('timluc121', '1', 7),
('timluc121', '2', 1),
('timluc121', '2', 8),
('timluc121', '3', 2),
('timluc121', '3', 7),
('timluc121', '3', 9);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `code_etudiant` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `courriel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`code_etudiant`, `nom`, `prenom`, `courriel`) VALUES
('195285', 'testeur', 'titi', 'pierret@hotmail.ca'),
('kokik45', 'testult', 'Kiko', 'kiki@hotmail.fr'),
('tab22tab', 'testTableau', 'tableaul', 'tabtab@hotmail.fr'),
('timluc121', 'Luc', 'tim', 'luc@jj.fr');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `code_horaire` int(11) NOT NULL,
  `horaire` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`code_horaire`, `horaire`) VALUES
(1, '8:00am - 9:00am'),
(2, '9:00am - 10:00am'),
(3, '10:00am - 11:00am'),
(4, '11:00am - 12:00am'),
(5, '1:00pm - 2:00pm'),
(6, '2:00pm - 3:00pm'),
(7, '3:00pm - 4:00pm'),
(8, '4:00pm - 5:00pm'),
(9, '5:00pm - 6:00pm');

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `code_jour` varchar(100) NOT NULL,
  `jour` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`code_jour`, `jour`) VALUES
('1', 'Lundi'),
('2', 'Mardi'),
('3', 'Mercredi'),
('4', 'Jeudi'),
('5', 'Vendredi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`code_admin`);

--
-- Index pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD PRIMARY KEY (`code_etudiant`,`code_jour`,`code_horaire`),
  ADD KEY `disponibilites_jour0_FK` (`code_jour`),
  ADD KEY `disponibilites_horaire1_FK` (`code_horaire`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`code_etudiant`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`code_horaire`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`code_jour`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `code_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `code_horaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD CONSTRAINT `disponibilites_etudiant_FK` FOREIGN KEY (`code_etudiant`) REFERENCES `etudiant` (`code_etudiant`),
  ADD CONSTRAINT `disponibilites_horaire1_FK` FOREIGN KEY (`code_horaire`) REFERENCES `horaire` (`code_horaire`),
  ADD CONSTRAINT `disponibilites_jour0_FK` FOREIGN KEY (`code_jour`) REFERENCES `jour` (`code_jour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
