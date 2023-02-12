-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 11:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ArticleId` int(11) NOT NULL,
  `Code` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Unit` char(3) DEFAULT NULL,
  `BarCode` varchar(50) DEFAULT NULL,
  `PLU_COD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ArticleId`, `Code`, `Name`, `Unit`, `BarCode`, `PLU_COD`) VALUES
(2, '123', 'test', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `check`
--

CREATE TABLE `check` (
  `CheckId` int(11) NOT NULL,
  `EmployeeIdIssue` int(11) NOT NULL,
  `CheckData` datetime NOT NULL,
  `CheckNumber` varchar(30) DEFAULT NULL,
  `TotalAmount` decimal(18,2) DEFAULT NULL,
  `TaxAmount` decimal(18,2) DEFAULT NULL,
  `AmountWithoutTax` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkitem`
--

CREATE TABLE `checkitem` (
  `CheckId` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `ArticleId` int(11) DEFAULT NULL,
  `Quantity` decimal(18,2) DEFAULT NULL,
  `Price` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeId` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Email` varbinary(100) DEFAULT NULL,
  `JMBG` char(13) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lager`
--

CREATE TABLE `lager` (
  `LagerId` int(11) NOT NULL,
  `ArticleId` int(11) DEFAULT NULL,
  `AvailableQuantity` decimal(18,2) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `RoleId` int(11) DEFAULT NULL,
  `NewPassword` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserName`, `Password`, `RoleId`, `NewPassword`) VALUES
(6, 'Stefan', '123', NULL, 1),
(7, 'Milan&quot;', '123', NULL, 0),
(8, 'Maja', '$2y$10$RjREarTLO3vUdJ./ItUapONN1uHxv.EqqojV/P9IBqjEFjkcTGz3W', NULL, 1),
(9, 'Janko', '$2y$10$0Rgjt9v1E4LWUDk77X6EfuL7Z/LMscKKW/KZ0BlRE2Z/Mt1yT/Ukm', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ArticleId`);

--
-- Indexes for table `check`
--
ALTER TABLE `check`
  ADD PRIMARY KEY (`CheckId`),
  ADD KEY `fk_employee` (`EmployeeIdIssue`);

--
-- Indexes for table `checkitem`
--
ALTER TABLE `checkitem`
  ADD PRIMARY KEY (`CheckId`),
  ADD KEY `fk_article` (`ArticleId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeId`),
  ADD KEY `fk_user` (`UserId`);

--
-- Indexes for table `lager`
--
ALTER TABLE `lager`
  ADD PRIMARY KEY (`LagerId`),
  ADD KEY `fk_ArticleId` (`ArticleId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `fk_role` (`RoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ArticleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `check`
--
ALTER TABLE `check`
  MODIFY `CheckId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkitem`
--
ALTER TABLE `checkitem`
  MODIFY `CheckId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lager`
--
ALTER TABLE `lager`
  MODIFY `LagerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `check`
--
ALTER TABLE `check`
  ADD CONSTRAINT `fk_employee` FOREIGN KEY (`EmployeeIdIssue`) REFERENCES `employee` (`EmployeeId`);

--
-- Constraints for table `checkitem`
--
ALTER TABLE `checkitem`
  ADD CONSTRAINT `fk_article` FOREIGN KEY (`ArticleId`) REFERENCES `article` (`ArticleId`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_check` FOREIGN KEY (`CheckId`) REFERENCES `check` (`CheckId`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `lager`
--
ALTER TABLE `lager`
  ADD CONSTRAINT `fk_ArticleId` FOREIGN KEY (`ArticleId`) REFERENCES `article` (`ArticleId`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`RoleId`) REFERENCES `role` (`RoleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
