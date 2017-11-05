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
<title>Player Login</title>
</head>

<body>
  <h2>Player Login</h2>
  <form action="LoginSubmit.php" method="post">
  <fieldset>
    <p>
      <label>LoginID</label>
      <input type="text" name="LoginID" value="" maxlength="20" />
    </p>
    <p>
      <label>Password</label>
      <input type="password"  name="Password" value="" maxlength="20" />
    </p>
    <p>
      <input type="submit" value="Login" />
    </p>
  </fieldset>
  </form>
</body>
</html>
