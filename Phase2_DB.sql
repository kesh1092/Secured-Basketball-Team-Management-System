-- make database Phase2;
-- use Phase2; 
 
-- drop table  Staff; 
-- drop table ManagerCertificate; 
-- drop table  AssignTraining;
-- drop table Manager; 
-- drop table  Training; 
-- drop table  Stats; 
-- drop table  Play;
-- drop table  Game;  
-- drop table Player; 

 
create table Player (
    ID int unsigned not null primary key auto_increment,
    LoginID varchar(16),
    Name varchar(64) not null,
    Password varchar(8),
    Birthday date,
    Address varchar(128),
    Email varchar(32),
    PhoneNumber char(10),
    PlayerPos enum ('point guard', 'shooting guard', 'small forward', 'power forward', 'center'),
    RequestStatus varchar(16)    
);


create table Manager(
    ID int unsigned not null primary key auto_increment,
    LoginID varchar(16) not null,
    Name varchar(64) not null,
    Password varchar(8),
    Birthday date,
    Address varchar(128),
    Email varchar(32),
    PhoneNumber char(10)    
);
 
create table Staff(
    ID int,
    Name varchar(64) not null,
    Birthday date,
    Address varchar(128),
    Email varchar(32),
    PhoneNumber char(10),
    Title varchar(16) not null
);

create table ManagerCertificate(
    ManagerID int unsigned,
    CertificateID int,
    Certificate blob,
    foreign key(ManagerID) references Manager(ID)
);

create table Stats(
    PlayerID int unsigned,
    Year char(4),
    TotalPoints int,
    ASPG int,
    foreign key(PlayerID) references Player(ID)
);

create table Training(
    TrainingName varchar(16) not null primary key,
    Instruction varchar(256),
    TimePeriodinHour int not null
);

create table AssignTraining(
    PlayerID int unsigned,
    ManagerID int unsigned,
    TrainingName varchar(16),
    foreign key(PlayerID) references Player(ID),
    foreign key(ManagerID) references Manager(ID),
    foreign key(TrainingName) references Training(TrainingName)
);



create table Game(
    GameID int not null primary key auto_increment,
    Date date not null,
    Result enum('Win', 'Lose', 'Tie') not null, 
    PlayingVenue varchar(256) not null,
    OpponentTeam varchar(32) not null
);

create table Play(
    PlayerID int unsigned,
    GameID int,
    foreign key(PlayerID) references Player(ID),
    foreign key(GameID) references Game(GameID)
);

 







INSERT INTO Player (LoginID, Name, Password, Birthday, Address, Email, PhoneNumber, PlayerPos, RequestStatus) VALUES
    ('bobjones123', 'Bob Jones', 'GoNMSU', '1996/12/17', '123 Ponder Ave.', 'bobjones@nmsu.edu','5754311253','point guard', 'accepted'),
    ('todrichard342', 'Tod Richard', 'Aggies13', '1995/10/14', '1232 Nickels Ave.', 'toddster@nmsu.edu','5752323333','shooting guard', 'accepted'),
    ('jordanheith54', 'Jordan Heith', 'Tank34', '1997/11/28', '1222 Dover St.', 'jordanh@nmsu.edu','5753239843','small forward', 'pending'),
    ('brownT321', 'Tim Brown', 'Bball32', '1996/02/09', '983 Holler St.', 'timmybro@nmsu.edu','5754344993','center', 'pending'),
    ('qwer', 'Tim Brown', 'qwer', '1996/02/09', '983 Holler St.', 'timmybro@nmsu.edu','5755454993','center', 'accepted'),
    ('carterdavis2', 'Carter Davis', 'LetsGoAg', '1997/01/13', '894 Wellington Ave.', 'cdavis@nmsu.edu','5756563613','power forward', 'pending');
    

