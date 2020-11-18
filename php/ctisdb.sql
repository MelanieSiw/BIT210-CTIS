-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2020 at 06:33 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `covidTest`
--

CREATE TABLE `covidTest` (
  `testID` int(5) NOT NULL,
  `testDate` date DEFAULT NULL,
  `result` varchar(30) DEFAULT NULL,
  `resultDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `tester_username` varchar(100) NOT NULL,
  `patient_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covidTest`
--

INSERT INTO `covidTest` (`testID`, `testDate`, `result`, `resultDate`, `status`, `tester_username`, `patient_username`) VALUES
(1, NULL, 'negative', '2020-11-17', 'completed', 'Mel', 'Dom'),
(2, NULL, 'Positive', '2020-11-17', 'completed', 'Mel', 'Dylan'),
(3, '2020-11-17', NULL, NULL, 'pending', 'Mel', 'Melanie'),
(4, '2020-11-17', 'Positive', '2020-11-17', 'completed', 'Mel', 'Ben');

-- --------------------------------------------------------

--
-- Table structure for table `TestCentre`
--

CREATE TABLE `TestCentre` (
  `centreID` int(5) NOT NULL,
  `centreName` varchar(50) NOT NULL,
  `manager_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TestCentre`
--

INSERT INTO `TestCentre` (`centreID`, `centreName`, `manager_username`) VALUES
(1, 'Sunway', 'Sam');

-- --------------------------------------------------------

--
-- Table structure for table `testkit`
--

CREATE TABLE `testkit` (
  `kitID` int(20) NOT NULL,
  `kitName` varchar(100) NOT NULL,
  `stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testkit`
--

INSERT INTO `testkit` (`kitID`, `kitName`, `stock`) VALUES
(6, 'Melanie', 9),
(8, 'ben', 8),
(18, 'ewfewf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `patientType` varchar(20) DEFAULT NULL,
  `symptoms` varchar(50) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `userType` varchar(30) NOT NULL,
  `registeredBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`username`, `password`, `fullname`, `patientType`, `symptoms`, `position`, `userType`, `registeredBy`) VALUES
('Ben', '123', 'Siw', 'Returnee', 'Flu, ', NULL, 'p', 'Mel'),
('Dom', '1', 'Lee', 'Infected', 'Sore Throat,Dizzy', NULL, 'p', 'Mel'),
('Dylan', '123', 'Chng', 'Suspected', 'Flu, Cough, Fever, Diarrhe ', NULL, 'p', 'Mel'),
('Han123', '123', '1234', NULL, NULL, NULL, 't', 'Sam'),
('Mel', '1', NULL, NULL, NULL, NULL, 't', NULL),
('Melanie', '12345', 'Chng', '0', 'Cough, ', NULL, 'p', 'Mel'),
('Sam', '1', NULL, NULL, NULL, NULL, 'm', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covidTest`
--
ALTER TABLE `covidTest`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `covidTest_user_fk2` (`patient_username`),
  ADD KEY `covidTest_user_fk1` (`tester_username`) USING BTREE;

--
-- Indexes for table `TestCentre`
--
ALTER TABLE `TestCentre`
  ADD PRIMARY KEY (`centreID`),
  ADD KEY `TestCentre_user_fk1` (`manager_username`);

--
-- Indexes for table `testkit`
--
ALTER TABLE `testkit`
  ADD PRIMARY KEY (`kitID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covidTest`
--
ALTER TABLE `covidTest`
  MODIFY `testID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `TestCentre`
--
ALTER TABLE `TestCentre`
  MODIFY `centreID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testkit`
--
ALTER TABLE `testkit`
  MODIFY `kitID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `covidTest`
--
ALTER TABLE `covidTest`
  ADD CONSTRAINT `covidTest_user_fk1` FOREIGN KEY (`tester_username`) REFERENCES `User` (`username`),
  ADD CONSTRAINT `covidTest_user_fk2` FOREIGN KEY (`patient_username`) REFERENCES `User` (`username`);

--
-- Constraints for table `TestCentre`
--
ALTER TABLE `TestCentre`
  ADD CONSTRAINT `TestCentre_user_fk1` FOREIGN KEY (`manager_username`) REFERENCES `User` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
