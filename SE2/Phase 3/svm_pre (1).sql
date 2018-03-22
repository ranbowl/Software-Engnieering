-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-04-27 03:19:39
-- 服务器版本： 5.7.10-log
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo1`
--

-- --------------------------------------------------------

--
-- 表的结构 `svm_pre`
--

CREATE TABLE IF NOT EXISTS `svm_pre` (
  `Symbol` varchar(10) NOT NULL,
  `Predict` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `svm_pre`
--

INSERT INTO `svm_pre` (`Symbol`, `Predict`) VALUES
('cmls', '0.43'),
('goog', '754.51'),
('yhoo', '37.21'),
('msft', '55.37'),
('jblu', '20.88'),
('pjt', '23.94'),
('nsany', '18.97'),
('vgz', '0.73'),
('aapl', '106.77'),
('bac', '14.70'),
('siri', '3.94');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
