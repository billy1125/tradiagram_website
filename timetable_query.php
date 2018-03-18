<?php

$start_station = $_GET['start_station'];
$end_station = $_GET['end_station'];
$date = $_GET['date'];
$time = $_GET['time'];
$car_class = $_GET['car_class'];

chdir('timetable');

shell_exec("C:\Users\ITM\AppData\Local\Programs\Python\Python36\python.exe download_tra_json.py " . $date);
$jsondata = shell_exec("C:\Users\ITM\AppData\Local\Programs\Python\Python36\python.exe tra_search_time_jsonoutput.py " . $start_station . " " . $end_station . " " . $date . " " . $time . " " . $car_class);

//echo $jsondata;
$jsondata = json_decode( $jsondata, true );
$arrlength = count($jsondata);

?>

<!DOCTYPE html>
<html lang="zh">
<head>
<?php require_once("default.php"); ?>

	<title><?php echo web_name ?></title>

	<style type="text/css">
		.label-taroko {
			background-color: #33cccc;
		}
		.label-TzuChiang {
			background-color: #FF9980;
		}
		.label-chiKuang {
			background-color: #8CD98C;
		}
		.label-local {
			background-color: #9900ff;
		}
		.label-Fushin {
			background-color: #00ccff;
		}
		.label-ordnary {
			background-color: #000000;
		}
	</style>

<?php include "head.html" ?>
  
</head>
<body>

<?php include "navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>查詢結果</h1>      
  </div>
</div>

<div class="container"> 
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>車次</th>
				<th>經過車站</th>
				<th>車種</th>
				<th>開車時間</th>
				<th>到站時間</th>
				<th>行駛時間</th>
				<th>備註</th>
			</tr>
		</thead>
		<tbody>
		<?php
			
			
			for($x = 0; $x < $arrlength; $x++) {
				$TrainClass = "";
			
				switch ($jsondata[$x][1]) {
					case "區間車":
						$TrainClass = "local";
						break;
					case "自強號":
						$TrainClass = "TzuChiang";
						break;
					case "莒光號":
						$TrainClass = "chiKuang";
						break;
					case "太魯閣":
						$TrainClass = "taroko";
						break;
					case "普悠瑪":
						$TrainClass = "danger";
						break;
					case "普快車":
						$TrainClass = "ordnary";
						break;
					case "復興號":
						$TrainClass = "Fushin";
						break;
				}
				
				echo "<tr>";
				echo "<td><span class='label label-default'>" . $jsondata[$x][0] . "</span></td>";
				echo "<td><button type='button' class='btn btn-default disabled'>查詢</button></td>";
				echo "<td><span class='label label-" . $TrainClass . "'>" . $jsondata[$x][1] . "</span></td>";
				echo "<td>" . $jsondata[$x][2] . "</td>";
				echo "<td>" . $jsondata[$x][3] . "</td>";
				
				$second1 = floor((strtotime($jsondata[$x][3]) - strtotime($jsondata[$x][2]))); //計算時間差
				
				echo "<td>" . floor(($second1%86400)/3600) . "時" .  floor((($second1%86400)%3600)/60) . "分</td>";
				echo "<td>" . $jsondata[$x][4] . "</td>";
				echo "</tr>";
			}

		?>
		</tbody>
	</table>
</div>
<footer class="container-fluid text-center bg-info">
<?php echo footer ?>
</body>
</html>
