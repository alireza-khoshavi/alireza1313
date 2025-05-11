-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2025 at 07:28 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `message`, `created_at`) VALUES
(6, 'alireza', 'dwaaddwefde dfcasdc ewf ewqfw  q3fwfdf  efef   wfwf   qrf .?  f\r\n wdfe r f  grga  gew', '2025-05-10 17:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `text` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `imageurl` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `imageurl`, `created_at`) VALUES
(32, 'fvsdfd', 'fsfdd', 'images/img_6820513f9d65d1.87092884.jpg', '2025-05-11 07:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'alirezajj', 'zzzzzzzzz@gmail.com', '+98 991 860 156', '$2y$10$1mYlShOKwCYTky44cLxI4e8lIEyJm5d.zHaHzb7rV04H/pUoodlf.', '2025-05-03 18:56:19'),
(2, 'fasds', 'parsaarefniya@gmail.com', '09309489186', '$2y$10$bTXGAjC7QvdAyKMQ1/WXWO7MR3B0CMVkJgC3RBFk/ghaUB91l7zNW', '2025-05-03 19:24:07'),
(3, 'xxxxxxwewe', 'xxxxxxxxx@gmail.com', '+989918601567', '$2y$10$x/3MS3Jy7h.t3Xvc/tLS2.bVZiC3vKRqhARKFn..aAEvV97mj1BO6', '2025-05-03 19:28:53'),
(4, 'alireza', 'alirezakoshavi@gmail.com', '+989918601567', '$2y$10$cI5OOIM1x9EOIfRZsNtcdun5vtDg22H9M6EGBoUZ7pMM61iPxgCHq', '2025-05-04 05:17:03'),
(5, 'MATIN', 'parsaarefniya1111@gmail.com', '+989918601567', '$2y$10$dHsL4lAOHLEDKAJXlkhcs.xGDZkql.Mhz0OKyqACiVPxqOUFdhkKW', '2025-05-04 09:31:53'),
(6, 'fasds', 'alirezakoshavi1957@gmail.com', '+98 991 860 156', '$2y$10$DYyPgaTwcGApCoiK04W50.C129iZC2O4PkrysxkdWiGA6JPq1yLHe', '2025-05-10 17:06:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
