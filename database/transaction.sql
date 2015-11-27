-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2015 at 09:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `winestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `productID` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`transactionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `username`, `productID`, `quantity`, `totalprice`, `date`) VALUES
(1, 'priya', '12,13,14', 4, 500, '0000-00-00'),
(2, 'priya', '10,16', 2, 40, '0000-00-00'),
(3, 'priya', ' 11,20,19', 3, 169, '0000-00-00'),
(4, 'priya', '20,1,4', 3, 75, '2015-11-27'),
(5, 'priya', '2,22,3', 3, 71, '2015-11-27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
