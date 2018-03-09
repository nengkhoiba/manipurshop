-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 01:28 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`ID`, `Code`, `Description`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, '101', 'Adidas', 1, '2018-02-24 02:45:15', 4, '2018-02-24 02:45:15', 1),
(2, '102', 'Nike', 1, '2018-02-24 02:45:15', 3, '2018-02-24 02:45:15', 1),
(3, '103', 'Puma', 1, '2018-02-24 02:52:51', 4, '2018-02-24 02:52:51', 1),
(4, '104', 'Reebok', 2, '2018-02-24 02:52:51', 4, '2018-02-24 02:52:51', 1),
(5, '105', 'Levis ', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(6, '106', 'John Player', 3, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(7, '107', 'Adidas Neo', 4, '2018-03-03 02:37:26', 0, '0000-00-00 00:00:00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`ID`, `Code`, `Description`, `Added_on`, `Added_by`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, '001', 'T-Shirt', '2018-02-28 02:58:22', 1, 0, '2018-02-28 02:58:22', 1),
(2, '002', 'Shoes', '2018-02-28 02:58:22', 1, 0, '2018-02-28 02:58:22', 1);

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
  `Added_by` int(125) NOT NULL,
  `Added_on` timestamp NOT NULL,
  `Modified_by` int(125) NOT NULL,
  `Modified_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Shipping`
--

INSERT INTO `Shipping` (`ID`, `Pincode`, `Time`, `Rate`, `Added_by`, `Added_on`, `Modified_by`, `Modified_on`, `isActive`) VALUES
(1, 795001, '2', 201.00, 1, '2018-02-24 14:20:18', 3, '2018-02-24 14:20:18', 1),
(2, 795002, '3', 1005.60, 1, '2018-02-24 14:20:18', 4, '2018-02-24 14:20:18', 1),
(3, 795003, '2', 2001.10, 1, '2018-02-24 14:21:53', 3, '2018-02-24 14:21:53', 1),
(4, 795004, '3', 105.47, 1, '2018-02-24 14:21:53', 4, '2018-02-24 14:21:53', 1),
(5, 795005, '4', 400.50, 4, '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', 1),
(6, 0, '', 0.00, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(7, 795006, '', 0.00, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(8, 795007, '', 0.00, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(9, 0, '', 0.00, 0, '2018-03-03 04:01:43', 0, '0000-00-00 00:00:00', 0),
(10, 0, '', 0.00, 0, '2018-03-03 04:02:39', 0, '0000-00-00 00:00:00', 0);

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
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Customer_login`
--
ALTER TABLE `Customer_login`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item_Details`
--
ALTER TABLE `Item_Details`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item_Image`
--
ALTER TABLE `Item_Image`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item_Price`
--
ALTER TABLE `Item_Price`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
