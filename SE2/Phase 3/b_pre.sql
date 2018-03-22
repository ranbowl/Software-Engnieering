-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-04-27 23:59:50
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
-- 表的结构 `b_pre`
--

CREATE TABLE `b_pre` (
  `Symbol` varchar(10) NOT NULL,
  `Predict` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `b_pre`
--

INSERT INTO `b_pre` (`Symbol`, `Predict`) VALUES
('goog', '731.42'),
('yhoo', '38.79'),
('msft', '53.43'),
('jblu', '20.96'),
('pjt', '23.35'),
('nsany', '19.48'),
('vgz', '0.81'),
('aapl', '101.07'),
('bac', '16.01'),
('siri', '4.19'),
('cmls', '0.48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
