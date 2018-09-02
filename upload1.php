
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
$fnameErr = $lnameErr = $emailErr = $genderErr = $kidsschoolErr = $kidsnameErr = $addErr  = "";
$fname = $lastname =$teln  = $KidsSchool = $KidsName = $kidschool=$haddress=$photo= $image= "";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if (empty($_POST["firstname"])) {
        $fnameErr = "first Name is required";
      } else {
        $fname = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
          $fnameErr = "Only letters and white space allowed"; 
        }
      }
      
      if (empty($_POST["homeAdd"])) {
        $addErr = "Address is required";
      } 
      else {
        $haddress = test_input($_POST["homeAdd"]);}
    if (empty($_POST["lastname"])) {
        $addErr = "Address is required";
      } 
      else {
        $lastname = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
          $lnameErr = "Only letters and white space allowed"; 
        }
      }
     
      if (empty($_POST["teln"])) {
        $emailErr = "Email is required";
      } else {
        $teln = test_input($_POST["teln"]);
      }


      if (empty($_POST["KidsSchool"])) {
        $kidsschoolErr = "Kid's School is required";
      } else {
        $KidsSchool = test_input($_POST["KidsSchool"]);
      }

      if (empty($_POST["KidsName"])) {
        $kidsnameErr = "Kid's Name is required";
      } else {
        $KidsName = test_input($_POST["KidsName"]);
      }
        // check if e-mail address is well-formed
       // if (!filter_var($tel, FILTER_VALIDATE_EMAIL)) {
       //   $emailErr = "Invalid email format"; 
      //  }


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// end firts part ...................................
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        $image=basename($_FILES["fileToUpload"]["name"]);/* Displaying Image*/
        //echo $image;
        echo '<img src= "/uploads/'.$image.'" height="150" width="150"  />'; 



    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<body>

<header>


<div class="topnav sticky " id="myTopnav">
  <a href="index.html">SchoolShare</a>
  <a href="setting.php" class="active" >Setting</a>
 
  <a href="shareRide.html">ShareRide</a>
  <a href="map.html">Map</a>
  <a href="logout.php">Sing Out</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

</div>


</header>
<div id="show">
      <div class="container">
          <div class="sbox1">
            
            <p> <b>
            <?php

echo "<h2>Your Input:</h2>";

echo "<p>First Name:".$fname."</p>";
echo "<br>";
echo "<p>Last Name:".$lastname."</p>";
echo "<br>";
echo "<p>School:".$KidsSchool. "</p>";
echo "<br>";
echo "<p>Kids Name:".$KidsName."</p>";
echo "<br>";
echo "<p>Home Adress:".$haddress."</p>";
echo "<br>";
echo "<p>Cell Phon:".$teln."</p>";
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

$sql = "INSERT INTO personinfo (fname, lname, kidname, kidschool, homeAdd , photo, tel)
VALUES ('".$fname."', '".$lastname."', '".$KidsName."', '".$KidsSchool."','".$haddress. "','".$image."', '423424')";

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