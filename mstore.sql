-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 09:19 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `mobile`, `email`, `address`, `status`, `user_id`) VALUES
(1, 'Ali & Co', '03139509600', 'aliandco@gmail.com', 'Mardan, KP', 1, 1),
(3, 'SMT', '03139509690', 'hi2izhar@hotmail.com', 'House No 264, Sector C\r\nSheikh Maltoon Town', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(25) NOT NULL,
  `company_id` int(11) NOT NULL,
  `dated` date NOT NULL,
  `invoice_type` varchar(10) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `company_id`, `dated`, `invoice_type`, `debit`, `credit`, `file`, `notes`, `user_id`) VALUES
(31, '0001', 1, '2021-08-20', 'New', 30000, 50000, 'uploads/logo.png', 'Remaining 20000', 1),
(32, '0001', 1, '2021-08-21', 'New', 20000, 0, 'uploads/logo.png', '', 1),
(33, '0002', 1, '2021-08-21', 'New', 2000, 8000, 'uploads/logo.png', 'pending 4000', 1),
(34, '0002', 1, '2021-08-21', 'New', 2000, 0, 'uploads/logo.png', '', 1),
(35, '0002', 1, '2021-08-22', 'New', 2000, 0, 'uploads/logo.png', '', 1),
(36, '20210822-6457', 1, '2021-08-22', 'New', 1000, 10000, 'uploads/logo.png', 'pending', 1),
(37, '20210822-6457', 1, '2021-08-22', 'New', 1000, 0, 'uploads/logo.png', 'paid rs.1000', 1),
(38, '0003', 1, '2021-08-24', 'New', 5000, 10000, 'uploads/logo.png', '', 1),
(39, '20210824-2926', 1, '2021-08-24', 'New', 2000, 5000, 'uploads/logo.png', '', 1),
(40, '0003', 1, '2021-08-24', 'New', 4000, 0, 'uploads/logo.png', '', 1),
(41, '0002', 1, '2021-08-27', 'New', 1000, 0, 'uploads/logo.png', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `ucompany` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `ucompany`, `role`, `status`) VALUES
(1, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Ali', 'Khan', 'Ali Khan', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
