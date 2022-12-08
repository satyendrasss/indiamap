-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 05:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nic_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `gob_mopng_mnre`
--

CREATE TABLE `gob_mopng_mnre` (
  `id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_code` char(2) NOT NULL,
  `mnre` int(11) NOT NULL DEFAULT 0,
  `mpng` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gob_mopng_mnre`
--

INSERT INTO `gob_mopng_mnre` (`id`, `state_name`, `state_code`, `mnre`, `mpng`) VALUES
(1, 'Andhra Pradesh', 'AP', 5, 2),
(2, 'Chhattisgarh', 'CH', 1, 0),
(3, 'Gujarat', 'GU', 9, 8),
(4, 'Haryana', 'HA', 4, 2),
(5, 'Karnataka', 'KA', 3, 2),
(6, 'Madhya Pradesh', 'MP', 1, 4),
(7, 'Maharashtra', 'MA', 4, 6),
(8, 'Rajasthan', 'RA', 2, 0),
(9, 'Tamil Nadu', 'TN', 1, 4),
(10, 'Telangana', 'TS', 1, 2),
(11, 'Uttar Pradesh', 'UP', 2, 4),
(12, 'Uttarakhand', 'UT', 2, 1),
(13, 'Punjab', 'PU', 0, 2),
(14, 'West Bengal', 'WB', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gob_sbmg_ddws_2018`
--

CREATE TABLE `gob_sbmg_ddws_2018` (
  `id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_code` char(2) NOT NULL,
  `sites_identified` int(11) NOT NULL DEFAULT 0,
  `construction_in_progress` int(11) NOT NULL DEFAULT 0,
  `completed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gob_sbmg_ddws_2018`
--

INSERT INTO `gob_sbmg_ddws_2018` (`id`, `state_name`, `state_code`, `sites_identified`, `construction_in_progress`, `completed`) VALUES
(1, 'Assam', 'AS', 7, 1, 10),
(2, 'Bihar', 'BI', 9, 5, 0),
(3, 'Chhattisgarh', 'CH', 107, 7, 309),
(4, 'Gujarat', 'GU', 0, 37, 1),
(5, 'Haryana', 'HA', 32, 5, 5),
(6, 'Himachal Pradesh', 'HP', 4, 6, 3),
(7, 'Jammu & Kashmir', 'JA', 0, 0, 2),
(8, 'Jharkhand', 'JH', 18, 0, 3),
(9, 'Karnataka', 'KA', 43, 2, 11),
(10, 'Kerala', 'KE', 31, 4, 13),
(11, 'Madhya Pradesh', 'MP', 279, 25, 40),
(12, 'Maharashtra', 'MA', 35, 7, 0),
(13, 'Manipur', 'MN', 0, 0, 0),
(14, 'Mizoram', 'MI', 2, 0, 0),
(15, 'Puducherry', 'PO', 0, 1, 1),
(16, 'Punjab', 'PU', 18, 5, 0),
(17, 'Rajasthan', 'RA', 33, 0, 1),
(18, 'Tamil Nadu', 'TN', 0, 2, 3),
(19, 'Tripura', 'TR', 0, 0, 16),
(20, 'Uttar Pradesh', 'UP', 63, 22, 22),
(21, 'Uttarakhand', 'UT', 2, 2, 4),
(22, 'West Bengal', 'WB', 1, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gob_sbmg_ddws_2022_23`
--

CREATE TABLE `gob_sbmg_ddws_2022_23` (
  `id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_code` char(2) NOT NULL,
  `construction_in_progress` int(11) NOT NULL DEFAULT 0,
  `completed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gob_sbmg_ddws_2022_23`
--

INSERT INTO `gob_sbmg_ddws_2022_23` (`id`, `state_name`, `state_code`, `construction_in_progress`, `completed`) VALUES
(2, 'Bihar', 'BI', 5, 0),
(3, 'Gujarat', 'GU', 37, 1),
(4, 'Haryana', 'HA', 1, 0),
(5, 'Himachal Pradesh', 'HP', 0, 1),
(6, 'Karnataka', 'KA', 2, 2),
(7, 'Madhya Pradesh', 'MP', 25, 30),
(8, 'Maharashtra', 'MA', 7, 0),
(9, 'Puducherry', 'PO', 1, 0),
(10, 'Punjab', 'PU', 5, 0),
(11, 'Tamil Nadu', 'TN', 0, 3),
(12, 'Tripura', 'TR', 0, 6),
(13, 'Uttar Pradesh', 'UP', 16, 3),
(14, 'Uttarakhand', 'UT', 0, 2),
(15, 'West Bengal', 'WB', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gob_mopng_mnre`
--
ALTER TABLE `gob_mopng_mnre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gob_sbmg_ddws_2018`
--
ALTER TABLE `gob_sbmg_ddws_2018`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gob_sbmg_ddws_2022_23`
--
ALTER TABLE `gob_sbmg_ddws_2022_23`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gob_mopng_mnre`
--
ALTER TABLE `gob_mopng_mnre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gob_sbmg_ddws_2018`
--
ALTER TABLE `gob_sbmg_ddws_2018`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gob_sbmg_ddws_2022_23`
--
ALTER TABLE `gob_sbmg_ddws_2022_23`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
