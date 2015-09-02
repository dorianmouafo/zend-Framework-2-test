/*
SQLyog Community Edition- MySQL GUI v6.52
MySQL - 5.6.17 : Database - booking_car
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

create database if not exists `booking_car`;

USE `booking_car`;

/*Table structure for table `agency` */

DROP TABLE IF EXISTS `agency`;

CREATE TABLE `agency` (
  `AGENCY_ID` bigint(4) NOT NULL,
  `AGENCY_NAME` char(32) NOT NULL,
  `AGENCY_NUMREGISTER` char(32) NOT NULL,
  `AGENCY_LOCATION` char(32) NOT NULL,
  `AGENCY_PHONE_NUMBER` char(32) NOT NULL,
  `AGENCY_PHONE_NUMBER1` char(32) DEFAULT NULL,
  `AGENCY_FAX` char(32) DEFAULT NULL,
  `AGENCY_LOGO` char(32) DEFAULT NULL,
  `AGENCY_EMAIL` char(32) NOT NULL,
  PRIMARY KEY (`AGENCY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `agency` */

/*Table structure for table `car` */

DROP TABLE IF EXISTS `car`;

CREATE TABLE `car` (
  `CAR_ID` bigint(4) NOT NULL,
  `TYPE_CAR_ID` bigint(4) NOT NULL,
  `CAR_MATRICULATION` char(32) NOT NULL,
  `CAR_NB_SEAT` bigint(4) NOT NULL,
  `CAR_DESCRIPTION` char(32) DEFAULT NULL,
  `CAR_VITESSE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CAR_ID`),
  KEY `I_FK_CAR_TYPE_CAR` (`TYPE_CAR_ID`),
  CONSTRAINT `car_ibfk_1` FOREIGN KEY (`TYPE_CAR_ID`) REFERENCES `type_car` (`TYPE_CAR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `car` */

/*Table structure for table `travel` */

DROP TABLE IF EXISTS `travel`;

CREATE TABLE `travel` (
  `TRAVEL_ID` bigint(4) NOT NULL,
  `CAR_ID` bigint(4) NOT NULL,
  `TRAVEL_NUMBER` char(32) NOT NULL,
  `TRAVEL_START` char(32) NOT NULL,
  `TRAVEL_ARRIVE` char(32) DEFAULT NULL,
  `TAVEL_DATE` char(32) NOT NULL,
  `TRAVEL_TIME` char(32) NOT NULL,
  `TRVALE_COMMENT` char(32) DEFAULT NULL,
  `TRAVEL_IN_PROCESS` tinyint(1) DEFAULT NULL,
  `TRAVEL_FINISH` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`TRAVEL_ID`),
  KEY `I_FK_TRAVEL_CAR` (`CAR_ID`),
  CONSTRAINT `travel_ibfk_1` FOREIGN KEY (`CAR_ID`) REFERENCES `car` (`CAR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `travel` */

/*Table structure for table `type_car` */

DROP TABLE IF EXISTS `type_car`;

CREATE TABLE `type_car` (
  `TYPE_CAR_ID` bigint(4) NOT NULL,
  `AGENCY_ID` bigint(4) NOT NULL,
  `TYPE_CAR_CODE` char(32) NOT NULL,
  `TYPE_CARE_NAME` char(32) DEFAULT NULL,
  PRIMARY KEY (`TYPE_CAR_ID`),
  KEY `I_FK_TYPE_CAR_AGENCY` (`AGENCY_ID`),
  CONSTRAINT `type_car_ibfk_1` FOREIGN KEY (`AGENCY_ID`) REFERENCES `agency` (`AGENCY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `type_car` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ID_USER` bigint(4) NOT NULL,
  `USER_IDENTITY_TYPT` char(32) NOT NULL,
  `USER_IDENTIFY_NUMBER` char(32) NOT NULL,
  `USER_NAME` char(32) NOT NULL,
  `USER_SURNAME` char(32) NOT NULL,
  `USER_PHONE_NUMBER` char(32) NOT NULL,
  `USER_EMAIL` char(32) DEFAULT NULL,
  `USER_USERNAME` char(32) NOT NULL,
  `USER_PASSWORD` char(32) NOT NULL,
  `USER_TYPE_USER` tinyint(1) DEFAULT NULL,
  `USER_TYPE_AGENCY` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*Table structure for table `user_travel` */

DROP TABLE IF EXISTS `user_travel`;

CREATE TABLE `user_travel` (
  `ID_USER` bigint(4) NOT NULL,
  `TRAVEL_ID` bigint(4) NOT NULL,
  `ID_USER_TRAVEL` bigint(4) NOT NULL,
  `DATE_REGISTER_USER` char(32) NOT NULL,
  `DATE_TRAVEL` char(32) NOT NULL,
  `TIME_TRAVEL_START` date DEFAULT NULL,
  `TIME_TRAVEL_ARRIVE` date DEFAULT NULL,
  PRIMARY KEY (`ID_USER`,`TRAVEL_ID`),
  KEY `I_FK_USER_TRAVEL_USER` (`ID_USER`),
  KEY `I_FK_USER_TRAVEL_TRAVEL` (`TRAVEL_ID`),
  CONSTRAINT `user_travel_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  CONSTRAINT `user_travel_ibfk_2` FOREIGN KEY (`TRAVEL_ID`) REFERENCES `travel` (`TRAVEL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_travel` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` char(200) DEFAULT NULL,
  `email` char(200) DEFAULT NULL,
  `number` char(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`number`) values (1,'name','email','002178875'),(2,'dorian','dprianmoaufo@gmail.com','15871432900'),(3,'andy','andy@qq.com','2000157889'),(6,'papa miss you','papa@gmail.com','002707896655'),(7,'donnateur','dorianmouafo@gmail.com','15871432900'),(8,'aaaaaaaa','aaaaaaaa','111');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
