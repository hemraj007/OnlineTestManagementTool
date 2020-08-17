<?php
  session_start();   
  if(isset($_SESSION['username']) && $_SESSION['usertype']==1){
  $_SESSION['message']='';

?>


  <!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link rel="stylesheet" type="text/css" href="student_style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <title>Attempt Test</title>

</head>
<body><div id="output">
     <!-- <span class="attempt-test-head">Attempt a Test</span><br>   -->
     <form method="POST" action="result_student.php">
     <center>
     <span class="message"><?=$_SESSION['message'] ?></span><br>
     <!-- <select name="subject" >
        <option value="001">General Aptitude (001)</option>
        <option value="002">Quantitative Aptitude (002)</option> 
        <option value="003" selected="selected">Computer Science (003)</option>
        <option value="004">General Science (004)</option> </select>
      -->   <input  type="text" name="id" placeholder="Enter UserID"> <span class="info">Get your UserID from Profile Page</span><br>
        <input type="text" name="name" placeholder="Your full name" ><br>
        <input type="number" name="exam_id" placeholder="Exam ID" min="111" max="999" required="required"><br>
        <button type='submit' style="border: none; background-color: white">  <img src="../Media/go.jpg" style="width: 100px;height: 100px;cursor: pointer;"></button>
    </center>
    </form>
   <!--  <span class="external_link">
    For a pro level test.<a href="https://www.geeksforgeeks.org/geeksquiz-home/">Click here!</a></span><br/> -->
    
</div>


</body>

<style type="text/css">

          body{
            background-image: url(../Media/xxx);
            background-repeat: no-repeat;
            background-size: cover;
          }
          .message{
            font-family: 'comfortaa';
            color: red;
          }
          select[name='subject']{
             padding: 10px;
             margin-right: 8em;
              border-radius: 3px;
              border: 1px solid #eee;
              font-family:'comfortaa';
            

          }
           input[name='id'],input[type='text'] {
            margin: 20px auto;
            width: 150px;
            padding: 8px;
            border:none;
            border-bottom: 1px solid green;
            border-radius: 2px;
            display: inline;
          }
          img {
              max-width: 100%;
              height: auto;
          }
          .external_link{
            align-self: center;
            font-size: 20px;
            font-family: 'comfortaa'
          }

         
          .info{
            visibility: hidden;
            color: red;
            background-color: #ccc;
            border-radius: 6px;
            position: absolute;
            padding: 5px 0;
            
          }
          input[name='id']:hover + .info{
            visibility: visible;
          }


   </style>
</html>

<?php

  if($_SERVER['REQUEST_METHOD']=='POST'){
  
    # code...
    $uid = $_POST['id'];
    $exam_id = $_POST['exam_id'];

    require '../Login/dbh.php';
    // $conn = mysqli_connect("localhost:3307","root","","onlineexamportal");
    $query = "SELECT * from result where Userid='$uid' AND examid='$exam_id';";
    $result=mysqli_query($conn,$query);
   
?>
  <center><div style="overflow-x:auto;">     
     <table id="questions" style="width: 50%">
          <thead >
              <tr>
                  <td>Exam id</td>
                  <td>Score</td>
              </tr>
          </thead>
          <tbody></center>
<center><form method='POST' action = 'result_student.php'>
<?php



    if($result->num_rows>0) {
      # code...
      echo"<center><h3> Result for the selected Exam: <br/></h3> </center>";
      $row=mysqli_fetch_assoc($result);
      
      echo "<tr><td>". $row['examid']."</td>";
      echo"<td>".$row['score']."</td></tr>";
    }
    else{
    echo "<center><h3>Wrong exam_id, No record found</h3></center>";
  }
     
      
      
      
  
}
  
  }
  else{
  	 echo"<h3>Please <a href='../Login/login'>login</a> to view this page.</h3>";
  }
  ?>