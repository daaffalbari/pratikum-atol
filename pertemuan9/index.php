<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Login</title></head>
<body>
<?php banner();?>
<h1>Login</h1>
<form method="post" name="f" action="login.php">
<table border="1">
<tr><th colspan="2">Login</th></tr>
<tr><td>Id Pegawai</td>
    <td><input type="text" name="IdPegawai" maxlength="4" size="5"></td></tr>
<tr><td>Password</td>
	<td><input type="password" name="password" maxlength="16" size="9"></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblLogin" value="Login"></td></tr>
</table>

</form>
</body>
</html>