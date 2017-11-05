<php>

<h1 align="center">Request Player Info</h1>

<h3 align="center">Search By Name</h3>
<form action="list_requested_name.php" method="post">
	<table align="center" border="0" width="400">
	<tr><td>Name:</td><td><input type="text" name="Name" minlength="4 maxlength="64"/><i>(4-64 characters)</i></td></tr>
	<tr><td align="center"><input type="submit" value="Search"/></td></tr>
	</table>
</form>

<h3 align="center">Retrieve All Players</h3>
<form action="view_all_player.php" method="post">
	<table align="center" border="0" width="300">
	<tr><td align="center"><input type="submit" value="Request All Players"/></td></tr>
	</table>
</form>

<form action="../manager_home.php" method="post">
	<input type="submit" value="Home"/>
</form>

</php>
