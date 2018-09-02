<!DOCTYPE html>
<html>
<head>
    <title>Parents networking</title>
<meta charset="UTF-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="1.css">
</head>




<body>

<header>


  <div class="topnav sticky " id="myTopnav">
    <a href="index.html" class="active">HomSchoolShare<e</a>
    <a href="newuser.php">Sing Up</a>
  
    <a >About</a>
   
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>


</header>


<script type="text/javascript">
  var images = ["Four-kids-staring.svg", "SUmmer-camp.svg"];
  $(function () {
      var i = 0;
      $("#show").css("background-image", "url(" + images[i] + ")");
      setInterval(function () {
          i++;
          if (i == images.length) {
              i = 0;
              
          }var s1= document.getElementById("show")
           $(s1).css("background-image", "url(" + images[i] + ")");
         
      }, 6000);
  });
</script>


  <div id="show">
  <?php
if( isset($_POST["submit"]) )
//and isset($_POST['pwd']) )
 {
    $servername = "localhost";
    $username = "root";
    $password = "Arian!59";
    $dbname = "shareride";
    $pass = $user = $ret = $row = $sql = "";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	//	include('config.php'); //code is given below (used for database connection)
        $user=$_POST['uname'];
        if( isset($_POST["pws"]) ){
            $pass=$_POST['pws'];}
        else {
       //     echo"'''''''";
      }
		$ret= "SELECT * FROM personinfo WHERE usern= '$user' AND passw =' $pass'";
    $row  = $conn->query($ret);
  //  $row = mysql_query($ret,$this->connection);

		if(!$row) {
            echo "wwwwwrong";
		header("Location: index.php");
		}
		else {
  //    echo '<p>'.$row["usern"].'</p>';
	       session_start();
            $_SESSION['uname']=$user;
           echo "right"; 
		header('location:needRide.php');
		}
}
?>

    <div class="container">
      <div class="sbox1">
        <h1 style="color:green;" >Let's help  kids live in a better community</h1>
        <p style="color:green;"><b>Parents can let their kids share rides, so they would spend less time in traffic and have more free time. School parents together can make Big Changes.</b> </p>
     </div>
    <div class="sbox2">
      <form class="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' >
       <div class="container">
       <label for="uname"><b>Username</b></label>
       <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

       <label for="psw"><b>Password</b></label>
       <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

       <button type="submit" name="submit">Login</button>
       <label>
         <input type="checkbox" checked="checked" name="remember"> Remember me
       </label>
      </div>

        <div class="container" style="background-color:#f1f1f1">

          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
       </form>
  </div>
   </div>
</div>


<section id="login">
<div class="container" >
  <p></p>


</div>
</section>
<section id="boxes">
<div class="container" >
   <div class="box">
     <img src="sh1.svg" alt="Netvork">
      <h3> Parent Network</h3>
      <p> We will use social network to help parent drive less smile more.</p>
   </div>
   <div class="box">
      <img src="p3.svg" alt="Private">
      <h3>Private Ride</h3>
       <p>We will share our car to serve our kids better service.</p>
   </div>
   <div class="box">
     <img src="sh2.svg" alt="trusted">
     <h3> Happy Kids</h3>
     <p>More kids socilization, more time for Parents</p>
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
