-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: 127.10.165.2:3306
-- Generation Time: Apr 27, 2016 at 04:34 AM
-- Server version: 5.5.45
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DEMO1`
--

-- --------------------------------------------------------

--
-- Table structure for table `sys_stock`
--

CREATE TABLE IF NOT EXISTS `sys_stock` (
  `stockid` int(10) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  PRIMARY KEY (`stockid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `sys_stock`
--

INSERT INTO `sys_stock` (`stockid`, `symbol`, `Name`) VALUES
(2, 'goog', 'Alphabet Inc Class C'),
(3, 'yhoo', 'Yahoo! Inc.'),
(4, 'msft', 'Microsoft Corporation'),
(6, 'jblu', 'JetBlue Airways Corporation'),
(9, 'pjt', 'PJT Partners Inc'),
(11, 'nsany', 'Nissan Motor Co Ltd (ADR)'),
(12, 'vgz', 'Vista Gold Corp.'),
(13, 'aapl', 'Apple Inc.'),
(14, 'bac', 'Bank of America Corporation'),
(15, 'siri', 'Sirius XM Holdings Inc'),
(19, 'cmls', 'Cumulus Media Inc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
