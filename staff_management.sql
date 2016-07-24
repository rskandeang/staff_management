-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2016 at 03:46 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staff_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(11) NOT NULL,
  `day_take_leave` date NOT NULL,
  `time` int(10) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `sal_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `day_take_leave`, `time`, `staff_id`, `sal_id`) VALUES
(1, '2016-07-29', 2, 1, 1),
(2, '2016-07-29', 2, 1, 1),
(5, '2016-07-29', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `sa_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `default_salary` int(11) NOT NULL,
  `debt_salary` int(10) NOT NULL,
  `total_salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`sa_id`, `staff_id`, `default_salary`, `debt_salary`, `total_salary`) VALUES
(1, 1, 300, 10, 290),
(2, 2, 300, 20, 280),
(3, 32, 125, 0, 0),
(4, 33, 125, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position` varchar(25) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('T','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `firstname`, `lastname`, `dob`, `gender`, `position`, `phone`, `email`, `created`, `image`, `status`) VALUES
(1, 'sohour1', 'theung', '2016-07-07', 'Male', 'Internship', '0968100045', 'sohourtheung@gmail.com', '2017-01-01', '5835432754_e2ff53b043_m.jpg', 'F'),
(2, 'sokunthea', 'thoem', '2016-07-19', 'Female', 'Internship', '081254551', 'sokunthea@gmail.com', '0000-00-00', '1456157.jpg', 'T'),
(32, 'sdfs', 'gggg', '2016-07-21', 'sdfsd', 'it', '01652452', 'kolab@gmail.com', '0000-00-00', '4-5-million-lamborghini-veneno_005-720x480-c.jpg', 'T'),
(33, 'mama', 'papa', '2016-07-21', 'Male', 'Female', '01233546', 'katab@gmail.com', '0000-00-00', '4-5-million-lamborghini-veneno_001-720x480-c.jpg', 'T'),
(53, '', '', '0000-00-00', '', '', '', '', '2016-07-22', '', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position` varchar(25) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `salary` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('T','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `dob`, `gender`, `position`, `phone`, `email`, `salary`, `image`, `status`) VALUES
(1, 'test', 'test', 'test', '89c83fe2130ac25957d5928390c616f629492344', '2036-01-01', '', '', '', '', 0, '5peaJPB.png', 'T'),
(2, 'start1', 'start', 'start', '89c83fe2130ac25957d5928390c616f629492344', '2036-01-01', '', '', '', '', 0, 'download.jpg', ''),
(3, 'test1', 'test1', 'test1', '89c83fe2130ac25957d5928390c616f629492344', '2036-01-01', '', '', '', '', 0, 'blurry-nature-background-hd.jpeg', 'F'),
(4, 'fgdfg', 'fdg', 'fgfg', '6bad9332c3a47efa08c94849215f4b615afd74c5', '2016-07-22', '', '', '', '', 111, 'Sea Nature Wallpaper wave_007.jpg', 'F'),
(5, '', '', 'qq', 'd76b3834815cce724f0a735801b8e67655a8b073', '2016-07-22', '', '', '', '', 111, '8-beach-sea-photography.jpg', 'F'),
(6, 'ee', '', 'ee', '6bad9332c3a47efa08c94849215f4b615afd74c5', '2016-07-22', '', '', '', '', 111, '', 'F'),
(7, 'ee', '', 'ee', '6bad9332c3a47efa08c94849215f4b615afd74c5', '2016-07-22', '', '', '', '', 111, '', 'F'),
(8, '', '', 'yy', 'f93ef53b9707310539f6b2f8475faf92cddd9ff7', '2016-07-22', '', '', '', '', 12, '', 'F'),
(9, 'gg', 'gg', 'gg', '986897903092b1a6a88e5b061efa9ca8c86d7866', '2016-07-22', 'F', 'IT', '012345678', 'test@gmail.com', 123, '240472-14060ZK35018.jpg', 'T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
