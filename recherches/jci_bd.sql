-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 juil. 2024 à 15:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jci_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `duel`
--

CREATE TABLE `duel` (
  `id_duel` int(11) NOT NULL,
  `jeux_duel` text DEFAULT NULL,
  `tirage_duel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `solo`
--

CREATE TABLE `solo` (
  `id_solo` int(11) NOT NULL,
  `jeux_solo` text NOT NULL,
  `tirage_solo` int(11) DEFAULT NULL,
  `question_solo` text NOT NULL,
  `reponse_a_solo` text NOT NULL,
  `reponse_b_solo` text NOT NULL,
  `reponse_c_solo` text NOT NULL,
  `reponse_d_solo` text NOT NULL,
  `bonne_reponse_solo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `solo`
--

INSERT INTO `solo` (`id_solo`, `jeux_solo`, `tirage_solo`, `question_solo`, `reponse_a_solo`, `reponse_b_solo`, `reponse_c_solo`, `reponse_d_solo`, `bonne_reponse_solo`) VALUES
(1, '', 1, '1-Que signifie HTML?\r\n', ' a) Hyper Text Markup Language', '\r\n b) High Tech Media Library', '\r\n c) Home Theater Multimedia Link', ' d) Hardware Technical Manual Log', ' d) Hardware Technical Manual Log'),
(2, '', 2, '2-Que signifie CPU ?\r\n', ' a) Central Processing Unit', 'b) Computer Performance Utility', ' c) Common Programming Utility', ' d) Command Prompt Utility ', 'c) Common Programming Utility'),
(3, '', 3, '3-Que signifie RAM ?', ' a) Random Access Memory', ' b) Ready Application Manager', ' c) Real-time Allocation Module', 'd) Remote Access Machine \r\n', 'd) Remote Access Machine '),
(4, '', 4, '4-Que signifie URL ?', 'a) Universal Resource Locator', ' b) User Resource Link', ' c) Unified Resource Library', 'd) Unique Resource Locator La \r\n', 'd) Unique Resource Locator La '),
(5, '', 5, '5-Que signifie LAN ?', 'a) Local Area Network', 'b) Large Area Network', 'c) Linked Access Node', 'd) Logical Address Number \r\n', 'd) Logical Address Number '),
(6, '', 6, '6-Que signifie PDF ?', 'a) Portable Document Format', 'b) Print Document File', 'c) Performance Data Format', 'd) Personal Digital Folder La ', 'd) Personal Digital Folder La '),
(7, '', 7, '7-Que signifie GUI ?', 'a) Graphical User Interface', 'b) General Utility Input', 'c) Global User Identifier', ' d) Graphic Unit Input ', ' d) Graphic Unit Input '),
(8, '', NULL, '8-Que signifie ISP ?', 'a) Internet Service Provider', 'b) Integrated System Performance', 'c) Interactive Software Program', ' d) Internal System Processor', 'b) Integrated System Performance');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `duel`
--
ALTER TABLE `duel`
  ADD PRIMARY KEY (`id_duel`);

--
-- Index pour la table `solo`
--
ALTER TABLE `solo`
  ADD PRIMARY KEY (`id_solo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `duel`
--
ALTER TABLE `duel`
  MODIFY `id_duel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `solo`
--
ALTER TABLE `solo`
  MODIFY `id_solo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
