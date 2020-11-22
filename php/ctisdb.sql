-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 02:11 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `covidtest`
--

CREATE TABLE `covidtest` (
  `testID` int(5) NOT NULL,
  `testDate` date DEFAULT NULL,
  `result` varchar(30) DEFAULT NULL,
  `resultDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `tester_username` varchar(100) NOT NULL,
  `patient_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covidtest`
--

INSERT INTO `covidtest` (`testID`, `testDate`, `result`, `resultDate`, `status`, `tester_username`, `patient_username`) VALUES
(1, NULL, 'negative', '2020-11-17', 'completed', 'Clorfix', 'Dom'),
(2, NULL, 'Positive', '2020-11-17', 'completed', 'Mel', 'Dylan'),
(3, '2020-11-17', NULL, NULL, 'pending', 'Clorfix', 'Melanie'),
(4, '2020-11-17', 'Positive', '2020-11-17', 'completed', 'Mel', 'Ben'),
(5, '2020-11-18', 'in progress', NULL, 'pending', 'Mel', 'John'),
(6, '2020-11-20', 'Positive', '2020-11-20', 'completed', 'Mel', 'Karl'),
(7, '2020-11-20', 'Positive', '2020-11-20', 'completed', 'Mel', 'Michelle');

-- --------------------------------------------------------

--
-- Table structure for table `testcentre`
--

CREATE TABLE `testcentre` (
  `centreID` int(5) NOT NULL,
  `centreName` varchar(50) NOT NULL,
  `manager_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcentre`
--

INSERT INTO `testcentre` (`centreID`, `centreName`, `manager_username`) VALUES
(1, 'Sunway', 'Sam'),
(2, 'Puchong', 'Daniel'),
(3, 'Subang', 'Sam');

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `patientType` varchar(20) DEFAULT NULL,
  `symptoms` varchar(50) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `userType` varchar(30) NOT NULL,
  `registeredBy` varchar(100) DEFAULT NULL,
  `workplace` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `patientType`, `symptoms`, `position`, `userType`, `registeredBy`, `workplace`) VALUES
('Ben', '123', 'Siw', 'Returnee', 'Flu, ', NULL, 'p', 'Mel', NULL),
('Clorfix', 'jacky', 'Jacky Voo', NULL, NULL, NULL, 't', 'Sam', 2),
('Daniel', '123', NULL, NULL, NULL, NULL, 'm', NULL, 2),
('Dom', '1', 'Lee', 'Infected', 'Sore Throat,Dizzy', NULL, 'p', 'Mel', NULL),
('Dylan', '123', 'Chng', 'Suspected', 'Flu, Cough, Fever, Diarrhe ', NULL, 'p', 'Mel', NULL),
('Han123', '123', '1234', NULL, NULL, NULL, 't', 'Sam', 1),
('John', '123', 'John Cena', 'Quarantined', 'Cough, ', NULL, 'p', 'Mel', NULL),
('Karl', '123', 'KarlChoo', 'Infected', 'Flu, Cough, Fever, Sore Throat, ', NULL, 'p', 'Mel', NULL),
('kim', '123', 'kim123', NULL, NULL, NULL, 't', 'Sam', NULL),
('Mel', '1', NULL, NULL, NULL, NULL, 't', 'Sam', 1),
('Melanie', '12345', 'Chng', '0', 'Cough, ', NULL, 'p', 'Mel', NULL),
('Michelle', '123', 'Michelle123', 'Quarantined', 'Flu, Cough, ', NULL, 'p', 'Mel', NULL),
('Sam', '1', NULL, NULL, NULL, NULL, 'm', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covidtest`
--
ALTER TABLE `covidtest`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `covidTest_user_fk2` (`patient_username`),
  ADD KEY `covidTest_user_fk1` (`tester_username`) USING BTREE;

--
-- Indexes for table `testcentre`
--
ALTER TABLE `testcentre`
  ADD PRIMARY KEY (`centreID`),
  ADD KEY `TestCentre_user_fk1` (`manager_username`);

--
-- Indexes for table `testkit`
--
ALTER TABLE `testkit`
  ADD PRIMARY KEY (`kitID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `centre_manager` (`workplace`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covidtest`
--
ALTER TABLE `covidtest`
  MODIFY `testID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testcentre`
--
ALTER TABLE `testcentre`
  MODIFY `centreID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testkit`
--
ALTER TABLE `testkit`
  MODIFY `kitID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `covidtest`
--
ALTER TABLE `covidtest`
  ADD CONSTRAINT `covidTest_user_fk1` FOREIGN KEY (`tester_username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `covidTest_user_fk2` FOREIGN KEY (`patient_username`) REFERENCES `user` (`username`);

--
-- Constraints for table `testcentre`
--
ALTER TABLE `testcentre`
  ADD CONSTRAINT `TestCentre_user_fk1` FOREIGN KEY (`manager_username`) REFERENCES `user` (`username`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `centre_manager` FOREIGN KEY (`workplace`) REFERENCES `testcentre` (`centreID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
