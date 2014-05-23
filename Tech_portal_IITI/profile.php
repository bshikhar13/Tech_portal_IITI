<?php
			session_start();

			if(!isset($_SESSION["username"])){
				echo "<script>window.location = 'login.php'</script>";
			}
			
			$db_profile=mysqli_connect('localhost','root','','creation');
			
			$uss=$_SESSION["username"];

			$query_profile_1="SELECT * FROM `profile` WHERE username='$uss'";
			
			$temp_res=mysqli_query($db_profile,$query_profile_1)
			or die('!!!!	');
			
			$row1=mysqli_fetch_array($temp_res);
			echo '<a href="wall.php"><img src="'.$row1['profile_pic'].'"></a>';
			echo "<br>";
			echo "Name : ".$row1['name'];
			echo "<br>";
			echo "username : ".$row1['username'];
			echo "<br>";
			echo "nerd_name : ".$row1['nerd_name'];
			echo "<br>";
			echo "Branch : ".$row1['branch'];
			echo "<br>";
			echo "E-mail ID : ".$row1['email_id'];
			echo "<br>";
			echo "contact_no : ".$row1['contact_no'];
			echo "<br>";
			echo "<br>";
							

			$one=1;
			for ($i=1; $i<=3; $i++) {
				$temp_str="tech_club_$i";
				echo "Tech Club $i : ".$row1["$temp_str"];
				echo "<br>";
			}
			
			echo "<br>";
			echo "<br>";
			
			for ($i=1; $i<=7; $i++) {
				$temp_str="geekness$i";
				echo "Geekness $i : ".$row1["$temp_str"];
				echo "<br>";
			}


			echo "<br>";
			echo "<br>";
			

			Echo "<a href=profile_change.php>Change My Profile</a>";
						



?>