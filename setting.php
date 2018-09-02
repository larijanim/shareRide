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
  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

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
  

     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }  

  </script>
  
 
<header>


  <div class="topnav sticky " id="myTopnav">
    <a href="index.php">SchoolShare</a>
    <a href="setting.php" class="active" >Setting</a>
   
    <a href="needRide.php">needbRide</a>
    <a href="getRide.php">getting Ride</a>
    <a href="map.html">Map</a>
    <a href="logout.php">Sing Out</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

  </div>


</header>

<?php    
     
         $vuser="";
         if ( isset($_SESSION['uname'])){
         $vuser= $_SESSION["uname"];
         //echo $_SESSION['uname'];
         echo "welcome :'. $vuser.'<br>";
         }else{
         echo '<a href="signout.php">Signout</a>';
         }
?>

  <div id="show">
      <div class="container">
          <div class="sbox1">
            <h2>Let's get you started !!</h2>
            <p><b>First start by creating a username parents can see you by, then fill in the information bellow, or log in with your Nextdoor account.</b> </p>
            
        </div>
       </div>
       <hr >
</div>



<section id="boxes">
  <div class="container-fluid hero-unit ">
    
    <div class="row">
      <div class="col-sm-2" >
        <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">Personal info</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Address</button>
        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Car </button>
     
  
       </div>
     </div>
     <div class="col-sm-10">
        <div id="London" class="tabcontent">
            <div class="container2">
            
                <form method="post" action="upload1.php"   enctype="multipart/form-data"   >
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
                        <label for="lname">Last Name</label>
                      </div>
                      <div class="col-75">
                        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required >
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                          <label for="blah">Photo</label>
                        </div>
                        <div class="col-75">
                            <input type='file' onchange="readURL(this);"  name="fileToUpload" id="fileToUpload" required />
                           
                            <img id="blah" name="photo" src="#" alt="your image" height="70" width="70"  />
                        </div>
                      </div>



                    <div class="row">
                      <div class="col-25">
                        <label for="Kidschool">Kid's School</label>
                      </div>
                      <div class="col-75">
                        <select id="kidsSchool" name="KidsSchool">
                          <option value="Blossom Hill1">Blossom Hill</option>
                          <option value="Van meter">Van meter</option>
                          <option value="Daves">Daves</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="KidsName">Kid's Name</label>
                      </div>
                      <div class="col-75">
                        <input type="text"id="KidsName" name="KidsName" placeholder="Write Kid's Name." required  >
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="HomeAdd">Home Address</label>
                      </div>
                      <div class="col-75">
                        <input type="text"id="homeAdd" name="homeAdd" placeholder="WriteHome Address." required  >
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
                 
                  <p id="error_para" ></p>
 
            </div>
        </div>
        
        <div id="Paris" class="tabcontent">
            <div class="container2">  
                <form action="action_page.php">
                    <div class="row">
                      <div class="col-25">
                        <label for="city">City</label>
                      </div>
                      <div class="col-75">
                        <input type="text" id="city" name="Cityname" placeholder="city name..">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="streetN">Street </label>
                      </div>
                      <div class="col-75">
                        <input type="text" id="streetN" name="Street" placeholder="Street..">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="state">state</label>
                      </div>
                      <div class="col-75">
                        <select id="state" name="state">
                          <option value="california">california</option>
                          <option value="a">a</option>
                          <option value="b">b</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                          <label for="unit">Unit Number </label>
                      </div>
                      <div class="col-75">
                          <input type="text" id="unit" name="unit" placeholder="Unit Numbert..">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                           
                        </div>
                        <div class="col-75">
                      <input type="submit" value="Submit">
                        </div>
                    </div>
                    
                  </form>
           </div>
        </div>
        
        <div id="Tokyo" class="tabcontent">
            <div class="container2">  
                <form action="action_page.php">
                    <div class="row">
                      <div class="col-25">
                        <label for="carModel">Car Model</label>
                      </div>
                      <div class="col-75">
                        <input type="text" id="carModel" name="carModel" placeholder="Car Model.">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="carNumber">Car Number</label>
                      </div>
                      <div class="col-75">
                        <input type="text" id="carNumber" name="carnumber" placeholder="Car number..">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="freeSit">Available Sit</label>
                      </div>
                      <div class="col-75">
                        <select id="freeSit" name="freeSit">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                          <label for="dmvimage">DMV Image</label>
                      </div>
                      <div class="col-75">
                          <input type="text" id="dmvImage" name="dmvImage" placeholder="Street..">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                           
                        </div>
                        <div class="col-75">
                      <input type="submit" value="Submit">
                        </div>
                    </div>
                    
                  </form>
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