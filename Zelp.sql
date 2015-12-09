-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2015 at 08:50 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Zelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `City`
--

CREATE TABLE IF NOT EXISTS `City` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT 'City Name',
  `zip_code` int(5) DEFAULT NULL COMMENT 'City Zip Code'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `City`
--

INSERT INTO `City` (`id`, `name`, `zip_code`) VALUES
(1, 'Fremont', 94539),
(2, 'Milpitas', 95035),
(3, 'San Jose', 95192),
(4, 'Cupertino', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Cuisine`
--

CREATE TABLE IF NOT EXISTS `Cuisine` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL COMMENT 'Type of Cuisine',
  `description` varchar(160) DEFAULT NULL COMMENT 'Description of Cuisine'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cuisine`
--

INSERT INTO `Cuisine` (`id`, `name`, `description`) VALUES
(1, 'American', 'Examples: Burgers, Hot Dogs, Ribs.'),
(2, 'Chinese', 'Examples: Chow Mein, Fried Rice, Orange Chicken'),
(3, 'Japanese', 'Examples: Chicken Teriyaki,Donburi, Sushi, Sashimi, Udon'),
(4, 'Cuban', 'Lechon asado, chicken soup, arroz con pollo'),
(5, 'Soul', 'Fried chicken, jambalaya, catfish'),
(6, 'Italian', 'Pasta, pizza'),
(7, 'Vietnamese', 'Pho, spring rolls');

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
  `price_range_fk` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`id`, `name`, `cuisine_fk`, `city_fk`, `price_range_fk`, `description`) VALUES
(1, 'Pepper Lunch', 3, 2, 2, 'pepper_lunch.html'),
(2, 'Five Guys', 1, 1, 1, 'five_guys.html'),
(3, 'In N Out', 1, 1, 1, 'in_n_out.html'),
(4, 'Panda Express', 2, 3, 1, 'panda_express.html'),
(5, 'Burger King', 1, 3, 1, 'burger_king.html'),
(6, 'Sonoma Chicken Coop', 1, 3, 2, 'sonoma_chicken_coop.html'),
(7, 'Alexander''s Steak House', 1, 4, 4, 'alexanders_steak_house.html'),
(8, 'Pho House', 7, 2, 1, 'pho_house.html'),
(9, 'Los Cubanos Restaurant', 4, 3, 3, 'los_cubanos.html'),
(10, 'Habana Cuba', 4, 3, 3, 'habana_cuba.html');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Cuisine`
--
ALTER TABLE `Cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Price_Range`
--
ALTER TABLE `Price_Range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
