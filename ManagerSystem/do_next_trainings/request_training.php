<php>

<h3 align="center">Assign Training</h3>
<form action="dest.php" method="post">
	<table align="center" border="0" width="300">
	<tr><td>Training Name:</td><td><input type="text" name="trainingName" size="16"/></td></tr>
	<tr><td>Instruction:</td><td><input type="text" name="instruction" size="256"/></td></tr>
	<tr><td>TimePeriodInHour:</td><td><input type="number" name="timeperiodInHour"/></td></tr>
	<tr><td>Player ID:</td><td><input type="number" name="playerId"/></td></tr>
	<tr><td><input type="submit" value="Assign"/></td></tr>
	</table>
</form>

<h3 align="center">View Training</h3>
<form action="view_training.php" method="post">
	<table align="center" border="0" width="300">
	<tr><td>Player ID:</td><td><input type="text" name="playerid"/></td></tr>
	<tr><td><input type="submit" value="View Training"/></td></tr>
	</table>
</form>

<form action="manager_home.php" method="post">
	<input type="submit" value="home"/>
</form>

</php>
