-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2023 at 07:49 AM
-- Server version: 5.7.40
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subvention`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages_es`
--

DROP TABLE IF EXISTS `messages_es`;
CREATE TABLE IF NOT EXISTS `messages_es` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sender` int(255) NOT NULL,
  `receiver` int(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date0` datetime DEFAULT NULL,
  `dateRead` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_es`
--

DROP TABLE IF EXISTS `notifications_es`;
CREATE TABLE IF NOT EXISTS `notifications_es` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userId` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `notifications` varchar(255) NOT NULL,
  `href` varchar(255) DEFAULT NULL,
  `date0` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `dateDone` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_es`
--

DROP TABLE IF EXISTS `order_es`;
CREATE TABLE IF NOT EXISTS `order_es` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_product` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `dateTime` datetime NOT NULL,
  `status` int(255) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_comment_es`
--

DROP TABLE IF EXISTS `products_comment_es`;
CREATE TABLE IF NOT EXISTS `products_comment_es` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_products` int(255) NOT NULL,
  `details` varchar(500) NOT NULL,
  `userId` int(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_es`
--

DROP TABLE IF EXISTS `products_es`;
CREATE TABLE IF NOT EXISTS `products_es` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nameProduct` varchar(255) NOT NULL,
  `details` varchar(500) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date0` date NOT NULL,
  `userId` int(255) NOT NULL,
  `userId_order` int(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
