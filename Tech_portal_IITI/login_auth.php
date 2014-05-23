<?php
	session_start();
	$db1=mysqli_connect('localhost','root','','login')
	or die('Error conectingatabase');
	$us=$_POST['username'];
	$pa=$_POST['password'];
	$_SESSION['future_us']=$_POST['username'];
	
	$query1="SELECT *FROM login_data where username='$us' AND pass_code='$pa'";
	$result=mysqli_query($db1,$query1)
	or die('Error querying Database login ---- table login_data');

	while($row1=mysqli_fetch_array($result)){
		session_start();
		$_SESSION["username"]=$us;
		echo "<script>window.location = 'wall.php'</script>";
	}

	echo "Sorry you are not authenticated";
	echo "<script>window.location = 'login.php'</script>";
	mysqli_close($db1);
	
?>