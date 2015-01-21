-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2014 at 10:28 PM
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
-- Table structure for table `Trucks`
--

CREATE TABLE IF NOT EXISTS `Trucks` (
  `Name` varchar(50) NOT NULL,
  `Phone number` bigint(10) NOT NULL,
  `Initial Place` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `Time Left in Departure` int(11) NOT NULL,
  UNIQUE KEY `Phone number` (`Phone number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Trucks`
--

INSERT INTO `Trucks` (`Name`, `Phone number`, `Initial Place`, `Destination`, `Time Left in Departure`) VALUES
('Kaushal', 6666666666, 'Kurukshetra', 'Ropar', 58),
('Atri', 7894567890, 'Ropar', 'Delhi', 59),
('Mohit', 8288909695, 'Ropar', 'Delhi', 501),
('Jeevan Jot Singh', 8288987154, 'Ropar', 'Delhi', 262),
('Chimed', 8978654329, 'Ropar', 'Delhi', 462),
('Kunal', 8987654789, 'Ropar', 'Delhi', 462),
('Ankit Khokker', 9501152710, 'Ropar', 'Delhi', 263),
('Sajal', 9501651210, 'Ropar', 'Delhi', 263),
('Aniket Sachdeva', 9501651223, 'Ropar', 'Delhi', 262),
('Mohit Garg', 9501652710, 'Ropar', 'Delhi', 261),
('Deepak Chawla', 9501674896, 'Ropar', 'Delhi', 261),
('Savyasachi', 9711489399, 'Ropar', 'Delhi', 441),
('Agrim Bansal', 9876521430, 'Ropar', 'Delhi', 263);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
