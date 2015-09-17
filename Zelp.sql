-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2015 at 12:39 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Zelp`
--

CREATE DATABASE IF NOT EXISTS `Zelp`;
use Zelp;

-- --------------------------------------------------------

--
-- Table structure for table `City`
--

CREATE TABLE IF NOT EXISTS `City` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT 'City Name',
  `zip_code` int(5) DEFAULT NULL COMMENT 'City Zip Code'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `City`
--

INSERT INTO `City` (`id`, `name`, `zip_code`) VALUES
(1, 'Fremont', 94539),
(2, 'Milpitas', 95035),
(3, 'San Jose', 95192);

-- --------------------------------------------------------

--
-- Table structure for table `Cuisine`
--

CREATE TABLE IF NOT EXISTS `Cuisine` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL COMMENT 'Type of Cuisine',
  `description` varchar(160) DEFAULT NULL COMMENT 'Description of Cuisine'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cuisine`
--

INSERT INTO `Cuisine` (`id`, `name`, `description`) VALUES
(1, 'American', 'Examples: Burgers, Hot Dogs, Ribs.'),
(2, 'Chinese', 'Examples: Chow Mein, Fried Rice, Orange Chicken'),
(3, 'Japanese', 'Examples: Chicken Teriyaki,Donburi, Sushi, Sashimi, Udon');

-- --------------------------------------------------------

--
-- Table structure for table `Price_Range`
--

CREATE TABLE IF NOT EXISTS `Price_Range` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'name of price range',
  `lower_bound` decimal(10,0) NOT NULL COMMENT 'lower bound of price range',
  `upper_bound` decimal(10,0) NOT NULL COMMENT 'upper bound of price range'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Price_Range`
--

INSERT INTO `Price_Range` (`id`, `name`, `lower_bound`, `upper_bound`) VALUES
(1, 'inexpensive', '0', '10'),
(2, 'moderate', '10', '20'),
(3, 'Pricey', '20', '35'),
(4, 'Expensive', '35', '50');

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE IF NOT EXISTS `Restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `cuisine_fk` int(11) DEFAULT NULL,
  `city_fk` int(11) DEFAULT NULL,
  `price_range_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`id`, `name`, `cuisine_fk`, `city_fk`, `price_range_fk`) VALUES
(1, 'Pepper Lunch', 3, 2, 2),
(2, 'Five Guys', 1, 1, 1),
(3, 'In N Out', 1, 1, 1),
(4, 'Panda Express', 2, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `City`
--
ALTER TABLE `City`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Cuisine`
--
ALTER TABLE `Cuisine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Price_Range`
--
ALTER TABLE `Price_Range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `City`
--
ALTER TABLE `City`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Cuisine`
--
ALTER TABLE `Cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Price_Range`
--
ALTER TABLE `Price_Range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
