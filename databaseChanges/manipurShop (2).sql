-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 12:29 PM
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
(6, '106', 'John Player', 3, '0000-00-00 00:00:00', 1, '2018-03-18 07:10:09', 1),
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
  `Description` varchar(500) NOT NULL,
  `Item_stock` int(50) NOT NULL,
  `Delivery_Time` int(50) NOT NULL,
  `isPublish` int(1) DEFAULT '0',
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`ID`, `Code`, `Title`, `Category_id`, `Brand_id`, `Description`, `Item_stock`, `Delivery_Time`, `isPublish`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, 'A01', 'Women Shirt', 3, 6, 'New Arrival', 10, 48, 1, 1, '2018-03-18 05:27:22', 0, '0000-00-00 00:00:00', 1),
(2, 'NK01', 'Nike Air Max 2017 Running Shoes', 2, 2, 'The Nike Air Max 2017 Running Shoe is built with an Engineered that appears to sit atop the same sole.', 5, 24, 1, 1, '2018-03-18 10:45:03', 0, '0000-00-00 00:00:00', 1),
(3, 'PM01', 'Puma Shirt for Man', 3, 3, 'New Arrival', 20, 48, 1, 1, '2018-03-18 11:53:03', 0, '0000-00-00 00:00:00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item_Details`
--

INSERT INTO `Item_Details` (`ID`, `Item_id`, `Title`, `Description`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, 1, 'Size', 'S, M , L', 1, '2018-03-18 05:30:57', 0, '0000-00-00 00:00:00', 1),
(2, 1, 'Color', 'Red, Blue, Black', 1, '2018-03-18 05:31:15', 0, '0000-00-00 00:00:00', 1),
(3, 1, 'Material', 'Cotton', 1, '2018-03-18 09:35:13', 0, '0000-00-00 00:00:00', 1),
(4, 2, 'Runner Type', 'Pro', 1, '2018-03-18 10:46:29', 0, '0000-00-00 00:00:00', 1),
(5, 2, 'Running Track', 'Road', 1, '2018-03-18 10:46:36', 0, '0000-00-00 00:00:00', 1),
(6, 2, 'Color', 'Black', 1, '2018-03-18 10:46:55', 0, '0000-00-00 00:00:00', 1),
(7, 2, 'Features', 'Lightweight', 1, '2018-03-18 10:47:22', 0, '0000-00-00 00:00:00', 1),
(8, 2, 'Upper Material', 'Mesh/Textile', 1, '2018-03-18 10:47:44', 0, '0000-00-00 00:00:00', 1),
(9, 2, 'Sole Material', 'Rubber', 1, '2018-03-18 10:48:16', 0, '0000-00-00 00:00:00', 1),
(10, 3, 'Size', 'Small, Medium, Large', 1, '2018-03-18 12:25:15', 0, '0000-00-00 00:00:00', 1),
(11, 3, 'Color', 'Black', 1, '2018-03-18 12:25:26', 0, '0000-00-00 00:00:00', 1),
(12, 3, 'Material', 'Polyster', 1, '2018-03-18 12:25:38', 0, '0000-00-00 00:00:00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item_Image`
--

INSERT INTO `Item_Image` (`ID`, `Item_id`, `Image_Url`, `Title`, `Description`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, 1, 'images/product1.jpg', '', '', 1, '2018-03-18 05:28:19', 0, '0000-00-00 00:00:00', 1),
(2, 1, 'images/product5.jpg', '', '', 1, '2018-03-18 05:28:28', 0, '0000-00-00 00:00:00', 1),
(3, 1, 'images/product4.jpg', '', '', 1, '2018-03-18 05:28:41', 0, '0000-00-00 00:00:00', 1),
(4, 1, 'images/product2.jpg', '', '', 1, '2018-03-18 05:28:49', 0, '0000-00-00 00:00:00', 0),
(5, 1, 'images/product6.jpg', '', '', 1, '2018-03-18 05:29:03', 0, '0000-00-00 00:00:00', 1),
(6, 2, 'images/nike4.jpg', '', '', 1, '2018-03-18 10:48:40', 0, '0000-00-00 00:00:00', 1),
(7, 2, 'images/nike2.jpeg', '', '', 1, '2018-03-18 10:48:58', 0, '0000-00-00 00:00:00', 1),
(8, 2, 'images/nike.jpg', '', '', 1, '2018-03-18 10:49:11', 0, '0000-00-00 00:00:00', 1),
(9, 2, 'images/nike3.webp', '', '', 1, '2018-03-18 10:49:23', 0, '0000-00-00 00:00:00', 1),
(10, 3, 'images/product9.jpg', '', '', 1, '2018-03-18 12:26:36', 0, '0000-00-00 00:00:00', 1),
(11, 3, 'images/product11.jpg', '', '', 1, '2018-03-18 12:26:44', 0, '0000-00-00 00:00:00', 1),
(12, 3, 'images/product7.jpg', '', '', 1, '2018-03-18 12:26:50', 0, '0000-00-00 00:00:00', 1),
(13, 3, 'images/product12.jpg', '', '', 1, '2018-03-18 12:26:55', 0, '0000-00-00 00:00:00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item_Price`
--

INSERT INTO `Item_Price` (`ID`, `Item_id`, `Price`, `isCurrent`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, 1, 499, 1, 1, '2018-03-18 05:27:29', 1, '2018-03-18 09:32:50', 1),
(2, 1, 599, 0, 1, '2018-03-18 09:33:01', 0, '0000-00-00 00:00:00', 1),
(3, 2, 9999, 0, 1, '2018-03-18 10:45:41', 0, '0000-00-00 00:00:00', 1),
(4, 2, 2, 0, 1, '2018-03-18 10:45:44', 0, '0000-00-00 00:00:00', 0),
(5, 2, 2481, 1, 1, '2018-03-18 10:46:02', 0, '0000-00-00 00:00:00', 1),
(6, 3, 300, 1, 1, '2018-03-18 12:24:54', 0, '0000-00-00 00:00:00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`ID`, `Email`, `Password`, `Key`, `Role`, `isActive`) VALUES
(1, 'nengkhoiba.chungkham@gmail.com', 'welcome', 'qwertyuiop', 1, 1);

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
  `Mobile` bigint(15) NOT NULL,
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
  `Mobile` bigint(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User_Details`
--

INSERT INTO `User_Details` (`ID`, `Name`, `Address`, `DOB`, `Gender`, `Mobile`) VALUES
(1, 'Nengkhoiba Chungkham', 'Brahmapur Chungkham Leikai', '1990-12-15', 'MALE', 9774180184);

-- --------------------------------------------------------

--
-- Table structure for table `User_Role`
--

CREATE TABLE IF NOT EXISTS `User_Role` (
  `ID` int(125) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User_Role`
--

INSERT INTO `User_Role` (`ID`, `Code`, `Description`, `isActive`) VALUES
(1, 'ADMIN', 'ADMIN', 1);

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
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Item_Details`
--
ALTER TABLE `Item_Details`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Item_Image`
--
ALTER TABLE `Item_Image`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Item_Price`
--
ALTER TABLE `Item_Price`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `User_Role`
--
ALTER TABLE `User_Role`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
