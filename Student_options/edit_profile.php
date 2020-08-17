<?php
session_start();	 
if(isset($_SESSION['username']) && ($_SESSION['usertype']==1 || $_SESSION['usertype']==0) ){

 ?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link rel="stylesheet" type="text/css" href="student_style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<title>Profile</title>
</head>
<body>
<center><p>
  <img src="../Media/student-icon"  onClick="alert('This default picture cannot be changed now! Wait for updates.')" style="height: 125px;" ></p>
  <span class="bio" style="font-family: 'Comfortaa';font-size: 40px;" >
   <?php echo $_SESSION['username']; ?>
  </span>
  <div class="info" style="font-family: 'Comfortaa';font-size: 25px;">
   <?php include '../Login/dbh.php';
     $username=$_SESSION['username'];
         $results = mysqli_query($conn,"SELECT * FROM login WHERE username='$username' ");
         $row= mysqli_fetch_array($results);
         if (is_null($row['Name'])) {
     ?>
    <form method="POST">
    <input type="text" name="fullname" placeholder="Your Full Name" style="outline:none; padding:10px; display:block; width:350px; border-radius: 3px; border: 1px solid #ccc;margin: 20px auto; ">
    <input type="submit">
    <span class='bio'>
      
      
    <?php 
    require('../Login/dbh.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $name= $_POST['fullname'];
    $sql="INSERT INTO login (Name) VALUES ('$name')";
    if($mysqli->query($sql)==true){
                  $_SESSION['message']="Your Name has been updated.";
                }
      }
     }
    else{ 
          echo  $row['Name'];
      }
      echo "<br>User ID : ".$row['ID'];
      ?></span>
       </form>
</div>
  </center>
</body>
</html>



 <?php
 
  }
  else{
  	 echo"Please <a href='../Login/login'>login</a> to view this page.";
  }
  ?>