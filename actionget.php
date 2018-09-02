
<!DOCTYPE html>
<html>
<head>
    <title>Parents networking</title>
<meta charset="UTF-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<link rel="stylesheet" href="setting.css">



</head>


<?php
// define variables and set to empty values
$dateErr = $needshareid1Err = $typerideErr = "";
$needate= $typeride= $needshareid1 = "";




if(isset($_POST["submit"])) {
 
      
    
    if (empty($_POST["date1"])) {
        $dateErr = "date is required";
      } else {
        $needate = $_POST["date1"];
      
        
      }

      if (empty($_POST["needshareid"])) {
        $needshareid1Err = "Emtyperide  is required";
     } else {
        $needshareid1 = $_POST["needshareid"];
     //   echo "<p>who ask1:".$needshareid1."</p>";
       
     }

     // echo "<p>who ask2:".$needshareid1."</p>";
     
      
      
      if (empty($_POST["typeRide"])) {
        $typerideErr = "Emtyperide  is required";
      } else {
        $typeride = $_POST["typeRide"];
       
      }
     
     
        // check if e-mail address is well-formed
       // if (!filter_var($tel, FILTER_VALIDATE_EMAIL)) {
       //   $emailErr = "Invalid email format"; 
      //  }


}
// end firts part ...................................
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

<body>

<header>


<div class="topnav sticky " id="myTopnav">
  <a href="index.html">SchoolShare</a>
  <a href="setting.php"  >Setting</a>
  <a href="needRide.php" class="active"  >need Ride</a>
    <a href="getRide.php">getting Ride</a>
  <a href="map.html">Map</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

</div>


</header>
<div id="show">
      <div class="container">
          <div class="sbox1">
            
            <p> <b>
<?php

echo "<h2>Your Input:</h2>";

echo "<p>Date:".$needate."</p>";
echo "<br>";
echo "<p>Type ride:".$typeride."</p>";
echo "<br>";
echo "<p>who ask:".$needshareid1."</p>";
echo "<br>";

?>


<?php
$servername = "localhost";
$username = "root";
$password = "Arian!59";
$dbname = "shareride";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO rides (id_need, ridate, mornoon)
VALUES ('".$needshareid1."', '".$needate."', '".$typeride."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>

            </b> </p>
            
        </div>
       </div>
       <hr >
</div>


</body>
</html>