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
  if (isset($_POST['vemail']) && isset($_POST['hemail']) && isset($_POST['hheader']) && isset($_POST['adress']) && isset($_POST['room1']) && isset($_POST['room2']) && isset($_POST['room3']) && isset($_POST['description']) && isset($_FILES['img1']['name']) && isset($_FILES['img2']['name']) && isset($_FILES['img3']['name'])) {
    $hname = $_POST['vemail'];
    $hemail = $_POST['hemail'];
    $hheader = $_POST['hheader'];
    $adress = $_POST['adress'];
    $room1 = $_POST['room1'];
    $room2 = $_POST['room2'];
    $room3 = $_POST['room3'];
    $description = $_POST['description'];
    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];
  }

  $target1 = "db_image/" . basename($img1);
  $target2 = "db_image/" . basename($img2);
  $target3 = "db_image/" . basename($img3);

  $sql = "INSERT INTO hprofile (vemail, hemail, hheader, adress, room1, room2, room3, description, img1, img2, img3 ) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
  $stmtinsert = $conn->prepare($sql);
  $stmtinsert->bind_param("sssssssssss", $vemail, $hemail, $hheader, $adress, $room1, $room2, $room3, $description, $img1, $img2, $img3);
  $result = $stmtinsert->execute();
  if ($result) {
    echo 'Successfully registered.';
  } else {
    echo "There were erros while registering. Please <a href='register.php'>Retry</a>";
  }
 
  //img upload
  if (move_uploaded_file($_FILES['img1']['tmp_name'], $target1) && move_uploaded_file($_FILES['img2']['tmp_name'], $target2) && move_uploaded_file($_FILES['img3']['tmp_name'], $target3)) {
    echo "Image uploaded successfully";
  } else {
    echo "Failed to upload image";
  }
  $result = mysqli_query($conn, "SELECT * FROM hprofile");
}


mysqli_close($conn);
