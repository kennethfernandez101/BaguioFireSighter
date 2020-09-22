-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2016 at 02:15 AM
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
-- Table structure for table `investigator`
--

CREATE TABLE IF NOT EXISTS `investigator` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `investigator`
--

INSERT INTO `investigator` (`id`, `name`) VALUES
(1, 'Chief Ariel A. Baruyaga CEO VI'),
(2, 'Lilibeth Q. Simangan'),
(3, 'Arthur L. Sawate'),
(4, 'Rommel A. Bassig'),
(5, 'Alberto R. Agustin'),
(6, 'Glendell V. Pajela'),
(7, 'Ferdinand P. Joanino'),
(8, 'Janice G. Ruizan'),
(9, 'Ryan John P. Dollente'),
(10, 'Michelle P. Dollente'),
(11, 'Jan Kristoffer D. Mamaril');
