<?php namespace Database;
class Connect{
private $db_username = 'sumanpoudel';//put your username here
private $db_password = 'suman'; //put your database password here
private $db_host = 'sumanpoudelcom.ipagemysql.com';//put your host here
private $database = 'loginsystem'; //your database name

public function connection(){
$connect = new \mysqli("$this->db_host","$this->db_username","$this->db_password","$this->database");
return $connect;
}
}

// don't forget to change the $site variable on other pages and put your website name there like http://dev.sumanpoudel.com 
?>
