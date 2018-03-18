<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<title>系統管理登入</title>
	<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel=stylesheet type="text/css" href="index.css">
</head>
<body>

<?php
	if (isset($_COOKIE['session_id']))
	{
		include('incsession.php');
	}
?>
  	
<div class="container-fluid text-center">    
	<div class = "container">
		<div class="wrapper">
			<form action="login_actions.php" method="post" name="Login_Form" class="form-signin">       
				<h3 class="form-signin-heading">系統登入</h3>
				<?php
					if (isset($_GET['error']))
					{
						if ($_GET['error'] == 'wrongpass')
						{
							echo "<h4 class='form-signin-heading'>帳號密碼錯誤</h4>";
							//$_GET['refer'] = '';
						}
						}					
				?>
				  <hr class="colorgraph"><br>
				  
				  <input type="text" class="form-control" name="Username" placeholder="請輸入帳號" required="" autofocus="" />
				  <input type="password" class="form-control" name="Password" placeholder="請輸入密碼" required=""/>     		  
				
				  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="value" type="Submit">Login</button>  
			</form>			
		</div>
	</div>
</div>

<footer class="container-fluid text-center">
  <p>台鐵運行圖網頁管理</p>
</footer>

</body>

</html>
