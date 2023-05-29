<table border=1 width=345>
	<form method="post">
	<tr><th colspan=2>reply</th></tr>
	<tr><td>text:</td><td>&nbsp<textarea cols=21 name="text"><?php echo $whoopsuser ?></textarea></td></tr>
	<tr><td>username: </td><td>&nbsp<?php if(isset($_SESSION['loggedin'])) { ?><?php echo htmlspecialchars($_SESSION["username"]); ?><?php } else{ ?><a href="/login">Login to post a topic!</a><?php } ?></td></tr>
	<?php if(isset($_SESSION['loggedin'])) { ?><tr><td colspan=2><input type=submit value=Submit></td></tr></form></table><?php } ?>