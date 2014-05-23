<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script>window.location = 'login.php'</script>";
	}
?>
<html>
<head><title>Profile change</title></head>
<body>
	<form action="password_changer.php" method="post" enctype="multipart/form-data">
	
	<label for="file">Old Password : </label>
	<input type="password" name="old_pass" id="file"><br>

	<label for="file">New Password : </label>
	<input type="password" name="new_pass_1" id="file"><br>

	<label for="file">Confirm Password : </label>
	<input type="password" name="new_pass_2" id="file"><br>

	<input type="submit" name="submit" value="Change password">

	</form>
</body>
</html>



?>