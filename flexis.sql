-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 09:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flexis`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` varchar(5) NOT NULL,
  `deptName` varchar(20) NOT NULL,
  `employeeID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `deptName`, `employeeID`) VALUES
('DP001', 'HUMAN RESOURCES', NULL),
('DP002', 'SECURITY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` varchar(5) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `position` varchar(20) NOT NULL,
  `FWAStatus` varchar(15) NOT NULL,
  `departmentID` varchar(5) DEFAULT NULL,
  `supervisorID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `password`, `name`, `email`, `position`, `FWAStatus`, `departmentID`, `supervisorID`) VALUES
('EM001', 'PS001', 'ONE', 'ONE@gmail.com', 'Employee', 'New', 'DP001', 'EM009'),
('EM002', 'PS002', 'TWO', 'TWO@gmail.com', 'Employee', 'New', 'DP001', 'EM009'),
('EM009', 'PS003', 'THREE', 'THREE@gmail.com', 'Supervisor', 'New', 'DP001', NULL),
('EM101', 'PS101', 'ONEOONE', 'ONEOONE@gmail.com', 'HR Admin', 'New', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fwa_rquest`
--

CREATE TABLE `fwa_rquest` (
  `requestID` varchar(5) NOT NULL,
  `requestDate` date NOT NULL,
  `workType` varchar(30) NOT NULL CHECK (`workType` in ('Flexi-hour','Work-from-home','Hybrid')),
  `description` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL CHECK (`status` in ('Rejected','Accepted','Pending')),
  `comment` varchar(255) DEFAULT NULL,
  `employeeID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fwa_rquest`
--

INSERT INTO `fwa_rquest` (`requestID`, `requestDate`, `workType`, `description`, `reason`, `status`, `comment`, `employeeID`) VALUES
('RQ001', '2023-03-05', 'Work-from-home', 'Can it be changed?', 'Not well', 'Pending', NULL, 'EM001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`),
  ADD KEY `Dp_FK` (`employeeID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `EMP_FK1` (`supervisorID`),
  ADD KEY `EMP_FK2` (`departmentID`);

--
-- Indexes for table `fwa_rquest`
--
ALTER TABLE `fwa_rquest`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `FWA_Rqu_FK` (`employeeID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `Dp_FK` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `EMP_FK1` FOREIGN KEY (`supervisorID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `EMP_FK2` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fwa_rquest`
--
ALTER TABLE `fwa_rquest`
  ADD CONSTRAINT `FWA_Rqu_FK` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
