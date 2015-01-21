-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2014 at 11:07 PM
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
  `Time Left in Departure` int(11) NOT NULL,
  UNIQUE KEY `EmailId` (`EmailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`Name`, `EmailId`, `Initial Place`, `Destination`, `Time Left in Departure`) VALUES
('Alok Agarwal', 'alokagrawal@iitrpr.ac.in', 'Ropar', 'Jaipur', 276),
('Aniket', 'aniket@iitrpr.ac.in', 'Kurukshetra', 'Ropar', 309),
('Atri Gulati', 'atrig@iitrpr.ac.in', 'Ropar', 'Delhi', 359),
('Avinash', 'avinashk@iitrpr.ac.in', 'Ropar', 'Varanasi', 357),
('Chimed', 'chimedp@iitrpr.ac.in', 'Ropar', 'jammu', 359),
('Deepak Chawla', 'dchawla0708@gmail.com', 'Ropar', 'Amritsar', 352),
('Deepak Chawla', 'deepakc@iitrpr.ac.in', 'Ropar', 'Amritsar', 451),
('JeevanJot Singh', 'Jeevanjots@iitrpr.ac.in', 'Ropar', 'Batala', 453),
('Mohit Garg', 'mohitg@iitrpr.ac.in', 'Ropar', 'Karnal', 384),
('Sajal ', 'sajalsr@iitrpr.ac.in', 'Ropar', 'Kota', 358),
('Savyasachi', 'Savyasachi@iitrpr.ac.in', 'Ropar', 'Delhi', 450);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
