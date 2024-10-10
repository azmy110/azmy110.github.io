-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2024 at 03:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `email`, `contact_number`, `created_at`) VALUES
(1, 'Azmy110', 'ojaya418@gmail.com', '1314214', '2024-10-09 16:08:05'),
(2, 'opick', 'azmydrive@gmail.com', '123412', '2024-10-09 16:09:41'),
(3, 'brayen', 'brayen@gmail.com', '13214', '2024-10-09 16:10:22'),
(4, 'cokkk', 'adada@gmail.com', '144144153', '2024-10-09 16:10:37'),
(5, 'ewq', 'azmyhafidh@gmail.com', '21313123', '2024-10-09 16:11:31'),
(6, 'Azmy110', 'azmydrive@gmail.com', '12134', '2024-10-09 16:14:38'),
(7, 'Azmy110', 'ojaya418@gmail.com', '990', '2024-10-09 16:18:13'),
(8, 'Azmy110', 'ojaya418@gmail.com', '082152043828', '2024-10-10 01:39:52'),
(9, 'iam', 'iam@gmail.com', '931293921', '2024-10-10 01:40:22'),
(10, 'ararar', 'azmyhafidh@gmail.com', '1412424', '2024-10-10 01:40:44'),
(11, 'oarioqroqr', 'adada@gmail.com', '332213213', '2024-10-10 01:40:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
