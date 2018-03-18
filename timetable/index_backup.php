<!DOCTYPE html>
<html lang="zh">
<head>
<?php require_once("default.php"); ?>

	<title><?php echo web_name ?></title>

<?php include "head.html" ?>
  
</head>
<body>

<?php include "navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>測試功能</h1>      
    <p>台鐵時刻查詢(結合php與Python)</p>
  </div>
</div>

<div class="container text-center"> 
	<form action="query.php" method="get" name="Login_Form" class="form-signin">
		<div class="form-group">
		<label for="sel">起站:</label>
			<select class="form-control" id="sel1">
			  <option value="0">請選擇</option>
			  <option value="1">台北地區</option>
			  <option value="2">桃園地區</option>
			</select>
			<select class="form-control" id="sel2" name="start_station"></select>
		</div>
		
		<div class="form-group">
		<label for="sel">終站:</label>
			<select class="form-control" id="sel3">
			  <option value="0">請選擇</option>
			  <option value="1">台北地區</option>
			  <option value="2">桃園地區</option>
			</select>
			<select class="form-control" id="sel4" name="end_station"></select>
		</div>
		
		<div class="form-group">
			<label for="time">時間</label>
			<input type="text" class="form-control" id="time" name="time" value="0000">
		</div>
		<button type="submit" class="btn btn-primary">送出</button>
	</form>
	<table id="JSON_table" border = "1"></table>
</div>


<script>



$(document).ready(function() {
	$.ajax({
		url: "stations1.json",
		cache: true,
		dataType: "json",
		type: "POST",
		success: function(results){
			console.log("ready!");
			console.log(results);
			var i = 0;
			//這裡改用.each這個函式來取出JData裡的物件
			$.each(results[1].STATIONS, function(key, value) {
			  //呼叫方式也稍微改變了一下，意思等同於上述的的JData[i]["idx_Key"]
			  $("#JSON_table").append("<tr>" +
									  "<td>" + value.ID + "</td>" +
									  "<td>" + value.DSC + "</td>" +
									  //"<td>" + results[0].STATIONS[i].DSC + "</td>" +
									  //"<td>" + results[i].ID + "</td>" +
									  "</tr>");
			  i++;
			});
        },
		error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
	});
	

	
});

$("#sel1").change(function(){
  switch (parseInt($(this).val())){

		case 0: 
      $("#sel2 option").remove();
      break;
        case 1: 
      $("#sel2 option").remove();
      var area = [ "基隆", "八堵", "七堵", "五堵", "汐止" ];
	  var area_code = [ "1001", "1002", "1003", "1004", "1005" ];
      //利用each遍歷array中的值並將每個值新增到Select中
      $.each(area, function(i, val) {
        $("#sel2").append($("<option value='" + area_code[i] + "'>" + area[i] + "</option>"));
      });      
      break;
        case 2: 
      $("#sel2 option").remove();
      var area = [ "桃園", "內壢", "中壢", "埔心", "楊梅" ];
	  var area_code = [ "1015", "1016", "1017", "1018", "1019" ];
      //利用each遍歷array中的值並將每個值新增到Select中
      $.each(area, function(i, val) {
        $("#sel2").append($("<option value='" + area_code[i] + "'>" + area[i] + "</option>"));
      });      
      break;
    }
});

$("#sel3").change(function(){
  switch (parseInt($(this).val())){

		case 0: 
      $("#sel4 option").remove();
      break;
        case 1: 
      $("#sel4 option").remove();
      var area = [ "基隆", "八堵", "七堵", "五堵", "汐止" ];
	  var area_code = [ "1001", "1002", "1003", "1004", "1005" ];
      //利用each遍歷array中的值並將每個值新增到Select中
      $.each(area, function(i, val) {
        $("#sel4").append($("<option value='" + area_code[i] + "'>" + area[i] + "</option>"));
      });      
      break;
        case 2: 
      $("#sel4 option").remove();
      var area = [ "桃園", "內壢", "中壢", "埔心", "楊梅" ];
	  var area_code = [ "1015", "1016", "1017", "1018", "1019" ];
      //利用each遍歷array中的值並將每個值新增到Select中
      $.each(area, function(i, val) {
        $("#sel4").append($("<option value='" + area_code[i] + "'>" + area[i] + "</option>"));
      });      
      break;
    }
});
</script>


<footer class="container-fluid text-center bg-info">


</body>
</html>
