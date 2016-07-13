-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jul-2016 às 01:52
-- Versão do servidor: 5.7.10
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phyro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('18596e958aee03410f0e80b7a41d03be6fac8fd5', '127.0.0.1', 1465061198, ''),
('39baeb9e17e1c1b100fb1e0227de7fb007aef738', '127.0.0.1', 1465315454, 0x6964656e746974797c733a31393a2267752e626f6173313340676d61696c2e636f6d223b656d61696c7c733a31393a2267752e626f6173313340676d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343635323936343730223b),
('bded44b4c8282bd8c385c40ff04a36ca346c8cb9', '127.0.0.1', 1465070775, ''),
('bfcc94c9e89b3b9554cc0e294eec82ad652dfee2', '127.0.0.1', 1465140015, ''),
('b9c0a9cc318743fa3c8301d7d1ac29649b1d36da', '127.0.0.1', 1465142280, ''),
('d1afca6920a1f238b5e1b3736d4885c20d98a012', '127.0.0.1', 1465235026, ''),
('acfd2eaf12d55e9483f1824ba6d590a2e19c4755', '127.0.0.1', 1465296614, 0x6964656e746974797c733a31393a2267752e626f6173313340676d61696c2e636f6d223b656d61696c7c733a31393a2267752e626f6173313340676d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343635323330353534223b),
('6fc2797150fde0ee0a8088bc2359f9c13ffb89d6', '127.0.0.1', 1465409235, 0x6964656e746974797c733a31393a2267752e626f6173313340676d61696c2e636f6d223b656d61696c7c733a31393a2267752e626f6173313340676d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343635323937373834223b),
('ecbea2103a36fa765f9783ade68a0862fc3f880a', '127.0.0.1', 1465487574, 0x6964656e746974797c733a31393a2267752e626f6173313340676d61696c2e636f6d223b656d61696c7c733a31393a2267752e626f6173313340676d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343635343039303931223b),
('b4381f41e31adb1cd1a6d6f47c32eb0008e558b5', '127.0.0.1', 1465500535, ''),
('8e1524552dca2731fa2a0a0e6a83ea6a45a89f27', '127.0.0.1', 1465659119, ''),
('247016b686739afd6a74ea63576280d26921d643', '127.0.0.1', 1465835380, 0x6964656e746974797c733a31393a2267752e626f6173313340676d61696c2e636f6d223b656d61696c7c733a31393a2267752e626f6173313340676d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343635343832303736223b),
('68d467141542d9afd61f31e7f7800dd846883752', '127.0.0.1', 1467762184, ''),
('f4a1c84a52b03226e3f14dc331d5183e1fccdd14', '127.0.0.1', 1466461780, ''),
('cc488f8ebef066a08786940e60aa1c73b585d55e', '127.0.0.1', 1466994859, ''),
('de9ab31aa0acbdf68e2595203b5539cb8e8cd4db', '127.0.0.1', 1466466090, 0x6964656e746974797c733a31393a2267755f626f617340686f746d61696c2e636f6d223b656d61696c7c733a31393a2267755f626f617340686f746d61696c2e636f6d223b757365725f69647c733a313a2236223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343636343632333139223b),
('461981d11572f144eaa32f6f956cf723971c8103', '127.0.0.1', 1467075866, ''),
('8cfb1c9b13d7b415684308f17d57f68ca0d5dd62', '127.0.0.1', 1467762184, ''),
('6ea7d5b17d42fb48fa2c31a173a7384e39d5e7d2', '127.0.0.1', 1467762184, ''),
('e77986dfcb52d0541644eff007eba7e7e0348840', '127.0.0.1', 1467762184, ''),
('d257383f4541ddb269160ded7bdeb52dcf7e278c', '127.0.0.1', 1467763904, ''),
('8df3f48e1ceb2693ea5b353bd35ae775875a0792', '127.0.0.1', 1467762184, ''),
('bd47b13f0190d1566ba172aa082176bbee8d686d', '127.0.0.1', 1467937278, ''),
('2f04641f054cc47ea288becb77bae3ba68b373b7', '127.0.0.1', 1468371770, ''),
('a8d0761349a3c33f3b289a454e056d345d62de43', '127.0.0.1', 1468453823, 0x6964656e746974797c733a31323a22677540656d61696c2e636f6d223b656d61696c7c733a31323a22677540656d61696c2e636f6d223b757365725f69647c733a313a2233223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343638343436373433223b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(5, '127.0.0.1', 'gu.boas13@gmail.com', 1467066787);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
(2, '127.0.0.1', '@villasboas', '$2y$08$fgLKAwV7YGsd.nDzaFKFE.HIPLCBoURE9/Yrmq/q3MRUsGvyZHBq6', NULL, 'gu.boas13@gmail.com', NULL, NULL, NULL, NULL, 1468442816, 1468446518, 1, NULL, NULL),
(3, '127.0.0.1', '@gustavo', '$2y$08$DO6gsDMz2FLt5CNMN79kE.FZGDlWLJUx1jCKB3r1FaqjoCMA2Ign6', NULL, 'gu@email.com', NULL, NULL, NULL, NULL, 1468446723, 1468452692, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(13, 2, 2),
(14, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2),
(10, 9, 2),
(11, 10, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
