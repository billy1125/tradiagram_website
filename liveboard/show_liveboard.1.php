<!DOCTYPE html>
<html lang="zh">
	<?php
		require_once("../default.php");
		$json = file_get_contents("data.json");
		$liveTrains = json_decode( $json, true );
		$json = file_get_contents("stations.json");
		$stations = json_decode( $json, true );
	?>
<head>

  <title><?php echo web_name . " 各站即時到離站電子看板" ?></title>
  
<?php include "../head.html" ?>

<body style = "padding-top:40px;">

<?php include "../navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>即時到離站電子看板</h1>      
  </div>
</div>
  
<div class="container-fluid bg-3 text-left">    
  <div class="row">
			<ul class="list-group  text-center">
				<?php
					$arrlength = count($liveTrains);
					$arrlength1 = count($stations);
					// for($x = 0; $x < $arrlength1; $x++) {
					// 	foreach($liveTrains->entries as $row) {
					// 		echo $row;
					// 	}
					// }

					echo $arrlength . "</br>";
					echo $arrlength1 . "</br>";
					
					$stationList = [];

					foreach($stations as $row) {
						foreach($liveTrains as $item) {
							if($item['StationID'] == $row['ID'] ){
								if(array_key_exists($row['ID'], $stationList)) {
									echo "";
								}
								else
								{
									array_push($stationList, $item['StationID']);
								}
							}
						}
					}
					foreach($stationList as $row) {
						echo $row . "</br>";
					}
					

					foreach($stationList as $row) {
						echo "<li class='list-group-item'>";
						//echo $row['ID'] . $row['DSC'] . "</br>";
						foreach($liveTrains as $item) {
							if($item['StationID'] == $row ){
								echo $item['TrainNo'] . " " . $item['TrainTypeName']['Zh_tw'] . " " . 
								$item['ScheduledArrivalTime'] . " " . $item['ScheduledDepartureTime'] . " " . $item['DelayTime'];
								echo  "</br>";
							}
							
						
							//echo $row['StationID'] . "</br>";
						}
						echo "</li>";
					}


					// for($x = 0; $x < $arrlength1; $x++) {
						// $temp = "";
						//$fileName = str_replace('diagramFile_' , '', $liveTrains[$x]['date']);
						//$fileName = str_replace('.html', '', $fileName);
						//echo "<h2>Example <span class='label label-default'>";
						//if ($liveTrains[$x]['StationID'] )
					//	echo $liveTrains[$x]['StationName']['Zh_tw']. "<li class='list-group-item'><a href='./diagram/special_use/" . $liveTrains[$x]['StationID'] . "' >" . 
						//$liveTrains[$x]['date'] . " - " . $liveTrains[$x]['trainName'] . "</a></li>";
						//echo "</span></h2>";
					// }
				?>
			</ul>
  </div>
</div><br>

<footer class="container-fluid text-center">
<?php echo footer ?>
</footer>

</body>
</html>
