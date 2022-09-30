-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 07:50 AM
-- Server version: 8.0.30
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`) VALUES
(20, 'rohan', 'rohan@yahoo.com', '$2y$10$eExjE00Xt31os9HMt0iQguCJdFvN7BicRc53I8Lq4.Tqa7qg2Z7A6'),
(22, 'rohan', 'rohan2@yahoo.com', '$2y$10$0nLtOa.rmujPw2BMML8gTefyZLFNSxNPf5GmhB8TxICRL7cbFkR0G'),
(29, 'rohan', 'rohan6@yahoo.com', '$2y$10$qm2X4hImgnXxZYIJIn/J4ukBxt6Oo7.UVZYcDyhWUzBgZfynYhBv6'),
(30, 'rohan', 'rohan@example.com', '$2y$10$VK8bzpAmZz7aOpc618W3auXCuty6Oh80lLixYThSxVOXECp3MfH1G'),
(31, 'rohan', 'rohan@example2.com', '$2y$10$JgdmReslwzaOnTU.FPk2Ze9pFeiBHdLFtWKhdvI1KUBMj2/9g.tFS'),
(32, 'rohan', 'rohan@yahoo321.com', '$2y$10$SxZI0nmGnvmqAIgTKdokde6hGGB8ljgLLhCpkXvzSNwOEB3ktGcQK'),
(33, 'k', 'k@yahoo.com', '$2y$10$5/d4ubfSPPn4UEuO.py2kujBD.uyCHyPbTarApuE9ppE9P6G74a.a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
