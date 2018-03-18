<!DOCTYPE html>
<html lang="zh">
<head>
<?php require_once("default.php"); ?>

	<title><?php echo web_name ?></title>

<?php include "head.html" ?>

<style> 
	.btn{
		-webkit-transition: background .5s linear;
    transition: background .5s linear;
	}
</style> 

</head>
<body>

<?php include "navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>台灣鐵路運行圖</h1>      
    <p>歡迎來到台鐵運行圖網站</p>
  </div>
</div>
  
<div class="container-fluid bg-1 text-center">    
  <h1 class="page-header">台鐵各運行路線</h3>
  <div class="row">

    <p><div class="col-md-3 portfolio-item"><div class="btn-group-vertical btn-block">
		<a href = 'lines.php?lineKind=west_link_north' class="btn btn-primary btn-lg" role="button">西部幹線北段</a>
		<a href = 'lines.php?lineKind=west_link_south' class="btn btn-primary btn-lg" role="button">西部幹線南段</a>
		<a href = 'lines.php?lineKind=west_link_moutain' class="btn btn-primary btn-lg" role="button">西部幹線山線</a>
		<a href = 'lines.php?lineKind=west_link_sea' class="btn btn-primary btn-lg" role="button">西部幹線海線</a>
	</div></div></p>
	
	<p><div class="col-md-3 portfolio-item"><div class="btn-group-vertical btn-block">
		<a href = 'lines.php?lineKind=pingtung' class="btn btn-primary btn-lg" role="button">屏東線</a>
		<a href = 'lines.php?lineKind=south_link' class="btn btn-primary btn-lg" role="button">南迴線</a>
		<a href = 'lines.php?lineKind=taitung' class="btn btn-primary btn-lg" role="button">台東線</a>
		<a href = 'lines.php?lineKind=north_link' class="btn btn-primary btn-lg" role="button">北迴線</a>
		<a href = 'lines.php?lineKind=yilan' class="btn btn-primary btn-lg" role="button">宜蘭線</a>
	</div></div></p>
	
	<p><div class="col-md-3 portfolio-item"><div class="btn-group-vertical btn-block">
		<a href = 'lines.php?lineKind=pingxi' class="btn btn-primary btn-lg" role="button">平溪深澳線</a>
		<a href = 'lines.php?lineKind=neiwan' class="btn btn-primary btn-lg" role="button">內灣線</a>
		<a href = 'lines.php?lineKind=jiji' class="btn btn-primary btn-lg" role="button">集集線</a>
		<a href = 'lines.php?lineKind=shalun' class="btn btn-primary btn-lg" role="button">沙崙線</a>
	</div></div></p>

	<p><div class="col-md-3 portfolio-item"><div class="btn-group-vertical btn-block">
		<a href = 'special_use.php' class="btn btn-primary btn-lg" role="button">特殊運用(如:蒸汽火車)</a>
		<!-- <a href = 'timetable.php' class="btn btn-primary btn-lg" role="button">列車時刻查詢</a>
		<a href = 'admin/login.php' class="btn btn-primary btn-lg" role="button">管理介面</a> -->
		</div></p>
  </div>
</div>
<br>

<footer class="container-fluid text-center bg-info">
<?php echo footer ?>

</footer>

</body>
</html>
