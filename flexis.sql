-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2023 at 05:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `dailyschedule`
--

CREATE TABLE `dailyschedule` (
  `dailyScheduleID` char(8) NOT NULL,
  `dateWorked` date NOT NULL,
  `workLocation` varchar(20) NOT NULL,
  `workhour` int(11) NOT NULL,
  `workReport` varchar(4000) NOT NULL,
  `supervisorComment` varchar(4000) DEFAULT NULL,
  `startHour` datetime NOT NULL,
  `endHour` datetime NOT NULL,
  `employeeID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dailyschedule`
--

INSERT INTO `dailyschedule` (`dailyScheduleID`, `dateWorked`, `workLocation`, `workhour`, `workReport`, `supervisorComment`, `startHour`, `endHour`, `employeeID`) VALUES
('ds100002', '2022-03-01', 'Office', 4, 'I have had a physical meeting', 'ok', '2022-03-01 10:45:00', '2022-03-01 13:00:00', 'EM001'),
('ds100003', '2020-12-01', 'Home', 10, 'I have worded on conding today but I have not done yet', 'Please keep working on it', '2020-12-01 08:00:00', '2020-12-01 19:00:00', 'EM003'),
('ds100004', '2023-01-17', 'Office', 6, 'I have done to maintain DBMS', 'Thank you', '2023-01-17 12:00:00', '2023-01-17 18:00:00', 'EM005');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` varchar(5) NOT NULL,
  `deptName` varchar(20) NOT NULL,
  `employeeID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `deptName`, `employeeID`) VALUES
('DP001', 'HUMAN RESOURCES', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` varchar(5) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `position` varchar(20) NOT NULL CHECK (`position` in ('Employee','Supervisor','HR Admin')),
  `FWAStatus` varchar(15) NOT NULL,
  `departmentID` varchar(5) DEFAULT NULL,
  `supervisorID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `password`, `name`, `email`, `position`, `FWAStatus`, `departmentID`, `supervisorID`) VALUES
('EM001', 'PS001', 'ONE', 'ONEgmail.com', 'Employee', 'New', 'DP001', 'EM009'),
('EM003', 'PS003', 'THREE', 'THREE@gmail.com', 'Employee', 'OLD', 'DP001', 'EM009'),
('EM005', 'PS002', 'TWO', 'TWO@gmail.com', 'Employee', 'New', NULL, 'EM009'),
('EM009', 'PS009', 'NINE', 'NINE@gmail.com', 'Supervisor', 'OLD', 'DP001', NULL),
('EM101', 'PS101', 'ONEOONE', 'ONEOONE@gmail.com', 'HR Admin', 'OLD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fwa_rquest`
--

CREATE TABLE `fwa_rquest` (
  `requestID` int(11) NOT NULL,
  `requestDate` datetime NOT NULL DEFAULT current_timestamp(),
  `workType` varchar(30) NOT NULL CHECK (`workType` in ('Flexi-hour','Work-from-home','Hybrid')),
  `description` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `employeeID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fwa_rquest`
--

INSERT INTO `fwa_rquest` (`requestID`, `requestDate`, `workType`, `description`, `reason`, `status`, `comment`, `employeeID`) VALUES
(1, '2023-03-04 00:00:00', 'Hybrid', 'Nothing to report', 'No Reason, just want to change to work form home', 'Pending', '', 'EM001'),
(5, '2023-03-20 11:54:19', 'Flexi-hour', 'SSA', ' SAS', 'Pending', NULL, 'EM003'),
(6, '2023-03-20 11:55:54', 'Flexi-hour', ' SM AJKNKSAN', ' BALBAL', 'Pending', NULL, 'EM003'),
(12, '2023-03-30 10:09:49', 'Flexi-hour', 'aa', ' aa', 'Pending', NULL, 'EM009'),
(13, '2023-03-30 10:11:06', 'Flexi-hour', 'XXX', ' XXX', 'Pending', NULL, 'EM001'),
(14, '2023-03-30 10:23:42', 'Flexi-hour', 'aa', ' aaaa', 'Pending', NULL, 'EM001'),
(15, '2023-03-30 23:49:32', 'Flexi-hour', 'AA', ' AAA', 'Pending', NULL, 'EM001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD PRIMARY KEY (`dailyScheduleID`),
  ADD KEY `ds_FK` (`employeeID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fwa_rquest`
--
ALTER TABLE `fwa_rquest`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD CONSTRAINT `ds_FK` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `Dp_FK` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `EMP_FK1` FOREIGN KEY (`supervisorID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
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
