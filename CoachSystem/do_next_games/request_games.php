<php>

<h1 align="center">Games Menu</h1>

<form action="view_all_games.php" method="post">
	<input type="submit" value="View All Games"/>
</form>

<h3 align="center">Add Game</h3>
<form action="dest.php" method="post">
	<table align="center" border="0" width="300">
	<tr><td>Date:</td><td><input type="date" name="date"/></td></tr>
	<tr><td>Result:</td><td><select name="result">
		<option value="Win">Win</option>
		<option value="Lose">Lose</option>
		<option value="Tie">Tie</option>
	</select></td></tr>
	<tr><td>Playing Venue:</td><td><input type="text" name="playingVenue" size="256"/></td></tr>
	<tr><td>Opponent Team:</td><td><input type="text" name="opponentTeam" size="32"/></td></tr>
	<tr><td><input type="submit" value="Add Game"/></tr></td>
	</table>
</form>

<h3 align="center">Update Games (Search by Date)</h3>
<form action="dest.php" method="post">
	<table align="center" border="0" width="300">
	<tr><td>Date:</td><td><input type="date" name="date"/></td></tr>
	<tr><td>Result:</td><td><select name="result">
		<option value="Win">Win</option>
		<option value="Lose">Lose</option>
		<option value="Tie">Tie</option>
	</select></td></tr>
	<tr><td>Playing Venue:</td><td><input type="text" name="playingVenue" size="256"/></td></tr>
	<tr><td>Opponent Team:</td><td><input type="text" name="opponentTeam" size="32"/></td></tr>
	<tr><td><input type="submit" value="Update Game"/></tr></td>
	</table>
</form>

<form action="manager_home.php" method="post">
	<input type="submit" value="Home"/>
</form>

</php>
