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
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['conpassword']) && isset($_POST['date']) && isset($_POST['number']) && isset($_POST['category'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
        $dob = $_POST['date'];
        $number = $_POST['number'];
        $category = $_POST['category'];

        $date = date('Y-m-d', strtotime($dob));
    }

    if ($password != $conpassword) {
        echo "Password is not confirmed. Please <a href='register.php'>Retry</a>";
        exit;
    }

    // cehck email
    $sql1 = "SELECT * FROM user WHERE email='$email'";
    $result1 = mysqli_query($conn, $sql1);
    $count1 = mysqli_num_rows($result1);

    if ($count1 > 0) {
        
        header('Location: ' . 'register.php?error');
        
    }

    // insert
    else {

        $sql = "INSERT INTO user (email, password, date, number, category ) VALUES(?,?,?,?,?)";
        $stmtinsert = $conn->prepare($sql);
        $stmtinsert->bind_param("sssss", $email, $password, $date, $number, $category);
        $result = $stmtinsert->execute();
        if ($result) {
            echo 'Successfully registered.';
            header('Location: ' . 'login.php');
        } else {
            echo "There were erros while registering. Please <a href='register.php'>Retry</a>";
        }
    }

} else {
    echo 'Error';
}
$conn->close();
