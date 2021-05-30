-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 30, 2021 at 08:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lingolingo`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountstatuses`
--

DROP TABLE IF EXISTS `accountstatuses`;
CREATE TABLE IF NOT EXISTS `accountstatuses` (
  `IdStatus` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(45) NOT NULL,
  PRIMARY KEY (`IdStatus`),
  UNIQUE KEY `IdStatus_UNIQUE` (`IdStatus`),
  UNIQUE KEY `StatusName_UNIQUE` (`StatusName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountstatuses`
--

INSERT INTO `accountstatuses` (`IdStatus`, `StatusName`) VALUES
(1, 'Approved'),
(2, 'Pending'),
(3, 'Suspended');

-- --------------------------------------------------------

--
-- Table structure for table `gametypes`
--

DROP TABLE IF EXISTS `gametypes`;
CREATE TABLE IF NOT EXISTS `gametypes` (
  `IdGameType` int(11) NOT NULL AUTO_INCREMENT,
  `GameTypeName` varchar(45) NOT NULL,
  PRIMARY KEY (`IdGameType`),
  UNIQUE KEY `IdGameType_UNIQUE` (`IdGameType`),
  UNIQUE KEY `GameTypeName_UNIQUE` (`GameTypeName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gametypes`
--

INSERT INTO `gametypes` (`IdGameType`, `GameTypeName`) VALUES
(1, 'Basic'),
(3, 'Learning'),
(2, 'Survival');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `IdLanguage` int(11) NOT NULL AUTO_INCREMENT,
  `LanguageName` varchar(45) NOT NULL,
  PRIMARY KEY (`IdLanguage`),
  UNIQUE KEY `IdLanguage_UNIQUE` (`IdLanguage`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`IdLanguage`, `LanguageName`) VALUES
(1, 'German'),
(2, 'Spanish'),
(3, 'Italian'),
(4, 'Greek'),
(5, 'French'),
(6, 'Serbian'),
(7, 'Bulgarian'),
(9, 'Russian');

-- --------------------------------------------------------

--
-- Table structure for table `playedgames`
--

DROP TABLE IF EXISTS `playedgames`;
CREATE TABLE IF NOT EXISTS `playedgames` (
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

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`IdQuestion`, `IdLanguage`, `IdAuthor`, `QuestionText`, `AnswerText`, `IsFlagged`) VALUES
(1, 1, 5, 'Ich bin Ksenija', 'I am Ksenija', 0),
(3, 1, 5, 'Das ist toll', 'This is cool', 0),
(7, 6, 5, 'Mi smo studenti', 'We are students', 0),
(5, 1, 5, 'Ich libe dich', 'I love you', 0),
(6, 3, 5, 'Tu sei bella', 'You are beautiful', 0),
(8, 6, 5, 'Ovo radi', 'This works', 0);

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

DROP TABLE IF EXISTS `useraccounts`;
CREATE TABLE IF NOT EXISTS `useraccounts` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `IdUserType` int(11) NOT NULL,
  `IdStatus` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`),
  UNIQUE KEY `IdUser_UNIQUE` (`IdUser`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  KEY `FK_IdUserType_idx` (`IdUserType`),
  KEY `FK_IdStatus_idx` (`IdStatus`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`IdUser`, `FirstName`, `LastName`, `Username`, `Password`, `Email`, `IdUserType`, `IdStatus`) VALUES
(1, 'Milos', 'Jovanovic', 'milosjovanovic94', 'smekercina', 'milos_j194@hotmail.com', 3, 1),
(2, 'Ksenija', 'Bulatovic', 'ksendzo', '123', 'mejl@g.com', 3, 1),
(3, 'Milos', 'Cirkovic', 'cirko', 'muffinman', 'cirko@gmail.com', 2, 2),
(4, 'Marko', 'Stanojevic', 'mare', 'doktor', 'maredoktor@yahoo.com', 1, 1),
(5, 'Luka', 'Simic', 'simke', 'spacex', 'simke@hotmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

DROP TABLE IF EXISTS `usertypes`;
CREATE TABLE IF NOT EXISTS `usertypes` (
  `IdUserType` int(11) NOT NULL AUTO_INCREMENT,
  `UserTypeName` varchar(45) NOT NULL,
  PRIMARY KEY (`IdUserType`),
  UNIQUE KEY `IdUserType_UNIQUE` (`IdUserType`),
  UNIQUE KEY `UserTypeName_UNIQUE` (`UserTypeName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`IdUserType`, `UserTypeName`) VALUES
(3, 'Administrator'),
(1, 'Player'),
(2, 'Professor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
