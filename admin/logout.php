<?php
	setcookie("session_id", "", time()-3600);
	session_start();
	session_unset();
	session_destroy();
	header('Location: login.php');
?>