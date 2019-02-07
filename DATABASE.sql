-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb17.awardspace.net
-- Generation Time: Feb 07, 2019 at 05:40 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2447752_pinda`
--

-- --------------------------------------------------------

--
-- Table structure for table `PlantDAT`
--

CREATE TABLE `PlantDAT` (
  `id` int(5) NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `water (cm)` varchar(5) NOT NULL,
  `plant (cm)` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PlantDAT`
--

INSERT INTO `PlantDAT` (`id`, `date`, `description`, `water (cm)`, `plant (cm)`) VALUES
(1, '2019-02-06', 'Nothing yet.', '0', '0'),
(2, '2019-02-07', 'Nothing yet.', '0.1', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PlantDAT`
--
ALTER TABLE `PlantDAT`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PlantDAT`
--
ALTER TABLE `PlantDAT`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
