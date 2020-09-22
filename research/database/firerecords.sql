-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2016 at 04:36 AM
-- Server version: 5.0.87
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `firerecords`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE IF NOT EXISTS `admintbl` (
  `staff_id` varchar(20) NOT NULL,
  `firemenpict` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `bdate` date NOT NULL,
  `rank` varchar(225) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `datehired` date NOT NULL,
  `no_street` varchar(40) NOT NULL,
  `barangay` varchar(30) NOT NULL,
  `town` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `account` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY  (`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`staff_id`, `firemenpict`, `username`, `password`, `fname`, `mname`, `lname`, `bdate`, `rank`, `gender`, `civil_status`, `contact_no`, `datehired`, `no_street`, `barangay`, `town`, `province`, `position`, `account`, `reason`) VALUES
('2016-684-999', 'firemen/Prince.png', 'admin', '852c183ef6b74cbb8c371a2572588e83', 'Prince Noren', 'Allas', 'Esquejo', '1996-10-25', 'Inspector', 'Male', 'Single', '09075503295', '2016-11-27', '252', 'Burgos St.', 'Tayug', 'Pangasinan', 'Admin', 'Active', ''),
('2016-285-939', 'firemen/FB_IMG_1478497836534 - Copy.jpg', 'username5511', '6a8f8c2d0c09d56f9dadecfa7014408f', 'Ariel', 'A', 'Baruyaga', '1975-02-10', 'Firemarshall', 'Male', 'Married', '09876465498', '2016-11-29', '123', 'Agno', 'Tayug', 'Pangasinan', 'Staff', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `eventstbl`
--

CREATE TABLE IF NOT EXISTS `eventstbl` (
  `event_id` int(10) NOT NULL auto_increment,
  `edateandtime` datetime NOT NULL,
  `etitle` varchar(100) NOT NULL,
  `eimage_path` varchar(255) NOT NULL,
  `ecaption` varchar(255) NOT NULL,
  PRIMARY KEY  (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `eventstbl`
--

INSERT INTO `eventstbl` (`event_id`, `edateandtime`, `etitle`, `eimage_path`, `ecaption`) VALUES
(5, '2016-11-05 19:50:37', 'Tayug Fire Station Parade', 'news/600718_1652034771717505_1971186278799880101_n.jpg', 'nakilahok ang tfs sa parade ng tayug'),
(6, '2016-11-27 20:37:04', 'tnhs fire prevention ', 'events/13339576_1712117069042608_3095225813574157092_n.jpg', 'nag organisa ang tayug firestation ng isang fire prevention drill sa tayug national high school\r\n'),
(7, '2016-11-27 20:37:41', 'adsfd', 'events/13339576_1712117069042608_3095225813574157092_n.jpg', 'asdfads'),
(8, '2016-11-27 20:50:30', 'dsaf', 'events/13339576_1712117069042608_3095225813574157092_n.jpg', 'dasfads'),
(9, '2016-11-27 21:30:39', 'adsfdas', 'events/600718_1652034771717505_1971186278799880101_n.jpg', 'adsfads');

-- --------------------------------------------------------

--
-- Table structure for table `fireman`
--

CREATE TABLE IF NOT EXISTS `fireman` (
  `fighter_id` varchar(20) NOT NULL,
  `firemenpict` varchar(255) NOT NULL,
  PRIMARY KEY  (`fighter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fireman`
--

INSERT INTO `fireman` (`fighter_id`, `firemenpict`) VALUES
('2016-225-852', 'firemen/FB_IMG_1478497836534 - Copy.jpg'),
('2016-593-727', 'firemen/FB_IMG_1478497836534 - Copy (2).jpg'),
('2016-897-365', 'firemen/FB_IMG_1478497836534 - Copy (3).jpg'),
('2016-901-844', 'firemen/FB_IMG_1478497836534 - Copy (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hydrant`
--

CREATE TABLE IF NOT EXISTS `hydrant` (
  `hydrant_id` int(11) NOT NULL auto_increment,
  `hydrant_name` varchar(255) NOT NULL,
  `hydrant_place` varchar(255) NOT NULL,
  `hydrant_img` varchar(255) NOT NULL,
  `loc_center` varchar(255) NOT NULL,
  PRIMARY KEY  (`hydrant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hydrant`
--

INSERT INTO `hydrant` (`hydrant_id`, `hydrant_name`, `hydrant_place`, `hydrant_img`, `loc_center`) VALUES
(1, 'WATER HYDRANT 1', 'Zaragoza Street', 'hydrants/hydrant1.png', '16.0266416,120.7448985 '),
(2, 'Water Hydrants 2', 'Mabini Street', 'hydrants/hydrant2.png', '16.0281284,120.7472688'),
(3, 'Water Hydrants 3', 'Quezon Street', 'hydrants/hydrant3.png', '16.0275946,120.7454902'),
(4, 'Water Hydrants 4', 'Plaridel Street', 'hydrants/hydrant4.png', '16.0259942,120.7472553'),
(5, 'Water Hydrant 5', 'Tayug to Natividad Rd', 'hydrants/hydrant5.png', '16.0283093,120.7481185'),
(6, 'Water Hydrant 6', 'Tayug to Natividad Rd', 'hydrants/hydrant6.png', '16.0283877,120.7483452');

-- --------------------------------------------------------

--
-- Table structure for table `log_event`
--

CREATE TABLE IF NOT EXISTS `log_event` (
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `activity` varchar(255) NOT NULL,
  PRIMARY KEY  (`date`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_event`
--

INSERT INTO `log_event` (`date`, `time`, `id`, `name`, `position`, `activity`) VALUES
('2016-11-23', '22:39:04', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '22:39:41', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '22:40:44', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '22:43:52', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '23:19:20', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '23:21:12', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '23:26:06', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '23:26:39', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '23:28:20', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-23', '23:28:28', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-24', '08:26:17', '2016-277-103', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '08:26:53', '2016-378-515', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '08:35:12', '2016-31-691', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '08:36:35', '2016-667-10', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '08:40:34', '2016-878-491', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '08:44:00', '2016-879-786', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '08:44:31', '2016-872-26', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '08:45:31', '2016-854-703', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '14:50:12', '2016-182-976', ' ', 'Admin', '  Deactivate Staff ID:2016-454-870'),
('2016-11-24', '14:51:14', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Edited a Report'),
('2016-11-24', '14:51:32', '2016-182-976', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Edited a Report'),
('2016-11-24', '14:56:20', '2016-203-311', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '15:43:29', '2016-707-480', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '15:46:50', '2016-244-803', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '15:55:48', '2016-216-628', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '16:04:22', '2016-298-719', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '16:08:20', '2016-980-52', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '16:10:39', '2016-726-662', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '16:12:49', '2016-415-120', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '16:14:46', '2016-14-708', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '16:19:31', '2016-991-534', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-24', '16:28:21', '2016-991-534', ' ', 'Admin', '  Deactivate Staff ID:2016-535-21'),
('2016-11-24', '16:28:36', '2016-991-534', ' ', 'Admin', '  Deactivate Staff ID:2016-854-703'),
('2016-11-24', '16:47:04', '2016-991-534', 'fname lname', 'Admin', 'fname lname Deactivate Staff ID:2016-454-870'),
('2016-11-24', '16:48:07', '2016-991-534', 'fname lname', 'Admin', 'fname lname Deactivate Staff ID:2016-535-21'),
('2016-11-24', '16:48:28', '2016-991-534', 'fname lname', 'Admin', 'fname lname Reactivate Staff ID:2016-535-21'),
('2016-11-24', '16:48:29', '2016-991-534', 'fname lname', 'Admin', 'fname lname Reactivate Staff ID:2016-535-21'),
('2016-11-24', '22:30:49', '2016-932-578', 'fname lname', 'Admin', 'fname lname Created an Account for Staff'),
('2016-11-24', '22:31:43', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-24', '23:21:25', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-24', '23:21:43', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '08:15:48', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Changed his/her Password'),
('2016-11-25', '08:16:04', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Changed his/her Username'),
('2016-11-25', '09:01:35', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:03:06', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:07:57', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:08:05', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:08:06', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:08:54', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:09:40', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:13:55', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:15:41', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:16:04', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:19:48', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:20:47', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:21:01', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:25:04', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:32:00', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:32:38', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '09:37:22', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated about his/her Information'),
('2016-11-25', '10:41:48', '2016-996-89', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-25', '10:44:01', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Deactivate Staff ID:2016-996-89'),
('2016-11-25', '10:47:31', '2016-495-227', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-25', '10:48:53', '2016-495-227', 'cid beato', 'Staff', 'cid beato Updated about his/her Information'),
('2016-11-25', '10:49:20', '2016-495-227', 'cid beato', 'Staff', 'cid beato Changed his/her Username'),
('2016-11-25', '10:50:16', '2016-495-227', 'cid beato', 'Staff', 'cid beato Changed his/her Password'),
('2016-11-25', '13:00:37', '2016-932-578', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Reactivate Staff ID:2016-996-89'),
('2016-11-27', '14:15:34', '2016-846-132', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-27', '14:45:15', '2016-662-967', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-27', '15:13:37', '2016-323-792', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-27', '18:53:25', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-27', '18:54:05', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Changed his/her Password'),
('2016-11-27', '18:54:24', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Changed his/her Username'),
('2016-11-27', '19:00:20', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Changed his/her Username'),
('2016-11-27', '21:29:17', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Edited a News'),
('2016-11-27', '21:30:02', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Edited a News'),
('2016-11-27', '21:30:39', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Added an Events'),
('2016-11-27', '23:12:05', '2016-735-891', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-28', '11:46:07', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '11:49:27', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '11:50:24', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '11:50:53', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '11:51:03', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '11:51:18', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '11:51:29', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '11:51:38', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '14:35:34', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '14:36:24', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '14:58:26', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '14:59:44', '2016-684-999', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Updated a Mobile Report'),
('2016-11-28', '15:02:09', '2016-840-671', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-28', '21:22:39', '2016-37-832', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff'),
('2016-11-29', '13:20:41', '2016-285-939', 'Prince Noren Esquejo', 'Admin', 'Prince Noren Esquejo Created an Account for Staff');

-- --------------------------------------------------------

--
-- Table structure for table `newstbl`
--

CREATE TABLE IF NOT EXISTS `newstbl` (
  `news_id` int(10) NOT NULL auto_increment,
  `datetime` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` mediumtext NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `newstbl`
--

INSERT INTO `newstbl` (`news_id`, `datetime`, `title`, `image_path`, `caption`) VALUES
(33, '2016-11-05 19:49:52', 'sunog sa trenchera', 'news/1610057_1652333618354287_6621501873564874869_n.jpg', 'natupok ang isang bahay sa trenchera'),
(34, '2016-11-27 20:35:28', 'sunog sa trenchera', 'news/1610057_1652333618354287_6621501873564874869_n.jpg', 'Tinupok ng napakalakas na apon ang bahay sa trenchera, sanhi umano ay ang tinapong sigarillo'),
(35, '2016-11-27 20:37:54', 'dsafdas', 'news/13339576_1712117069042608_3095225813574157092_n.jpg', 'adsf'),
(36, '2016-11-27 21:23:52', 'adf', 'news/1610057_1652333618354287_6621501873564874869_n.jpg', 'asdfs'),
(37, '2016-11-27 21:29:17', 'essd', 'news/13339576_1712117069042608_3095225813574157092_n.jpg', 'sfdsfd'),
(38, '2016-11-27 21:30:02', 'adsfda', 'news/13339576_1712117069042608_3095225813574157092_n.jpg', 'asdfads');

-- --------------------------------------------------------

--
-- Table structure for table `occupancy`
--

CREATE TABLE IF NOT EXISTS `occupancy` (
  `id` int(11) NOT NULL auto_increment,
  `occupancy_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `occupancy`
--

INSERT INTO `occupancy` (`id`, `occupancy_name`) VALUES
(1, 'Residential'),
(2, 'Industrial/Factory'),
(5, 'Commercial/Mercantile'),
(6, 'Storage'),
(7, 'Mixed Type Occupancy'),
(8, 'Business Type/Government Offices'),
(9, 'Educational'),
(10, 'Institutional'),
(11, 'Places of Assembly'),
(12, 'Miscellanious/Others'),
(13, 'Post/Grass/Rubbish and Forest'),
(14, 'whatever');

-- --------------------------------------------------------

--
-- Table structure for table `origin`
--

CREATE TABLE IF NOT EXISTS `origin` (
  `origin_id` int(11) NOT NULL auto_increment,
  `origin_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`origin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `origin`
--

INSERT INTO `origin` (`origin_id`, `origin_name`) VALUES
(1, 'Electrical Connections'),
(2, 'Electrical Appliances'),
(3, 'Electrical Machineries'),
(4, 'Spontaneous Combustion'),
(5, 'Open Flame Due to Unattended LPG Cooking/Stove'),
(6, 'Open Flame Due to Torch or Sulo'),
(7, 'Open Flame Due to Unattended Lighted Candle or Gasera'),
(8, 'LPG Explosion Due to Direct Flame/Heat Contact'),
(9, 'Static Electricity'),
(10, 'Lighted Cigarette Butt'),
(11, 'Chemicals'),
(12, 'Pyrotechnics'),
(13, 'Lighted Matchstick or Lighter'),
(14, 'Incendiary Device'),
(15, 'Mechanism or Ignited'),
(16, 'Flammable Liquid/Others'),
(17, 'Lightning/Direct Heat from Sunlight'),
(18, 'Bomb Explosion'),
(19, 'Garbage Burning'),
(20, 'Undetermined'),
(21, 'Others/Under Invistigation');

-- --------------------------------------------------------

--
-- Table structure for table `recordstbl`
--

CREATE TABLE IF NOT EXISTS `recordstbl` (
  `reportno` int(11) NOT NULL auto_increment,
  `dateandtime` date NOT NULL,
  `time` time NOT NULL,
  `house_no` int(11) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `involveestablishments` varchar(50) NOT NULL,
  `investigator` varchar(255) NOT NULL,
  `casualty` int(11) NOT NULL,
  `injured` int(11) NOT NULL,
  `fireout` time NOT NULL,
  `causeoffire` varchar(255) NOT NULL,
  `statusofcaseammount` varchar(50) NOT NULL,
  PRIMARY KEY  (`reportno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `recordstbl`
--

INSERT INTO `recordstbl` (`reportno`, `dateandtime`, `time`, `house_no`, `street`, `barangay`, `involveestablishments`, `investigator`, `casualty`, `injured`, `fireout`, `causeoffire`, `statusofcaseammount`) VALUES
(16, '2016-11-09', '01:00:00', 213, 'alimasag', 'Barangay Legaspi', 'Resedential', 'FO3 Janice G. Ruizan', 12, 21, '23:58:00', 'Incendiary Device', '2100'),
(19, '2016-11-10', '10:00:00', 123, 'plaridel', 'Barangay D', 'Resedential', 'FO1 Jan Kristoffer D. Mamaril', 0, 0, '11:00:00', 'Mechanism or Ignited', '10000'),
(25, '2016-11-10', '11:58:00', 12345, 'plaridel', 'Barangay B', 'Resedential', 'CINSP Arthur L. Sawate', 12, 1, '22:58:00', 'Mechanism or Ignited', '23000');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `slide_id` int(10) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY  (`slide_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slide_id`, `title`, `image_path`, `caption`, `datetime`) VALUES
(14, 'sunog sa trenchera', 'news/1610057_1652333618354287_6621501873564874869_n.jpg', 'natupok ang isang bahay sa trenchera', '2016-11-05 19:49:52'),
(15, 'Tayug Fire Station Parade', 'events/600718_1652034771717505_1971186278799880101_n.jpg', 'nakilahok ang Tayug Fire Station sa Parade', '2016-11-05 19:50:37'),
(16, 'sunog sa trenchera', 'news/1610057_1652333618354287_6621501873564874869_n.jpg', 'Tinupok ng napakalakas na apon ang bahay sa trenchera, sanhi umano ay ang tinapong sigarillo', '2016-11-27 20:35:28'),
(17, 'tnhs fire prevention ', 'events/13339576_1712117069042608_3095225813574157092_n.jpg', 'nag organisa ang tayug firestation ng isang fire prevention drill sa tayug national high school\r\n', '2016-11-27 20:37:04'),
(18, 'adsfd', 'events/13339576_1712117069042608_3095225813574157092_n.jpg', 'asdfads', '2016-11-27 20:37:41'),
(19, 'dsafdas', 'news/13339576_1712117069042608_3095225813574157092_n.jpg', 'adsf', '2016-11-27 20:37:54'),
(20, 'dsaf', 'events/13339576_1712117069042608_3095225813574157092_n.jpg', 'dasfads', '2016-11-27 20:50:30'),
(21, 'adf', 'news/1610057_1652333618354287_6621501873564874869_n.jpg', 'asdfs', '2016-11-27 21:23:52'),
(22, 'essd', 'news/13339576_1712117069042608_3095225813574157092_n.jpg', 'sfdsfd', '2016-11-27 21:29:17'),
(23, 'adsfda', 'news/13339576_1712117069042608_3095225813574157092_n.jpg', 'asdfads', '2016-11-27 21:30:02'),
(24, 'adsfdas', 'events/600718_1652034771717505_1971186278799880101_n.jpg', 'adsfads', '2016-11-27 21:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `useracctbl`
--

CREATE TABLE IF NOT EXISTS `useracctbl` (
  `user_id` int(10) NOT NULL auto_increment,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `strt` varchar(50) NOT NULL,
  `house_no` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `useracctbl`
--

INSERT INTO `useracctbl` (`user_id`, `firstname`, `middlename`, `lastname`, `barangay`, `strt`, `house_no`, `username`, `password`) VALUES
(1, 'cfc', 'xxx', 'xxx', 'Barangay Carriedo', 'xd', 'xxx', 'xx', 'zx'),
(2, 'dxx', 'dxc', 'dcc', 'Barangay B', 'xxc', 'ccc', 'xcc', 'xx'),
(3, 'anthony', 'g', 'marquez', 'Barangay D', 'burgos', '123', 'qwer', 'qwert'),
(4, 'dxx', 'xxc', 'xx', 'Barangay C', 'zxc', 'sxx', 'xxx', 'xxx');

-- --------------------------------------------------------

--
-- Table structure for table `userreport`
--

CREATE TABLE IF NOT EXISTS `userreport` (
  `urid` int(10) NOT NULL auto_increment,
  `reportimage` varchar(255) NOT NULL,
  `repdescription` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `firedate` varchar(50) NOT NULL,
  `firetime` varchar(50) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  PRIMARY KEY  (`urid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `userreport`
--

INSERT INTO `userreport` (`urid`, `reportimage`, `repdescription`, `contactno`, `firedate`, `firetime`, `Status`, `lat`, `lng`) VALUES
(66, 'http://192.168.8.101/research/Admin/mobile/uploads/0.png', 'fire here in agno', '09084365741', '11-22-2016', '03:24 PM', 'Unreliable Sources', '15.981430642343032', '120.56073756760765'),
(67, 'http://192.168.8.101/research/Admin/mobile/uploads/66.png', 'mike israel', '09016748951', '11-22-2016', '03:26 PM', 'Fire On-Going', '15.981519453336936', '120.56107128967153'),
(68, 'http://192.168.8.101/research/Admin/mobile/uploads/67.png', 'barangay D', '09087656473', '11-22-2016', '03:26 PM', 'Fire On-Going', '15.981519453336936', '120.56107128967153'),
(69, 'http://192.168.8.101/research/Admin/mobile/uploads/68.png', 'barangay A', '09076754631', '11-22-2016', '04:01 PM', 'Case Closed', '15.980179073229374', '120.56033146566504'),
(71, 'http://192.168.8.101/research/Admin/mobile/uploads/70.png', 'help us here in barangay legaspi', '09078964532', '11-25-2016', '08:59 AM', 'Fire On-Going', '15.981380599444561', '120.56071006812503'),
(76, 'http://192.168.8.101/research/Admin/mobile/uploads/75.png', 'prince noren', '09075503295', '11-28-2016', '01:20 PM', 'Fire On-Going', '15.98149736995065', '120.56077148322535');
