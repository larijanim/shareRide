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
    <a href="needRide.php"  >Need Rides</a>
    <a href="getRide.php" class="active" >getting Rides</a>
   
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
    // echo $_SESSION['uname'];
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, usern FROM personinfo where usern = '$vuser' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
       // echo '<img src= "/uploads/'.$row["photo"].'" height="130" width="150">';

        $idget=$row["id"];
    }
} else {
    echo "0 results";
}
//$conn->close();

?>
        <h2>Getting Rides</h2>
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
        <button class="tablinks" onclick="openCity(event, 'London')">Getting Ride</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">History of Geeting Ride</button>
       
        
       
  
       </div>
     </div>
      <div class="col-sm-10">
        <div id="London" class="tabcontent">
         <div class="container2">
            
       
             <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   enctype="multipart/form-data"   >

     <?php
     //cccccccccccccccccccccccccccccccccccccc
     
     
     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        } 

$sql = "SELECT personinfo.* , rides.* FROM personinfo INNER JOIN rides ON personinfo.id = rides.id_need WHERE rides.id_get is  null ";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
   echo ' <div class="table-responsive-sm" style="overflow-x:auto;" >';
    echo '<table  class="table" ><thead ><tr><th  ><p><u>who</u></p></th><th  ><p><u>who</u></p></th><th ><u><p>from</p></u></th><th ><p><u>To</u></p></th><th><p><u>date</u></p></th><th><p><u>-----</u></p></th><th><p><u>Action</u></p></th></tr></thead>';
    echo '<tbody>';
    
    while($row = $result->fetch_assoc()) {
  
        echo '<tr>';
    echo '<td><p><img src="/uploads/'.$row["photo"].'" height="70" width="70"></p></td>';
    echo '<td  ><p>'. $row["fname"]. " " . $row["lname"].'</p></td>';


    if ($row["mornoon"] == 1 )  {

     echo '<td  ><p>  '.$row["homeAdd"].'</p></td>';   
      echo '<td  ><p>'.$row["kidschool"].'</p></td>';

      } 
else {
 echo '<td >school'.$row["kidschool"].'</p></td>';
 echo '<td >'.$row["homeAdd"].'</p></td>';


}

echo '<td ><p>'.$row['ridate'].'</td>';
echo '<td><p><input type="button" value="direction"</p></td>';
echo '<td><p> <input type="checkbox" id="fixit" name="fixit[]" value="1" ></p></td></tr>';
echo ' <input type="hidden" id="getrideid" name="getrideid[]" value='.$idget.'" >';
echo ' <input type="hidden" id="rideid" name="rideid[]" value='. $row["rideid"].'" >';
}
echo '</tbody>';
 echo '</table>';
 echo '</div>';
   } else {
    echo "0 results";
   }
//$conn->close();
//ccccccccccccccccccccccccccccccccccccccc 
  ?>
     <input type="submit"  value="Submit"   name="submit"  >
   </form>

   </div>
   

<?php 
//cccccccccccccccccccccccccccccccccccccccccccccccc

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    if (isset($_POST['submit'])) {

        $count = count($_POST['fixit']); //get total number of array element
        for ($i = 0; $i < $count; $i++) { // loop through array and assign values in variable and insert itin database
            $vfixit = $_POST['fixit'][$i];
   
            $vgetid = intval($_POST["getrideid"][$i]);
         
            $vrideid =intval($_POST["rideid"][$i]);
        

            $sql = "UPDATE rides SET  id_get = $vgetid, fixride =  $vfixit  WHERE rideid = $vrideid;";
            $success = ($sql) or die (mysql_error());
            if(mysqli_query($conn, $sql)){
                echo "Records were updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " ;
                break; 
            } 
       
    } //for end

    if ($success) {
        echo " <script> alert('You have successfully update ride.');
        </script>";
       // header("location: getRide.php");
    } else {
        echo " <script>alert('You have errors.');
         </script>";
    //    header("location: getRide.php");
    }
}

         //............................
  
}
//ccccccccccccccccccccccccccccccccc
?>
           

   </div>
 
       
  <div id="Paris" class="tabcontent">
     <div class="container2">  
        <div class="row">
           <div class="col-25">
                         
            </div>
           <div class="col-75">
                          
           </div>
<?php   
//cccccccccccccccccccccccccc
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT personinfo.* , rides.* FROM personinfo INNER JOIN rides ON personinfo.id = rides.id_need WHERE rides.id_get = $idget ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo ' <div class="table-responsive-sm" style="overflow-x:auto;" >';
  echo '<table class="table"><thead><tr><td><p><u>who</u></p></td><td><p><u>who</u></p></td><td><p><u>from</u></p></td><td><p><u>To</u></p></td><td><p><u>date</u></p></td></tr></thead>';
     echo '<tbody>';
     while($row = $result->fetch_assoc()) {
       
       echo '<tr>';
       echo '<td><p><img src="/uploads/'.$row["photo"].'" height="70" width="70"></p></td>';
        echo '<td><p>'. $row["fname"]. " " . $row["lname"].'</p></td>';
    if ($row["mornoon"] == 1 )  {
         echo '<td><p>'.$row["kidschool"].'</p></td>';

         echo '<td><p>'.$row["homeAdd"].'</p></td>';
        }
   else {
    echo '<td><p>'.$row["homeAdd"].'</p></td>';  
    echo '<td><p>'.$row["kidschool"].'</p></td>';}
    echo '<td><p>'.$row["ridate"].'</p></td>'; 

  }
  echo '</tbody>';
  echo '</table>';
  echo '</div>';

} else {
    echo "0 results";
}
$conn->close(); 
//cccccccccccccccccccccccccccccccccccccccccc
?>
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
