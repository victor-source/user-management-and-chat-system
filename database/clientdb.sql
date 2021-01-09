-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 08:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `PINCODE` int(4) NOT NULL DEFAULT 8080,
  `username` varchar(4) NOT NULL,
  `password` varchar(78) NOT NULL,
  `id` int(11) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`PINCODE`, `username`, `password`, `id`, `avatar`) VALUES
(8080, 'admi', '3903451eee77c5432f737293f5471c7e1ae889ed', 24, 'profile/Capture001.png'),
(8080, 'admi', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 25, 'profile/Capture001.png');

-- --------------------------------------------------------

--
-- Table structure for table `approvedints`
--

CREATE TABLE `approvedints` (
  `id` int(11) NOT NULL,
  `Unique_id` int(11) NOT NULL,
  `bankName` varchar(423) NOT NULL,
  `accountName` varchar(242) NOT NULL,
  `accountNumber` int(11) NOT NULL,
  `phoneNumber` int(14) NOT NULL,
  `ammount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forgots`
--

CREATE TABLE `forgots` (
  `id` int(11) NOT NULL,
  `email` varchar(66) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgots`
--

INSERT INTO `forgots` (`id`, `email`) VALUES
(1, 'vicjohn2018@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `photo` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `interventions`
--

CREATE TABLE `interventions` (
  `id` int(11) NOT NULL,
  `Unique_id` int(11) NOT NULL,
  `bankName` varchar(222) NOT NULL,
  `accountName` varchar(222) NOT NULL,
  `accountNumber` int(11) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `requestDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interventions`
--

INSERT INTO `interventions` (`id`, `Unique_id`, `bankName`, `accountName`, `accountNumber`, `phoneNumber`, `status`, `requestDate`) VALUES
(2, 3936705, 'Wema Bank', 'vicror', 2147483647, 2147483647, 0, '2020-10-18 20:10:00'),
(3, 85725900, 'Wema Bank', 'vicror', 2147483647, 7785877, 1, '2020-11-09 19:30:18'),
(4, 85725902, 'Wema Bank', 'vicror', 2147483647, 2147483647, 1, '2020-11-14 22:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

CREATE TABLE `mess` (
  `id` int(11) NOT NULL,
  `Unique_id` int(11) NOT NULL,
  `msg` varchar(222) NOT NULL,
  `diff` varchar(222) NOT NULL,
  `dated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess`
--

INSERT INTO `mess` (`id`, `Unique_id`, `msg`, `diff`, `dated`) VALUES
(4, 3361348, 'created by sprkite.tech', 'igalatunes.com', 0),
(6, 8572590, 'Your account has been activated.', '', 0),
(7, 8572590, 'your account has been ativated', '', 0),
(8, 0, 'fdfa', '', 0),
(9, 8572590, 'fdfa', '', 0),
(10, 8572590, 'mjbjkkj', '', 0),
(11, 662, 'mmm', '1', 2020),
(12, 662, 'ok\r\n', '1', 2020),
(13, 85725902, 'hey\r\n', '0', 15),
(14, 85725902, 'theheh\r\n', '1', 2020),
(15, 85725902, 'thehe', '0', 18),
(16, 85725902, 'what are ', '1', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `currency` varchar(7) NOT NULL,
  `Value` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `currency`, `Value`, `date`) VALUES
(1, 'Naira', 100, '2020-10-20 20:32:23'),
(2, 'zahra', 1, '2020-10-20 20:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Unique_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `firstname` varchar(111) NOT NULL,
  `RegDate` varchar(222) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Status` int(1) NOT NULL,
  `type` varchar(222) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'profile/avatar.png',
  `Lastname` varchar(111) NOT NULL,
  `transaction` int(11) NOT NULL,
  `phone` int(14) NOT NULL,
  `balance` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `referral` int(11) NOT NULL DEFAULT 0,
  `savings` int(11) NOT NULL DEFAULT 0,
  `reg_fee` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `renewal_date` varchar(556) NOT NULL,
  `locked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Unique_id`, `username`, `email`, `Gender`, `Password`, `firstname`, `RegDate`, `UpdationDate`, `Status`, `type`, `photo`, `Lastname`, `transaction`, `phone`, `balance`, `request`, `referral`, `savings`, `reg_fee`, `reference`, `renewal_date`, `locked`) VALUES
(41, 85725902, 'Attah', 'this@dat.com', '', '88fa846e5f8aa198848be76e1abdcb7d7a42d292', 'Victor', '01-10-2020', '2020-11-16 20:22:03', 1, 'oo', 'profile/person_1.jpg', 'John', 0, 21474836, 0, 0, 0, 500, 0, 188402767, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvedints`
--
ALTER TABLE `approvedints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgots`
--
ALTER TABLE `forgots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interventions`
--
ALTER TABLE `interventions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique_id` (`Unique_id`);

--
-- Indexes for table `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique_id` (`Unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `approvedints`
--
ALTER TABLE `approvedints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgots`
--
ALTER TABLE `forgots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interventions`
--
ALTER TABLE `interventions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mess`
--
ALTER TABLE `mess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
