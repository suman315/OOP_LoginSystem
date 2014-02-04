<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$db_user_id=$_SESSION['userid'];
$db_user = $_SESSION['username'];
?>
<!DOCTYPE html>
<head>
	<title>account activation</title>
</head>
<body>

<?php
if ($user_id || $username){
	echo "you have already activate your account please use the login page.";
	header('refresh:5; url=$site/login.php');
}
else{
$user = $_GET['user'];
$code = $_GET['code'];

if(!empty($user) && !empty($code)){
if(preg_match('/^[A-Za-z0-9]+$/', $user)){
	if(preg_match('/^[A-Za-z0-9]+$/', $code)){
		require("./Database/Connect.php");
		$query = "SELECT * FROM user WHERE `code` = '$code' AND `username` = '$user'";
		$con = new Database\Connect;
		$connection = $con->connection();
		$result = $connection->query($query) or die ("error connecting to your activation database");
		$activation_row = $connection->affected_rows;
		
		if($activation_row == 1){
			
			$query = "UPDATE `user` SET `active` = '1' WHERE `username` = '$user' AND `code` = '$code'";
			$result = $connection->query($query) or die("error activating your account");
			$query = "SELECT * FROM user WHERE `code` = '$code' AND `username` = '$user' AND `active` = '1'";
			$result = $connection->query($query);
			$activation_check = $connection->affected_rows;
			if($activation_check == 1){
			
				echo " you have sucessfully activated your account please login using your username <b> $user </b> and password";
				$connection->close();
				echo "<script> function goToLogin(){ setTimeout( function(){window.location = './login.php'; }, 3000)}";
				echo "goToLogin(); </script>";

			}
			else{
				echo "there has been an error during activation";
				$connection->close();
			}
		}
		else{
			echo "provided user name or code is not correct /n hello";
			$connection->close();
		}

	}
	else{
		exit();
	}
}
else{
	exit();
}

}else
{
	echo "your email link is incorrect";
}

	
}

?>
</body>
</html>