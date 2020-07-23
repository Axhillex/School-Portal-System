-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 08:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phonenumber` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Course` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role_Type` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`ID`, `Name`, `Address`, `Phonenumber`, `Photo`, `Course`, `Salary`, `Department`, `Username`, `Password`, `Role_Type`) VALUES
(11, 'ravi', NULL, 'awdawd', 'download.jpg', NULL, NULL, NULL, 'ravi', '7815696ecbf1c96e6894b779456d330e', 'adm'),
(17, 'asdf', 'asdf', '123', 'Untitled.png', 'asdf', NULL, NULL, 'asd', '7815696ecbf1c96e6894b779456d330e', 'std'),
(18, 'qwe', 'qwe', '4567', 'tumblr_2067d7c7075d1e70c94b37dfd702f20b_3ff1dd43_1280.jpg', NULL, '1234', 'qwe', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'tch');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `Role_Type` varchar(3) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`Role_Type`, `Name`) VALUES
('adm', 'Admin'),
('std', 'Student'),
('tch', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `Role_Type` (`Role_Type`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`Role_Type`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `Role_Type` FOREIGN KEY (`Role_Type`) REFERENCES `user_roles` (`role_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