INSERT INTO Manager (LoginID, Name, Password, Birthday, Address, Email, PhoneNumber) VALUES
    ('jackhilton43', 'Jack Hiltion', 'Asked23', '1984/11/14', '320 E. Palmer Ct.', 'jackhilly@nmsu.edu','5097673213'),
    ('dannyboy', 'Danny Borwick', 'Crimson3', '1982/04/15', '3214 Lemon Dr.', 'dannyyy@nmsu.edu','5756657953'),
    ('nickvolker2', 'Nick Volker', 'Hola231', '1974/11/04', '1543 Doe St.', 'nickvolker@nmsu.edu','5757777743'),
    ('pricedr', 'Price Drake', 'Manner4', '1979/03/11', '1121 Cabing St.', 'price84@nmsu.edu','5758882223'),
    ('asdf', 'Price Drake', 'asdf', '1979/03/11', '1121 Cabing St.', 'price84@nmsu.edu','5759992223'),
    ('jimmybeam44', 'Jimmy Beam', 'Yoyo328', '1988/02/05', '164 Kilmore Ave.', 'jimbeam@nmsu.edu','5751013613');
    
    
INSERT INTO Staff (ID, Name, Birthday, Address, Email, PhoneNumber, Title) VALUES
    ('800600392', 'Tom Smith', '1998/12/15', '3628 Noice St.', 'tomsmith@nmsu.edu', '5832346953', 'Water Boy'),
    ('800599343', 'Tiffany Smith', '1990/10/17', '343 Callaway St.', 'tiffsmith3@nmsu.edu', '5753454390', 'Janitor'),
    ('800600574', 'Russell Johnson', '1987/11/18', '3728 Cameo St.', 'russjohnson212@nmsu.edu', '5754564393', 'Treasurer'),
    ('800599432', 'Tyler Doon', '1984/10/20', '342 Cogger St.', 'doony@nmsu.edu', '5755674932', 'Hotdog Sales'),
    ('800599633', 'Abby Labue', '1989/11/17', '343 Goon St.', 'abbylabue2@nmsu.edu', '5756784777', 'Ticket Sales');
    
    
INSERT INTO ManagerCertificate (ManagerID, CertificateID, Certificate) VALUES
    (1, 100233, 'cat'),
    (2, 100234, 'blob'),
    (3, 100235, 'cat3'),
    (4, 100236, 'cat2'),
    (5, 100237, 'blob');
    
    

INSERT INTO Stats (PlayerID, Year, TotalPoints, ASPG) VALUES
    (1, '2017', 240, 20),
    (2, '2017', 120, 10),
    (3, '2017', 175, 15),
    (4, '2017', 220, 20),
    (5, '2017', 190, 16);
    
    
    
INSERT INTO Training (TrainingName, Instruction, TimePeriodinHour) VALUES
    ('Push Ups', 'Get on floor and use arms to push body up', 1),
    ('Sit Ups', 'Get on floor and use abs to sit up', 2),
    ('Jumping Jacks', 'Jump up and down and spread legs and arms', 3),
    ('Jumps Squats', 'Bend your knees and jump as high as you can', 4),
    ('Sprints', 'Run 100m as fast as you can', 5);
    
    
INSERT INTO AssignTraining (PlayerID, ManagerID, TrainingName) VALUES
    (1, 1, 'Push Ups'),
    (2, 2, 'Sit Ups'),
    (3, 3, 'Jumping Jacks'),
    (4, 4, 'Jumps Squats'),
    (5, 5, 'Sprints');
    
    
INSERT INTO Game (GameID, Date, Result, PlayingVenue, OpponentTeam) VALUES
    (1000, '2017/01/01', 'Tie', 'Russell Stadium', 'California Tech Eagles'),
    (1001, '2017/01/07', 'Tie', 'Tod Stadium', 'Texas Tech Raiders'),
    (1002, '2017/01/14', 'Tie', 'Larry Stadium', 'Montana State Elephants'),
    (1003, '2017/01/21', 'Tie', 'Ice Berg Stadium', 'Maine State Ladybugs'),
    (1004, '2017/01/28', 'Tie', 'Danny Stadium', 'Florida Tech Wolves');
        
        
INSERT INTO Play (PlayerID, GameID) VALUES
    (1,1001),
    (2, 1001),
    (3, 1002),
    (4, 1003),
    (5, 1004);









