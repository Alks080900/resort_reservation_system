-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2024 at 06:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `session_id`) VALUES
(1, 'alvin', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `bluehouse`
--

CREATE TABLE `bluehouse` (
  `bluehouse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bluehouse`
--

INSERT INTO `bluehouse` (`bluehouse`) VALUES
('Blue House, 1st Floor, Room 101'),
('Blue House, 1st Floor, Room 102'),
('Blue House, 2nd Floor, Room 201'),
('Blue House, 2nd Floor, Room 202');

-- --------------------------------------------------------

--
-- Table structure for table `cbc`
--

CREATE TABLE `cbc` (
  `cbc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cmc`
--

CREATE TABLE `cmc` (
  `cmc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cmc`
--

INSERT INTO `cmc` (`cmc`) VALUES
('Club Manuel Cabin, Cabin 1'),
('Club Manuel Cabin, Cabin 2'),
('Club Manuel Cabin, Cabin 3'),
('Club Manuel Cabin, Cabin 4'),
('Club Manuel Cabin, Cabin 5'),
('Club Manuel Cabin, Cabin 6');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `cms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms`) VALUES
('Club Manuel Suites, 1st Floor, Room 101'),
('Club Manuel Suites, 1st Floor, Room 102'),
('Club Manuel Suites, 1st Floor, Room 103'),
('Club Manuel Suites, 1st Floor, Room 104'),
('Club Manuel Suites, 1st Floor, Room 105'),
('Club Manuel Suites, 1st Floor, Room 106'),
('Club Manuel Suites, 1st Floor, Room 107'),
('Club Manuel Suites, 2nd Floor, Room 201'),
('Club Manuel Suites, 2nd Floor, Room 202'),
('Club Manuel Suites, 2nd Floor, Room 203'),
('Club Manuel Suites, 2nd Floor, Room 204'),
('Club Manuel Suites, 2nd Floor, Room 205'),
('Club Manuel Suites, 2nd Floor, Room 206'),
('Club Manuel Suites, 2nd Floor, Room 207'),
('Club Manuel Suites, 3rd Floor, Room 301'),
('Club Manuel Suites, 3rd Floor, Room 302'),
('Club Manuel Suites, 3rd Floor, Room 303'),
('Club Manuel Suites, 3rd Floor, Room 304'),
('Club Manuel Suites, 3rd Floor, Room 305'),
('Club Manuel Suites, 3rd Floor, Room 306'),
('Club Manuel Suites, 3rd Floor, Room 307');

-- --------------------------------------------------------

--
-- Table structure for table `forestville`
--

CREATE TABLE `forestville` (
  `forestville` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `forestville`
--

INSERT INTO `forestville` (`forestville`) VALUES
('Forestville Suites, 1st Floor, Room 101'),
('Forestville Suites, 1st Floor, Room 102'),
('Forestville Suites, 1st Floor, Room 103'),
('Forestville Suites, 1st Floor, Room 104'),
('Forestville Suites, 1st Floor, Room 105'),
('Forestville Suites, 2nd Floor, Room 206'),
('Forestville Suites, 2nd Floor, Room 207'),
('Forestville Suites, 2nd Floor, Room 208'),
('Forestville Suites, 2nd Floor, Room 209'),
('Forestville Suites, 2nd Floor, Room 210'),
('Forestville Suites, 2nd Floor, Room 211'),
('Forestville Suites, 2nd Floor, Room 212');

-- --------------------------------------------------------

--
-- Table structure for table `forestvillec`
--

CREATE TABLE `forestvillec` (
  `forestvillec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `forestvillec`
--

INSERT INTO `forestvillec` (`forestvillec`) VALUES
('Forestville Cabin (Left), Room 1'),
('Forestville Cabin (Left), Room 2'),
('Forestville Cabin (Left), Room 3'),
('Forestville Cabin (Left), Room 4'),
('Forestville Cabin (Left), Room 5'),
('Forestville Cabin (Right), Room 6'),
('Forestville Cabin (Right), Room 7'),
('Forestville Cabin (Right), Room 8'),
('Forestville Cabin (Right), Room 9'),
('Forestville Cabin (Right), Room 10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cluster` varchar(255) NOT NULL,
  `slot` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `colleague1` varchar(255) DEFAULT NULL,
  `colleague2` varchar(255) DEFAULT NULL,
  `colleague3` varchar(255) DEFAULT NULL,
  `colleague4` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mainplace` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `user_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `am_pm` varchar(6) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
