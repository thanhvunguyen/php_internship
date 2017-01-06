-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: testdb
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_staff` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) CHARACTER SET big5 NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `email` varchar(45) CHARACTER SET big5 NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'MD04','Tran Thanh','47 DOng Ke, Lien Chieu, Da Nang, Viet Nam','0973218967','tranthanh@gmail.com','1995-12-20'),(2,'MD05','Tran Thanh','47 Dong Ke, Lien Chieu, Da Nang','0973218967','tranthanh@gmail.com.vn','1997-03-27'),(3,'MD06','tran thanh','47 DOng Ke, Lien Chieu, Da Nang','0973218967','tranthanh@gmail.com','1998-03-27'),(4,'MD02','Thanh Tran','47 DOng Ke, Lien Chieu, Da Nang, Viet Nam','0973218967','tranthanh.it.95@gmail.com','2014-02-22'),(5,'MD07','Tran Thanh','47 Dong Ke, Lien Chieu, Da Nang','01633342525','tranthanh123@gmail.com','1992-01-04'),(6,'MD07','Tran Thanh','47 Dong Ke, Lien Chieu, Da Nang','01633342525','tranthanh123@gmail.com','1995-12-20');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2017-01-04 15:12:20
