-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2014 at 09:49 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Transportation`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE IF NOT EXISTS `Clients` (
  `Name` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Initial Place` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `Waiting Time` int(11) NOT NULL,
  `Times` int(11) NOT NULL,
  UNIQUE KEY `EmailId` (`EmailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
