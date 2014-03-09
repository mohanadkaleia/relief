-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2014 at 08:10 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `code`) VALUES
(1, 'تشرين', '002'),
(3, 'الشهباء', '003'),
(5, 'العرقوب', '005'),
(6, 'السبيل', '004'),
(7, '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=42 ;

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`id`, `code`, `name`, `manager_name`, `phone1`, `phone2`, `mobile1`, `mobile2`, `address`, `about`, `logo`, `created_date`, `creator_id`, `is_deleted`) VALUES
(40, '01', 'الشهباء', 'أبو عبدو', '123456', '123456', '12312', '54545', 'يبنتابيمنتساب سينماب نمت', 'متبمسينت منبتسينم تسمبنتيسمن تسيمنت', '01.jpg', '2014-03-04', 1, 'F'),
(41, '02', 'السبيل', '', '', '', '', '', '', '', '02.png', '2014-03-29', 1, 'F');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`id`, `provider_code`, `full_name`, `gender`, `birth_date`, `relationship`, `is_emigrant`, `job`, `study_status`, `social_status`, `health_status`, `note`, `created_date`, `creator_id`, `is_deleted`) VALUES
(3, '010020023331231', '?? ????', 'F', '0000-00-00', 'mother', 'T', '???', '?????', 'married', 'sick', '', NULL, NULL, 'F'),
(4, '01002012345678', '?�?�?�?�', 'M', '0000-00-00', 'father', 'T', '?????', '????????', 'married', 'disabled', '', NULL, NULL, 'F'),
(8, '0100577777777777', '???? ???? ?????', 'M', '2000-02-01', 'brother', 'T', '????', '?????', 'fatherless', 'disabled', '??????? ?????? ????? ?????? ???????????????????? ?????????????????????? ?????? ????? ??????? ????', NULL, NULL, 'F'),
(9, '0100577777777777', '????', 'F', '2011-02-20', 'daughter', 'F', '??????', '???????', 'fatherless', 'sustenance', '??? ???????? ??????? ???? ????? ????????????? ???? ?????????????????????????????????????????5?????????6??????????????????????????????????????????????????????????????????????\r\n????????? ?????? ????? ???????? ?????? \r\n???????? ?????? ??', NULL, NULL, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`) VALUES
(1, 'سلة صغيرة'),
(17, 'سلة كبيرة'),
(18, 'صندوق للنازحين');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=30 ;

--
-- Dumping data for table `package_detail`
--

INSERT INTO `package_detail` (`id`, `amount`, `subject_id`, `package_id`) VALUES
(23, 6, 2, 1),
(24, 10, 1, 1),
(25, 12, 2, 1),
(26, 5, 2, 17),
(27, 5, 1, 17),
(28, 10, 2, 18),
(29, 15, 1, 18);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `area_code`, `association_code`, `code`, `full_name`, `national_id`, `family_book_num`, `family_book_letter`, `family_book_family_number`, `family_book_note`, `current_address`, `prev_address`, `street`, `point_guide`, `build`, `floor`, `phone1`, `phone2`, `mobile1`, `mobile2`, `note`, `relief_form_status`, `created_date`, `creator_id`, `is_deleted`) VALUES
(3, '002', '1', '1002002231312321', '??????????????', '002231312321', 'jhgjhgjh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 1, 'F'),
(4, '002', '01', '010020023331231', '?�?�???� ?�?�???�?�?� 2', '0023331231', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 1, 'F'),
(6, '005', '01', '0100577777777777', '?�?�?�???� ?�?�???� ?�?� ?�?�?�???�', '77777777777', '123', '123', '', '123', '?', '?????????????', '?', '?', '?', '?', '?�?�???? 1', '?�?�???? 2', '?�?�?�?�???� 1', '?�?�?�?�???� 2', '?', 0, '2014-02-24', 1, 'F'),
(7, '002', '01', '01002012345678', '?�?�?�???� ?�?�???� ?�?� ?�?�?�???�', '012345678', '123', '123', '', '123', '?', '?', '?', '?', '?', '?', '?�?�???? 1', '?�?�???? 2', '?�?�?�?�???� 1', '?�?�?�?�???� 2', '?', 0, '0000-00-00', 1, 'F'),
(8, '002', '01', '01002123456', '?�?�???� ?�?� ???�?�???�', '123456', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2014-02-22', 1, 'F'),
(9, '003', '01', '01003020300363659562', '???? ???? ?????', '020300363659562', '20235', '?', '', '15315', '?? ????? ?????? ?', ' ????????? ??????', '???????', '?? ????', '??????? ?', ' ??????????', '98794', '84531321', '18413205', '435128645', '????? ???? ?????????? ????? ????? ????? ??', 0, '2014-02-22', 1, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `provider_package`
--

CREATE TABLE IF NOT EXISTS `provider_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '0',
  `provider_id` int(11) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `subject_category_id`) VALUES
(1, 'سكر', 2),
(2, 'سائل جلي', 3),
(3, 'رز', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject_category`
--

CREATE TABLE IF NOT EXISTS `subject_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subject_category`
--

INSERT INTO `subject_category` (`id`, `name`) VALUES
(2, 'مواد غذائية'),
(3, 'مواد تنظيف');

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
(6, '?�?�?�?�', '?�?� ?�?�?�???�', 211323123, 'mohanad', 'e10adc3949ba59abbe56e057f20f883e', '5213679', '0991561365', '?�?�?� - ?�?�?� ?�?�?�?�???�?� - ?�?�?�???� ?�?�???�?�???� ?�?�?�?�?�??', '001');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
