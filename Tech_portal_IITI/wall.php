<?php
	session_start();
	
	if(!isset($_SESSION["username"])){
		echo "<script>window.location = 'login.php'</script>";																		//user not logged in
	}
	

	include('php/functions.php');																									//for like and comment functionalities

	$token = get_token(20);
	$_SESSION['token'] = $token;

	$usname=$_SESSION['username'];																									
?>

<html>
	<head>
		<title>wall</title>
		<link rel="stylesheet" type="text/css" href="boxes.css" />
		<style type="text/css">body{
			background: #ecf0f1;
		}
		</style>
		<!-- This one is for like and coment******************************************-->
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="Description" content="Create a Facebook like comments system using PHP, jQuery and AJAX." />
		<meta name="Keywords" content="" />
		<meta name="Owner" content="Akshit Sethi" />
		<link rel="shortcut icon" href="img/favicon.ico">
		<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.timeago.js"></script>
		<script type="text/javascript" src="js/jquery.autosize.js"></script>
		<script type="text/javascript">


$(document).ready(function() {
	var msg = '#message';

	$('.time').timeago();
	$(msg).autosize();

	$('#post_comment').click(function() {
		$(msg).focus();
	});

	$(msg).keypress(function(e) {
		if(e.which == 13) {
			var val = $(msg).val();
			$.ajax({
				url: 'php/ajax.php',
				type: 'GET',
				data: 'token=<?php echo $token; ?>&msg='+escape(val),
				success: function(data) {
					$(msg).val('');
					$(msg).css('height','14px');
					$('#commentscontainer').append(data);
					$('.time').timeago();
				}
			});
		}
	

	});
	var shikhar = $("#like_post a");
	shikhar.each(click(function() {

		
		var count = parseFloat($('#unlike_post').attr('n_o_l')) + 1;
		if(count > 1) {
			$('#if_like').html('You and');
			$('#people').html('others');
		} else {
			$('#if_like').html('You like this.');
			$('#likecontent').hide();
		}

		$('#like_post').hide();
		$('#unlike_post').show();
		
		var post_id_w = $('#unlike_post').attr('dolan');
		var tell=$('#unlike_post').attr('iwilltellu');

		 $.ajax({
				url: "like_updater.php",
				type: 'GET',
				data: 'post_id_w='+escape(post_id_w)+'&told='+escape(tell),
				success: function(data){
					alert(count);
				}
			});														//trigger when like is clicked


	}));

	var bansal = $("#unlike_post a");
	bansal.each(click(function() {
		var count = parseFloat($(this).find(#unlike_post).attr('n_o_l')) - 1;
		if(count < 1) {
			$('#likecontent').show();	
		}
		$(this).find('#unlike_post').hide();
		$(this).find('#like_post').show();
		$(this).find('#if_like').html('');
		$(this).find('#people').html('people');

		var post_id_w = $(this).find(#unlike_post).attr('dolan');
		var tell=$(this).find(#unlike_post).attr('iwilltellu');

		 $.ajax({
				url: "like_updater.php",
				type: 'GET',
				data: 'post_id_w='+escape(post_id_w)+'&told='+escape(tell),
				success: function(data){
					alert(count);
				}
			});													//trigger when unlike is clicked

	

	}));
});
</script>

<!-- this ends the like comment  -->
	</head>
<body>
<!--	
<div class="introBar">
	<div class="introHead1">Geeks@iiti.ac.in</div>
</div>
-->
<div class="post">
	<form action="upload_dolan.php" method="post" enctype="multipart/form-data">

	<label for="file" class="post_text">Post : </label><br />
	<div class="hr_post"></div>
	<input type="text" name="creation_post" required style="position:relative; top:40px; left:20px; height:85px; width:400px;"><br>

	<label for="file">Pic : </label>
	<input type="file" name="creation_pic" required><br>

	<label for="file">Pdf : </label>
	<input type="file" name="creation_pdf" required><br>

	<input type="submit" name="submit" value="Post">
	

	</form>

 </div>


	<br><br><br><br><br><br><br><br><br><br><br><br><a href=profile.php>My Profile</a><br><br><br><a href=logout.php>Logout</a><div style="position:absolute; top:400px">
	
	<?php
			echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
			Echo "<a href=profile.php>My Profile</a>";
			echo "<br><br><br>";
			Echo "<a href=logout.php>Logout</a>";
			
			


				//----------------------------------------------------
			$db_wall=mysqli_connect('localhost','root','','creation');											//connecting to database
			$query_wall_sort="SELECT * FROM `dolan` ORDER BY id DESC";											//query to grt all posts
			$temp_res=mysqli_query($db_wall,$query_wall_sort)													//complete array of posts i.e from the table `dolan`
			or die('!!!!	');
				//----------------------------------------------------



			
			echo '<div style="position:absolute; top:400px">';
			while($row1=mysqli_fetch_array($temp_res)){
					
					$no_likes=$row1['number_of_likes'];															//getting number of likes post has
					$post_id_q=$row1['time_stamp'];
	?>
					
					<div class="container">
						<div class="content">
			
							<?php

								$db_like_updater=mysqli_connect('localhost','root','','creation');					
								$query_checker_like_status="SELECT * FROM `like` WHERE `like_post_id`='$post_id_q' AND `like_username`='$usname'";
								$checker=mysqli_query($db_like_updater,$query_checker_like_status);

								if($row3=mysqli_fetch_array($checker)){

							?>

							<div class="links">
								<a href="javascript:;" id="unlike_post" noooo="<?php echo htmlspecialchars($no_likes) ;?>" iwilltellu="1"dolan="<?php echo htmlspecialchars($post_id_q); ?>">Unlike</a><a href="javascript:;" id="like_post" iwilltellu="2" noooo="<?php echo htmlspecialchars($no_likes) ;?>" class="hide" dolan="<?php echo htmlspecialchars($post_id_q); ?>" >Like</a> &middot; <a href="javascript:;" id="post_comment">Comment</a>
							</div>
								
							<?php }else{ 

							?>

					
						<div class="links">
							<a href="javascript:;" id="unlike_post" class ="hide" noooo="<?php echo htmlspecialchars($no_likes) ;?>" iwilltellu="1"dolan="<?php echo htmlspecialchars($post_id_q); ?>">Unlike</a><a href="javascript:;" iwilltellu="2" noooo="<?php echo htmlspecialchars($no_likes); ?>" id="like_post" dolan="<?php echo htmlspecialchars($post_id_q); ?>" >Like</a> &middot; <a href="javascript:;" id="post_comment">Comment</a>
						</div>
							
						<?php	}	
						?>

						<div class="like clearfix">
							<img src="img/like.png" class="pull-left">
					
							<div class="pull-left">
								<span id="if_like"></span> <span id="likecontent"><span id="count" noooo="<?php echo htmlspecialchars($no_likes) ?>" class="color"><?php echo $no_likes?></span> <span id="people" class="color">people</span> like this</span>
							</div>
						</div>

						
						<div id="commentscontainer">
							<div class="comments clearfix">
						
								<div class="pull-left lh-fix">
									<img src="img/default.gif">
								</div>

								<div class="comment-text pull-left">
									<span class="pull-left color strong"><a href="#">Mark Zuckerberg</a></span> &nbsp;This is a great example of how the multiple line comments will look like. It seems to be working well.
									<span class="info"><abbr class="time" title="2013-07-08T21:50:03+02:00"></abbr></span>
								</div>
						
							</div>

							<div class="comments clearfix">
								<div class="pull-left lh-fix">
									<img src="img/default.gif">
								</div>

								<div class="comment-text pull-left">
									<span class="color strong"><a href="#">Akshit Sethi</a></span> &nbsp;How is this going?
									<span class="info"><abbr class="time" title="2013-07-07T21:50:03+02:00"></abbr></span>
								</div>
							</div>
						</div>

				<div class="comments clearfix">
					<div class="pull-left lh-fix">
						<img src="img/default.gif">
					</div>

					<div class="comment-text pull-left">
						<textarea class="text-holder" placeholder="Write a comment.." id="message"></textarea>
					</div>
				</div>
			
			</div>
		</div>
	

				<?php
				$usname=$row1['username'];
				
				$post_owner_pic_query="SELECT * FROM `profile` WHERE username='$usname'";
				
				$temp_res_1=mysqli_query($db_wall,$post_owner_pic_query);
				
				$row2=mysqli_fetch_array($temp_res_1);
				$usq=$row2['username'];
				
				echo '<a href="profile_visit.php"><img src="'.$row2['profile_pic'].'" width="110" height="110" alt="Score image" ></a>';
				
				$link_pic="profile_visit.php?geek=".$usq;
				echo '<a href="'.$link_pic.'">'.$usq.'</a>';
				echo "<br>";
				echo $row2['nerd_name'];
				echo '<div class="boxes"><div style="position:relative; top:40px; left:350px;">' .$row1['creation_post'].'</div><div style="position:relative; top:60px; left:350px;"><a href=' .$row1['creation_pdf'].'>PDF</a></div><div style="position:relative; left:700px; bottom:10px"><td><img src="'.$row1['creation_pic'].'" width="190" height="190" alt="Score image" /></td></tr></div></div>';
												}
	 		mysqli_close($db_wall);
	?>

