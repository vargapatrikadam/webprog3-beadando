-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 09:14 PM
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
-- Database: `webprog3beadando`
--
CREATE DATABASE IF NOT EXISTS `webprog3beadando` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webprog3beadando`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `ware_id` int(11) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `ware_id`, `users_id`) VALUES
(1, 1, 16),
(2, 2, 16),
(15, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  `postal_code` varchar(4) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `street_number` varchar(10) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `date`, `postal_code`, `city`, `street`, `street_number`, `users_id`) VALUES
(1, '1559322773', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 1),
(2, '1559322962', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 1),
(3, '1559323100', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 1),
(4, '1559323122', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 1),
(5, '1559323215', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 1),
(6, '1559323232', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 1),
(7, '1559323250', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 1),
(8, '1559323270', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 1),
(9, '1559323283', '2694', 'Cserháthaláp', 'Deák Ferenc út', '1', 1),
(10, '1559339565', '2694', 'Cserháthaláp', 'Deák Ferenc út', '1', 1),
(11, '1559339929', '2694', 'Cserháthaláp', 'Deák Ferenc út', '1', 1),
(12, '1559340159', '2694', 'Cserháthaláp', 'Deák Ferenc út', '1', 1),
(13, '1559340182', '2694', 'Cserháthaláp', 'Deák Ferenc út', '1', 1),
(14, '1559340945', '2694', 'Cserháthaláp', 'Deák Ferenc út', '1', 2),
(15, '1559344963', '2694', 'Cserháthaláp', 'Deák Ferenc út', '1', 1),
(16, '1560087383', '2694', 'Cserháthaláp', 'Deák Ferenc út 1', '1', 24),
(17, '1560678971', '2694', 'Cserháthaláp', 'Deák Ferenc út', '1', 25);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_wares`
--

