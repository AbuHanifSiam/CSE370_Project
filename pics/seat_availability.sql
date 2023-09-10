-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 05:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `seat_availability`
--

CREATE TABLE `seat_availability` (
  `Class_ID` varchar(10) NOT NULL,
  `Train_Code` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `seat_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat_availability`
--

INSERT INTO `seat_availability` (`Class_ID`, `Train_Code`, `date`, `seat_count`) VALUES
('101', '1001', '2023-08-23', 10),
('101', '1001', '2023-08-24', 10),
('101', '1001', '2023-08-25', 10),
('101', '1001', '9999-12-31', 10),
('101', '1002', '2023-08-23', 10),
('101', '1002', '2023-08-24', 10),
('101', '1002', '2023-08-25', 10),
('101', '1002', '9999-12-31', 10),
('101', '1003', '2023-08-23', 10),
('101', '1003', '2023-08-24', 10),
('101', '1003', '2023-08-25', 10),
('101', '1003', '9999-12-31', 10),
('101', '1004', '2023-08-23', 10),
('101', '1004', '2023-08-24', 10),
('101', '1004', '2023-08-25', 10),
('101', '1004', '9999-12-31', 10),
('202', '1001', '2023-08-23', 10),
('202', '1001', '2023-08-24', 10),
('202', '1001', '2023-08-25', 10),
('202', '1001', '9999-12-31', 10),
('202', '1002', '2023-08-23', 10),
('202', '1002', '2023-08-24', 10),
('202', '1002', '2023-08-25', 10),
('202', '1002', '9999-12-31', 10),
('202', '1003', '2023-08-23', 10),
('202', '1003', '2023-08-24', 10),
('202', '1003', '2023-08-25', 10),
('202', '1003', '9999-12-31', 10),
('202', '1004', '2023-08-23', 10),
('202', '1004', '2023-08-24', 10),
('202', '1004', '2023-08-25', 10),
('202', '1004', '9999-12-31', 10),
('303', '1001', '2023-08-23', 10),
('303', '1001', '2023-08-24', 10),
('303', '1001', '2023-08-25', 10),
('303', '1001', '9999-12-31', 10),
('303', '1002', '2023-08-23', 10),
('303', '1002', '2023-08-24', 10),
('303', '1002', '2023-08-25', 10),
('303', '1002', '9999-12-31', 10),
('303', '1003', '2023-08-23', 10),
('303', '1003', '2023-08-24', 10),
('303', '1003', '2023-08-25', 10),
('303', '1003', '9999-12-31', 10),
('303', '1004', '2023-08-23', 10),
('303', '1004', '2023-08-24', 10),
('303', '1004', '2023-08-25', 10),
('303', '1004', '9999-12-31', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seat_availability`
--
ALTER TABLE `seat_availability`
  ADD PRIMARY KEY (`Class_ID`,`Train_Code`,`date`),
  ADD KEY `Train_Code` (`Train_Code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seat_availability`
--
ALTER TABLE `seat_availability`
  ADD CONSTRAINT `seat_availability_ibfk_1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_availability_ibfk_2` FOREIGN KEY (`Train_Code`) REFERENCES `train` (`Train_Code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
