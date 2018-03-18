<?php
require('db_config.php');

// Check for a cookie, if none go to login page
if (!isset($_COOKIE['session_id']))
{
	header('Location: login.php?refer=back');
    //header('Location: login.php?refer='. urlencode(getenv('REQUEST_URI')));
}
else
{
	// Try to find a match in the database
	$guid = $_COOKIE['session_id'];
	//echo $guid;
	$con = mysqli_connect(host,username,password,dbname) or die("Error " . mysqli_error($con));
	//mysql_select_db($db_name, $con);

	$query = "SELECT username FROM users WHERE guid = '$guid'";
	$result = mysqli_query($con,$query) or die ('Error in query');

	if (!mysqli_num_rows($result))
	{
		// No match for guid
		header('Location: login.php?refer=back');
	}
	else
	{
		session_start();
		$_SESSION["login"] = $guid;
		header('Location: admin.php');
		
	}
}
?>