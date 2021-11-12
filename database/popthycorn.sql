-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 06:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `popthycorn`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_orders` varchar(128) NOT NULL,
  `order_total` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_orders`, `order_total`, `order_date`) VALUES
(1, 69, '[[\"Butter\",\"2\",\"100\"],[\"Cheese\",\"2\",\"120\"]]', 220, '2021-11-12 04:26:39'),
(2, 69, '[[\"Butter\",\"5\",\"250\"],[\"Cheese\",\"5\",\"300\"]]', 550, '2021-11-12 04:27:24'),
(3, 65, '[[\"Butter\",\"3\",\"150\"],[\"Cheese\",\"2\",\"120\"]]', 270, '2021-11-12 04:28:26'),
(4, 65, '[[\"Butter\",\"2\",\"100\"]]', 100, '2021-11-12 04:30:58'),
(5, 10, '[[\"Butter\",\"2\",\"100\"]]', 100, '2021-11-12 05:10:25'),
(6, 8, '[[\"Caramel\",\"1\",\"70\"]]', 70, '2021-11-12 05:10:29'),
(7, 6, '[[\"Butter\",\"2\",\"100\"],[\"Barbeque\",\"3\",\"240\"]]', 340, '2021-11-12 05:11:11'),
(8, 2, '[[\"Butter\",\"5\",\"250\"],[\"Cheese\",\"5\",\"300\"],[\"Caramel\",\"5\",\"350\"],[\"Barbeque\",\"5\",\"400\"]]', 1300, '2021-11-12 05:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `email`, `password`) VALUES
(4, 'john69', 'John', 'Doe', 'johndoe@gmail.com', 'ilovecats');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
