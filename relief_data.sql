-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- Dump data of "area" -------------------------------------
REPLACE INTO `area`(`id`,`name`,`code`) VALUES ( '5', 'المحافظة', '001' );
-- ---------------------------------------------------------


-- Dump data of "association" ------------------------------
REPLACE INTO `association`(`id`,`code`,`name`,`manager_name`,`phone1`,`phone2`,`mobile1`,`mobile2`,`address`,`about`,`logo`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '3', '01', 'جمعية التعليم العالي', '', '', '', '', '', '', '', '01.jpg', '2014-03-06', '0', 'F' );
-- ---------------------------------------------------------


-- Dump data of "family_member" ----------------------------
REPLACE INTO `family_member`(`id`,`provider_code`,`national_id`,`fname`,`lname`,`father_name`,`gender`,`birth_date`,`relationship`,`job`,`study_status`,`social_status`,`health_status`,`note`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '9', '01-001-R6238275206', 'R6238287711', 'تجربة تولد', '1', 'تجربة', 'M', '1973-07-06', 'father', '', '', 'married', 'disabled', '', NULL, NULL, 'F' );
REPLACE INTO `family_member`(`id`,`provider_code`,`national_id`,`fname`,`lname`,`father_name`,`gender`,`birth_date`,`relationship`,`job`,`study_status`,`social_status`,`health_status`,`note`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '11', '01-001-R6241065299', 'R6415149627', 'فرد ', 'باركود', 'تجربة2', 'F', '1901-01-01', 'father', 'طالب', 'طالب', 'single', 'disabled', '', NULL, NULL, 'F' );
REPLACE INTO `family_member`(`id`,`provider_code`,`national_id`,`fname`,`lname`,`father_name`,`gender`,`birth_date`,`relationship`,`job`,`study_status`,`social_status`,`health_status`,`note`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '12', '01-001-R9899480726', 'R9899492024', 'ابن', 'جديدة', 'تجربة جديدة', 'M', '1946-12-17', 'wife', 'لا يوجد', 'لا يوجد', 'divorced', 'sustenance', 'ملاحظات', NULL, NULL, 'F' );
REPLACE INTO `family_member`(`id`,`provider_code`,`national_id`,`fname`,`lname`,`father_name`,`gender`,`birth_date`,`relationship`,`job`,`study_status`,`social_status`,`health_status`,`note`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '13', '01-001-R9899480726', 'R1562309639', 'اضافات', 'جديدة', 'تجربة جديدة', 'M', '1916-01-01', 'father', 'employed', 'university', 'married', 'healthy', 'لا يوجد ملاحظات', NULL, NULL, 'F' );
REPLACE INTO `family_member`(`id`,`provider_code`,`national_id`,`fname`,`lname`,`father_name`,`gender`,`birth_date`,`relationship`,`job`,`study_status`,`social_status`,`health_status`,`note`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '14', '01-001-R1564345429', 'R1564361607', 'ابن', 'ذكر', 'معيل', 'M', '1914-01-01', 'father', 'unemployed', 'illiterate', 'divorced', 'other', '', NULL, NULL, 'F' );
REPLACE INTO `family_member`(`id`,`provider_code`,`national_id`,`fname`,`lname`,`father_name`,`gender`,`birth_date`,`relationship`,`job`,`study_status`,`social_status`,`health_status`,`note`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '15', '01-001-R3374481818', 'R3879783600', 'ابن', 'اختيار', 'تولد', 'M', '1900-01-01', 'father', 'unemployed', 'illiterate', 'married', 'healthy', '', NULL, NULL, 'F' );
REPLACE INTO `family_member`(`id`,`provider_code`,`national_id`,`fname`,`lname`,`father_name`,`gender`,`birth_date`,`relationship`,`job`,`study_status`,`social_status`,`health_status`,`note`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '16', '01-001-R6240692120', 'R3977872071', 'شمس', 'شب قلعية', 'مهند', 'M', '1901-01-01', 'son', 'unemployed', 'illiterate', 'single', 'healthy', '', NULL, NULL, 'F' );
REPLACE INTO `family_member`(`id`,`provider_code`,`national_id`,`fname`,`lname`,`father_name`,`gender`,`birth_date`,`relationship`,`job`,`study_status`,`social_status`,`health_status`,`note`,`created_date`,`creator_id`,`is_deleted`) VALUES ( '18', '01-001-R6240692120', 'R4025391720', 'قمر', 'شب قلعية', 'مهند', 'F', '1900-01-01', 'daughter', 'unemployed', 'illiterate', 'single', 'healthy', '', NULL, NULL, 'F' );
-- ---------------------------------------------------------


