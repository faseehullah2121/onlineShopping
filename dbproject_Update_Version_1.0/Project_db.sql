CREATE DATABASE  IF NOT EXISTS `dbproject` /*!40100 DEFAULT CHARACTER SET utf8mb4  */;
USE `dbproject`;
-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: primestore
-- ------------------------------------------------------
-- Server version   8.0.12
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
 
--
-- Table structure for table `login`
--
DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4  NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4  NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8mb4  NOT NULL ,
  `lastname` varchar(20) CHARACTER SET utf8mb4  NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `shoppingcart`
--
USE `dbproject`;
DROP TABLE IF EXISTS `shoppingcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `shoppingcart` (
  `userid` int(11) NOT NULL,
  `itemname` varchar(70) CHARACTER SET utf8mb4  NOT NULL,
  `itemqty` int(70)  NOT NULL,
  `itemprice` float(20)   NOT NULL ,
  CONSTRAINT `userid_fk` FOREIGN KEY (`userid`) REFERENCES `login` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `catalog`
--
DROP TABLE IF EXISTS `catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `catalog` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(20) CHARACTER SET utf8mb4  NOT NULL,
  `itemdescription` varchar(100) CHARACTER SET utf8mb4  NOT NULL,
  `itemquantity` int(20) NOT NULL ,
  `itemprice` float(20) NOT NULL,
  `itempictpath` blob NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
 
 
insert into catalog values (1, 'audi', 'Available in black color', 10, 10024000.00, 'images/\audi.jpg') ;
insert into catalog values (2, 'IPhone_X', 'High quality Camera with gorella glass', 30, 140000.00, 'images/\IPhone_X.jpg') ;
insert into catalog values (3, 'Honor 7c', 'Available in red and black color', 60, 45000.00, 'images/\Honor 7c.jpg') ;
