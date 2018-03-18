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

 // 更新某一筆記錄到user_info資料表
 $sql = "UPDATE test.test01 SET name='pt54321' WHERE id=1";
 mysqli_query($con,$sql) or die("Error in the consult.." . mysqli_error($con));
 
 echo "<h2>更新範例</h2>";
 echo "========================<br/>";
 echo '更新user_id=1的記錄成功！！';

 // 關閉MySQL資料庫連線
 mysqli_close($con);
?> 