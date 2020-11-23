<!DOCTYPE html>
<html lang="zh">

<head>
  <title><?php echo web_name; ?></title>
  <?php include "vendor/head.html"; ?>
  <style>
    .btn {
      -webkit-transition: background .5s linear;
      transition: background .5s linear;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function() {
      $.getJSON("alert_data/data.json", function(data) {
        bolIsJam = true;
        var strJamKind = "";
        //console.log(data.UpdateTime); // Prints: Harry

        switch (Number(data.Alerts[0].Status)) {
          case 0:
            strJamKind += "<p class='bg-danger'>台鐵全線營運停止，更新時間：" + data.UpdateTime + "<br>"
            strJamKind += data.Alerts[0].Description + "</p>"
            break;
          case 1:
            strJamKind += "<p class='bg-success'>台鐵全線營運正常，更新時間：" + data.UpdateTime + "</p>"
            break;
          case 2:
            strJamKind += "<p class='bg-danger'>更新時間：" + data.UpdateTime + "<br>"
            strJamKind += data.Alerts[0].Description + "</p>"
            break;
          default:
            break;
        }

        $('#status_now').append(strJamKind)
      }).fail(function() {
        console.log("An error has occurred.");
      });

    });
  </script>
</head>

<body style="padding-top:40px;">

  <?php include "vendor/navbar.html" ?>

  <div class="jumbotron">
    <div class="container text-center">
      <h1>台灣鐵路運行圖</h1>
      <p>歡迎來到台灣鐵路運行圖網站，包括台鐵與高鐵之鐵路運行圖，每日更新中!</p>

    </div>
  </div>

  <div class="container bg-1 text-center">
    <div id="status_now"></div>
    <h3 class="page-header">台鐵各運行路線</h3>
    <div class="row">
      <div class="col-md-4 portfolio-item">
        <h4>西部幹線</h4>
        <div class="btn-group-vertical btn-block">
          <a href='lines.php?lineKind=west_link_north' class="btn btn-primary btn-lg" role="button">北段</a>
          <a href='lines.php?lineKind=west_link_moutain' class="btn btn-primary btn-lg" role="button">山線</a>
          <a href='lines.php?lineKind=west_link_sea' class="btn btn-primary btn-lg" role="button">海線</a>
          <a href='lines.php?lineKind=west_link_south' class="btn btn-primary btn-lg" role="button">南段</a>
          <a href='lines.php?lineKind=pingtung' class="btn btn-primary btn-lg" role="button">屏東線</a>
        </div>
      </div>

      <div class="col-md-4 portfolio-item">
        <h4>東部幹線與南迴線</h4>
        <div class="btn-group-vertical btn-block">
          <a href='lines.php?lineKind=yilan' class="btn btn-primary btn-lg" role="button">宜蘭線</a>
          <a href='lines.php?lineKind=north_link' class="btn btn-primary btn-lg" role="button">北迴線</a>
          <a href='lines.php?lineKind=taitung' class="btn btn-primary btn-lg" role="button">台東線</a>
        </div>
        <div class="btn-group-vertical btn-block">
          <a href='lines.php?lineKind=south_link' class="btn btn-primary btn-lg" role="button">南迴線</a>
        </div>
      </div>

      <div class="col-md-4 portfolio-item">
        <h4>支線</h4>
        <div class="btn-group-vertical btn-block">
          <a href='lines.php?lineKind=pingxi' class="btn btn-primary btn-lg" role="button">平溪深澳線</a>
          <a href='lines.php?lineKind=neiwan' class="btn btn-primary btn-lg" role="button">內灣線</a>
          <a href='lines.php?lineKind=jiji' class="btn btn-primary btn-lg" role="button">集集線</a>
          <a href='lines.php?lineKind=shalun' class="btn btn-primary btn-lg" role="button">沙崙線</a>
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
          <a href='special_use.php' class="btn btn-primary btn-lg" role="button">特殊運用(如:蒸汽火車)</a>
        </div>

      </div>
      <div class="col-md-4 portfolio-item">
        <h4></h4>
        <div class="btn-group-vertical btn-block">
          <a href='lines.php?lineKind=thsr' class="btn btn-primary btn-lg" role="button">台灣高鐵</a>
        </div>

      </div>
      <!--<div class="col-md-4 portfolio-item">
      <h4></h4>
      <div class="btn-group-vertical btn-block">
        <a href = 'liveboard' class="btn btn-primary btn-lg" role="button">即時列車資訊</a>
      </div>

    </div> -->
    </div>
  </div>
  <br>

  <footer class="container-fluid text-center bg-info">
    <?php echo footer ?>

  </footer>

</body>



</html>