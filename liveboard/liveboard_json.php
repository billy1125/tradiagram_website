<?php
	class objJSON {
		public $StationID = "";
		//public $link = "";
	}
	$stationID = $_GET["stationID"];
	$json = file_get_contents("data.json");
	$liveTrains = json_decode( $json, true );


	$aryItem = array();

	foreach($liveTrains as $item) {
		if($item['StationID'] == $stationID ){
			$objItem = new objJSON();

			$objItem -> StationID = $item['StationID'];
			$objItem -> StationName = $item['StationName'];
			$objItem -> TrainNo = $item['TrainNo'];
			$objItem -> TrainTypeName = $item['TrainTypeName'];
			$objItem -> Direction =  str_replace("1", "逆行", str_replace("0", "順行", $item['Direction']));
			$objItem -> EndingStationName = $item['EndingStationName']['Zh_tw'];
			$objItem -> ScheduledArrivalTime = $item['ScheduledArrivalTime'];
			$objItem -> ScheduledDepartureTime = $item['ScheduledDepartureTime'];
			$objItem -> DelayTime = $item['DelayTime'];
			$objItem -> UpdateTime = $item['UpdateTime'];
			

			array_push($aryItem, $objItem);
		}
		
	}

	$outputJson = json_encode($aryItem);
	echo $outputJson;
?>

