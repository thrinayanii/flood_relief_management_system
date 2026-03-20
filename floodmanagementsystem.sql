-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2026 at 01:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `floodmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `LoginID` int(11) DEFAULT NULL,
  `AdminName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `LoginID`, `AdminName`) VALUES
(1, 1, 'Admin01');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserRole` enum('Admin','User') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `Email`, `Password`, `UserRole`) VALUES
(1, 'admin01@gmail.com', 'admin01', 'Admin'),
(2, 'iqgowthaman@gmail.com', 'gowtham09', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `reliefdetails`
--

CREATE TABLE `reliefdetails` (
  `ReliefID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `TypeofRelief` enum('Water','Food','Medicine','Shelter') DEFAULT NULL,
  `District` varchar(255) NOT NULL,
  `DivisionalSecretariat` varchar(255) NOT NULL,
  `GNDivision` varchar(255) NOT NULL,
  `ContactPersonName` varchar(255) NOT NULL,
  `ContactPersonNumber` varchar(12) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `NoOfFamilyMembers` int(11) NOT NULL,
  `FloodSeverityLevel` enum('Low','Medium','High') DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Status` enum('Pending','Approved','Completed') DEFAULT NULL,
  `date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reliefdetails`
--

INSERT INTO `reliefdetails` (`ReliefID`, `UserID`, `TypeofRelief`, `District`, `DivisionalSecretariat`, `GNDivision`, `ContactPersonName`, `ContactPersonNumber`, `Address`, `NoOfFamilyMembers`, `FloodSeverityLevel`, `Description`, `Status`, `date`) VALUES
(1, 1, 'Food', 'Colombo', 'Colombo-06', 'Colombo', 'Vijay', '0771579096', '16 Vanderwart Place Dehiwala', 4, 'Medium', 'Severe', 'Approved', '2026-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `LoginID` int(11) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `UserContactNo` varchar(12) DEFAULT NULL,
  `RegDate` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `LoginID`, `UserName`, `UserContactNo`, `RegDate`) VALUES
(1, 2, 'Gowthaman', '0760403533', '2026-03-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `LoginID` (`LoginID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `reliefdetails`
--
ALTER TABLE `reliefdetails`
  ADD PRIMARY KEY (`ReliefID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `LoginID` (`LoginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reliefdetails`
--
ALTER TABLE `reliefdetails`
  MODIFY `ReliefID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`LoginID`) REFERENCES `login` (`LoginID`);

--
-- Constraints for table `reliefdetails`
--
ALTER TABLE `reliefdetails`
  ADD CONSTRAINT `reliefdetails_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`LoginID`) REFERENCES `login` (`LoginID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
