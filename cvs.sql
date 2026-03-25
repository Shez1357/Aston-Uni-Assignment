-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 03:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astoncv`
--
CREATE DATABASE IF NOT EXISTS `astoncv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `astoncv`;

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyprogramming` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `URLlinks` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci; 


--
-- Indexes for table `users`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


INSERT INTO `cvs` (`name`, `email`, `password`, `keyprogramming`, `profile`, `education`, `URLlinks`) VALUES
(
  'Alice Smith',
  'alice@example.com',
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
  'Python',
  'Passionate Python developer with 3 years of experience building web apps and data pipelines.',
  'BSc Computer Science, Aston University, 2021',
  'https://github.com/alicesmith, https://linkedin.com/in/alicesmith'
),
(
  'Bob Jones',
  'bob@example.com',
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
  'JavaScript',
  'Full-stack JavaScript developer specialising in React and Node.js.',
  'MSc Software Engineering, Aston University, 2022',
  'https://github.com/bobjones'
),
(
  'Carol White',
  'carol@example.com',
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
  'Java',
  'Backend Java developer experienced in Spring Boot and microservices.',
  'BEng Software Engineering, Aston University, 2020',
  'https://linkedin.com/in/carolwhite, https://github.com/carolwhite'
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
