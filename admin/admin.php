<!DOCTYPE html>
<html lang="zh-tw">
<head>
  <title>管理介面</title>
  <meta charset="utf-8">
  <?php
    session_start();

    if (!isset($_SESSION["login"]))
    {
      include('incsession.php');
    }
  ?>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  <link rel=stylesheet type="text/css" href="index.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="edit2.php?refer=login">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
	    
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>

    </div>
  </div>
</nav>

<?php
	
  // 加入DB共用常數
  require_once 'db_config.php';

  // 建立MySQL資料庫連線
  $con=mysqli_connect(host,username,password,dbname) or die("Error " . mysqli_error($con)); 

  //選擇資料庫
  //mysql_select_db("test", $con);

  // 查連線態狀
  if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  // 設定MySQL為utf8編碼
  mysqli_query($con,"SET NAMES 'utf8'");

  // 查詢user_info資料表所有記錄
  $sql = "SELECT * FROM nav_master";
  $result = mysqli_query($con,$sql) or die("Error in the consult.." . mysqli_error($con));

?>


<div class="container text-center">    
  <div class="row content">
    <div class="col-sm-12 text-left"> 
      <h1>Welcome</h1>
      <hr>
      <h3>Test</h3>
      <!-- Trigger the modal with a button -->
      <p>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">新增</button>
      </p>
      
      <table class="table table-striped">
        <tr>
          <th>編號</th>
          <th>名稱</th>
          <th>歸屬</th>
        </tr>
      <?php
        while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        //echo "<td>" . $row['master_id'] . "</td>";
        echo "</tr>";
        }
      ?>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">新增</h4>
      </div>
      <div class="modal-body">
      <form>
        <div class="form-group">
          <label for="email">名稱:</label>
          <input type="email" class="form-control" id="nav_name">
        </div>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">主選單
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <?php
              $sql = "SELECT * FROM nav_master";
              $result = mysqli_query($con,$sql) or die("Error in the consult.." . mysqli_error($con));
            
              while($row = mysqli_fetch_array($result)) {
                echo "<li>" . $row['name'] . "</li>";
              }
            ?>
          </ul>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>

  </div>
</div>

<footer class="container-fluid text-center">
  <p>台鐵運行圖網頁管理</p>
</footer>

</body>

	<?php
	 mysqli_close($con);
	?>

</html>
