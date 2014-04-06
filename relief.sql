-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2014 at 09:40 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `code`) VALUES
(5, 'المحافظة', '001');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`id`, `code`, `name`, `manager_name`, `phone1`, `phone2`, `mobile1`, `mobile2`, `address`, `about`, `logo`, `created_date`, `creator_id`, `is_deleted`) VALUES
(3, '01', 'جمعية التعليم العالي', '', '', '', '', '', '', '', '01.jpg', '2014-03-06', 2, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE IF NOT EXISTS `family_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_code` varchar(50) COLLATE utf8_bin NOT NULL,
  `national_id` varchar(12) COLLATE utf8_bin NOT NULL,
  `fname` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `father_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_bin DEFAULT 'M',
  `birth_date` date DEFAULT NULL,
  `relationship` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `job` text COLLATE utf8_bin,
  `study_status` text COLLATE utf8_bin,
  `social_status` text COLLATE utf8_bin NOT NULL,
  `health_status` text COLLATE utf8_bin NOT NULL,
  `note` text COLLATE utf8_bin NOT NULL,
  `created_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(1) COLLATE utf8_bin DEFAULT 'F',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`id`, `provider_code`, `national_id`, `fname`, `lname`, `father_name`, `gender`, `birth_date`, `relationship`, `job`, `study_status`, `social_status`, `health_status`, `note`, `created_date`, `creator_id`, `is_deleted`) VALUES
(9, '01-001-R6238275206', 'R6238287711', 'تجربة تولد', '1', 'تجربة', 'M', '1973-07-06', 'father', '', '', 'married', 'disabled', '', NULL, NULL, 'F'),
(11, '01-001-R6241065299', 'R6415149627', 'فرد ', 'باركود', 'تجربة2', 'F', '1901-01-01', 'father', 'طالب', 'طالب', 'single', 'disabled', '', NULL, NULL, 'F');

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
  `mother_name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `national_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `is_emigrant` varchar(1) COLLATE utf8_bin DEFAULT 'T',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `area_code`, `association_code`, `code`, `fname`, `lname`, `father_name`, `mother_name`, `national_id`, `birth_date`, `is_emigrant`, `family_book_num`, `family_book_letter`, `family_book_family_number`, `family_book_note`, `current_address`, `prev_address`, `street`, `point_guide`, `build`, `floor`, `phone1`, `phone2`, `mobile1`, `mobile2`, `note`, `relief_form_status`, `created_date`, `creator_id`, `is_deleted`) VALUES
(7, '001', '01', '01-001-R6118806295', 'تولد', 'تولد', 'تولد', NULL, '2014-03-11', '0000-00-00', 'T', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-03-29', 1, 'T'),
(8, '001', '01', '01-001-R6119030705', 'تجربة', 'تولد', '2', NULL, 'R6119030705', '1996-01-16', 'T', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-03-29', 1, 'T'),
(9, '001', '01', '01-001-R6119030705', 'تجربة', 'تانية', 'اب', NULL, 'R6119030705', '2014-03-04', 'T', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'X', '2014-03-29', 1, 'T'),
(10, '001', '01', '01-001-R6238275206', 'تجربة', '1', '0', NULL, 'R6238275206', '0000-00-00', 'T', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-03-31', 1, 'F'),
(11, '001', '01', '01-001-R6240692120', 'مهند', 'شب قلعية', 'رياض', 'نهى', 'R6240692120', '0000-00-00', 'F', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-03-31', 1, 'F'),
(12, '001', '01', '01-001-R6241006020', 'تجربة', 'باركود', 'محمد', 'طباعة', 'R6241006020', '0000-00-00', 'T', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'F', '2014-03-31', 1, 'F'),
(13, '001', '01', '01-001-R6241065299', 'تجربة2', 'باركود', 'محمد', 'طباعة', 'R6241065299', '0000-00-00', 'T', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-03-31', 1, 'F');

-- --------------------------------------------------------

--
-- Stand-in structure for view `provider_data`
--
CREATE TABLE IF NOT EXISTS `provider_data` (
`id` int(11)
,`area_code` varchar(50)
,`association_code` varchar(50)
,`code` varchar(250)
,`fname` varchar(250)
,`lname` varchar(100)
,`father_name` varchar(100)
,`mother_name` varchar(150)
,`national_id` varchar(50)
,`birth_date` date
,`is_emigrant` varchar(1)
,`family_book_num` varchar(50)
,`family_book_letter` varchar(50)
,`family_book_family_number` varchar(50)
,`family_book_note` text
,`current_address` text
,`prev_address` text
,`street` text
,`point_guide` text
,`build` text
,`floor` text
,`phone1` varchar(50)
,`phone2` varchar(50)
,`mobile1` varchar(50)
,`mobile2` varchar(50)
,`note` text
,`relief_form_status` varchar(1)
,`created_date` date
,`creator_id` int(11)
,`is_deleted` varchar(1)
,`area_name` varchar(250)
,`family_members` bigint(21)
);
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
  `role` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `national_id`, `username`, `password`, `phone`, `mobile`, `address`, `association_code`, `role`) VALUES
(1, 'فراس', 'كنعان', 211323123, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '01', 'admin'),
(2, 'مهند', 'شب قلعية', 201231, 'mohanad', 'e10adc3949ba59abbe56e057f20f883e', '123123', '1231231', 'حلب - حلب الجديدة', '01', 'admin'),
(3, 'إدارة', 'الهلال', 2147483647, 'admin', '3fe5fc498e8ded3a36b448d8d418108f', 'لا يوجد', 'لا يوجد', 'لا يوجد', '', 'admin'),
(4, 'إدارة', 'جمعية', 23331231, 'admin', '0192023a7bbd73250516f069df18b500', 'لا يوجد', 'لا يوجد', 'لا يوجد', '', '');

-- --------------------------------------------------------

--
-- Structure for view `provider_data`
--
DROP TABLE IF EXISTS `provider_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `provider_data` AS select distinct `provider`.`id` AS `id`,`provider`.`area_code` AS `area_code`,`provider`.`association_code` AS `association_code`,`provider`.`code` AS `code`,`provider`.`fname` AS `fname`,`provider`.`lname` AS `lname`,`provider`.`father_name` AS `father_name`,`provider`.`mother_name` AS `mother_name`,`provider`.`national_id` AS `national_id`,`provider`.`birth_date` AS `birth_date`,`provider`.`is_emigrant` AS `is_emigrant`,`provider`.`family_book_num` AS `family_book_num`,`provider`.`family_book_letter` AS `family_book_letter`,`provider`.`family_book_family_number` AS `family_book_family_number`,`provider`.`family_book_note` AS `family_book_note`,`provider`.`current_address` AS `current_address`,`provider`.`prev_address` AS `prev_address`,`provider`.`street` AS `street`,`provider`.`point_guide` AS `point_guide`,`provider`.`build` AS `build`,`provider`.`floor` AS `floor`,`provider`.`phone1` AS `phone1`,`provider`.`phone2` AS `phone2`,`provider`.`mobile1` AS `mobile1`,`provider`.`mobile2` AS `mobile2`,`provider`.`note` AS `note`,`provider`.`relief_form_status` AS `relief_form_status`,`provider`.`created_date` AS `created_date`,`provider`.`creator_id` AS `creator_id`,`provider`.`is_deleted` AS `is_deleted`,`area`.`name` AS `area_name`,count(`family_member`.`id`) AS `family_members` from ((`provider` join `area`) join `family_member`) where ((`provider`.`code` = `family_member`.`provider_code`) and (`provider`.`area_code` = `area`.`code`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
