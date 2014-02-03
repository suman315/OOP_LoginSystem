<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$db_user_id = $_SESSION['userid'];
$db_user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>member page</title>
</head>
<body>

 <?php 
if (!empty($db_user)){
	echo "welcome to the member page ".$db_user."<br><br>";
}
 else {
 	die(header("location: index.php"));
 }
 ?>

 <input type='button' name='logout' value='log out' onclick='logout()' >
 <script type='text/javascript'>
function logout(){
	window.location='logout.php';
}

 </script>



</body>
</html>