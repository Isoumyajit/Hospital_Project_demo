-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 03:26 PM
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
-- Database: `hospital_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PASSWORD` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `NAME`, `EMAIL`, `PASSWORD`) VALUES
(1001, 'SOUMYAJIT', 'soumyo.chak1999@gmail.com', 'chak123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_confirm`
--

CREATE TABLE `appointment_confirm` (
  `ID` int(11) NOT NULL,
  `UID` varchar(30) NOT NULL,
  `DID` varchar(30) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DATE` varchar(30) NOT NULL,
  `TIME` varchar(30) NOT NULL,
  `PAYMENT` varchar(30) NOT NULL,
  `FEE` float(10,2) NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_confirm`
--

INSERT INTO `appointment_confirm` (`ID`, `UID`, `DID`, `doctor`, `NAME`, `DATE`, `TIME`, `PAYMENT`, `FEE`, `booking_time`) VALUES
(86, 'soumyo.chak1999@gmail.com', 'd_005689', 'Soumyajit Chakraborty', 'soumyajit chakraborty', '06/25/2020', '8-10', 'Payment should be given at cli', 580.00, '2020-06-07 10:01:53'),
(87, 'soumyo.chaks1999@gmail.com', 'd_789', 'grahita pal', 'Soumyajit Chakraborty', '06/25/2020', '6-10', 'Payment should be given at cli', 1344.00, '2020-06-07 10:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE `appointment_table` (
  `PID` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DID` varchar(30) NOT NULL,
  `DOCTOR` varchar(30) NOT NULL,
  `DATE` varchar(30) NOT NULL,
  `TIME_BOOK` varchar(30) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `UID` varchar(30) NOT NULL,
  `DID` varchar(30) NOT NULL,
  `BOOKING` varchar(50) NOT NULL,
  `prefered_time` varchar(30) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DID` varchar(50) NOT NULL,
  `IMAGE` varchar(300) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `DEPT` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DID`, `IMAGE`, `NAME`, `ADDRESS`, `EMAIL`, `PHONE`, `DEPT`) VALUES
('d_005689', 'uploads/img159.jpg', 'Soumyajit Chakraborty', '219/23', 'soumyo.chaks1999@gmail.com', 917278939990, 'nurology'),
('d_20010', 'uploads/pubg--for-laptop-or-desktop-wallpaper.jpg', 'Dipesh Pal', 'dipesh r bari naihati te', 'venkey@gmail.com', 7278939990, 'gastroontrology'),
('d_789', 'uploads/52144356_1213876865431600_6357806394250362880_o.jpg', 'grahita pal', '5767/898', 'grahita.05@gmail.com', 917278939990, 'lovely'),
('d_908', '', 'LAzyBong', ' bn hjvhgvghvgv', 'sankarchakraborty2564@gmail.cokiljo', 917278939990, 'physiolokoko'),
('d_90876', 'uploads/857400.jpg', 'soumyajitchakl', '5675t6/909', 'sankarchakraborty25@gmail.com', 7278939990, 'brain');

-- --------------------------------------------------------

--
-- Table structure for table `doctor-date`
--

CREATE TABLE `doctor-date` (
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_dept`
--

CREATE TABLE `doctor_dept` (
  `DOCTOR` varchar(30) NOT NULL,
  `DEPT` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_dept`
--

INSERT INTO `doctor_dept` (`DOCTOR`, `DEPT`) VALUES
('Soumyajit Chakraborty', 'nurology'),
('Soumyajit Chakraborty', 'nurology'),
('Dipesh Pal', 'gastroontrology'),
('LAzyBong', 'physiology'),
('soumyajitchakl', 'brain'),
('grahita pal', 'love committe'),
('grahita pal', 'lovely');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_time`
--

CREATE TABLE `doctor_time` (
  `DID` varchar(30) NOT NULL,
  `DEPT` varchar(30) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `visiting` float(10,2) NOT NULL,
  `days` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_time`
--

INSERT INTO `doctor_time` (`DID`, `DEPT`, `doctor`, `visiting`, `days`, `time`) VALUES
('d_90876', 'brain', 'soumyajitchakl', 890.00, 'Tue,Fri', '8am-10am , 7pm-10pm'),
('d_20010', 'gastroontrology', 'Dipesh Pal', 990.00, 'Sun,Tue,Fri', '10-8pm'),
('d_005689', 'nurology', 'Soumyajit Chakraborty', 580.00, 'Mon,Wed,Sat', '8am-10am '),
('d_789', 'lovely', 'grahita pal', 1344.00, 'Mon,Tue,Wed', '8am-10am ');

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `PID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `GENDER` varchar(1) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`PID`, `NAME`, `ADDRESS`, `GENDER`, `PHONE`, `EMAIL`, `password`, `Date`) VALUES
(2, 'Soumyajit Chakraborty', '219/189121', 'M', 7278939990, 'soumyo.chaks1999@gmail.com', 'e726b16878b830dd08c91a65f33609dc', '2020-06-06 10:50:29'),
(3, 'Dipesh Pal', '223i094i', 'M', 584583495349, 'soumyajit272@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-06 14:47:52'),
(4, 'grahita pal', 'sdcfewfsdvxd', 'F', 934455221, 'grahita.05@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-06-07 04:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `rate_order`
--

CREATE TABLE `rate_order` (
  `DID` varchar(40) NOT NULL,
  `rate` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_order`
--

INSERT INTO `rate_order` (`DID`, `rate`) VALUES
('d_20010', 4.50),
('d_20010', 3.50),
('d_005689', 3.60),
('d_90876', 4.60),
('d_90876', 3.90),
('d_789', 3.60),
('d_789', 3.60),
('d_789', 3.60),
('d_789', 3.60),
('d_005689', 4.10),
('d_789', 3.60);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `UID` varchar(30) NOT NULL,
  `DID` varchar(30) NOT NULL,
  `Feedback` varchar(100) NOT NULL,
  `review` varchar(200) NOT NULL,
  `rate` float(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`UID`, `DID`, `Feedback`, `review`, `rate`) VALUES
('soumyo.chak1999@gmail.com', 'd_20010', 'goooooood ', 'nopepe i love yi u', 4.500),
('soumyajit272@gmail.com', 'd_20010', 'you are goood ', 'i love your ', 2.500),
('soumyajit272@gmail.com', 'd_005689', 'i nkjnjk', 'you are goodnklnk', 3.600),
('grahita.05@gmail.com', 'd_90876', 'very gooood', 'i love you a lot', 4.600),
('soumyo.chak1999@gmail.com', 'd_90876', 'you are good vaiii', 'noiceee brother', 3.300),
('grahita.05@gmail.com', 'd_789', 'Bad!!', 'njknjknkjnjnjn k', 2.300),
('soumyo.chak1999@gmail.com', 'd_789', 'lovelyyyyyyyyy', 'vaiiiiiiiii vaiii', 3.700),
('soumyo.chak1999@gmail.com', 'd_005689', 'huihuihu', 'njnjnjknjknbjnbj', 4.700),
('soumyo.chaks1999@gmail.com', 'd_789', 'knkjnjnjknjnjknk', 'ghjbvhjvhgvhvghvgvghvghgknk', 4.700);

-- --------------------------------------------------------

--
-- Table structure for table `salary_manage`
--

CREATE TABLE `salary_manage` (
  `SID` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DEPT` varchar(40) NOT NULL,
  `DATE` date NOT NULL,
  `CURRENT_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `SID` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `DEPT` varchar(30) NOT NULL,
  `DESIGNATION` varchar(20) NOT NULL,
  `SALARY` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`SID`, `NAME`, `ADDRESS`, `EMAIL`, `PHONE`, `DEPT`, `DESIGNATION`, `SALARY`) VALUES
('s123', 'soumyajitchak', '219/23', 'soumyo.chaks1999@gmail.com', 917278939990, 'vdsvdsvds', 'ghbh', 5677);

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE `test_details` (
  `PID` int(11) NOT NULL,
  `TID` varchar(30) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `ADDRESS` varchar(40) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `TEST` varchar(30) NOT NULL,
  `PAYMENT` varchar(50) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`PID`, `TID`, `NAME`, `ADDRESS`, `PHONE`, `EMAIL`, `TEST`, `PAYMENT`, `DATE`) VALUES
(1, 't_5t6y', 'soumyajitchak', 'DIVDVDSDSV', 917278939990, 'soumyo.chaks1999@gmail.com', 'fvvbvdv', '56776', '2020-06-06 09:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `PID` int(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `COMMENT` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_comments`
--

INSERT INTO `user_comments` (`PID`, `NAME`, `COMMENT`) VALUES
(1, 'SOUMYAJIT', 'I love your hospital is amazing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment_confirm`
--
ALTER TABLE `appointment_confirm`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `test_details`
--
ALTER TABLE `test_details`
  ADD PRIMARY KEY (`PID`),
  ADD UNIQUE KEY `TID` (`TID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `appointment_confirm`
--
ALTER TABLE `appointment_confirm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_details`
--
ALTER TABLE `test_details`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
