-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 10:04 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jof-brokerage-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_ID` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `appointment_status` varchar(255) DEFAULT NULL,
  `date_posted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_ID`, `firstname`, `lastname`, `email`, `contact`, `subject`, `message`, `appointment_status`, `date_posted`) VALUES
(1, 'dasdasdsa', 'dasdasdsa', 'dasdsads@gmail.com', '123123123123123', NULL, 'HELLO WORLD!!', NULL, '2020-07-19 06:07:12'),
(2, 'dasdasdsa', 'dasdasdsa', 'dasdsads@gmail.com', '123123123123123', NULL, 'HELLO WORLD!!', NULL, '2020-07-19 06:07:18'),
(3, 'dasdasdsa', 'dasdasdsa', 'dasdsads@gmail.com', '123123123123123', NULL, 'HELLO WORLD!!', NULL, '2020-07-19 06:07:17'),
(4, 'dasdasdsa', 'dasdasdsa', 'dasdsads@gmail.com', '123123123123123', NULL, 'HELLO WORLD!!', NULL, '2020-07-19 06:07:23'),
(5, 'dasdasdsa', 'dasdasdsa', 'dasdsads@gmail.com', '123123123123123', NULL, 'HELLO WORLD!!', NULL, '2020-07-19 06:07:50'),
(6, 'dasdasdsa', 'dasdasdsa', 'dasdsads@gmail.com', '123123123123123', NULL, 'HELLO WORLD!!', NULL, '2020-07-19 06:07:57'),
(8, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:45'),
(9, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:53'),
(10, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:33'),
(11, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:44'),
(12, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:42'),
(13, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:16'),
(14, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:30'),
(15, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:51'),
(16, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:58'),
(17, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:10'),
(18, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:28'),
(19, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:27'),
(20, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:03'),
(21, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:18'),
(22, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:16'),
(23, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:31'),
(24, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:40'),
(25, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:51'),
(26, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 07:07:59'),
(27, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:06'),
(28, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:56'),
(29, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:47'),
(30, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:44'),
(31, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:57'),
(32, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:11'),
(33, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:19'),
(34, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:00'),
(35, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:07'),
(36, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:35'),
(37, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:29'),
(38, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:40'),
(39, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:14'),
(40, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:04'),
(41, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:14'),
(42, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:52'),
(43, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:11'),
(44, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:25'),
(45, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:38'),
(46, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:12'),
(47, 'Achmend The', 'Dead Terrorist', 'suicidebombshell003@gmail.com', '09552151234', NULL, 'HELLO INFIDELS!!!', NULL, '2020-07-19 08:07:40'),
(50, 'Riz Michael', 'Sim', 'rizsim214@gmail.com', '12312312312', 'dasdasdasdasdsa', 'wasssdasdasdasdasasdwqrqwrqwrqw', 'Pending', '2020-08-16 20:08:34'),
(52, 'Riz Michael', 'Sim', 'rizsim214@gmail.com', '12312312312', 'dasdasdasdasdsa', 'wasssdasdasdasdasasdwqrqwrqwrqw', 'Pending', '2020-08-16 20:08:26'),
(53, 'Riz Michael', 'Sim', 'rizsim214@gmail.com', '312312312', 'WASSSUP!!', 'HELLO INFEDELS!!', 'Pending', '2020-08-16 20:08:47'),
(56, 'Riz Michael', 'Sim', 'rizsim214@gmail.com', '09753903302', 'HELLO WORLD!!!', 'DASDASDASDASDASD', 'Unread', '2020-08-27 02:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `consignee_id` varchar(255) NOT NULL,
  `processor_id` varchar(255) NOT NULL,
  `bureau` text NOT NULL,
  `packing` text NOT NULL,
  `commercial` text NOT NULL,
  `bill` text NOT NULL,
  `status` enum('pending','accepted','declined','done','documentation','processing','releasing','delivering') NOT NULL,
  `reason` text DEFAULT NULL,
  `transaction_type` enum('import','export','','') NOT NULL,
  `date_started` varchar(255) NOT NULL,
  `date_ended` varchar(255) NOT NULL,
  `date_posted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_ID` int(11) UNSIGNED NOT NULL,
  `user_role` int(2) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `email_add` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) DEFAULT NULL,
  `register_status` varchar(255) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `date_registered` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_ID`, `user_role`, `company_name`, `company_location`, `first_name`, `last_name`, `user_pass`, `email_add`, `contact_info`, `active_status`, `register_status`, `file_id`, `date_registered`) VALUES
(2, 4, 'UNIVERSITY OF SANCARLOS', 'NASIPIT TALAMBAN', 'riz michael', 'sim', '5f4dcc3b5aa765d61d8327deb882cf99', 'consignee@gmail.com', '1321312312312', NULL, 'pending', NULL, '2020-08-16 16:00:00'),
(5, 4, 'jof brokerage', 'lapu lapu', 'riz', 'sim', '5f4dcc3b5aa765d61d8327deb882cf99', 'consignee123@gmail.com', '12312312312', NULL, 'accepted', NULL, NULL),
(9, 2, 'qweqweqwe', 'qweqweqwe', 'andrei', 'sim', '5f4dcc3b5aa765d61d8327deb882cf99', 'broker@gmail.com', '09123456789', NULL, NULL, NULL, '2020-09-09 22:09:50'),
(11, 1, 'qweqweqwe', 'qweqweqwe', 'wendy', 'satinitigan', '5f4dcc3b5aa765d61d8327deb882cf99', 'consignee@gmail.com', '09753903302', NULL, NULL, NULL, '2020-09-09 22:09:32'),
(12, 1, 'Shelby Guns & Liquor ', 'Bonn, Germany', 'Achmed', 'Terrorist', '5f4dcc3b5aa765d61d8327deb882cf99', 'achmed@gmail.com', '09123456789', NULL, NULL, NULL, '2020-09-09 22:09:23'),
(13, 2, 'jof', 'cebu', 'michael', 'sim', '5f4dcc3b5aa765d61d8327deb882cf99', 'michaelsim@gmail.com', '09753903303', NULL, 'accepted', NULL, '2020-10-04 01:10:32'),
(14, 4, 'jof', 'cebu', 'rizzyD', 'sim', '5f4dcc3b5aa765d61d8327deb882cf99', 'rizsim214@gmail.com', '09753903303', NULL, 'accepted', NULL, '2020-10-04 01:10:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
