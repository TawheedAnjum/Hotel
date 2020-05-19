<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])){

    $id=$_POST['id'];
    $hotel_email = $_POST['hotel_email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $area = $_POST['area'];
    $rmax = $_POST['rmax'];
    $rmin = $_POST['rmin'];
    $description = $_POST['description'];
    
    $sql = "UPDATE hotel_profile SET hotel_email='$hotel_email', name='$name', phone='$phone', adress='$adress', rmax='$rmax', rmin='$rmin', description='$description' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {

        header("location: profile.php");
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
