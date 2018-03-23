-------------------------------------
	In order to begin
-------------------------------------
Load the database (Phase2_DB.sql) and then create new 
account or login with credentials:

User Login: qwer
User Pass: qwer

Manager Login: asdf
Manager Pass: asdf

---------------------------------------------
|Player and Manager Database Web Application|
---------------------------------------------
This web application consists of two subsystems: The player system and the coach system.
Below are descriptions of what they do and how to use them.

-------------
The Home Page
-------------
You will start off on a page called index.php. This page can direct you to four other pages.
To create a new manager account, click on the button labeled "Manager Sign Up".
To log into an existing manager account, click on the button labeled "Manager Log In".
Clicking either of these buttons will take you into the CoachSystem directory.
To create a new player account, click on the button labeled "Player Sign Up".
To log into an existing player account, click on the button labeled "Player Log In".
Clicking either of these buttons will take you into the PlayerSystem directory.

------------------
|The Coach System|
------------------
After creating a new account or logging into an existing manager account, you will be taken 
to the Manager Home page. From here you can access the following systems: Manager Info, 
Player Information, Trainings, View Player Login Requests, and Games.

------------
Manager Info
------------
This system allows the currently signed in manager to view and edit their information.

------------------
Player Information
------------------
This system allows the currently signed in manager to view players' information.
The manager can search for players by name, or simply list all existing players.
Both of these options take the manager to the Player Information Detail page where
they can view all of a player's information and all of the stats linked to that player.

---------
Trainings
---------
[insert description]

--------------------------
View Player Login Requests
--------------------------
This system allows the currently signed in manager to accept or deny the creation of player 
accounts. All new player accounts start with a pending request status. This will not switch 
to an accepted status until a logged in manager accepts the request using this system.

-----
Games
-----
[insert description]

-------------------
|The Player System|
-------------------
After creating a new account or logging into an existing player account, you will be take to 
the Player Home page. From here you can access the following systems: See Your Player Info! 
and Change Password.

---------------------
See Your Player Info!
---------------------
This system allows the player to see all of their information, including their player details,
player stats, and trainings assigned to that player. It also allows them to edit their player 
details.

---------------
Change Password
---------------
This system allows the player to change their password.
