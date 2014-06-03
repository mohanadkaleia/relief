-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "area" -------------------------------------
CREATE TABLE `area` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`name` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`code` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_bin
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- ---------------------------------------------------------


-- CREATE TABLE "association" ------------------------------
CREATE TABLE `association` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`code` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`name` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`manager_name` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`phone1` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`phone2` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`mobile1` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`mobile2` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`address` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`about` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`logo` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`created_date` Date NULL, 
	`creator_id` Int( 11 ) NULL, 
	`is_deleted` VarChar( 1 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'F',
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_bin
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "family_member" ----------------------------
CREATE TABLE `family_member` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`provider_code` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, 
	`national_id` VarChar( 12 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, 
	`fname` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`lname` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`father_name` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`gender` VarChar( 1 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'M', 
	`birth_date` Date NULL, 
	`relationship` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`job` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`study_status` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`social_status` Text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, 
	`health_status` Text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, 
	`note` Text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, 
	`created_date` Date NULL, 
	`creator_id` Int( 11 ) NULL, 
	`is_deleted` VarChar( 1 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'F',
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_bin
ENGINE = InnoDB
AUTO_INCREMENT = 15;
-- ---------------------------------------------------------


-- CREATE TABLE "package" ----------------------------------
CREATE TABLE `package` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "package_detail" ---------------------------
CREATE TABLE `package_detail` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`amount` Float( 11, 0 ) NULL DEFAULT '0', 
	`subject_code` VarChar( 250 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, 
	`package_id` Int( 11 ) NOT NULL DEFAULT '0',
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "provider" ---------------------------------
CREATE TABLE `provider` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`area_code` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`association_code` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`code` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`fname` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`lname` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`father_name` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`mother_name` VarChar( 150 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`national_id` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`birth_date` Date NULL, 
	`is_emigrant` VarChar( 1 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'T', 
	`family_book_num` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`family_book_letter` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`family_book_family_number` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`family_book_note` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`current_address` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`prev_address` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`street` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`point_guide` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`build` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`floor` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`phone1` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`phone2` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`mobile1` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`mobile2` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`note` Text CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`relief_form_status` VarChar( 1 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'X', 
	`created_date` Date NULL, 
	`creator_id` Int( 11 ) NULL, 
	`is_deleted` VarChar( 1 ) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'F', 
	`gender` VarChar( 1 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'M',
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_bin
ENGINE = InnoDB
AUTO_INCREMENT = 16;
-- ---------------------------------------------------------


-- CREATE TABLE "provider_package" -------------------------
CREATE TABLE `provider_package` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`date` Date NOT NULL, 
	`package_id` Int( 11 ) NOT NULL DEFAULT '0', 
	`provider_code` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "subject" ----------------------------------
CREATE TABLE `subject` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
	`code` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`subject_category_id` Int( 11 ) NOT NULL DEFAULT '0',
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "subject_category" -------------------------
CREATE TABLE `subject_category` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "user" -------------------------------------
CREATE TABLE `user` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`first_name` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
	`last_name` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
	`national_id` Int( 11 ) NULL, 
	`username` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, 
	`password` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL, 
	`phone` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
	`mobile` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
	`address` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
	`association_code` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_bin NULL, 
	`role` VarChar( 10 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_bin
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- ---------------------------------------------------------


-- CREATE VIEW "provider_data" -----------------------------
CREATE OR REPLACE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `provider_data`
AS select distinct `relief`.`provider`.`id` AS `id`,`relief`.`provider`.`area_code` AS `area_code`,`relief`.`provider`.`association_code` AS `association_code`,`relief`.`provider`.`code` AS `code`,`relief`.`provider`.`fname` AS `fname`,`relief`.`provider`.`lname` AS `lname`,`relief`.`provider`.`father_name` AS `father_name`,`relief`.`provider`.`mother_name` AS `mother_name`,`relief`.`provider`.`national_id` AS `national_id`,`relief`.`provider`.`birth_date` AS `birth_date`,`relief`.`provider`.`is_emigrant` AS `is_emigrant`,`relief`.`provider`.`family_book_num` AS `family_book_num`,`relief`.`provider`.`family_book_letter` AS `family_book_letter`,`relief`.`provider`.`family_book_family_number` AS `family_book_family_number`,`relief`.`provider`.`family_book_note` AS `family_book_note`,`relief`.`provider`.`current_address` AS `current_address`,`relief`.`provider`.`prev_address` AS `prev_address`,`relief`.`provider`.`street` AS `street`,`relief`.`provider`.`point_guide` AS `point_guide`,`relief`.`provider`.`build` AS `build`,`relief`.`provider`.`floor` AS `floor`,`relief`.`provider`.`phone1` AS `phone1`,`relief`.`provider`.`phone2` AS `phone2`,`relief`.`provider`.`mobile1` AS `mobile1`,`relief`.`provider`.`mobile2` AS `mobile2`,`relief`.`provider`.`note` AS `note`,`relief`.`provider`.`relief_form_status` AS `relief_form_status`,`relief`.`provider`.`created_date` AS `created_date`,`relief`.`provider`.`creator_id` AS `creator_id`,`relief`.`provider`.`is_deleted` AS `is_deleted`,`relief`.`area`.`name` AS `area_name`,count(`relief`.`family_member`.`id`) AS `family_members` from ((`relief`.`provider` join `relief`.`area`) join `relief`.`family_member`) where ((`relief`.`provider`.`code` = `relief`.`family_member`.`provider_code`) and (`relief`.`provider`.`area_code` = `relief`.`area`.`code`));
-- ---------------------------------------------------------


-- CREATE DIAGRAMS TABLE "vs_database_diagrams" ------------
CREATE TABLE IF NOT EXISTS vs_database_diagrams( name Char(80), diadata Text, comment VarChar(1022), preview Text, lockinfo Char(80), locktime Timestamp, version Char(80) );
-- ---------------------------------------------------------


-- Dump data of "vs_database_diagrams" ---------------------
INSERT INTO `vs_database_diagrams`(`name`,`diadata`,`comment`,`preview`,`lockinfo`,`locktime`,`version`) VALUES ( 'relief_diagram', NULL, NULL, NULL, 'root*75', '2014-06-02 08:58:18', NULL );
-- ---------------------------------------------------------



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


