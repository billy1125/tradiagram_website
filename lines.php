<!DOCTYPE html>
<html lang="zh">
<head>
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
	<title><?php echo web_name . " " . $lineName ?></title>
	<?php include "head.html" ?>

    <!-- Zabuto Calendar -->
    <script src="js/calendar/zabuto_calendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/calendar/zabuto_calendar.min.css">

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

<!-- calendar -->
<div class="container-fluid">
    <div class="row">
        
        <div class="col-xs-12">

            <div id="my-calendar"></div>

            <script type="application/javascript">
                $(document).ready(function () {
                    $("#my-calendar").zabuto_calendar({
                        today: true,
                        action: function () {
                                return myDateFunction(this.title, false);
							},
                        ajax: {
                            url: "http://tradiagram.com/get_diagram.php?lineKind=" + $.url('?lineKind') ,
                            modal: false
                        }
                    });
                });

                function myDateFunction(id, fromModal) {
                    if (id != ''){
                        window.location.href="show_svg.php?lineKind=" + $.url('?lineKind') + "&date=" + id;
                    }
                    return true;
                }
                </script>
        </div>
        
    
    </div>
</div>
<!-- /calendar -->

<footer class="container-fluid text-center">
<?php echo footer ?>
</footer>

</body>


</html>
