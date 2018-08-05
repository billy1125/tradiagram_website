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

<script type="text/javascript">
    //$(window).on('load',function(){
        //$('#myModal').modal('show');
    //});
</script>

</head>
<body style = "padding-top:40px;">

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">公告</h4>
      </div>
      <div class="modal-body">
        <p>由於目前台鐵時刻表公開資料 JSON 檔不知原因無法提供（<a href= 'http://163.29.3.98/json/'>連結</a>），目前最新資料僅停留在 2018.8.3，敬請見諒。目前該問題已寫信詢問台鐵，期望僅是一時的問題，感謝大家的支持。</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>

  </div>
</div>

<?php include "navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>台灣鐵路運行圖</h1>      
    <p>歡迎來到台灣鐵路運行圖網站，包括台鐵與高鐵之鐵路運行圖，每日更新中!</p>
  </div>
</div>
  
<div class="container bg-1 text-center">    
  <h2 class="page-header">台鐵各運行路線</h2>
  <div class="row">
    <div class="col-md-4 portfolio-item">
      <h4>西部幹線</h4>
      <div class="btn-group-vertical btn-block">
        <a href = 'lines.php?lineKind=west_link_north' class="btn btn-primary btn-lg" role="button">北段</a> 
        <a href = 'lines.php?lineKind=west_link_moutain' class="btn btn-primary btn-lg" role="button">山線</a>
        <a href = 'lines.php?lineKind=west_link_sea' class="btn btn-primary btn-lg" role="button">海線</a>
        <a href = 'lines.php?lineKind=west_link_south' class="btn btn-primary btn-lg" role="button">南段</a>
        <a href = 'lines.php?lineKind=pingtung' class="btn btn-primary btn-lg" role="button">屏東線</a>
      </div>
    </div>
    
    <div class="col-md-4 portfolio-item">
      <h4>東部幹線與南迴線</h4>
      <div class="btn-group-vertical btn-block">
        <a href = 'lines.php?lineKind=yilan' class="btn btn-primary btn-lg" role="button">宜蘭線</a>
        <a href = 'lines.php?lineKind=north_link' class="btn btn-primary btn-lg" role="button">北迴線</a>
        <a href = 'lines.php?lineKind=taitung' class="btn btn-primary btn-lg" role="button">台東線</a>
      </div> 
      <div class="btn-group-vertical btn-block">
        <a href = 'lines.php?lineKind=south_link' class="btn btn-primary btn-lg" role="button">南迴線</a>        
      </div>
    </div>
	
    <div class="col-md-4 portfolio-item">
      <h4>支線</h4>
      <div class="btn-group-vertical btn-block">
        <a href = 'lines.php?lineKind=pingxi' class="btn btn-primary btn-lg" role="button">平溪深澳線</a>
        <a href = 'lines.php?lineKind=neiwan' class="btn btn-primary btn-lg" role="button">內灣線</a>
        <a href = 'lines.php?lineKind=jiji' class="btn btn-primary btn-lg" role="button">集集線</a>
        <a href = 'lines.php?lineKind=shalun' class="btn btn-primary btn-lg" role="button">沙崙線</a>
      </div>
    </div>
  </div>
</div>

<div class="container bg-1 text-center">    
  <h2 class="page-header">其他</h2>
  <div class="row">
    <div class="col-md-4 portfolio-item">
      <h4></h4>
      <div class="btn-group-vertical btn-block">
        <a href = 'special_use.php' class="btn btn-primary btn-lg" role="button">特殊運用(如:蒸汽火車)</a>
      </div>

    </div>
    <div class="col-md-4 portfolio-item">
      <h4></h4>
      <div class="btn-group-vertical btn-block">
        <a href = 'lines.php?lineKind=thsr' class="btn btn-primary btn-lg" role="button">台灣高鐵</a>
      </div>

    </div>
    <div class="col-md-4 portfolio-item">
      <h4></h4>
      <div class="btn-group-vertical btn-block">
        <a href = 'liveboard' class="btn btn-primary btn-lg" role="button">即時列車資訊</a>
      </div>

    </div>
  </div>
</div>
<br>

<footer class="container-fluid text-center bg-info">
<?php echo footer ?>

</footer>

</body>
</html>
