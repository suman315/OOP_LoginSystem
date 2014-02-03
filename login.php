<?php 

error_reporting(E_ALL ^ E_NOTICE);
session_start();
$db_user_id=$_SESSION['userid'];
$db_user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>login system</title>
</head>
<body>
	
<?php 
if(!empty($db_user)){
	echo "you have already login as ".$username."<a href='member.php'>click here</a> to go to your member page";
	exit();
}
else
{
	$redirect = "<script> window.location='./member.php'; </script>";
$form = "<form action='./login.php' method='post' />
<table>
<tr>
<td>username:</td>
<td><input type'text' name='user' autofocus /> </td>
</tr>
<tr>
<td>password:</td>
<td><input type='password' name='password' /> </td>
</tr>
<tr>
<td><input type='submit' name='loginbtn' value='login' /></td>
</tr>
</table>
</form> ";

if ($_POST['loginbtn']){
	$user = $_POST['user'];
	$password = $_POST['password'];
	if ($user){
		if ($password){
			if(preg_match("/^[A-Za-z0-9]+$/", $user)){
			require("./Database/Connect.php");
			$password = md5(md5("dhdh".$password."dgdh"));
			//make sure login info is correct
			$con = new Database\Connect;
			$connection = $con->connection();
			$result = $connection->query("select * from user where username= BINARY '$user' && password= BINARY '$password'") 
			or die("couldnot connect to database");
			$row = $result->fetch_array(MYSQLI_BOTH);
			$db_user = $row['username'];
			$db_user_id = $row['user_id'];
			$active = $row['active'];
			$numRows = $connection->affected_rows;
			if($numRows==1){
				if($row ['active']==1){
					$_SESSION['username'] = $db_user;
					$_SESSION['userid'] = $db_user_id;
					$logindate = date("Y-m-d H:i:s");
					$query = "UPDATE `user` SET `last_login_date` = '$logindate' WHERE `username` = '$user' AND `password` = '$password'";
					$result = $connection->query($query) or die("login date error");
				echo "login success welcome.<b>$user</b>".' you will redirected to members page soon';
				echo $redirect;
				$result->close();
			$connection->close();
				
			}else{
				echo "please check your email and activate your account";
				exit();
			}
			}
			else{
				echo "invalid username or password.$form";
			}

              // closing the result 
			$result->close();
			$connection->close();
		}
		
		else{
			echo "invalid username. username must be albhabetical or numaric.$form";
		}

		}
		else
			echo "you much provide us your password. $form";
	}
	else 
		echo "you must provide your username.$form";
}
else
echo $form;
}
?>
<input type='button' name='registerbtn' value='register' onclick='registration()' />
<input type='button' name='forgetPasswordbtn' value='forget password' onclick='forgetpassowordpage()' />
<script type='text/javascript'>
	function registration(){
	window.location='./registration.php';
}
function forgetpassowordpage(){
	window.location='./forgetpassword.php';
}
</script>
</body>
</html>
