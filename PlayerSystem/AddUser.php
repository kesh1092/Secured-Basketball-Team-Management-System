
<?php

//Begin Session
session_start();

?>


<html>
<head>
  <title>Add New Player</title>
</head>

<body>
<h2>Add New Player</h2>
<form action="AddUserSubmit.php" method="post">
  <fieldset>
    
    <p>
      <label>LoginID</label>
      <input type="text" name="LoginID" value="" maxlength="16" required/>
      <i>(4-16 characters)</i>
    </p>
    
    <p>
      <label>Password</label>
      <input type="password" name="Password" value="" maxlength="8" required/>
      <i>(4-8 characters)</i>
    </p>
    
    <p>
      <label>Name</label>
      <input type="text" name="Name" value="" maxlength="64" required/>
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
      <input type="text" name="Address" value="" maxlength="128" required/>
      <i>(4-128 characters)</i>
    </p>
    <p>    
    
    <p>
      <label>Email</label>
      <input type="text" name="Email" value="" maxlength="32" required/>
      <i>(4-32 characters)</i>
    </p>
    <p>   
    
    <p>
      <label>Phone Number</label>
      <input type="text" name="PhoneNumber" value="" minlength="10" maxlength="10" required/>
      <i>(10 characters)</i>
    </p>
    <p> 
    
    <p>
      <label>Player Position</label>
        <select name="PlayPos">
          <option value="point gaurd" selected>point gaurd</option>
          <option value="shooting gaurd">shooting gaurd</option>
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




