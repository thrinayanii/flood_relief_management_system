-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2026 at 05:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

INSERT INTO `login` (`LoginID`, `Email`, `Password`, `UserRole`) VALUES
(1, 'admin01@gmail.com', 'admin01', 'Admin'),
(2, 'iqgowthaman@gmail.com', 'Vesta@2709', 'User'),
(3, 'thirnayanis@gmail.com', 'Thrina@27', 'User'),
(4, 'dhiyana@gmail.com', 'dhiyana', 'User'),
(5, 'mohanaruby@gmail.com', 'mohanaruby@22', 'User');


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

INSERT INTO `reliefdetails` 
(`ReliefID`,`UserID`, `TypeofRelief`, `District`, `DivisionalSecretariat`, `GNDivision`, `ContactPersonName`, `ContactPersonNumber`, `Address`, `NoOfFamilyMembers`, `FloodSeverityLevel`, `Description`, `Status`, `date`) 
VALUES
(1,1, 'Food', 'Colombo', 'Colombo 03', 'Borella', 'Nimal Perera', '0712345678', '123 Main St, Colombo', 4, 'High', 'Family needs urgent food supplies', 'Pending', '2026-03-19'),
(2,2, 'Medicine', 'Gampaha', 'Negombo', 'Kochchikade', 'Sunil Fernando', '0723456789', '45 Lake Road, Negombo', 3, 'Medium', 'Medical assistance needed for children', 'Pending', '2026-03-18'),
(3,1, 'Water', 'Kalutara', 'Panadura', 'Ambalangoda', 'Kamal Silva', '0769876543', '89 River St, Kalutara', 5, 'Low', 'Clean drinking water required', 'Pending', '2026-03-17'),
(4,3, 'Shelter', 'Galle', 'Hikkaduwa', 'Galle Town', 'Rohana Jayawardena', '0771122334', '22 Beach Rd, Galle', 6, 'High', 'Temporary shelter required after flood', 'Approved', '2026-03-16'),
(5,2, 'Food', 'Matara', 'Matara Town', 'Dehigama', 'Priya Kumara', '0789988776', '56 Main St, Matara', 4, 'Medium', 'Food packs needed for family', 'Pending', '2026-03-15'),
(6,1, 'Food', 'Colombo', 'Dehiwala', 'Karagampitiya', 'Gowthaman N', '0760403533', '12 Ocean Ave, Colombo', 3, 'High', 'Immediate food supplies needed', 'Pending', '2026-03-19'),
(7,1, 'Medicine', 'Gampaha', 'Ja-Ela', 'Seeduwa', 'Gowthaman N', '0760403533', '34 Lake Rd, Gampaha', 2, 'Medium', 'Medicines for elderly', 'Pending', '2026-03-18'),
(8,1, 'Shelter', 'Kalutara', 'Horana', 'Panadura', 'Gowthaman N', '0760403533', '56 River St, Kalutara', 5, 'High', 'Temporary shelter needed after floods', 'Pending', '2026-03-17'),
(9,1, 'Water', 'Colombo', 'Colombo 07', 'Havelock Town', 'Gowthaman N', '0760403533', '78 Main St, Colombo', 4, 'Low', 'Clean drinking water required', 'Pending', '2026-03-16'),
(10,1, 'Food', 'Gampaha', 'Negombo', 'Katunayake', 'Gowthaman N', '0760403533', '90 Airport Rd, Gampaha', 6, 'Medium', 'Food packs needed for family', 'Pending', '2026-03-15');
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
(1, 2, 'Gowthaman N', '0760403533', '2026-03-03'),
(2, 3, 'Thrinayani S', '0779680928', '2026-03-04'),
(3, 5, 'D.R. Wijenayake', '0718125924', '2026-03-10'),
(4, 8, 'Mohanaruby S', '0741825226', '2026-03-19');

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
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reliefdetails`
--
ALTER TABLE `reliefdetails`
  MODIFY `ReliefID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

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
