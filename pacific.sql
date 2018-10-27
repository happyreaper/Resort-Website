-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 03:56 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacific`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activityid` int(11) NOT NULL,
  `activityname` varchar(255) NOT NULL,
  `activitydescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activityid`, `activityname`, `activitydescription`) VALUES
(1, 'Hiking', 'Pacific Trails Resort has 5 miles of hiking trails and is adjacent to state park. Go at it alone or join one of our guided tours.'),
(2, 'Kayaking', 'Ocean Kayaks are available for the guests to use.'),
(3, 'Bird Watching', 'While anytime is good time for Bird Watching at Pacific Trails, we offer guided bird watching tripsat sunrise several times a week.'),
(4, 'Trekking', 'Roam the wilderness');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `products` varchar(250) NOT NULL,
  `totalcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `fname`, `lname`, `email`, `products`, `totalcost`) VALUES
(1, 'Mansoor', 'Ali', 'mansoor.abbas@mavs.u', 'Pacific Trails Hiking Guide:6~Yurt Yoga:5~', 244),
(2, 'Mansoor', 'Ali', 'mansoor.abbas@mavs.u', 'Pacific Trails Hiking Guide:2~Yurt Yoga:1~', 65),
(3, 'tony', 'stark', 'tony@stark.com', 'Pacific Trails Hiking Guide:2~Yurt Yoga:1~', 65),
(4, 'abc', 'xyz', 'helo@my.com', 'Pacific Trails Hiking Guide:2~Yurt Yoga:1~', 65),
(7, 'k', 'l', 'k@l.com', 'Pacific Trails Hiking Guide:3~Yurt Yoga:2~', 110),
(8, 'my', 'man', 'my@man.com', 'Pacific Trails Hiking Guide:2~Yurt Yoga:5~', 165);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(11) NOT NULL,
  `fname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) DEFAULT NULL,
  `address` varchar(10) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `resid` int(11) DEFAULT NULL,
  `activityid` int(11) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `fname`, `lname`, `address`, `phone`, `email`, `resid`, `activityid`, `comments`) VALUES
