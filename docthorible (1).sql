-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 mai 2022 à 14:38
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `docthorible`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `disponible` int(1) NOT NULL,
  `id_client` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`id`, `type`, `date`, `heure`, `disponible`, `id_client`) VALUES
(1, 'VACCIN', '2022-05-31', '11:05:00', 0, 0),
(2, 'PCR', '2022-05-18', '19:15:00', 0, 0),
(3, 'PCR', '2022-05-18', '19:35:00', 0, 0),
(4, 'VACCIN', '2022-05-18', '08:00:00', 0, 0),
(5, 'CONSULTATION', '2022-05-31', '12:05:00', 0, 0),
(6, 'CONSULTATION', '2022-05-31', '13:05:00', 0, 0),
(7, 'CONSULTATION', '2022-05-31', '14:05:00', 0, 0),
(8, 'PCR', '2022-05-18', '19:30:00', 0, 0),
(9, 'PCR', '2022-05-18', '19:50:00', 0, 0),
(10, 'VACCIN', '2022-05-31', '11:20:00', 1, 1),
(11, 'VACCIN', '2022-05-31', '12:20:00', 1, 1),
(12, 'VACCIN', '2022-05-31', '12:40:00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `matricule` int(5) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mdp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`matricule`, `nom`, `prenom`, `mdp`) VALUES
(59001, 'BERTRAND', 'CLAUDE', 'aa'),
(59002, 'GENET', 'SANDRINE', '123'),
(59003, 'CALVET', 'FRANCK', 'louis');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `code` int(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `num_carte` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`code`, `type`, `nom`, `num_carte`) VALUES
(101, 'vaccin', 'dose 1', 0),
(102, 'vaccin', 'dose 2', 0),
(103, 'vaccin', 'dose 3', 0),
(501, 'test', 'pcr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `num_carte` int(8) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `vaccin` int(1) NOT NULL,
  `matricule_medecin` int(5) NOT NULL,
  `code` int(5) NOT NULL,
  `id_consultation` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`num_carte`, `nom`, `prenom`, `birthdate`, `vaccin`, `matricule_medecin`, `code`, `id_consultation`) VALUES
(1, 'test', 'test', '2000-01-01', 2, 59001, 0, 10),
(11013422, 'Guerra', 'Bryanna', '1972-06-05', 0, 59002, 0, 0),
(11102761, 'Marchand', 'Jean', '1952-06-11', 0, 59001, 0, 0),
(11666933, 'Courtal', 'Maxime', '1982-09-12', 0, 59001, 0, 0),
(13609711, 'Larcher', 'Paul', '1989-11-18', 0, 59001, 0, 0),
(14083181, 'Jaccoud', 'Hervé', '1983-04-12', 0, 59001, 0, 0),
(14346247, 'Ange', 'Théodore', '1995-03-05', 3, 59001, 0, 0),
(16128176, 'Kent', 'Shani', '1976-09-09', 0, 59002, 0, 0),
(18047287, 'Cowan', 'Guillaume', '1986-03-18', 0, 59002, 0, 0),
(19851255, 'Hamilton', 'Jeanne', '1997-06-26', 0, 59002, 0, 0),
(20640920, 'Spence', 'Amy', '1973-01-11', 0, 59002, 0, 0),
(21106631, 'Doisneau', 'Abraham', '1946-05-02', 0, 59001, 0, 0),
(21748239, 'Floyd', 'Jay', '1952-04-20', 0, 59002, 0, 0),
(26829544, 'Decker', 'Cheryle', '1997-02-22', 0, 59003, 0, 0),
(30619982, 'Decker', 'Margarett', '1939-06-01', 0, 59002, 0, 0),
(35024890, 'French', 'Marta', '1958-09-07', 0, 59003, 0, 0),
(35852985, 'Ashley', 'Arthur', '1933-12-24', 0, 59003, 0, 0),
(36655815, 'Cannon', 'Britney', '1966-01-24', 0, 59002, 0, 0),
(36885613, 'Baillieu', 'Thierry', '1952-04-23', 0, 59001, 0, 0),
(38947430, 'Brunet', 'Sabrina', '1993-01-15', 0, 59001, 0, 0),
(40371336, 'Pham', 'Rodney', '1946-05-14', 0, 59002, 0, 0),
(40427083, 'Randolph', 'Betsy', '1962-10-11', 0, 59003, 0, 0),
(42071107, 'Richards', 'Manuela', '1939-11-22', 0, 59002, 0, 0),
(42489664, 'Regnard', 'Lilian', '1981-06-14', 0, 59001, 0, 0),
(43020088, 'Irwin', 'Rob', '1972-06-10', 0, 59002, 0, 0),
(44843858, 'Bennett', 'Moses', '1989-05-04', 0, 59003, 0, 0),
(46547758, 'Ashley', 'Debby', '1984-12-03', 0, 59002, 0, 0),
(46788737, 'Guerra', 'Vonda', '1935-01-10', 0, 59003, 0, 0),
(51815332, 'Cannon', 'Mirian', '1933-05-12', 0, 59003, 0, 0),
(52413635, 'Vang', 'Angeles', '1970-12-31', 0, 59002, 0, 0),
(53345859, 'Frazier', 'Jeane', '1984-09-06', 0, 59002, 0, 0),
(54578839, 'Come', 'Remy', '1999-11-11', 0, 59001, 0, 0),
(54955160, 'Bentley', 'Karey', '1943-03-28', 0, 59002, 0, 0),
(55106751, 'Floyd', 'Tiera', '1947-02-03', 0, 59003, 0, 0),
(57234863, 'Spence', 'Raul', '1953-01-11', 0, 59003, 0, 0),
(58457666, 'Cowan', 'Salena', '1934-11-01', 0, 59003, 0, 0),
(59714137, 'French', 'Cristal', '1983-10-23', 0, 59002, 0, 0),
(59742209, 'Bouhier', 'Gérard', '1950-11-25', 0, 59001, 0, 0),
(61171429, 'Bennett', 'Gaetan', '1961-09-21', 0, 59002, 0, 0),
(64487779, 'Vang', 'Annie', '1951-03-25', 0, 59003, 0, 0),
(65270465, 'Richards', 'Bob', '1991-12-18', 0, 59003, 0, 0),
(66067591, 'Lemoine', 'Antoine', '1991-12-03', 0, 59001, 0, 0),
(67604069, 'Kent', 'Derrick', '1966-11-18', 0, 59003, 0, 0),
(68664439, 'Irwin', 'Rupert', '1980-10-03', 0, 59003, 0, 0),
(69628870, 'Randolph', 'Athena', '1988-09-28', 0, 59002, 0, 0),
(72063614, 'Capelle', 'Flore', '1996-05-03', 0, 59001, 0, 0),
(74344753, 'Moyer', 'Zena', '1992-06-22', 0, 59002, 0, 0),
(74509412, 'Gouin', 'Emeline', '1988-01-15', 0, 59001, 0, 0),
(74905785, 'Joux', 'Margaux', '1994-02-20', 0, 59001, 0, 0),
(77141248, 'Frazier', 'Ara', '1950-08-31', 0, 59003, 0, 0),
(78141610, 'Pham', 'Samara', '1991-11-18', 0, 59003, 0, 0),
(78775078, 'Gounelle', 'Solene', '1965-10-25', 0, 59001, 0, 0),
(80756557, 'Lavaud', 'Justine', '1985-03-30', 0, 59001, 0, 0),
(85695249, 'Moyer', 'Camille', '1945-03-27', 0, 59003, 0, 0),
(85716221, 'Hamilton', 'Tony', '1987-05-29', 0, 59003, 0, 0),
(92094382, 'Landry', 'Emmeric', '1951-11-04', 0, 59002, 0, 0),
(92432452, 'Besson', 'Aurélie', '1998-08-22', 0, 59001, 0, 0),
(93721098, 'Landry', 'Val', '1988-06-11', 0, 59003, 0, 0),
(94293778, 'Bentley', 'Tabatha', '1947-03-08', 0, 59003, 0, 0),
(94297007, 'Lambert', 'Philippe', '1974-08-02', 0, 59001, 0, 0),
(97492460, 'Lagarde', 'Céline', '1979-07-09', 0, 59001, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`code`,`num_carte`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`num_carte`,`matricule_medecin`,`code`,`id_consultation`),
  ADD KEY `matricule_medecin` (`matricule_medecin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `code` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`matricule_medecin`) REFERENCES `medecin` (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
