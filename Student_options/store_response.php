<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']==1){
  $_SESSION['message']='';
  $subject = $_POST['subject'];
  $exam_id = $_POST['exam_id'];

require '../Login/dbh.php';


$query = "SELECT * FROM questionbank WHERE testid='$subject' AND qno IN (SELECT qno FROM exams WHERE testid='$subject' AND examid='$exam_id') ";
$result = $conn->query($query);
?>


<?php
  }
  else{
  	 echo"<h3>Please <a href='../Login/login'>login</a> to view this page.</h3>";
  }
  ?>
