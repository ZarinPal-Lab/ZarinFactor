-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2023 at 06:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zng`
--

-- --------------------------------------------------------

--
-- Table structure for table `zng_factor`
--

CREATE TABLE `zng_factor` (
  `ID` int(11) NOT NULL,
  `from` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `to` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `for` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `createdate` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `paytime` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ref` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `email` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `phone` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `zng_factor`
--

INSERT INTO `zng_factor` (`ID`, `from`, `to`, `for`, `createdate`, `paytime`, `price`, `description`, `status`, `ref`, `email`, `phone`) VALUES
(110, '&#1605;&#1583;&#1740;&#1585; &#1587;&#1575;&#1740;&#1578;', '&#1576;&#1585;&#1606;&#1575;&#1605;&#1607; &#1606;&#1608;&#1740;&#1587; &#1605;&#1606;&#1578;&#1588;&#1585; &#1705;&#1606;&#1606;&#1583;&#1607;', '&#1576;&#1585;&#1608;&#1586;&#1585;&#1587;&#1575;&#1606;&#1740; &#1575;&#1587;&#1705;&#1585;&#1740;&#1662;&#1578;', '1401/12/21', '1405/12/20', '100000', '&#1580;&#1607;&#1578; &#1575;&#1585;&#1587;&#1575;&#1604; &#1607;&#1583;&#1740;&#1607; &#1576;&#1607; &#1576;&#1585;&#1606;&#1575;&#1605;&#1607; &#1606;&#1608;&#1740;&#1587; &#1601;&#1575;&#1705;&#1578;&#1608;&#1585; &#1585;&#1575; &#1575;&#1586; &#1591;&#1585;&#1740;&#1602; admin &#1608;&#1740;&#1585;&#1575;&#1740;&#1588; &#1705;&#1606;&#1740;&#1583; &#1608; &#1605;&#1576;&#1604;&#1594;&#1740; &#1585;&#1575; (&#1607;&#1585;&#1670;&#1740; &#1705;&#1585;&#1605;&#1578;) &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;. &#1575;&#1586; &#1589;&#1601;&#1581;&#1607; &#1575;&#1589;&#1604;&#1740; &#1605;&#1740; &#1578;&#1608;&#1575;&#1606;&#1740;&#1583; &#1662;&#1585;&#1583;&#1575;&#1582;&#1578; &#1705;&#1606;&#1740;&#1583;.', 'nopay', '', '', ''),
(1000, '&#1601;&#1575;&#1705;&#1578;&#1608;&#1585; &#1578;&#1587;&#1578; &#1588;&#1605;&#1575;&#1585;&#1607; &#1777;', '&#1586;&#1585;&#1740;&#1606; &#1662;&#1575;&#1604;', '&#1578;&#1587;&#1578;', '1401/12/20', '1402/01/13', '20000', '&#1578;&#1608;&#1590;&#1740;&#1581;&#1575;&#1578; &#1570;&#1586;&#1605;&#1575;&#1740;&#1588;&#1740;', 'nopay', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `zng_system`
--

CREATE TABLE `zng_system` (
  `ID` int(11) NOT NULL,
  `title` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `merchant` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adminpass` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `webaddress` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `zng_system`
--

INSERT INTO `zng_system` (`ID`, `title`, `merchant`, `adminpass`, `webaddress`) VALUES
(1, '&#1662;&#1585;&#1583;&#1575;&#1582;&#1578; &#1588;&#1606;&#1575;&#1587;&#1607; &#1575;&#1740; &#1586;&#1585;&#1740;&#1606; &#1662;&#1575;&#1604; 23', '52d52aa3-542a-450d-9792-b3221b459dc5', '21232f297a57a5a743894a0e4a801fc3', 'http://localhost/zarinpalg/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zng_factor`
--
ALTER TABLE `zng_factor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `zng_system`
--
ALTER TABLE `zng_system`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zng_factor`
--
ALTER TABLE `zng_factor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `zng_system`
--
ALTER TABLE `zng_system`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
