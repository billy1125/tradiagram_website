<!DOCTYPE html>
<html lang="zh">

<head>
	
	<title><?php echo web_name . " " . $lineName ?></title>
	<?php include "head.html" ?>

	<!-- Zabuto Calendar -->
	<script src="js/calendar/zabuto_calendar.min.js"></script>
	<link rel="stylesheet" type="text/css" href="js/calendar/zabuto_calendar.css">

	<!-- Custom Stripts -->
	<script type="text/javascript" src="js/url.min.js"></script>
</head>

<body style="padding-top:40px;">
	<?php include "vendor/navbar.html" ?>

	<div class="jumbotron">
		<div class="container text-center">
			<h1><?php echo $lineName ?></h1>
		</div>
	</div>

	<div class="container-fluid bg-1 text-center">
		<h2><?php echo $lineName ?>運行圖資料</h2><br>
		<div class="row">
			<center>
				<div id="dateselector"></div>
			</center>
			<p>請直接點選要閱讀的日期，若無底色代表無資料。</p>
		</div>
	</div>

	<!-- calendar -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12">

				<div id="my-calendar"></div>

				<script type="application/javascript">
					$(document).ready(function() {
						$("#my-calendar").zabuto_calendar({
							today: true,
							weekstartson: 0,
							language: "en",
							action: function() {
								return myDateFunction(this.title, false);
							},
							ajax: {
								url: "https://tradiagram.com/get_diagram.php?lineKind=" + $.url('?lineKind'),
								modal: false
							}
						});
					});

					function myDateFunction(id, fromModal) {
						if (id != '') {
							window.location.href = "show_svg.php?lineKind=" + $.url('?lineKind') + "&date=" + id;
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