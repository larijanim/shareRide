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
    <a href="logout.php">Sing Out</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

  </div>


</header>



  <div id="show">
      <div class="container">
          <div class="sbox1">
            <h2>Register New User</h2>
            <p><b></b> </p>
            
        </div>
       </div>
       <hr >
</div>



<section id="boxes">
  <div class="container-fluid hero-unit ">
    
    <div class="row">
      <div class="col-sm-2" >
        <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">User & Pass</button>
        
     
  
       </div>
     </div>
     <div class="col-sm-10">
        <div id="London" class="tabcontent">
            <div class="container2">
            
                <form method="post" action="upload1.php"   enctype="multipart/form-data"   >
                    <div class="row">
                      <div class="col-25">
                        <label for="user">User Name</label>
                      </div>
                      <div class="col-75">
                        <input type="text" id="user" name="usern" placeholder="Your user  name.."  required  >
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="pass1">pass</label>
                      </div>
                      <div class="col-75">
                        <input type="text" id="pass1 name="pass1" placeholder="pass." required >
                      </div>
                    </div>

                   



                    
                    <div class="row">
                      <div class="col-25">
                        <label for="pass">pass</label>
                      </div>
                      <div class="col-75">
                        <input type="text"id="pass" name="pass" placeholder="password." required  >
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