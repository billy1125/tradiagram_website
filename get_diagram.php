<?php

class objJSON {
	public $date = "";
	//public $link = "";
}

$lineKind = $_GET["lineKind"];
$fileLeadName = "";
$files = glob('./diagram/' . $lineKind . '/*.svg');
$arrlength = count($files);

switch ($lineKind) {
	case "west_link_north": $fileLeadName = "/WESTNORTH" . "_";
	break;
	case "west_link_south": $fileLeadName = "/WESTSOUTH" . "_";
	break;
	case "west_link_moutain": $fileLeadName = "/WESTMOUNTAIN" . "_";
	break;
	case "west_link_sea": $fileLeadName = "/WESTSEA" . "_";
	break;
	case "pingtung": $fileLeadName = "/PINGTUNG" . "_";
	break;
	case "south_link": $fileLeadName = "/SOUTHLINK" . "_";
	break;
	case "taitung": $fileLeadName = "/TAITUNG" . "_";
	break;
	case "pingxi": $fileLeadName = "/PINGXI" . "_";
	break;
	case "neiwan": $fileLeadName = "/NEIWAN" . "_";
	break;
	case "jiji": $fileLeadName = "/JIJI" . "_";
	break;
	case "shalun": $fileLeadName = "/SHALUN" . "_";
	break;
	case "yilan": $fileLeadName = "/YILAN" . "_";
	break;
	case "north_link": $fileLeadName = "/NORTHLINK" . "_";
	break;
}

$aryItem = array();

for($x = 0; $x < $arrlength; $x++) {
	$date = str_replace('./diagram/' . $lineKind . $fileLeadName, '', $files[$x]) . "<br>";
	//$date = str_replace('.html', '', $date);
	$date = str_replace('.svg', '', $date);
	//$link = str_replace('./', '', $files[$x]);
	
	$objItem = new objJSON();
	
	$month = "";
	if (substr($date, 4, 1) == "0") {
		$month = substr($date, 4, 2);
	}
	else
	{
		$month = substr($date, 4, 2);
	}
	
	$day = "";
	if (substr($date, 6, 1) == "0") {
		$day = substr($date, 6, 2);
	}
	else
	{
		$day = substr($date, 6, 2);
	}
	
	$objItem -> date = substr($date, 0, 4) . "-" . $month . "-" . $day;
	$objItem -> title = substr($date, 0, 4) . $month . $day;
	//$objItem -> link = $link;
	
	array_push($aryItem, $objItem);
}

$JSON = json_encode($aryItem);
echo $JSON;

//$json_data =  json_encode($ary02);
//echo json_encode($ary03);
?>