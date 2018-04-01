-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 03:08 PM
-- Server version: 5.6.25
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manipurShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `Advertise`
--

CREATE TABLE IF NOT EXISTS `Advertise` (
  `ID` int(125) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Status` int(1) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Advertise`
--

INSERT INTO `Advertise` (`ID`, `Title`, `Description`, `Image`, `url`, `Added_by`, `Added_on`, `Modified_on`, `Modified_by`, `Status`, `isActive`) VALUES
(1, 'huhu', 'asfasdf', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(2, 'j,hjh', 'hgkfh', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(3, 'jk/l''', 'kuh', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(4, 'ja;lkae', 'lrf''', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(5, 'new season', 'Dhah', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(6, 'jahsdj', 'sdkf;L', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(7, 'hdfk.h', 'dklsjf', '', 'dkfjd', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(8, 'Summer Sales', 'Heavy Discount', '', 'ads/header', 1, '2018-04-01 13:25:59', '0000-00-00 00:00:00', 0, 0, 0),
(9, 'Winter Sales', '50% Discount on every item', '', 'ads/header', 1, '2018-04-01 13:32:28', '0000-00-00 00:00:00', 0, 0, 0),
(10, 'republic sales', 'upto 70% discount', '', 'asd/haha/ahsd', 1, '2018-04-01 13:35:31', '0000-00-00 00:00:00', 0, 0, 0),
(11, 'holi Discount', '50-70% discount', '', 'asd/pasdopod', 1, '2018-04-01 13:43:21', '0000-00-00 00:00:00', 0, 0, 0),
(12, 'advertisement one', 'half price', '', 'ads/asdjla', 1, '2018-04-01 13:48:23', '0000-00-00 00:00:00', 0, 0, 1),
(13, 'Off Season', 'Heavy Discount', 'upload/reebok--classic-leather.jpg', 'ads/google', 1, '2018-04-01 13:52:03', '0000-00-00 00:00:00', 0, 0, 1),
(14, 'jkhr', 'kejhr', 'upload/reebok_1.jpg', 'kjrke', 1, '2018-04-01 13:54:03', '0000-00-00 00:00:00', 0, 0, 1),
(15, 'jashdk', 'kje', 'upload/reebok_1.jpg', 'kejkd', 1, '2018-04-01 13:56:27', '0000-00-00 00:00:00', 0, 0, 1),
(16, 'adsda', 'weh', 'upload/reebok--classic-leather.jpg', 'ej,rw,', 1, '2018-04-01 13:58:18', '0000-00-00 00:00:00', 0, 0, 1),
(17, 'heavy discount on Electronics', '15-50%', 'upload/reebok.jpg', 'adsda/aslkd', 1, '2018-04-01 14:03:55', '0000-00-00 00:00:00', 0, 1, 1),
(18, 'jashdk', 'kje', '', 'kejkd', 1, '2018-04-01 14:36:18', '0000-00-00 00:00:00', 0, 0, 1),
(19, 'nike discount', 'kejhr', '', 'kjrke', 1, '2018-04-01 14:36:47', '0000-00-00 00:00:00', 0, 0, 1),
(20, 'Reebok', '50% off', 'upload/reebok.jpg', 'asdasd', 1, '2018-04-01 15:00:20', '0000-00-00 00:00:00', 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Advertise`
--
ALTER TABLE `Advertise`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Advertise`
--
ALTER TABLE `Advertise`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