-- Dump data of "package" ----------------------------------
REPLACE INTO `package`(`id`,`name`) VALUES ( '1', 'السلة المتكاملة' );
-- ---------------------------------------------------------


-- Dump data of "package_detail" ---------------------------
REPLACE INTO `package_detail`(`id`,`amount`,`subject_code`,`package_id`) VALUES ( '1', '2', '001', '1' );
REPLACE INTO `package_detail`(`id`,`amount`,`subject_code`,`package_id`) VALUES ( '2', '2', '002', '1' );
REPLACE INTO `package_detail`(`id`,`amount`,`subject_code`,`package_id`) VALUES ( '3', '4', '003', '1' );
REPLACE INTO `package_detail`(`id`,`amount`,`subject_code`,`package_id`) VALUES ( '4', '4', '004', '1' );
-- ---------------------------------------------------------


-- Dump data of "provider" ---------------------------------
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '7', '001', '01', '01-001-R6118806295', 'تولد', 'تولد', 'تولد', '', '2014-03-11', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-03-29', '1', 'F', 'M' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '8', '001', '01', '01-001-R6119030705', 'تجربة', 'تانية', 'اب', '', 'R6119030705', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'X', '2014-03-29', '1', 'F', 'M' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '9', '001', '01', '01-001-R6119030705', 'تجربة', 'تانية', 'اب', '', 'R6119030705', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'X', '2014-03-29', '1', 'F', 'M' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '10', '001', '01', '01-001-R6238275206', 'تجربة', '1', '0', '', 'R6238275206', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'F', '2014-03-31', '1', 'F', 'M' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '11', '001', '01', '01-001-R6240692120', 'مهند', 'شب قلعية', 'رياض', '', 'R6240692120', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-03-31', '1', 'F', 'M' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '12', '001', '01', '01-001-R6241006020', 'تجربة', 'باركود', 'محمد', '', 'R6241006020', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'F', '2014-03-31', '1', 'F', 'M' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '13', '001', '01', '01-001-R6241065299', 'تجربة2', 'باركود', 'محمد', '', 'R6241065299', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-03-31', '1', 'F', 'M' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '14', '001', '01', '01-001-R9899480726', 'تجربة جديدة', 'جديدة', '2', '', 'R9899480726', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-05-12', '1', 'F', 'M' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '15', '001', '01', '01-001-R1564345429', 'معيل', 'ذكر', 'بابا', '', 'R1564345429', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-05-31', '1', 'F', '' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '16', '001', '01', '01-001-R1687683931', 'معيلة', 'أنثى', 'ابوها', '', 'R1687683931', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-06-02', '1', 'F', '' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '17', '001', '01', '01-001-R3373397300', 'فراغ بالأول', 'كمان فراغ', 'في فراغ', '', 'R3373397300', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'T', '2014-06-21', '1', 'F', '' );
REPLACE INTO `provider`(`id`,`area_code`,`association_code`,`code`,`fname`,`lname`,`father_name`,`mother_name`,`national_id`,`birth_date`,`is_emigrant`,`family_book_num`,`family_book_letter`,`family_book_family_number`,`family_book_note`,`current_address`,`prev_address`,`street`,`point_guide`,`build`,`floor`,`phone1`,`phone2`,`mobile1`,`mobile2`,`note`,`relief_form_status`,`created_date`,`creator_id`,`is_deleted`,`gender`) VALUES ( '20', '001', '01', '01-001-R3374481818', 'تولد', 'اختيار', 'ابوه', '', 'R3374481818', '0000-00-00', '', '', '', '', '', 'العنوان الحالي', 'العنوان السابق', '', '', '', '', '', '', '', '', '', 'T', '2014-06-21', '1', 'F', 'M' );
-- ---------------------------------------------------------


