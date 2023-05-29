<form method="post" action=topics>
	<table border=1 width=345>
	<tr><th colspan=2>create new topic</th></tr>
	<tr><td>topic name: </td>  <td>&nbsp<input align=right type=text value="<?php echo $whoopsname ?>" maxlength=100 name="name"></td></tr>
	<tr><td>username: </td>  <td>&nbsp<?php if(isset($_SESSION['loggedin'])) { ?><?php echo htmlspecialchars($_SESSION["username"]); ?><?php } else{ ?><a href="/login">Login to post a topic!</a><?php } ?></td></tr>
	<?php if(isset($_SESSION['loggedin'])) { ?><tr><td colspan=2><input type=submit value=Submit></td></tr><?php } ?>
	</table>
	</form>