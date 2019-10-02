# --------------------------------------------------------
# Host:                         172.19.10.20
# Database:                     ims_inoc
# Server version:               5.1.73
# Server OS:                    redhat-linux-gnu
# HeidiSQL version:             5.0.0.3272
# Date/time:                    2019-08-28 13:09:50
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
# Dumping database structure for ims_inoc
CREATE DATABASE IF NOT EXISTS `ims_inoc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ims_inoc`;


# Dumping structure for table ims_inoc.tbl_trainee
CREATE TABLE IF NOT EXISTS `tbl_trainee` (
  `tblTraineeID` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Trainee_ID` varchar(15) DEFAULT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `Full_Name` varchar(255) DEFAULT NULL,
  `Name_with_Initials` varchar(200) DEFAULT NULL,
  `NIC` varchar(12) DEFAULT NULL,
  `Age` int(2) DEFAULT '1',
  `Gender` varchar(1) DEFAULT NULL,
  `Date_of_Birth` varchar(10) DEFAULT NULL,
  `Add_Line1` varchar(100) DEFAULT NULL,
  `Add_Line2` varchar(100) DEFAULT NULL,
  `Add_Line3` varchar(100) DEFAULT NULL,
  `Temp_Add_Line1` varchar(200) DEFAULT NULL,
  `Temp_Add_Line2` varchar(100) DEFAULT NULL,
  `Temp_Add_Line3` varchar(100) DEFAULT NULL,
  `Contact_Number1` varchar(10) DEFAULT '1',
  `Contact_Number2` varchar(10) DEFAULT '1',
  `E_Mail` varchar(255) DEFAULT NULL,
  `tblTrainingInstituteID` varchar(5) DEFAULT '1',
  `programName` varchar(15) DEFAULT NULL,
  `tblCourseID` int(5) DEFAULT NULL,
  `Batch` varchar(10) DEFAULT NULL,
  `tYear` varchar(20) DEFAULT NULL,
  `Contact_Person` varchar(255) DEFAULT NULL,
  `Contact_number` varchar(10) DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `tblBankID` varchar(5) DEFAULT NULL,
  `bankBranch` varchar(200) DEFAULT NULL,
  `Name_as_Bank` varchar(255) DEFAULT NULL,
  `Bank_Account_number` varchar(255) DEFAULT NULL,
  `flag` varchar(8) NOT NULL DEFAULT 'ACTIVE',
  `job_type` varchar(15) DEFAULT 'GENERAL',
  `salary` varchar(10) DEFAULT '0.0',
  `profile_img` text,
  `cv_img` text,
  `jdate` datetime NOT NULL DEFAULT '2017-01-01 08:00:00',
  `edate` datetime NOT NULL DEFAULT '2017-06-01 08:00:00',
  `tblDivisionID` varchar(5) DEFAULT '',
  PRIMARY KEY (`tblTraineeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
