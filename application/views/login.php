
<h1>Sign In</h1>

<?if ($err) {?><p style="color: red;">Invalid username / password. Please try again.</p><?}?>

<form method="post">
<table>
	<tr><td>User:</td><td><input id="username" name="username" value="<?=@$_POST['user']?>" /></td></tr>
	<tr><td>Pass:</td><td><input name="password" type="password" value="" /></td></tr>
	<tr><td></td><td><input style="width: 75px;" type="submit" value="Log in" /></td></td>
</table>

</form>
