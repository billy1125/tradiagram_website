<!DOCTYPE html>
<html lang="zh">
	<?php
	require_once("default.php");
	
    $lineKind = $_GET["lineKind"];
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
	}
	?>
<head>
  <title><?php echo web_name . " " . $lineName ?></title>
  
 
<?php include "head.html" ?>

	<!-- jquery-ui -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="diagram/style.css">

	<!-- Custom Stripts -->
	<script type="text/javascript" src="js/url.min.js"></script>
  
</head>
<body>

<?php include "navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1><?php echo $lineName ?></h1>      
  </div>
</div>
  
<div class="container-fluid bg-1 text-center">    
	<h2><?php echo $lineName ?>運行圖資料</h2><br>
	<div class="row">
		<center><div id="dateselector"></div></center>
		<p>請直接點選要閱讀的日期，若無底色代表無資料。</p>
	</div>
</div>
	
<style>
	td.highlight {border: none !important;padding: 1px 0 1px 1px !important;background: none !important;overflow:hidden;}
	td.highlight a {background: #99dd73 url() 50% 50% repeat-x !important;  border: 1px #88a276 solid !important;}
</style>

<script>
	var aryDate = new Array();
	var idd = $.url('?lineKind');
	
	$.ajax({
		url: "get_diagram.php?lineKind=" + idd,
		type: "GET",
		dataType: "json",
		async:false,
		//data: array1,
		success : function(result) {
			for(var d in result){
				aryDate.push(result[d].date);
				//console.log(result[d].date);
			}
		}
	})
	
	
	var disabledDays = aryDate; //["2017-9-21","2017-9-24","2017-9-27","2017-9-28"];
	var date = new Date();
	jQuery(document).ready(function() { 
		$( "#dateselector").datepicker({
			numberOfMonths: 1,
			dateFormat: 'yymmdd',
			onSelect: function (date) {
				window.location = '<?php echo "/diagram/show_svg.php?lineKind=" . $lineKind ?>' + '&date=' + date.toString();
				//window.location = '<?php echo "/diagram/" . $lineKind ?>' + '<?php echo $fileLeadName ?>' + date.toString()+ '.html';
				//date.toString() is now in dd-mm-yyyy format, change it to meet your requirements
			},
			beforeShowDay: function(date) {
				var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
				for (i = 0; i < disabledDays.length; i++) {
					if($.inArray(y + '-' + (m+1) + '-' + d,disabledDays) != -1) {
						//return [false];
						return [true, 'highlight', ''];
					}
				}
				return [true];

			}
		});
	});
	
</script>

<footer class="container-fluid text-center">
<?php echo footer ?>
</footer>

</body>
</html>
