-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2016 at 01:20 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zng`
--

-- --------------------------------------------------------

--
-- Table structure for table `zng_factor`
--

CREATE TABLE IF NOT EXISTS `zng_factor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `to` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `for` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `createdate` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `paytime` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `price` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `status` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `ref` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `email` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(1000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

--
-- Dumping data for table `zng_factor`
--

INSERT INTO `zng_factor` (`ID`, `from`, `to`, `for`, `createdate`, `paytime`, `price`, `description`, `status`, `ref`, `email`, `phone`) VALUES
(1000, '&#1601;&#1575;&#1705;&#1578;&#1608;&#1585; &#1578;&#1587;&#1578; &#1588;&#1605;&#1575;&#1585;&#1607; &#1777;', '&#1586;&#1585;&#1740;&#1606; &#1662;&#1575;&#1604;', '&#1578;&#1587;&#1578;', '1395/1/27', '1395/3/30', '2000', '&#1578;&#1608;&#1590;&#1740;&#1581;&#1575;&#1578; &#1570;&#1586;&#1605;&#1575;&#1740;&#1588;&#1740;', 'nopay', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `zng_system`
--

CREATE TABLE IF NOT EXISTS `zng_system` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `merchant` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `adminpass` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `webaddress` varchar(1000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `zng_system`
--

INSERT INTO `zng_system` (`ID`, `title`, `merchant`, `adminpass`, `webaddress`) VALUES
(1, '&#1662;&#1585;&#1583;&#1575;&#1582;&#1578; &#1588;&#1606;&#1575;&#1587;&#1607; &#1575;&#1740; &#1586;&#1585;&#1740;&#1606; &#1662;&#1575;&#1604;', '521c45e0-4040-4065-abb3-0b335ee8a9d4', '21232f297a57a5a743894a0e4a801fc3', 'http://localhost/zng/');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
