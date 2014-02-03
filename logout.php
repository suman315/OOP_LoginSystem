<?php
function logOut() {
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
session_destroy();
header("Cache-Control: no-store, no-cache, must-revalidate");
die(header("location: index.php"));
	exit();
}
logOut();

	?>

