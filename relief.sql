-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2014 at 08:05 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `relief`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `code`) VALUES
(1, 'المحافظة', '001'),
(2, 'الحمدانية', '002');

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

CREATE TABLE IF NOT EXISTS `association` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `manager_name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `phone1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `phone2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mobile1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mobile2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address` text COLLATE utf8_bin,
  `about` text COLLATE utf8_bin,
  `logo` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(1) COLLATE utf8_bin DEFAULT 'F',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`id`, `code`, `name`, `manager_name`, `phone1`, `phone2`, `mobile1`, `mobile2`, `address`, `about`, `logo`, `created_date`, `creator_id`, `is_deleted`) VALUES
(1, '01', 'جمعية المحبة', '', '', '', '', '', '', '', '01', '2014-03-12', 1, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE IF NOT EXISTS `family_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_code` varchar(50) COLLATE utf8_bin NOT NULL,
  `national_id` varchar(12) COLLATE utf8_bin NOT NULL,
  `full_name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_bin DEFAULT 'M',
  `birth_date` date DEFAULT NULL,
  `relationship` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `is_emigrant` varchar(1) COLLATE utf8_bin DEFAULT 'T',
  `job` text COLLATE utf8_bin,
  `study_status` text COLLATE utf8_bin,
  `social_status` text COLLATE utf8_bin NOT NULL,
  `health_status` text COLLATE utf8_bin NOT NULL,
  `note` text COLLATE utf8_bin NOT NULL,
  `created_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(1) COLLATE utf8_bin DEFAULT 'F',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`id`, `provider_code`, `national_id`, `full_name`, `gender`, `birth_date`, `relationship`, `is_emigrant`, `job`, `study_status`, `social_status`, `health_status`, `note`, `created_date`, `creator_id`, `is_deleted`) VALUES
(1, '01-001-0023331231', '0023331231', 'مطيع حمدان', 'M', '1998-01-01', 'father', 'T', 'العمل والمهنة', 'أمي', 'married', 'disabled', '', NULL, NULL, 'F'),
(2, '01-001-0023331231', '0023331231', 'رضيع ابن رضيع', 'M', '2014-01-10', 'father', 'T', 'رضيع', 'رضيع', 'married', 'sustenance', '', NULL, NULL, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `package_detail`
--

CREATE TABLE IF NOT EXISTS `package_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float(11,0) DEFAULT '0',
  `subject_id` int(11) NOT NULL DEFAULT '0',
  `package_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `association_code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `fname` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `father_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `national_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `family_book_num` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `family_book_letter` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `family_book_family_number` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `family_book_note` text COLLATE utf8_bin,
  `current_address` text COLLATE utf8_bin,
  `prev_address` text COLLATE utf8_bin,
  `street` text COLLATE utf8_bin,
  `point_guide` text COLLATE utf8_bin,
  `build` text COLLATE utf8_bin,
  `floor` text COLLATE utf8_bin,
  `phone1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `phone2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mobile1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mobile2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `note` text COLLATE utf8_bin,
  `relief_form_status` varchar(1) COLLATE utf8_bin DEFAULT 'X',
  `created_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(1) COLLATE utf8_bin DEFAULT 'F',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `area_code`, `association_code`, `code`, `fname`, `lname`, `father_name`, `national_id`, `family_book_num`, `family_book_letter`, `family_book_family_number`, `family_book_note`, `current_address`, `prev_address`, `street`, `point_guide`, `build`, `floor`, `phone1`, `phone2`, `mobile1`, `mobile2`, `note`, `relief_form_status`, `created_date`, `creator_id`, `is_deleted`) VALUES
(1, '001', '01', '01-001-0023331231', 'مطيعة', 'حمدان', 'مطيع', '0023331231', '0013', 'ا', '', '', 'حلب - المحافظة', 'حلب - السليمانية', 'شارع الفردوس', 'نقطة علام', 'بناء 1', 'طابق اول', 'هاتف 1', '2312312', '312312312', '2131312312', '', 'F', '2014-03-17', 1, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `provider_package`
--

CREATE TABLE IF NOT EXISTS `provider_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '0',
  `provider_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subject_category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject_category`
--

CREATE TABLE IF NOT EXISTS `subject_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `username` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `phone` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `association_code` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `national_id`, `username`, `password`, `phone`, `mobile`, `address`, `association_code`) VALUES
(1, 'فراس', 'كنعان', 211323123, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '01'),
(2, 'مهند', 'شب قلعية', 201231, 'mohanad', 'e10adc3949ba59abbe56e057f20f883e', '123123', '1231231', 'حلب - حلب الجديدة', '01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
