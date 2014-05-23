<?php

	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script>window.location = 'login.php'</script>";
	}

	if($_POST['new_pass_1']==$_POST['new_pass_2']){


			$db_pass_change=mysqli_connect('localhost','root','','login');
			
			$uss=$_SESSION["username"];

			$query_pass_change="SELECT * FROM `login_data` WHERE username='$uss'";
			
			$temp_res=mysqli_query($db_pass_change,$query_pass_change)
			or die('!!!!	');
			
			$row1=mysqli_fetch_array($temp_res);
			echo strcmp($row1["pass_code"],$_POST['old_pass']);
			echo "<script type='text/javascript'>alert('password didt Match)</script>";
	

			if(!strcmp($row1['pass_code'],$_POST['old_pass'])){
					
					$passss=$_POST["new_pass_2"];
					$query_pas_change="UPDATE `login_data` SET pass_code='$passss' WHERE username='$uss'";
			
					$temp_res=mysqli_query($db_pass_change,$query_pas_change)
					or die('!!');
			
					echo "<script>window.location = 'profile.php'</script>";
			}else{
				echo "<script type='text/javascript'>alert('password didt Match)</script>";
	
				echo "<script>window.location = 'login.php'</script>";
			}


	}else{
		echo "fuck u";
		echo "<script>window.location = 'password_change.php'</script>";
	}

?>