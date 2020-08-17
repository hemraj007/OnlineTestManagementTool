
<?php
session_start();	 
if(isset($_SESSION['username']) && $_SESSION['usertype']==1){
  $_SESSION['message']='';
  require '../Login/dbh.php';

  // if (isset($_POST['submit'])) {
  	# code...
  	// $uid = $_SESSION['ID'];
    $subject = $_POST['subject'];
    $exam_id = $_POST['exam_id'];




$query = "SELECT * FROM questionbank WHERE testid='$subject' AND qno IN (SELECT qno FROM exams WHERE testid='$subject' AND examid='$exam_id') ";
$result = $conn->query($query);

?>

<center><div style="overflow-x:auto;">     
     <table id="questions" style="width: 50%">
          <thead >
              <tr>
                  <td>Qno</td>
                  <td>Question/Options</td>
              </tr>
          </thead>
          <tbody></center>

<?php


if ($result->num_rows>0) {
    echo "<center><form method='POST' action = 'store_response.php'>";
  $i=1;
   while($row=mysqli_fetch_assoc($result)){
    $qno = $row['qno'];
    $a = $row['a'];
    $b = $row['b'];
    $c = $row['c'];
    $d = $row['d'];
        echo"<tr><td>".$i++."</td>";
        echo "<td>". $row['ques']."</td></tr>";

      echo"<tr><td></td>";
      echo "<td>"."<input type='radio' name='".$qno."' value='a'>".$a."<br>";
      echo "<input type='radio' name='".$qno."' value='b'> ".$b."<br>";
      echo "<input type='radio' name='".$qno."' value='c'> ".$c."<br>";
      echo "<input type='radio' name='".$qno."' value='d'> ".$d."</td></tr>";
      
      
  }
      echo "<input type='submit' name='submit' value='SUBMIT'></from></center>";
  
 }

else {
  echo "There no such test with selected Exam ID, Please select another Exam ID";
}
// }

?>
  
 <?php
  }
  else{
  	 echo"<h3>Please <a href='../Login/login'>login</a> to view this page.</h3>";
  }
  ?>
