-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2014 at 11:30 PM
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

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

DROP TABLE IF EXISTS `association`;
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

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

DROP TABLE IF EXISTS `family_member`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `package_detail`
--

DROP TABLE IF EXISTS `package_detail`;
CREATE TABLE IF NOT EXISTS `package_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float(11,0) DEFAULT '0',
  `subject_code` varchar(250) NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
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
  `gender` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'M',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `provider_data`
--
DROP VIEW IF EXISTS `provider_data`;
CREATE TABLE IF NOT EXISTS `provider_data` (
`provider_id` int(11)
,`fname` varchar(250)
,`lname` varchar(100)
,`CODE` varchar(250)
,`national_id` varchar(50)
,`family_book_num` varchar(50)
,`family_book_family_number` varchar(50)
,`family_book_letter` varchar(50)
,`birth_date` date
,`created_date` date
,`is_deleted` varchar(1)
,`area_name` varchar(250)
,`family_count` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `provider_package`
--

DROP TABLE IF EXISTS `provider_package`;
CREATE TABLE IF NOT EXISTS `provider_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '0',
  `provider_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(250) CHARACTER SET utf8 NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `subject_category_id` int(11) NOT NULL DEFAULT '0',
  `total_amount` int(255) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject_category`
--

DROP TABLE IF EXISTS `subject_category`;
CREATE TABLE IF NOT EXISTS `subject_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
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

-- --------------------------------------------------------

--
-- Table structure for table `vs_database_diagrams`
--

DROP TABLE IF EXISTS `vs_database_diagrams`;
CREATE TABLE IF NOT EXISTS `vs_database_diagrams` (
  `name` char(80) DEFAULT NULL,
  `diadata` text,
  `comment` varchar(1022) DEFAULT NULL,
  `preview` text,
  `lockinfo` char(80) DEFAULT NULL,
  `locktime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `provider_data`
--
DROP TABLE IF EXISTS `provider_data`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `provider_data` AS select `provider`.`id` AS `provider_id`,`provider`.`fname` AS `fname`,`provider`.`lname` AS `lname`,`provider`.`code` AS `CODE`,`provider`.`national_id` AS `national_id`,`provider`.`family_book_num` AS `family_book_num`,`provider`.`family_book_family_number` AS `family_book_family_number`,`provider`.`family_book_letter` AS `family_book_letter`,`provider`.`birth_date` AS `birth_date`,`provider`.`created_date` AS `created_date`,`provider`.`is_deleted` AS `is_deleted`,`area`.`name` AS `area_name`,count(`family_member`.`id`) AS `family_count` from ((`provider` join `family_member`) join `area`) where ((`provider`.`code` = `family_member`.`provider_code`) and (`provider`.`is_deleted` = 'F') and (`area`.`code` = `provider`.`area_code`)) group by `provider`.`id`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
