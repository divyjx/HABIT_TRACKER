-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 09:27 AM
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
(1, 'rahul', 'yoga', 30, 20, '2022-11-12'),
(4, 'rahul', 'yoga', 30, 25, '2022-11-11'),
(9, 'rahul', 'yoga', 30, 30, '2022-11-09'),
(15, 'rahul', 'swimming', 20, 45, '2022-10-24'),
(33, 'ssl', 'zero', 90, 45, '2022-11-05'),
(35, 'ssl', 'zero', 90, 1, '2022-11-04'),
(36, 'ssl', 'zero', 90, 2, '2022-11-03'),
(37, 'ssl', 'zero', 90, 4, '2022-11-02'),
(38, 'ssl', 'zero', 90, 1, '2022-11-01'),
(40, 'ssl', 'zero', 90, 20, '2022-11-06'),
(43, 'ssl', 'swim', 100, 10, '2022-11-06'),
(44, 'ssl', 'swim', 100, 20, '2022-11-01'),
(47, 'ssl', 'kuch', 10, 5, '2022-11-06'),
(49, 'ssl', 'sdasa', 1000, 0, '2022-11-06'),
(51, 'ssl', 'zero', 90, 20, '2022-10-15'),
(52, 'ssl', 'dasssss', 100, 0, '2022-11-07'),
(53, 'ssl', 'dasssss', 100, 20, '2022-10-13'),
(54, 'ssl', 'dasssss', 100, 1, '2022-10-20'),
(55, 'ssl', 'zero', 90, 20, '2022-11-07'),
(56, 'ssl', 'kuch', 10, 20, '2022-11-07'),
(57, 'ssl', 'sdasa', 1000, 20, '2022-11-07'),
(58, 'ssl', 'box', 100, 1, '2022-11-03'),
(59, 'ssl', 'tst', 1000, 0, '2022-10-07'),
(60, 'ssl', 'sdasd', 10, 5, '2022-10-29'),
(61, 'ew', 'sdasd', 10, 10, '2022-11-07'),
(62, 'ssl', 'dasssss', 100, 20, '2022-11-08'),
(63, 'ssl', 'zero', 90, 20, '2022-11-08'),
(64, 'ssl', 'tst', 1000, 20, '2022-11-08'),
(65, 'ssl', 'asd11111', 100, 0, '2022-11-08'),
(66, 'ssl', 'swim', 100, 100, '2022-11-08'),
(68, 'rahul', 'yoga', 20, 19, '2022-11-08'),
(69, 'rahul', 'yoga', 30, 15, '2022-11-07'),
(70, 'rahul', 'yoga', 30, 5, '2022-11-06'),
(71, 'rahul', 'yoga', 30, 10, '2022-11-05'),
(72, 'rahul', 'yoga', 30, 10, '2022-11-10'),
(73, 'rahul', 'swimming', 20, 20, '2022-11-12'),
(74, 'rahul', 'swimming', 20, 10, '2022-11-11'),
(75, 'rahul', 'swimming', 20, 0, '2022-11-10'),
(76, 'rahul', 'swimming', 20, 11, '2022-11-09'),
(77, 'rahul', 'swimming', 20, 5, '2022-11-08'),
(78, 'rahul', 'swimming', 20, 6, '2022-11-06'),
(79, 'rahul', 'swimming', 20, 7, '2022-11-07'),
(80, 'rahul', 'reading', 10, 0, '2022-11-12'),
(81, 'rahul', 'cycling', 60, 60, '2022-11-12'),
(82, 'rahul', 'cycling', 60, 58, '2022-11-11'),
(83, 'rahul', 'cycling', 60, 56, '2022-11-10'),
(84, 'rahul', 'cycling', 60, 54, '2022-11-09'),
(85, 'rahul', 'cycling', 60, 52, '2022-11-08'),
(86, 'rahul', 'cycling', 60, 50, '2022-11-07'),
(87, 'rahul', 'cycling', 60, 48, '2022-11-06'),
(88, 'rahul', 'cycling', 60, 46, '2022-11-05'),
(89, 'rahul', 'cycling', 60, 15, '2022-11-04'),
(90, 'rahul', 'cycling', 60, 50, '2022-11-03'),
(91, 'rahul', 'cycling', 60, 60, '2022-11-02'),
(92, 'rahul', 'cycling', 60, 48, '2022-11-01'),
(93, 'rahul', 'cycling', 60, 36, '2022-10-31'),
(94, 'rahul', 'cycling', 60, 34, '2022-10-30'),
(95, 'rahul', 'cycling', 60, 32, '2022-10-29'),
(96, 'rahul', 'cycling', 60, 28, '2022-10-28'),
(97, 'rahul', 'cycling', 60, 30, '2022-10-27'),
(98, 'rahul', 'cycling', 60, 26, '2022-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id_todo` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `task` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `date_todo` date NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`id_todo`, `name`, `task`, `status`, `date_todo`) VALUES
(6, '', 'sda', NULL, '0000-00-00'),
(7, 'ssl', '', 1, '0000-00-00'),
(8, 'ssl', '', NULL, '0000-00-00'),
(9, 'ssl', 'asd', 1, '0000-00-00'),
(28, 'ssl', 'sda', 1, '2022-11-08'),
(29, 'ssl', 'sd', 1, '2022-11-08'),
(30, 'ssl', 'Sxas', 1, '2022-11-08'),
(31, 'ssl', 'ASas', 1, '2022-11-08'),
(32, 'ssl', 'zdfdf', NULL, '2022-11-08'),
(33, 'ssl', 'sdfs', NULL, '2022-11-08'),
(34, 'ssl', 'dasasd', 1, '2022-11-08'),
(35, 'ssl', 'Sdsd', NULL, '2022-11-08'),
(36, 'ssl', 'asdasd', 1, '2022-11-08'),
(37, 'ssl', 'adasd', NULL, '2022-11-08'),
(38, 'ssl', 'asdasd', 1, '2022-11-10'),
(39, 'ssl', 'asdasdda', 1, '2022-11-10'),
(40, 'ssl', 'adasaaa', NULL, '2022-11-10'),
(41, 'ssl', 'adaaaaa', 1, '2022-11-10'),
(42, 'ssl', 'aaaasdaddasd', 1, '2022-11-10'),
(43, 'ssl', 'asdasdasdasd ', 1, '2022-11-10'),
(44, 'ssl', 'asdasdasda', 1, '2022-11-10'),
(45, 'ssl', 'scsds', NULL, '2022-11-10'),
(46, 'ssl', 'sdfsdf', 1, '2022-11-10'),
(47, 'ssl', 'sfdsdf', NULL, '2022-11-10'),
(48, 'ssl', 'asdmal', 1, '2022-11-11'),
(49, 'ssl', 'sda', NULL, '2022-11-11'),
(50, 'ssl', 'csdf', NULL, '2022-11-11'),
(51, 'ssl', 'jsdf4', NULL, '2022-11-11'),
(52, 'ssl', 'reter', NULL, '2022-11-12'),
(53, 'ssl', 'asdasd', NULL, '2022-11-12'),
(54, 'ssl', 'sdasda', 1, '2022-11-12'),
(56, 'rahul', 'shopping', 1, '2022-11-12'),
(57, 'rahul', 'shopping', NULL, '2022-11-12'),
(58, 'rahul', 'bills', NULL, '2022-11-12'),
(59, 'rahul', 'recharge', 1, '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `exp` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `exp`) VALUES
(34, 'rohan', 'rohan@example.com', '$2y$10$cF4jI.KTAz.UNj4EwPoVbOHAEWclDeZVnxedK.iuhKtitMgb0wF6.', 'We must learn to set a goal or target in front of our eyes to gaze upon. It is only when we aim at something that we have any chance of hitting it.'),
(40, 'rahul', 'rahul@example.com', '$2y$10$Nnelcp2dDE2OR5rddpxrg.6rPwXyvOfjj3De0FcMSrjbYa9gxyUAC', 'Real success is a lifetime of learning, successful people have conditioned themselves to learn from others and from their failures and successes, they learn by practising what they know on a daily basis'),
(41, 'ssl', 'ssl@example.com', '$2y$10$QTku7Tb0CpD8aJPVFeZNqOEW9uYws1YBkZ/Sx2lfJH1kygXWv4MaO', 'Successful people know that true education is what you get for yourself and by yourself, it’s not what someone gives or tells you, they know that true success in life does not come by luck, a lucky man is not a successful man, true winners know that they must develop skills and acquire knowledge before becoming truly successful.'),
(42, 'ew', 'ew@example.com', '$2y$10$AfLMorkFK/WrF9thlqFYx.e6ZuR7CE7dLh47DF2pKtZiaq3FgSKxC', 'What you get by achieving your goals is not as important as what you become by achieving your goals.'),
(43, 'some', 'some@example.com', '$2y$10$BZpG9WKcxT0.oRL/Tq5yeOHJI5bQjqaMh5KRADcIVVQNoHCFL7sIS', NULL),
(44, 'ui', '1222@example.com', '$2y$10$lDM4KZeMbOgH2YJLNlOGSu9/qzcl6fKbQOHvFgSAI2qVX6nCD2q6W', NULL),
(47, 'ssl2', 'ssl2@example.com', '$2y$10$amIrJyZymKs4XantyjSy5OQz1FG53EcrHFe3nVUYZaAAcupk/W76K', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `habits`
--
ALTER TABLE `habits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id_todo`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id_todo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
