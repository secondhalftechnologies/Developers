-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 12:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sqyard_2017`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doc_uploads`
--

CREATE TABLE IF NOT EXISTS `tbl_doc_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fm_caid` int(11) DEFAULT NULL,
  `fm_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_extention` varchar(10) DEFAULT NULL,
  `doc_type` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_doc_uploads`
--

INSERT INTO `tbl_doc_uploads` (`id`, `fm_caid`, `fm_id`, `file_name`, `file_type`, `file_size`, `file_extention`, `doc_type`, `status`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(3, 1, 100002, '2.jpg', 'image/jpeg', '142184', 'jpg', 'Aadhar', 1, '2017-10-18 12:20:18', NULL, NULL, NULL),
(33, 1, 100001, 'Chrysanthemum.jpg', 'image/jpeg', '879394', 'jpg', 'Kisan Credit Card', 1, '2017-10-18 13:40:35', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
