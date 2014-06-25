-- phpMyAdmin SQL Dump
-- version 4.1.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2014 at 01:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms_reminder`
--
-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reminds`
--

CREATE TABLE IF NOT EXISTS `reminds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `phone_number` varchar(16) DEFAULT NULL,
  `send_datetime` datetime DEFAULT NULL,
  `status` enum('sent','unsent') DEFAULT 'unsent',
  `message` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `reminds`
--

INSERT INTO `reminds` (`id`, `user_id`, `phone_number`, `send_datetime`, `status`, `message`) VALUES
(77, 12, '380968784', '2014-06-30 01:07:00', 'unsent', 'Buy food!');

-- --------------------------------------------------------

--
-- Table structure for table `repeats`
--

CREATE TABLE IF NOT EXISTS `repeats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(16) DEFAULT NULL,
  `daytime` time DEFAULT NULL,
  `day_week` int(11) DEFAULT NULL,
  `day_month` int(11) DEFAULT NULL,
  `day_year` int(11) DEFAULT NULL,
  `month_year` int(11) DEFAULT NULL,
  `year_year` int(11) DEFAULT NULL,
  `remind_type` enum('day','week','month','year') DEFAULT NULL,
  `message` varchar(128) DEFAULT NULL,
  `last_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `repeats`
--

INSERT INTO `repeats` (`id`, `user_id`, `phone_number`, `daytime`, `day_week`, `day_month`, `day_year`, `month_year`, `year_year`, `remind_type`, `message`, `last_sent`) VALUES
(11, 12, '323232', '01:09:00', 5, 25, 268, 9, 2014, 'day', 'text here', '0000-00-00 00:00:00'),
(12, 12, '380976564321', '01:09:00', 6, 12, 346, 12, 2014, 'month', 'text here 2', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_registration`
--

CREATE TABLE IF NOT EXISTS `temporary_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone_number` varchar(16) DEFAULT NULL,
  `daytime` datetime DEFAULT NULL,
  `guid` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `guid` (`guid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone_number` varchar(16) DEFAULT NULL,
  `privileges` enum('user','admin') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `phone_number`, `privileges`) VALUES
(12, 'adifucan', '86a375aacb17606c185d31c8d3e320ce', 'adifucan@gmail.com', '380968785525', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reminds`
--
ALTER TABLE `reminds`
  ADD CONSTRAINT `reminds_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `repeats`
--
ALTER TABLE `repeats`
  ADD CONSTRAINT `repeats_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
