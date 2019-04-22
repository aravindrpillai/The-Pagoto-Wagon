-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 09:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagotodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `sequence_util`
--

CREATE TABLE `sequence_util` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `value` bigint(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sequence_util`
--

INSERT INTO `sequence_util` (`id`, `name`, `value`) VALUES
(1, 'employee_id', 11008);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `is_open` tinyint(1) NOT NULL DEFAULT '1',
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `place`, `is_open`, `start_date`) VALUES
(3, 'Pagoto Wagon', 'Kawadiyaar', 1, '2019-02-01'),
(4, 'Pagoto Wagon', 'Kothamangalam', 1, '2019-04-02'),
(5, 'Pagoto Wagon 2', 'Kochi', 1, '2019-04-11'),
(7, 'Pagoto Wagon 2', 'kollam', 1, '2019-04-11'),
(9, 'Pagoto Wagon', 'Angamaly', 1, '2019-04-03'),
(17, 'Pagoto Wagon', 'Kottayam', 0, '2019-04-06'),
(23, 'Pagoto Wagon', 'Wayanad', 0, '2019-04-08'),
(24, 'Pagoto Wagon', 'Yeroor', 1, '2019-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `enable_always_logged_in` tinyint(1) NOT NULL DEFAULT '0',
  `last_logged_in` datetime DEFAULT NULL,
  `employee_id` varchar(20) DEFAULT NULL,
  `is_master` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_biller` tinyint(1) NOT NULL DEFAULT '1',
  `aadhar_number` varchar(20) DEFAULT NULL,
  `employement_start_date` date DEFAULT NULL,
  `retired` tinyint(1) NOT NULL DEFAULT '0',
  `emplyement_end_date` date DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `dp` varchar(100) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `is_active`, `enable_always_logged_in`, `last_logged_in`, `employee_id`, `is_master`, `is_admin`, `is_biller`, `aadhar_number`, `employement_start_date`, `retired`, `emplyement_end_date`, `mobile_number`, `dp`) VALUES
(1, 'Pagoto Master User', 'pagoto', 'pagoto', 0, 0, '2019-04-21 05:23:29', 'MASTER', 1, 0, 0, 'MASTER', '2019-04-01', 0, NULL, '0000000000', 'admin.jpg'),
(2, 'Aravind R Pillai', 'aravind', 'aravind', 0, 0, '2019-04-21 00:00:00', 'P10002', 0, 1, 1, '3345-6654-3456-3443', '2019-04-01', 0, NULL, '9447020535', '2345678876533456787654.jpg'),
(7, 'Yusuf Ali', '11003', '6ity8a', 0, 0, NULL, 'P11003', 0, 0, 1, '2343-4543-2322-1234', '2019-04-02', 0, NULL, '9990009990', 'user.jpg'),
(9, 'Karthik Prakash', '11005', 'tzt87g', 0, 0, NULL, 'P11005', 0, 0, 1, '3333-4444-5555-6666', '2019-04-03', 0, NULL, '8787878787', 'user.jpg'),
(10, 'Yeshu Yahoda', '11008', 's9va2s', 0, 0, NULL, 'P11008', 0, 0, 1, '3345-6654-3456-1001', '2019-04-02', 0, NULL, '9998889997', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sequence_util`
--
ALTER TABLE `sequence_util`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`place`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD UNIQUE KEY `aadhar_number` (`aadhar_number`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sequence_util`
--
ALTER TABLE `sequence_util`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
