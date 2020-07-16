-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 16 juil. 2020 à 15:49
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `examen_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `titre` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`titre`, `id`, `note`) VALUES
('photoshop', 6, 3),
('modélisation 3d', 7, 3),
('rpg maker mv', 13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id`, `titre`, `description`, `date_debut`, `date_fin`) VALUES
(1, 'EMPLOYÉ COMMERCIAL POLYVALENT – HÔTE DE CAISSE', '                Hôte de caisse : enregistrement des articles sur VLP et\r\ntraitement de tous les moyens de paiement.\r\nRespect des procédures d achat et de vente. Prévention\r\nde la démarque. Assurer une relation de confiance avec\r\nle client.                                    ', '2012-05-09', '2014-04-15'),
(2, 'CHARGÉ DE SERVICE CAISSE-ACCUEIL', 'Gestion d\'une ligne de caisse, du flux client et des\r\nflux d\'argent.\r\nRésolution des problèmes liés aux caisses, matériels,\r\nfinanciers et humains.\r\nGestion d\'un coffre comptable, du service après vente\r\net du poste accueil. Pilotage des outils informatiques\r\net gestion des plannings.\r\nOrganisation globale du travail et des tâches.\r\nPilotage du point accueil clients. Fonctions comptable, gestion coffre et des flux d’argent', '2014-03-01', '2018-12-16');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nom`, `prenom`, `mot_de_passe`, `email`, `id`) VALUES
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.admin', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `competence_id_uindex` (`id`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `experience_id_uindex` (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_uindex` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
