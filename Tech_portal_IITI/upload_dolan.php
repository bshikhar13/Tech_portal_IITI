<?php
require("alldatabase.php");
session_start();
echo $_SESSION["username"];
//$ert=$_FILES["creation_pic"]["type"];
echo "Shikhar";
echo $_FILES["creation_pic"]["size"];
echo "<br>";
echo $_FILES["creation_pdf"]["error"];
echo $_POST["creation_post"];
echo "Bansal";
// if(!isset($_FILES['creation_pic'])){
// 	die();
//}
if ($_FILES["creation_pic"]["error"] > 0 || $_FILES["creation_pdf"]["error"] >0) {
 		 echo "Couldn't upload your geekify tradition";
 		 echo "<script>window.location = 'wall.php'</script>";
} 

// echo $_FILES["creation_pic"]["type"];
// echo "<br>";
// echo $_FILES["creation_pdf"]["type"];

if ((($_FILES["creation_pic"]["type"] == "image/gif")|| ($_FILES["creation_pic"]["type"] == "image/jpeg")|| ($_FILES["creation_pic"]["type"] == "image/jpg")|| ($_FILES["creation_pic"]["type"] == "image/pjpeg")|| ($_FILES["creation_pic"]["type"] == "image/x-png")|| ($_FILES["creation_pic"]["type"] == "image/png")) &&  ($_FILES["creation_pdf"]["type"] == "application/pdf"))
{
	
	
  		$date = date('m_d_Y_h_i_s_a',time());

  		$post_name=$_SESSION['username']."_".$date;

  		$creation_pic_string_type=substr($_FILES["creation_pic"]["type"],6);
  		$creation_pic_string_name=ALLDATA."creation_pic/".$_SESSION["username"]."_".$date.".".$creation_pic_string_type;
  		
  		$creation_pdf_string_type=substr($_FILES["creation_pdf"]["type"],12);
  		$creation_pdf_string_name=ALLDATA."creation_pdf/".$_SESSION["username"]."_".$date.".".$creation_pdf_string_type;

 		 move_uploaded_file($_FILES["creation_pic"]["tmp_name"],"$creation_pic_string_name");
		 move_uploaded_file($_FILES["creation_pdf"]["tmp_name"],"$creation_pdf_string_name");

		 $db1=mysqli_connect('localhost','root','','creation')
		 or die('Error conectingatabase');
		 $_SESSION['back_to_wall']=$db1;
		 $postt=$_POST['creation_post'];
		 $usname=$_SESSION["username"];
		 $query2="INSERT INTO `dolan` (`username`,`time_stamp`,`creation_pic`,`creation_pdf`,`creation_post`) VALUES('$usname','$post_name','$creation_pic_string_name','$creation_pdf_string_name','$postt')";
		 $result=mysqli_query($db1,$query2);
		// echo "<script type='text/javascript'>alert('Success')</script>";
		 echo "<script>window.location = 'wall.php'</script>";



}else{
	echo "<script type='text/javascript'>alert('Upload files with correct format')</script>";
	echo "<script>window.location = 'wall.php'</script>";
}

?>
