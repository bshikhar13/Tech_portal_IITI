<?php

session_start();
include('php/functions.php');
$lik = $_GET['post_id_w'];
$usname=$_SESSION['username'];
$tell=$_GET['told'];

			$db_like_updater=mysqli_connect('localhost','root','','creation');																//connecting to create			
			
			
			if($tell=="2"){
					$query_like_updater_dolan="UPDATE `dolan` SET `number_of_likes`=number_of_likes+1 WHERE `time_stamp`='$lik'";
					$query_like_updater="INSERT INTO `like` (`id`,`like_post_id`,like_username) VALUES (0,'$lik','$usname')";					
				
			}else{
				$query_like_updater="DELETE FROM `like` WHERE like_post_id='$lik' AND like_username='$usname'";	
				$query_like_updater_dolan="UPDATE `dolan` SET `number_of_likes`=number_of_likes-1 WHERE `time_stamp`='$lik'";
			}

			$temp_res=mysqli_query($db_like_updater,$query_like_updater_dolan);		
			$temp_res_2=mysqli_query($db_like_updater,$query_like_updater);											//complete array of posts i.e from the table `dolan`


?>