-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 08:17 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbill`
--

CREATE TABLE `addbill` (
  `billid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `billname` varchar(200) DEFAULT NULL,
  `billdescrp` text,
  `billdate` date DEFAULT NULL,
  `billamount` decimal(11,2) DEFAULT NULL,
  `gmid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbill`
--

INSERT INTO `addbill` (`billid`, `userid`, `billname`, `billdescrp`, `billdate`, `billamount`, `gmid`, `gid`) VALUES
(5, 1, 'movie ticket', 'hj g jhjih jhjhjkhjh', '2018-04-08', '2000.00', NULL, 1),
(6, 1, 'xcxzcxcxz', 'dsfsdf', '2018-04-06', '5000.00', NULL, 1),
(7, 1, 'dfsdfddsdf', 'fgdfgdfgdf', '2018-04-10', '5000.00', NULL, 1),
(9, 4, 'food bill', 'dsfjsdoif kljokjkodsf llkdf sdf', '2018-04-08', '5000.00', 8, 5),
(10, 4, 'lunch', 'dfhdisfhds skjsalkdjas', '2018-04-09', '8000.00', 9, 5),
(11, 4, 'travelling bill', 'dfsdf dfsd', '2018-04-09', '6000.00', 10, 5),
(12, 1, 'food', 'ssda kdl;ks;ld ;kwkwqe lkl;kqw;e', '2018-04-10', '5600.00', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gid` int(11) NOT NULL,
  `groupname` varchar(200) NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `groupname`, `userid`) VALUES
(1, 'Friendsgroup', 1),
(2, 'Groupnew', 2),
(5, 'Manaligroupnew', 4);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `gmid` int(11) NOT NULL,
  `membername` varchar(200) DEFAULT NULL,
  `sharepercent` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `contactno` bigint(20) DEFAULT NULL,
  `amountpaid` decimal(11,2) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`gmid`, `membername`, `sharepercent`, `gid`, `contactno`, `amountpaid`, `userid`) VALUES
(1, 'Suman', 20, 1, 8956231245, '13.00', 1),
(2, 'Purva', 20, 1, 8956231213, '1000.00', 1),
(3, 'new member', 50, 1, 8945126321, '500.00', 1),
(4, 'test', 20, 1, 9865321445, '2000.00', 1),
(5, 'Sneha', 20, 1, 8956234578, '300.00', 1),
(7, 'Sneha', NULL, 5, 8956231417, '200.00', 4),
(8, 'Suman Sharma', 20, 5, 8956231448, '4800.00', 4),
(9, 'Sujata', 20, 5, 59865321477, '2000.00', 4),
(10, 'Sonali', 30, 5, 89562314585, '1500.00', 4),
(11, 'food', 40, 1, 89563214723, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paidby`
--

CREATE TABLE `paidby` (
  `paidid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `billid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(11) NOT NULL,
  `totalamount` decimal(11,2) DEFAULT NULL,
  `paiddate` date DEFAULT NULL,
  `receiveby` int(11) DEFAULT NULL,
  `paidby` int(11) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `totalamount`, `paiddate`, `receiveby`, `paidby`, `remark`, `userid`) VALUES
(1, '2000.00', '2018-04-08', 7, 8, 'dfsdfsdfsdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `shareratio`
--

CREATE TABLE `shareratio` (
  `shareid` int(11) NOT NULL,
  `sharetype` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `shareamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `registerdate` date NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `mobileno` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `registerdate`, `emailid`, `gender`, `mobileno`) VALUES
(1, 'Suman', 'suman123', '2018-04-01', 'ssharmasumi@gmail.com', 'female', 8956231417),
(2, 'Purva', 'purva123', '2018-04-01', 'prvjoshi04@gmail.com', 'female', 8956231245),
(3, 'nita', 'nita123', '2018-04-08', 'nitajoshi112@gmail.com', 'female', 7814001253),
(4, 'Sneha', 'sneha123', '2018-04-08', 'sneha@gmail.com', 'female', 8956231417);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbill`
--
ALTER TABLE `addbill`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`gmid`);

--
-- Indexes for table `paidby`
--
ALTER TABLE `paidby`
  ADD PRIMARY KEY (`paidid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbill`
--
ALTER TABLE `addbill`
  MODIFY `billid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `gmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `paidby`
--
ALTER TABLE `paidby`
  MODIFY `paidid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
