<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'hotel';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['hname']) && isset($_POST['hemail'])) {
    $hname = $_POST['hname'];
    $hemail = $_POST['hemail'];
  }



  $sql = "INSERT INTO test (hname, hemail ) VALUES(?,?)";
  $stmtinsert = $conn->prepare($sql);
  $stmtinsert->bind_param("ss", $hname, $hemail);
  $result = $stmtinsert->execute();
  if ($result) {
    echo 'Successfully registered.';
  } else {
    echo "There were erros while registering. Please <a href='register.php'>Retry</a>";
  }
}

mysqli_close($conn);
?>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'hotel';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql
if(isset($_POST['submit']))
{
  $hname=$_POST['hname'];
  $hemail=$_POST['hemail'];
  $img1=addslashes(file_get_contents($_FILES['img1']['temp_name']));

  $query="INSERT INTO test values ('$hname', '$hemail', '$img1')";
  if(mysqli_query($conn, $query))
  {
     echo "done";
  }

}

mysqli_close($conn);

?>


<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "hotel");

  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
  	// Get image name
  	$img1 = $_FILES['img1']['name'];
  	// Get text
    $hname = mysqli_real_escape_string($db, $_POST['hname']);
    $hemail = mysqli_real_escape_string($db, $_POST['hemail']);

  	// image file directory
  	$target = "images/".basename($img1);

  	$sql = "INSERT INTO test (hname, hemail, img1) VALUES ('$hname', '$hemail' '$img1')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['img1']['tmp_name'], $target)) {
  		echo"Image uploaded successfully";
  	}else{
  		echo "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM test");
?>



//img1
    if ($_POST["img1"]== "") {
      $error_msg['img1'] = "img is required";
    } else {
      $img1 = test_input($_POST["img1"]);
      $allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
      $ext = pathinfo($img1, PATHINFO_EXTENSION);

      if(!in_array($ext,$allowed) ) {
        $error_msg['img1'] = "img is not valid";
      }
    }