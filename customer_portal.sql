-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2017 at 07:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `address`, `city`, `country`, `username`, `password`) VALUES
(1, 'Frederick', 'Carter', '8 Middleton House Burbage Close', 'London', 'UK', 'cartfredri', 'testing'),
(2, 'Andrew', 'Carter', '12 Ivydale Road', 'London', 'UK', 'carts', 'testing'),
(3, 'Shola', 'Femi', '12 Green Cresent', 'London', 'UK', 'jimmy@gmail.com', '$2y$10$All1x5nftq/carXvhaWB2uiOrvoZBH8Xez4HhQQF9xRr918/LK5Ym');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` int(15) NOT NULL,
  `title` varchar(19) NOT NULL,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `passportID` varchar(30) NOT NULL,
  `trip_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `title`, `name`, `surname`, `passportID`, `trip_id`) VALUES
(1, 'Mr', 'David', 'Carr', '201122DSADEFFT', 0),
(2, 'Miss', 'karren', 'Mathews', '224466DDDFFGEER', 0),
(3, 'Dr', 'Phill', 'Jones', '3465745YYUHHR', 0),
(4, 'Mrs', 'Sandra', 'Hines', '2244546OOPPUTT', 0),
(5, 'Mr', 'Daniel', 'Williams', 'WDESDFF22335443', 0);

-- --------------------------------------------------------

--
-- Table structure for table `passengers_trips`
--

CREATE TABLE `passengers_trips` (
  `id` int(15) NOT NULL,
  `passenger_id` int(15) NOT NULL,
  `trip_id` int(15) NOT NULL,
  `passenger_title` varchar(20) NOT NULL,
  `passenger_name` varchar(40) NOT NULL,
  `passenger_surname` varchar(40) NOT NULL,
  `passenger_passportID` varchar(150) NOT NULL,
  `trip_departure` varchar(10) NOT NULL,
  `trip_destination` varchar(10) NOT NULL,
  `trip_departTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trip_destinTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers_trips`
--

INSERT INTO `passengers_trips` (`id`, `passenger_id`, `trip_id`, `passenger_title`, `passenger_name`, `passenger_surname`, `passenger_passportID`, `trip_departure`, `trip_destination`, `trip_departTime`, `trip_destinTime`) VALUES
(1, 2, 3, '', '', '', '', '', '', '2017-04-09 23:04:56', '0000-00-00 00:00:00'),
(2, 1, 4, '', '', '', '', '', '', '2017-04-09 23:37:09', '0000-00-00 00:00:00'),
(3, 3, 5, '', '', '', '', '', '', '2017-04-09 23:39:54', '0000-00-00 00:00:00'),
(4, 4, 5, '', '', '', '', '', '', '2017-04-09 23:50:18', '0000-00-00 00:00:00'),
(5, 5, 6, '', '', '', '', '', '', '2017-04-10 01:48:01', '0000-00-00 00:00:00'),
(6, 1, 2, '', '', '', '', '', '', '2017-04-10 03:40:44', '0000-00-00 00:00:00'),
(7, 2, 2, '', '', '', '', '', '', '2017-04-10 03:40:44', '0000-00-00 00:00:00'),
(8, 3, 2, '', '', '', '', '', '', '2017-04-10 03:40:44', '0000-00-00 00:00:00'),
(9, 4, 2, '', '', '', '', '', '', '2017-04-10 03:40:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(15) NOT NULL,
  `departure` varchar(10) NOT NULL,
  `destination` varchar(10) NOT NULL,
  `departTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `destinTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `passenger_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `departure`, `destination`, `departTime`, `destinTime`, `passenger_id`) VALUES
(1, 'LHR', 'NYC', '2017-04-09 22:37:26', '2017-04-12 04:10:15', 1),
(2, 'LOS', 'ABV', '2017-04-09 22:37:00', '2017-04-11 03:07:00', 4),
(3, 'ABZ', 'AUH', '2017-04-18 20:55:00', '2017-05-28 16:17:00', 2),
(4, 'NYO', 'NZC', '2017-04-09 23:34:00', '2022-06-29 18:18:00', 1),
(5, 'NYC', 'NZY', '2017-04-09 23:38:00', '2017-07-26 19:19:00', 1),
(6, 'PBG', 'PDX', '2017-05-20 19:43:00', '2017-07-27 19:17:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `passengers_trips`
--
ALTER TABLE `passengers_trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `passengers_trips`
--
ALTER TABLE `passengers_trips`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
