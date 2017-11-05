--
-- Database: `Phase2`
--

-- --------------------------------------------------------
MAKE DATABASE Phase2;
USE Phase2; 


--
-- Table structure for table `AssignTraining`
--

CREATE TABLE `AssignTraining` (
  `PlayerID` int(10) UNSIGNED DEFAULT NULL,
  `ManagerID` int(10) UNSIGNED DEFAULT NULL,
  `TrainingName` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AssignTraining`
--

INSERT INTO `AssignTraining` (`PlayerID`, `ManagerID`, `TrainingName`) VALUES
(1, 1, 'Push Ups'),
(2, 2, 'Sit Ups'),
(3, 3, 'Jumping Jacks'),
(4, 4, 'Jumps Squats'),
(5, 5, 'Sprints');

-- --------------------------------------------------------

--
-- Table structure for table `Game`
--

CREATE TABLE `Game` (
  `GameID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Result` enum('Win','Lose','Tie') NOT NULL,
  `PlayingVenue` varchar(256) NOT NULL,
  `OpponentTeam` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Game`
--

INSERT INTO `Game` (`GameID`, `Date`, `Result`, `PlayingVenue`, `OpponentTeam`) VALUES
(1000, '2017-01-01', 'Win', 'Russell Stadium', 'Cowboys'),
(1001, '2017-01-01', 'Lose', 'Russell Stadium', 'Bears'),
(1002, '2020-01-01', 'Win', 'Russell Stadium', 'Cowboys'),
(1003, '2020-01-01', 'Lose', 'Russell Stadium', 'Pirates');

-- --------------------------------------------------------

--
-- Table structure for table `Manager`
--

CREATE TABLE `Manager` (
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
-- Dumping data for table `Manager`
--

INSERT INTO `Manager` (`ID`, `LoginID`, `Name`, `Password`, `Birthday`, `Address`, `Email`, `PhoneNumber`) VALUES
(1, 'jackhilton43', 'Jack Hiltion', 'Asked23', '1984-11-14', '320 E. Palmer Ct.', 'jackhilly@nmsu.edu', '509-3213'),
(2, 'dannyboy', 'Danny Borwick', 'Crimson3', '1982-04-15', '3214 Lemon Dr.', 'dannyyy@nmsu.edu', '575-7953'),
(3, 'nickvolker2', 'Nick Volker', 'Hola231', '1974-11-04', '1543 Doe St.', 'nickvolker@nmsu.edu', '575-7743'),
(4, 'pricedr', 'Price Drake', 'Manner4', '1979-03-11', '1121 Cabing St.', 'price84@nmsu.edu', '575-2223'),
(5, 'jimmybeam44', 'Jimmy Beam', 'Yoyo328', '1988-02-05', '164 Kilmore Ave.', 'jimbeam@nmsu.edu', '575-3613'),
(6, 'asdf', 'Jimmy Beam', 'asdf', '1988-02-05', '164 Kilmore Ave.', 'jimbeam@nmsu.edu', '575-3613');

-- --------------------------------------------------------

--
-- Table structure for table `ManagerCertificate`
--

CREATE TABLE `ManagerCertificate` (
  `ManagerID` int(10) UNSIGNED DEFAULT NULL,
  `CertificateID` int(11) DEFAULT NULL,
  `Certificate` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ManagerCertificate`
--

INSERT INTO `ManagerCertificate` (`ManagerID`, `CertificateID`, `Certificate`) VALUES
(1, 100233, 'blob1'),
(2, 100234, 'blob2'),
(3, 100235, 'blob3'),
(4, 100236, 'blob4'),
(5, 100237, 'blob5');

-- --------------------------------------------------------

--
-- Table structure for table `Play`
--

CREATE TABLE `Play` (
  `PlayerID` int(10) UNSIGNED DEFAULT NULL,
  `GameID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Play`
--

INSERT INTO `Play` (`PlayerID`, `GameID`) VALUES
(1, 1000),
(2, 1000),
(3, 1001),
(4, 1001),
(1, 1002),
(2, 1002),
(5, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `Player`
--

CREATE TABLE `Player` (
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
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`ID`, `LoginID`, `Name`, `Password`, `Birthday`, `Address`, `Email`, `PhoneNumber`, `PlayPos`) VALUES
(1, 'bobjones123', 'Bob Jones', 'GoNMSU', '1996-12-17', '123 Ponder Ave.', 'bobjones@nmsu.edu', '575-43253', 'point guard'),
(2, 'todrichard342', 'Tod Richard', 'Aggies13', '1995-10-14', '1232 Nickels Ave.', 'toddster@nmsu.edu', '575-3333', 'shooting guard'),
(3, 'jordanheith54', 'Jordan Heith', 'Tank34', '1997-11-28', '1222 Dover St.', 'jordanh@nmsu.edu', '575-9843', 'small forward'),
(4, 'brownT321', 'Tim Brown', 'Bball32', '1996-02-09', '983 Holler St.', 'timmybro@nmsu.edu', '575-4993', 'center'),
(5, 'carterdavis2', 'Carter Davis', 'LetsGoAg', '1997-01-13', '894 Wellington Ave.', 'cdavis@nmsu.edu', '575-3613', 'power forward'),
(6, 'qwer', 'Carter Davis', 'qwer', '1997-01-13', '894 Wellington Ave.', 'cdavis@nmsu.edu', '575-3613', 'power forward');

-- --------------------------------------------------------

--
-- Table structure for table `Stats`
--

CREATE TABLE `Stats` (
  `PlayerID` int(10) UNSIGNED DEFAULT NULL,
  `Year` char(4) DEFAULT NULL,
  `TotalPoints` int(11) DEFAULT NULL,
  `ASPG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Stats`
--

INSERT INTO `Stats` (`PlayerID`, `Year`, `TotalPoints`, `ASPG`) VALUES
(1, '2017', 240, 20),
(2, '2017', 120, 10),
(3, '2017', 175, 15),
(4, '2017', 220, 20),
(5, '2017', 190, 16);

-- --------------------------------------------------------

--
-- Table structure for table `Training`
--

CREATE TABLE `Training` (
  `TrainingName` varchar(16) NOT NULL,
  `Instruction` varchar(256) DEFAULT NULL,
  `TimePeriodinHour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Training`
--

INSERT INTO `Training` (`TrainingName`, `Instruction`, `TimePeriodinHour`) VALUES
('Jumping Jacks', 'Jump up and down and spread legs and arms', 3),
('Jumps Squats', 'Bend your knees and jump as high as you can', 4),
('Push Ups', 'Get on floor and use arms to push body up', 1),
('Sit Ups', 'Get on floor and use abs to sit up', 2),
('Sprints', 'Run 100m as fast as you can', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AssignTraining`
--
ALTER TABLE `AssignTraining`
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `ManagerID` (`ManagerID`),
  ADD KEY `TrainingName` (`TrainingName`);

--
-- Indexes for table `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `Manager`
--
ALTER TABLE `Manager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ManagerCertificate`
--
ALTER TABLE `ManagerCertificate`
  ADD KEY `ManagerID` (`ManagerID`);

--
-- Indexes for table `Play`
--
ALTER TABLE `Play`
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `GameID` (`GameID`);

--
-- Indexes for table `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Stats`
--
ALTER TABLE `Stats`
  ADD KEY `PlayerID` (`PlayerID`);

--
-- Indexes for table `Training`
--
ALTER TABLE `Training`
  ADD PRIMARY KEY (`TrainingName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Manager`
--
ALTER TABLE `Manager`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Player`
--
ALTER TABLE `Player`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `AssignTraining`
--
ALTER TABLE `AssignTraining`
  ADD CONSTRAINT `AssignTraining_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `Phase2_DB`.`Player` (`ID`),
  ADD CONSTRAINT `AssignTraining_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `Phase2_DB`.`Manager` (`ID`),
  ADD CONSTRAINT `AssignTraining_ibfk_3` FOREIGN KEY (`TrainingName`) REFERENCES `Phase2_DB`.`Training` (`TrainingName`);

--
-- Constraints for table `ManagerCertificate`
--
ALTER TABLE `ManagerCertificate`
  ADD CONSTRAINT `ManagerCertificate_ibfk_1` FOREIGN KEY (`ManagerID`) REFERENCES `Phase2_DB`.`Manager` (`ID`);

--
-- Constraints for table `Play`
--
ALTER TABLE `Play`
  ADD CONSTRAINT `Play_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `Phase2_DB`.`Player` (`ID`),
  ADD CONSTRAINT `Play_ibfk_2` FOREIGN KEY (`GameID`) REFERENCES `Phase2_DB`.`Game` (`GameID`);

--
-- Constraints for table `Stats`
--
ALTER TABLE `Stats`
  ADD CONSTRAINT `Stats_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `Phase2_DB`.`Player` (`ID`);
