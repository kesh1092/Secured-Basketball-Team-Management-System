--
-- Database: `Phase2`
--

-- --------------------------------------------------------
MAKE DATABASE Phase2_DB;
USE Phase2_DB; 


--
-- Table structure for table `assigntraining`
--

CREATE TABLE `assigntraining` (
  `PlayerID` int(10) UNSIGNED DEFAULT NULL,
  `ManagerID` int(10) UNSIGNED DEFAULT NULL,
  `TrainingName` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assigntraining`
--

INSERT INTO `assigntraining` (`PlayerID`, `ManagerID`, `TrainingName`) VALUES
(1, 1, 'Push Ups'),
(2, 2, 'Sit Ups'),
(3, 3, 'Jumping Jacks'),
(4, 4, 'Jumps Squats'),
(5, 5, 'Sprints');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `GameID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Result` enum('Win','Lose','Tie') NOT NULL,
  `PlayingVenue` varchar(256) NOT NULL,
  `OpponentTeam` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`GameID`, `Date`, `Result`, `PlayingVenue`, `OpponentTeam`) VALUES
(1000, '2017-01-01', 'Win', 'Russell Stadium', 'Cowboys'),
(1001, '2017-01-01', 'Lose', 'Russell Stadium', 'Bears'),
(1002, '2020-01-01', 'Win', 'Russell Stadium', 'Cowboys'),
(1003, '2020-01-01', 'Lose', 'Russell Stadium', 'Pirates');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ID` int(10) UNSIGNED NOT NULL,
  `LoginID` varchar(16) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Password` varchar(8) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Address` varchar(128) DEFAULT NULL,
  `Email` varchar(32) DEFAULT NULL,
  `PhoneNumber` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`ID`, `LoginID`, `Name`, `Password`, `Birthday`, `Address`, `Email`, `PhoneNumber`) VALUES
(1, 'jackhilton43', 'Jack Hiltion', 'Asked23', '1984-11-14', '320 E. Palmer Ct.', 'jackhilly@nmsu.edu', '509-3213'),
(2, 'dannyboy', 'Danny Borwick', 'Crimson3', '1982-04-15', '3214 Lemon Dr.', 'dannyyy@nmsu.edu', '575-7953'),
(3, 'nickvolker2', 'Nick Volker', 'Hola231', '1974-11-04', '1543 Doe St.', 'nickvolker@nmsu.edu', '575-7743'),
(4, 'pricedr', 'Price Drake', 'Manner4', '1979-03-11', '1121 Cabing St.', 'price84@nmsu.edu', '575-2223'),
(5, 'jimmybeam44', 'Jimmy Beam', 'Yoyo328', '1988-02-05', '164 Kilmore Ave.', 'jimbeam@nmsu.edu', '575-3613');

-- --------------------------------------------------------

--
-- Table structure for table `managercertificate`
--

