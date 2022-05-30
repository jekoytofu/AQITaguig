-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 08:23 AM
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
-- Database: `aqi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstName` varchar(225) DEFAULT NULL,
  `lastName` varchar(225) DEFAULT NULL,
  `contactNo` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `feedback` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `firstName`, `lastName`, `contactNo`, `email`, `feedback`) VALUES
(1, 'asdf', 'asdf', 'asdf', 'asdf@gasd.cm', 'asdf'),
(2, 'asdf', 'asdf', 'asdf', 'asdf@gasd.cm', 'asdf'),
(3, 'asdfasdg', 'adfgadfhadfg', 'aasdfasdf', 'asdf@gasd.cm', 'sdfgsgfns'),
(4, 'Jester Kyle', 'Sercedillo', 'asdf', 'sercedillo@gmail.com', 'asdfg'),
(5, 'Jester Kyle', 'Sercedillo', 'asdfg', 'sercedillo@gmail.com', 'asdfgasdfg'),
(6, 'Jester Kyle', 'Sercedillo', 'asdasdf', 'sercedillo@gmail.com', 'asdasdfsdg'),
(7, 'Jester Kyle', 'Sercedillo', 'asdfad', 'sercedillo@gmail.com', 'asdfgadfghyj'),
(8, 'Jester Kyle', 'Sercedillo', '09270562704', 'sercedillo@gmail.com', 'HI HIII\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(6) UNSIGNED NOT NULL,
  `sectionName` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sectionName`) VALUES
(1, 'COVID-19 Patient'),
(2, 'Cancer Patient'),
(3, 'Allergy Treatment'),
(4, 'Rehabilitation'),
(5, 'High Blood Pressure'),
(6, 'Medication');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `firstName` varchar(225) DEFAULT NULL,
  `middleInitial` varchar(225) DEFAULT NULL,
  `lastName` varchar(225) DEFAULT NULL,
  `role` varchar(225) DEFAULT NULL,
  `sectionID` varchar(225) DEFAULT NULL,
  `contactNo` varchar(225) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `age` varchar(225) DEFAULT NULL,
  `gender` varchar(225) DEFAULT NULL,
  `civilStatus` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstName`, `middleInitial`, `lastName`, `role`, `sectionID`, `contactNo`, `address`, `age`, `gender`, `civilStatus`) VALUES
(1, 'admin', '-', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', 'admin', '-', '-', '-', '-', '-', '-'),
(11, 'jekoytofu', 'sercedillo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Jester Kyle', 'G', 'Sercedillo', 'user', '6', '09270562704', 'Pateros Street, 9153', '20', 'Male', 'Single'),
(12, 'ayezza', 'ayezzaduterte@gmail.com', '7921903964212cc383bf910a8bf2d7f4', 'Ayezza', 'B.', 'Duterte', 'user', '6', '09282196061', 'taguig city', '20', 'Female', 'Single'),
(14, 'mata', 'mata@gmai.com', 'bfd25cde614505e80754e58d04d516a4', 'John Cedrick', 'H.', 'Mata', 'user', '4', '09897645897', 'Taguig City', '21', 'Male', 'Single'),
(15, 'mama', 'gsercedillo@gmail.com', 'eeafbf4d9b3957b139da7b7f2e7f2d4a', 'Gina', 'G.', 'Sercedillo', 'user', '3', '09798654897', 'Makati City', '53', 'Female', 'Married'),
(16, 'peter', 'psercedillo@gmail.com', '0ac6cd34e2fac333bf0ee3cd06bdcf96', 'Peter', 'S.', 'Sercedillo', 'user', '5', '098726498725', 'Makati City', '60', 'Male', 'Married'),
(17, 'kuya', 'kuya@gmail.com', '7250cec8ba23a9475942b378c2309350', 'Jeffrey', 'G.', 'Sercedillo', 'user', '3', '094987965498', 'Makati City', '30', 'Male', 'Single'),
(42, 'asdasa', 'adsa', 'sdada', 'asdasd', '', '', 'user', '', '', '', '', '', ''),
(43, 'asdasda', 'asdasd', 'asdadas', 'asdasd', '', '', 'user', '', '', '', '', '', ''),
(44, 'asedadsa', 'asdasd', 'rara', 'rara', '', '', 'user', '', '', '', '', '', ''),
(45, 'www', 'asdasd', 'www', 'asdasd', '', '', 'user', '', '', '', '', '', ''),
(46, 'jeeeek', 'jekjek@gmail.com', '123', 'Jericho', '', '', 'user', '', '', '', '', '', ''),
(47, 'asasd', 'asdsad@asdasa.com', 'b5b037a78522671b89a2c1b21d9b80c6', 'Adasd', 'asdas', 'asdas', 'user', '2', '123123213', 'asdasdas', '20', 'Male', 'Married'),
(50, 'jes', 'jester@yahoo.com', '202cb962ac59075b964b07152d234b70', 'Jester', 'G', 'Sercer', 'user', '6', '09123444121', 'Makati City', '21', 'Male', 'Single'),
(51, 'saas', 'asdadada@adasda.com', '123', 'Jester ', '', '', 'user', '', '', '', '', '', ''),
(52, 'jesterr', 'asdada@aasdas.com', '12345', 'jester', '', '', 'user', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
