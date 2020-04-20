<?php

$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

$id=0;
$email = '';
$password = '';
$date = '';
$number = '';
$category = '';
$update=false;

if (isset($_POST['save'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $category = $_POST['category'];

    $sql = "INSERT INTO user (email, password, date, number, category) VALUES('$email', '$password', '$date', '$number', '$category' )";
    $result = $conn->query($sql);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM user WHERE id='$id'";
    $result = $conn->query($sql);

    header('Location: ' . 'admin.php');
}


if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $email = $row['email'];
    $password = $row['password'];
    $date = $row['date'];
    $number = $row['number'];
    $category = $row['category'];

    $update=true;
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $category = $_POST['category'];

    $sql = "UPDATE user SET email='$email', password='$password', date='$date', number='$number', category='$category' WHERE id='$id'";
    $result = $result = $conn->query($sql);

    header('Location: ' . 'admin.php');
}

