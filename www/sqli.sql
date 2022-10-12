-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: ecome
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(60) NOT NULL,
  `Mngr_id` int NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Dillon','Shea','gojahuf@mailinator.com','$2y$10$SKsEUl9wVCxQikYURB6GF.rD9Q4fc1pJLhamJ/iFIYcqmWkC1140u','Preston',1),(2,'Hakeem','Mona','rukixase@mailinator.com','Pa$$w0rd!','Quinn',2),(3,'Alyssa','Wallace','doqyfa@mailinator.com','$2y$10$n/TEN1BFpa0O8jk4vyccdeG3jfeG19sg1SG740AerY5jXtyXDGLXm','Kevin',1),(4,'Alexander','Madeline','jiwykone@mailinator.com','$2y$10$5JIXGwBUAey./S/u9bHkH.wC7NWybj9GPELYGizs2zf2GTjyro/rG','Asher',1),(5,'Oscar','Ralph','pybefap@mailinator.com','$2y$10$oMV7bwDDSghmi1sKCy2neOwL.t4C3U6fPjp1PaBYOoUAGKDPDt3ju','Colorado',1),(6,'Gemma','Angela','qohired@mailinator.com','$2y$10$T04VaLOWFZViU6n2ZgYwkeanfymXSPT7dAlUcjVoWMDfJd3FxVJJ6','Susan',1),(7,'Jakeem','Finn','daxo@mailinator.com','$2y$10$8vseDEgepJvzcTE05ztSoutBJ0ePWXVQR2QLJu6fUyd0IK472wJzq','Tatyana',1),(8,'Hanna','Daquan','sevop@mailinator.com','$2y$10$ty.GSV.DSzmZ4fCQ8DPtrOxWmo7znFs0cU1EciUg9G6/Yc.cltuO2','Germane',1),(9,'Jayme','Jennifer','mowaxuj@mailinator.com','$2y$10$6ZmKt4mak5GZvEs9gvxKbOvcyQNWsv8m6XYpCiEe9FzcdiNoTYQFW','Kato',1),(10,'Melissa','Yvonne','nadaxuvemi@mailinator.com','$2y$10$O8Yd.FSLSVPih0R4Ryx2t.XcQs4LZnKh6VwQQVD.PRDNFfACMXk1m','Luke',1),(11,'Ivana','Lois','javusuh@mailinator.com','$2y$10$IxtllE/AflTyjl7UCEl6cuhoDt/coJv9sFH.ICXOts8831Nm0Ds2m','Felix',1),(12,'Jolie','Len','lurere@mailinator.com','$2y$10$DxfAwd1hBzQDxWLE/pJbjOyXj08bnCOh6pyc.pXbXhHqCuFh3Xjm.','Phoebe',1),(13,'Moana','Jared','jokolyf@mailinator.com','$2y$10$dPtK/jHdwWzFHp.bJGNSqeV4mMwdcxc8NLHQ/lVZOcdcs7/mQ.kAS','Cherokee',1),(14,'Abel','Malachi','vatesomit@mailinator.com','$2y$10$qKUXoVsuX6p4lPlPTva5o.LBzVJamI7r/zXbfHnE1CdTe9HN0q4sO','Tucker',1),(15,'ki','W','r@gmail.com','$2y$10$s42uTjFnBJzpPPTV21xh8eZ7IDuHvinHLYi6YXA7lkXg0RNK9zn7C','Ttt',1),(16,'Lacota','Peter','qurule@mailinator.com','$2y$10$8bU6r57WEAZ/HGbIa4paMuhPC4Q.hQAq.pRDi.SSFL9uY2oDiGlSK','Colorado',1),(17,'Timon','Xanthus','fabexe@mailinator.com','$2y$10$UR4em.J0.R/76/2xPwFiFOEuPS95/kUYojQI3gzyy8WP2XQXtsDHS','Janna',1),(18,'Beau','Lucius','dikyvi@mailinator.com','$2y$10$G8x/DePDzBHwI3tIzPc8.eg46IYc2zxBhrBBvF8izB1kYDaszN7Pa','Mia',1),(19,'Rashad','Adrian','suvibone@mailinator.com','$2y$10$yPuSdkg/Ulr9almDnNwdsuIieF.0J4UflSf11n7Sykof93WgkDThm','Sigourney',1),(20,'John','Vernon','syteve@mailinator.com','$2y$10$MDm/4mv0kW6MTtSVzYSYW.3fTy8Gb3yjCSZO2LbjS574gbljYrgMG','Shellie',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(45) DEFAULT NULL,
  `brand_desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (4,'Modi aut voluptatem ','Aliquip officiis Nam'),(5,'Velit voluptas hic o','Repellendus Tenetur');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `qnty` int DEFAULT NULL,
  `product_pro_id` int DEFAULT NULL,
  `customer_cust_id` int DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (23,1,NULL,1,8),(24,12,NULL,2,8),(30,4,NULL,1,10),(31,4,NULL,2,10),(42,1,NULL,1,11),(43,1,NULL,2,11);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manager` (
  `mngr_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(60) NOT NULL,
  PRIMARY KEY (`mngr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (1,'Velma','Illiana','fibogocyk@mailinator.com','Pa$$w0rd!','Ayanna'),(2,'Carolyn','Kimberly','zihoqaqo@mailinator.com','Pa$$w0rd!','Tatum'),(3,'Mia','Quin','cymezeby@mailinator.com','Pa$$w0rd!','Amery'),(4,'Beverly','Winifred','gydavow@mailinator.com','Pa$$w0rd!','Natalie'),(5,'kir','W','ki@gmail.com','12345','Dsjs'),(6,'Orla','Maite','lyvoro@mailinator.com','Pa$$w0rd!','Jamal');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `qnty` int DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `product_pro_id` int DEFAULT NULL,
  `customer_cust_id` int DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,1,'2022-06-05',5,15),(2,1,'2022-06-05',6,15);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordere`
--

DROP TABLE IF EXISTS `ordere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordere` (
  `ordere_id` int NOT NULL AUTO_INCREMENT,
  `qnty` int DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `product_pro_id` int DEFAULT NULL,
  `customer_cust_id` int DEFAULT NULL,
  PRIMARY KEY (`ordere_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordere`
--

LOCK TABLES `ordere` WRITE;
/*!40000 ALTER TABLE `ordere` DISABLE KEYS */;
INSERT INTO `ordere` VALUES (7,1,'2022-05-30',1,74);
/*!40000 ALTER TABLE `ordere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `qnty` int DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `prod_id` int DEFAULT NULL,
  `cust_id` int DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `Pro_id` int NOT NULL AUTO_INCREMENT,
  `Pro_title` varchar(45) DEFAULT NULL,
  `Pro_price` int DEFAULT NULL,
  `Pro_desc` varchar(100) DEFAULT NULL,
  `Pro_image` varchar(100) DEFAULT NULL,
  `catagory_Cat_id` int DEFAULT NULL,
  `brand_brand_id` int DEFAULT NULL,
  `admin_admin_id` int DEFAULT NULL,
  PRIMARY KEY (`Pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'317',958,'92','1653667971blue-iphone.jpg',9,3,6),(2,'230',808,'591','1653668017blue-iphone.jpg',8,3,6),(3,'594',212,'286','1653668596blue-iphone.jpg',8,3,6),(4,'170',574,'735','1654149059Screenshot from 2022-05-29 08-28-47.png',9,3,14),(5,'camera',5000,'360','1654401379highres-Canon-EOS-7D-Mark-II-with-lens-1_1411133185.jpg',8,4,19),(6,'PC',10000,'8GB','1654401689pi_ms-gp622qe-035za1.jpg',9,4,19);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `cust_id` int NOT NULL AUTO_INCREMENT,
  `first_name` tinytext,
  `last_name` tinytext,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `cust_image` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `balance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Briar','Coltonas','redirovo@mailinator.com','500000000000000','1653954732Screenshot from 2022-05-24 15-59-21.png','$2y$10$ji9SySbDnnenzpfozWouWuKsHODp18ndAV0O8COj4sN.vXQmypWc.','500000000000000000000'),(2,'Evangeline','Acton','rizoxow@mailinator.com','Irma','1653958994Screenshot from 2022-05-24 15-59-21.png','$2y$10$UrNLVWRxhBtXPTIFvzqUAOXaSMVZvoaPlZSEgHPaaG6TJ2JkeJrx2',NULL),(3,'Katell','Emi','qotako@mailinator.com','Alexis','1653983875cover.jpg','$2y$10$EFI4tz4J6/ubONKgDwJCbe4SSPXXQJX4cBI1XIZAY/PzvK7Ar7/8e',NULL),(4,'Meredith','Gary','pecec@mailinator.com','Kylan','1653989490Screenshot from 2022-05-28 05-13-01.png','$2y$10$LgXd.gu.P35sy8BVMlaeQ.F/RwTm3rEEbXfilUnl0HOzZBN4U2naa',NULL),(5,'Wilma','Clark','kazy@mailinator.com','Destiny','1654025693Screenshot from 2022-05-31 04-35-33.png','$2y$10$OOxpyCmkrqHmdGA6kvxeZ.bme1jE/muJinSpDrNzogfJ5gH5kVM9C',NULL),(6,'Clare','Chadwick','guzera@mailinator.com','Althea','1654029442Screenshot from 2022-05-31 04-35-33.png','$2y$10$Lf0HQUf/Hs9YXrm0FeVm6u9452VyyB2q6og/2e/HfwP6AOkKCQD66',NULL),(7,'Ethan','Abigail','dypuxy@mailinator.com','Reuben','1654045257photo_2022-05-24_14-00-16.jpg','$2y$10$QZEQBbrDX.6EYvsxhRWuzuRZHIkuKJPDFnzIK8WRDx9foNiFZFPbG',NULL),(8,'Carla','Margaret','ruhyzuna@mailinator.com','Tatyana','1654053995Screenshot from 2022-05-31 04-35-33.png','$2y$10$PpYroC63lcTPhfJjOuHCKOsgaWxmKJ1YkQkVr6qcphPicd9pQuPbG',NULL),(9,'Mufutau','Buffy','vaqo@mailinator.com','Sacha','1654129196Screenshot from 2022-05-28 05-13-01.png','$2y$10$yQCEZOmv.Dgu/UJw6mOIbe9GC/kfNnDj5MAYiY7tfxCQKBP6tzMwq',NULL),(11,'Hilda','Macon','cico@mailinator.com','cafSDF','1654148622Screenshot from 2022-05-24 15-59-21.png','$2y$10$oNmF5er0hFTMCceKt8ZEZ.GUDrXxloE/Au78Djn75BJJM2B05n7O6','2000'),(12,'Chaim','Keane','behojyqu@mailinator.com','Rebecca','1654230320ecommerce-850x491.jpg','$2y$10$.Q9kni80wsBWJJn53Eu82Ock9fnmnofqUh71LgAbgnRIWYhLh9VC6',NULL),(13,'Kir','W','ki@gmail.com','Dsjs','165424412916542693021804323524988726988064.jpg','$2y$10$bEy3pIv36dlqM9GxdfWVBu7R6XrfgDx0jxRQxgaO7IxO7Z.2mzFV6',NULL),(14,'Kennedy','Yael','lily@mailinator.com','Porter','1654399939oculus_rift_1.jpg','$2y$10$7FTNRId6/vLFKxrEGUa2s.OEZXXQ8Vmyb6c4M50htBuh3b0N0XETm',NULL),(15,'Kuame','Hamilton','qycabolowy@mailinator.com','Hedwig','1654403699oculus_rift_1.jpg','XXXXXXX',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-05  1:12:03
