-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 05:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

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
(5, 'Pagoto Wagon 2', 'Kochi', 0, '2019-04-11'),
(7, 'Pagoto Wagon 2', 'kollam', 1, '2019-04-11'),
(9, 'Pagoto Wagon', 'Angamaly', 1, '2019-04-03'),
(17, 'Pagoto Wagon', 'Kottayam', 0, '2019-04-06'),
(23, 'Pagoto Wagon', 'Wayanad', 0, '2019-04-08');

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
  `dp` varchar(100) DEFAULT NULL,
  `enable_always_logged_in` tinyint(1) NOT NULL DEFAULT '0',
  `last_logged_in` datetime DEFAULT NULL,
  `employee_id` varchar(20) DEFAULT NULL,
  `is_master` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_biller` tinyint(1) NOT NULL DEFAULT '1',
  `aadhar_number` varchar(20) DEFAULT NULL,
  `employement_start_date` date DEFAULT NULL,
  `retired` tinyint(1) NOT NULL DEFAULT '0',
  `emplyement_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `is_active`, `dp`, `enable_always_logged_in`, `last_logged_in`, `employee_id`, `is_master`, `is_admin`, `is_biller`, `aadhar_number`, `employement_start_date`, `retired`, `emplyement_end_date`) VALUES
(1, 'Pagoto Master User', 'pagoto', 'pagoto', 0, 'admin.png', 0, '2019-04-21 05:23:29', 'MASTER', 1, 0, 0, 'MASTER', '2019-04-01', 0, NULL),
(2, 'Aravind R Pillai', 'aravind', 'aravind', 0, '2345678876533456787654.jpg', 0, '2019-04-21 00:00:00', 'P10002', 0, 1, 1, '3345-6654-3456-3443', '2019-04-01', 0, NULL),
(3, 'Rakesh', 'rakesh', 'rakesh', 0, NULL, 0, '2019-04-03 00:00:00', 'P100003', 0, 0, 1, '4545-8767-9878-0098', '2019-04-02', 0, NULL);

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `dp` (`dp`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD UNIQUE KEY `aadhar_number` (`aadhar_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
