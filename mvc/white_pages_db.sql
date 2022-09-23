-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 08:14 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `white_pages_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `userpassword`, `email`, `status`) VALUES
(8, 'Mazin', '123456', 'hashim_mazin@yahoo.com', 'Admin'),
(9, 'Ahmed', '15684', 'test@gmail.com', 'User'),
(10, 'Waleed', '88558855', 'WaleedSaad@gmail.com', 'User'),
(11, 'Manal', '654321', 'manalalgofary@gmail.com', 'Admin'),
(12, 'Khalid', '09387', 'Khalid09387@gmail.com', 'Admin'),
(13, 'Hashim', '55556666', 'MusaSaad@gmail.com', 'Admin'),
(14, 'ayman', '12345', 'ayman1234@gmail.com', 'Admin'),
(15, 'ayman', '123456', 'ayman1234@gmail.com', 'User'),
(16, 'alhindi', 'admin', 'hind@gmail.com', 'Admin'),
(17, 'mubarak', '12345', 'mbmbnm@gmail.com', 'User'),
(18, 'administrator ', '123456', 'ayman1234@gmail.com', 'Admin'),
(19, 'aaref', '12345678', 'aaref@gmail.com', 'Admin'),
(20, 'Hashim', '888888', 'admin@gmail.com', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `personal_id` int(11) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `jop` varchar(70) NOT NULL,
  `location` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`personal_id`, `fullname`, `phone`, `jop`, `location`) VALUES
(49, 'Hazim', '0912300000', 'Manager', 'Khartoum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`personal_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
