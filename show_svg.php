<html lang="zh">
<head>
	<?php
	
    $lineKind = $_GET["lineKind"];
	$date = $_GET["date"];
	$lineName = "";
	$fileLeadName = "";
	
	
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
		case "thsr": $fileLeadName = "/";
		break;
	}
    switch ($lineKind) {
		case "west_link_north": $lineName = "西部幹線北段";
		break;
		case "west_link_south": $lineName = "西部幹線南段";
		break;
		case "west_link_moutain": $lineName = "西部幹線山線";
		break;
		case "west_link_sea": $lineName = "西部幹線海線";
		break;
		case "pingtung": $lineName = "屏東線";
		break;
		case "south_link": $lineName = "南迴線";
		break;
		case "taitung": $lineName = "台東線";
		break;
		case "pingxi": $lineName = "平溪深澳線";
		break;
		case "neiwan": $lineName = "內灣線";
		break;
		case "jiji": $lineName = "集集線";
		break;
		case "shalun": $lineName = "沙崙線";
		break;
		case "yilan": $lineName = "宜蘭線";
		break;
		case "north_link": $lineName = "北迴線";
		break;
		case "thsr": $lineName = "台灣高鐵";
		break;
	}
	$file_name = $lineKind . $fileLeadName . $date . ".svg";
    ?>
    <?php include "head.html" ?>
    <title><?php echo $lineName . " 日期：" . $date ?></title>
    
    
</head>
<body>
	
	<div class="container-fluid text-center">
		<div class="col-sm-12 text-left"> 
			<div class="row content">
				<embed id="showsvg" src=<?php echo "diagram/" . $file_name ?> type="image/svg+xml"/>
			</div>
		</div>
	</div>
</body>
</html>