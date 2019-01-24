/*
SQLyog Community Edition- MySQL GUI v6.15
MySQL - 5.0.45-community-nt : Database - mydb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `mydb`;

USE `mydb`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `project_version` */

DROP TABLE IF EXISTS `project_version`;

CREATE TABLE `project_version` (
  `version` varchar(255) default NULL,
  `startdate` date default NULL,
  `enddate` date default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `project_version` */

insert  into `project_version`(`version`,`startdate`,`enddate`) values ('123','2018-02-23','2018-02-23'),('123345','2018-02-23','2018-02-23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
