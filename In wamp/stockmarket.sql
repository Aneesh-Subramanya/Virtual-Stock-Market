-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2014 at 04:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stockmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` float DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `stock` (`stock`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `price`, `volume`, `stock`, `user`, `Date`) VALUES
(1, 158, 1, 2, 2, '2014-11-15 12:50:37'),
(2, 2199, 5, 8, 2, '2014-11-15 12:53:41'),
(3, 122, 10, 4, 8, '2014-11-15 13:00:49'),
(4, 1461, 3, 10, 8, '2014-11-15 13:21:26'),
(5, 1461, 10, 10, 8, '2014-11-15 13:25:38'),
(6, 376, 2, 6, 8, '2014-11-15 13:26:29'),
(7, 431, 10, 9, 8, '2014-11-15 13:33:01'),
(8, 158, 21, 2, 8, '2014-11-15 13:35:22'),
(9, 225, 12, 3, 9, '2014-11-15 13:39:16'),
(10, 431, 2, 9, 8, '2014-11-15 14:13:26'),
(11, 431, 2, 9, 8, '2014-11-15 14:17:54'),
(12, 431, 8, 9, 10, '2014-11-15 14:34:20'),
(13, 431, 2, 9, 8, '2014-11-15 15:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `web` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `web`, `total`) VALUES
(1, 'Barclays', 'London Road\r\n3', 'www.barclays.com', 99),
(2, 'Royal Bank of Scotland', 'London Road\r\n1', 'www.rbs.com', 98),
(3, 'Lloyds', 'Abbey Road 3', 'www.lloyds.com', 100),
(4, 'Abbey', 'Abbey Road 1', 'www.abbey.com', 99),
(5, 'Orange', 'Welford Road 3', 'www.orange.com', 78),
(6, 'Vodafone', 'Welford Road\r\n1', 'www.vodafone.com', 96),
(7, 'O2', 'Welford Road 2', 'www.o2.com', 94),
(8, 'Royal Dutch Shell', 'London Road 5', 'www.shell.com', 95),
(9, 'BP', 'Welford Road 10', 'www.bp.com', 81),
(10, 'GlaxoSmithKline', 'Manchester Road 1', 'www.gsk.com', 100);

-- --------------------------------------------------------

--
-- Table structure for table `ownership`
--

CREATE TABLE IF NOT EXISTS `ownership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stock` (`stock`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ownership`
--

INSERT INTO `ownership` (`id`, `user`, `stock`, `volume`) VALUES
(18, 2, 4, 1),
(19, 2, 2, 1),
(20, 2, 8, 1),
(23, 8, 10, 1),
(24, 8, 6, 1),
(25, 8, 9, 3),
(26, 8, 2, 1),
(27, 9, 3, 1),
(28, 10, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE IF NOT EXISTS `sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` float DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `stock` (`stock`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `price`, `volume`, `stock`, `user`, `Date`) VALUES
(1, 225, 8, 3, 9, '2014-11-15 13:40:25'),
(2, 122, 5, 4, 8, '2014-11-15 14:18:12'),
(3, 431, 4, 9, 8, '2014-11-15 14:19:12'),
(4, 122, 5, 4, 8, '2014-11-15 14:20:13'),
(5, 122, 1, 4, 8, '2014-11-15 14:21:06'),
(6, 431, 3, 9, 10, '2014-11-15 14:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticker` varchar(20) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company` (`company`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `ticker`, `company`, `Price`) VALUES
(1, 'ABB', 4, 860),
(2, 'ORA', 5, 158),
(3, 'VOD', 6, 225),
(4, 'O2', 7, 122),
(5, 'BARC', 1, 230),
(6, 'RBS', 2, 376),
(7, 'LLY', 3, 769),
(8, 'RDSA', 8, 2199),
(9, 'BP', 9, 431),
(10, 'GSK', 10, 1461);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) DEFAULT NULL,
  `pass` varchar(60) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `cash` float DEFAULT '20000',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `login`, `pass`, `name`, `address`, `age`, `cash`) VALUES
(1, 'merc', 'e8126e9bf600c3def372329734e053ae', 'Mercedes Garcia Martinez', NULL, NULL, 1000),
(2, 'stanley', '94d330b0d31d5bea240095c1959461cc', 'Stanley Fung', NULL, NULL, 87567),
(3, 'gokul_94', 'a83f7026a9d042f97d770f23e586d82d', 'Gokul', 'xyz', 20, NULL),
(4, 'aaaa', '', 'aaa', 'kvnlkgnd', 20, NULL),
(5, 'aaaaa', '', 'aaa', 'kvnlkgnd', 20, NULL),
(6, 'aaaaaa', 'fa7f08233358e9b466effa1328168527', 'aaa', 'kvnlkgnd', 20, NULL),
(7, 'jjjj', '3b6281fa2ce2b6c20669490ef4b026a4', 'jjjj', 'mkfj', 52, NULL),
(8, 'akshay', '2de1b2d6a6738df78c5f9733853bd170', 'Akshay VB', 'NITK', 20, 10880),
(9, 'ud', 'e2fc714c4727ee9395f324cd2e7f331f', 'sh', 'nitk', 18, 19100),
(10, 'surajb', '0e68797b29c93e94d338c0d5c4db6d5d', 'Suraj', 'nitk', 20, 17845);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`stock`) REFERENCES `stock` (`id`),
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`Id`);

--
-- Constraints for table `ownership`
--
ALTER TABLE `ownership`
  ADD CONSTRAINT `ownership_ibfk_1` FOREIGN KEY (`stock`) REFERENCES `stock` (`id`),
  ADD CONSTRAINT `ownership_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`Id`);

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`stock`) REFERENCES `stock` (`id`),
  ADD CONSTRAINT `sell_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`Id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`company`) REFERENCES `company` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
