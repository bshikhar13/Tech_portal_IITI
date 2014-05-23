<?php
	
		require("alldatabase.php");
		
		session_start();
		if(!isset($_SESSION["username"])){
				echo "<script>window.location = 'login.php'</script>";
			}

			$db_profile_changer=mysqli_connect('localhost','root','','creation');
			
				$n_name=$_POST["profile_change_name"];
				$n_nerdname=$_POST["profile_change_nerd_name"];
				$n_branch=$_POST["profile_change_branch"];
				$n_email=$_POST["profile_change_email_id"];
				$n_contact=$_POST["profile_change_contact_no"];

				$uss=$_SESSION["username"];
				$query_profile_changer_update="UPDATE `profile` SET name='$n_name' , nerd_name='$n_nerdname' , branch='$n_branch', email_id='$n_email' , contact_no='$n_contact' WHERE username='$uss'";
			
				$temp_res=mysqli_query($db_profile_changer,$query_profile_changer_update)
				or die('!!!!	');

	//-----------------------------------------------------------------------------------------------------
			
			if ($_FILES["profile_change_pic"]["error"] > 0){
 		 		
 		 		echo "Couldn't upload your Profile Picture";
 		 		echo "<script>window.location = 'profile.php'</script>";
			}
			else{
				

				if ((($_FILES["profile_change_pic"]["type"] == "image/jpeg")|| ($_FILES["profile_change_pic"]["type"] == "image/jpg")|| ($_FILES["profile_change_pic"]["type"] == "image/pjpeg")|| ($_FILES["profile_change_pic"]["type"] == "image/x-png")|| ($_FILES["profile_change_pic"]["type"] == "image/png"))){
				
				$profile_change_pic_string_type=substr($_FILES["profile_change_pic"]["type"],6);
  				$profile_change_pic_string_name=ALLDATA."profile_pics/".$uss.".".$profile_change_pic_string_type;
  		
 		 		move_uploaded_file($_FILES["profile_change_pic"]["tmp_name"],"$profile_change_pic_string_name");
		 
		 		$query_profile_change_pic="UPDATE `profile` SET profile_pic='$profile_change_pic_string_name' WHERE username='$uss'";
		 		$result=mysqli_query($db_profile_changer,$query_profile_change_pic);
			}else{
				echo "Upload in correct format";
			} 

		}

			Echo "<script>window.location = 'profile.php'</script>";

?>