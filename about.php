<!DOCTYPE html>
<html lang="zh">
<head>
  <?php
	require_once("vendor/variables.php");
  ?>

  <title><?php echo web_name . " 關於本站" ?></title>

<?php include "vendor/head.html" ?>

</head>
<body style = "padding-top:40px;">

<?php include "vendor/navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>關於本站</h1>      
  </div>
</div>

<div class="container text-center">    
  <div class="row text-left">
    <div class="col-sm-6">
		<h3>緣起</h3>
		<p>鐵道愛好者通常都會使用鐵路運行圖，幫助研究鐵道相關事務，雖然有人會出版紙本台鐵鐵路運行圖，但是當台鐵改點，紙本的資訊參考價值就會變低。</p>
		<p>所以當我們知道台鐵已經將時刻資訊以 XML 與 JSON 公開於網路上之後，我們就在思考如何利用這個 Open Data 進行應用，用來繪製台灣鐵路運行圖。</p>
		<p>本站的運行圖轉檔程式以 Python 設計，並且運行圖以 SVG 繪製，目前網站每天早上 7 點進行一次更新，台鐵每天都會有未來 60 天以內的資料可供查閱，高鐵目前則是當天之資料為主。</p>
		<h3>限制</h3>
		<p>由於我們的鐵路運行圖均來自於台鐵 open data 或交通部公共運輸整合資訊流通服務平臺所提供之公開資料集，進行分析整理與繪製。然而公開資料不等於實際台鐵與高鐵的運行計畫，僅是旅客所需的列車到站與離站時間資料，列車的待避或會車狀況無法在鐵路運行圖中展示，因此會出現運行圖與實際運行有所差異的現象。</p>
		<p>因此實際鐵路運行情況，請以台鐵或台灣高鐵所公布資訊為準。</p>
    </div>
	<div class="col-sm-6">
		<div class="well">
			<h4>目前可下載之營運路線：</h4>
			<ul>
				<li>西部幹線北段（基隆-竹南）</li>
				<li>西部幹線台中線（竹南-彰化，經苗栗）</li>
				<li>西部幹線海岸線（竹南-彰化，經大甲）</li>
				<li>西部幹線南段（彰化-高雄）</li>
				<li>屏東線（高雄-枋寮）</li>
				<li>南迴線（枋寮-台東）</li>
				<li>台東線（花蓮-台東）</li>
				<li>北迴線（蘇澳新-花蓮）</li>
				<li>宜蘭線（八堵-蘇澳）</li>
				<li>平溪深澳線（八斗子-菁桐）</li>
				<li>內灣線（新竹-內灣）</li>
				<li>集集線（二水-車埕）</li>
				<li>沙崙線（中洲-沙崙）</li>
				<li>台灣高鐵</li>
			</ul>
		</div>
    </div>
  </div>
</div>
<br>
<br>
<footer class="container-fluid text-center">
<?php echo footer ?>
</footer>

</body>
</html>
