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

$sql = "SELECT id, fname, lname, photo, kidschool, kidName FROM personinfo where lname ='larijani' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
        echo '<img src= "/uploads/'.$row["photo"].'" height="130" width="150">';

        $idneed=$row["id"];
    }
} else {
    echo "0 results";
}
$conn->close();

?>

<header>


  <div class="topnav sticky " id="myTopnav">
 
    <a href="index.html">SchoolShare</a>
    <a href="setting.php">Setting</a>
    <a href="shareRide.html" class="active" >Sharing Rides</a>
    <a href="map.html">Map</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>


</header>



  <div id="show">
    <div class="container">
      <div class="sbox1">
        <h2>Sharing Rides</h2>
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
        <button class="tablinks" onclick="openCity(event, 'London')">Need Ride</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Get ride</button>
       
        
       
  
       </div>
     </div>
      <div class="col-sm-10">
        <div id="London" class="tabcontent">
            <div class="container2">
                
                    <form method="post" action="actionNeed.php"   enctype="multipart/form-data"   >
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
              
          </div>
        </div>
        
        <div id="Paris" class="tabcontent">
            <div class="container2">  
                <form action="action_page.php">
                    <div class="row">
                        <div class="col-25">
                          <label for="Volunteer">Volunteer Name</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="volunteer" name="volunteer" placeholder="Your name.."  required  >
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="fname">First Name</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="fname" name="firstname" placeholder="Your name.."  required  >
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
                            <label for="hAddress">Home Address</label>
                          </div>
                          <div class="col-75">
                            <input type="text" id="hAddress" name="hAddress" placeholder="Home Address.." required >
                          </br>
                            <input type="Button" value="Get Direction">
                          </div>
                        </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="Kidschool">Kid's School</label>
                        </div>
                        <div class="col-75">
                          <select id="kidsSchool" name="KidsSchool">
                            <option value="1">Blossom Hill</option>
                            <option value="2">Van meter</option>
                            <option value="3">Daves</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="needride">need ride</label>
                        </div>
                        <div class="col-75">
                            <select id="typeRide" name="typeRide">
                                <option value="1">Pickup from Home/Morning</option>
                                <option value="2">Pickup from School Evening</option>
                                
                              </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="tel">Tel Number</label>
                        </div>
                        <div class="col-75">
                          <input type="text"id="tel" name="teln" placeholder="Write Cell Number." required  >
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-25">
                             
                          </div>
                          <div class="col-75">
                        <input type="submit"  value="Submit" name="submit"  >
                          </div>
                      </div>
                  </form>
           </div>
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
