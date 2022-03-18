<?php
  session_start(); 
    unset($_SESSION['username']);
    header("location: ./index.php");
	?>

	<?php
  session_start(); 
    unset($_SESSION['usernameadm']);
    header("location: ./index.php");
	?>

