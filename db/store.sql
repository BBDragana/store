-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 11:49 PM
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
(3, 'peti', 'xxx', 'xx', 'xx', ''),
(4, '777', 'Test2', '5', '888', '25'),
(5, '1', '1', '1', '1', '1'),
(6, '2', '2', '2', '2', '2'),
(7, '5', '5', '5', '5', '5'),
(8, '9', 'h', 'h', 'h', 'h'),
(9, 'cc', 'cc', 'cc', 'cc', 'cc'),
(10, 'zzz', 'zzzzz', 'zz', '', ''),
(11, 'treci3', 'bb', 'bb', '', 'bb'),
(12, '1', 'jabuka', 'kg', '11', '111'),
(13, '1', 'banana', 'kg', '22', '222');

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

--
-- Dumping data for table `check`
--

INSERT INTO `check` (`CheckId`, `EmployeeIdIssue`, `CheckData`, `CheckNumber`, `TotalAmount`, `TaxAmount`, `AmountWithoutTax`) VALUES
(2, 3, '2023-02-14 16:16:37', '1', '100.00', '17.00', '83.00');

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
  `Email` varchar(100) DEFAULT NULL,
  `JMBG` char(13) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeId`, `FirstName`, `LastName`, `PhoneNumber`, `Address`, `City`, `Email`, `JMBG`, `UserId`) VALUES
(1, 'Stefan', 'B', '00000551', 'daf', 'dfsgvb', '0xsvgb@gmail.com', '1111111111111', 13),
(2, 'Dragana', 'b', '1112555', 'hgiguoviv', 'bkviycv', 'bkh.@gmail.com', '1111111111111', 14),
(3, 'Ana', 'nn5555555555', 'nnnn', 'nn', 'njjn', 'ann@gmail.com', '8522222226', 28),
(4, 'HANA', 'nnnnnnn', 'jjjjjjjj', 'jgggggggggg', 'gggggg', 'gggggg', 'gggg111111111', 22),
(5, 'filip', 'jkl', 'llh', 'lhkbhl', 'lhl', 'lhl', 'lhl2111111111', 22);

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

--
-- Dumping data for table `lager`
--

INSERT INTO `lager` (`LagerId`, `ArticleId`, `AvailableQuantity`, `Location`) VALUES
(1, 4, '55.00', 'bl'),
(6, 10, '4.00', 'j');

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
(13, 'Stefan', '$2y$10$9.xnX1.krdyFpndHhnL9k.bNJJr6vXIbTl6ZSZ2MHrqF/cPGIlkeq', 1, 0),
(14, 'Milan', '$2y$10$eYNgRAbg/r6EOmi6Y/UmH.qqlhVm1Hnh9ZD4jHLTqERH.66w9ojCi', 2, 0),
(22, 'Marko', '123', 2, 0),
(25, 'Luka', '$2y$10$WM.eK9bKwaI/omYDKQXpM.SxA3wTFoIrWoryjPiJyWGS4ry/MsNtm', 2, 0),
(26, 'Pero', '$2y$10$jzLgD4ONx6Oe10a68CLFuOe6yoIKr3SKCyP5FGWtnQYX1Xog8j/SG', 2, 0),
(27, 'stela', '$2y$10$F21ysngbJd4EesjPbyRCEOzDMRiHo0U7.CyR5SissFYnYmNhVXNge', 2, 0),
(28, 'ana', '$2y$10$c5/pgSZqkNZHLu8VoE0YEeRSDL/VTagvsnV6cPH.WKtMkomkA/6DW', 2, 0);

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
  ADD PRIMARY KEY (`CheckId`,`ItemID`),
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
  MODIFY `ArticleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `check`
--
ALTER TABLE `check`
  MODIFY `CheckId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkitem`
--
ALTER TABLE `checkitem`
  MODIFY `CheckId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lager`
--
ALTER TABLE `lager`
  MODIFY `LagerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  ADD CONSTRAINT `fk_article` FOREIGN KEY (`ArticleId`) REFERENCES `article` (`ArticleId`),
  ADD CONSTRAINT `fk_check` FOREIGN KEY (`CheckId`) REFERENCES `check` (`CheckId`);

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
