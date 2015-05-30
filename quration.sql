-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2015 at 01:32 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`, `is_active`, `created`, `modified`) VALUES
(1, 'test@test.com', '$2y$10$EmIn0/0fMx5nSwdDqARQT.EyzKHm3Kcn4WqygiNYGHoCxpHEjBSSW', 'Andrej', 1, '2015-05-09 14:08:07', '2015-05-30 13:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `burzum_file_storage_phinxlog`
--

CREATE TABLE IF NOT EXISTS `burzum_file_storage_phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `burzum_file_storage_phinxlog`
--

INSERT INTO `burzum_file_storage_phinxlog` (`version`, `start_time`, `end_time`) VALUES
(20141213004653, '2015-05-10 03:39:24', '2015-05-10 03:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pos` smallint(5) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pos` (`pos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `pos`, `created`, `modified`) VALUES
(1, 'Accomodation', 10, '2015-05-30 07:29:09', '2015-05-30 07:29:09'),
(2, 'Sightseing', 20, '2015-05-30 07:29:34', '2015-05-30 07:29:34'),
(3, 'Hotels', 30, '2015-05-30 07:29:52', '2015-05-30 07:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `file_storage`
--

CREATE TABLE IF NOT EXISTS `file_storage` (
  `id` char(36) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `foreign_key` char(36) DEFAULT NULL,
  `model` varchar(128) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filesize` int(16) DEFAULT NULL,
  `mime_type` varchar(32) DEFAULT NULL,
  `extension` varchar(5) DEFAULT NULL,
  `hash` varchar(64) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `adapter` varchar(32) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_storage`
--

INSERT INTO `file_storage` (`id`, `user_id`, `foreign_key`, `model`, `filename`, `filesize`, `mime_type`, `extension`, `hash`, `path`, `adapter`, `created`, `modified`) VALUES
('0260297d-3d0a-42d0-8343-2cd3d151adb7', NULL, '6', 'PlaceScene', '5.jpg', 125364, 'image/jpeg', 'jpg', NULL, 'images/PlaceScene/52/35/63/0260297d3d0a42d083432cd3d151adb7/', 'Local', '2015-05-30 13:30:48', '2015-05-30 13:30:48'),
('2a1adaf3-faa4-4537-a65c-0ef952866098', NULL, '6', 'PlaceImage', '5.jpg', 125364, 'image/jpeg', 'jpg', NULL, 'images/PlaceImage/51/92/76/2a1adaf3faa44537a65c0ef952866098/', 'Local', '2015-05-30 13:30:37', '2015-05-30 13:30:37'),
('2d1f3693-da63-4492-b3c3-d54c0a795ce5', NULL, '3', 'PlaceScene', '2.jpg', 336245, 'image/jpeg', 'jpg', NULL, 'images/PlaceScene/44/34/45/2d1f3693da634492b3c3d54c0a795ce5/', 'Local', '2015-05-30 13:28:56', '2015-05-30 13:28:56'),
('2d73e6aa-3d22-4a37-8ebd-ed42fd061994', NULL, '2', 'PlaceImage', '1.jpg', 378474, 'image/jpeg', 'jpg', NULL, 'images/PlaceImage/92/66/62/2d73e6aa3d224a378ebded42fd061994/', 'Local', '2015-05-30 13:31:18', '2015-05-30 13:31:19'),
('3bb6435f-5026-4c67-810d-3372e82739f2', NULL, '3', 'PlaceImage', '2.jpg', 336245, 'image/jpeg', 'jpg', NULL, 'images/PlaceImage/99/23/62/3bb6435f50264c67810d3372e82739f2/', 'Local', '2015-05-30 13:31:59', '2015-05-30 13:31:59'),
('42b8cef0-79ce-48f3-be86-24570ed5d019', NULL, '1', 'PlaceScene', '2000_1000.jpg', 378474, 'image/jpeg', 'jpg', NULL, 'images/PlaceScene/90/70/84/42b8cef079ce48f3be8624570ed5d019/', 'Local', '2015-05-30 11:27:46', '2015-05-30 11:27:46'),
('7b0f51f8-c6f2-4425-bb5f-13781d66b74c', NULL, '1', 'CategoryImage', '2015-05-27 12.07.24.jpg', 134653, 'image/jpeg', 'jpg', NULL, 'images/CategoryImage/77/02/20/7b0f51f8c6f24425bb5f13781d66b74c/', 'Local', '2015-05-30 07:53:12', '2015-05-30 07:53:12'),
('7cf7eb81-ea24-4cfd-b086-d74235bc9c6e', NULL, '4', 'PlaceScene', '3.jpg', 93039, 'image/jpeg', 'jpg', NULL, 'images/PlaceScene/24/73/34/7cf7eb81ea244cfdb086d74235bc9c6e/', 'Local', '2015-05-30 13:29:24', '2015-05-30 13:29:24'),
('9f0993e2-2c7a-4fb0-902d-48c6d28b5786', NULL, '2', 'PlaceScene', '1.jpg', 378474, 'image/jpeg', 'jpg', NULL, 'images/PlaceScene/21/22/18/9f0993e22c7a4fb0902d48c6d28b5786/', 'Local', '2015-05-30 13:28:30', '2015-05-30 13:28:30'),
('afa1e46e-b36e-4335-bc57-492909c2766e', NULL, '5', 'PlaceImage', '4.jpg', 116380, 'image/jpeg', 'jpg', NULL, 'images/PlaceImage/50/43/35/afa1e46eb36e4335bc57492909c2766e/', 'Local', '2015-05-30 13:30:00', '2015-05-30 13:30:00'),
('b26cb5ab-6086-4eaf-8f89-ce6f9aef7021', NULL, '4', 'PlaceImage', '3.jpg', 93039, 'image/jpeg', 'jpg', NULL, 'images/PlaceImage/53/85/43/b26cb5ab60864eaf8f89ce6f9aef7021/', 'Local', '2015-05-30 13:29:36', '2015-05-30 13:29:36'),
('ffba32cc-927f-4f94-a75d-9dc76d252979', NULL, '5', 'PlaceScene', '4.jpg', 116380, 'image/jpeg', 'jpg', NULL, 'images/PlaceScene/63/30/80/ffba32cc927f4f94a75d9dc76d252979/', 'Local', '2015-05-30 13:30:14', '2015-05-30 13:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `start_time`, `end_time`) VALUES
(20150510081844, '2015-05-10 08:18:45', '2015-05-10 08:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` smallint(5) unsigned NOT NULL,
  `api_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `rating` decimal(2,1) unsigned NOT NULL,
  `price` int(11) unsigned DEFAULT NULL,
  `lat` decimal(11,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `category_id`, `api_id`, `title`, `address`, `description`, `image_url`, `rating`, `price`, `lat`, `lng`, `created`, `modified`) VALUES
(2, 1, 160327, 'Quality Hotel Melbourne Airport', '265 Mickleham Road, Westmeadows', '', '//media.expedia.com/hotels/1000000/520000/519200/519175/519175_141_l.jpg', 3.5, 151, -37.68203000, 144.88318000, '2015-05-30 10:25:58', '2015-05-30 10:29:03'),
(3, 1, 160316, 'Parkville Place', '124 Brunswick Road, Brunswick', '', '//media.expedia.com/hotels/3000000/2350000/2346400/2346310/2346310_25_l.jpg', 3.0, 120, -37.77768000, 144.96514000, '2015-05-30 10:25:58', '2015-05-30 10:27:27'),
(4, 1, 160317, 'Quality Suites D''Olive Receptions', '454 Point Cook Road, Point Cook', '', '//media.expedia.com/hotels/5000000/4890000/4888900/4888892/4888892_32_l.jpg', 4.0, 160, -37.89964000, 144.75365000, '2015-05-30 10:25:58', '2015-05-30 10:27:27'),
(5, 1, 7943, 'Stamford Plaza Melbourne', '111  Little Collins  St, Melbourne', '', '//d1d1rdpyqc50te.cloudfront.net/k/images/000/032/365/size270x140.jpg?1421914997', 5.0, 265, -37.81354900, 144.97002800, '2015-05-30 10:25:58', '2015-05-30 10:27:27'),
(6, 1, 6998, 'Quest Southbank', '16 Kavanagh  St, Southbank', '', '//d1d1rdpyqc50te.cloudfront.net/k/images/013/633/867/size270x140.jpg?1421946612', 4.5, 239, -37.82271400, 144.96637100, '2015-05-30 10:25:59', '2015-05-30 10:29:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
