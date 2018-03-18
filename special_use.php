<!DOCTYPE html>
<html lang="zh">
	<?php
	require_once("default.php");
    $json = file_get_contents("./diagram/special_use/data.json");
	
	$cart = json_decode( $json, true );
	?>
<head>

  <title><?php echo web_name . " 特殊運用" ?></title>
  
<?php include "head.html" ?>

<body>

<?php include "navbar.html" ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>特殊運用</h1>      
  </div>
</div>
  
<div class="container-fluid bg-3 text-left">    
  <div class="row">
	<ul class="list-group  text-center">
		<?php
		
		$arrlength = count($cart);

		for($x = 0; $x < $arrlength; $x++) {
			//$fileName = str_replace('diagramFile_' , '', $cart[$x]['date']);
			//$fileName = str_replace('.html', '', $fileName);
			//echo "<h2>Example <span class='label label-default'>";
			echo "<li class='list-group-item'><a href='./diagram/special_use/" . $cart[$x]['date'] . "/" . $cart[$x]['diagramFile'] . "' >" . 
			$cart[$x]['date'] . "-" . $cart[$x]['trainName'] . "</a></li>";
			//echo "</span></h2>";
		}
		?>
    </ul>
  </div>
</div><br>

<!--<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div><br><br>-->


<footer class="container-fluid text-center">
<?php echo footer ?>
</footer>

</body>
</html>
