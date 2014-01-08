/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.16 : Database - key_mg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`key_mg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `key_mg`;

/*Table structure for table `tbl_contractor` */

DROP TABLE IF EXISTS `tbl_contractor`;

CREATE TABLE `tbl_contractor` (
  `csn` int(11) NOT NULL AUTO_INCREMENT,
  `ic_no` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`csn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_contractor` */

LOCK TABLES `tbl_contractor` WRITE;

insert  into `tbl_contractor`(`csn`,`ic_no`,`name`,`company`,`description`,`status`,`start_date`,`end_date`) values (1,'1233455','arif','ABC','DESC','active','2014-01-03','1970-01-01'),(2,'829227','2ND contractor','ABC','DESC','active','2014-01-01','1970-01-01');

UNLOCK TABLES;

/*Table structure for table `tbl_incident` */

DROP TABLE IF EXISTS `tbl_incident`;

CREATE TABLE `tbl_incident` (
  `isn` int(11) NOT NULL AUTO_INCREMENT,
  `ksn` int(11) DEFAULT NULL,
  `lsn` int(11) DEFAULT NULL,
  `csn` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`isn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_incident` */

LOCK TABLES `tbl_incident` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_key` */

DROP TABLE IF EXISTS `tbl_key`;

CREATE TABLE `tbl_key` (
  `ksn` int(11) NOT NULL AUTO_INCREMENT,
  `key_no` varchar(10) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `remarks` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ksn`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_key` */

LOCK TABLES `tbl_key` WRITE;

insert  into `tbl_key`(`ksn`,`key_no`,`location`,`status`,`remarks`) values (1,'1','lab 12','active','res');

UNLOCK TABLES;

/*Table structure for table `tbl_lecturer` */

DROP TABLE IF EXISTS `tbl_lecturer`;

CREATE TABLE `tbl_lecturer` (
  `lsn` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(20) DEFAULT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lsn`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_lecturer` */

LOCK TABLES `tbl_lecturer` WRITE;

insert  into `tbl_lecturer`(`lsn`,`staff_id`,`staff_name`,`department`,`status`,`start_date`,`end_date`,`remark`) values (2,'staff3','name 2','FSKKP','active','2014-01-02','2014-01-10','REMARK s'),(4,'staff2','NEW NAME','IO','active','2014-01-04','1970-01-01',''),(5,'staff1','xyz','abc dept','active','2014-01-15','1970-01-01','remark'),(6,'STAFF4','MY NAM','DEPT IS MINE','active','2014-03-01','1970-01-01','');

UNLOCK TABLES;

/*Table structure for table `tbl_request` */

DROP TABLE IF EXISTS `tbl_request`;

CREATE TABLE `tbl_request` (
  `rsn` int(11) NOT NULL AUTO_INCREMENT,
  `csn` int(11) DEFAULT NULL,
  `lsn` int(11) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`rsn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_request` */

LOCK TABLES `tbl_request` WRITE;

insert  into `tbl_request`(`rsn`,`csn`,`lsn`,`request_date`,`from_date`,`to_date`,`status`,`description`) values (1,0,2,'2014-01-17','2014-01-03','2014-01-10','Approved','desc'),(2,2,0,'2014-01-07','2014-01-10','2014-01-20','New','TEST'),(3,0,4,'2013-12-30','2014-01-04','2014-01-07','New','test');

UNLOCK TABLES;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `usn` int(11) NOT NULL AUTO_INCREMENT,
  `staff_no` varchar(20) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

LOCK TABLES `tbl_user` WRITE;

insert  into `tbl_user`(`usn`,`staff_no`,`user_name`,`pass`,`user_email`) values (1,'123','Arful','202cb962ac59075b964b07152d234b70','arifulhb@gmail.com'),(2,'124','abc','900150983cd24fb0d6963f7d28e17f72','xyz@gmail.com');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
