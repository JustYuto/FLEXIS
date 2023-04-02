-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 11:46 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

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
  `dsId` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `workLocation` varchar(20) NOT NULL,
  `workHours` varchar(20) NOT NULL,
  `workReport` varchar(225) NOT NULL,
  `supervisorComments` varchar(225) DEFAULT NULL,
  `employeeID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailyschedule`
--

INSERT INTO `dailyschedule` (`dsId`, `date`, `workLocation`, `workHours`, `workReport`, `supervisorComments`, `employeeID`) VALUES
(1, '2023-03-01', 'Office (Flexi hours)', '8:00 a.m. - 4:00 p.m', '', NULL, 'EM001'),
(2, '2023-03-01', 'Home (Work from home', '9:00 a.m. - 5:00 p.m', '', NULL, 'EM003');

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
('DP001', 'HUMAN RESOURCES', 'EM101'),
('DP003', 'Account Department', NULL),
('DP004', 'Business Department', NULL),
('DP005', 'Marketing Department', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `password`, `name`, `email`, `position`, `FWAStatus`, `departmentID`, `supervisorID`) VALUES
('EM001', 'EM001', 'ONE', 'ONEgmail.com', 'Employee', 'New', 'DP001', 'EM009'),
('EM003', 'PS003', 'THREE', 'THREE@gmail.com', 'Employee', 'OLD', 'DP001', 'EM009'),
('EM005', 'PS002', 'TWO', 'TWO@gmail.com', 'Employee', 'New', NULL, 'EM009'),
('EM006', 'EM006', 'jack', 'jack@gmail.com', 'Employee', 'Flexi-hour', 'DP001', 'EM009'),
('EM007', 'EM007', 'andy', 'andy@gmail.com', 'Employee', 'Work from home', 'DP001', 'EM009'),
('EM008', 'EM008', 'winson', 'winson@gmail.com', 'Employee', 'Hybrid', 'DP001', 'EM009'),
('EM009', 'PS009', 'NINE', 'NINE@gmail.com', 'Supervisor', 'OLD', 'DP001', NULL),
('EM013', 'EM013', 'granne', 'granne@gmail.com', 'Employee', 'Work from home', 'DP001', 'EM009'),
('EM101', 'PS101', 'ONEOONE', 'ONEOONE@gmail.com', 'HR Admin', 'OLD', 'DP001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fwa_rquest`
--

CREATE TABLE `fwa_rquest` (
  `requestID` int(11) NOT NULL,
  `requestDate` date NOT NULL DEFAULT current_timestamp(),
  `workType` varchar(30) NOT NULL CHECK (`workType` in ('Flexi-hour','Work-from-home','Hybrid')),
  `description` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `employeeID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fwa_rquest`
--

INSERT INTO `fwa_rquest` (`requestID`, `requestDate`, `workType`, `description`, `reason`, `status`, `comment`, `employeeID`) VALUES
(1, '2023-03-04', 'Hybrid', 'Nothing to report', 'No Reason, just want to change to work form home', 'Accepted', 'no comment', 'EM001'),
(2, '2023-03-20', 'Flexi-hour', 'SSA', ' SAS', 'Accepted', NULL, 'EM003'),
(3, '2023-03-04', 'Flexi-hour', 'das', 'sasas', 'Accepted', 'SAS', 'EM006'),
(6, '2023-03-30', 'Hybrid', 'Blablabla', 'sasa', 'Pending', '', 'EM001'),
(15, '2023-03-30', 'Work-from-home', 'I need to work-from-home', ' I want to go back hometown', 'Pending', NULL, 'EM003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD PRIMARY KEY (`dsId`),
  ADD KEY `Dailyschedule_FK` (`employeeID`);

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
-- AUTO_INCREMENT for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  MODIFY `dsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `Dailyschedule_FK` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
