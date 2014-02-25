-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2014 at 07:51 AM
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
(1, 'الحمدانية', '002'),
(3, 'المحافظة', '003'),
(5, 'الجميلية', '005');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=38 ;

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`id`, `code`, `name`, `manager_name`, `phone1`, `phone2`, `mobile1`, `mobile2`, `address`, `about`, `logo`, `created_date`, `creator_id`, `is_deleted`) VALUES
(36, '003', '', '', '', '', '', '', '', '', '003.gif', '0000-00-00', 1, 'F'),
(37, '005', 'جمعية المحبة', 'مهند شب قلعية', '521343', '3213123', '032131', '0312312312', 'حلب الجديدة', 'حول الجمعية', '005.png', '2014-02-21', 1, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE IF NOT EXISTS `family_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_code` varchar(50) COLLATE utf8_bin NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`id`, `provider_code`, `full_name`, `gender`, `birth_date`, `relationship`, `is_emigrant`, `job`, `study_status`, `social_status`, `health_status`, `note`, `created_date`, `creator_id`, `is_deleted`) VALUES
(1, '', 'فرد أسرة للمعيل وافراد 2', 'M', '0000-00-00', 'father', 'T', 'عاطل عن العمل', 'عاطل عن العمل الدراسي', 'married', 'disabled', 'لا يوجد ملاحظات', NULL, NULL, 'F'),
(2, '', 'فرد أسرة للمعيل 2 مع كود', 'M', '0000-00-00', 'father', 'T', '', '', 'married', 'disabled', '', NULL, NULL, 'F'),
(3, '010020023331231', 'فرد 3 مع كود', 'M', '0000-00-00', 'father', 'T', '', '', 'married', 'disabled', '', NULL, NULL, 'F'),
(4, '01002012345678', 'واخد', 'M', '0000-00-00', 'father', 'T', '', '', 'married', 'disabled', '', NULL, NULL, 'F'),
(5, '01002012345678', 'اتنين', 'M', '0000-00-00', 'father', 'T', '', '', 'married', 'disabled', '', NULL, NULL, 'F'),
(6, '01002012345678', 'تلاتة', 'M', '0000-00-00', 'father', 'T', '', '', 'married', 'disabled', '', NULL, NULL, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `association_code` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `full_name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
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
  `relief_form_status` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `is_deleted` varchar(1) COLLATE utf8_bin DEFAULT 'F',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `area_code`, `association_code`, `code`, `full_name`, `national_id`, `family_book_num`, `family_book_letter`, `family_book_family_number`, `family_book_note`, `current_address`, `prev_address`, `street`, `point_guide`, `build`, `floor`, `phone1`, `phone2`, `mobile1`, `mobile2`, `note`, `relief_form_status`, `created_date`, `creator_id`, `is_deleted`) VALUES
(1, '002', '1', '', 'مطيعة', '0231231232', '32312', 'ح', '', 'بيان عائلي', 'العنوان الحالي', 'العنوان السابق', 'شارع الحمدانية', 'جانب الشارع', 'بناء 1', 'طابق خامس', '231312312', '231321313', '312312312', '3213123123', 'ملاحظات', 0, '0000-00-00', 1, 'F'),
(2, '002', '1', '100223123123', 'تجربة كود', '23123123', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 1, 'F'),
(3, '002', '1', '1002002231312321', 'تجربة إضافة معيل مع افراد أسرته', '002231312321', 'رقم دفتر العائلة', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 1, 'F'),
(4, '002', '01', '010020023331231', 'معيل وافراد 2', '0023331231', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 1, 'F'),
(5, '002', '01', '010020023331231', 'provider', '0023331231', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 1, 'F'),
(6, '002', '01', '01002012345678', 'اضافة معيل مع اسرته', '012345678', '123', '123', '', '123', 'حالي', 'سابق', 'شارع', 'نقطة علام', 'بناء', 'طابق', 'هاتف 1', 'هاتف 2', 'موبايل 1', 'موبايل 2', 'ملاحظات', 0, '0000-00-00', 1, 'F'),
(7, '002', '01', '01002012345678', 'اضافة معيل مع اسرته', '012345678', '123', '123', '', '123', 'حالي', 'سابق', 'شارع', 'نقطة علام', 'بناء', 'طابق', 'هاتف 1', 'هاتف 2', 'موبايل 1', 'موبايل 2', 'ملاحظات', 0, '0000-00-00', 1, 'F'),
(8, '002', '01', '01002123456', 'معيل مع تاريخ', '123456', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2014-02-22', 1, 'F');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `national_id`, `username`, `password`, `phone`, `mobile`, `address`, `association_code`) VALUES
(5, '????', '???', 2147483647, 'molham', 'e10adc3949ba59abbe56e057f20f883e', '2254549', '0956232', '??????????????? ??? ?????? ????? ????? ?', '001'),
(6, 'مهند', 'شب قلعية', 211323123, 'mohanad', 'e10adc3949ba59abbe56e057f20f883e', '5213679', '0991561365', 'حلب - حلب الجديدة - جمعية التعليم العالي', '001');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
