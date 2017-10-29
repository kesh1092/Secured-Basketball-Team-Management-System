INSERT INTO Stats (PlayerID, Year, TotalPoints, ASPG) VALUES
	(1, '2017', 240, 20);
	
INSERT INTO Manager (loginid, name, password, birthday, address, email, phonenumber) VALUES
	('jackhilton43', 'Jack Hiltion', 'Asked23', '1984/11/14', '320 E. Palmer Ct.', 'jackhilly@nmsu.edu','509-3213'),
    ('dannyboy', 'Danny Borwick', 'Crimson3', '1982/04/15', '3214 Lemon Dr.', 'dannyyy@nmsu.edu','575-7953'),
    ('nickvolker2', 'Nick Volker', 'Hola231', '1974/11/04', '1543 Doe St.', 'nickvolker@nmsu.edu','575-7743'),
    ('pricedr', 'Price Drake', 'Manner4', '1979/03/11', '1121 Cabing St.', 'price84@nmsu.edu','575-2223'),
    ('jimmybeam44', 'Jimmy Beam', 'Yoyo328', '1988/02/05', '164 Kilmore Ave.', 'jimbeam@nmsu.edu','575-3613');
    
INSERT INTO Training (trainingname, instruction, timeperiodinhour) VALUES
	('Push Ups', 'Get on floor and use arms to push body up', 1),
    ('Sit Ups', 'Get on floor and use abs to sit up', 2),
    ('Jumping Jacks', 'Jump up and down and spread legs and arms', 3),
    ('Jumps Squats', 'Bend your knees and jump as high as you can', 4),
    ('Sprints', 'Run 100m as fast as you can', 5);
    
INSERT INTO AssignTraining (playerid, managerid, trainingname) VALUES
	(1, 1, 'Push Ups');