<?php

$servername = 'localhost';
$username = 'root';
$password = ''; 
$dbname = 'hotel';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['category'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $category = $_POST['category'];
    }
    
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'  AND category='$category'";

    //echo $sql;
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION["logemail"]=$email;

        if ( $category=='viwer') {
            header('Location: '.'viwer.php');
        }
        elseif($category=='admin'){
            header('Location: '.'admin.php');
        }
            
        else{
            header('Location: '.'owner.php');
        }
    } else {
        echo "Login failed. Please <a href='loginw.php'>Retry</a>";
        echo "<br>Not Registered? <a href='register.php'>Signup</a> for a new account";
    }
} else {
    echo 'Error';
}
$conn->close();
?>