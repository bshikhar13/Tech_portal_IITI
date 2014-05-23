<!-- <html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="login.css" type="text/css">
	<style type="text/css">
		body{
			background-color: #95a5a6;
			}
	</style>
</head>

<body>
	<div class="login_box">
		<div class="logintext">Login</div>
		<form method="post" action="login_auth.php">
			<input type="text" id="firstname" name="username" placeholder="Username" required title="Username required"/><br/>
			<input type="password" id="firstname" name="password" placeholder="Password" required title="Password required"/><br/>
			<input class="login_button" type="submit" value="Sign in" name="submit"/>
		</form>
	</div>
<body>
</html>
 -->

<?php

session_start();

      if(isset($_SESSION["username"])){
        echo "<script>window.location = 'wall.php'</script>";
      }

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login to Portal</title>

    <style>
html {
  height: 100%;
}
body {
  height: 100%;
  background: #AD3434;
}
.login-form {
  margin: 100px auto;
  width: 100px;
  height: 50px;
  perspective: 600;
  position: relative;
}
.login-form .s {
  animation: close-shadow 1.2s ease 0.19s 1 alternate forwards;
}
.login-form .f {
  animation: close 1.5s ease 1 alternate forwards;
}
.login-form .f .front {
  animation: close-front 1.5s ease 1 alternate forwards;
}
.login-form .f .back {
  animation: close-back 1.5s ease 1 alternate forwards;
}
.login-form:hover .s {
  animation: shadow 1.2s ease 1 alternate  forwards ;
}
.login-form:hover .f {
  animation: open 1.5s ease 1 alternate forwards;
}
.login-form:hover .f .front {
  animation: open-front 1.5s ease 1 alternate forwards, shadow2 0.4s ease 1 alternate forwards;
}
.login-form:hover .f .back {
  animation: open-back 1.5s ease 1 alternate forwards;
}
.f {
  transform-style: preserve-3d;
  transform-origin: 0 100%;
  transform: rotatey(0deg);
  cursor: pointer;
  position: relative;
  width: 100px;
  height: 50px;
}
.f .front {
  position: absolute;
  width: 100px;
  height: 50px;
  background: #AD3434;
  backface-visibility: hidden;
  font: 14px sans-serif;
  text-transform: uppercase;
  line-height: 50px;
  text-align: center;
  color: #fff;
}
.f .back {
  width: 100px;
  height: 50px;
  background: #AD3434;
  transform-origin: 0 100%;
  transform: rotateY(180deg);
  position: absolute;
  backface-visibility: hidden;
  left: 100px;
}
.s {
  width: 100px;
  height: 50px;
  background: #AD3434;
  position: absolute;
  top: 0;
  z-index: -1;
}
.pass,
.username {
  margin: 4px auto;
  width: 92px;
}
.pass label,
.username label {
  display: block;
  font: 10px sans-serif;
  color: #E9C9C9;
}
.pass input,
.username input {
  height: 26px;
  width: 80px;
  padding: 0 4px;
  margin-top: 2px;
  border: none;
  background: #C6AEAE;
  color: #fff;
  font-size: 12pt;
}
.pass input:focus,
.username input:focus {
  outline: none;
}
@keyframes open {
  0% {
    transform: rotateY(0deg);
  }
  100% {
    transform: rotateY(-180deg);
  }
}
@keyframes close {
  0% {
    transform: rotateY(-180deg);
  }
  100% {
    transform: rotateY(0deg);
  }
}
@keyframes open-front {
  0% {
    background: #AD3434;
  }
  5% {
    background: #B23838;
  }
  50% {
    background: #C13D3D;
  }
  100% {
    background: #C13D3D;
  }
}
@keyframes open-back {
  0% {
    background: #9D2F2F;
  }
  50% {
    background: #A63232;
  }
  95% {
    background: #AA3333;
  }
  100% {
    background: #AD3434;
  }
}
@keyframes shadow {
  0% {
    box-shadow: inset 125px 0 30px -20px rgba(0, 0, 0, 0.3);
  }
  100% {
    box-shadow: inset 0px 0 10px 0 rgba(0, 0, 0, 0);
  }
}
@keyframes shadow2 {
  0% {
    box-shadow: 7px 0 10px -7px rgba(0, 0, 0, 0.3);
  }
  100% {
    box-shadow: 0px 0 10px 0 rgba(0, 0, 0, 0);
  }
}
@keyframes close-front {
  0% {
    background: #C13D3D;
  }
  5% {
    background: #C13D3D;
  }
  50% {
    background: #B23838;
  }
  100% {
    background: #AD3434;
  }
}
@keyframes close-back {
  0% {
    background: #AD3434;
  }
  50% {
    background: #A03030;
  }
  95% {
    background: #A03030;
  }
  100% {
    background: #9D2F2F;
  }
}
@keyframes close-shadow {
  0% {
    box-shadow: inset 0px 0 10px 0 rgba(0, 0, 0, 0);
  }
  100% {
    box-shadow: inset 125px 0 20px -20px rgba(0, 0, 0, 0.3);
  }
}

</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>
<form method="POST" action="login_auth.php" >
  <div class="login-form">
  <div class="f">
    <div class="front">Login</div>
    <div class="back">
      <div class="username">
        <label for="pass">usename:</label>
        <input type="text" name="username"/>
      </div>
    </div>
  </div>

  <div class="s">
    <div class="pass">
      <label for="pass">password:</label>
      <input type="password" name="password"/>
    </div>
  </div>
</div>
<input type="submit" style="visibility:hidden;">
</form>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>
