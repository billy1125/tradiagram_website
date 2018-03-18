<?php
 // 設定文件utf-8編碼
 header("Content-Type:text/html; charset=utf-8");
 // 加入DB共用常數
 require_once 'db_config.php';

 // 建立MySQL資料庫連線
 $con=mysqli_connect(host,username,password,dbname) or die("Error " . mysqli_error($con)); 
 
 // 檢查連線態狀
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 
 // 設定MySQL為utf8編碼
 mysqli_query($con,"SET NAMES 'utf8'");

 // 新增一筆記錄到user_info資料表
 $sql = "INSERT INTO test.test01 (id, name) VALUES (2, 'Eric')";
 mysqli_query($con,$sql) or die("Error in the consult.." . mysqli_error($con));
 
 echo "<h2>新增範例</h2>";
 echo "========================<br/>";
 echo '新增一筆記錄成功！！';
 
 // 關閉MySQL資料庫連線
 mysqli_close($con);
?>