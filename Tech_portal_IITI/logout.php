<?php
session_start();
unset($_SESSION["username"]);

Echo "<script>window.location = 'profile.php'</script>";
?>