-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2019 at 11:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electricity`
--

-- --------------------------------------------------------

--
-- Table structure for table `consommation`
--

CREATE TABLE `consommation` (
  `id_consom` int(10) UNSIGNED NOT NULL,
  `compteur` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `valide` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `annee` int(11) NOT NULL,
  `mois` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_client` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consommation`
--

INSERT INTO `consommation` (`id_consom`, `compteur`, `valide`, `annee`, `mois`, `id_client`) VALUES
(7, 132, 1, 2018, 1, 4),
(8, 200, 1, 2018, 2, 4),
(9, 285, 1, 2018, 3, 4),
(10, 320, 1, 2018, 4, 4),
(11, 400, 1, 2018, 5, 4),
(12, 150, 1, 2018, 1, 1),
(13, 300, 1, 2018, 2, 1),
(14, 470, 1, 2018, 3, 1),
(15, 600, 1, 2018, 4, 1),
(16, 800, 1, 2018, 6, 4),
(17, 300, 1, 2018, 5, 1),
(18, 350, 1, 2018, 7, 1),
(33, 8423, 0, 2019, 0, 1),
(34, 4025, 0, 2019, 0, 3),
(35, 45712, 0, 2019, 0, 4),
(36, 128, 0, 2019, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(10) UNSIGNED NOT NULL,
  `num_facture` varchar(50) NOT NULL DEFAULT '0',
  `consommation` int(10) UNSIGNED NOT NULL,
  `prixHT` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date_enreg` date NOT NULL,
  `id_consom` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id_facture`, `num_facture`, `consommation`, `prixHT`, `date_enreg`, `id_consom`) VALUES
(13, 'CL1221', 0, 0, '2019-03-21', 7),
(14, 'CL1221', 68, 62, '2019-03-21', 8),
(15, 'CL1221', 85, 77, '2019-03-21', 9),
(16, 'CL1221', 35, 32, '2019-03-21', 10),
(17, 'CL1221', 80, 73, '2019-03-21', 11),
(18, 'PK3712', 0, 0, '2019-03-21', 12),
(19, 'PK3712', 168, 160, '2019-03-21', 13),
(20, 'PK3712', 270, 270, '2019-03-21', 14),
(21, 'PK3712', 315, 321, '2019-03-21', 15),
(22, 'CL1221', 400, 416, '2019-03-21', 16);

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_reclamation` int(10) UNSIGNED NOT NULL,
  `contenue` text NOT NULL,
  `date_envoi` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_to` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`id_reclamation`, `contenue`, `date_envoi`, `id_user`, `id_to`) VALUES
(1, 'Bonjour ceci est un test', '2019-03-07 00:00:00', 2, 1),
(2, 'Test d\'une nouvelle reclamation', '2019-03-07 00:00:00', 2, 1),
(3, 'Test de reclamation depuis le client Ali', '2019-03-07 00:00:00', 1, 2),
(4, 'Reponse pour le client Ali', '2019-03-07 00:00:00', 2, 1),
(5, 'Test', '2019-03-19 00:00:00', 2, 1),
(6, 'TEst reclamation depuis Tareq', '2019-03-19 00:00:00', 3, 2),
(7, 'Reponse pour Tareq', '2019-03-20 00:00:00', 2, 3),
(8, 'jhdbkdsjbvdfkjb', '2019-03-23 00:00:00', 2, 1),
(9, 'TEST', '2019-03-25 00:00:00', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `nom`, `prenom`, `status`) VALUES
(1, 'PK3712', '202cb962ac59075b964b07152d234b70', 'Tahir', 'Ali', 'client'),
(2, 'AD7812', '202cb962ac59075b964b07152d234b70', 'Hanafi', 'Mohamad', 'admin'),
(3, 'CL3113', '202cb962ac59075b964b07152d234b70', 'Boukoyen', 'Tareq', 'client'),
(4, 'CL1221', '202cb962ac59075b964b07152d234b70', 'Maalf', 'Amine', 'client'),
(7, 'CL4554', '202cb962ac59075b964b07152d234b70', 'Mustafa', 'Yassine', 'client'),
(8, 'CL7885', 'c6f057b86584942e415435ffb1fa93d4', 'Houssam', 'Yassin', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consommation`
--
ALTER TABLE `consommation`
  ADD PRIMARY KEY (`id_consom`),
  ADD KEY `FK_facture_user` (`id_client`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `FK_facture_consommation` (`id_consom`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`),
  ADD KEY `FK_reclamation_user` (`id_user`),
  ADD KEY `FK_reclamation_user_2` (`id_to`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consommation`
--
ALTER TABLE `consommation`
  MODIFY `id_consom` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consommation`
--
ALTER TABLE `consommation`
  ADD CONSTRAINT `FK_facture_user` FOREIGN KEY (`id_client`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `FK_facture_consommation` FOREIGN KEY (`id_consom`) REFERENCES `consommation` (`id_consom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `FK_reclamation_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `FK_reclamation_user_2` FOREIGN KEY (`id_to`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
