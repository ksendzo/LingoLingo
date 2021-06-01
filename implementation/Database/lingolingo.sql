CREATE DATABASE  IF NOT EXISTS `lingolingo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lingolingo`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lingolingo
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accountstatuses`
--

DROP TABLE IF EXISTS `accountstatuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accountstatuses` (
  `IdStatus` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(45) NOT NULL,
  PRIMARY KEY (`IdStatus`),
  UNIQUE KEY `IdStatus_UNIQUE` (`IdStatus`),
  UNIQUE KEY `StatusName_UNIQUE` (`StatusName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accountstatuses`
--

LOCK TABLES `accountstatuses` WRITE;
/*!40000 ALTER TABLE `accountstatuses` DISABLE KEYS */;
INSERT INTO `accountstatuses` VALUES (1,'Approved'),(2,'Pending'),(3,'Suspended');
/*!40000 ALTER TABLE `accountstatuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gametypes`
--

DROP TABLE IF EXISTS `gametypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gametypes` (
  `IdGameType` int(11) NOT NULL AUTO_INCREMENT,
  `GameTypeName` varchar(45) NOT NULL,
  PRIMARY KEY (`IdGameType`),
  UNIQUE KEY `IdGameType_UNIQUE` (`IdGameType`),
  UNIQUE KEY `GameTypeName_UNIQUE` (`GameTypeName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gametypes`
--

LOCK TABLES `gametypes` WRITE;
/*!40000 ALTER TABLE `gametypes` DISABLE KEYS */;
INSERT INTO `gametypes` VALUES (1,'Basic'),(3,'Learning'),(2,'Survival');
/*!40000 ALTER TABLE `gametypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `IdLanguage` int(11) NOT NULL AUTO_INCREMENT,
  `LanguageName` varchar(45) NOT NULL,
  PRIMARY KEY (`IdLanguage`),
  UNIQUE KEY `IdLanguage_UNIQUE` (`IdLanguage`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'German'),(2,'Spanish'),(3,'Italian'),(4,'Greek'),(5,'French'),(6,'Serbian'),(7,'Bulgarian'),(9,'Russian');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playedgames`
--

DROP TABLE IF EXISTS `playedgames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `playedgames` (
  `IdGame` int(11) NOT NULL AUTO_INCREMENT,
  `IdUser` int(11) NOT NULL,
  `IdGameType` int(11) NOT NULL,
  `IdLanguage` int(11) NOT NULL,
  `PlayDate` date NOT NULL,
  `PointsScored` int(11) NOT NULL,
  PRIMARY KEY (`IdGame`),
  UNIQUE KEY `IdGame_UNIQUE` (`IdGame`),
  KEY `FK_IdUser_idx` (`IdUser`),
  KEY `FK_IdGameType_idx` (`IdGameType`),
  KEY `FK_IdLanguage_idx` (`IdLanguage`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playedgames`
--

LOCK TABLES `playedgames` WRITE;
/*!40000 ALTER TABLE `playedgames` DISABLE KEYS */;
/*!40000 ALTER TABLE `playedgames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `IdQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `IdLanguage` int(11) NOT NULL,
  `IdAuthor` int(11) NOT NULL,
  `QuestionText` varchar(300) NOT NULL,
  `AnswerText` varchar(300) NOT NULL,
  `IsFlagged` int(11) NOT NULL,
  PRIMARY KEY (`IdQuestion`),
  UNIQUE KEY `IdQuestion_UNIQUE` (`IdQuestion`),
  KEY `FK_IdLanguage_idx` (`IdLanguage`),
  KEY `FK_IdAuthor_idx` (`IdAuthor`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,5,'Ich bin Milos','I am Milos',0),(3,1,5,'Das ist toll','This is cool',0),(7,6,5,'Mi smo studenti','We are students',0),(5,1,5,'Ich libe dich','I love you',0),(6,3,5,'Tu sei bella','You are beautiful',0),(8,6,5,'Ovo radi','This works',0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useraccounts`
--

DROP TABLE IF EXISTS `useraccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `useraccounts` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `IdUserType` int(11) NOT NULL,
  `IdStatus` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`),
  UNIQUE KEY `IdUser_UNIQUE` (`IdUser`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  KEY `FK_IdUserType_idx` (`IdUserType`),
  KEY `FK_IdStatus_idx` (`IdStatus`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useraccounts`
--

LOCK TABLES `useraccounts` WRITE;
/*!40000 ALTER TABLE `useraccounts` DISABLE KEYS */;
INSERT INTO `useraccounts` VALUES (2,'Ksenija','Bulatovic','ksendzo','$2y$10$R62gtGMaI20.vGw8HXlOKOGDYtVGs/ETHy6yc8.dIr1iIVawgKWQW','ksendzo@lingolingo.com',3,1),(1,'Milos','Jovanovic','milosj194','$2y$10$1AQo7OUeFjQoVZwu/wbJWOcX2cYsLsBZZmsbX7sFCK0/9BXHDBGtm','milos@lingolingo.com',3,1),(3,'Milos','Cirkovic','cirko','$2y$10$Ys1wP36xjaBvW/CTxFZvJOpjzxii9.y8IHxlJjqDVIIw6XCXEm71i','cirko@lingolingo.com',2,1),(4,'Player','Test','player','$2y$10$CDr6t04H4c0i/FI5B4Y.hO1Su6x1jkgPrqMShjCEBiJuuUNIJuTsm','playertest@test.com',1,1),(5,'Professor','Test','professor','$2y$10$wQG7M9XCmXsE74J3ONDMnuMRcPlByXgsvmbhCoVwDG1Li9gd9oipO','professortest@test.com',2,2),(6,'Administrator','Test','administrator','$2y$10$jXkBii31a493htLCYkSseO9lgIZziQB5ylGG9.hJzuClgErz07NyC','administratortest@test.com',3,2);
/*!40000 ALTER TABLE `useraccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertypes`
--

DROP TABLE IF EXISTS `usertypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertypes` (
  `IdUserType` int(11) NOT NULL AUTO_INCREMENT,
  `UserTypeName` varchar(45) NOT NULL,
  PRIMARY KEY (`IdUserType`),
  UNIQUE KEY `IdUserType_UNIQUE` (`IdUserType`),
  UNIQUE KEY `UserTypeName_UNIQUE` (`UserTypeName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertypes`
--

LOCK TABLES `usertypes` WRITE;
/*!40000 ALTER TABLE `usertypes` DISABLE KEYS */;
INSERT INTO `usertypes` VALUES (3,'Administrator'),(1,'Player'),(2,'Professor');
/*!40000 ALTER TABLE `usertypes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-01 19:43:31