CREATE TABLE `receipt_wares` (
  `id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `ware_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_wares`
--

INSERT INTO `receipt_wares` (`id`, `receipt_id`, `ware_id`) VALUES
(3, 4, 1),
(4, 4, 1),
(5, 4, 1),
(6, 5, 1),
(7, 5, 1),
(8, 5, 1),
(9, 6, 1),
(10, 6, 1),
(11, 6, 1),
(12, 9, 2),
(13, 9, 2),
(14, 9, 1),
(15, 10, 1),
(16, 11, 1),
(17, 12, 1),
(18, 14, 1),
(19, 15, 3),
(20, 16, 1),
(21, 16, 2),
(22, 16, 3),
(23, 17, 1),
(24, 17, 2),
(25, 17, 3),
(26, 17, 5),
(27, 17, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$aET8A/SsV3n2k/.2.VfOAu81o2OwEVZkBhbtn3wNzY7XBETpgmYtC', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1560678432, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'elyldor', '$2y$10$XHvizL7T5GMNECVP.Ybz3OYKgz5qCsMt4PKG7Ls71Qwm4367saPeG', 'elyldor@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559299488, 1559340933, 1, 'patrik', 'varga', NULL, NULL),
(3, '::1', 'asd', '$2y$10$zVMHEeUEpThlxXi/60NSgu59cqNtk.BvLXmFXRuMaGMA1M6xl53aK', 'asd@asd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559299685, NULL, 1, 'asd', 'asd', NULL, NULL),
(4, '::1', 'asd123', '$2y$10$W56VH7SSsfceSMtPltlFN.2p5DNk4SyeIVPXN2nkWtwQlsusNHQay', 'asd123@asd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559299763, NULL, 1, 'asd', 'asd', NULL, NULL),
(9, '::1', 'asd333', '$2y$10$1r8wM49knOjDZXnjcc/6xuAF/hGRRnfOPLvaTsEnPmJssSO9uMsOS', 'asd@asdasd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559300091, NULL, 1, 'asd123', 'asd123', NULL, NULL),
(10, '::1', 'asd3335', '$2y$10$ZF1HJMLbQhQvvtPVgK2Ni.R53YF9McrZN0i2Yu8/8OE23wI1BCXLO', 'asd@asdasd1.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559300106, NULL, 1, 'asd123', 'asd123', NULL, NULL),
(11, '::1', 'asd33351', '$2y$10$5aG0VAPYH4mtseinIh6/qO1EIf/WzIR8Y7c.8R09sj5vOtwoYYAz6', 'asd@asdasd31.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559300217, NULL, 1, 'asd123', 'asd123', NULL, NULL),
(12, '::1', 'asd333513', '$2y$10$cd69BNYsp2.gTfcsmKigsOPg7mExMW1o91VHed.2na1kjtxW/VryK', 'asd@asdasd321.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559300250, NULL, 1, 'asd123', 'asd123', NULL, NULL),
(13, '::1', 'asd3335134', '$2y$10$FXcSG5/idwpS80VGxFq7tuIxtDNdFHm5FDJlWAmN8Q8ZBK43P4/Lm', 'asd@asdasd3221.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559300298, NULL, 1, 'asd123', 'asd123', NULL, NULL),
(14, '::1', 'asd33351343', '$2y$10$Bju/gngYFkfGvgP7gb9BPee5aAl499jTEiX75Tqsa02QjL.pbiwii', 'asd@asdasd32241.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559300358, NULL, 1, 'asd123', 'asd123', NULL, NULL),
(16, '::1', 'asd33351345', '$2y$10$I6G3b6YrjqcvH.SjsklJ2.bzkDkCpOqtNdDxgXrZv2jS2v6NqyyEe', 'asd@asdasd32221.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559300804, NULL, 1, 'asd123', 'asd123', NULL, NULL),
(21, '::1', 'elyldor123', '$2y$10$x/yFbpiFtxpGjExJRBgzZuN7wJBgmETi/JGJsb4qqqMC9iL3iVqwS', 'elyldor@gmail.hu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559304068, NULL, 1, 'qwe', 'rewr', NULL, NULL),
(22, '::1', '123', '$2y$10$tyhE7kCETkARkUHz093lb.itgIR6pDowL9hqpPqbFP0ZIimr2fmD2', '123@asd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1559318028, NULL, 1, '123', '123', NULL, NULL),
(23, '::1', 'user', '$2y$10$XlxPoLOqssTqTlA/JTRcfO8j.QlVezu48CGPag4QE.F2/hnw5W25m', 'user@user.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1560080203, NULL, 1, 'user', 'user', NULL, NULL),
(24, '::1', 'test', '$2y$10$bAgWv3BpsRGyk3dFh9hX/erJ.Beq.Js4AhAy3BgtJv7KYLE928u/u', 'test@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1560080803, 1560087260, 1, 'test', 'test', NULL, NULL),
(25, '::1', 'testuser', '$2y$10$E3I6gfV0PrANpop8mxWYw.yCP90a4Z2x6ovATT5Vzh7ohcBUHh5Ki', 'testuser@testuser.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1560678930, 1560678937, 1, 'maki', 'verem', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 9, 2),
(7, 10, 2),
(8, 11, 2),
(9, 12, 2),
(10, 13, 2),
(11, 14, 2),
(12, 16, 2),
(13, 21, 2),
(14, 22, 2),
(15, 23, 2),
(16, 24, 2),
(17, 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ware`
--

CREATE TABLE `ware` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `ware_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ware`
--

INSERT INTO `ware` (`id`, `name`, `price`, `slug`, `ware_category_id`) VALUES
(1, 'CSGO', 200, 'csgo', 1),
(2, 'Bloodborne', 10000, 'bloodborne', 2),
(3, 'World of Warcraft', 10000, 'world-of-warcraft', 1),
(5, 'COD6', 1000, 'cod6', 1),
(12, 'BF1', 10002, 'bf1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ware_category`
--

CREATE TABLE `ware_category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ware_category`
--

INSERT INTO `ware_category` (`id`, `name`, `slug`) VALUES
(1, 'PC Játék', 'pcjatek'),
(2, 'Konzol Játék', 'konzoljatek');

-- --------------------------------------------------------

--
-- Table structure for table `ware_details`
--

CREATE TABLE `ware_details` (
  `id` int(11) NOT NULL,
  `picture` varchar(10000) COLLATE utf8_hungarian_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `ware_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `ware_details`
--

INSERT INTO `ware_details` (`id`, `picture`, `description`, `ware_id`) VALUES
(1, './uploads/78f6cee19c9150fcb2a76ec9b8cdd519_origi1.jpg', 'lövöldözős játék', 1),
(2, './uploads/1.png', 'fromsoft jatek', 2),
(3, './uploads/card-world-of-warcraft-54576e6364584e35.jpg', 'a legjobb játszás valaha', 3),
(4, './uploads/Modern_Warfare_2_cover1.PNG', 'kall of duty', 5),
(5, './uploads/5912c535ae653a75ea0db4e9.jfif', 'bettlofild', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_wares_ware1_idx` (`ware_id`),
  ADD KEY `fk_cart_users1_idx` (`users_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_receipt_users1_idx` (`users_id`);

--
-- Indexes for table `receipt_wares`
--
ALTER TABLE `receipt_wares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_receipt_wares_receipt1_idx` (`receipt_id`),
  ADD KEY `fk_receipt_wares_ware1_idx` (`ware_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `ware`
--
ALTER TABLE `ware`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk_ware_ware_category1_idx` (`ware_category_id`);

--
-- Indexes for table `ware_category`
--
ALTER TABLE `ware_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ware_details`
--
ALTER TABLE `ware_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ware_details_ware1_idx` (`ware_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `receipt_wares`
--
ALTER TABLE `receipt_wares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ware`
--
ALTER TABLE `ware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ware_category`
--
ALTER TABLE `ware_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ware_details`
--
ALTER TABLE `ware_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_wares_ware1` FOREIGN KEY (`ware_id`) REFERENCES `ware` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `fk_receipt_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt_wares`
--
ALTER TABLE `receipt_wares`
  ADD CONSTRAINT `fk_receipt_wares_receipt1` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_receipt_wares_ware1` FOREIGN KEY (`ware_id`) REFERENCES `ware` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ware`
--
ALTER TABLE `ware`
  ADD CONSTRAINT `fk_ware_ware_category1` FOREIGN KEY (`ware_category_id`) REFERENCES `ware_category` (`id`);

--
-- Constraints for table `ware_details`
--
ALTER TABLE `ware_details`
  ADD CONSTRAINT `fk_ware_details_ware1` FOREIGN KEY (`ware_id`) REFERENCES `ware` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