-- Dump data of "provider_package" -------------------------
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '1', '2014-06-27', '1', '01-001-R6240692120' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '2', '2014-06-27', '1', '01-001-R3373397300' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '3', '2014-06-27', '1', '01-001-R3373397300' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '4', '2014-06-27', '1', '01-001-R3373397300' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '5', '2014-06-27', '1', '01-001-R3373397300' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '6', '2014-06-27', '1', '01-001-R3373397300' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '7', '2014-06-27', '1', '01-001-R3373397300' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '8', '2014-06-27', '1', '01-001-R1564345429' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '9', '2014-06-27', '1', '01-001-R6240692120' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '10', '2014-06-28', '1', '01-001-R3374481818' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '11', '2014-06-28', '1', '01-001-R3374481818' );
REPLACE INTO `provider_package`(`id`,`date`,`package_id`,`provider_code`) VALUES ( '12', '2014-06-28', '1', '01-001-R3374481818' );
-- ---------------------------------------------------------


-- Dump data of "subject" ----------------------------------
REPLACE INTO `subject`(`id`,`name`,`code`,`unit`,`subject_category_id`,`total_amount`) VALUES ( '1', 'سكر', '001', 'bag', '1', '92' );
REPLACE INTO `subject`(`id`,`name`,`code`,`unit`,`subject_category_id`,`total_amount`) VALUES ( '2', 'برغل', '002', 'kg', '1', '192' );
REPLACE INTO `subject`(`id`,`name`,`code`,`unit`,`subject_category_id`,`total_amount`) VALUES ( '3', 'فول', '003', 'box', '1', '384' );
REPLACE INTO `subject`(`id`,`name`,`code`,`unit`,`subject_category_id`,`total_amount`) VALUES ( '4', 'معكرونة', '004', 'bag', '1', '484' );
-- ---------------------------------------------------------


-- Dump data of "subject_category" -------------------------
REPLACE INTO `subject_category`(`id`,`name`) VALUES ( '1', 'غذائية' );
-- ---------------------------------------------------------


-- Dump data of "user" -------------------------------------
REPLACE INTO `user`(`id`,`first_name`,`last_name`,`national_id`,`username`,`password`,`phone`,`mobile`,`address`,`association_code`,`role`) VALUES ( '1', 'فراس', 'كنعان', '211323123', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '01', 'admin' );
REPLACE INTO `user`(`id`,`first_name`,`last_name`,`national_id`,`username`,`password`,`phone`,`mobile`,`address`,`association_code`,`role`) VALUES ( '2', 'مهند', 'شب قلعية', '201231', 'mohanad', 'e10adc3949ba59abbe56e057f20f883e', '123123', '1231231', 'حلب - حلب الجديدة', '01', 'admin' );
REPLACE INTO `user`(`id`,`first_name`,`last_name`,`national_id`,`username`,`password`,`phone`,`mobile`,`address`,`association_code`,`role`) VALUES ( '3', 'إدارة', 'الهلال', '2147483647', 'admin', '3fe5fc498e8ded3a36b448d8d418108f', 'لا يوجد', 'لا يوجد', 'لا يوجد', '', 'admin' );
REPLACE INTO `user`(`id`,`first_name`,`last_name`,`national_id`,`username`,`password`,`phone`,`mobile`,`address`,`association_code`,`role`) VALUES ( '4', 'إدارة', 'جمعية', '23331231', 'admin', '0192023a7bbd73250516f069df18b500', 'لا يوجد', 'لا يوجد', 'لا يوجد', '', '' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


