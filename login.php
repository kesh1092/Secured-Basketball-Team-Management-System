<html>

<?php 
// $message = "";
if(isset($_GET['invalid'])) 
   echo 'Invalid Login'; 
?>

<h3>Login</h3>
<form action="login_functions.php" method="post">


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

<!-- 	<tr><td>LoginID:</td><td><input type="text" name="LoginID" size="16"/></td></tr>
   <tr><td>Password:</td><td><input type="text" name="Password" size="8"/></td></tr> -->
   <tr><td align="center">
      <input type="submit" value="Login"></td></tr>
</form>

<form action="index.php" method="post">
   <input type="submit" value="Home"/>
</form>


</html>