(20, 'Mansoor', 'Ali', 'moon', 6825585096, 'mansoor.abbas@mavs.uta.edu', 18, 1, 'want breakfast'),
(21, 'Harry', 'Potter', 'Hogwarts', 123456789, 'Harry@Potter.com', 19, 2, 'ac room'),
(22, 'Frodo', 'Baggins', 'Shire', 987654321, 'Frodo@Baggins.com', 20, 3, 'sea side '),
(23, 'Percy', 'Jackson', 'olympus', 4545454545, 'percy@jackson.com', 23, 1, 'helo'),
(30, 'bron', 'blackwater', 'road', 4565455645, 'bron@blackwater.com', 30, 1, 'g'),
(31, 'tony', 'stark', 'new york', 6541351357, 'tony@stark.com', 31, 3, 'Buckaroo!'),
(32, 'a', 'b', 'abc', 1111111111, 'a@b.com', 32, 1, 'o'),
(33, 'p', 'q', 'r', 8888888888, 'p@q.com', 33, 1, 'c'),
(34, 'Dora', 'Tou', '', 1234567890, '123@456.com', 34, 1, 'helo'),
(38, 'Jon', 'Snow', 'wall', 1234568794, 'John@snow.com', 41, 3, 'hi'),
(39, 'amy', 'poler', 'a', 1232132135, 'amy@poler.com', 42, 1, 'hi'),
(42, 'jack', 'derida', 'kol', 1232132136, 'jack@derida.com', 45, 4, 'yo'),
(43, 'my', 'man', 'sol', 0, 'my@man.com', 46, 3, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `reservationyurt`
--

CREATE TABLE `reservationyurt` (
  `resid` int(11) NOT NULL,
  `arrival` date DEFAULT NULL,
  `no_ofnights` int(11) DEFAULT NULL,
  `packageid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservationyurt`
--

INSERT INTO `reservationyurt` (`resid`, `arrival`, `no_ofnights`, `packageid`) VALUES
(18, '2018-04-11', 2, 1),
(19, '2018-04-24', 3, 7),
(20, '2018-04-23', 4, 5),
(23, '2018-04-25', 4, 1),
(24, '2018-04-17', 5, 1),
(25, '2018-04-27', 1, 1),
(26, '2018-04-27', 1, 1),
(27, '2018-04-27', 1, 1),
(28, '0000-00-00', 2, 1),
(29, '0000-00-00', 1, 1),
(30, '0000-00-00', 2, 1),
(31, '2018-04-20', 2, 1),
(32, '2018-04-03', 2, 1),
(33, '2018-04-03', 1, 1),
(34, '0000-00-00', 0, 1),
(41, '2018-04-30', 4, 8),
(42, '2018-04-21', 1, 1),
(45, '2018-04-23', 1, 8),
(46, '2018-04-24', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `whenn`
--

CREATE TABLE `whenn` (
  `id` int(11) NOT NULL,
  `dates` date DEFAULT NULL,
  `activityid` int(11) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whenn`
--

INSERT INTO `whenn` (`id`, `dates`, `activityid`, `clientid`) VALUES
(1, '2018-04-30', 1, 30),
(2, '2018-04-18', 3, 31),
(3, '2018-04-20', 1, 32),
(4, '2018-04-29', 1, 33),
(5, '0000-00-00', 1, 34),
(6, '2018-05-02', 3, 38),
(7, '2018-04-21', 1, 39),
(10, '2018-04-25', 4, 42),
(11, '2018-04-27', 3, 43);

-- --------------------------------------------------------

--
-- Table structure for table `yurts`
--

CREATE TABLE `yurts` (
  `pid` int(11) NOT NULL,
  `pname` varchar(15) NOT NULL,
  `pdesc` text NOT NULL,
  `nights` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yurts`
--

INSERT INTO `yurts` (`pid`, `pname`, `pdesc`, `nights`, `cost`) VALUES
(1, 'Weekend Escape', 'Two Breakfasts, a trail map and a snack', 2, 450),
(5, 'Zen Retreat', '33 Breakfasts, a trail map and a pass for daily yoga', 4, 600),
(7, 'Kayak Away', ' Two Breakfasts, two hours of kayak rental daily and a trail map', 2, 500),
(8, 'All-Inlcusive', 'Take part in all the activities- Hiking, Kayaking and all others!', 6, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activityid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`),
  ADD KEY `activityid` (`activityid`),
  ADD KEY `resid` (`resid`);

--
-- Indexes for table `reservationyurt`
--
ALTER TABLE `reservationyurt`
  ADD PRIMARY KEY (`resid`),
  ADD KEY `packageid` (`packageid`);

--
-- Indexes for table `whenn`
--
ALTER TABLE `whenn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activityid` (`activityid`),
  ADD KEY `clientid` (`clientid`);

--
-- Indexes for table `yurts`
--
ALTER TABLE `yurts`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reservationyurt`
--
ALTER TABLE `reservationyurt`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `whenn`
--
ALTER TABLE `whenn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `yurts`
--
ALTER TABLE `yurts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`activityid`) REFERENCES `activities` (`activityid`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`resid`) REFERENCES `reservationyurt` (`resid`);

--
-- Constraints for table `reservationyurt`
--
ALTER TABLE `reservationyurt`
  ADD CONSTRAINT `reservationyurt_ibfk_1` FOREIGN KEY (`packageid`) REFERENCES `yurts` (`pid`);

--
-- Constraints for table `whenn`
--
ALTER TABLE `whenn`
  ADD CONSTRAINT `whenn_ibfk_1` FOREIGN KEY (`activityid`) REFERENCES `activities` (`activityid`),
  ADD CONSTRAINT `whenn_ibfk_2` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
