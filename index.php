<?php

session_start();

if(isset($_GET['restart']) && $_GET['restart']==true)
	unset($_SESSION['bees']);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Bee Test!</title>
</head>
<body>
	<h2>BEE TEST!</h2>
	<div id="container"></div>
	<input id="kick" type="button" name="kick" value="Kick a bee!"/>
	<input id="restart" type="button" name="restart" value="Game finished! Restart" style="display: none" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>