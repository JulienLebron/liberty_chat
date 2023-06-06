-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 juin 2023 à 10:43
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `liberty`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `nickname`, `color`, `message`, `createdAt`) VALUES
(4, 'Ryu92i', '#03e230', 'Capcom viens d annoncer street fighter 6 !. Vous &ecirc;tes int&eacute;ress&eacute; si il sort sur xbox 😎', '2023-06-05 16:11:58'),
(5, 'Ryu92i', '#ad85ea', 'J&#039;esp&egrave;re qu&#039;il sera sur Xbox aussi', '2023-06-05 16:12:24'),
(6, 'Ryu92i', '#fb0ea4', 'Oui clairement je prendrai day one sur xbox s&#039;il est l&agrave;', '2023-06-05 16:12:36'),
(7, 'Ryu92i', '#0b35e0', 'La musique du teaser est abus&eacute;&hellip; mais sinon j attends vraiment d en savoir plus avant de me prononcer car j&rsquo;ai pas accrocher au 5.\r\nPour le moment je suis plus int&eacute;ress&eacute; par la compile o&ugrave; il y a darkstalker !!! 👌😉', '2023-06-05 16:12:56'),
(8, 'Ryu92i', '#ff9b70', 'Je m&#039;attendais &agrave; mieux comme annonce.\r\nLe titre est immonde par contre. 😒', '2023-06-05 16:13:19'),
(9, 'Ryu92i', '#121212', 'Par contre si il faut des ann&eacute;es pour qu&#039;il soit acceptable &ccedil;a va pas le faire . :(', '2023-06-05 16:13:44'),
(10, 'Ryu92i', '#e70d0d', 'Esperons qu&#039;il sorte sur Xbox tout simplement. 🙏🙏', '2023-06-05 16:14:09'),
(11, 'Ryu92i', '#21837c', 'Dommage que le 5 ne soit pas sorti du Xbox.\r\n\r\nEnfin je parle de l&#039;&eacute;dition compl&egrave;te pas le jeu en kit qu&#039;on a eu sur PS4.\r\n\r\nSur PS4 je l&#039;ai achet&eacute;, j&#039;ai vu que plus de la moiti&eacute; des persos &eacute;taient en DLC, je l&#039;ai enlev&eacute; direct', '2023-06-05 16:14:29'),
(12, 'Ryu92i', '#d6a92e', 'Hello comment &ccedil;a va aujourd&#039;hui !', '2023-06-06 10:39:56');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nickname`, `lastname`, `firstname`, `email`, `password`, `createdAt`) VALUES
(4, 'Ryu92i', 'Lebron', 'Julien', 'lebron.pro.77@gmail.com', '$2y$10$nvAHaY3G1bnb8sPSP1G7E.0DxLhg2H7d3BK0rS0zc7Vl/cWZYVb3q', '2023-06-05 14:36:26'),
(5, 'Alexandre998', 'Lebron', 'David', 'lebron.david.77@gmail.com', '$2y$10$grDwhrxv5wJjkWVEiyez/.pnypuQyH2plDy3fbYGPF3ixSIqTO222', '2023-06-05 16:06:23'),
(6, 'Valekouz', 'Valek', 'John', 'valek@gmail.com', '$2y$10$Q8OluwL4Ddjc8BBrMaTcN.a54QEdb/v.06Eu0yWG57UkQH41Rp2/S', '2023-06-05 16:06:54');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
