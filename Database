-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 10:48 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE `alogin` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `elogin`
--

CREATE TABLE `elogin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `salary` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elogin`
--

INSERT INTO `elogin` (`id`, `firstname`, `lastname`, `email`, `password`, `birthday`, `gender`, `contact`, `address`, `dept`, `degree`, `salary`) VALUES
(1, 'Ahaan', 'Dabas', 'ahaan@xyz.com', '1234', '2001-12-04', 'Male', '784954875', 'india', 'it', 'M.tech', 120000),
(3, 'Anuj', 'Garg', 'anuj@xyz.com', '1234', '2002-12-12', 'Male', '8457964524', 'india', 'it', 'B.tech', 80000),
(4, 'Ansh', 'Singhal', 'ansh@xyz.com', '1234', '2000-11-12', 'Male', '7485964567', 'india', 'it', 'B.tech', 100000),
(7, 'Govind', 'garg', 'ansh@xyz.com', '1234', '2024-02-09', 'Male', '8457964512', 'india', 'it', 'B.tech', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `lid` int(10) NOT NULL,
  `eid` int(10) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `reason` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`lid`, `eid`, `sdate`, `edate`, `reason`, `status`) VALUES
(1, 1, '2024-01-24', '2024-01-30', 'sick leave', 'Rejected'),
(2, 1, '2024-02-01', '2024-02-04', 'personal reason', 'Rejected'),
(3, 1, '2024-03-10', '2024-03-17', 'holiday', 'Approved'),
(4, 4, '2024-01-31', '2024-02-03', 'sick leave', 'Approved'),
(5, 1, '2024-02-02', '2024-02-06', 'holiday', 'Pending'),
(6, 1, '2024-02-05', '2024-02-01', 'holiday', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pid` int(20) NOT NULL,
  `eid` int(20) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `duedate` date NOT NULL,
  `subdate` date NOT NULL,
  `mark` int(15) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pid`, `eid`, `pname`, `duedate`, `subdate`, `mark`, `status`) VALUES
(1, 1, 'development', '2023-12-26', '2024-01-26', 0, 'Submitted'),
(2, 1, ' development it', '2023-12-27', '2024-01-26', 0, 'Submitted'),
(5, 4, 'game development', '2024-02-10', '2024-01-29', 0, 'Submitted'),
(6, 1, 'web dev', '2024-02-07', '2024-02-01', 0, 'Submitted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `elogin`
--
ALTER TABLE `elogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elogin`
--
ALTER TABLE `elogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `pid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
