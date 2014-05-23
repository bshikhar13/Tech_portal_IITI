
	<?php
		//-----
		include 'class.phpmailer.php';
		include 'class.pop3.php';
		include 'class.smtp.php';
		require("masterpass.php");
		require("PHPMailerAutoload.php");
		//------
		$name=$_POST['firstname'];
		//echo $name;
		$college=$_POST['college'];
		$branch=$_POST['branch'];
		$interest=$_POST['interest'];
		$pass=$_POST['password'];
		$email=$_POST['email'];

		$msg='Hello '.$name.' I got to know that you are studying '.$branch.' in '.$college.'. I also got to know that <br> you have interest in '.$interest.'. And lastly your password is '.$pass.' .';
		echo $msg;
		$senderemail='bshikhar13@yahoo.com';
		$subject='Your Information';

		$mail = new PHPMailer();
		
		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->Host="smtp.gmail.com"; // SMTP server
 		$mail->Port=465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;
		
		$mail->Username="bshikhar13131313@gmail.com";
		$mail->Password=$masterpaas;
		$mail->From="bshikhar13131313@gmail.com";
		$mail->addAddress("$email");
		$mail->FromName = "sbansal13";
		$mail->Subject="First PHPMailer Message";
		$mail->Body="Hi! \n\n This is my fcking e-mail sent through middlefingr.";	
		$mail->WordWrap = 50;
		
		if(!$mail->Send()) {
			echo 'Message was not sent.';
			echo 'Mailer error: ' . $mail->ErrorInfo;
		}else{

			echo 'Message has been sent.';
		}

		//mail($email,$subject,$msg,'From:'.$senderemail);
	?>