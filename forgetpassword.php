<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$db_user_id=$_SESSION['userid'];
$db_user = $_SESSION['username'];
?>
<form id='passwordreset' action='./forgetpassword.php' method='post'>
	<input type='email' name='email' value='enter your email here' autofocus>
	<button type='submit' name='emailbtn' value='emailbtn'>click here to submit your email address </button>
</form>
<?php 
if($_POST['emailbtn']){
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$email = $_POST['email'];
		require("./Database/Connect.php");
		$query = "select `email` from `user` where `email`='$email'";
		$con = new Database\Connect;
		$connection = $con->connection();
		$result = $connection->query($query) or die("error connecting database");
		$rows = $connection->affected_rows;
		if($rows == 1){
			$code = md5(mt_rand(100, 100000));
			$query = "UPDATE `user` SET `code` = '$code' WHERE `email` = '$email'";
			$result = $connection->query($query) or die("error connecting to database");

			if ($result){
$site = "http://dev.sumanpoudel.com";
$headers = "From: no reply<contact@sumanpoudel.com>";
$message = "account activation link <br /> ";
$message .= "$site/resetpassword.php?email=$email&code=$code";
$subject = "password reset";

// Send
if(mail($email, $subject, $message , $headers )){
  echo "email has been sent to <b> $email </b> with a reset password link";
  $code = "";
  $email = "";
  echo "<script type='text/javascript'> 
  function redirect(){
  	setInterval(function(){window.location='./login.php'},3000);
  }
  document.write(redirect());
  </script>";
}
else{
  die("an error has occured during sending you email");
}
			


		}

	}else{
		echo "the user with <b> $email </b> doesnot exist";
	}

	}else{
		echo "please provide a valid email";
	}

}

?>