-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2016 at 02:14 AM
-- Server version: 5.0.87
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `firerecordss`
--

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
