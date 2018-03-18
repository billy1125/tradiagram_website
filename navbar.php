<?php

// 加入DB共用常數
require_once 'admin/db_config.php';

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
$sql = "SELECT * FROM nav_master ORDER BY nav_master.order ASC";
$result = mysqli_query($con,$sql) or die("Error in the consult.." . mysqli_error($con));

?>

<!-- php 版本功能表 -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">目錄</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <?php
            while($row = mysqli_fetch_array($result))
            {
              $sql = "SELECT * FROM nav_detail WHERE nav_master_id ='" . $row['id'] . "' ORDER BY nav_detail.order ASC";
              $result_detail = mysqli_query($con,$sql) or die("Error in the consult.." . mysqli_error($con));
              
              if (mysqli_num_rows($result_detail)){
                echo "<li class='dropdown'>";
                echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>" . $row['name']. "<span class='caret'></span></a>";
                echo "<ul class='dropdown-menu'>";
                while($row_detail = mysqli_fetch_array($result_detail)){
                  echo "<li>";
                  echo "<a href = 'lines.php?lineKind=" . $row_detail['link_name']. "'>" . $row_detail['name'] . "</a></li>";
                }
                echo "</ul>";
                echo "</li>";
              }else{
                echo "<li>";
                echo "<a href = 'lines.php?lineKind=" . $row['link_name']. "'>" . $row['name'] . "</a></li>";
              }
              
            }
        ?>

		<li><a href = 'special_use.php?'>特殊運用</a></li>
		<li><a href='http://tradiagram.com/timetable.php'><span class="fa fa-train"></span> 時刻表查詢</a></li>
		
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href = 'https://www.facebook.com/traDiagram/'><span class="fa fa-facebook-official"></span> facebook</a></li>
	    <li><a href='about.php'><span class="fa fa-exclamation-circle"></span> 說明</a></li>
        <li><a href='mailto:sc91@tcust.edu.tw'><span class="fa fa-envelope"></span> 聯絡我們</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
  mysqli_close($con);
?>