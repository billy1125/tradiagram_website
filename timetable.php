<!DOCTYPE html>
<html lang="zh">
<head>
<?php require_once("default.php"); ?>

	<title><?php echo web_name ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
	<meta name="description" content="本頁面利用台灣鐵路管理局所開放的 open data，提供使用者查詢時刻表，可運用於台灣鐵路研究與嗜好用途。由呂卓勳所設計與營運。" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
	<link rel="Shortcut Icon" type="image/x-icon" href="Elegantthemes-Beautiful-Flat-Train.ico" />

	<!-- jquery-ui -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include "navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>台鐵時刻表查詢</h1>      
    <p>(測試中，結合php與Python)</p>
  </div>
</div>

<div class="container text-center"> 
	<form action="timetable_query.php" method="get" name="Login_Form" class="form-query">
		<div class="form-group">
		<label for="sel">起站:</label>
			<select class="form-control" id="sel1">
			  <option value="0">請選擇</option>
			  <option value="1">台北地區</option>
			  <option value="2">桃園地區</option>
			  <option value="3">新竹地區</option>
			  <option value="4">苗栗地區</option>
			  <option value="5">台中地區</option>
			  <option value="6">彰化地區</option>
			  <option value="7">雲林地區</option>
			  <option value="8">嘉義地區</option>
			  <option value="9">台南地區</option>
			  <option value="10">高雄地區</option>
			  <option value="11">屏東地區</option>
			  <option value="12">台東地區</option>
			  <option value="13">花蓮地區</option>
			  <option value="14">宜蘭地區</option>
			  <option value="15">內灣線</option>
			  <option value="16">集集線</option>
			  <option value="17">沙崙線</option>
			  <option value="18">平溪線</option>
			</select>
			<select class="form-control" id="sel2" name="start_station"></select>
			
		</div>
		
		<div class="form-group">
			<label for="sel">終站:</label>
			<select class="form-control" id="sel3">
				<option value="0">請選擇</option>
				<option value="1">台北地區</option>
				<option value="2">桃園地區</option>
				<option value="3">新竹地區</option>
				<option value="4">苗栗地區</option>
				<option value="5">台中地區</option>
				<option value="6">彰化地區</option>
				<option value="7">雲林地區</option>
				<option value="8">嘉義地區</option>
				<option value="9">台南地區</option>
				<option value="10">高雄地區</option>
				<option value="11">屏東地區</option>
				<option value="12">台東地區</option>
				<option value="13">花蓮地區</option>
				<option value="14">宜蘭地區</option>
				<option value="15">內灣線</option>
				<option value="16">集集線</option>
				<option value="17">沙崙線</option>
				<option value="18">平溪線</option>
     		</select>
			<select class="form-control" id="sel4" name="end_station"></select>
		</div>
		
		<div class="form-group">
			<label for="time">時間</label>
			<select class="form-control" id="time" name="time"></select>
		</div>
		
		<div class="form-group">
			<label for="date">日期</label>
			<input type="text" id="datepicker" name="date" value="<?php echo date("Ymd"); ?>">
		</div>
		
		
		
		<div class="form-group">
			<label for="time">車種</label>
			<select class="form-control" name="car_class">
				<option value="all">所有車種</option>
				<option value="seat">對號列車</option>
				<option value="noseat">非對號列車</option>
				<option value="tzu_chiang">自強號</option>
				<option value="puyuma_taroko">普悠瑪與太魯閣</option>
				<option value="chu_kuang">莒光號</option>
				<option value="puxing_ordinary">復興號與普快車</option>
				<option value="local">區間車</option>
			</select>
		</div>
		
		<button type="submit" class="btn btn-primary">送出</button>
		
		
	</form>
	<div class="modal-container"></div>
	<table id="JSON_table" border = "1"></table>
</div>


<script>

function padLeft(str, len) {
    str = '' + str;
    if (str.length >= len) {
        return str;
    } else {
        return padLeft("0" + str, len);
    }
}
 
$(document).ready(function() {
	for(i=0; i<25; i++){
		$("#time").append($("<option value= '" + padLeft(i, 2) + "00'>" + padLeft(i, 2) + ":00" + "</option>"));
	}
});


$(function() {
    $( "#datepicker" ).datepicker({
      showOn: "button",
	  dateFormat: 'yymmdd',
      buttonImage: "timespan.png",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
 });

$("#sel1").change(function(){

	var select = parseInt($(this).val());

	$("#sel2 option").remove();
	
	if (select != 0){
		$.ajax({
		url: "/timetable/stations.json",
		cache: true,
		dataType: "json",
		type: "GET",
		success: function(results){
			//console.log("ready!");
			console.log(results);
			var i = 0;
			
			$.each(results, function(key, value) {
				if (results[i].EXTRA3 == select){
					$("#sel2").append($("<option value='" + results[i].ID + "'>" + results[i].DSC + "</option>"));
					
				}
			i++;
					
			// $.each(results[select].STATIONS, function(key, value) {
				// $("#sel2").append($("<option value='" + value.ID + "'>" +value.DSC + "</option>"));
				// $("#JSON_table").append("<tr>" +
									  // "<td>" + value.ID + "</td>" +
									  // "<td>" + value.DSC + "</td>" +
									  // //"<td>" + results[0].STATIONS[i].DSC + "</td>" +
									  // //"<td>" + results[i].ID + "</td>" +
									  // "</tr>");
				// i++;
			});
		},
		error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
				}
		});	
	}
});

$("#sel3").change(function(){

	var select = parseInt($(this).val());

	$("#sel4 option").remove();
	
	if (select != 0){
		$.ajax({
		url: "timetable/stations.json",
		cache: true,
		dataType: "json",
		type: "GET",
		success: function(results){
			//console.log("ready!");
			console.log(results);
			var i = 0;
			
			$.each(results, function(key, value) {
				if (results[i].EXTRA3 == select){
					$("#sel4").append($("<option value='" + results[i].ID + "'>" + results[i].DSC + "</option>"));
					
				}
			i++;
					
			// $.each(results[select].STATIONS, function(key, value) {
				// $("#sel2").append($("<option value='" + value.ID + "'>" +value.DSC + "</option>"));
				// $("#JSON_table").append("<tr>" +
									  // "<td>" + value.ID + "</td>" +
									  // "<td>" + value.DSC + "</td>" +
									  // //"<td>" + results[0].STATIONS[i].DSC + "</td>" +
									  // //"<td>" + results[i].ID + "</td>" +
									  // "</tr>");
				// i++;
			});
		},
		error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
				}
		});
	}
});
	
</script>


<footer class="container-fluid text-center bg-info">
<?php echo footer ?>

</body>
</html>
