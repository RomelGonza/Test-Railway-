-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2026 at 12:45 PM
-- Server version: 5.7.44-cll-lve
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubvwmzhw_onta`
--

-- --------------------------------------------------------

--
-- Table structure for table `abstracts`
--

CREATE TABLE `abstracts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autores` text NOT NULL,
  `afiliacion` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `archivo_pdf` varchar(255) NOT NULL,
  `estado` enum('pendiente','en revision','aprobado','rechazado') DEFAULT 'pendiente',
  `fecha_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `codigo_seguimiento` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abstracts`
--

INSERT INTO `abstracts` (`id`, `user_id`, `titulo`, `autores`, `afiliacion`, `correo`, `keywords`, `archivo_pdf`, `estado`, `fecha_envio`, `codigo_seguimiento`) VALUES
(7, 9, 'PRUEBA', 'PRUEBA', 'PRUEBA', 'prueb@prueba.pe', 'PRUEBA', '12273043_JERSON_ROMARIO_GOMEZ_CAHUANA.pdf', 'pendiente', '2026-03-11 16:51:22', '12273043'),
(8, 12, 'TEST', 'ROMEL', 'UNA', 'logonza64@gmail.com', 'TEST ADMIN HOLA', '16340867_JUANCITO.pdf', 'aprobado', '2026-03-11 17:12:13', '16340867'),
(9, 13, 'BB HJ', 'JHHBH', 'GG', 'ed@gmail.com', '123', '95467893_EDUARDO_LOPEZ.pdf', 'pendiente', '2026-03-11 17:14:51', '95467893');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `speaker` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `category` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `payment_status` enum('pending','verified','rejected') DEFAULT 'pending',
  `payment_receipt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_category` enum('miembro_onta','no_miembro','extranjero','nacional') DEFAULT 'no_miembro',
  `dni` varchar(15) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `professional_school` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `user_category`, `dni`, `university`, `professional_school`, `phone`, `department`) VALUES
(7, 'ADMINISTRADOR ONTA', 'admin@onta.edu.pe', '$2y$10$0AdOgoAPxjFZWOx5d2D0muREZxg1mEse.7WReMFsv3gg7LBMjzrji', 'admin', '2026-03-11 16:06:37', 'miembro_onta', '00000000', 'UNIVERSIDAD NACIONAL DEL ALTIPLANO', 'ADMINISTRACIÓN', '+51 958 274 958', 'PUNO'),
(8, 'JUAN', 'UNA@UNA.PE', '$2y$10$05vbQ5ur.9jGNPqvCFvgn.Nq7VQ0zuf/KFuXRW7YCt/pnKRxS1hnS', 'user', '2026-03-11 16:22:25', 'miembro_onta', '4', 'JUAN', 'JUAN', '87', 'JUAN'),
(9, 'JERSON ROMARIO GOMEZ CAHUANA', 'ROMA@ROMA.PE', '$2y$10$AlPyfnDeTbSV04FcEV2Sk.Mg4/CZCLysO8QYpSu0vq3EL1wb0RP66', 'user', '2026-03-11 16:50:32', 'miembro_onta', '70136575', 'UNIVERSIDAD NACIONAL DEL ALTIPLANO', 'INGENIERIA ELECTRONICA', '958274958', 'PUNO'),
(10, 'JUAN PEREZ', 'LOGONZA12@GMAIL.COM', '$2y$10$axWssQtOOFAi5TzYiCN36OaZeLy87wKLPSphios1Z.gBVsdWFjG9y', 'user', '2026-03-11 17:07:28', 'miembro_onta', '75615455', 'UNIVERSIDAD NACIONAL DEL ALTIPLANO', 'ESTADISTICA', '961 733 093', 'PUNO'),
(11, 'RAUL', 'ADMIN@GMAIL.COM', '$2y$10$/DDHT0JmeZAPIo5WX2SDgu5sZ.HgQHoFe695d1QUu7FixalmNvyqi', 'user', '2026-03-11 17:09:17', 'extranjero', '1234567', 'UNIVERSIDAD NACIONAL DEL ALTIPLANO', 'SISTEMAS', '965 733 094', 'PUNO'),
(12, 'JUANCITO', 'LOGONZA64@GMAIL.COM', '$2y$10$ViJkAxVKXV3y4U3f9LQEJe.7/SYcxF9ALduNmsnV9oW5yVoJHYXPS', 'user', '2026-03-11 17:10:14', 'no_miembro', '75615455', 'UNIVERSIDAD NACIONAL DEL ALTIPLANO', 'SISTEMAS', '965 733 094', 'PUNO'),
(13, 'EDUARDO LOPEZ', 'EDUARDOBOX2@GMAIL.COM', '$2y$10$VAnoj1ZrJIj/mkVevAYjmOTYmGvYlJIsW5xdSql6FVeBSDKhnqizG', 'user', '2026-03-11 17:10:37', 'nacional', '77694196', 'UNAP', 'ING ESTADISTICA', '944949595', 'JULIACA'),
(15, 'ISRAEL LIMA MEDINA', 'ILIMA@UNAP.EDU.PE', '$2y$10$MQ5CSKZzJhLg6wsAXxCKve4i6ZDySqWcCUTh0sIIkQBpDkN2BtxqG', 'user', '2026-03-11 19:54:49', 'miembro_onta', '40744218', 'UNIVERSIDAD NACIONAL DEL ALTIPLANO', 'INGENIERIA AGRONOMICA', '+ 51 956838730', 'PUNO'),
(16, 'YHAIR MANOLO GOMEZ CAHUANA', 'YHAIR@YHAIR.PE', '$2y$10$yamv417kmtiJqphGqm1k1ODfhm66meF2MYHL72ybV31OhY7lF3QJ.', 'user', '2026-03-12 09:17:18', 'nacional', '70136574', 'UNIVERSIDAD NACIONAL DEL ALTIPLANO', 'INGENIERIA ELECTRONICA', '944949593', 'PUNO'),
(17, 'KEVIN JESSITH GOMEZ CAHUANA', 'KEVIN@KEVIN.PE', '$2y$10$p8c0qf8FghASkQMck60wDuPzeBG9iwFTODAWCCmK1cXSOaWWatNoK', 'user', '2026-03-12 19:23:14', 'extranjero', '70136576', 'UNIVERSIDAD NACIONAL AGRARIA DE LA MOLINA', 'INGENIERIA ECONOMICA', '999475869', 'LIMA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abstracts`
--
ALTER TABLE `abstracts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_seguimiento` (`codigo_seguimiento`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abstracts`
--
ALTER TABLE `abstracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
