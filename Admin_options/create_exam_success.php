<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']==0){
  $_SESSION['message']='';

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['Add to Exam'])) {
        require('../Login/dbh.php');

        $query="SELECT DISTINCT * FROM questionbank  WHERE testid='$subject' LIMIT $num_ques";
  		$result=mysqli_query($conn,$query);

        $query="INSERT INTO exams ('testid','Noofques') VALUES('$exam_id','$num_ques')";
        $sql = mysqli_query($conn,$query);
        if($sql == true)
          $_SESSION['message']='Exam created Successfully';
        else
          $_SESSION['message']='There was an error. Could not create Exam!';
      }

      ?>
<?php
      }
  else{
  	 echo"<h3>Please <a href='../Login/login'>login</a> to view this page.</h3>";
  }
  ?>