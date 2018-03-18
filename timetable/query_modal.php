<?php

$start_station = $_GET['start_station'];
$end_station = $_GET['end_station'];
$time = $_GET['time'];
$car_class = $_GET['car_class'];


$jsondata = shell_exec("C:\Users\ITM\AppData\Local\Programs\Python\Python36\python.exe tra_search_time_jsonoutput.py " . $start_station . " " . $end_station . " " . $time . " " . $car_class);

//echo $jsondata;
$jsondata = json_decode( $jsondata, true );
$arrlength = count($jsondata);

?>

<!DOCTYPE html>
<html lang="zh">
<head> 
</head>
<body>

<div class="container"> 
	<table class="table">
		<thead>
			<tr>
				<th>車次</th>
				<th>車種</th>
				<th>開車時間</th>
				<th>到站時間</th>
				<th>備註</th>
			</tr>
		</thead>
		<tbody>
		<?php
			for($x = 0; $x < $arrlength; $x++) {
				echo "<tr>";
				echo "<td>" . $jsondata[$x][0] . "</td>";
				echo "<td>" . $jsondata[$x][1] . "</td>";
				echo "<td>" . $jsondata[$x][2] . "</td>";
				echo "<td>" . $jsondata[$x][3] . "</td>";
				echo "<td>" . $jsondata[$x][4] . "</td>";
				echo "</tr>";
			}

		?>
		</tbody>
	</table>
</div>
</body>
</html>
