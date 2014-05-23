<?php

	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script>window.location = 'login.php'</script>";
	}
	echo "";
	echo "This is the page to change ur fuc**ing profile";
?>

<html>
<head><title>Profile change</title></head>
<body>
	<form action="profile_changer.php" method="post" enctype="multipart/form-data">

	<label for="file">Name : </label>
	<input type="text" name="profile_change_name" id="file"><br>

	<label for="file">nerd_name : </label>
	<input type="text" name="profile_change_nerd_name" id="file"><br>

	<label for="file">Branch: </label>
	<input type="text" name="profile_change_branch" id="file"><br>

	<label for="file">E-mai ID : </label>
	<input type="text" name="profile_change_email_id" id="file"><br>

	<label for="file">Contact no : </label>
	<input type="text" name="profile_change_contact_no" id="file"><br>

	<label for="file">Profile Picture : </label>
	<input type="file" name="profile_change_pic" id="file"><br>

	 <a href="password_change.php">Change the Password</a>;
			
	<!-- <select name="carlist" form="carform">
 	 <option value="volvo">Volvo</option>
  	 <option value="saab">Saab</option>
  	 <option value="opel">Opel</option>
  	 <option value="audi">Audi</option>
	</select> -->

	<input type="submit" name="submit" value="Modify it...!!!">

	</form>
</body>
</html>	
