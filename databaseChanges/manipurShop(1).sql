-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 02:46 PM
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
-- Table structure for table `Brand`
--

CREATE TABLE IF NOT EXISTS `Brand` (
  `ID` int(125) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`ID`, `Code`, `Description`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, '101', 'Adidas', 1, '2018-02-24 02:45:15', 4, '2018-02-24 02:45:15', 1),
(2, '102', 'Nike', 1, '2018-02-24 02:45:15', 3, '2018-02-24 02:45:15', 1),
(3, '103', 'Puma', 1, '2018-02-24 02:52:51', 4, '2018-02-24 02:52:51', 1),
(4, '104', 'Reebok', 2, '2018-02-24 02:52:51', 1, '2018-03-11 01:45:39', 1),
(5, '105', 'Levis ', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(6, '106', 'John Player', 3, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(7, '107', 'Adidas Neo', 4, '2018-03-03 02:37:26', 1, '2018-03-11 01:50:08', 0),
(8, '107', 'Adidas Originals', 1, '2018-03-11 01:38:54', 1, '2018-03-11 01:50:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE IF NOT EXISTS `Cart` (
  `ID` int(125) NOT NULL,
  `Item_id` int(125) NOT NULL,
  `Qty` int(20) NOT NULL,
  `Charge` decimal(10,0) NOT NULL,
  `Net_Charge` decimal(10,0) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `ID` int(125) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`ID`, `Code`, `Description`, `Added_on`, `Added_by`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, '001', 'Sweater', '2018-02-28 02:58:22', 1, 1, '2018-03-10 02:50:36', 1),
(2, '002', 'Shoes', '2018-02-28 02:58:22', 1, 0, '2018-02-28 02:58:22', 1),
(3, '103', 'T-Shirt', '2018-03-10 02:51:07', 1, 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Customer_login`
--

CREATE TABLE IF NOT EXISTS `Customer_login` (
  `ID` int(125) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Key` varchar(500) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `ID` int(125) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Category_id` int(125) NOT NULL,
  `Brand_id` int(125) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Item_stock` int(50) NOT NULL,
  `Delivery_Time` int(50) NOT NULL,
  `isPublish` int(1) DEFAULT '0',
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`ID`, `Code`, `Title`, `Category_id`, `Brand_id`, `Description`, `Item_stock`, `Delivery_Time`, `isPublish`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, '', '', 0, 0, '', 0, 0, 0, 1, '2018-03-11 05:35:32', 0, '0000-00-00 00:00:00', 1),
(2, '102', 'ASDasd', 1, 2, 'A new Tees', 0, 0, 0, 1, '2018-03-11 05:36:51', 0, '0000-00-00 00:00:00', 1),
(3, '', '', 0, 0, '', 0, 0, 0, 1, '2018-03-14 14:50:47', 0, '0000-00-00 00:00:00', 1),
(4, '', '', 0, 0, '', 0, 0, 0, 1, '2018-03-14 14:55:12', 0, '0000-00-00 00:00:00', 1),
(5, '12313itemCategory=1', 'Sweater', 0, 1, 'Limited Edition', 0, 56, 0, 1, '2018-03-14 15:14:25', 0, '0000-00-00 00:00:00', 1),
(6, '12313', 'new gfh', 1, 1, 'Limited Edition', 4, 56, 0, 1, '2018-03-14 15:32:51', 0, '0000-00-00 00:00:00', 1),
(7, '12313', 'new gfh', 1, 1, 'Limited Edition', 4, 56, 0, 1, '2018-03-14 15:33:03', 0, '0000-00-00 00:00:00', 1),
(8, '12313', 'new gfh', 1, 1, 'Limited Edition', 4, 56, 0, 1, '2018-03-14 15:33:46', 0, '0000-00-00 00:00:00', 1),
(9, 'A001', 'Tshirt', 3, 4, 'limited collection', 12, 48, 0, 1, '2018-03-14 15:40:32', 0, '0000-00-00 00:00:00', 1),
(10, 'A001', 'Tshirt', 3, 4, 'limited collection', 12, 48, 0, 1, '2018-03-14 15:41:01', 0, '0000-00-00 00:00:00', 1),
(11, 'A001', 'Tshirt', 3, 4, 'limited collection', 12, 48, 0, 1, '2018-03-14 15:42:21', 0, '0000-00-00 00:00:00', 1),
(12, 'A001', 'Tshirt', 3, 4, 'limited collection', 12, 48, 0, 1, '2018-03-14 15:42:29', 0, '0000-00-00 00:00:00', 1),
(13, 'A001', 'Tshirt', 3, 4, 'limited collection', 12, 48, 0, 1, '2018-03-14 15:49:42', 0, '0000-00-00 00:00:00', 1),
(14, 'A001', 'Tshirt', 3, 4, 'limited collection', 12, 48, 0, 1, '2018-03-14 15:50:40', 0, '0000-00-00 00:00:00', 1),
(15, 'Z2340', 'Sweater', 1, 4, 'Navy Blue', 6, 48, 0, 1, '2018-03-15 01:42:38', 0, '0000-00-00 00:00:00', 1),
(16, 'Z2340', 'Sweater', 1, 4, 'Blue', 12, 48, 0, 1, '2018-03-15 01:45:30', 0, '0000-00-00 00:00:00', 1),
(17, 'S0978', 'Zig zag', 2, 4, 'Black', 12, 46, 0, 1, '2018-03-15 01:49:36', 0, '0000-00-00 00:00:00', 1),
(18, 'Sh1002', 'Denim Shirt', 3, 5, 'Black', 12, 78, 0, 1, '2018-03-15 09:21:28', 0, '0000-00-00 00:00:00', 1),
(19, '12', 'messi', 2, 1, 'football shoe', 6, 39, 0, 1, '2018-03-15 09:25:04', 0, '0000-00-00 00:00:00', 1),
(20, 'CS125', 'Mens Causal Shirt', 3, 6, 'White and blue check', 12, 89, 0, 1, '2018-03-16 03:15:08', 0, '0000-00-00 00:00:00', 1),
(21, 'AS 120', 'Short', 1, 3, 'Short', 6, 120, 0, 1, '2018-03-16 03:29:49', 0, '0000-00-00 00:00:00', 1),
(22, 'SH009', 'Shoe', 1, 4, 'running shoe', 12, 48, 0, 1, '2018-03-16 03:34:35', 0, '0000-00-00 00:00:00', 1),
(23, 'A129', 'new', 1, 1, 'Brand', 23, 45, 0, 1, '2018-03-16 11:15:28', 0, '0000-00-00 00:00:00', 1),
(24, 'AS12', 'Classic Shirt', 2, 4, 'Blue in colour', 12, 128, 0, 1, '2018-03-16 11:20:36', 0, '0000-00-00 00:00:00', 1),
(25, 'As123', 'A class', 1, 4, 'hawai', 13, 68, 0, 1, '2018-03-16 11:32:03', 0, '0000-00-00 00:00:00', 1),
(26, 'As123', 'asasd', 1, 1, 'asd', 123, 12, 0, 1, '2018-03-16 11:41:40', 0, '0000-00-00 00:00:00', 1),
(27, 'AB09', 'T SHirt', 1, 1, 'new design', 40, 48, 0, 1, '2018-03-16 11:56:57', 0, '0000-00-00 00:00:00', 1),
(28, 'SW12', 'Adidas New Sweater', 1, 1, 'Limited Edition', 12, 48, 0, 1, '2018-03-16 12:14:40', 0, '0000-00-00 00:00:00', 1),
(29, 'SK90', 'Sneaker', 2, 1, 'New Sneaker', 34, 68, 0, 1, '2018-03-16 12:28:00', 0, '0000-00-00 00:00:00', 1),
(30, 'SK90', 'Sneaker', 2, 1, 'New Sneaker', 34, 68, 0, 1, '2018-03-16 12:32:18', 0, '0000-00-00 00:00:00', 1),
(31, 'SHJ10', 'Jordan Shirt', 3, 1, 'New Shirt', 12, 68, 0, 1, '2018-03-16 12:37:40', 0, '0000-00-00 00:00:00', 1),
(32, '11', 'dsd', 1, 1, 'ddd', 222, 22, 0, 1, '2018-03-16 12:54:13', 0, '0000-00-00 00:00:00', 1),
(33, 'sd', 'sdsd', 1, 1, 'sdsd', 444, 44, 0, 1, '2018-03-16 13:18:24', 0, '0000-00-00 00:00:00', 1),
(34, '111', '2222', 1, 1, 'wwww', 22, 22, 0, 1, '2018-03-16 13:31:04', 0, '0000-00-00 00:00:00', 1),
(35, 'qqq', 'aaa', 1, 1, 'aaa', 22, 22, 0, 1, '2018-03-16 13:38:05', 0, '0000-00-00 00:00:00', 1),
(36, 'qqq', 'aaa', 1, 1, 'aaa', 22, 22, 0, 1, '2018-03-16 13:39:06', 0, '0000-00-00 00:00:00', 1),
(37, 'asdad', 'asd', 1, 1, 'fgas', 1212, 12, 0, 1, '2018-03-16 13:48:52', 0, '0000-00-00 00:00:00', 1),
(38, 'asdhjk', 'a.sdh', 1, 1, 'qwe', 2, 123, 0, 1, '2018-03-16 13:49:58', 0, '0000-00-00 00:00:00', 1),
(39, 'N01', 'Nike Air Max', 2, 2, 'Original', 3, 48, 0, 1, '2018-03-16 14:13:33', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Item_Details`
--

CREATE TABLE IF NOT EXISTS `Item_Details` (
  `ID` int(125) NOT NULL,
  `Item_id` int(125) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Item_Image`
--

CREATE TABLE IF NOT EXISTS `Item_Image` (
  `ID` int(125) NOT NULL,
  `Item_id` int(125) NOT NULL,
  `Image_Url` varchar(500) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item_Image`
--

INSERT INTO `Item_Image` (`ID`, `Item_id`, `Image_Url`, `Title`, `Description`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, 33, 'images/Screen Shot 2018-03-02 at 9.54.27 PM.png', '', '', 1, '2018-03-16 13:22:24', 0, '0000-00-00 00:00:00', 1),
(2, 33, 'images/Screen Shot 2018-03-02 at 9.54.27 PM.png', '', '', 1, '2018-03-16 13:24:32', 0, '0000-00-00 00:00:00', 1),
(3, 33, 'images/Screen Shot 2018-03-14 at 8.08.26 AM.png', '', '', 1, '2018-03-16 13:25:22', 0, '0000-00-00 00:00:00', 1),
(4, 33, 'images/Screen Shot 2018-03-14 at 8.08.26 AM.png', '', '', 1, '2018-03-16 13:25:59', 0, '0000-00-00 00:00:00', 1),
(5, 33, 'images/Screen Shot 2018-02-26 at 4.39.49 PM.png', '', '', 1, '2018-03-16 13:26:23', 0, '0000-00-00 00:00:00', 1),
(6, 33, 'images/Screen Shot 2018-03-14 at 8.08.26 AM.png', '', '', 1, '2018-03-16 13:27:27', 0, '0000-00-00 00:00:00', 1),
(7, 0, 'images/Screen Shot 2018-03-02 at 9.54.27 PM.png', '', '', 1, '2018-03-16 13:31:14', 0, '0000-00-00 00:00:00', 1),
(8, 34, 'images/Screen Shot 2018-03-02 at 9.54.27 PM.png', '', '', 1, '2018-03-16 13:31:23', 0, '0000-00-00 00:00:00', 1),
(9, 0, 'images/Screen Shot 2018-03-02 at 9.54.27 PM.png', '', '', 1, '2018-03-16 13:35:17', 0, '0000-00-00 00:00:00', 1),
(10, 35, 'images/Screen Shot 2018-03-14 at 8.08.26 AM.png', '', '', 1, '2018-03-16 13:38:14', 0, '0000-00-00 00:00:00', 1),
(11, 36, 'images/Screen Shot 2018-03-14 at 8.08.26 AM.png', '', '', 1, '2018-03-16 13:39:13', 0, '0000-00-00 00:00:00', 1),
(12, 36, 'images/Screen Shot 2018-03-02 at 9.54.27 PM.png', '', '', 1, '2018-03-16 13:39:24', 0, '0000-00-00 00:00:00', 1),
(13, 36, 'images/cv.pages', '', '', 1, '2018-03-16 13:39:38', 0, '0000-00-00 00:00:00', 1),
(14, 37, 'images/Screen Shot 2018-03-14 at 8.08.26 AM.png', '', '', 1, '2018-03-16 13:49:00', 0, '0000-00-00 00:00:00', 1),
(15, 37, 'images/Screen Shot 2018-03-02 at 9.54.27 PM.png', '', '', 1, '2018-03-16 13:49:06', 0, '0000-00-00 00:00:00', 1),
(16, 38, 'images/hhh.jpg', '', '', 1, '2018-03-16 13:50:11', 0, '0000-00-00 00:00:00', 1),
(17, 38, 'images/back.jpg', '', '', 1, '2018-03-16 13:50:23', 0, '0000-00-00 00:00:00', 0),
(18, 39, 'images/f.jpg', '', '', 1, '2018-03-16 14:13:56', 0, '0000-00-00 00:00:00', 1),
(19, 39, 'images/hhh.jpg', '', '', 1, '2018-03-16 14:14:07', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Item_Price`
--

CREATE TABLE IF NOT EXISTS `Item_Price` (
  `ID` int(125) NOT NULL,
  `Item_id` int(125) NOT NULL,
  `Price` decimal(50,0) NOT NULL,
  `isCurrent` int(1) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item_Price`
--

INSERT INTO `Item_Price` (`ID`, `Item_id`, `Price`, `isCurrent`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, 26, 123, 1, 1, '2018-03-16 11:41:50', 0, '0000-00-00 00:00:00', 1),
(2, 27, 250, 1, 1, '2018-03-16 11:57:05', 0, '0000-00-00 00:00:00', 1),
(3, 27, 250, 0, 1, '2018-03-16 11:57:46', 0, '0000-00-00 00:00:00', 1),
(4, 27, 250, 0, 1, '2018-03-16 11:58:26', 0, '0000-00-00 00:00:00', 1),
(5, 27, 300, 0, 1, '2018-03-16 11:58:57', 0, '0000-00-00 00:00:00', 1),
(6, 28, 2999, 0, 1, '2018-03-16 12:14:49', 0, '0000-00-00 00:00:00', 0),
(7, 28, 2234, 0, 1, '2018-03-16 12:21:58', 0, '0000-00-00 00:00:00', 0),
(8, 28, 2299, 0, 1, '2018-03-16 12:24:20', 0, '0000-00-00 00:00:00', 0),
(9, 28, 2299, 0, 1, '2018-03-16 12:25:00', 0, '0000-00-00 00:00:00', 1),
(10, 28, 2299, 0, 1, '2018-03-16 12:25:06', 0, '0000-00-00 00:00:00', 0),
(11, 29, 3999, 0, 1, '2018-03-16 12:28:07', 0, '0000-00-00 00:00:00', 0),
(12, 29, 4590, 0, 1, '2018-03-16 12:28:18', 0, '0000-00-00 00:00:00', 1),
(13, 29, 4590, 0, 1, '2018-03-16 12:30:14', 0, '0000-00-00 00:00:00', 1),
(14, 30, 1499, 0, 1, '2018-03-16 12:32:26', 0, '0000-00-00 00:00:00', 1),
(15, 30, 100, 0, 1, '2018-03-16 12:32:33', 1, '2018-03-16 12:32:41', 1),
(16, 31, 1499, 0, 1, '2018-03-16 12:37:48', 0, '0000-00-00 00:00:00', 1),
(17, 31, 999, 0, 1, '2018-03-16 12:37:54', 0, '0000-00-00 00:00:00', 1),
(18, 31, 1299, 1, 1, '2018-03-16 12:38:09', 0, '0000-00-00 00:00:00', 1),
(19, 39, 2999, 1, 1, '2018-03-16 14:13:39', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Item_review`
--

CREATE TABLE IF NOT EXISTS `Item_review` (
  `ID` int(125) NOT NULL,
  `Item_id` int(125) NOT NULL,
  `Rating` int(10) NOT NULL,
  `Review` varchar(500) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Item_View`
--

CREATE TABLE IF NOT EXISTS `Item_View` (
  `ID` int(125) NOT NULL,
  `Item_id` int(125) NOT NULL,
  `Count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE IF NOT EXISTS `Login` (
  `ID` int(125) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Key` varchar(500) NOT NULL,
  `Role` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Order_Header`
--

CREATE TABLE IF NOT EXISTS `Order_Header` (
  `ID` int(125) NOT NULL,
  `Order_No` varchar(50) NOT NULL,
  `Item_id` int(125) NOT NULL,
  `Item_price` int(125) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `State` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Pincode` int(10) NOT NULL,
  `Mobile` int(15) NOT NULL,
  `Order_status` int(10) NOT NULL,
  `Shipping_charge` decimal(10,0) NOT NULL,
  `Total_amount` decimal(10,0) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Order_Status`
--

CREATE TABLE IF NOT EXISTS `Order_Status` (
  `ID` int(125) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Shipping`
--

CREATE TABLE IF NOT EXISTS `Shipping` (
  `ID` int(125) NOT NULL,
  `Pincode` int(10) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Rate` decimal(10,2) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Shipping`
--

INSERT INTO `Shipping` (`ID`, `Pincode`, `Time`, `Rate`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, 795001, '2', 201.00, 1, '2018-02-24 14:20:18', 3, '2018-02-24 14:20:18', 1),
(2, 795002, '3', 1005.60, 1, '2018-02-24 14:20:18', 4, '2018-02-24 14:20:18', 1),
(3, 795003, '2', 2001.10, 1, '2018-02-24 14:21:53', 3, '2018-02-24 14:21:53', 1),
(4, 795004, '3', 105.47, 1, '2018-02-24 14:21:53', 4, '2018-02-24 14:21:53', 1),
(5, 795005, '4', 400.50, 4, '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', 1),
(6, 0, '', 0.00, 0, '0000-00-00 00:00:00', 1, '2018-03-11 02:00:28', 0),
(7, 795006, '5', 600.45, 0, '0000-00-00 00:00:00', 1, '2018-03-11 02:01:07', 1),
(8, 795007, '', 0.00, 0, '0000-00-00 00:00:00', 1, '2018-03-11 02:00:23', 0),
(9, 0, '', 0.00, 0, '2018-03-03 04:01:43', 0, '0000-00-00 00:00:00', 0),
(10, 0, '', 0.00, 0, '2018-03-03 04:02:39', 0, '0000-00-00 00:00:00', 0),
(11, 795008, '5', 500.00, 1, '2018-03-10 16:13:27', 0, '0000-00-00 00:00:00', 0),
(12, 795008, '6', 500.00, 1, '2018-03-10 16:15:22', 1, '2018-03-11 02:01:30', 0),
(13, 795009, '6', 900.00, 1, '2018-03-14 11:31:48', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Shipping_Details`
--

CREATE TABLE IF NOT EXISTS `Shipping_Details` (
  `ID` int(125) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `State` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Pincode` int(10) NOT NULL,
  `Mobile` int(15) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Stock_Item`
--

CREATE TABLE IF NOT EXISTS `Stock_Item` (
  `Item_id` int(125) NOT NULL,
  `Stock_qty` int(10) NOT NULL,
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User_Details`
--

CREATE TABLE IF NOT EXISTS `User_Details` (
  `ID` int(125) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Mobile` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User_Role`
--

CREATE TABLE IF NOT EXISTS `User_Role` (
  `ID` int(125) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Brand`
--
ALTER TABLE `Brand`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Customer_login`
--
ALTER TABLE `Customer_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Item_Details`
--
ALTER TABLE `Item_Details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Item_Image`
--
ALTER TABLE `Item_Image`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Item_Price`
--
ALTER TABLE `Item_Price`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Item_review`
--
ALTER TABLE `Item_review`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Item_View`
--
ALTER TABLE `Item_View`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Order_Header`
--
ALTER TABLE `Order_Header`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Order_Status`
--
ALTER TABLE `Order_Status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Shipping`
--
ALTER TABLE `Shipping`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Shipping_Details`
--
ALTER TABLE `Shipping_Details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Stock_Item`
--
ALTER TABLE `Stock_Item`
  ADD UNIQUE KEY `Item_id` (`Item_id`);

--
-- Indexes for table `User_Details`
--
ALTER TABLE `User_Details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `User_Role`
--
ALTER TABLE `User_Role`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Brand`
--
ALTER TABLE `Brand`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Customer_login`
--
ALTER TABLE `Customer_login`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `Item_Details`
--
ALTER TABLE `Item_Details`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item_Image`
--
ALTER TABLE `Item_Image`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Item_Price`
--
ALTER TABLE `Item_Price`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Item_review`
--
ALTER TABLE `Item_review`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item_View`
--
ALTER TABLE `Item_View`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Login`
--
ALTER TABLE `Login`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Order_Header`
--
ALTER TABLE `Order_Header`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Order_Status`
--
ALTER TABLE `Order_Status`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Shipping`
--
ALTER TABLE `Shipping`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Shipping_Details`
--
ALTER TABLE `Shipping_Details`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User_Details`
--
ALTER TABLE `User_Details`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User_Role`
--
ALTER TABLE `User_Role`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
