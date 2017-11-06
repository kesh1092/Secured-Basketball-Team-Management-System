<?php

//Begin Session
session_start();

?>

<div align="right">
  <a href="PlayerPage.php">See Your Player Info!</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="AddUser.php">New? Create a New User</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="Login.php">Log On</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="Logout.php">Log Off</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="ChangePassword.php">Change Password</a>
      &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="../index.php">Home</a>
</div> 

<html>
<head>
  <title>Add New Player</title>
</head>

<body style = "Color: #000000; background-color:#afbfff;">
<h2>Add New Player</h2>
<form action="AddUserSubmit.php" method="post">
  <fieldset>
    
    <p>
      <label>LoginID</label>
      <input type="text" name="LoginID" value="" minlength="4" maxlength="16" required/>
      <i>(4-16 characters)</i>
    </p>
    
    <p>
      <label>Password</label>
      <input type="password" name="Password" value="" minlength="4" maxlength="8" required/>
      <i>(4-8 characters)</i>
    </p>
    
    <p>
      <label>Name</label>
      <input type="text" name="Name" value="" minlength="4" maxlength="64" required/>
      <i>(4-64 characters)</i>
    </p>
    <p>

    <p>
      <label>Birthday</label>
      <input type="date" name="Birthday" value="" required/>
      <i>(enter date in YYYY-MM-DD form if typing manually)</i>
    </p>
    
    <p>
      <label>Address</label>
      <input type="text" name="Address" value="" minlength="4" maxlength="128" required/>
      <i>(4-128 characters)</i>
    </p>
    <p>    
    
    <p>
      <label>Email</label>
      <input type="text" name="Email" value="" minlength="4" maxlength="32" required/>
      <i>(4-32 characters)</i>
    </p>
    <p>   
    
    <p>
      <label>Phone Number</label>
      <input type="number" name="PhoneNumber" value="" minlength="10" maxlength="10" required/>
      <i>(10 characters)</i>
    </p>
    <p> 
    
    <p>
      <label>Player Position</label>
        <select name="PlayerPos">
          <option value="point guard" selected>point guard</option>
          <option value="shooting guard">shooting guard</option>
          <option value="small forward">small forward</option>
          <option value="power forward">power forward</option>
          <option value="center">center</option>
        </select> 
    </p>
    <p> 
    
    <p>
    <p> 
      <input type="submit" value="Add Player" />
    </p>
  </fieldset>
</form>
</body>
</html>






