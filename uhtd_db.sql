-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2017 at 10:54 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uhtd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `deptid` varchar(10) NOT NULL,
  `amount` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` varchar(10) NOT NULL,
  `deptname` varchar(10) NOT NULL,
  `buildingno` varchar(10) DEFAULT NULL,
  `buildingname` varchar(50) DEFAULT NULL,
  `campus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `deptname`, `buildingno`, `buildingname`, `campus`) VALUES
('abc1234', 'scis', 'scis1', 'scislecture hall', 'north'),
('xyz123', 'das', 'dasas', 'adsa', 'adsa');

-- --------------------------------------------------------

--
-- Table structure for table `maintaindetail`
--

CREATE TABLE `maintaindetail` (
  `serialno` int(11) NOT NULL,
  `formno` int(11) NOT NULL,
  `partno` varchar(10) NOT NULL,
  `mechanicid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintaindetail`
--

INSERT INTO `maintaindetail` (`serialno`, `formno`, `partno`, `mechanicid`) VALUES
(123123, 12345, '4234', 'alpha');

-- --------------------------------------------------------

--
-- Table structure for table `maintainlog`
--

CREATE TABLE `maintainlog` (
  `formno` int(11) NOT NULL,
  `vehicleid` varchar(10) DEFAULT NULL,
  `description` varchar(10) NOT NULL,
  `initialdate` date NOT NULL,
  `completiondate` date DEFAULT NULL,
  `inspectorid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintainlog`
--

INSERT INTO `maintainlog` (`formno`, `vehicleid`, `description`, `initialdate`, `completiondate`, `inspectorid`) VALUES
(12345, 'wb123', 'dasas', '2017-12-11', '2017-12-12', 'alpha');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `partno` varchar(10) NOT NULL,
  `partname` varchar(20) NOT NULL,
  `quantity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`partno`, `partname`, `quantity`) VALUES
('4234', 'asdsa', '12');

-- --------------------------------------------------------

--
-- Table structure for table `reservevehicle`
--

CREATE TABLE `reservevehicle` (
  `formno` int(11) NOT NULL,
  `staffid` varchar(10) DEFAULT NULL,
  `deptid` varchar(10) DEFAULT NULL,
  `vehicleno` varchar(10) DEFAULT NULL,
  `bookingdate` date NOT NULL,
  `bookingtime` time NOT NULL,
  `destination` varchar(30) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `driverstaffid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservevehicle`
--

INSERT INTO `reservevehicle` (`formno`, `staffid`, `deptid`, `vehicleno`, `bookingdate`, `bookingtime`, `destination`, `purpose`, `driverstaffid`) VALUES
(12345, 'alpha', 'abc1234', 'wb123', '2016-10-07', '11:11:11', 'das', 'asda', 'alpha');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `password`) VALUES
('abc12345', 'dsa'),
('abcd1234d', 'asd'),
('alpha', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `staffdriver`
--

CREATE TABLE `staffdriver` (
  `staffid` varchar(10) DEFAULT NULL,
  `drivinglicense` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffdriver`
--

INSERT INTO `staffdriver` (`staffid`, `drivinglicense`) VALUES
('alpha', 'alpha123'),
('alpha', 'alpha123'),
('abcd1234d', 'sada'),
('abc12345', 'dasd2e23e'),
('abc12345', 'dasd2e23e');

-- --------------------------------------------------------

--
-- Table structure for table `staffinformation`
--

CREATE TABLE `staffinformation` (
  `staffid` varchar(10) DEFAULT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `deptid` varchar(10) DEFAULT NULL,
  `designation` varchar(10) NOT NULL,
  `emailid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffinformation`
--

INSERT INTO `staffinformation` (`staffid`, `firstname`, `lastname`, `deptid`, `designation`, `emailid`) VALUES
('alpha', 'asfsa', 'dasa', 'abc1234', 'das', 'sadas'),
('abc12345', 'das', 'ads', 'abc1234', 'das', 'dsas'),
('abc12345', 'dsa', 'asda', 'abc1234', 'dsa', 'das');

-- --------------------------------------------------------

--
-- Table structure for table `staffmechanic`
--

CREATE TABLE `staffmechanic` (
  `staffid` varchar(10) DEFAULT NULL,
  `traininglevel` int(1) DEFAULT NULL,
  `authoritylevel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffmechanic`
--

INSERT INTO `staffmechanic` (`staffid`, `traininglevel`, `authoritylevel`) VALUES
('alpha', 3, 'basic'),
('alpha', 3, 'basic'),
('abcd1234d', 4, 'basic'),
('abc12345', 0, 'basic'),
('abc12345', 0, 'basic');

-- --------------------------------------------------------

--
-- Table structure for table `tripcompletion`
--

CREATE TABLE `tripcompletion` (
  `formno` int(11) NOT NULL,
  `odometerstar` int(11) NOT NULL,
  `odometerend` int(11) NOT NULL,
  `fuel` int(11) DEFAULT NULL,
  `uhcreditcardno` varchar(16) DEFAULT NULL,
  `complain` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tripcompletion`
--

INSERT INTO `tripcompletion` (`formno`, `odometerstar`, `odometerend`, `fuel`, `uhcreditcardno`, `complain`) VALUES
(12345, 90, 190, 100, '2134765796', 'dasdasDASDAS');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `registrationno` varchar(10) NOT NULL,
  `model` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `booked` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`registrationno`, `model`, `type`, `color`, `booked`) VALUES
('wb12', 'ds', 'dasa', 'adsas', 0),
('wb123', 'pulsar', 'volvo', 'black', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD KEY `fk1_bill_idx` (`deptid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `maintaindetail`
--
ALTER TABLE `maintaindetail`
  ADD PRIMARY KEY (`serialno`),
  ADD KEY `fk1_d_idx` (`formno`),
  ADD KEY `fk2_d_idx` (`partno`),
  ADD KEY `fk3_d_idx` (`mechanicid`);

--
-- Indexes for table `maintainlog`
--
ALTER TABLE `maintainlog`
  ADD PRIMARY KEY (`formno`),
  ADD KEY `fk1_log_idx` (`vehicleid`),
  ADD KEY `fk2_log_idx` (`inspectorid`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`partno`);

--
-- Indexes for table `reservevehicle`
--
ALTER TABLE `reservevehicle`
  ADD PRIMARY KEY (`formno`),
  ADD KEY `fk1_reserve_idx` (`staffid`),
  ADD KEY `fk2_reserve_idx` (`deptid`),
  ADD KEY `fk3_reserve_idx` (`vehicleno`),
  ADD KEY `fk4_reserve_idx` (`driverstaffid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `staffdriver`
--
ALTER TABLE `staffdriver`
  ADD KEY `staffid` (`staffid`);

--
-- Indexes for table `staffinformation`
--
ALTER TABLE `staffinformation`
  ADD KEY `fk1staffinformation` (`staffid`),
  ADD KEY `fk2staffinformation` (`deptid`);

--
-- Indexes for table `staffmechanic`
--
ALTER TABLE `staffmechanic`
  ADD KEY `fk_staffmechanic1` (`staffid`);

--
-- Indexes for table `tripcompletion`
--
ALTER TABLE `tripcompletion`
  ADD KEY `fk1_trip_idx` (`formno`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`registrationno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maintaindetail`
--
ALTER TABLE `maintaindetail`
  MODIFY `serialno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk1_bill` FOREIGN KEY (`deptid`) REFERENCES `department` (`deptid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintaindetail`
--
ALTER TABLE `maintaindetail`
  ADD CONSTRAINT `fk1_d` FOREIGN KEY (`formno`) REFERENCES `maintainlog` (`formno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_d` FOREIGN KEY (`partno`) REFERENCES `part` (`partno`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3_d` FOREIGN KEY (`mechanicid`) REFERENCES `staffmechanic` (`staffid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `maintainlog`
--
ALTER TABLE `maintainlog`
  ADD CONSTRAINT `fk1_log` FOREIGN KEY (`vehicleid`) REFERENCES `vehicle` (`registrationno`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_log` FOREIGN KEY (`inspectorid`) REFERENCES `staffmechanic` (`staffid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservevehicle`
--
ALTER TABLE `reservevehicle`
  ADD CONSTRAINT `fk1_reserve` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_reserve` FOREIGN KEY (`deptid`) REFERENCES `department` (`deptid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3_reserve` FOREIGN KEY (`vehicleno`) REFERENCES `vehicle` (`registrationno`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4_reserve` FOREIGN KEY (`driverstaffid`) REFERENCES `staffdriver` (`staffid`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `staffdriver`
--
ALTER TABLE `staffdriver`
  ADD CONSTRAINT `staffid` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffinformation`
--
ALTER TABLE `staffinformation`
  ADD CONSTRAINT `fk1staffinformation` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2staffinformation` FOREIGN KEY (`deptid`) REFERENCES `department` (`deptid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `staffmechanic`
--
ALTER TABLE `staffmechanic`
  ADD CONSTRAINT `fk_staffmechanic1` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tripcompletion`
--
ALTER TABLE `tripcompletion`
  ADD CONSTRAINT `fk1_trip` FOREIGN KEY (`formno`) REFERENCES `reservevehicle` (`formno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
