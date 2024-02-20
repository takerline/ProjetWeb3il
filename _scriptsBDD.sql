-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 20 fév. 2024 à 13:26
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `basile`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE `bien` (
  `id` int(11) NOT NULL,
  `blé` int(11) NOT NULL,
  `denier` int(11) NOT NULL,
  `betail` int(11) NOT NULL,
  `arme` int(11) NOT NULL,
  `cheval` int(11) NOT NULL,
  `sel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`id`, `blé`, `denier`, `betail`, `arme`, `cheval`, `sel`) VALUES
(0, 0, 230, 0, 0, 1, 34),
(1, 4660, 25760, 230, 200, 50, 8),
(2, 12, 5142, 3, 0, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `clerge`
--

CREATE TABLE `clerge` (
  `id` int(11) NOT NULL,
  `eglise` text NOT NULL,
  `rang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clerge`
--

INSERT INTO `clerge` (`id`, `eglise`, `rang`) VALUES
(3, 'Saint-Odile', 1);

-- --------------------------------------------------------

--
-- Structure de la table `croisade`
--

CREATE TABLE `croisade` (
  `id` int(11) NOT NULL,
  `idResponsable` int(11) NOT NULL,
  `Lieux` text NOT NULL,
  `Raison` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `croisade`
--

INSERT INTO `croisade` (`id`, `idResponsable`, `Lieux`, `Raison`, `Date`) VALUES
(1, 0, 'Niederschaeffolsheim', 'Manque de ressources', '1999-05-14');

-- --------------------------------------------------------

--
-- Structure de la table `declarationsorciere`
--

CREATE TABLE `declarationsorciere` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `idEglise` int(11) NOT NULL,
  `idTier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demandeseigneur`
--

CREATE TABLE `demandeseigneur` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `iddemandeur` int(11) NOT NULL,
  `iddestinataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandeseigneur`
--

INSERT INTO `demandeseigneur` (`id`, `name`, `content`, `iddemandeur`, `iddestinataire`) VALUES
(1, 'Route pavée', 'Nous souhaitons une routé pavée', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `impotclerge`
--

CREATE TABLE `impotclerge` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `idClerge` int(11) NOT NULL,
  `idTier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `impotseigneur`
--

CREATE TABLE `impotseigneur` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `idSeigneur` int(11) NOT NULL,
  `idTier` int(11) NOT NULL,
  `blé` int(11) NOT NULL,
  `denier` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `impotseigneur`
--

INSERT INTO `impotseigneur` (`id`, `name`, `idSeigneur`, `idTier`, `blé`, `denier`, `Date`) VALUES
(1, 'Impot de test', 1, 2, 10, 10, '2024-02-06'),
(4, 'impot de test 2', 1, 2, 1300, 12, '2024-02-18');

-- --------------------------------------------------------

--
-- Structure de la table `listeparticipant`
--

CREATE TABLE `listeparticipant` (
  `id` int(11) NOT NULL,
  `idCroisade` int(11) NOT NULL,
  `idParticipant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `listeparticipant`
--

INSERT INTO `listeparticipant` (`id`, `idCroisade`, `idParticipant`) VALUES
(1, 1, 2),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `username`, `password`, `idRole`) VALUES
(0, 'Sjulien', 'test', 0),
(1, 'admin', 'admin', 1),
(2, 'pegu', 'pegu', 0),
(3, 'louis', 'louis', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(0, 'Utilisateur'),
(1, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `seigneur`
--

CREATE TABLE `seigneur` (
  `id` int(11) NOT NULL,
  `Domaine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seigneur`
--

INSERT INTO `seigneur` (`id`, `Domaine`) VALUES
(1, 'Domaine Rouge');

-- --------------------------------------------------------

--
-- Structure de la table `tieretat`
--

CREATE TABLE `tieretat` (
  `id` int(11) NOT NULL,
  `seigneur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tieretat`
--

INSERT INTO `tieretat` (`id`, `seigneur`) VALUES
(2, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clerge`
--
ALTER TABLE `clerge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `croisade`
--
ALTER TABLE `croisade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idResponsable` (`idResponsable`);

--
-- Index pour la table `declarationsorciere`
--
ALTER TABLE `declarationsorciere`
  ADD KEY `idEglise` (`idEglise`),
  ADD KEY `idTier` (`idTier`);

--
-- Index pour la table `demandeseigneur`
--
ALTER TABLE `demandeseigneur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddemandeur` (`iddemandeur`),
  ADD KEY `iddestinataire` (`iddestinataire`);

--
-- Index pour la table `impotclerge`
--
ALTER TABLE `impotclerge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClerge` (`idClerge`),
  ADD KEY `idTier` (`idTier`);

--
-- Index pour la table `impotseigneur`
--
ALTER TABLE `impotseigneur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTier` (`idTier`),
  ADD KEY `idSeigneur` (`idSeigneur`);

--
-- Index pour la table `listeparticipant`
--
ALTER TABLE `listeparticipant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idParticipant` (`idParticipant`),
  ADD KEY `idCroisade` (`idCroisade`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRole` (`idRole`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `seigneur`
--
ALTER TABLE `seigneur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tieretat`
--
ALTER TABLE `tieretat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seigneur` (`seigneur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clerge`
--
ALTER TABLE `clerge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `croisade`
--
ALTER TABLE `croisade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demandeseigneur`
--
ALTER TABLE `demandeseigneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `impotclerge`
--
ALTER TABLE `impotclerge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `impotseigneur`
--
ALTER TABLE `impotseigneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `listeparticipant`
--
ALTER TABLE `listeparticipant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `seigneur`
--
ALTER TABLE `seigneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tieretat`
--
ALTER TABLE `tieretat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bien`
--
ALTER TABLE `bien`
  ADD CONSTRAINT `bien_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `clerge`
--
ALTER TABLE `clerge`
  ADD CONSTRAINT `clerge_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `croisade`
--
ALTER TABLE `croisade`
  ADD CONSTRAINT `croisade_ibfk_1` FOREIGN KEY (`idResponsable`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `declarationsorciere`
--
ALTER TABLE `declarationsorciere`
  ADD CONSTRAINT `declarationsorciere_ibfk_1` FOREIGN KEY (`idEglise`) REFERENCES `clerge` (`id`),
  ADD CONSTRAINT `declarationsorciere_ibfk_2` FOREIGN KEY (`idTier`) REFERENCES `tieretat` (`id`);

--
-- Contraintes pour la table `demandeseigneur`
--
ALTER TABLE `demandeseigneur`
  ADD CONSTRAINT `demandeseigneur_ibfk_1` FOREIGN KEY (`iddemandeur`) REFERENCES `tieretat` (`id`),
  ADD CONSTRAINT `demandeseigneur_ibfk_2` FOREIGN KEY (`iddestinataire`) REFERENCES `seigneur` (`id`);

--
-- Contraintes pour la table `impotclerge`
--
ALTER TABLE `impotclerge`
  ADD CONSTRAINT `impotclerge_ibfk_1` FOREIGN KEY (`idClerge`) REFERENCES `clerge` (`id`),
  ADD CONSTRAINT `impotclerge_ibfk_2` FOREIGN KEY (`idTier`) REFERENCES `tieretat` (`id`);

--
-- Contraintes pour la table `impotseigneur`
--
ALTER TABLE `impotseigneur`
  ADD CONSTRAINT `impotseigneur_ibfk_1` FOREIGN KEY (`idTier`) REFERENCES `tieretat` (`id`),
  ADD CONSTRAINT `impotseigneur_ibfk_2` FOREIGN KEY (`idSeigneur`) REFERENCES `seigneur` (`id`);

--
-- Contraintes pour la table `listeparticipant`
--
ALTER TABLE `listeparticipant`
  ADD CONSTRAINT `listeparticipant_ibfk_1` FOREIGN KEY (`idParticipant`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `listeparticipant_ibfk_2` FOREIGN KEY (`idCroisade`) REFERENCES `croisade` (`id`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `seigneur`
--
ALTER TABLE `seigneur`
  ADD CONSTRAINT `seigneur_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `tieretat`
--
ALTER TABLE `tieretat`
  ADD CONSTRAINT `tieretat_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `tieretat_ibfk_2` FOREIGN KEY (`seigneur`) REFERENCES `seigneur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