CREATE TABLE `managercertificate` (
  `ManagerID` int(10) UNSIGNED DEFAULT NULL,
  `CertificateID` int(11) DEFAULT NULL,
  `Certificate` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `managercertificate`
--

INSERT INTO `managercertificate` (`ManagerID`, `CertificateID`, `Certificate`) VALUES
(1, 100233, 0x636174),
(2, 100234, 0x626c6f62),
(3, 100235, NULL),
(4, 100236, NULL),
(5, 100237, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `play`
--

CREATE TABLE `play` (
  `PlayerID` int(10) UNSIGNED DEFAULT NULL,
  `GameID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `play`
--

INSERT INTO `play` (`PlayerID`, `GameID`) VALUES
(1, 1000),
(2, 1000),
(3, 1001),
(4, 1001),
(1, 1002),
(2, 1002),
(5, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `ID` int(10) UNSIGNED NOT NULL,
  `LoginID` varchar(16) DEFAULT NULL,
  `Name` varchar(64) NOT NULL,
  `Password` varchar(8) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Address` varchar(128) DEFAULT NULL,
  `Email` varchar(32) DEFAULT NULL,
  `PhoneNumber` char(10) DEFAULT NULL,
  `PlayPos` enum('point guard','shooting guard','small forward','power forward','center') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`ID`, `LoginID`, `Name`, `Password`, `Birthday`, `Address`, `Email`, `PhoneNumber`, `PlayPos`) VALUES
(1, 'bobjones123', 'Bob Jones', 'GoNMSU', '1996-12-17', '123 Ponder Ave.', 'bobjones@nmsu.edu', '575-43253', 'point guard'),
(2, 'todrichard342', 'Tod Richard', 'Aggies13', '1995-10-14', '1232 Nickels Ave.', 'toddster@nmsu.edu', '575-3333', 'shooting guard'),
(3, 'jordanheith54', 'Jordan Heith', 'Tank34', '1997-11-28', '1222 Dover St.', 'jordanh@nmsu.edu', '575-9843', 'small forward'),
(4, 'brownT321', 'Tim Brown', 'Bball32', '1996-02-09', '983 Holler St.', 'timmybro@nmsu.edu', '575-4993', 'center'),
(5, 'carterdavis2', 'Carter Davis', 'LetsGoAg', '1997-01-13', '894 Wellington Ave.', 'cdavis@nmsu.edu', '575-3613', 'power forward');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(11) DEFAULT NULL,
  `Name` varchar(64) NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Address` varchar(128) DEFAULT NULL,
  `Email` varchar(32) DEFAULT NULL,
  `PhoneNumber` char(10) DEFAULT NULL,
  `Title` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `Name`, `Birthday`, `Address`, `Email`, `PhoneNumber`, `Title`) VALUES
(800600392, 'Tom Smith', '1998-12-15', '3628 Noice St.', 'tomsmith@nmsu.edu', '583-6953', 'Water Boy'),
(800599343, 'Tiffany Smith', '1990-10-17', '343 Callaway St.', 'tiffsmith3@nmsu.edu', '575-4390', 'Janitor'),
(800600574, 'Russell Johnson', '1987-11-18', '3728 Cameo St.', 'russjohnson212@nmsu.edu', '575-4393', 'Treasurer'),
(800599432, 'Tyler Doon', '1984-10-20', '342 Cogger St.', 'doony@nmsu.edu', '575-4932', 'Hotdog Sales'),
(800599633, 'Abby Labue', '1989-11-17', '343 Goon St.', 'abbylabue2@nmsu.edu', '575-4777', 'Ticket Sales');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `PlayerID` int(10) UNSIGNED DEFAULT NULL,
  `Year` char(4) DEFAULT NULL,
  `TotalPoints` int(11) DEFAULT NULL,
  `ASPG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`PlayerID`, `Year`, `TotalPoints`, `ASPG`) VALUES
(1, '2017', 240, 20),
(2, '2017', 120, 10),
(3, '2017', 175, 15),
(4, '2017', 220, 20),
(5, '2017', 190, 16);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `TrainingName` varchar(16) NOT NULL,
  `Instruction` varchar(256) DEFAULT NULL,
  `TimePeriodinHour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`TrainingName`, `Instruction`, `TimePeriodinHour`) VALUES
('Jumping Jacks', 'Jump up and down and spread legs and arms', 3),
('Jumps Squats', 'Bend your knees and jump as high as you can', 4),
('Push Ups', 'Get on floor and use arms to push body up', 1),
('Sit Ups', 'Get on floor and use abs to sit up', 2),
('Sprints', 'Run 100m as fast as you can', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigntraining`
--
ALTER TABLE `assigntraining`
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `ManagerID` (`ManagerID`),
  ADD KEY `TrainingName` (`TrainingName`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `managercertificate`
--
ALTER TABLE `managercertificate`
  ADD KEY `ManagerID` (`ManagerID`);

--
-- Indexes for table `play`
--
ALTER TABLE `play`
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `GameID` (`GameID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD KEY `PlayerID` (`PlayerID`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`TrainingName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigntraining`
--
ALTER TABLE `assigntraining`
  ADD CONSTRAINT `assigntraining_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `crud_old`.`player` (`ID`),
  ADD CONSTRAINT `assigntraining_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `crud_old`.`manager` (`ID`),
  ADD CONSTRAINT `assigntraining_ibfk_3` FOREIGN KEY (`TrainingName`) REFERENCES `crud_old`.`training` (`TrainingName`);

--
-- Constraints for table `managercertificate`
--
ALTER TABLE `managercertificate`
  ADD CONSTRAINT `managercertificate_ibfk_1` FOREIGN KEY (`ManagerID`) REFERENCES `crud_old`.`manager` (`ID`);

--
-- Constraints for table `play`
--
ALTER TABLE `play`
  ADD CONSTRAINT `play_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `crud_old`.`player` (`ID`),
  ADD CONSTRAINT `play_ibfk_2` FOREIGN KEY (`GameID`) REFERENCES `crud_old`.`game` (`GameID`);

--
-- Constraints for table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `crud_old`.`player` (`ID`);
