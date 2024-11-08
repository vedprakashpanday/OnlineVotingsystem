-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 12:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` int(20) NOT NULL,
  `votes` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `mobile`, `password`, `age`, `address`, `file`, `role`, `status`, `votes`) VALUES
(1, 'ved prakash', 7301563232, 'Ilove526@', 18, 'Gopalganj', 'ved photo.jpg', 'Voter', 1, 1),
(3, 'ved prakash', 7301563232, 'Ilove526@', 56, 'Uttar Pradesh', 'party2.webp', 'Group', 1, 3),
(5, 'gyan', 7277466374, 'Ilove98@', 27, 'gopalganj', 'party1.png', 'Voter', 1, 1),
(6, 'Ved Prakash Pandey', 7301563231, 'Ilove526@', 18, 'Near Gopalganj Railway Station', 'Screenshot (1).png', 'Voter', 0, 0),
(7, 'Ved Prakash Pandey', 7301563235, 'Ilove526@', 46, 'Near Gopalganj Railway Station', 'Screenshot (3).png', 'Voter', 0, 0),
(8, 'shanti priya', 9801764519, 'Ilove526@', 36, 'siwan', 'Screenshot (7).png', 'Voter', 0, 0),
(9, 'kundan verma', 7651414852, 'Ilove526@#', 26, 'saharsha', 'Screenshot (6).png', 'Voter', 0, 0),
(10, 'ajay mahto', 6645425845, 'Ilove542@', 30, 'begusarai', 'Screenshot (6).png', 'Voter', 0, 0),
(11, 'ajay pandey', 9939645789, 'Ilove789@', 37, 'delhi', 'party2.webp', 'Voter', 0, 0),
(12, 'ajay mahto', 8845677965, 'Iajay88@', 24, 'haryana', '1.jpg', 'Voter', 0, 0),
(13, 'singham ji', 9936524560, 'Ilove123@', 32, 'Near Gopalganj Railway Station', 'Screenshot (8).png', 'Voter', 0, 0),
(14, 'Amzad khan', 9985674123, 'Amzad786@', 31, 'Near Gopalganj Railway Station', 'Screenshot (5).png', 'Voter', 0, 0),
(15, 'gyan prakash', 7979025658, 'Ilove79979@', 36, 'gandhi nagar', '1.jpg', 'Voter', 0, 0),
(17, 'simba', 9965478521, 'Ilove@123', 22, 'hastinapur', 'party1.png', 'Voter', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
