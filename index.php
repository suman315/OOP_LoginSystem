<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$db_user_id=$_SESSION['userid'];
$db_user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>loginsystem</title>

</head>
<body>

<a href='login.php'>click here to login in </a>
<br>

<div id="clock" ></div>
<script type="text/javascript">

var myVar = setInterval(function() {displayClock()}, 1000);
function displayClock(){
	var date = new Date();
	var time = date.toUTCString();
	document.getElementById("clock").innerHTML=time;
}

</script>

</body>
</html>