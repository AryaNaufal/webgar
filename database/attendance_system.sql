-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 08:10 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `email` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `attendance` varchar(200) NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`email`, `fname`, `lname`, `attendance`, `date_time`) VALUES
('k@gmail.com', 'Muhammad ', 'junaid', 'leave', '2021-08-09'),
('kashi@gmail.com', 'Muhammad ', 'Kashif', 'present', '2021-08-09'),
('ali@gmail.com', 'ali', 'khan', 'absent', '2021-08-09'),
('kamran@gmail.com', 'kamran', 'khan', 'present', '2021-08-09'),
('kashi@gmail.com', 'Muhammad ', 'Kashif', 'absent', '2021-08-10'),
('waleed@gmail.com', 'waleed', 'mughal', 'present', '2021-08-10'),
('k@gmail.com', 'Muhammad ', 'junaid', 'absent', '2021-08-10'),
('kashi@gmail.com', 'Muhammad ', 'Kashif', 'leave', '2021-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `email` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`email`, `fname`, `lname`, `message`, `date_time`) VALUES
('kashi@gmail.com', 'Muhammad ', 'Kashif', 'hi', '2021-08-09'),
('ali@gmail.com', 'ali', 'khan', 'leave', '2021-08-09'),
('k@gmail.com', 'Muhammad ', 'junaid', 'request for leave', '2021-08-10'),
('kashi@gmail.com', 'Muhammad ', 'Kashif', 'i need a leave', '2021-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`name`, `email`, `phone`, `message`, `date_time`) VALUES
('kashif', 'kkkkk@gmail.com', '121212', 'hi i am kashif', '2021-08-08'),
('kashif', 'kkkkk@gmail.com', '121212', 'hi i am kashif', '2021-08-08'),
('zain', 'z@gmail.com', '312', '12asa', '2021-08-08'),
('zain', 'z@gmail.com', '312', '12asa', '2021-08-08'),
('sad2@g.com', 'asda@2gm.com', '2131', 'aa', '2021-08-08'),
('sad2@g.com', 'asda@2gm.com', '2131', 'aa', '2021-08-08'),
('saad', 'sad@gmail.com', '1212', 'saad', '2021-08-08'),
('asd', 'asd@gmail.com', '231', 'hlo', '2021-08-10'),
('asdasd', 'asda@m.com', '22323', 'hi ', '2021-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `password1` varchar(200) NOT NULL,
  `password2` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `age_y` varchar(200) NOT NULL,
  `age_m` varchar(200) NOT NULL,
  `dp` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `fname`, `lname`, `password1`, `password2`, `dob`, `age_y`, `age_m`, `dp`, `gender`, `date_time`) VALUES
('kashi@gmail.com', 'Muhammad ', 'Kashif', '111', '111', '03/01/1998', '23', '5', '234160234_2873619916210165_617227135590208485_n.jpg', 'Male', '2021-08-08'),
('k@gmail.com', 'Muhammad ', 'junaid', '111', '111', '06/06/2018', '3', '2', 'img.jpg', 'Male', '2021-08-08'),
('ali@gmail.com', 'ali', 'khan', '111', '111', '01/07/2000', '21', '7', '234160234_2873619916210165_617227135590208485_n.jpg', 'Male', '2021-08-09'),
('hira@gmail.com', 'hira', 'khan', '111', '111', '07/12/2007', '14', '0', '152Ad.jpg', 'Female', '2021-08-09'),
('arshad@gmail.com', 'arshad', 'arshad', '111', '111', '08/12/2021', '0', '0', '234160234_2873619916210165_617227135590208485_n.jpg', 'Male', '2021-08-09'),
('kamran@gmail.com', 'kamran', 'khan', '111', '111', '06/15/2021', '0', '1', '152Ad.jpg', 'Male', '2021-08-09'),
('waleed@gmail.com', 'waleed', 'mughal', '222', '222', '03/06/1997', '24', '5', 'img.jpg', 'Male', '2021-08-10'),
('rizwan@gmail.com', 'rizwan', 'yousaf', '111', '111', '06/19/2009', '12', '1', '178109439_104619478450462_897619952843610959_n.jpg', 'Male', '2021-08-11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
