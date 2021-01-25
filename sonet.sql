-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 25 Janvier 2021 à 05:05
-- Version du serveur :  10.3.27-MariaDB-0+deb10u1
-- Version de PHP :  7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sonet`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartientchat`
--

CREATE TABLE `appartientchat` (
  `idChat` int(11) NOT NULL,
  `idUtilisateur` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `avote`
--

CREATE TABLE `avote` (
  `idSondage` int(11) NOT NULL,
  `idUtilisateur` varchar(16) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bloquer`
--

CREATE TABLE `bloquer` (
  `bloqueur` varchar(16) NOT NULL,
  `bloque` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chatprive`
--

CREATE TABLE `chatprive` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `idUtilisateur` varchar(16) NOT NULL,
  `idPublication` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demandeami`
--

CREATE TABLE `demandeami` (
  `id` int(11) NOT NULL,
  `envoyeur` varchar(16) NOT NULL,
  `receveur` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etreamis`
--

CREATE TABLE `etreamis` (
  `idUtilisateur1` varchar(16) NOT NULL,
  `idUtilisateur2` varchar(16) NOT NULL,
  `renameUser1` varchar(32) DEFAULT NULL,
  `renameUser2` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `identification`
--

CREATE TABLE `identification` (
  `idPublication` int(11) NOT NULL,
  `idIdentifie` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `idEnvoyeur` varchar(16) NOT NULL,
  `idChat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `sondage` int(11) NOT NULL,
  `localisation` varchar(128) NOT NULL,
  `utilisateur` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `signalement`
--

CREATE TABLE `signalement` (
  `id` int(10) UNSIGNED NOT NULL,
  `raison` text NOT NULL,
  `signaleur` varchar(16) NOT NULL,
  `signale` varchar(16) NOT NULL,
  `contenu` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

CREATE TABLE `sondage` (
  `id` int(11) NOT NULL,
  `choix1` varchar(32) NOT NULL,
  `choix2` varchar(32) NOT NULL,
  `choix3` varchar(32) NOT NULL,
  `choix4` varchar(32) NOT NULL,
  `vote1` int(11) NOT NULL,
  `vote2` int(11) NOT NULL,
  `vote3` int(11) NOT NULL,
  `vote4` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` varchar(16) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `motDePasse` varchar(64) NOT NULL,
  `dateNaissance` date NOT NULL,
  `role` varchar(16) NOT NULL,
  `photoProfil` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartientchat`
--
ALTER TABLE `appartientchat`
  ADD UNIQUE KEY `idChat` (`idChat`,`idUtilisateur`),
  ADD UNIQUE KEY `idChat_2` (`idChat`,`idUtilisateur`);

--
-- Index pour la table `avote`
--
ALTER TABLE `avote`
  ADD UNIQUE KEY `idSondage` (`idSondage`,`idUtilisateur`);

--
-- Index pour la table `bloquer`
--
ALTER TABLE `bloquer`
  ADD UNIQUE KEY `bloqueur` (`bloqueur`,`bloque`);

--
-- Index pour la table `chatprive`
--
ALTER TABLE `chatprive`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandeami`
--
ALTER TABLE `demandeami`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `envoyeur` (`envoyeur`,`receveur`);

--
-- Index pour la table `etreamis`
--
ALTER TABLE `etreamis`
  ADD UNIQUE KEY `idUtilisateur1` (`idUtilisateur1`,`idUtilisateur2`);

--
-- Index pour la table `identification`
--
ALTER TABLE `identification`
  ADD UNIQUE KEY `idPublication` (`idPublication`,`idIdentifie`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur` (`utilisateur`);

--
-- Index pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chatprive`
--
ALTER TABLE `chatprive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `demandeami`
--
ALTER TABLE `demandeami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `signalement`
--
ALTER TABLE `signalement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
