-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 10:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `definitions`
--

CREATE TABLE `definitions` (
  `defID` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `pID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailsdata`
--

CREATE TABLE `detailsdata` (
  `detID` int(11) NOT NULL,
  `cedi` varchar(255) NOT NULL,
  `childWeightFrom` varchar(255) NOT NULL,
  `childWeightTo` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `color_description` varchar(255) NOT NULL,
  `countryImages` tinyint(1) NOT NULL,
  `defaultSku` tinyint(1) NOT NULL,
  `preferredEan` int(11) NOT NULL,
  `sapAssortmentLevel` varchar(255) NOT NULL,
  `sapPrice` int(11) NOT NULL,
  `season` varchar(255) NOT NULL,
  `showOnLineSku` tinyint(1) NOT NULL,
  `size_code` varchar(255) NOT NULL,
  `size_description` varchar(255) NOT NULL,
  `skuID` varchar(255) NOT NULL,
  `skuName` varchar(255) NOT NULL,
  `stateOfArticle` tinyint(1) NOT NULL,
  `umSAPprice` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `defID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `headerdata`
--

CREATE TABLE `headerdata` (
  `hID` int(11) NOT NULL,
  `bag` tinyint(1) NOT NULL,
  `bleachingDescription` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brandCode` int(11) NOT NULL,
  `catalog` varchar(255) NOT NULL,
  `composition` varchar(255) NOT NULL,
  `creationDateInDatabase` datetime NOT NULL,
  `custom1` varchar(255) NOT NULL,
  `custom2` varchar(255) NOT NULL,
  `custom3` varchar(255) NOT NULL,
  `drinkHolder` tinyint(1) NOT NULL,
  `dryCleaningDescription` varchar(255) NOT NULL,
  `dryingDescription` varchar(255) NOT NULL,
  `EShopDisplayName` varchar(255) NOT NULL,
  `EShopLongDescription` varchar(255) NOT NULL,
  `ergonomicSeat` tinyint(1) NOT NULL,
  `fasteningTypeDescription` varchar(255) NOT NULL,
  `fasteningTypeTextile` varchar(255) NOT NULL,
  `flat` tinyint(1) NOT NULL,
  `freeDelivery` tinyint(1) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `indicatorOfItHasToBeAssembled` tinyint(1) NOT NULL,
  `ironingDescription` varchar(255) NOT NULL,
  `lastDateChanged` datetime NOT NULL,
  `lastUserChanged` varchar(255) NOT NULL,
  `productFeatures` varchar(255) NOT NULL,
  `productMissingFeatures` varchar(255) NOT NULL,
  `pulloutType` varchar(255) NOT NULL,
  `pulloutTypeDescription` varchar(255) NOT NULL,
  `punnet` tinyint(1) NOT NULL,
  `sapCategoryID` varchar(255) NOT NULL,
  `sapCategoryName` varchar(255) NOT NULL,
  `sapDivisionID` varchar(255) NOT NULL,
  `sapDivisionName` varchar(255) NOT NULL,
  `sapFamilyDescription` varchar(255) NOT NULL,
  `sapFamilyID` int(11) NOT NULL,
  `sapFamilyName` varchar(255) NOT NULL,
  `sapMacrocategoryID` varchar(255) NOT NULL,
  `sapMacrocategoryName` varchar(255) NOT NULL,
  `sapName` varchar(255) NOT NULL,
  `sapUniverseID` varchar(255) NOT NULL,
  `sapUniverseName` varchar(255) NOT NULL,
  `showOnLine` tinyint(1) NOT NULL,
  `sizeGuide` varchar(255) NOT NULL,
  `userOfCreation` varchar(255) NOT NULL,
  `waistlineDescription` varchar(255) NOT NULL,
  `washability` varchar(255) NOT NULL,
  `washabilityDescription` varchar(255) NOT NULL,
  `zipStopper` tinyint(1) NOT NULL,
  `defID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `bleachingCode` int(11) NOT NULL,
  `defaultLanguage` varchar(255) NOT NULL,
  `dryCleaningCode` int(11) NOT NULL,
  `dryingCode` int(11) NOT NULL,
  `fasteningTypeCode` int(11) NOT NULL,
  `ironingCode` int(11) NOT NULL,
  `productID` varchar(255) NOT NULL,
  `pulloutTypeCode` int(11) NOT NULL,
  `sapPacket` int(11) NOT NULL,
  `updateImages` tinyint(1) NOT NULL,
  `waistlineCode` int(11) NOT NULL,
  `washabilityCode` int(11) NOT NULL,
  `pID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`bleachingCode`, `defaultLanguage`, `dryCleaningCode`, `dryingCode`, `fasteningTypeCode`, `ironingCode`, `productID`, `pulloutTypeCode`, `sapPacket`, `updateImages`, `waistlineCode`, `washabilityCode`, `pID`) VALUES
(6, 'en_GB', 6, 20, 9, 12, '000000000000593430', 4, 999, 0, 15, 28, 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `definitions`
--
ALTER TABLE `definitions`
  ADD PRIMARY KEY (`defID`);

--
-- Indexes for table `detailsdata`
--
ALTER TABLE `detailsdata`
  ADD PRIMARY KEY (`detID`);

--
-- Indexes for table `headerdata`
--
ALTER TABLE `headerdata`
  ADD PRIMARY KEY (`hID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pID`),
  ADD UNIQUE KEY `productID` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `definitions`
--
ALTER TABLE `definitions`
  MODIFY `defID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `detailsdata`
--
ALTER TABLE `detailsdata`
  MODIFY `detID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `headerdata`
--
ALTER TABLE `headerdata`
  MODIFY `hID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
