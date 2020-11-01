-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 12:06 PM
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
-- Table structure for table `glossary_table`
--

CREATE TABLE `glossary_table` (
  `glossary_ID` int(11) UNSIGNED NOT NULL,
  `glossary_term` varchar(255) DEFAULT NULL,
  `glossary_meaning` text DEFAULT NULL,
  `date_posted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `glossary_table`
--

INSERT INTO `glossary_table` (`glossary_ID`, `glossary_term`, `glossary_meaning`, `date_posted`) VALUES
(1, 'HELLO WORLDOO', 'WHAT WILL I SAY TO THIS THIS?', '2020-10-26'),
(2, 'BROKER', 'A term used to identify a person responsible for handling the documentation and processing of certain goods that came from the client.', '2020-10-26'),
(3, 'CONSIGNEE', 'A term used to identify the client of the brokerage company', '2020-10-26'),
(4, 'Achmed', 'The suicide bomb terrorist we all love to hate. JUST FOR LAUGHS', '2020-10-26'),
(5, 'CODEIGNITER', 'A php framework used to create this whole application. This framework is just so easy to handle and a very learning curve that even an elementary student can understand.', '2020-10-26'),
(6, 'Try', 'This is just a dummy entry for the purpose of seeing if there will be a pagination appearance', '2020-10-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `glossary_table`
--
ALTER TABLE `glossary_table`
  ADD PRIMARY KEY (`glossary_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glossary_table`
--
ALTER TABLE `glossary_table`
  MODIFY `glossary_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
