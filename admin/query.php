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
 
 // 查詢user_info資料表所有記錄
 $sql = "SELECT * FROM test.test01";
 $result = mysqli_query($con,$sql) or die("Error in the consult.." . mysqli_error($con));

 echo "<h2>查詢範例</h2>";
 echo "========================";
 echo "<table border='1'>
 <tr>
 <th>id</th>
 <th>sid</th>
 <th>c_no</th>
 </tr>";

 while($row = mysqli_fetch_array($result)) {
   echo "<tr>";
   echo "<td>" . $row['id'] . "</td>";
   echo "<td>" . $row['name'] . "</td>";
   //echo "<td>" . $row['c_no'] . "</td>";
   echo "</tr>";
 }

 echo "</table>";

 // 關閉MySQL資料庫連線
 mysqli_close($con);
?>
