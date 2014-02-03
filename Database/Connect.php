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
// $con = new Connect;
// $abc = $con->connection();
// $result = $abc->query("insert into user (`username`) values ('aaaaa')") or die("couldnt success");
// var_dump($result);
// if($abc){
// 	echo "connected";
// }
?>
