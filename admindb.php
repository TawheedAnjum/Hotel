<?php
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

$id = 0;
$email = '';
$password = '';
$date = '';
$number = '';
$category = '';
$update = false;

$id = ''; 
$hotel_email = ''; 
$phone =  '';
$name = ''; 
$adress =  '';
$area = ''; 
$rmax = ''; 
$rmin = ''; 
$description = '';

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
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $email = $row['email'];
    $password = $row['password'];
    $date = $row['date'];
    $number = $row['number'];
    $category = $row['category'];

    $update = true;
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $category = $_POST['category'];

    $sql = "UPDATE user SET email='$email', password='$password', date='$date', number='$number', category='$category' WHERE id='$id'";
    $result = $result = $conn->query($sql);

    header('Location: ' . 'admin.php');
}

if (isset($_GET['h_edit'])) {

    $id = $_GET['h_edit'];

    $sql = "SELECT * FROM hotel_profile WHERE id='$id'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $hotel_email = $row['hotel_email'];
    $phone = $row['phone'];
    $name = $row['name'];
    $adress = $row['adress'];
    $area = $row['area'];
    $rmax = $row['rmax'];
    $rmin = $row['rmin'];
    $description = $row['description'];
}

if (isset($_POST['hotel_update'])) {

    $id = $_POST['id'];
    $hotel_email = $_POST['hotel_email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $adress = $row['adress'];
    $area = $_POST['area'];
    $rmax = $_POST['rmax'];
    $rmin = $_POST['rmin'];
    $description = $_POST['description'];

    $sql = "UPDATE hotel_profile SET hotel_email='$hotel_email', phone='$phone', name='$name', adress='$adress', area='$area', rmax='$rmax', rmin='$rmin', description='$description' WHERE id='$id'";
    $result = $result = $conn->query($sql);

    header('Location: ' . 'admin.php');
}

if (isset($_GET['h_delete'])) {
    $id = $_GET['h_delete'];

    $sql = "DELETE FROM hotel_profile WHERE id='$id'";
    $result = $conn->query($sql);

    header('Location: ' . 'admin.php');
}
