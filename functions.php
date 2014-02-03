<?php
$errmessage = "";

function userNameCheck($username){
  global $errmessage;
 if (empty($username)){
 	$errmessage = "please provide your username";
 }
   else
     {
     	if(preg_match('/^[A-Za-z0-9]{3,}+$/' , $username)){
     	
      return $username;
     	}
     	else{
     		$errmessage = "invalid username  username must be abphabatical and numeric";
     	}
     }
}

function passWordCheck($password1, $password2){
global $errmessage;
	if(!empty($password1)){
  if ($password1 === $password2){
    return $password1;
  }
  else
  {
  	$errmessage = "please provide the same password";
  }
}
else{ 
	$errmessage = "please provide your password";
	 }
}
function emailCheck($email){
global $errmessage;
if (empty($email)){
    $errmessage = "please provide the email address.$registration_form";
  }
  else
  {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      return $email;
    }
    else
    {
      $errmessage = "invalid email address";
    }
  }

}

function phoneNumberCheck($phonenumber){
global $errmessage;
if(strlen($phonenumber)>0){
if (preg_match('/^[0-9]+$/', $phonenumber)){
  if(strlen($phonenumber) < 9 || strlen($phonenumber) > 17){
  $errmessage = "please provide a valid phonenumber";
}else{
  return $phonenumber;
}
}
else
{
  $errmessage = "please provide a valid phonenumber";
}
}
else {
  global $phonenumber;
  $phonenumber = 123456789;
  return $phonenumber;
}
}

function closingConnection(){
  unset($query);
  unset($result);
  $connection->close();
}

 ?>