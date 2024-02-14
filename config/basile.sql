-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 14 fév. 2024 à 15:36
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
-- Structure de la table `Bien`
--

CREATE TABLE `Bien` (
  `id` int(11) NOT NULL,
  `blé` int(11) NOT NULL,
  `denier` int(11) NOT NULL,
  `betail` int(11) NOT NULL,
  `arme` int(11) NOT NULL,
  `cheval` int(11) NOT NULL,
  `sel` int(11) NOT NULL,
  `idProprio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Clerge`
--

CREATE TABLE `Clerge` (
  `id` int(11) NOT NULL,
  `eglise` int(11) NOT NULL,
  `rang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Croisade`
--

CREATE TABLE `Croisade` (
  `id` int(11) NOT NULL,
  `idResponsable` int(11) NOT NULL,
  `idListeParticipant` int(11) NOT NULL,
  `Lieux` text NOT NULL,
  `Raison` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `DeclarationSorciere`
--

CREATE TABLE `DeclarationSorciere` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `idEglise` int(11) NOT NULL,
  `idTier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `DemandeSeigneur`
--

CREATE TABLE `DemandeSeigneur` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `iddemandeur` int(11) NOT NULL,
  `iddestinataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ImpotClerge`
--

CREATE TABLE `ImpotClerge` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `idClerge` int(11) NOT NULL,
  `idTier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ImpotSeigneur`
--

CREATE TABLE `ImpotSeigneur` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `idSeigneur` int(11) NOT NULL,
  `idTier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ListeParticipant`
--

CREATE TABLE `ListeParticipant` (
  `id` int(11) NOT NULL,
  `idCroisade` int(11) NOT NULL,
  `idParticipant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE `Personne` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `idRole` int(11) NOT NULL,
  `classeSociale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Seigneur`
--

CREATE TABLE `Seigneur` (
  `id` int(11) NOT NULL,
  `Domaine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TierEtat`
--

CREATE TABLE `TierEtat` (
  `id` int(11) NOT NULL,
  `seigneur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Bien`
--
ALTER TABLE `Bien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProprio` (`idProprio`);

--
-- Index pour la table `Clerge`
--
ALTER TABLE `Clerge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Croisade`
--
ALTER TABLE `Croisade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idResponsable` (`idResponsable`),
  ADD KEY `idListeParticipant` (`idListeParticipant`);

--
-- Index pour la table `DeclarationSorciere`
--
ALTER TABLE `DeclarationSorciere`
  ADD KEY `idEglise` (`idEglise`),
  ADD KEY `idTier` (`idTier`);

--
-- Index pour la table `DemandeSeigneur`
--
ALTER TABLE `DemandeSeigneur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddemandeur` (`iddemandeur`),
  ADD KEY `iddestinataire` (`iddestinataire`);

--
-- Index pour la table `ImpotClerge`
--
ALTER TABLE `ImpotClerge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClerge` (`idClerge`),
  ADD KEY `idTier` (`idTier`);

--
-- Index pour la table `ImpotSeigneur`
--
ALTER TABLE `ImpotSeigneur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTier` (`idTier`),
  ADD KEY `idSeigneur` (`idSeigneur`);

--
-- Index pour la table `ListeParticipant`
--
ALTER TABLE `ListeParticipant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRole` (`idRole`),
  ADD KEY `classeSociale` (`classeSociale`);

--
-- Index pour la table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Seigneur`
--
ALTER TABLE `Seigneur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TierEtat`
--
ALTER TABLE `TierEtat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Clerge`
--
ALTER TABLE `Clerge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Croisade`
--
ALTER TABLE `Croisade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `DemandeSeigneur`
--
ALTER TABLE `DemandeSeigneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ImpotClerge`
--
ALTER TABLE `ImpotClerge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ImpotSeigneur`
--
ALTER TABLE `ImpotSeigneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ListeParticipant`
--
ALTER TABLE `ListeParticipant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Seigneur`
--
ALTER TABLE `Seigneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TierEtat`
--
ALTER TABLE `TierEtat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Bien`
--
ALTER TABLE `Bien`
  ADD CONSTRAINT `bien_ibfk_1` FOREIGN KEY (`idProprio`) REFERENCES `Personne` (`id`);

--
-- Contraintes pour la table `Croisade`
--
ALTER TABLE `Croisade`
  ADD CONSTRAINT `croisade_ibfk_1` FOREIGN KEY (`idResponsable`) REFERENCES `Clerge` (`id`),
  ADD CONSTRAINT `croisade_ibfk_2` FOREIGN KEY (`idListeParticipant`) REFERENCES `ListeParticipant` (`id`);

--
-- Contraintes pour la table `DeclarationSorciere`
--
ALTER TABLE `DeclarationSorciere`
  ADD CONSTRAINT `declarationsorciere_ibfk_1` FOREIGN KEY (`idEglise`) REFERENCES `Clerge` (`id`),
  ADD CONSTRAINT `declarationsorciere_ibfk_2` FOREIGN KEY (`idTier`) REFERENCES `TierEtat` (`id`);

--
-- Contraintes pour la table `DemandeSeigneur`
--
ALTER TABLE `DemandeSeigneur`
  ADD CONSTRAINT `demandeseigneur_ibfk_1` FOREIGN KEY (`iddemandeur`) REFERENCES `TierEtat` (`id`),
  ADD CONSTRAINT `demandeseigneur_ibfk_2` FOREIGN KEY (`iddestinataire`) REFERENCES `Seigneur` (`id`);

--
-- Contraintes pour la table `ImpotClerge`
--
ALTER TABLE `ImpotClerge`
  ADD CONSTRAINT `impotclerge_ibfk_1` FOREIGN KEY (`idClerge`) REFERENCES `Clerge` (`id`),
  ADD CONSTRAINT `impotclerge_ibfk_2` FOREIGN KEY (`idTier`) REFERENCES `TierEtat` (`id`);

--
-- Contraintes pour la table `ImpotSeigneur`
--
ALTER TABLE `ImpotSeigneur`
  ADD CONSTRAINT `impotseigneur_ibfk_1` FOREIGN KEY (`idTier`) REFERENCES `TierEtat` (`id`),
  ADD CONSTRAINT `impotseigneur_ibfk_2` FOREIGN KEY (`idSeigneur`) REFERENCES `Seigneur` (`id`);

--
-- Contraintes pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `Role` (`id`),
  ADD CONSTRAINT `personne_ibfk_2` FOREIGN KEY (`classeSociale`) REFERENCES `Seigneur` (`id`),
  ADD CONSTRAINT `personne_ibfk_3` FOREIGN KEY (`classeSociale`) REFERENCES `Clerge` (`id`),
  ADD CONSTRAINT `personne_ibfk_4` FOREIGN KEY (`classeSociale`) REFERENCES `TierEtat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
