-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 10:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

CREATE TABLE `appoinment` (
  `uid` int(100) NOT NULL,
  `D_id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Booking_Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `User_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_id` int(100) NOT NULL,
  `Dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_id`, `Dept_name`) VALUES
(1, 'Neurology'),
(2, 'Oncology');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Id` int(100) NOT NULL,
  `D_id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Dept` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Days` varchar(100) NOT NULL,
  `Time` varchar(100) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Id`, `D_id`, `Name`, `Dept`, `Mail`, `Days`, `Time`, `Rating`) VALUES
(1, 101, 'Dr. Pratap Sen', 'Neurology', 'pratap.sen@gmail.com', 'Monday,Wednesday', '10a.m-11a.m', 0),
(2, 102, 'Dr. Sougata Roy', 'Oncology', 'sougata.roy@gmail.com', 'Thursday,Saturday', '12p.m-1p.m', 0),
(3, 103, 'Dr. Dinesh Goswami', 'Medicine', 'dinesh.goswami@gmail.com', 'Tuesday,Friday', '11a.m-12p.m', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `uid` int(100) NOT NULL,
  `D_id` int(100) NOT NULL,
  `Review` varchar(500) NOT NULL,
  `rateIndex` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`uid`, `D_id`, `Review`, `rateIndex`) VALUES
(60, 0, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(100) NOT NULL,
  `D_id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Booking_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `User_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_id`),
  ADD UNIQUE KEY `Dept_id` (`Dept_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `D_id` (`D_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `Doc_id` (`D_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
