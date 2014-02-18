-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2014 at 10:23 AM
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
(2, 'الحمدانية', '02');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`id`, `code`, `name`, `manager_name`, `phone1`, `phone2`, `mobile1`, `mobile2`, `address`, `about`, `logo`, `created_date`, `creator_id`, `is_deleted`) VALUES
(1, '01', 'جمعية أهل الخير', 'مهند شب قلعية', '5213679', NULL, '0991561365', NULL, 'الفرقان - جمعية أهل الخير', 'تعتبر جمعية أهل الخير من الجمعيات الرائدة في مجال الإغاثة الإنسانية والاجتماعية', NULL, '2014-02-13', 1, 'F'),
(2, '02', 'جمعية المحبة', 'مهند شب قلعية', '13213', '2313', '3213', '3213', 'عنوان', 'حول الجمعية', '', '0000-00-00', 1, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE IF NOT EXISTS `family_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_code` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`id`, `provider_code`, `full_name`, `gender`, `birth_date`, `relationship`, `is_emigrant`, `job`, `study_status`, `social_status`, `health_status`, `note`, `created_date`, `creator_id`, `is_deleted`) VALUES
(1, 0, 'فرد اسرة', 'M', '0000-00-00', 'father', 'e', 'العمل والمهنة', 'الوضع الدراسي', 'married', 'disabled', 'ملاحظاتا', NULL, NULL, 'F'),
(2, 0, 'فرد اسرة', 'M', '0000-00-00', 'father', 'e', 'العمل والمهنة', 'الوضع الدراسي', 'married', 'disabled', 'ملاحظاتا', NULL, NULL, 'F'),
(3, 0, 'تجربة 2', 'M', '0000-00-00', 'father', 'T', '', '', 'married', 'disabled', '', NULL, NULL, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) DEFAULT NULL,
  `association_id` int(11) DEFAULT NULL,
  `code` int(12) DEFAULT NULL,
  `full_name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `naional_id` int(11) DEFAULT NULL,
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
  `relief_form_status` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(1) COLLATE utf8_bin DEFAULT 'F',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `area_id`, `association_id`, `code`, `full_name`, `naional_id`, `family_book_num`, `family_book_letter`, `family_book_family_number`, `family_book_note`, `current_address`, `prev_address`, `street`, `point_guide`, `build`, `floor`, `phone1`, `phone2`, `mobile1`, `mobile2`, `note`, `relief_form_status`, `created_date`, `creator_id`, `is_deleted`) VALUES
(1, 1, 1, 0, 'مطيعة مدري شو', 0, '', 'حرف', '', 'بيان', 'عنوان حالي', 'عنوان سابق', 'الشارع', '', 'بناء', 'طابق', 'هاتف', 'هاتف', 'موبايل', 'موبايل2', '', 0, '0000-00-00', 1, 'F'),
(2, 1, 1, 0, 'مطيعة مدري شو', 0, 'دفتر العائلة', 'حرف', '', 'بيان', 'عنوان حالي', 'عنوان سابق', 'الشارع', '', 'بناء', 'طابق', 'هاتف', 'هاتف', 'موبايل', 'موبايل2', '', 0, '0000-00-00', 1, 'F'),
(3, 1, 1, 0, 'تجربة مدري شو رقمها', 3213123, 'دفتر العائلة', 'حرف', '', 'بيان عائلي', 'العنوان الحالي', 'العنوان السابق', 'الشارع', '', 'بناء', 'طابق', 'هاتف 1', 'هاتف 2', 'موبايل 1', 'موبايل 2', 'ملاحظات', 0, '0000-00-00', 1, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `association_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
