-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 09:37 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa_feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `Ambience` enum('Excellent','Good','Poor') DEFAULT NULL,
  `Pressure` enum('Excellent','Good','Poor') DEFAULT NULL,
  `Pace` enum('Excellent','Good','Poor') DEFAULT NULL,
  `Therapist` enum('Excellent','Good','Poor') DEFAULT NULL,
  `TheraName` varchar(30) NOT NULL,
  `Satisfaction` enum('Excellent','Good','Poor') NOT NULL,
  `Comment` varchar(100) DEFAULT NULL,
  `Gname` varchar(30) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `RoomNum` varchar(5) NOT NULL,
  `answered_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Ambience`, `Pressure`, `Pace`, `Therapist`, `TheraName`, `Satisfaction`, `Comment`, `Gname`, `Gender`, `RoomNum`, `answered_at`) VALUES
(28, 'Excellent', 'Good', 'Excellent', 'Excellent', 'Nami', 'Excellent', 'Happy', 'Zoro', 'Male', '23', '2024-02-23 17:51:20'),
(29, 'Excellent', 'Good', 'Excellent', 'Excellent', 'Rion', 'Excellent', 'erere', 'gina', 'Male', '224', '2024-03-01 09:24:14'),
(30, 'Poor', 'Poor', 'Good', 'Poor', 'Goku', 'Excellent', 'Back Hurts', 'vegeta', 'Male', '451', '2024-03-01 09:44:20'),
(31, 'Excellent', 'Excellent', 'Good', 'Good', 'Stew', 'Excellent', 'masakit', 'EPi', 'Male', '69', '2024-03-08 12:11:08'),
(32, 'Good', 'Good', 'Poor', 'Poor', 'Jean', 'Excellent', 'afaf', 'Maria', 'Female', '22', '2024-03-15 13:50:02'),
(33, 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Jessa', 'Excellent', '', 'Jirah', 'Female', '250', '2024-04-02 13:13:29'),
(34, 'Poor', 'Poor', 'Good', 'Poor', 'hehe', 'Excellent', 'asgshdg', 'fdhd', 'Female', '22', '2024-04-03 08:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `spaadmin`
--

CREATE TABLE `spaadmin` (
  `username` varchar(255) NOT NULL,
  `passw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spaadmin`
--

INSERT INTO `spaadmin` (`username`, `passw`) VALUES
('Spa_Admin', 'Spa_Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
