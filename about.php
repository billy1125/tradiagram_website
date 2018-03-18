<!DOCTYPE html>
<html lang="zh">
<head>
  <?php
	require_once("default.php");
  ?>

  <title><?php echo web_name . " 關於本站" ?></title>

<?php include "head.html" ?>

</head>
<body>

<?php include "navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>關於本站</h1>      
  </div>
</div>

<div class="container text-center">    
  <div class="row text-left">
    <div class="col-sm-4">
		<h4>緣起</h4>
		<p>鐵道愛好者通常都會使用鐵路運行圖，幫助研究鐵道相關事務，雖然有人會出版紙本台鐵鐵路運行圖，但是當台鐵改點，紙本的資訊參考價值就會變低。</p>
		<p>所以當我知道台鐵已經將時刻資訊以 XML 公開於網路上之後，我就在思考如何利用這個 Open Data 進行應用，用來繪製台鐵的鐵路運行圖。</p>
		<p>本站的運行圖轉檔程式以 Python 設計，並且運行圖以 SVG 繪製，目前網站由呂卓勳維護，每天都會有未來 60 天以內的資料可供查閱。</p>
		<div class="well">
			<p>運行圖均來自台鐵公開資料所分析，僅供參考，正確資料與實際運轉狀況請以台鐵網站或公告為主。</p>
		</div>
    </div>
    <div class="col-sm-4">
	  <div class="well">
		<h4>程式更新日誌：</h4>
		<ul>
			<li>2018.03.17 本站所使用的台灣鐵路局 JSON 時刻表轉檔運行圖程式，<a href = 'https://github.com/billy1125/TRA_time_space_diagram'>託管於 GitHub</a>，並且以 MIT 授權提供使用</li>
			<li>2018.03.16 用於運行圖日期點選的日曆改為使用 <a href = 'https://github.com/zabuto/calendar'>zabuto 所設計的 Javascipt Calendar</a></li>
			<li>2018.03.10 所有路線以 Python 改寫後新版程式進行台鐵運行圖繪製</li>
			<li>2018.02.25 提供北迴線鐵路運行圖，以 Python 改寫後的程式版本製作</li>
			<li>2017.11.25 修正SVG轉檔轉出多餘標籤的問題，調整過後約可減少 200-300kb之容量</li>
			<li>2017.09.23 運行圖網站正式設定為「<a href = "http://tradiagram.com">tradiagram.com</a>」</li>
			<li>2017.09.21 各路線原檔案資料為按鍵形式，修改為以 jQeury UI 的日期選擇器，讓選擇方式較為直觀</li>
			<li>2017.09.06 增加新富車站</li>
			<li>2017.06.07 全面修改為網路版</li>
			<li>2017.06.05 測試並修正程式邏輯，初步結果已先使用於西部幹線北段之運行圖，修正部分莒光號顏色錯標為藍色問題</li>
			<li>2017.06.03 暫時移除台灣高鐵資料，預計重新整理程式</li>
			<li>2017.02.06 加入沙崙線，附註：經過長榮大學站，由於台鐵資料顯示停留時間不到一分鐘，因此繪製出來的順行方向運行線看起來像是直接通過該站</li>
			<li>2017.01.29 加入平溪深澳線、內灣線、集集線</li>
			<li>2017.01.28 加入西部幹線台中線、海岸線</li>
			<li>2017.01.27 加入西部幹線北段，附註：136 車次台鐵資料可能有誤，因此繪製出的運行線有問題，請特別注意。</li>
			<li>2017.01.26 新增西部幹線南段</li>
		</ul>
	  </div>
    </div>
	<div class="col-sm-4">
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
		</ul>
      </div>

    </div>
  </div>
</div>

<footer class="container-fluid text-center">
<?php echo footer ?>
</footer>

</body>
</html>
