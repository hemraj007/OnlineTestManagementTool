<?php

$conn = mysqli_connect("localhost:3307","root","","onlineexamportal");
$mysqli=new mysqli('localhost:3307','root','','onlineexamportal');

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
?>
