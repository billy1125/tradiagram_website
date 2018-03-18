<?php
require('db_config.php');

$username = $_POST['Username'];
$password = $_POST['Password'];
$refer = $_POST['refer'];

if ($username == '' || $password == '')
{
    // No login information
    header('Location: login.php?refer='. urlencode($_POST['refer']));
}
else
{
    //測試用
    //echo $username ;
	//echo $password ;
	//echo $refer ;
    
    // Authenticate user
    $con = mysqli_connect(host,username,password,dbname) or die("Error " . mysqli_error($con)); 

    //mysql_select_db('test', $con);
    
 	// 檢查連線態狀
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	// 設定MySQL為utf8編碼
	mysqli_query($con,"SET NAMES 'utf8'");
	
    $query = "SELECT id, username, MD5(UNIX_TIMESTAMP() + username + RAND(UNIX_TIMESTAMP())) guid FROM users WHERE username = '$username' AND password = '$password'";
    
    //echo $query ;
	
    $result = mysqli_query($con,$query) or die ('Error in query');
    
	//echo mysqli_num_rows($result);
	
    if (mysqli_num_rows($result))
    {
       
		$row = mysqli_fetch_row($result);
        // Update the user record
        $query = "UPDATE users SET guid = '$row[2]' WHERE id = '$row[0]' AND username = '$row[1]'";
        
        //echo $query ;
        
        mysqli_query($con ,$query)
        	or die('Error in query');
        
        // Set the cookie and redirect
        // setcookie( string name [, string value [, int expire [, string path
        // [, string domain [, bool secure]]]]])
        // Setting cookie expire date, 6 hours from now
        $cookieexpiry = (time() + 21600);
        setcookie("session_id", $row[2], $cookieexpiry);

        /* if (empty($refer) || !$refer)
        {
            $refer = 'login.php';
        } */

        header('Location: admin.php');//. $refer);
    }
    else
    {
        // Not authenticated
        header('Location: login.php?error='. 'wrongpass');//urlencode($refer));
		
    }
}
	
	mysqli_close($con);
	
?>