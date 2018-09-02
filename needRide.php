<!DOCTYPE html>
<?php   session_start();  ?>
<html>
<head>
    <title>Parents networking</title>
<meta charset="UTF-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="setting.css">



</head>
<body>
  <script>
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
} 
  
  </script>


<header>


  <div class="topnav sticky " id="myTopnav">
 
    <a href="index.php">SchoolShare</a>
    <a href="setting.php">Setting</a>
    <a href="needRide.php" class="active" >Need Ride</a>
    <a href="getRide.php">getting Ride</a>
    <a href="map.html">Map</a>
    <a href="logout.php">Sing Out</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>


</header>



  <div id="show">
    <div class="container">
      <div class="sbox1">
      <?php    
     
     $vuser="";
     if ( isset($_SESSION['uname'])){
     $vuser= $_SESSION["uname"];
   //  echo $_SESSION['uname'];
     echo "welcome :$vuser<br>";
     }else{
     echo '<a href="signout.php">Signout</a>';
     }
?>
<?php
$servername = "localhost";
$username = "root";
$password = "Arian!59";
$dbname = "shareride";
$result = $sql = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, usern FROM personinfo where usern = '$vuser' ; ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
      //  echo '<img src= "/uploads/'.$row["photo"].'" height="130" width="150">';

        $idneed=$row["id"];
    }
} else {
    echo "0 results";
}
//$conn->close();

?>



        <h2>Requesting Rides</h2>
        <p><b>This is where you get to meet other parents who can give your child a ride, or where you get asked to give others a ride</b> </p>
     </div>
   </div>
   <hr>
</div>


<section id="boxes">
  <div class="container-fluid hero-unit ">
    
    <div class="row">
      <div class="col-sm-2" >
        <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">RegisterRequest</button>
       
        <button class="tablinks" onclick="openCity(event, 'Paris')">Request History</button>
       
        
       
  
       </div>
     </div>
      <div class="col-sm-10">
        <div id="London" class="tabcontent">
            <div class="container2">
                
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"   >
                    <div class="row">
                            <div class="col-25">
                              <label for="needride">need ride</label>
                            </div>
                            <div class="col-75">
                           
                                <select id="typeRide" name="typeRide">
                                    <option value="1">Pickup from Home/Morning</option>
                                    <option value="2">Pickup from School/ Evening</option>
                                    
                                  </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-25">
                              <label for="date1">date</label>
                            </div>
                            <div class="col-75">
                              <input type="date" id="date1" name="date1" placeholder="date.." required >
                            </div>
                          </div>
                          
                          <div class="row">
                              <div class="col-25">
                                 
                              </div>
                              <input type="hidden" id="needshareid" name="needshareid" value="<?php echo $idneed; ?>" > 
                              <div class="col-75">
                               
                            <input type="submit"  value="Submit" name="submit"  >
                              </div>
                          </div>

                      </form>
              
                      <?php 
//cccccccccccccccccccccccccccccccccccccccccccccccc
$needate= $typeride= $needshareid1 = "";
$dateErr = $needshareid1Err = $typerideErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['submit'])) {

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
    
   

       
$sql = "INSERT INTO rides (id_need, ridate, mornoon)
VALUES ('".$needshareid1."', '".$needate."', '".$typeride."')";

if ($conn->query($sql) === TRUE) {
  echo " <script> alert('You have successfully insert request ride.');
  </script>";
 // header("location: getRide.php");
} else {
  echo " <script>alert('You have errors.');
   </script>";
//    header("location: getRide.php");
}

} 
}
//ccccccccccccccccccccccccccccccccc
?>
           

          </div>
        </div>
        






        <div id="Paris" class="tabcontent">
            <div class="container2">  
            
            
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   enctype="multipart/form-data"   >

<?php    if ($conn->connect_error){ 
die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT personinfo.* , rides.* FROM personinfo INNER JOIN rides ON personinfo.id = rides.id_need WHERE rides.id_need = $idneed;";
$result = $conn->query($sql);
//echo $sql;
//echo intval($idneed);
if ($result->num_rows > 0) {
// output data of each row



echo ' <div class="table-responsive-sm" style="overflow-x:auto;" >';
echo '<table  class="table" ><thead><tr><td><p><u>who</u></p></td><td><p><u>who</u></p></td><td><p><u>from</u></p></td><td><p><u>To</u></p></td><td><p><u>date</u></p></td><td><p><u>Status</u></p></td></tr></thead>';

while($row = $result->fetch_assoc()) {

echo '<tr>';

echo '<td><p><img src="/uploads/'.$row["photo"].'" height="70" width="70"></p></td>';
echo '<td><p>'. $row["fname"]. " " . $row["lname"].'</p></td>';
if ($row["mornoon"] == 1 )  {
echo '<td><p> '.$row["kidschool"].'</p></td>';
echo '<td><p>'.$row["homeAdd"].'</p></td>';
}
else {
  echo '<td><p>'.$row["homeAdd"].'</p></td>'; 
echo '<td><p>'.$row["kidschool"].'</p></td>';}
echo '<td><p>'.$row['ridate'].'</p></td>';
if ($row["fixride"] == 1 ) 
{

  echo '<td><p>Done</p></td>';
}else{
  echo '<td><p>Pendding</p></td>';
}

//echo '<td><p> <input type="checkbox" id="fixit" name="fixit[]" value="1" ></p></td></tr>';
//echo ' <input type="hidden" id="getrideid" name="getrideid[]" value='.$idget.'" >';
//echo ' <input type="hidden" id="rideid" name="rideid[]" value='. $row["rideid"].'" >';
}
echo '</table>';
echo '</div>';


} else {
echo "0 results";
}
$conn->close(); 



?>
</form>
           </div>
        </div>
        
        
               
           </div>
        </div>
       
</div>
  
</section>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav sticky") {
        x.className += " responsive";
        document.getElementById("body").style.paddingTop = "0px";
    } else {
        x.className = "topnav sticky";
    }
}
</script>

<footer>CopyRight</footer>
</body>
</html>
