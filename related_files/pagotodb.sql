-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 05:42 AM
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
-- Table structure for table `cups`
--

CREATE TABLE `cups` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cups`
--

INSERT INTO `cups` (`id`, `name`, `image`, `price`, `description`, `shop_id`) VALUES
(4, 'Small', 'f64f1c196a5f61fb1ec08a3a470c4111.jpg', '2.00', 'small cup - 50 ml', 26),
(5, 'Medium ', '4829992aa1f50e6807231def0ca28e05.jpg', '4.00', 'medium cup - 100 ml', 26),
(6, 'Large', '8c4868986bb2bd07ec588fdb7ff1173d.jpg', '6.00', 'large cup - 150 ml', 26);

-- --------------------------------------------------------

--
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_percentage` tinyint(1) NOT NULL DEFAULT '1',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`id`, `name`, `is_percentage`, `amount`, `shop_id`) VALUES
(8, 'GST', 1, '8.00', 26),
(9, 'SMS Charge', 0, '0.45', 26);

-- --------------------------------------------------------

--
-- Table structure for table `icecreams`
--

CREATE TABLE `icecreams` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` varchar(200) DEFAULT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icecreams`
--

INSERT INTO `icecreams` (`id`, `name`, `image`, `price`, `description`, `shop_id`) VALUES
(15, 'Green Apple', '0bce9ebf0d4c7e3e261cadce59e632be.jpg', '40.00', 'Enriched Green Apple', 26),
(16, 'Oceanus Icecream', 'ceb4a54e2eb343d691d5220a19d8c523.jpg', '35.00', 'Salty Ocean Flavour', 26),
(17, 'Mango Crusher', 'fe0e673d81dc251c89e9579f7011f74a.jpg', '50.00', 'Crushed Mango', 26);

-- --------------------------------------------------------

--
-- Table structure for table `optional_charges`
--

CREATE TABLE `optional_charges` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `is_percentage` tinyint(1) NOT NULL DEFAULT '1',
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `optional_charges`
--

INSERT INTO `optional_charges` (`id`, `name`, `amount`, `is_percentage`, `shop_id`) VALUES
(3, 'Tissue Paper', '0.02', 0, 26),
(4, 'Water Bottle', '20.00', 0, 26),
(5, 'Extra Flavour', '4.00', 0, 26),
(6, 'Extra Spoon', '5.00', 0, 26);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_biller` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `shop_id`, `user_id`, `is_admin`, `is_biller`) VALUES
(5, 25, 11, 1, 1),
(6, 26, 11, 1, 1),
(7, 27, 11, 1, 1);

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
(1, 'employee_id', 11009);

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
(25, 'Pagoto Wagon', 'Trivandrum', 1, '2019-04-03'),
(26, 'Pagoto Wagon', 'Bangalore', 1, '2018-04-03'),
(27, 'Pagoto Wagon', 'Hyderabad', 1, '2019-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` varchar(200) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`id`, `name`, `image`, `price`, `description`, `shop_id`) VALUES
(20, 'Choco Roundies', 'ce53e0faa8c2e57e95d556c7c80a8c8b.jpg', '6.00', 'Choco Roundies', 26),
(21, 'Jelly Beans', '9ce7ae595508ef59be8f04d5b078e6ed.jpg', '8.00', 'Jelly Beans', 26);

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
(11, 'Aravind', 'aravind', 'aravind', 0, 0, NULL, 'P11009', 0, 1, 1, '1111-2222-3333-4444', '2019-04-02', 0, NULL, '9447020535', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cups`
--
ALTER TABLE `cups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `icecreams`
--
ALTER TABLE `icecreams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `optional_charges`
--
ALTER TABLE `optional_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`);

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
-- AUTO_INCREMENT for table `cups`
--
ALTER TABLE `cups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `icecreams`
--
ALTER TABLE `icecreams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `optional_charges`
--
ALTER TABLE `optional_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sequence_util`
--
ALTER TABLE `sequence_util`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD CONSTRAINT `extra_charges_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `icecreams`
--
ALTER TABLE `icecreams`
  ADD CONSTRAINT `icecreams_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `optional_charges`
--
ALTER TABLE `optional_charges`
  ADD CONSTRAINT `optional_charges_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `toppings`
--
ALTER TABLE `toppings`
  ADD CONSTRAINT `toppings_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
