 <!-- <script type="text/javascript">       //copied from  stackoverflow.com/questions/7165395/call-php-function-from-javascript-->
  <!-- function getOutput() {               //script to call the php file.
  getRequest(
      'start_test.php', // URL for the PHP file
       drawOutput,  // handle successful request
       drawError    // handle error
  );
  // $.ajax({
  //       url: 'start_test.php',
  //       type: 'POST',
  //       data: {subject:subject,id:id,exam_id:exam_id},
  //       // success: function(data) {
  //       //     console.log(data); // Inspect this in your console
  //       // }
  //       drawOutput,  // handle successful request
  //       drawError    // handle error
  //   });
  return false;
}  
// handles drawing an error message
function drawError() {
    var container = document.getElementById('output');
    container.innerHTML = 'Bummer: there was an error!';
}
// handles the response, adds the html
function drawOutput(responseText) {
    var container = document.getElementById('output');
    container.innerHTML = responseText;
}
// helper function for cross-browser request object
function getRequest(url, success, error) {
    var req = false;
    try{
        // most browsers
        req = new XMLHttpRequest();
    } catch (e){
        // IE
        try{
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            // try an older version
            try{
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {};
    if (typeof error!= 'function') error = function () {};
    req.onreadystatechange = function(){
        if(req.readyState == 4) {
            return req.status === 200 ? 
                success(req.responseText) : error(req.status);
        }
    }
    req.open("GET", url, true);
    req.send(null);
    return req;
} -->
 <!-- </script>  -->


 <!-- <?php
// session_start();	 
// if(isset($_SESSION['username']) && $_SESSION['usertype']==1){
//   $_SESSION['message']='';
// require '../Login/dbh.php';
// if($_SERVER['REQUEST_METHOD']=='POST'){
//    $subject=$_POST['subject'];
//    $id=$_POST['id'];
//    $exam_id = $_POST['exam_id'];
         
//     $results = mysqli_query($conn,"SELECT username FROM login WHERE ID='$id' ");
//     $row = mysqli_fetch_array($results);
//     if($row['username']==$_SESSION['username']){
//       echo "here we are";
//       echo '<script type="text/javascript">',           //call the script getOutput() defined above
//                         'getOutput();',
//                         '</script>'; 
//                         echo "hey there again";
//         }
//     else{
//       $_SESSION['message']='Authentication failed';
    // }

  // }

 ?>
 -->
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
     <span class="attempt-test-head">Attempt a Test</span><br>  
     <form method="POST" action="start_test.php">
     <center>
     <span class="message"><?=$_SESSION['message'] ?></span><br>
     <select name="subject" >
        <option value="001">General Aptitude (001)</option>
        <option value="002">Quantitative Aptitude (002)</option> 
        <option value="003" selected="selected">Computer Science (003)</option>
        <option value="004">General Science (004)</option> </select>
        <input  type="text" name="id" placeholder="Enter UserID"> <span class="info">Get your UserID from Profile Page</span><br>
        <input type="text" name="name" placeholder="Your full name" ><br>
        <input type="number" name="exam_id" placeholder="Exam ID" min="111" max="999" required="required"><br>
        <button type='submit' style="border: none; background-color: white">  <img src="../Media/go.jpg" style="width: 100px;height: 100px;cursor: pointer;"></button>
    </center>
    </form>
    <span class="external_link">
    For a pro level test.<a href="https://www.geeksforgeeks.org/geeksquiz-home/">Click here!</a></span><br/>
    
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
  }
  else{
  	 echo"<h3>Please <a href='../Login/login'>login</a> to view this page.</h3>";
  }
  ?>