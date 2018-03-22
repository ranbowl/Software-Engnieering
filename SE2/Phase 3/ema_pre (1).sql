-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-04-27 03:19:24
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
-- 表的结构 `ema_pre`
--

CREATE TABLE IF NOT EXISTS `ema_pre` (
  `Symbol` varchar(10) NOT NULL,
  `pre` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `ema_pre`
--

INSERT INTO `ema_pre` (`Symbol`, `pre`) VALUES
('goog', 1),
('yhoo', -1),
('msft', 1),
('jblu', 1),
('pjt', -1),
('nsany', -1),
('vgz', 1),
('aapl', -1),
('bac', -1),
('siri', 0),
('cmls', -1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
