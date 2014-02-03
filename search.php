<?php

if(isset($_POST['search_username'])){
	if(strlen($_POST['search_username'])>4){
	require("./functions.php");
		function usernameSearch(){
			$username = $_POST['search_username'];
	if(userNameCheck($username)){
	
$search = $_POST['search_username'];
require("./Database/Connect.php");
$con = new Database\Connect;
$connection = $con->connection();
$query = "select `user_id` from user where `username`='$search'";
$result = $connection->query($query) or die("error connecting database");
$num_rows = $connection->affected_rows;
if($num_rows == 1){
	echo "username not available";
}
else{
	echo "username is available";
}
unset($num_rows);
}

else{
	echo "username must be alfa numeric";
}
}
usernameSearch();

}else{
	echo "username must be more then 4 character";
}
}


?>