CREATE TABLE Player ( ID INT NOT NULL primary key AUTO_INCREMENT,
                        LoginID varchar(16),
                        Password varchar(40),
                        Name varchar(64) not null,
                        Birthday date,
                        Address varchar(128),
                        Email varchar(32),
                        PhoneNumber char(10),
                        PlayPos enum ('point guard', 'shooting guard', 'small forward', 'power forward', 'center')
                       );   


CREATE TABLE Stats (
    PlayerID INT,
    Year char(4),
    TotalPoints int,
    ASPG int,
    foreign key(PlayerID) references Player(ID)
);


CREATE TABLE Training (
    TrainingName varchar(16) not null primary key,
    Instruction varchar(256),
    TimePeriodinHour int not null
);

CREATE TABLE Manager (
    ID int not null primary key auto_increment,
    LoginID varchar(16) not null,
    Name varchar(64) not null,
    Password varchar(8),
    Birthday date,
    Address varchar(128),
    Email varchar(32),
    PhoneNumber char(10)    
);

CREATE TABLE AssignTraining (
    PlayerID int,
    ManagerID int,
    TrainingName varchar(16),
    foreign key(PlayerID) references Player(ID),
    foreign key(ManagerID) references Manager(ID),
    foreign key(TrainingName) references Training(TrainingName)
);