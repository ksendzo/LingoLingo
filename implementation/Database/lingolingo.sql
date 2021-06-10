-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 10, 2021 at 07:14 PM
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
(5, 'French'),
(6, 'Serbian'),
(7, 'Czech'),
(9, 'Norwegian');

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
  `PlayDate` varchar(20) NOT NULL,
  `PointsScored` int(11) NOT NULL,
  PRIMARY KEY (`IdGame`),
  UNIQUE KEY `IdGame_UNIQUE` (`IdGame`),
  KEY `FK_IdUser_idx` (`IdUser`),
  KEY `FK_IdGameType_idx` (`IdGameType`),
  KEY `FK_IdLanguage_idx` (`IdLanguage`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playedgames`
--

INSERT INTO `playedgames` (`IdGame`, `IdUser`, `IdGameType`, `IdLanguage`, `PlayDate`, `PointsScored`) VALUES
(2, 4, 2, 1, '05-06-2021 12:26:35', 90),
(3, 4, 1, 6, '05-06-2021 12:33:10', 100),
(4, 4, 2, 6, '05-06-2021 14:47:59', 15),
(5, 17, 1, 5, '06-06-2021 21:03:39', 100),
(6, 17, 1, 5, '06-06-2021 21:03:39', 100),
(7, 17, 1, 5, '06-06-2021 21:03:39', 100),
(8, 17, 1, 5, '06-06-2021 21:03:39', 100),
(9, 17, 1, 5, '06-06-2021 21:03:39', 90),
(10, 18, 1, 3, '06-06-2021 21:03:39', 100),
(11, 18, 1, 3, '06-06-2021 21:03:39', 100),
(12, 18, 1, 3, '06-06-2021 21:03:39', 100),
(13, 18, 1, 3, '06-06-2021 21:03:39', 30),
(14, 18, 2, 3, '06-06-2021 21:03:39', 45),
(15, 18, 2, 3, '06-06-2021 21:03:39', 45),
(16, 18, 2, 3, '06-06-2021 21:03:39', 45),
(17, 24, 1, 2, '06-06-2021 21:03:39', 100),
(18, 24, 1, 2, '06-06-2021 21:03:39', 100),
(19, 24, 1, 2, '06-06-2021 21:03:39', 100),
(20, 24, 1, 2, '06-06-2021 21:03:39', 100),
(21, 24, 1, 2, '06-06-2021 21:03:39', 100),
(22, 24, 1, 2, '06-06-2021 21:03:39', 100),
(23, 24, 1, 2, '06-06-2021 21:03:39', 100),
(24, 24, 1, 2, '06-06-2021 21:03:39', 100),
(25, 24, 1, 2, '06-06-2021 21:03:39', 100),
(26, 24, 1, 2, '06-06-2021 21:03:39', 100),
(27, 24, 1, 2, '06-06-2021 21:03:39', 100),
(28, 27, 2, 2, '06-06-2021 21:03:39', 105),
(29, 27, 2, 2, '06-06-2021 21:03:39', 105),
(30, 27, 2, 2, '06-06-2021 21:03:39', 105),
(31, 27, 2, 2, '06-06-2021 21:03:39', 105),
(32, 27, 2, 2, '06-06-2021 21:03:39', 105),
(33, 27, 2, 2, '06-06-2021 21:03:39', 105),
(34, 27, 2, 2, '06-06-2021 21:03:39', 105),
(35, 27, 2, 2, '06-06-2021 21:03:39', 105),
(36, 27, 2, 2, '06-06-2021 21:03:39', 105),
(37, 27, 2, 2, '06-06-2021 21:03:39', 105),
(38, 27, 2, 2, '06-06-2021 21:03:39', 105),
(39, 31, 2, 2, '06-06-2021 21:03:39', 105),
(40, 31, 2, 2, '06-06-2021 21:03:39', 105),
(41, 31, 2, 2, '06-06-2021 21:03:39', 105),
(42, 31, 2, 2, '06-06-2021 21:03:39', 105),
(43, 31, 2, 2, '06-06-2021 21:03:39', 105),
(44, 31, 2, 2, '06-06-2021 21:03:39', 105),
(45, 31, 2, 2, '06-06-2021 21:03:39', 105),
(46, 31, 2, 2, '06-06-2021 21:03:39', 105),
(47, 31, 2, 2, '06-06-2021 21:03:39', 105),
(48, 31, 1, 2, '06-06-2021 21:03:39', 100),
(49, 31, 1, 2, '06-06-2021 21:03:39', 100),
(50, 31, 1, 2, '06-06-2021 21:03:39', 100),
(51, 31, 1, 2, '06-06-2021 21:03:39', 100),
(52, 31, 1, 2, '06-06-2021 21:03:39', 100),
(53, 31, 1, 2, '06-06-2021 21:03:39', 100),
(54, 31, 1, 2, '06-06-2021 21:03:39', 100),
(55, 31, 1, 2, '06-06-2021 21:03:39', 100),
(56, 31, 1, 2, '06-06-2021 21:03:39', 100),
(57, 31, 1, 2, '06-06-2021 21:03:39', 100),
(58, 31, 1, 2, '06-06-2021 21:03:39', 100),
(59, 31, 1, 2, '06-06-2021 21:03:39', 100),
(60, 31, 1, 2, '06-06-2021 21:03:39', 100),
(61, 31, 1, 2, '06-06-2021 21:03:39', 100),
(62, 31, 1, 2, '06-06-2021 21:03:39', 100),
(63, 36, 1, 2, '06-06-2021 21:03:39', 100),
(64, 36, 1, 2, '06-06-2021 21:03:39', 100),
(65, 36, 1, 2, '06-06-2021 21:03:39', 100),
(66, 36, 1, 2, '06-06-2021 21:03:39', 100),
(67, 36, 1, 2, '06-06-2021 21:03:39', 100),
(68, 36, 1, 2, '06-06-2021 21:03:39', 100),
(69, 36, 1, 2, '06-06-2021 21:03:39', 100),
(70, 36, 1, 2, '06-06-2021 21:03:39', 100),
(71, 36, 1, 2, '06-06-2021 21:03:39', 100),
(72, 36, 2, 4, '06-06-2021 21:03:39', 105),
(73, 36, 2, 4, '06-06-2021 21:03:39', 105),
(74, 36, 2, 4, '06-06-2021 21:03:39', 105),
(75, 36, 2, 4, '06-06-2021 21:03:39', 105),
(76, 39, 2, 4, '06-06-2021 21:03:39', 105),
(77, 39, 2, 4, '06-06-2021 21:03:39', 105),
(78, 20, 1, 4, '06-06-2021 21:03:39', 100),
(79, 20, 1, 4, '06-06-2021 21:03:39', 100),
(80, 20, 1, 4, '06-06-2021 21:03:39', 100),
(81, 4, 1, 6, '09-06-2021 15:09:20', 90),
(82, 4, 2, 6, '09-06-2021 15:10:25', 150),
(83, 4, 2, 6, '09-06-2021 15:12:11', 210),
(84, 4, 2, 6, '09-06-2021 15:12:20', 0),
(85, 4, 2, 6, '09-06-2021 15:13:05', 120);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `IdQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `IdLanguage` int(11) NOT NULL,
  `IdAuthor` int(11) NOT NULL,
  `QuestionText` varchar(300) CHARACTER SET cp1257 COLLATE cp1257_bin NOT NULL,
  `AnswerText` varchar(300) CHARACTER SET cp1257 COLLATE cp1257_bin NOT NULL,
  `IsFlagged` int(11) NOT NULL,
  PRIMARY KEY (`IdQuestion`),
  UNIQUE KEY `IdQuestion_UNIQUE` (`IdQuestion`),
  KEY `FK_IdLanguage_idx` (`IdLanguage`),
  KEY `FK_IdAuthor_idx` (`IdAuthor`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`IdQuestion`, `IdLanguage`, `IdAuthor`, `QuestionText`, `AnswerText`, `IsFlagged`) VALUES
(13, 6, 17, 'Kako si?', 'How are you?', 0),
(25, 6, 25, 'Dobar dan', 'Good afternoon', 0),
(29, 1, 5, 'Ich bin gelangweilt', 'I am bored', 0),
(27, 1, 5, 'Ich esse gerne', 'I like to eat', 0),
(28, 1, 5, 'Sprachen lernen macht Spaß!', 'Learning languages is fun!', 0),
(18, 3, 17, 'Torna a casa', 'Come back home', 0),
(19, 6, 19, 'Kako si proveo dana?nji dan?', 'How did you spend your day?', 1),
(31, 1, 5, 'Wir tanzen', 'We are dancing', 0),
(30, 1, 5, 'Das ist ein Haus', 'This is a house', 0),
(32, 1, 5, 'Es ist ein sonniger Tag', 'It\'s a sunny day', 0),
(33, 2, 5, 'Esto es una computadora', 'This is a computer', 0),
(34, 2, 5, 'El proximo', 'Next one', 1),
(35, 2, 5, 'saltar', 'jump', 0),
(36, 2, 5, 'Yo estudio todos los dķas', 'I study every day', 0),
(37, 3, 5, 'L\'Italia ha vinto!', 'Italy won!', 0),
(38, 3, 5, 'Sono una ragazza che era un ragazzo', 'I am a girl who was a boy', 0),
(39, 3, 5, 'Il mio vicino č il mio migliore amico', 'My neighbor is my best friend', 1),
(40, 3, 5, 'semplice', 'simple', 0),
(41, 3, 5, 'sbagliata', 'wrong', 1),
(42, 3, 5, 'un ragazzo', 'a boy', 0),
(43, 3, 5, 'una ragazza', 'a girl', 0),
(44, 3, 5, 'Stiamo mangiando gli spaghetti', 'We are eating spaghetti', 0),
(45, 6, 5, 'Ja se zovem...', 'My name is...', 0),
(46, 6, 5, 'Placemo', 'We are crying', 1),
(47, 6, 5, 'Mesec i zvezde', 'Moon and stars', 0),
(48, 6, 5, 'Devojka', 'Girl', 0),
(49, 6, 5, 'Dečak', 'Boy', 1),
(50, 6, 5, 'Njena kosa je crvena', 'Her hair is red', 0),
(51, 6, 5, 'Ovo je pitanje', 'This is a question', 0),
(52, 6, 5, 'Vuk jede ovcu', 'A wolf is eating a sheep', 1),
(53, 6, 5, 'Jedem parče pice', 'I am eating a slice of pizza', 1),
(54, 6, 5, 'Jedem picu', 'I\'m eating pizza', 0),
(55, 6, 5, 'Ti si lepa', 'You\'re beautiful', 0),
(56, 6, 5, 'Ja sam dečak', 'I\'m a boy', 0),
(69, 6, 5, 'To je specifično pitanje', 'That\'s a specific question', 0),
(72, 2, 5, 'Te gusta la m?sica', 'You like music', 1),
(73, 9, 5, 'Det er kaldt ute', 'It is cold outside', 0),
(74, 9, 5, 'Jeg liker snø', 'I like snow', 0),
(75, 9, 5, 'Det er typisk norsk å være god', 'It is typically Norwegian to be good', 0),
(76, 9, 5, 'Jeg danser best når jeg er full', 'I dance best when I\'m drunk', 0),
(77, 9, 5, 'Jeg vikke ha deg tilbake!', 'I do not want you back!', 0),
(78, 9, 5, 'Jeg synger på sangen du hater', 'I sing the song you hate', 0),
(79, 9, 5, 'Hun vil ha barn. Hun vil ha hund.', 'She wants children. She wants a dog.', 0),
(80, 9, 5, 'Jeg vil ha øl. Jeg vil ha fri.', 'I want a beer. I want time off.', 0),
(81, 9, 5, 'Du kan stikke å trene noen squats, jeg skal opereres.', 'You can stick to training some squats, I\'m going to have surgery.', 0),
(82, 9, 5, 'Sol, øl, smiler til kamera', 'Sun, beer, smiles for camera', 0),
(83, 9, 5, 'Lever som aldri før, gidder ikke trene, når kan operere.', 'Live like never before, do not bother to exercise, when you can operate.', 0),
(84, 7, 5, 'Zn?m milion blyštiv?ch m?st', 'I know a million glittering cities', 1),
(85, 7, 5, 'Jen t?i tečky na konci fr?z?', 'Just three dots at the end of phrases', 1),
(86, 7, 5, 'Kolik zb?v? v?ry', 'How much faith remains', 1),
(87, 7, 5, 'Jen my dva', 'Just the two of us', 0),
(88, 7, 5, 'Jsem mu psal', 'I wrote to him', 0),
(89, 7, 5, 'Tak mi slib, že jsi tu', 'So promise me you\'re here', 0),
(90, 7, 5, 'Mraky rozehnal.', 'He parted the clouds.', 0),
(91, 7, 5, 'Nebe pere se s moc?', 'The sky is washing with power', 0),
(92, 7, 5, 'Milovat, malovat', 'Love, paint', 0),
(93, 7, 5, 'Pochopit, odpustit', 'Understand, forgive', 0),
(106, 1, 5, 'Es ist nicht deine Schuld, dass die Welt ist wie sie ist, es wär nur deine Schuld wenn sie so bleibt.', 'It is not your fault that the world is the way it is, it would only be your fault if it stays that way.', 0),
(105, 1, 5, 'Hast du dich heute schon geärgert?', 'Did you get annoyed today?', 0),
(95, 5, 5, 'Et l\'on saura donner ce que l\'on a de meilleur', 'And we will know how to give the best we have', 0),
(96, 5, 5, 'Comme l\'oiseau bleu survolant la Terre', 'Like the blue bird flying over the earth', 0),
(97, 5, 5, 'Vois comme le monde, le monde est beau', 'See how the world is, the world is beautiful', 0),
(98, 5, 5, 'L\'amour c\'est toi, l\'amour c\'est moi', 'Love is you, love is me', 0),
(99, 5, 5, 'L\'oiseau c\'est toi, l\'enfant c\'est moi', 'The bird is you, the child is me', 0),
(100, 5, 5, 'Beau le bateau, dansant sur les vagues', 'Beautiful the boat, dancing on the waves', 0),
(101, 5, 5, 'Ivre de vie, d\'amour et de vent', 'Drunk with life, love and wind', 0),
(102, 5, 5, 'On dessine tout ce que l\'on voudrait dire', 'We draw everything we want to say', 0),
(103, 5, 5, 'Tout s\'efface', 'Everything disappears', 0),
(104, 5, 5, 'Un beau jour sur le monde endormi', 'A beautiful day on the sleeping world', 0),
(107, 1, 5, 'Ich tanz\' vor Freude, über den Asphalt', 'I dance for joy across the asphalt', 0),
(108, 1, 5, 'Über die Brücken, bis hin zu der Musik', 'Over the bridges to the music', 0),
(109, 1, 5, 'Wir stehen nicht still für eine ganze Nacht', 'We don\'t stand still for a whole night', 0),
(110, 1, 5, 'In dieser Nacht der Nächte, die uns so viel verspricht', 'In that night of nights, that promises us so much', 0),
(111, 1, 5, 'Kein Ende ist in Sicht', 'There is no end in sight', 0),
(112, 1, 5, 'Wir waren geboren um zu leben ', 'We were born to live', 0),
(113, 1, 5, 'Im Gehirn total krank', 'Totally sick in the brain', 0),
(114, 1, 5, 'Sechseinhalb Tausend Sprachen, ich versuche sie zu verstehen.', 'Six and a half thousand languages, I try to understand them.', 0),
(115, 3, 5, 'E il cielo piano piano qua diventa trasparente', 'And the sky slowly becomes transparent here', 0),
(116, 3, 5, 'Voglio arrivare dove l\'occhio umano si interrompe', 'I want to get to where the human eye stops', 0),
(117, 3, 5, 'Anche gli angeli, a volte, han paura della morte', 'Even the angels, at times, are afraid of death', 0),
(118, 3, 5, 'Quindi Marlena torna a casa che ho paura di sparire', 'So Marlena come back home I\'m afraid of disappearing', 0),
(119, 3, 5, 'Come l\'aria mi respirerai', 'Like air you\'ll breathe me', 0),
(120, 3, 5, 'Adesso lasciami credere che questo sia reale', 'Now let me believe that this is real', 0),
(121, 3, 5, 'Perché ti sento lontana, lontana da me', 'Because I feel you far away, far away from me', 0),
(122, 3, 5, 'Marlena portami a casa che il tuo sorriso ? stupendo', 'Marlena, take me home because your smile is wonderful', 0),
(123, 3, 5, 'Buonasera signore e signori', 'Good evening, ladies and gentlemen', 0),
(124, 3, 5, 'Fuori gli attori', 'Out, all the fake people', 0),
(125, 3, 5, 'Parla la gente, purtroppo, parla', 'People talk, unfortunately, they talk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

DROP TABLE IF EXISTS `useraccounts`;
CREATE TABLE IF NOT EXISTS `useraccounts` (
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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`IdUser`, `FirstName`, `LastName`, `Username`, `Password`, `Email`, `IdUserType`, `IdStatus`) VALUES
(2, 'Ksenija', 'Bulatovic', 'ksendzo', '$2y$10$R62gtGMaI20.vGw8HXlOKOGDYtVGs/ETHy6yc8.dIr1iIVawgKWQW', 'ksendzo@lingolingo.com', 3, 1),
(1, 'Milos', 'Jovanovic', 'milosj194', '$2y$10$1AQo7OUeFjQoVZwu/wbJWOcX2cYsLsBZZmsbX7sFCK0/9BXHDBGtm', 'milos@lingolingo.com', 3, 1),
(3, 'Milos', 'Cirkovic', 'cirko', '$2y$10$Ys1wP36xjaBvW/CTxFZvJOpjzxii9.y8IHxlJjqDVIIw6XCXEm71i', 'cirko@lingolingo.com', 2, 1),
(4, 'Player', 'Test', 'player', '$2y$10$CDr6t04H4c0i/FI5B4Y.hO1Su6x1jkgPrqMShjCEBiJuuUNIJuTsm', 'playertest@test.com', 1, 1),
(5, 'Professor', 'Test', 'professor', '$2y$10$wQG7M9XCmXsE74J3ONDMnuMRcPlByXgsvmbhCoVwDG1Li9gd9oipO', 'professortest@test.com', 2, 1),
(7, 'Stefan', 'Jovanovic', 'stefanc++', '$2y$10$w2uQ6UHNo7EOSp5HaieN4.fwuoODFkIF1cp1JWNqhEMpvalJzULcm', 'stefan@rc.com', 1, 1),
(9, 'Nalog za Approve', 'Test', 'naZaApprove', '$2y$10$w1Zrxssd3FAsH6TAcHGP0u7ZoQzgQg8yZWynXtbkPgHX6ilSww9Qu', 'mejl@mejl.com', 2, 1),
(8, 'Irina', 'Bulatovic', 'irinab', '$2y$10$6sXMDzVmi25GQzvtWSauI.y/6GZO6yz2b4.YqyUCpGHBq9aEcVu2m', 'irina@rc.com', 2, 1),
(11, 'Lazar', 'Davidovic', 'zola', '$2y$10$XKuuDkdpxnZtvZYSlDBUN.VpVEFJhAbMCC5fin4En6SiJrxI.QBCO', 'zola@rc.com', 2, 1),
(12, 'Milisav', 'Jovanovic', 'miki_rc', '$2y$10$xglP/7xk2.bomOXD0qgfheKTG0hsyAs008wBF6N/qOBQaHS0Z.kqW', 'milisav@rc.com', 3, 1),
(13, 'Adrijana', 'Jovanovic', 'adri', '$2y$10$fWgqJG6mMqRrhEDd8IfjbuKcsTF2mHPBS5LDaZvncm/JHaExnP482', 'adri@gmail.com', 1, 1),
(14, 'Suzana', 'Jovanovic', 'suzi', '$2y$10$8ZF2UAoSSresA2GUf./mxOM1YXDw9EomHoxlKZ4TP7F7uarpHU4ja', 'suzi@g.com', 3, 1),
(15, 'Drazen', 'Draskovic', 'drasko', '$2y$10$LG2REcoAgtrS4vCsD/zXAeyZloSqQ.D2o71.51eBAyurm3BEZJhYa', 'drasko@etf.rs', 2, 2),
(16, 'Hajde', 'Da', 'li', '$2y$10$Maz.9W7htLbU.2CxqyOlF.5VAJ924QvDwcakYuwH2GiMhC12qrg62', 'ra@dis.com', 2, 2),
(17, 'Luka', 'Simic', 'simke98', '$2y$10$pRUrVFPpak2QyaeGhGLnbuqo2zT.qt0H620vbhohS2c9g5/mdZoGm', 'luka@hotmail.com', 2, 1),
(18, 'Aleksandar', 'Zdravkovic', 'pajgla', '$2y$10$1QWqvopJrU/fjG95u2eVDOOwYK32bKDghLZRGl3sqP.BrCper.Sje', 'pajgla00@gmail.com', 1, 1),
(19, 'Stanko', 'Madzar', 'stanko', '$2y$10$kCSwVsfQWJcNWVklTUTNju/AqpVeGhSEY4Qeu21Mhc./.WQaw6DgK', 'stanko@ubisoft.com', 2, 1),
(20, 'Nikola', 'Blagojevic', 'nikola2107', '$2y$10$sM/rJUEYiIlp2P2cssVg0ef.sK3HAKm4ojtO5Z3eSPlHZQhPNhJK.', 'nikola2107@hotmail.com', 1, 1),
(21, 'Miki', 'Jovanovic', 'milisavrc', '$2y$10$97kSLrfm0/NgAZy.KA2.juIcf70h5KpeyR4dF39Tn97I0piXvK3P2', 'gfsgf', 3, 1),
(27, 'Petar', 'Kolic', 'petar', '$2y$10$.OIoTrqyBPpRcUPPdu7lpOyRFD45iRk5fHDFQvKcgO8qUjCUjSHqK', 'petar@gmail.com', 1, 1),
(23, 'Miroslav', 'Gavrilov', 'mika', '$2y$10$uydiisYNXzWz5/9KlbYaXuWCOzU0/pOmn5hhNJozi6YWll/0A.ORq', 'mika@mika.com', 2, 1),
(24, 'Radoslav', 'Puhalovic', 'radoslav', '$2y$10$3iUu9QebVXMqeZM3SHDLj.C52R4RMkG3B5bPTDeJqLkYMTCYBspbW', 'radoslav@gmail.com', 1, 1),
(25, 'Ivana', 'Puhalovic', 'ivana', '$2y$10$OOMhHgv5YdHx1X1vrMw78.IX9JnnHR43qVHX3ag/kkxx9KGJamAmK', 'ivana@hotmail.com', 2, 1),
(26, 'Jovana', 'Puhalovic', 'jovanap', '$2y$10$mxJj.myYa8BD8I4S9jXu7Ow9Q4llt21xoIKnMhElcKRzWJ8BWJ0pq', 'jovanap@hotmail.com', 2, 1),
(28, 'Stefan', 'Markovic', 'markes', '$2y$10$T2T/LPMVlQg7Qv0mWWzAXeCAhiqpHEXh2tcNBAz4PPHsV6SNeMNdi', 'markes@gmail.com', 1, 1),
(29, 'Lazar', 'Davidovic', 'laki', '$2y$10$ikJw3781Z.KfgvvKESNlauuxiVXe2b4KPcX2QRJH.f.4MXCIjQo6.', 'laki@hotmail.com', 1, 1),
(30, 'Tabla', 'Sundjercic', 'suki', '$2y$10$GoXH1j5C3cJ4lJRyegEOfu.x0NmRT0.VtKjb/ZXO2A6Vvl0pC7rCy', 'kreda@gmail.com', 1, 1),
(31, 'Jagoda', 'Vukovic', 'vocka', '$2y$10$vgAk.NWhBaBddeQ1zpdY9.xhNoo.L1MQVAZe23VUcYDupAgQrzn2S', 'vocka@gmail.com', 1, 1),
(32, 'Luka', 'Davidovic', 'luka.davidovic', '$2y$10$aU07VRbUFDJbRstwfIZ/qufj3NMZ933.BEA0BJQA.hxLAhg8aLrjy', 'luka@kraljevo.com', 1, 1),
(33, 'Ivan', 'Mitrovic', 'donkrusevca', '$2y$10$5.7BY7IAfBB8Uevob4YnMuz8YQuqHLmytU1TnL8aVsEzxEip3wYUW', 'donkrusevca@hotmail.com', 1, 1),
(34, 'Mitar', 'Miric', 'tarmiricmi', '$2y$10$T3eBNL0PyR01ak4hV3/JW.u.SydA3dWaNe98dEybHoOIj1yjOk.Tu', 'mitar@gmail.com', 1, 1),
(35, 'Lepa', 'Brena', 'lepalukic', '$2y$10$FTcz/yu292OUhIe/ILmzHOtKLskTfGWAxAdhnCXbTYVtSjnaumOqG', 'lepa@gmail.com', 1, 1),
(36, 'Zdravko', 'Colic', 'cola', '$2y$10$cKvIwZXaGIDQ.qPgJNa9ouaXpcFde3Y9Ea7p/FngMzDOv9nrNsuKO', 'cola@pink.com', 1, 1),
(37, 'Brighton', 'Valentine', 'bv', '$2y$10$DtaF5AWs33ObGrEZxZEyC.qTveXgg6uM5b0W0ZUCY2AD5luig0wjK', 'bv@gmail.com', 1, 1),
(38, 'Stefan', 'Peric', 'peki', '$2y$10$pldKv5QrzMGJA8wN/kB3xOLld65hJrfBzeaSWhDuMpiVKESk5D5ku', 'peki@gmail.com', 1, 1),
(39, 'Kaca', 'Plavusa', 'kacaplavusa', '$2y$10$la1LJ9HFLF8/nx4aoJ/vd.SSwfm4sGUNxTXpRv4idfNJ5UJSW96Xe', 'kacaplavuca@cirko.com', 1, 1),
(40, 'Ana', 'Erceg', 'anaercegica', '$2y$10$lgwSSrtrpXOHTWArJH9U3OpzY7RfP/SRNgimKUmfZODyrM8i4KNWq', 'anaerceg@gmail.com', 1, 1),
(41, 'Jana', 'Stanisic', 'jana98', '$2y$10$.g7Ne73CW5CKaBFGoVWQcu0xz0GL8z1.JwWBa6kAdudK9w3iMvi/G', 'jana98@gmail.com', 1, 1),
(42, 'Petar', 'Pavlovic', 'petarPav', '$2y$10$8LzN7uZe2eHHIVT3Kow9GOwL2KMBBUUfVbrcu.3GGlZofpSCdKcCC', 'petarPav@gmail.com', 1, 1),
(43, 'Nikola', 'Petrovic', 'nikolaP', '$2y$10$vu0/ojYYQyixMfOxyibX2ulUMqYYdsj/2VFIwL4trhDPmeQT6OF6i', 'nikola.petrovic@gmail.com', 1, 1),
(44, 'Marko', 'Makic', 'mikiMilan', '$2y$10$4.77frVmw6k6AXbbt4hqk.2Gzo7WP30hsjsbqWkvQTywyjJhbcltu', 'naki97@gmail.com', 2, 2);

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
