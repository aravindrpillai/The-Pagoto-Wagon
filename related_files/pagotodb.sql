-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 06:23 PM
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
-- Table structure for table `icecreams`
--

CREATE TABLE `icecreams` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `description` varchar(200) DEFAULT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icecreams`
--

INSERT INTO `icecreams` (`id`, `name`, `image`, `price`, `description`, `shop_id`) VALUES
(1, 'White Forest', '2345432123.png', '50', 'White Forest Description', 24),
(2, 'Mango Cream', '2345654123.png', '40', 'Mango Description', 24),
(3, 'Soapy Cream', '2345676545.png', '35', 'Soapy Cream', 24),
(4, 'Brownie Brown', '2565432345.png', '60', 'Brownie Brown', 24),
(5, 'Green Apple', '3456543453.png', '80', 'Green Apple Description', 3),
(6, 'Strawberry Cream', '3456765434.png', '100', 'Strawberry Cream Description', 3),
(7, 'Ocean Cream', '5463748576.png', '20', 'Ocean Cream Description', 9),
(8, 'Jackfruit Cream', '5676543253.png', '25', 'Jackfruit cream', 9),
(9, 'Grapes Cream', '6543234543.png', '45', 'Grapes Description', 9);

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
(1, 24, 2, 0, 1),
(2, 9, 2, 1, 1),
(3, 3, 2, 1, 1),
(4, 17, 2, 1, 1);

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
(9, 'Pagoto Wagon', 'Angamaly', 1, '2019-04-03'),
(17, 'Pagoto Wagon', 'Kottayam', 0, '2019-04-06'),
(24, 'Pagoto Wagon', 'Yeroor', 1, '2019-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `description` varchar(200) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`id`, `name`, `image`, `price`, `description`, `shop_id`) VALUES
(1, 'Crispy Horlicks', '23454321234.png', '15', 'Crispy Horlics Description', 17),
(2, 'Oreo', '23456787689.png', '20', 'Oreo', 9),
(3, 'Gems', '32345432345.png', '10', 'Gems Description', 4),
(4, 'Brown Chocolate', '34554323454.png', '18', 'Brown Chocolate Description', 9),
(5, 'Sugar Sprinkle', '39872738483.png', '5', 'Sugar Sprinkle Description', 9),
(6, 'Colour Rock', '45678765678.png', '4', 'Colour Rock Description', 17),
(7, 'Tablets', '65432345654.png', '12', 'Tablets Description', 4),
(8, 'Jelly Beans', '74654738384.png', '9', 'Jelly Beans Description', 4),
(9, 'Chocolate Biscuit', '76456765456.png', '17', 'Chocolate Biscuit Description', 17),
(10, 'Yellow Balls', '76543456789.png', '14', 'Yellow Balls Description', 17),
(11, 'Banana Chips', '87654345674.png', '5', 'Banana Chips Description', 4),
(12, 'Cotton Balls', '98765456788.png', '6', 'Cotton balls description', 17);

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
(2, 'Aravind R Pillai', 'aravind', 'aravind', 0, 0, '2019-04-21 00:00:00', 'P10002', 0, 1, 1, '3345-6654-3456-0001', '2018-04-01', 0, NULL, '9447020535', '2345678876533456787654.jpg'),
(7, 'Yusuf Ali Chekkeri', 'P11003', '6ity8a', 0, 0, NULL, 'P11003', 0, 0, 1, '2343-4543-2322-0009', '2018-04-02', 0, NULL, '9990009999', 'user.jpg'),
(9, 'Karthik Prakash', 'P11005', 'tzt87g', 0, 0, NULL, 'P11005', 0, 0, 1, '3333-4444-5555-6666', '2019-04-03', 0, NULL, '8787878787', 'user.jpg'),
(10, 'Yeshu Yahoda', 'P11008', 's9va2s', 0, 0, NULL, 'P11008', 0, 0, 1, '3345-6654-3456-1001', '2019-04-02', 0, NULL, '9998889997', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `icecreams`
--
ALTER TABLE `icecreams`
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
-- AUTO_INCREMENT for table `icecreams`
--
ALTER TABLE `icecreams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `icecreams`
--
ALTER TABLE `icecreams`
  ADD CONSTRAINT `icecreams_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

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
