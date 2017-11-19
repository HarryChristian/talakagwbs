-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 08:24 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waterbilling`
--

-- --------------------------------------------------------

--
-- Table structure for table `commercial_bill`
--

CREATE TABLE `commercial_bill` (
  `cbill_id` int(10) NOT NULL,
  `account_id` int(10) NOT NULL,
  `prev` varchar(20) NOT NULL,
  `pres` varchar(20) NOT NULL,
  `default_amount` decimal(65,2) NOT NULL,
  `first_rate` decimal(65,2) NOT NULL,
  `second_rate` decimal(65,2) NOT NULL,
  `third_rate` decimal(65,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `readingdate` varchar(20) NOT NULL,
  `duedate` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commercial_owners`
--

CREATE TABLE `commercial_owners` (
  `account_id` int(10) NOT NULL,
  `account` varchar(60) NOT NULL,
  `barangay` varchar(60) NOT NULL,
  `meterno` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residential_bill`
--

CREATE TABLE `residential_bill` (
  `rbill_id` int(10) NOT NULL,
  `owners_id` int(10) NOT NULL,
  `prev` int(20) NOT NULL,
  `pres` int(20) NOT NULL,
  `default_amount` decimal(65,2) NOT NULL,
  `first_rate` decimal(65,2) NOT NULL,
  `second_rate` decimal(65,2) NOT NULL,
  `third_rate` decimal(65,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `readingdate` varchar(20) NOT NULL,
  `duedate` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residential_owners`
--

CREATE TABLE `residential_owners` (
  `owners_id` int(10) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `barangay` varchar(60) NOT NULL,
  `meterno` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `first_name` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `last_name`, `first_name`) VALUES
(39, 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN'),
(44, 'TEST', 'TEST', 'TEST', 'TEST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commercial_bill`
--
ALTER TABLE `commercial_bill`
  ADD PRIMARY KEY (`cbill_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `commercial_owners`
--
ALTER TABLE `commercial_owners`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `residential_bill`
--
ALTER TABLE `residential_bill`
  ADD PRIMARY KEY (`rbill_id`),
  ADD KEY `owners_id` (`owners_id`);

--
-- Indexes for table `residential_owners`
--
ALTER TABLE `residential_owners`
  ADD PRIMARY KEY (`owners_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commercial_bill`
--
ALTER TABLE `commercial_bill`
  MODIFY `cbill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `commercial_owners`
--
ALTER TABLE `commercial_owners`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `residential_bill`
--
ALTER TABLE `residential_bill`
  MODIFY `rbill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `residential_owners`
--
ALTER TABLE `residential_owners`
  MODIFY `owners_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
