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
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";

    //echo $sql;
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION["logemail"] = $email;

        while ($row = $result->fetch_assoc()) {
            $category = $row['category'];
            if ($category == 'viwer') {
                header('Location: ' . 'viwer.php');
            } elseif ($category == 'hotel_owner') {

                $sql2 = "SELECT * FROM hprofile WHERE vemail= '$email'";
                $result2 = $conn->query($sql2);
                $count2 = mysqli_num_rows($result2);

                if ($count2 > 0) {
                    header('Location: ' . 'profile.php');
                } else {
                    header('Location: ' . 'owner.php');
                }
            } else {
                setcookie("loggemail",$email,time()+120);
                header('Location: ' . 'admin.php');
            }
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
