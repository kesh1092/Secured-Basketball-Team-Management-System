<php>

<h1>
	Edit Player  Information
</h1>

<form action="dest.php" method="post">
	<table align="center" border="0" width="300">
	<tr><td>ID:</td><td><input type="text" name="id"></td></tr>
	<tr><td>LoginID:</td><td><input type="text" name="loginid" size="16"></td></tr>
	<tr><td>Name:</td><td><input type="text" name="name" size="64"></td></tr>
	<tr><td>Password:</td><td><input type="text" name="password" size="8"></td></tr>
	<tr><td>Birthday:</td><td><input type="date" name="birthday"></td></tr>
	<tr><td>Address:</td><td><input type="text" name="address" size="128"></td></tr>
	<tr><td>Email:</td><td><input type="text" name="email" size="32"></td></tr>
	<tr><td>Phone Number:</td><td><input type="text" name="phoneNumber" size="10"></td></tr>
	<tr><td>Player Position:</td><td><select name="playerPosition">
		<option value="point guard">Point Guard</option>
		<option value="shooting guard">Shooting Guard</option>
		<option value="small forward">Small Forward</option>
		<option value="power forward">Power Forward</option>
		<option value="center">Center</option>
		</select></td></tr>
	<tr><td align="center"><input type="submit"></td></tr>
	</table>
</form>

<form action="user_home.php" method="post">
	<input type="submit" value="Home"/>
</form>

</php>
