-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 09:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `habit_tracker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `habits`
--

CREATE TABLE `habits` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `habit` varchar(50) NOT NULL,
  `goal_time` int(11) NOT NULL,
  `time_given` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `habits`
--

INSERT INTO `habits` (`id`, `username`, `habit`, `goal_time`, `time_given`, `date`) VALUES
(1, 'rahul', 'yoga', 30, 24, '2022-10-23'),
(2, 'rohan', 'yoga', 30, 20, '2022-10-23'),
(4, 'rahul', 'yoga', 30, 24, '2022-10-24'),
(5, 'rohan', 'studying', 60, 60, '2022-10-24'),
(9, 'rahul', 'yoga', 30, 15, '2022-10-25'),
(15, 'rahul', 'swimming', 20, 20, '2022-10-24'),
(16, 'rohan', 'yoga', 30, 15, '2022-10-25'),
(17, 'ssl', 'reading', 60, 50, '2022-10-23'),
(18, 'ssl', 'swimming', 20, 15, '2022-10-24'),
(19, 'rohan', 'yoga', 30, 20, '2022-10-24'),
(20, 'rohan', 'yoga', 30, 15, '2022-10-26'),
(21, 'rohan', 'studying', 60, 20, '2022-10-25'),
(22, 'rohan', 'studying', 60, 60, '2022-10-26'),
(24, 'rohan', 'studying', 60, 20, '2022-10-27'),
(26, 'rohan', 'yoga', 30, 20, '2022-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`) VALUES
(34, 'rohan', 'rohan@example.com', '$2y$10$cF4jI.KTAz.UNj4EwPoVbOHAEWclDeZVnxedK.iuhKtitMgb0wF6.'),
(40, 'rahul', 'rahul@example.com', '$2y$10$Nnelcp2dDE2OR5rddpxrg.6rPwXyvOfjj3De0FcMSrjbYa9gxyUAC'),
(41, 'ssl', 'ssl@example.com', '$2y$10$QTku7Tb0CpD8aJPVFeZNqOEW9uYws1YBkZ/Sx2lfJH1kygXWv4MaO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `habits`
--
ALTER TABLE `habits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `habits`
--
ALTER TABLE `habits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
